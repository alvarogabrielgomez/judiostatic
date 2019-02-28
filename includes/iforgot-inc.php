<?php

if(isset($_POST["iforgot-submit"])){

$selector = bin2hex(random_bytes(8));
$token = random_bytes(32);

$url = "omeleth.com/iforgot/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

$expires = date("U") + 1800;

require 'dbh-inc.php';

$userEmail = $_POST["email"];

$sql = "DELETE FROM pwdReset WHERE pwdReset_email=?";

$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error!";
    exit();
}else{
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);
}

$sql = "INSERT INTO pwdReset(pwdReset_email, pwdReset_selector, pwdReset_token, pwdReset_expires) VALUES (?,?,?,?);";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error!";
    exit();
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