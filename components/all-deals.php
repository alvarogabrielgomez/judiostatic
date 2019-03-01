<?php
require 'includes/dbh-inc.php';
?>


<?php 
$sql ="
SELECT b.buss_name, b.buss_dir, b.buss_phone, b.buss_phone, b.buss_url, p.post_id, p.title, p.description, p.price_from, p.price_new, p.offer_end_at, p.created_at, p.updated_at, p.buss_id, p.post_hero_img_url, b.cover_url, CONCAT(YEAR(p.updated_at),'-', MONTH(p.updated_at), '-' , DAY(p.updated_at)) AS data
FROM posts as p
JOIN buss as b
    on b.buss_id = p.buss_id
    WHERE p.active <> 0
ORDER BY p.created_at DESC


";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=320, initial-scale=0.86, maximum-scale=0.86, minimum-scale=0.86"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todas las ofertas - Omeleth Cupon</title>

    <META NAME="Title" CONTENT="<?php echo $row['title']; ?> - Omeleth Cupon">
    <META NAME="Keywords" CONTENT="Cupon, Barato, Gourmet, Online, Rapido, Prazer">
    <META NAME="Subject" CONTENT="Cupon Business">
    <META NAME="Language" CONTENT="Portuguese">

    <link rel="preload" href="style.css" as= "style">
    <link rel="preload" href="css/responsive.css" as= "style">

<link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
<link rel="manifest" href="img/favicon/site.webmanifest">
<link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#bc2b19">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#bc2b19">

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">    
    <link href="https://fonts.googleapis.com/css?family=Oxygen:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/regular.css" integrity="sha384-l+NpTtA08hNNeMp0aMBg/cqPh507w3OvQSRoGnHcVoDCS9OtgxqgR7u8mLQv8poF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/solid.css" integrity="sha384-aj0h5DVQ8jfwc8DA7JiM+Dysv7z+qYrFYZR+Qd/TwnmpDI6UaB3GJRRTdY8jYGS4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/fontawesome.css" integrity="sha384-WK8BzK0mpgOdhCxq86nInFqSWLzR5UAsNg0MGX9aDaIIrFWQ38dGdhwnNCAoXFxL" crossorigin="anonymous"> 


<meta property="og:url"                content="https://omeleth.com/deals.php" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="Todas las ofertas de Omeleth Cupon" />
<meta property="og:description"        content="Aproveite nossos cupons especiais (disponíveis por tempo limitado) para nossos clientes mais fiéis, não perca a oportunidade, você pode comprar em seu lugar favorito pagando menos, sabendo que o mais importante é a sua satisfação." />
<meta property="og:image"              content="https://omeleth.com/img/omeleth_red_image.png" />
<meta property="fb:app_id"             content="238563567095772" />


</head>
<body>
    
<div id="themoderfoquer">

<?php
require 'components/header.php'; // Header php
require 'components/navbar.php'; // footer php
?>

<section>
<div id="main-container">
     <div id="main">
     <h1>Aqui estão todas as nossas ofertas</h1>
<h3>As melhores experiências gastronômicas</h3>
<div id="main-items">
<?php

$results=mysqli_query($conn, $sql);
$resultsCheck=mysqli_num_rows($results);

