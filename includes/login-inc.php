<?php
 error_reporting(E_ALL);
 ini_set('display_errors', '1');
function error($message){
    header("Location: ../login.php?login=".$message);
    exit();
}
if(isset($_POST['login-submit'])){
    require 'dbh-inc.php';
    $mailuid = mysqli_real_escape_string($conn,$_POST['mailuid']);
    $password = mysqli_real_escape_string($conn,$_POST['pwd']);

    if(empty($mailuid) || empty($password)){
        error("empty");
    }
    else{
        $sql = "SELECT * FROM clients WHERE client_uid=? OR client_email=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            error("sqlerror");
        }
        else{

            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if($row = mysqli_fetch_assoc($result)){
                $sql = "SELECT * FROM clients WHERE client_uid = '$mailuid' AND active = 1 OR client_email = '$mailuid' AND active = 1;";
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck<1){
                    error('user-unactive');
                }else if($resultCheck>=1){
    
                    $pwdCheck = password_verify($password, $row['client_pwd']);
                    if($pwdCheck == false){
                        error("wrong-pwd");
                    }
                    else if($pwdCheck == true){
                        session_start();
                        $_SESSION['client_id']=$row['client_id'];
                        $_SESSION['client_uid']=$row['client_uid'];
                        $_SESSION['client_first']=$row['client_first'];
                        $_SESSION['client_email']=$row['client_email'];
                        $_SESSION['client_last']  = $row['client_last'];
                        header("Location: ../profile.php?login=success");
                        exit();
                    }
                }

            }else{
              error("no-user");  
            }
        }
    }


}else{
    error("invalid-source");
}