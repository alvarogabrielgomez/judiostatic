<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

function isempty($str){
    return $str=='';
}
function error($message){
        header("Location: ../admin.php?login=".$message);
        exit();
}

if(isset($_POST['submit'])){

    $dbservername = "localhost";
    $dbUsername = "root";
    $dbPassword = "root";
    $dbName = "login_system";
    $dbPort = "3306";
    
    $conn = mysqli_connect($dbservername,$dbUsername,$dbPassword,$dbName);

    $uid = mysqli_real_escape_string($conn,$_POST['uid']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
    //Error hadnling
    if(empty($uid)||empty($pwd)){
            error('empty');
 
    }else{
        //Check USERNAME
        $sql = "SELECT * FROM users WHERE user_uid = $uid";
        $results=mysqli_query($conn, $sql);
        $resultsCheck=mysqli_num_rows($results);

        if($resultsCheck < 1){
            error('user-not-found');
        }else{
            if($row = mysqli_fetch_assoc($result)) {
                //Probar Hash del pass
                $hashedPwdCheck = password_verify( $pwd, $row['user_pwd']);
                if($hashedPwdCheck == false) {
                    error('verification-pass-invalid');
                }elseif($hashedPwdCheck == true){
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_uid'] = $row['user_uid'];
                    error('success');
                }
            }
        }
    }
 
}else{
    error('invalid_source');
}