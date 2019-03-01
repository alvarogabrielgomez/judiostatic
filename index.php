<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <META NAME="Title" CONTENT="Omeleth Cupon - Cupons online baratos e rápidos.">
    <META NAME="Keywords" CONTENT="Cupon, Barato, Gourmet, Online, Rapido, Prazer">
    <META NAME="Subject" CONTENT="Cupon Business">
    <META NAME="Language" CONTENT="Portuguese">

    <title>Omeleth Cupon - Cupons online baratos e rápidos.</title>
    
<meta property="og:url"                content="https://omeleth.com" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="Omeleth Cupon" />
<meta property="og:description"        content="Conte conosco para resolver o seu dia, e você pode dar o seu prazer quando quiser. Cupons online baratos e rápidos." />
<meta property="og:image"              content="https://omeleth.com/img/omeleth_red_image.png" />
<meta property="fb:app_id"             content="238563567095772" />

    <link rel="preload" href="img/icons/main-box-loading.svg" as="image">
    <link rel="preload" href="style.css" as= "style">
    <link rel="preload" href="css/responsive.css" as= "style">
    <link rel="preload" href="img/hero/hero-img-mobile.jpg" as="image"  media="(max-width: 799px)">
    <link rel="preload" href="img/hero/hero-img.jpg" as="image"  media="(min-width: 800px)">
    <link rel="preload" href="components/slick/slick-theme.css" as= "style">
    <link rel="preload" href="components/slick/slick.css" as= "style">
    <link rel="preload" href="components/slick/slick.min.js" as="script">

   
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
    <link rel="stylesheet" type="text/css" href="components/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="components/slick/slick-theme.css"/>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"type="text/javascript" charset="utf-8"></script>


    <link href="https://fonts.googleapis.com/css?family=Oxygen:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/regular.css" integrity="sha384-l+NpTtA08hNNeMp0aMBg/cqPh507w3OvQSRoGnHcVoDCS9OtgxqgR7u8mLQv8poF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/solid.css" integrity="sha384-aj0h5DVQ8jfwc8DA7JiM+Dysv7z+qYrFYZR+Qd/TwnmpDI6UaB3GJRRTdY8jYGS4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/fontawesome.css" integrity="sha384-WK8BzK0mpgOdhCxq86nInFqSWLzR5UAsNg0MGX9aDaIIrFWQ38dGdhwnNCAoXFxL" crossorigin="anonymous"> 
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    
</head>

<body>

<div id="themoderfoquer">

<header id="header" class="index-h">
   <div id="header-container">
        <nav id="header-logo">
            <ul>
                <!-- <li id="header-logo-img"><a href="#"><img src="" alt=""></a></li> -->
                <li id=""><div id="header-logo-container" class="hero-logo"></div></li>
            </ul>
        </nav>
        <div id="header-container-menu">
            <nav id="header-menu">
                <ul id="header-menu-buttoms">
                    <li><a href="index.php">Home</a></li>
                    <?php if(isset($_SESSION['admin_ID'])){
                            echo '<li><a href="new-post.php">New Post</a></li>';
                    }
                    else{
                     //   echo '<li><a href="#main">About</a></li>';
                    }
                    ?>


                    <?php if(isset($_SESSION['admin_ID']) || isset($_SESSION['buss_ID']) ){
                            echo '<li><a href="scan-code.php">Scan QR</a></li>';
                    }else{
                     //  echo '<li><a href="#main">Contacto</a></li>';
                    }
                    ?>
                    
                
                    
                        <?php
                        require 'components/login-status.php';
                        ?>
                    
                </ul>
                
            </nav>
        </div>
    </div>
        <!--Final de contenedor header-->
</header>


<?php
require 'components/main-hero.php'; // Header php
?>

<!--Final main portada-->
<section>
<div id="main-container">
     <div id='main'>
     <h1>Se você se dá um gosto?</h1>
<h3>As melhores ofertas online por dia.</h3>


<script type="text/javascript" src="components/slick/slick.min.js"></script>

<div id="onload-carousel">
    <!-- Aca carga el carousel -->
    <div id='loader-carousel'>
        <img style='float:none!important; display:block;margin:auto;' src='img/icons/loading.svg' class='loader'>
        <span style='text-align:center;margin:auto; display:block;font-size: 16px;'>Carregando Ofertas</span>
    </div>
    
</div>


<script>


var isMobile;
function widthpx(){
    if($(document).width() <= 800){
      isMobile = true;
      $("#onload-carousel").css("background-position", "center");

    }else if($(document).width() >= 801){
      isMobile = false;
      $("#onload-carousel").css("background-position", "left");

    }

  }
widthpx();
window.onload = function() {
  //funciones a ejecutar
  $("#onload-carousel").load("components/carousel.php");
  window.addEventListener('resize', widthpx);
}

</script>


        <?php
            require 'components/main-posts.php'; // Main posts php
        ?>
              


    </div>  
</div> 

</section>

</div>
        <?php
            require 'components/footer.php'; // footer php
        ?>

</body>

</html>