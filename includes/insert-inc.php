<?php
header("Content-type:application/json");
require 'deals_pages-inc.php';

$error = false;
$first = mysqli_real_escape_string($conn, $_POST['first']);
$last  = mysqli_real_escape_string($conn, $_POST['last']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
if (empty($first) || empty($last) || empty($email)) {
    $error = true;
} //empty($first) || empty($last) || empty($email)

if ($error == false) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $data['response'] = "error";
        $data['content']  = "Email Invalido";
    } //!filter_var($email, FILTER_VALIDATE_EMAIL)
    else {
        $sql  = "SELECT buss_limits FROM buss WHERE buss_id = ?";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)) {
                            $data['response'] = "error";
                            $data['content']  = "SQL ERROR (LIMITS)";
                        } //!mysqli_stmt_prepare($stmt, $sql)
                        else {
                            mysqli_stmt_bind_param($stmt, "s", $post_buss_id);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            if($row = mysqli_fetch_assoc($result)) {
                                $buss_limits = $row['buss_limits'];
                            } //$row = mysqli_fetch_assoc($result)
                            else {
                                $data['response'] = "error";
                                $data['content']  = "BUSS NOT FOUND (LIMITS)";
                            }
        }

        $sql  = "SELECT * FROM clients WHERE client_email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $data['response'] = "error";
            $data['content']  = "SQL ERROR.";
        } //!mysqli_stmt_prepare($stmt, $sql)
        else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
            // El usuario si existia en la tabla clients
                $active = $row['active'];
                $client_id = $row['client_id'];
                if($active !== 1){
                    $data['response'] = "error";
                    $data['content']  = "Usuario Baneado o desactivado";
                } else if ($active == 1){
                session_start();
                $_SESSION['client_id']    = $row['client_id'];
                $_SESSION['client_email'] = $row['client_email'];
                $_SESSION['client_first'] = $row['client_first'];
                $_SESSION['client_last']  = $row['client_last'];
                
                $sql  = "SELECT buss_id, client_id, post_id, CONCAT(DAY(updated_at), '-' , date_format(updated_at , '%m'), '-' , YEAR(updated_at)) as data_unformated, CONCAT( date_format(`updated_at` , '%d'), date_format(`updated_at` , '%y') ) as updated_at, limit_count FROM buylimits WHERE client_id = ? AND buss_id = $post_buss_id AND DAY(updated_at) = DAY(NOW())";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    $data['response'] = "error";
                    $data['content']  = "SQL ERROR (LIMITS) C120";

                } //!mysqli_stmt_prepare($stmt, $sql)
                else {
                    mysqli_stmt_bind_param($stmt, "s", $client_id);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if($row = mysqli_fetch_assoc($result)) {

                    $day_now = date("d-m-Y");
                    $day_updated_at = $row['data_unformated'];
                    //$day_updated_at = $row['updated_at'];
                    $limit_count = $row['limit_count'];
                    //$data_unformated = $row['data_unformated'];


                        if($day_now == $day_updated_at){
                            if($limit_count < $buss_limits) {
                                $sql  = "UPDATE `buylimits` SET `limit_count` = $limit_count+1 WHERE client_id = ? AND DAY(updated_at) = DAY(NOW()) AND buss_id = $post_buss_id";
                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt, $sql)) {
                                    $data['response'] = "error";
                                    $data['content']  = "SQL ERROR (LIMITS_COUNT)";
                                } //!mysqli_stmt_prepare($stmt, $sql)
                                else {
                                    mysqli_stmt_bind_param($stmt, "s", $client_id);
                                    mysqli_stmt_execute($stmt);
                                    $data['response']         = "success";
                                    $data['content']          = "Bienvenido de nuevo";
                                    // transaction_insert();
                                     $sql  = "INSERT INTO transactions (post_id, buss_id, client_id, transaction_qr) VALUES (?, ?, ?, ?)";
                                     $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                       $data['response'] = "error";
                                      $data['content']  = "SQL ERROR.";
                                 } //!mysqli_stmt_prepare($stmt, $sql)
                                 else {
                                      $transqr   = $client_id . $post_url_id . random_int(1, 1000000) . $post_buss_id;
                                      mysqli_stmt_bind_param($stmt, "ssss", $post_url_id, $post_buss_id, $client_id, $transqr);
                                      mysqli_stmt_execute($stmt);
                                      $_SESSION['actual_transaction'] = $transqr;
                                       $data['transqr']                = $transqr;
                        
                                 }
                                }
    
                            }else if ($limit_count >= $buss_limits){
                                $data['response'] = "error";
                                $data['content']  = "Has pedido muchos cupones de un mismo lugar, prueba otro dia.";
    
                            }
                        }// if $day_now == $day_updated_at 
                        else if ($day_now !== $day_updated_at){
     

                                $data['response'] = "error";
                                $data['content']  = "Time Unknown Error";

                        }// else if $day_now !== $day_updated_at
                        



                    } else {
                    // NO Encontro el cliente en la tabla buylimits

                



                    if ($day_now < $lastday_updated_at){
     

                        $data['response'] = "error";
                        $data['content']  = "Time Unknown Error";
  
                    }

                    $sql  = "INSERT INTO buylimits (buss_id, client_id, post_id) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        $data['response'] = "error";
                        $data['content']  = "SQL ERROR.";
                    } //!mysqli_stmt_prepare($stmt, $sql)
                    else {
                        mysqli_stmt_bind_param($stmt, "sss", $post_buss_id, $client_id, $post_url_id);
                        mysqli_stmt_execute($stmt);

                        $data['response']         = "success";
                        $data['content']          = "Bienvenido este nuevo dia";
                        $sql  = "INSERT INTO transactions (post_id, buss_id, client_id, transaction_qr) VALUES (?, ?, ?, ?)";
                        $stmt = mysqli_stmt_init($conn);
                       if (!mysqli_stmt_prepare($stmt, $sql)) {
                        $data['response'] = "error";
                        $data['content']  = "SQL ERROR.";
                        } //!mysqli_stmt_prepare($stmt, $sql)
                        else{
                            $transqr   = $client_id . $post_url_id . random_int(1, 1000000) . $post_buss_id;
                            mysqli_stmt_bind_param($stmt, "ssss", $post_url_id, $post_buss_id, $client_id, $transqr);
                            mysqli_stmt_execute($stmt);
                            $_SESSION['actual_transaction'] = $transqr;
                             $data['transqr']                = $transqr;
                        }


                     }
                    } //elseeeeee
                }
            }
            } //$row = mysqli_fetch_assoc($result)

            else {
            //en caso de que el usuario no existia 
                $sql  = "INSERT INTO clients (client_first, client_last, client_email) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    $data['response'] = "error";
                    $data['content']  = "SQL ERROR.";
                } //!mysqli_stmt_prepare($stmt, $sql)
                else {
                    mysqli_stmt_bind_param($stmt, "sss", $first, $last, $email);
                    mysqli_stmt_execute($stmt);
                    
                    $sql  = "SELECT * FROM clients WHERE client_email=? AND active = 1";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        $data['response'] = "error";
                        $data['content']  = "SQL ERROR.";
                    } //!mysqli_stmt_prepare($stmt, $sql)
                    else {
                        mysqli_stmt_bind_param($stmt, "s", $email);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if ($row = mysqli_fetch_assoc($result)) {
                            session_start();
                            $_SESSION['client_id']    = $row['client_id'];
                            $_SESSION['client_email'] = $row['client_email'];
                            $_SESSION['client_first'] = $row['client_first'];
                            $_SESSION['client_last']  = $row['client_last'];
                            $data['response']         = "success";
                            $data['content']          = "Bienvenido!";

                            $sql  = "INSERT INTO buylimits (buss_id, client_id, post_id) VALUES (?, ?, ?)";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                $data['response'] = "error";
                                $data['content']  = "SQL ERROR.";
                            } //!mysqli_stmt_prepare($stmt, $sql)
                            else {
                                mysqli_stmt_bind_param($stmt, "sss", $post_buss_id, $client_id, $post_url_id);
                                mysqli_stmt_execute($stmt);
                            }
                            //    transaction_insert();
                            $sql  = "INSERT INTO transactions (post_id, buss_id, client_id, transaction_qr) VALUES (?, ?, ?, ?)";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                $data['response'] = "error";
                                $data['content']  = "SQL ERROR.";
                            } //!mysqli_stmt_prepare($stmt, $sql)
                            else {
                                $client_id = $row['client_id'];
                                $transqr   = $client_id . $post_url_id . random_int(1, 1000000) . $post_buss_id;
                                mysqli_stmt_bind_param($stmt, "ssss", $post_url_id, $post_buss_id, $client_id, $transqr);
                                mysqli_stmt_execute($stmt);
                                $_SESSION['actual_transaction'] = $transqr;
                                $data['transqr']                = $transqr;
                                
                            }
                        } //$row = mysqli_fetch_assoc($result)
                        else {
                            $data['response'] = "error";
                            $data['content']  = "Error al registrar.";
                        }
                    }
                    
                }
                
                
            }
        }
        
    }
} //$error == false
else {
    $data['response'] = "error";
    $data['content']  = "Campos Vacios.";
}



echo json_encode($data);