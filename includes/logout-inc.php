<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if(isset($_POST['logout-submit'])){
session_start();
session_unset();
session_destroy();

header("Location: ../index.php?logout=success");
exit();

} 

if(isset($_GET['id'])){
    require 'dbh-inc.php';
    $post_url_id = mysqli_real_escape_string($conn, $_GET['id']);
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../deals.php?id=".$post_url_id);
 
}else{
    header("Location: ../index.php");
}

function logout($done){
    if(isset($_POST['logout-submit-noreload'])){
        session_start();
        session_unset();
        session_destroy();  
    }
}