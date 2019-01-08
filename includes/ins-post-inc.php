<?php
 error_reporting(E_ALL);
 session_start();
 ini_set('display_errors', '1');
function error($message){
    header("Location: ../signup.php?signup=".$message);
    exit();
}

if( isset($_POST['post-submit']) ){

}
else{
    error("invalid-source");
}