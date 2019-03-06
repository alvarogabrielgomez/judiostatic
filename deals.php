<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'includes/deals-inc.php'; // deals php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=320, initial-scale=0.86, maximum-scale=0.86, minimum-scale=0.86"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $row['title'] ?> - Omeleth Cupon</title>

    <META NAME="Title" CONTENT="<?php echo $row['title']; ?> - Omeleth Cupon">
    <META NAME="Keywords" CONTENT="Cupon, Barato, Gourmet, Online, Rapido, Prazer">
    <META NAME="Subject" CONTENT="Cupon Business">
    <META NAME="Language" CONTENT="Portuguese">

    <link rel="preload" href="style.css" as= "style">
    <link rel="preload" href="css/responsive.css" as= "style">
    <link rel="preload" href="modalwindow/modalwindow.css" as= "style">
    <link rel="preload" href="img/icons/cupon-std.svg" as="image">

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
    <link rel="stylesheet" type="text/css" href="modalwindow/modalwindow.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">    
    <link href="https://fonts.googleapis.com/css?family=Oxygen:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/fontawesome.css" integrity="sha384-WK8BzK0mpgOdhCxq86nInFqSWLzR5UAsNg0MGX9aDaIIrFWQ38dGdhwnNCAoXFxL" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/regular.css" integrity="sha384-l+NpTtA08hNNeMp0aMBg/cqPh507w3OvQSRoGnHcVoDCS9OtgxqgR7u8mLQv8poF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/solid.css" integrity="sha384-aj0h5DVQ8jfwc8DA7JiM+Dysv7z+qYrFYZR+Qd/TwnmpDI6UaB3GJRRTdY8jYGS4" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"type="text/javascript" charset="utf-8"></script>
    <script src="js/qrious.min.js" async="async"></script>
    <link rel="stylesheet" type="text/css" href="css/animate.min.css"> 
<meta property="og:url"                content="https://omeleth.com/deals.php?id=<?php echo $post_url_id;?>" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="<?php echo $row['title']; ?>" />
<meta property="og:description"        content="<?php echo $row['description']; ?>" />
<meta property="og:image"              content="https://omeleth.com/<?php echo $post_hero_img; ?>" />
<meta property="fb:app_id"             content="238563567095772" />
</head>
<body>
<div id="themoderfoquer">
<?php
require 'components/header.php'; // Header php
require 'components/navbar.php'; // footer php
 ?>
<div id="time-bar">
    <div id="time-bar-container">
            <nav>
                <ul><?php
                $post_offer_formated=$post_offer_datatime->format('d-m');
                    if (strtotime($post_offer_end_at) > 1) {
                 if(time() - strtotime($post_offer_end_at) <= 0){
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
                }else if(time() - strtotime($post_offer_end_at) > 1){
                    echo '<li><div class="clock-time-deals clock-100"></div></li> <li style="">A oferta terminou no dia '.$post_offer_formated.'</li>';    
                }

                    }else{
                        echo '
                        <li><i style="font-size: 1.35em;color: #A6A4A4;margin: 14px 0px;" class="far fa-clock" ></i></li>
                        <li>'.$post_updated_at.'</li>';
                    }
                    ?>
                </ul>
            </nav>
    </div>
</div>
<section>
<div id="main-container"style = "margin-top:0px;">
     <div id="main">
    <div id="hero-deals-container">
    <div class="hero-deals-color">
        </div>
        <div id="hero-deals">
            <div class="col1">
 <?php if(time() - strtotime($row['created_at']) <= 3 * 86400){
          if(strtotime($row['offer_end_at']) > 1){
            if(time() - strtotime($post_offer_end_at) <= 0){

              if (abs(strtotime($row['created_at']) - strtotime($row['offer_end_at'])) <= 3 * 86400) {
              echo '
              <div class="speedy-container"><div class="clock-time-deals clock-speedy"></div></div>';
              }
            }
          }
        }
 ?>
                <div class="title-hero-deals"><?php echo $row['title'] ?></div>
                <div class="buss-title-hero-deals"><?php echo  $post_buss_name; ?></div>
                <div class="desc-art">
                    <p class="description-text">
                    Aproveite nossos cupons especiais (disponíveis por tempo limitado) para nossos clientes mais fiéis, não perca a oportunidade, você pode comprar em <strong><?php echo $post_buss_name; ?></strong> pagando menos, sabendo que o mais importante é a sua satisfação.<br></p>
                    <div class="buss-dir">
                    <i class="fas fa-map-marker-alt" style="margin-right:16px;"></i><?php echo $post_buss_dir; ?>
                    </div>
                    <div class="buss-phone">
                    <i class="fas fa-phone" style="margin-right:11px;"></i><?php echo $post_buss_phone; ?>
                    </div>    
                </p>
                <div id="b-hero-buss">
                <div class="buss-button button l-grey"><a href="deals.php?id='.$row['post_id'].'">Ver en Maps</a></div>
                <div class="buss-button-o button red"><a href="#main-posts-container">Ver Oferta</a></div>
                </div>
                </div>
            </div>
             <div class="col2">
                <div class="image-hero-container">
                <img src="<?php echo $post_hero_img; ?>" alt="image deals">
                 </div>
            </div>
            
        </div>
    
    </div>
         <div id="share-bar">
             <div id="share-bar-container">
                <nav>
                    <ul> 
                        <li><i style="font-size: 1.35em;color: #A6A4A4;margin: 14px 0px;" class="fas fa-share-alt" ></i></li>
                        <li>Compartilhar</li>
                    </ul>
                </nav>
            </div>
         </div>
         
         <div id="main-posts-container">
                <div class="main-post">    

