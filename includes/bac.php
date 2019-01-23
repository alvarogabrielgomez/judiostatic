<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
header("Content-type:application/json");
require 'deals_pages-inc.php';
$error = false;
$first = mysqli_real_escape_string($conn, $_POST['first']);
$last  = mysqli_real_escape_string($conn, $_POST['last']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

// function verifyLimits()
// {
//     global $conn, $post_url_id, $client_id, $post_buss_id;
//     $sql  = "SELECT * FROM buylimits WHERE client_id = ? AND DAY(updated_at) = DAY(NOW())";
//     $stmt = mysqli_stmt_init($conn);
//     if(!mysqli_stmt_prepare($stmt, $sql)) {
//         $data['response'] = "error";
//         $data['content']  = "SQL ERROR (LIMITS)";
//     } //!mysqli_stmt_prepare($stmt, $sql)
//     else {
//         mysqli_stmt_bind_param($stmt, "s", $client_id);
//         mysqli_stmt_execute($stmt);
//         $result = mysqli_stmt_get_result($stmt);
//         if($row = mysqli_fetch_assoc($result)) {
//             // Encontro el cliente en la tabla buylimits
//             $limit_count = $row['limit_count'];
//             fetchBussLimits(); //buss_limits
//             if($limit_count < $buss_limits) {
//                 $sql  = "UPDATE `buylimits` SET `limit_count` = ++$limit_count WHERE client_id = ? AND DAY(updated_at) = DAY(NOW())";
//                 $stmt = mysqli_stmt_init($conn);
//                 if(!mysqli_stmt_prepare($stmt, $sql)) {
//                     $data['response'] = "error";
//                     $data['content']  = "SQL ERROR (LIMITS)";
//                 } //!mysqli_stmt_prepare($stmt, $sql)
//                 else {
//                     mysqli_stmt_bind_param($stmt, "s", $client_id);
//                     mysqli_stmt_execute($stmt);
//                     transactionInsert();
//                 }
//             } //$limit_count < $buss_limits
//             else {
//                 // No encontro al cliente en la tabla buylimits
//                 $sql  = "INSERT INTO buylimits (buss_id, client_id, post_id, limit_count) VALUES (?, ?, ?)";
//                 $stmt = mysqli_stmt_init($conn);
//                 if(!mysqli_stmt_prepare($stmt, $sql)) {
//                     $data['response'] = "error";
//                     $data['content']  = "SQL ERROR (LIMITS)";
//                 } //!mysqli_stmt_prepare($stmt, $sql)
//                 else {
//                     mysqli_stmt_bind_param($stmt, "sss", $post_buss_id, $client_id, $post_url_id);
//                     mysqli_stmt_execute($stmt);
//                     transactionInsert();
//                 }
//             }
//         } //$row = mysqli_fetch_assoc($result)
//     }
// }

// function transactionInsert()
// {
//     global $first, $last, $email, $conn, $post_url_id, $client_id, $post_buss_id;

//     $sql  = "INSERT INTO transactions (post_id, buss_id, client_id, transaction_qr) VALUES (?, ?, ?, ?)";
//     $stmt = mysqli_stmt_init($conn);
//     if(!mysqli_stmt_prepare($stmt, $sql)) {
//         $data['response'] = "error";
//         $data['content']  = "SQL ERROR C200";
//     } //!mysqli_stmt_prepare($stmt, $sql)
//     else {
//         $client_id = $row['client_id'];
//         $transqr   = $client_id . $post_url_id . random_int(1, 1000000) . $post_buss_id;
//         mysqli_stmt_bind_param($stmt, "ssss", $post_url_id, $post_buss_id, $client_id, $transqr);
//         mysqli_stmt_execute($stmt);
//         $_SESSION['actual_transaction'] = $transqr;
//         $data['transqr']                = $transqr;
//     }
// }
// function fetchBussLimits()
// {
//     global $conn, $post_buss_id;
//     $sql  = "SELECT buss_limits FROM buss WHERE buss_id = ?";
//     $stmt = mysqli_stmt_init($conn);
//     if(!mysqli_stmt_prepare($stmt, $sql)) {
//         $data['response'] = "error";
//         $data['content']  = "SQL ERROR (LIMITS)";
//     } //!mysqli_stmt_prepare($stmt, $sql)
//     else {
//         mysqli_stmt_bind_param($stmt, "s", $post_buss_id);
//         mysqli_stmt_execute($stmt);
//         $result = mysqli_stmt_get_result($stmt);
//         if($row = mysqli_fetch_assoc($result)) {
//             $buss_limits = $row['buss_limits'];
//         } //$row = mysqli_fetch_assoc($result)
//         else {
//             $data['response'] = "error";
//             $data['content']  = "BUSS NOT FOUND (LIMITS)";
//         }
//     }
// }





if(empty($first) || empty($last) || empty($email)) {
    $error = true;
} //empty($first) || empty($last) || empty($email)
if($error == false) {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $data['response'] = "error";
        $data['content']  = "Email Invalido";
    } //!filter_var($email, FILTER_VALIDATE_EMAIL)
    else {
        $sql  = "SELECT * FROM clients WHERE client_email=? AND active = 1";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            $data['response'] = "error";
            $data['content']  = "SQL ERROR C101";
        } //!mysqli_stmt_prepare($stmt, $sql)
        else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)) {
                session_start();
                $client_id                = $row['client_id'];
                $_SESSION['client_id']    = $row['client_id'];
                $_SESSION['client_email'] = $row['client_email'];
                $_SESSION['client_first'] = $row['client_first'];
                $_SESSION['client_last']  = $row['client_last'];
                $data['response']         = "success";
                $data['content']          = "Bienvenido de nuevo";



                
                $sql  = "SELECT * FROM buylimits WHERE client_id = ? AND DAY(updated_at) = DAY(NOW())";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    $data['response'] = "error";
                    $data['content']  = "SQL ERROR (LIMITS)";
                } //!mysqli_stmt_prepare($stmt, $sql)
                else {
                    mysqli_stmt_bind_param($stmt, "s", $client_id);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if($row = mysqli_fetch_assoc($result)) {
                        // Encontro el cliente en la tabla buylimits
                        $limit_count = $row['limit_count'];
                        //buss_limits

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

                        if($limit_count < $buss_limits) {
                            $sql  = "UPDATE `buylimits` SET `limit_count` = ++$limit_count WHERE client_id = ? AND DAY(updated_at) = DAY(NOW())";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql)) {
                                $data['response'] = "error";
                                $data['content']  = "SQL ERROR (LIMITS)";
                            } //!mysqli_stmt_prepare($stmt, $sql)
                            else {
                                mysqli_stmt_bind_param($stmt, "s", $client_id);
                                mysqli_stmt_execute($stmt);
                                

                                $sql  = "INSERT INTO transactions (post_id, buss_id, client_id, transaction_qr) VALUES (?, ?, ?, ?)";
                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt, $sql)) {
                                    $data['response'] = "error";
                                    $data['content']  = "SQL ERROR C200";
                                } //!mysqli_stmt_prepare($stmt, $sql)
                                else {
                                    $client_id = $row['client_id'];
                                    $transqr   = $client_id . $post_url_id . random_int(1, 1000000) . $post_buss_id;
                                    mysqli_stmt_bind_param($stmt, "ssss", $post_url_id, $post_buss_id, $client_id, $transqr);
                                    mysqli_stmt_execute($stmt);
                                    $_SESSION['actual_transaction'] = $transqr;
                                    $data['transqr']                = $transqr;
                                }


                            }
                        } //$limit_count < $buss_limits
                        else {
                            // No encontro al cliente en la tabla buylimits
                            $sql  = "INSERT INTO buylimits (buss_id, client_id, post_id, limit_count) VALUES (?, ?, ?)";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql)) {
                                $data['response'] = "error";
                                $data['content']  = "SQL ERROR (LIMITS)";
                            } //!mysqli_stmt_prepare($stmt, $sql)
                            else {
                                mysqli_stmt_bind_param($stmt, "sss", $post_buss_id, $client_id, $post_url_id);
                                mysqli_stmt_execute($stmt);
                                

                                $sql  = "INSERT INTO transactions (post_id, buss_id, client_id, transaction_qr) VALUES (?, ?, ?, ?)";
                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt, $sql)) {
                                    $data['response'] = "error";
                                    $data['content']  = "SQL ERROR C200";
                                } //!mysqli_stmt_prepare($stmt, $sql)
                                else {
                                    $client_id = $row['client_id'];
                                    $transqr   = $client_id . $post_url_id . random_int(1, 1000000) . $post_buss_id;
                                    mysqli_stmt_bind_param($stmt, "ssss", $post_url_id, $post_buss_id, $client_id, $transqr);
                                    mysqli_stmt_execute($stmt);
                                    $_SESSION['actual_transaction'] = $transqr;
                                    $data['transqr']                = $transqr;
                                }


                            }
                        }
                    } //$row = mysqli_fetch_assoc($result)
                }






                

            } //$row = mysqli_fetch_assoc($result)
            else {
                $sql  = "INSERT INTO clients (client_first, client_last, client_email) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    $data['response'] = "error";
                    $data['content']  = "SQL ERROR C102";
                } //!mysqli_stmt_prepare($stmt, $sql)
                else {
                    mysqli_stmt_bind_param($stmt, "sss", $first, $last, $email);
                    mysqli_stmt_execute($stmt);
                    $sql  = "SELECT * FROM clients WHERE client_email=?";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)) {
                        $data['response'] = "error";
                        $data['content']  = "SQL ERROR C103";
                    } //!mysqli_stmt_prepare($stmt, $sql)
                    else {
                        mysqli_stmt_bind_param($stmt, "s", $email);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if($row = mysqli_fetch_assoc($result)) {
                            session_start();
                            $client_id                = $row['client_id'];
                            $_SESSION['client_id']    = $row['client_id'];
                            $_SESSION['client_email'] = $row['client_email'];
                            $_SESSION['client_first'] = $row['client_first'];
                            $_SESSION['client_last']  = $row['client_last'];
                            $data['response']         = "success";
                            $data['content']          = "Bienvenido!";







                            $sql  = "SELECT * FROM buylimits WHERE client_id = ? AND DAY(updated_at) = DAY(NOW())";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql)) {
                                $data['response'] = "error";
                                $data['content']  = "SQL ERROR (LIMITS)";
                            } //!mysqli_stmt_prepare($stmt, $sql)
                            else {
                                mysqli_stmt_bind_param($stmt, "s", $client_id);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                if($row = mysqli_fetch_assoc($result)) {
                                    // Encontro el cliente en la tabla buylimits
                                    $limit_count = $row['limit_count'];
                                    //buss_limits
                                    
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
            
                                    if($limit_count < $buss_limits) {
                                        $sql  = "UPDATE `buylimits` SET `limit_count` = ++$limit_count WHERE client_id = ? AND DAY(updated_at) = DAY(NOW())";
                                        $stmt = mysqli_stmt_init($conn);
                                        if(!mysqli_stmt_prepare($stmt, $sql)) {
                                            $data['response'] = "error";
                                            $data['content']  = "SQL ERROR (LIMITS)";
                                        } //!mysqli_stmt_prepare($stmt, $sql)
                                        else {
                                            mysqli_stmt_bind_param($stmt, "s", $client_id);
                                            mysqli_stmt_execute($stmt);
                                            
            
                                            $sql  = "INSERT INTO transactions (post_id, buss_id, client_id, transaction_qr) VALUES (?, ?, ?, ?)";
                                            $stmt = mysqli_stmt_init($conn);
                                            if(!mysqli_stmt_prepare($stmt, $sql)) {
                                                $data['response'] = "error";
                                                $data['content']  = "SQL ERROR C200";
                                            } //!mysqli_stmt_prepare($stmt, $sql)
                                            else {
                                                $client_id = $row['client_id'];
                                                $transqr   = $client_id . $post_url_id . random_int(1, 1000000) . $post_buss_id;
                                                mysqli_stmt_bind_param($stmt, "ssss", $post_url_id, $post_buss_id, $client_id, $transqr);
                                                mysqli_stmt_execute($stmt);
                                                $_SESSION['actual_transaction'] = $transqr;
                                                $data['transqr']                = $transqr;
                                            }
            
            
                                        }
                                    } //$limit_count < $buss_limits
                                    else {
                                        // No encontro al cliente en la tabla buylimits
                                        $sql  = "INSERT INTO buylimits (buss_id, client_id, post_id, limit_count) VALUES (?, ?, ?)";
                                        $stmt = mysqli_stmt_init($conn);
                                        if(!mysqli_stmt_prepare($stmt, $sql)) {
                                            $data['response'] = "error";
                                            $data['content']  = "SQL ERROR (LIMITS)";
                                        } //!mysqli_stmt_prepare($stmt, $sql)
                                        else {
                                            mysqli_stmt_bind_param($stmt, "sss", $post_buss_id, $client_id, $post_url_id);
                                            mysqli_stmt_execute($stmt);
                                            
            
                                            $sql  = "INSERT INTO transactions (post_id, buss_id, client_id, transaction_qr) VALUES (?, ?, ?, ?)";
                                            $stmt = mysqli_stmt_init($conn);
                                            if(!mysqli_stmt_prepare($stmt, $sql)) {
                                                $data['response'] = "error";
                                                $data['content']  = "SQL ERROR C200";
                                            } //!mysqli_stmt_prepare($stmt, $sql)
                                            else {
                                                $client_id = $row['client_id'];
                                                $transqr   = $client_id . $post_url_id . random_int(1, 1000000) . $post_buss_id;
                                                mysqli_stmt_bind_param($stmt, "ssss", $post_url_id, $post_buss_id, $client_id, $transqr);
                                                mysqli_stmt_execute($stmt);
                                                $_SESSION['actual_transaction'] = $transqr;
                                                $data['transqr']                = $transqr;
                                            }
            
            
                                        }
                                    }
                                } //$row = mysqli_fetch_assoc($result)
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



// Encontro el cliente en la tabla buylimits
                        $limit_count = $row['limit_count'];
                        if($limit_count < $buss_limits) {
                            $sql  = "UPDATE `buylimits` SET `limit_count` = ++$limit_count WHERE client_id = ? AND DAY(updated_at) = DAY(NOW())";
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
                            $data['content']  = "Has llegado a tu limite diario";

                        }