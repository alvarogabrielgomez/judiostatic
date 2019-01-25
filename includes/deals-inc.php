<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


if(isset($_GET['id'])){
    require 'dbh-inc.php';
    $post_url_id = mysqli_real_escape_string($conn, $_GET['id']);
    if(is_numeric($post_url_id)) {
        

    $sql = "
    SELECT b.buss_name, b.buss_dir, b.buss_phone, b.buss_phone, b.buss_url, p.title, p.description, p.price_from, p.price_new, p.offer_end_at, p.created_at, p.updated_at, p.buss_id, p.post_hero_img_url, b.cover_url, CONCAT(YEAR(p.updated_at),'-', MONTH(p.updated_at), '-' , DAY(p.updated_at)) AS data
    FROM posts as p
    JOIN buss as b
        on b.buss_id = p.buss_id
    WHERE p.post_id = $post_url_id
    AND p.active <> 0
    
    
    ";
    
    $results=mysqli_query($conn, $sql);
    $resultsCheck=mysqli_num_rows($results);
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC);

    if($resultsCheck < 1){
        header("Location:index.php?error=404");
        exit();
    }else{
        
        $post_title = mysqli_real_escape_string($conn, $row['title']);
        $post_desc = mysqli_real_escape_string($conn, $row['description']);
        $post_price_from =mysqli_real_escape_string($conn,  $row['price_from']);
        $post_price_new =mysqli_real_escape_string($conn,  $row['price_new']);
        $post_offer_end_at = mysqli_real_escape_string($conn, $row['offer_end_at']);
        $post_offer_datatime = new DateTime($row['offer_end_at']);
        $post_created_at =mysqli_real_escape_string($conn,  $row['created_at']);
        $post_updated_at =mysqli_real_escape_string($conn,  $row['data']);
        $post_buss_id = mysqli_real_escape_string($conn, $row['buss_id']);
        $post_buss_name =mysqli_real_escape_string($conn,  $row['buss_name']);
        $post_buss_dir = mysqli_real_escape_string($conn, $row['buss_dir']);
        $post_buss_phone =mysqli_real_escape_string($conn,  $row['buss_phone']);
        $post_buss_url = mysqli_real_escape_string($conn, $row['buss_url']);
        $post_hero_img = mysqli_real_escape_string($conn, $row['post_hero_img_url']);
        $cover_url = mysqli_real_escape_string($conn, $row['cover_url']);
        $post_porcent_offer = round(($post_price_new/$post_price_from)*100);
    



    }
    }else{
        header("Location:index.php");
        exit();
    }





}else{
    header("Location:index.php");
    exit();
}