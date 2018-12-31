<?php
header("Content-type:application/json;charset=utf-8");
require 'deals_pages-inc.php';

$error=false;
$first = mysqli_real_escape_string($conn,$_POST['first']);
$last = mysqli_real_escape_string($conn,$_POST['last']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
if(empty($first) || empty($last) || empty($email)){
    $error = true;
}

if ($error == false) {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $data['response'] = "error"; 
        $data['content'] = "Email Invalido";  
    }
    else{
        $sql = "SELECT * FROM clients WHERE client_email=? AND active = 1";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            $data['response'] = "error"; 
            $data['content'] = "SQL ERROR.";
        }else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                session_start();
                $_SESSION['client_id']=$row['client_id'];
                $_SESSION['client_email']=$row['client_email'];
                $_SESSION['client_first']=$row['client_first'];
                $_SESSION['client_last']=$row['client_last'];
                $data['response'] = "success"; 
                $data['content'] = "Bienvenido de nuevo";

                // transaction_insert();
                $sql = "INSERT INTO transactions (post_id, client_id, transaction_qr) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    $data['response'] = "error"; 
                    $data['content'] = "SQL ERROR.";
                }
                else{
                    $client_id = $row['client_id'];
                    $transqr = $post_url_id.$client_id.random_int(1, 1000000);
                    mysqli_stmt_bind_param($stmt, "sss", $post_url_id, $client_id, $transqr);
                    mysqli_stmt_execute($stmt);
                    $_SESSION['actual_transaction']=$transqr;
                    $data['transqr'] = $transqr;
            
                }
                }else{
                    $sql = "INSERT INTO clients (client_first, client_last, client_email) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        $data['response'] = "error"; 
                        $data['content'] = "SQL ERROR.";
                    }
                    else{
                        mysqli_stmt_bind_param($stmt, "sss", $first, $last, $email);
                        mysqli_stmt_execute($stmt);
                        
                        $sql = "SELECT * FROM clients WHERE client_email=?";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)){
                           $data['response'] = "error"; 
                           $data['content'] = "SQL ERROR.";
                        }else{
                           mysqli_stmt_bind_param($stmt, "s", $email);
                           mysqli_stmt_execute($stmt);
                           $result = mysqli_stmt_get_result($stmt);
                           if($row = mysqli_fetch_assoc($result)){
                            session_start();
                               $_SESSION['client_id']=$row['client_id'];
                               $_SESSION['client_email']=$row['client_email'];
                               $_SESSION['client_first']=$row['client_first'];
                               $_SESSION['client_last']=$row['client_last'];
                               $data['response'] = "success"; 
                               $data['content'] = "Bienvenido!";
                               $data['transqr'] = $transqr;
                            //    transaction_insert();
                            $sql = "INSERT INTO transactions (post_id, client_id, transaction_qr) VALUES (?, ?, ?)";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                $data['response'] = "error"; 
                                $data['content'] = "SQL ERROR.";
                            }
                            else{
                                $client_id = $row['client_id'];
                                $transqr = $post_url_id.$client_id.random_int(1, 1000000);
                                mysqli_stmt_bind_param($stmt, "sss", $post_url_id, $client_id, $transqr);
                                mysqli_stmt_execute($stmt);
                                $_SESSION['actual_transaction']=$transqr;
                                $data['transqr'] = $transqr;
                                 
                            }
                         }else{
                            $data['response'] = "error"; 
                            $data['content'] = "Error al registrar.";
                         }
                }
            
             }
            
            
        }
}

    }
}else {
    $data['response'] = "error";
    $data['content'] = "Campos Vacios.";
}



echo json_encode($data);




// function transaction_insert(){
//     $sql = "INSERT INTO transactions (post_id, client_id, transaction_qr) VALUES (?, ?, ?)";
//     $stmt = mysqli_stmt_init($conn);
//     if(!mysqli_stmt_prepare($stmt, $sql)){
//         $data['response'] = "error"; 
//         $data['content'] = "SQL ERROR.";
//     }
//     else{
//         $client_id = $row['client_id'];
//         $transqr = $post_url_id.$client_id.random_int(1, 1000000);
//         mysqli_stmt_bind_param($stmt, "sss", $post_url_id, $client_id, $transqr);
//         mysqli_stmt_execute($stmt);
//         $_SESSION['actual_transaction']=$transqr;

//     }

// }