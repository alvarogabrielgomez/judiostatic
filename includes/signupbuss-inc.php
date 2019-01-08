<?php
 error_reporting(E_ALL);
 session_start();
 ini_set('display_errors', '1');
function error($message){
    header("Location: ../signupbuss.php?signup=".$message);
    exit();
}

if( isset($_POST['signup-submit']) ){

    require 'dbh-inc.php';

    $buss_name = mysqli_real_escape_string($conn,$_POST['buss_name']);
    $buss_dir = mysqli_real_escape_string($conn,$_POST['buss_dir']);
    $buss_url = mysqli_real_escape_string($conn,$_POST['buss_url']);
    $username =  mysqli_real_escape_string($conn,$_POST['uid']);
    $buss_phone = mysqli_real_escape_string($conn,$_POST['buss_phone']);
    $password =  mysqli_real_escape_string($conn,$_POST['pwd']);
    $passwordRepeat = mysqli_real_escape_string($conn,$_POST['pwd-repeat']);

    if(empty($buss_name) & empty($buss_dir) & empty($username) & empty($buss_phone) & empty($password) & empty($passwordRepeat)){
        // error("error"."&uid=".$username."&email=".$email."&first=".$first."&last=".$last);
        error("empty");
    }
    if(empty($buss_name) || empty($buss_dir) || empty($username) || empty($buss_phone) || empty($password) || empty($passwordRepeat)){
        // error("error"."&uid=".$username."&email=".$email."&first=".$first."&last=".$last);
        error("empty"."&uid=".$username."&email=".$email."&first=".$first."&last=".$last);

    }else if($password !== $passwordRepeat){
        error("password-check"."&uid=".$username."&email=".$email."&first=".$first."&last=".$last);

    }

    else{
        

        $sql = "SELECT * FROM buss WHERE buss_name = '$buss_name';";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0){
            error('name-taken');
        }

        $sql = "SELECT buss_uid FROM buss WHERE buss_uid = ?";
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
            $sql = "INSERT INTO buss (buss_uid, buss_name, buss_dir, buss_phone, buss_url, auth, buss_pwd) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                error("sqlerror");
            }

            else{
                $auth = sha1($buss_name.$username.random_int(1, 1000000));
                $HashedPassword = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "sssssss", $username, $buss_name, $buss_dir, $buss_phone, $buss_url, $auth, $HashedPassword);
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