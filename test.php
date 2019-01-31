
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'includes/deals-inc.php'; // deals php
?>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php
$post_offer_formated=$post_offer_datatime->format('d-m');
if (strtotime($post_offer_end_at) > 1) {
    if (abs(time() - strtotime($post_offer_end_at)) <= 2 * 86400) {
        echo '<li><div class="clock-time-deals"></div></li> <li style="color:red;">A oferta está prestes a terminar no dia '.$post_offer_formated.'</li>';
    }else if(abs(time() - strtotime($post_offer_end_at)) >= 2 * 86400){
        if(abs(time() - strtotime($post_offer_end_at)) >= 8 * 86400){
            echo '<li><div class="clock-time-deals clock-7"></div></li> <li style="">A oferta termina no dia '.$post_offer_formated.'</li>'; 
        }else if(abs(time() - strtotime($post_offer_end_at)) <= 2 * 86400){
            echo '<li><div class="clock-time-deals clock-70"></div></li> <li style="">A oferta termina no dia '.$post_offer_formated.'</li>'; 
        }else if(abs(time() - strtotime($post_offer_end_at)) <= 3 * 86400 && abs(time() - strtotime($post_offer_end_at)) > 2 * 86400){
            echo '<li><div class="clock-time-deals clock-30"></div></li> <li style="">A oferta termina no dia '.$post_offer_formated.'</li>'; 
        }else if(abs(time() - strtotime($post_offer_end_at)) <= 4 * 86400 && abs(time() - strtotime($post_offer_end_at)) > 3 * 86400){
            echo '<li><div class="clock-time-deals clock-25"></div></li> <li style="">A oferta termina no dia '.$post_offer_formated.'</li>'; 
        }else if(abs(time() - strtotime($post_offer_end_at)) <= 7 * 86400 && abs(time() - strtotime($post_offer_end_at)) > 4 * 86400){
            echo '<li><div class="clock-time-deals clock-15"></div></li> <li style="">A oferta termina no dia '.$post_offer_formated.'</li>'; 
        }
    }
    }else{
        echo '
        <li><i style="font-size: 1.35em;color: #A6A4A4;margin: 14px 0px;" class="far fa-clock" ></i></li>
        <li>'.$post_updated_at.'</li>';
    }



    
    
    $test = '1548605000';

    echo time().' HOY <br>';
    echo strtotime($post_offer_end_at).' OFFER END AT <br>';
    echo strtotime($row['created_at']).' Created at <br>';
    $mierda = time() - strtotime($row['created_at']);
    
    echo $mierda.' DIFERENCIA ENTRE HOY Y Created at <br>';
    echo round($mierda/(60 * 60 * 24)).' Hace cuantos dias<br>';


    echo $test.' OFFER END AT TEST<br>';
    echo time() - strtotime($post_offer_end_at).' DIFERENCIA ENTRE HOY Y OFFER END AT <br>';
    echo time() - $test.' DIFERENCIA ENTRE HOY Y OFFER END AT TEST <br>';
    

    echo $test.' TEST <br>';
    echo strtotime($test).' TEST Strtotime<br>';

    echo (3 * 86400).' TRES DIAS <br>';

    echo strtotime($row['created_at']) - strtotime($row['offer_end_at']);


    



    if(time() - strtotime($row['created_at']) <= 3 * 86400){
        echo '<br>la oferta fue creada hace menos de 3 dias<br><br>';
        if(strtotime($row['offer_end_at']) > 1){

        if(time() - strtotime($post_offer_end_at) <= 0){
            echo 'Esta en el futuro';
            
            if (abs(strtotime($row['created_at']) - strtotime($row['offer_end_at'])) <= 3 * 86400) {
                echo '<div class="badge">
                <span>OFERTA SPEEDY</span>
                </div>
                <div class="clock-time clock-speedy"></div>';
            }else if(time() - strtotime($post_offer_end_at) > 3 * 86400){
                echo '<div class="badge">
                <span>OFERTA DE ÚLTIMA HORA</span> </div>';
                if(abs(time() - strtotime($post_offer_end_at)) >= 8 * 86400){
                    echo '<div class="clock-tim clock-7"></div>'; 
                }else if(abs(time() - strtotime($post_offer_end_at)) <= 2 * 86400){
                    echo '<div class="clock-time clock-70"></div>'; 
                }else if(abs(time() - strtotime($post_offer_end_at)) <= 3 * 86400 && abs(time() - strtotime($post_offer_end_at)) > 2 * 86400){
                    echo '<div class="clock-time clock-30"></div>'; 
                }else if(abs(time() - strtotime($post_offer_end_at)) <= 4 * 86400 && abs(time() - strtotime($post_offer_end_at)) > 3 * 86400){
                    echo '<div class="clock-time clock-25"></div>'; 
                }else if(abs(time() - strtotime($post_offer_end_at)) <= 7 * 86400 && abs(time() - strtotime($post_offer_end_at)) > 4 * 86400){
                    echo '<div class="clock-time clock-15"></div>';
                }
            }




        }else if(time() - strtotime($post_offer_end_at) > 1){
            echo 'Esta en el pasado';
            echo '<div class="clock-time clock-100"></div>';
        }

        }else{
            echo '<div class="badge">
            <span>OFERTA DE ÚLTIMA HORA</span> </div>';
          }




      }
      