<?php 
require 'modalwindow/modalwindow.php';
?>


<div id ="principal-small" style = "" class="cupon-std-small-vertical">
<div class="cupon-col1-small-vertical">
<div>VÁLIDO PARA UMA VEZ</div>
</div>
<div class="cupon-col2-small-vertical">
<div class="cupon-titulo-small-vertical"><span><?php echo $row['title']; ?></span></div>
<div class="cupon-desc-small-vertical"><span><?php echo $row['description']; ?></span>
</div>
</div>
<div class="cupon-col3-small-vertical">

<?php
if($post_offer_end_at > 1){
if(time() - strtotime($post_offer_end_at) <= 0){
?>
<button class="cupon-boton-small-vertical button red modaltrigger"><span>TOMAR OFERTA</span></button>
<?php
}else if (time() - strtotime($post_offer_end_at) > 1){
?>
<button id="disable-button"class="cupon-boton-small-vertical button b-disabled" disabled="disabled"><span>Oferta concluída</span></button>
<?php
}
}else{
?>
<button class="cupon-boton-small-vertical button red modaltrigger"><span>TOMAR OFERTA</span></button>
<?php
}
?>

<div class="cupon-descuento-small-vertical">
<span class="s-porcentaje-small-vertical">SALVE!</span>
<div class="porcentaje-small-vertical"><span><?php echo abs(round((($row['price_new']/$row['price_from'])*100)-100)); ?>%</span></div>

</div>
</div>
</div>


<div id = "principal-std" class="cupon-std">
<div class="cupon-col1">
<div>VÁLIDO PARA UMA VEZ</div>
</div>
<div class="cupon-col2">
<div class="cupon-titulo"><span><?php echo $row['title']; ?></span></div>
<div class="cupon-desc"><span><?php echo $row['description']; ?></span>
</div>
<?php
if($post_offer_end_at > 1){
if(time() - strtotime($post_offer_end_at) <= 0){
?>
<button class="cupon-boton button red modaltrigger"><span>TOMAR OFERTA</span></button>
<?php
}else if (time() - strtotime($post_offer_end_at) > 1){
?>
<button id="disable-button"class="cupon-boton button b-disabled" disabled="disabled"><span>Oferta concluída</span></button>
<?php
}
}else{
?>
<button class="cupon-boton button red modaltrigger"><span>TOMAR OFERTA</span></button>
<?php
}
?>
</div>
<div class="cupon-col3">
<div class="cupon-descuento">
<div class="porcentaje"><span><?php echo abs(round((($row['price_new']/$row['price_from'])*100)-100)); ?>%</span></div>
<span class="s-porcentaje">SALVE!</span>
</div>
</div>
</div>

<?php
require 'includes/related-inc.php';
//ofertas relacionadas
?>
</div>
</div> 
</div> 
</section>
</div>
<?php
require 'components/footer.php'; // footer php
?>
<script>


var isMobile;
function widthpx(){
    if($(document).width() <= 600){
      isMobile = true;
      $(".cupon-std-small-vertical").css("display", "flex");
      $(".cupon-std").css("display", "none");

    }else if($(document).width() >= 601){
      isMobile = false;
      $(".cupon-std-small-vertical").css("display", "none");
      $(".cupon-std").css("display", "flex");
    }
    var isSmallScreen;
    if($(document).width() <= 800){
        isSmallScreen = true;
        var Screen = $(document).width();
        var boxWidth = 728.6;
        var translatevar = (Screen/2) - (Screen*0.080) - (boxWidth/2);
      $(".cupon-std").css("transform", "scale(0.8) translate("+translatevar+"px)");

    }else if($(document).width() >= 801){
        isSmallScreen = false;
      $(".cupon-std").css("transform", "scale(1)");
    }

  }
widthpx();

window.onload = function() {
    //funciones a ejecutar
    
    window.addEventListener('resize', widthpx);
        // cargamos el icono en el div donde ira el contenido
        $(".modal-body").html("<img src='img/icons/loading.svg' class='loader' border='0' />");
        // cargamos la pagina en el div capa
        $(".modal-body").load('modalwindow/deals_pages/index.php?id=<?php echo $post_url_id;?>');

};
  function cargarContenido(pagina)
    {
        // cargamos el icono en el div donde ira el contenido
        $(".modal-body").html("<img style='float:none!important; display:block;margin:auto;' src='img/icons/loading.svg' class='loader' border='0' />");
        // cargamos la pagina en el div capa
        $(".modal-body").load(pagina);
    }
</script>
<script type="text/javascript" src="modalwindow/modalwindow.js"></script>
</body>
</html>