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
        $sql = "SELECT * FROM admins WHERE admin_uid=? OR admin_email=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            error("sqlerror");
        }
        else{




            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if($row = mysqli_fetch_assoc($result)){
                $sql = "SELECT * FROM admins WHERE admin_uid = '$mailuid' AND active = 1 OR admin_email = '$mailuid' AND active = 1;";
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck<1){
                    error('user-unactive');
                }else if($resultCheck>=1){
    
                    $pwdCheck = password_verify($password, $row['admin_pwd']);
                    if($pwdCheck == false){
                        error("wrong-pwd");
                    }
                    else if($pwdCheck == true){
                        session_start();
                        $_SESSION['admin_ID']=$row['admin_id'];
                        $_SESSION['admin_UID']=$row['admin_uid'];
                        error("success");
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