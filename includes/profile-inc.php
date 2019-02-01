<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if(isset($_SESSION['client_id'])){
    require 'dbh-inc.php';
    $client_id_loged = $_SESSION['client_id'];

    $sql = "
SELECT c.client_id, c.client_first, c.client_last, c.client_email, t.post_id, t.transaction_qr, t.updated_at, DATE_FORMAT(t.updated_at, '%Y-%m-%d') as updated_at_date, DATE_FORMAT(t.updated_at, '%H:%i:%s') as updated_at_hour , t.finished, p.title, p.description, p.offer_end_at, p.price_new, p.price_from, p.post_hero_img_url, b.buss_name, b.buss_dir, b.buss_phone, b.cover_url
FROM clients as c
JOIN transactions as t
    on c.client_id = t.client_id
JOIN posts as p
    on t.post_id = p.post_id
JOIN buss as b
    on t.buss_id = b.buss_id
WHERE c.client_id = $client_id_loged
AND c.active <> 0
";
$results=mysqli_query($conn, $sql);
$resultsCheck=mysqli_num_rows($results);
$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
if($resultsCheck < 1){
    echo 'SQL ERROR C100';
    exit();
}else{

    $client_first = mysqli_real_escape_string($conn, $row['client_first']);
    $client_last = mysqli_real_escape_string($conn, $row['client_last']);
    $client_email = mysqli_real_escape_string($conn, $row['client_email']);

    
    $post_title = mysqli_real_escape_string($conn, $row['title']);
    $post_desc = mysqli_real_escape_string($conn, $row['description']);
    $post_price_from =mysqli_real_escape_string($conn,  $row['price_from']);
    $post_price_new =mysqli_real_escape_string($conn,  $row['price_new']);
    $post_offer_end_at = mysqli_real_escape_string($conn, $row['offer_end_at']);

    $trans_updated_at =mysqli_real_escape_string($conn,  $row['updated_at']);
    $transqr =mysqli_real_escape_string($conn,  $row['transaction_qr']);
    $finished =mysqli_real_escape_string($conn,  $row['finished']);


    $post_buss_name =mysqli_real_escape_string($conn,  $row['buss_name']);
    $post_buss_dir = mysqli_real_escape_string($conn, $row['buss_dir']);
    $post_buss_phone =mysqli_real_escape_string($conn,  $row['buss_phone']);
    $post_buss_cover =mysqli_real_escape_string($conn,  $row['cover_url']);

    $post_hero_img = mysqli_real_escape_string($conn, $row['post_hero_img_url']);

    $post_porcent_offer = round(($post_price_new/$post_price_from)*100);

    $updated_at_date = mysqli_real_escape_string($conn, $row['updated_at_date']);
    $updated_at_hour = mysqli_real_escape_string($conn, $row['updated_at_hour']);

    function imprimirTiempo($fecha,$hora){
        $start_date = new DateTime($fecha." ".$hora);
        $since_start = $start_date->diff(new DateTime(date("Y-m-d")." ".date("H:i:s")));
        echo "Hace ";
        if($since_start->y==0){
            if($since_start->m==0){
                if($since_start->d==0){
                   if($since_start->h==0){
                       if($since_start->i==0){
                          if($since_start->s==0){
                             echo $since_start->s.' segundos';
                          }else{
                              if($since_start->s==1){
                                 echo $since_start->s.' segundo'; 
                              }else{
                                 echo $since_start->s.' segundos'; 
                              }
                          }
                       }else{
                          if($since_start->i==1){
                              echo $since_start->i.' minuto'; 
                          }else{
                            echo $since_start->i.' minutos';
                          }
                       }
                   }else{
                      if($since_start->h==1){
                        echo $since_start->h.' hora';
                      }else{
                        echo $since_start->h.' horas';
                      }
                   }
                }else{
                    if($since_start->d==1){
                        echo $since_start->d.' día';
                    }else{
                        echo $since_start->d.' días';
                    }
                }
            }else{
                if($since_start->m==1){
                   echo $since_start->m.' mes';
                }else{
                    echo $since_start->m.' meses';
                }
            }
        }else{
            if($since_start->y==1){
                echo $since_start->y.' año';
            }else{
                echo $since_start->y.' años';
            }
        }
    }







}



}else{
    require 'login.php'; // Main Items php
    exit();
}