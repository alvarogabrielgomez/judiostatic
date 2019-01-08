<?php
 error_reporting(E_ALL);
 session_start();
 ini_set('display_errors', '1');
function error($message){
    header("Location: ../new-post.php?status=".$message);
    exit();
}

if( isset($_POST['post-submit']) ){
    require 'dbh-inc.php';

    $buss_name = mysqli_real_escape_string($conn,$_POST['buss_name_select']);
    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $new_price = mysqli_real_escape_string($conn,$_POST['new_price']);
    $old_price = mysqli_real_escape_string($conn,$_POST['old_price']);
    $final_offer = mysqli_real_escape_string($conn,$_POST['final_offer']);
    $post_hero_img = "img/tumb1.jpg";

    if(empty($buss_name) || empty($title) || empty($description)|| empty($new_price) || empty($old_price)){
    error("empty");
}else{

    $sql = "INSERT INTO posts (buss_id, title, `description`, post_hero_img_url, price_new, price_from, offer_end_at) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        error("sqlerror");
        echo("Statement failed: ". $stmt->error . "<br>");
    }

    else{

        mysqli_stmt_bind_param($stmt, "sssssss", $buss_name, $title, $description, $post_hero_img, $new_price, $old_price, $final_offer);
        mysqli_stmt_execute($stmt);


    
        header("Location: ../new-post.php?status=success");
        exit();
    }



}



}
else{
    header("Location: ../index.php?error=invalid-source");
    exit();
}