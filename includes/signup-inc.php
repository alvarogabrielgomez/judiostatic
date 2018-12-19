<?php
 error_reporting(E_ALL);
 session_start();
 ini_set('display_errors', '1');
function error($message){
    header("Location: ../signup.php?signup=".$message);
    exit();
}

if( isset($_POST['signup-submit']) ){

    require 'dbh-inc.php';

    $first = mysqli_real_escape_string($conn,$_POST['first']);
    $last = mysqli_real_escape_string($conn,$_POST['last']);
    $username =  mysqli_real_escape_string($conn,$_POST['uid']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password =  mysqli_real_escape_string($conn,$_POST['pwd']);
    $passwordRepeat = mysqli_real_escape_string($conn,$_POST['pwd-repeat']);

    if(empty($first) & empty($last) & empty($username) & empty($email) & empty($password) & empty($passwordRepeat)){
        // error("error"."&uid=".$username."&email=".$email."&first=".$first."&last=".$last);
        error("empty");
    }
    if(empty($first) || empty($last) || empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
        // error("error"."&uid=".$username."&email=".$email."&first=".$first."&last=".$last);
        error("empty"."&uid=".$username."&email=".$email."&first=".$first."&last=".$last);

    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        error("mail-invalid"."&uid=".$username."&first=".$first."&last=".$last);

    }else if($password !== $passwordRepeat){
        error("password-check"."&uid=".$username."&email=".$email."&first=".$first."&last=".$last);

    }

    else{
        

        $sql = "SELECT * FROM admins WHERE admin_email = '$email';";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0){
            error('email-taken');
        }

        $sql = "SELECT admin_uid FROM admins WHERE admin_uid = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            error("sqlerror");
        }

        else{
        mysqli_stmt_bind_param($stmt, "s", $username); // Bindear el statement guardado previamente con la infromacion dada por el usuario, ES NECESARIO pasar el tipo de dato S string I integer B blob d double
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck > 0){
            error("taken");
        }

        else{
            $sql = "INSERT INTO admins (admin_uid, admin_first, admin_last, admin_email, admin_pwd) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                error("sqlerror");
            }

            else{

                $HashedPassword = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "sssss", $username, $first, $last, $email, $HashedPassword);
                mysqli_stmt_execute($stmt);
                header("Location: ../admin.php?signup=success");
                exit();
            }
        
        }


        }



    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);




}

else{
    error("invalid-source");
}