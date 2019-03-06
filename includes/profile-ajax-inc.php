<?php   
header("Content-type:application/json");
if(isset($_POST['transqr'])){
    require 'dbh-inc.php';
    $Dtransqr = json_decode($_POST['transqr']);
    $transqr = "%".$Dtransqr."";
    //some php operation
    $sql  = "
        SELECT b.buss_name, b.buss_dir, t.transaction_qr
        FROM transactions as t
        JOIN buss as b
        on b.buss_id = t.buss_id
        WHERE t.transaction_qr like ?";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        $data['response'] = "error";
        $data['content']  = "SQL ERROR (SEL)";
    }
    else {
        mysqli_stmt_bind_param($stmt, "s", $transqr);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)) {
            $data['buss_name'] = $row['buss_name'];
            $data['buss_dir'] = $row['buss_dir'];
        } //$row = mysqli_fetch_assoc($result)
        else {
            $data['response'] = "error";
            $data['content']  = "BUSS NOT FOUND (SEL)";
        }
    }
    
    echo json_encode($data);
   }