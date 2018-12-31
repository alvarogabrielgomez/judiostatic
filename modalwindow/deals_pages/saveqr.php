<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require '../../includes/deals_pages-inc.php';
$first = mysqli_real_escape_string($conn, $_SESSION['client_first']);
$last = mysqli_real_escape_string($conn, $_SESSION['client_last']);
$to_email = mysqli_real_escape_string($conn, $_SESSION['client_email']);

$transqr = mysqli_real_escape_string($conn, $_SESSION['actual_transaction']);
$uri = mysqli_real_escape_string($conn,$_POST['qruri']);

function base64ToImage($base64_string, $output_file) {
    $file = fopen($output_file, "wb");

    $data = explode(',', $base64_string);

    fwrite($file, base64_decode($data[1]));
    fclose($file);

    return $output_file;
}






$qruri = "".$uri;

$output_file_md5 = '../../temp/'.'qr-'.md5($transqr).'.png';

base64ToImage($qruri, $output_file_md5);

$sql = "
SELECT * FROM transactions WHERE transaction_qr = $transqr AND post_id = $post_url_id

";
    $results=mysqli_query($conn, $sql);
    $resultsCheck=mysqli_num_rows($results);
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
    if($resultsCheck < 1){
        echo 'ERROR SQL';
        echo $transqr;
        echo $post_url_id;
        exit();
    }else{

    }


echo $qruri;
require 'email-mailer.php';
    unset($transqr);
unlink($output_file_md5) or die("Couldn't delete file");
?>

