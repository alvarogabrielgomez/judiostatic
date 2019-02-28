<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if(isset($_SESSION['client_id'])){
    require 'dbh-inc.php';
    $client_id_loged = $_SESSION['client_id'];

    $sql = "
SELECT * 
FROM clients
WHERE client_id = $client_id_loged
AND active <> 0

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
    header("Location: login.php");
    exit();
}