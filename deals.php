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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $row['title'] ?> - Omeleth Cupon</title>

    <META NAME="Title" CONTENT="<?php echo $row['title']; ?> - Omeleth Cupon">
    <META NAME="Keywords" CONTENT="Cupon, Barato, Gourmet, Online, Rapido, Prazer">
    <META NAME="Subject" CONTENT="Cupon Business">
    <META NAME="Language" CONTENT="Portuguese">

    <link rel="preload" href="style.css" as= "style">
    <link rel="preload" href="css/responsive.css" as= "style">
    <link rel="preload" href="modalwindow/modalwindow.css" as= "style">

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"type="text/javascript" charset="utf-8"></script>

    <script src="js/qrious.min.js" async="async"></script>
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
?>




<!--Final main portada-->
        <?php
            require 'components/navbar.php'; // footer php
        ?>

<div id="time-bar">
    <div id="time-bar-container">
            <nav>
                <ul> 
                    <li><i style="font-size: 1.35em;color: #A6A4A4;margin: 14px 0px;" class="far fa-clock" ></i></li>
                    <li><?php echo $post_updated_at; ?></li>
                </ul>
            </nav>
    </div>
</div>

<section>
<div id="main-container">
     <div id="main">
    <div id="hero-deals-container">
    <div class="hero-deals-color">
        </div>
        <div id="hero-deals">

            <div class="col1">
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
echo '<div class="cupon-std">
<div class="cupon-col1">
<div>VÁLIDO PARA UMA VEZ</div>
</div>
<div class="cupon-col2">
<div class="cupon-titulo"><span>'.$row['title'].'</span></div>
<div class="cupon-desc"><span>'.$row['description'].'</span>
</div>
<button id="modaltrigger"class="cupon-boton button red"><span>TOMAR OFERTA</span></button>
</div>
<div class="cupon-col3">
<div class="cupon-descuento">
<div class="porcentaje"><span>'. abs(round((($row['price_new']/$row['price_from'])*100)-100))  .'%</span></div>
<span class="s-porcentaje">SALVE!</span>
</div>
</div>
</div>';



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
window.onload = function() {
  //funciones a ejecutar

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




<link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/regular.css" integrity="sha384-l+NpTtA08hNNeMp0aMBg/cqPh507w3OvQSRoGnHcVoDCS9OtgxqgR7u8mLQv8poF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/solid.css" integrity="sha384-aj0h5DVQ8jfwc8DA7JiM+Dysv7z+qYrFYZR+Qd/TwnmpDI6UaB3GJRRTdY8jYGS4" crossorigin="anonymous">
</body>

</html>