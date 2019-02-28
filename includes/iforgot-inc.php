<?php
 error_reporting(E_ALL);
 ini_set('display_errors', '1');
 //mysqli_report(MYSQLI_REPORT_ALL);
 function error($message){
    header("Location: ../login.php?login=".$message);
    exit();
}
 
 if(isset($_POST["iforgot-submit"])){
    require 'dbh-inc.php';

$selector = bin2hex(random_bytes(8));
$token = random_bytes(32);

$url = "omeleth.com/iforgot/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

$expires = date("U") + 1800;

$userEmail = $_POST["email"];

$sql = "DELETE FROM pwdreset WHERE pwdReset_email = ?";

$stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        error("sqlerror-1");
    }
else{
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);
}

$sql = "INSERT INTO pwdreset(pwdReset_email, pwdReset_selector, pwdReset_token, pwdReset_expires) VALUES (?, ?, ?, ?);";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    error("sqlerror-2");
}else{
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt);
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
if(isset($_SESSION["client_id"])){
session_unset();
session_destroy();
}
$subject = 'Resetear tu password en Omeleth';
$to_id = $userEmail;
require 'email-mailer-iforgot.php';
header("location: ../iforgot/reset-password.php?reset=success");
}
else{
    header("location: ../index.php");
}