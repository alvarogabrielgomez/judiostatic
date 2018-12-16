<?php
 error_reporting(E_ALL);
 ini_set('display_errors', '1');
function error($message){
    header("Location: ../admin.php?login=".$message);
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
        $sql = "SELECT * FROM users WHERE user_uid=? OR user_email=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            error("sql-error");
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row['user_pwd']);
                if($pwdCheck == false){
                    error("wrong-pwd");
                }
                else if($pwdCheck == true){
                    session_start();
                    $_SESSION['user_ID']=$row['user_ui'];
                    $_SESSION['user_UID']=$row['user_uid'];
                    error("success");
                }

            }else{
              error("no-user");  
            }
        }
    }


}else{
    error("invalid-source");
}