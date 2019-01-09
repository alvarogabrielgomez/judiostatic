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
    <title>JUDIOSTATIC</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="components/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="components/slick/slick-theme.css"/>



    <link href="https://fonts.googleapis.com/css?family=Oxygen:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/regular.css" integrity="sha384-l+NpTtA08hNNeMp0aMBg/cqPh507w3OvQSRoGnHcVoDCS9OtgxqgR7u8mLQv8poF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/solid.css" integrity="sha384-aj0h5DVQ8jfwc8DA7JiM+Dysv7z+qYrFYZR+Qd/TwnmpDI6UaB3GJRRTdY8jYGS4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/fontawesome.css" integrity="sha384-WK8BzK0mpgOdhCxq86nInFqSWLzR5UAsNg0MGX9aDaIIrFWQ38dGdhwnNCAoXFxL" crossorigin="anonymous"> 
</head>

<body>
    
<div id="themoderfoquer">

<header id="header" class="index-h">
   <div id="header-container">
        <nav id="header-logo">
            <ul>
                <!-- <li id="header-logo-img"><a href="#"><img src="" alt=""></a></li> -->
                <li id="header-logo-spam">JUDIOSTATIC</li>
            </ul>
        </nav>
        <div id="header-container-menu">
            <nav id="header-menu">
                <ul id="header-menu-buttoms">
                    <li><a href="index.php">Inicio</a></li>
                    <?php if(isset($_SESSION['admin_ID'])){
                            echo '<li><a href="new-post.php">New Post</a></li>';
                    }
                    else{
                        echo '<li><a href="#main">About</a></li>';
                    }
                    ?>


                    <?php if(isset($_SESSION['admin_ID']) || isset($_SESSION['buss_ID']) ){
                            echo '<li><a href="scan-code.php">Scan QR</a></li>';
                    }else{
                        echo '<li><a href="#main">Contacto</a></li>';
                    }
                    ?>
                    
                    <li class="login-status">
                    
                        <?php


                        if(isset($_SESSION['admin_ID'])){
                            echo '<span><a href="admin.php"><i style="font-size: 1.35em;color: #FFF;margin: 14px 0px;letter-spacing: 16px;" class="fas fa-user-tie" ></i>  Admin</a></span>';
                        }else if(isset($_SESSION['client_id'])){
                            echo '<span><a href="profile.php"><i style="font-size: 1.35em;color: #FFF;margin: 14px 0px;letter-spacing: 16px;" class="fas fa-user-tie" ></i>'.$_SESSION['client_first'].'</a></span>';
                        }
                        else if(isset($_SESSION['buss_ID'])){
                            echo '<span><a href="buss-profile.php"><i style="font-size: 1.35em;color: #FFF;margin: 14px 0px;letter-spacing: 16px;" class="fas fa-user-tie" ></i>'.$_SESSION['buss_name'].'</a></span>';
                        }
                        else{
                            echo '<span><a href="login.php"><i style="font-size: 1.35em;color: #FFF;margin: 14px 0px;letter-spacing: 16px;" class="fas fa-user-ninja" ></i></a></span>';
                        }
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
     <h1>¿Si te das un gusto?</h1>
<h3>Las mejores experiencias gastronómicas</h3>
        <?php
            require 'components/carousel.php'; // Main Items php
        ?>


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