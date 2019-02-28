<?php
if (isset($_POST["reset-password-submit"])) {
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $pwd = $_POST["pwd"];
    $pwd_repeat = $_POST["pwd_repeat"];

    if (empty($pwd || empty($pwd_repeat))) {
       header("Location: ../iforgot/create-new-password.php?newpwd=empty");
       exit();
    }else if($pwd != $pwd_repeat){
        header("Location: ../iforgot/create-new-password.php?newpwd=pwdnotsame");
        exit();
    }

    $currentDate = date("U");

    require 'dbh-inc.php';

    $sql = "SELECT * FROM pwdReset WHERE pwdReset_selector=? AND pwdReset_expires >= ?";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
            echo 'Tu tiempo ha expirado';
            echo $currentDate;
            exit();
        }else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdReset_token"]);

            if ($tokenCheck === false) {
                echo 'Hubo un problema de verificacion de token.';
                exit();
            }else if ($tokenCheck === true) {
                $tokenEmail = $row["pwdReset_email"];
                $sql = "SELECT * FROM clients WHERE client_email = ?";
                $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "There was an error!";
                        exit();
                    }else{
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if (!$row = mysqli_fetch_assoc($result)) {
                            echo 'Necesitas volver a intentarlo todo de nuevo.';
                            exit();
                        }else {
                            $sql = "UPDATE clients SET client_pwd = ? WHERE client_email=?";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                header("Location: ../login.php?newpwd=errord2");
                                exit();
                            }else{
                                $newHashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt, "ss", $newHashedPwd, $tokenEmail);
                                mysqli_stmt_execute($stmt);

                                $sql = "DELETE FROM pwdReset WHERE pwdReset_email=?";
                                $stmt = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    header("Location: ../login.php?newpwd=errord1");
                                    exit();
                                }else{
                                    $newHashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                    mysqli_stmt_execute($stmt);
                                    header("Location: ../login.php?newpwd=success");
                                    
                                }
                            }
                        }
                    }
            }
        }
    }

}else {
    header("Location: ../index.php");
}