if($resultsCheck < 1){

        require'404-ini.php';
        exit();
    }
    else{

    

while($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
    $post_offer_end_at = $row['offer_end_at'];
    echo'
    <a href="deals.php?id='.$row['post_id'].'" class="main-box">

    <div class="main-img">
        <img src="'.$row['post_hero_img_url'].'" alt="">
    </div>

    <div class="buss-name"><span>'.$row['buss_name'].'</span></div>';
    

    if(time() - strtotime($row['created_at']) <= 3 * 86400){
        if(strtotime($row['offer_end_at']) > 1){
          if(time() - strtotime($post_offer_end_at) <= 0){

          if (abs(time() - strtotime($row['offer_end_at'])) <= 3 * 86400) {
            echo '<div class="badge">
            <span>OFERTA SPEEDY</span>
            </div>
            <div class="clock-time clock-speedy"></div>';
          }else if(abs(time() - strtotime($post_offer_end_at)) >= 2 * 86400){
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
      }
      else if (time() - strtotime($post_offer_end_at) > 1){
        echo '<div class="clock-time clock-100"></div>';
      }
      }else{
          echo '<div class="badge">
          <span>OFERTA DE ÚLTIMA HORA</span> </div>';
        }
      }

      if (time() - strtotime($row['created_at']) > 3 * 86400 && time() - strtotime($row['created_at']) <= 7 * 86400) {
        if(strtotime($row['offer_end_at']) > 1 ){
          if(time() - strtotime($post_offer_end_at) <= 0){
          if (abs(time() - strtotime($row['offer_end_at'])) < 3 * 86400 && abs(time() - strtotime($row['offer_end_at'])) > 2 * 86400) {
            echo '<div class="badge">
            <span>OFERTA POR ACABAMENTO</span>
            </div>
            <div class="clock-time clock-30"></div>
            ';
          }else if(abs(time() - strtotime($row['offer_end_at'])) < 2 * 86400){
            echo '<div class="badge">
            <span>OFERTA POR ACABAMENTO</span>
            </div>
            <div class="clock-time"></div>
            ';
          }else{
            echo '<div class="badge">
            <span>OFERTA DESTA SEMANA</span>
            </div>';
          }
        }else if (time() - strtotime($post_offer_end_at) > 1){
          echo '<div class="clock-time clock-100"></div>';
        }
        }
        
        else{
          echo '<div class="badge">
          <span>OFERTA DESTA SEMANA</span>
          </div>';
        }


        
      }

      if (strtotime($row['offer_end_at']) > 1 && time() - strtotime($row['created_at']) >= 8 * 86400) {
        if(time() - strtotime($post_offer_end_at) <= 0){
        
          if (abs(time() - strtotime($row['offer_end_at'])) < 3 * 86400 && abs(time() - strtotime($row['offer_end_at'])) > 2 * 86400) {
            echo '<div class="badge">
            <span>OFERTA POR ACABAMENTO</span>
            </div>
            <div class="clock-time clock-30"></div>
            ';
          }else if(abs(time() - strtotime($row['offer_end_at'])) < 2 * 86400){
            echo '<div class="badge">
            <span>OFERTA POR ACABAMENTO</span>
            </div>
            <div class="clock-time"></div>
            ';
          }else{
            if (abs(time() - strtotime($row['offer_end_at'])) >= 3 * 86400 && abs(time() - strtotime($row['offer_end_at'])) < 4 * 86400) {
              echo '<div class="clock-time clock-25"></div>'; 
            }else if(abs(time() - strtotime($row['offer_end_at'])) >= 4 * 86400 && abs(time() - strtotime($row['offer_end_at'])) <= 7 * 86400){
              echo '<div class="clock-time clock-15"></div>';
            }
          }

        }else if (time() - strtotime($post_offer_end_at) > 1){
          echo '<div class="clock-time clock-100"></div>';
        }
      }

      if (strtotime($post_offer_end_at) > 1 && abs(time() - strtotime($row['created_at'])) >= 3 * 86400) {
        if(time() - strtotime($post_offer_end_at) <= 0){
        if (abs(time() - strtotime($post_offer_end_at)) <= 2 * 86400) {
            echo '<div class="clock-time"></div></li>';
        }else if(abs(time() - strtotime($post_offer_end_at)) >= 2 * 86400){
            if(abs(time() - strtotime($post_offer_end_at)) >= 8 * 86400){
                echo '<div class="clock-time clock-7"></div>'; 
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
    }else if (time() - strtotime($post_offer_end_at) > 1){
      echo '<div class="clock-time clock-100"> <span class="span-clock">Oferta Acabou</span></div>';

    }
  }

  echo'

    
    <div class="box-title"><span>'.$row['title'].'</span></div>
    <div class="price-box">
    
        <div class="price-new"> <abbr title="BRL">R$</abbr><span>'.$row['price_new'].'</span>  </div>
        <div class="price-from"> <abbr title="BRL">R$</abbr> <span>'.$row['price_from'].'</span></div>

    </div>

    <p class="main-box-desc">
    '.$row['description'].'

    </p>

</a>
    
    ';
}

}

?>
</div>



     </div>
</div>
</section>
</div>

    

<?php
            require 'components/footer.php'; // footer php
?>
</body>
</html>





































