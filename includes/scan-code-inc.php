<?php
require 'dbh-inc.php';

if(isset($_POST['codeScaned'])){

    $code = mysqli_real_escape_string($conn,$_POST['codeScaned']);

   


$sql="
SELECT c.client_first, c.client_last, t.transaction_qr, t.updated_at, t.finished, p.title, p.offer_end_at, p.price_new, b.buss_name
FROM transactions as t
JOIN posts as p
    ON  p.post_id = t.post_id
JOIN buss as b
    on t.buss_id = b.buss_id
JOIN clients as c
    ON c.client_id = t.client_id

WHERE t.transaction_qr = $code
ORDER BY t.transaction_id
";
    $results=mysqli_query($conn, $sql);
    $resultsCheck=mysqli_num_rows($results);
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
    if($resultsCheck < 1){
        $data['response'] = "Codigo no encontrado";

        exit();
    }else{
        
        $post_title = mysqli_real_escape_string($conn, $row['title']);
        $post_offer_end_at = mysqli_real_escape_string($conn, $row['offer_end_at']);
        $post_price_new =mysqli_real_escape_string($conn,  $row['price_new']);
        $post_buss_name = mysqli_real_escape_string($conn, $row['buss_name']);
        $client_first = mysqli_real_escape_string($conn, $row['client_first']);
        $client_last = mysqli_real_escape_string($conn, $row['client_last']);
        $finished = mysqli_real_escape_string($conn, $row['finished']);

        $sql= "UPDATE transactions SET finished = ? WHERE transaction_qr = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            $data['response'] = "error"; 
            
        }
        else{
            $finishedComplete= "1";
            mysqli_stmt_bind_param($stmt, "ss", $finishedComplete, $code);
            mysqli_stmt_execute($stmt);
            $data['response'] = "Finished";
            $data['client_first'] = $client_first;
            $data['client_last'] = $client_last;
            $data['post_buss_name'] = $post_buss_name;
            $data['post_price_new'] = $post_price_new;
            $data['post_title'] = $post_title;
        }
    }

    echo json_encode($data);
}
