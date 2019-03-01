<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'includes/scan-code-inc.php'; // scan code php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=370, initial-scale=1.5, user-scalable=1.0, maximum-scale=1.0, maximum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scan Code QR</title>
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
<header id="header"class="header-qr" >
   <div id="header-container" class="header-container-qr" style="height: 62px;">
        <nav id="header-logo"  class="header-logo-qr" >
            <ul style = "line-height: 61px">
                <!-- <li id="header-logo-img"><a href="#"><img src="" alt=""></a></li> -->
                <li id="header-logo-spam">OMELETH Scan QR</li>
            </ul>
        </nav>
        <div id="header-container-menu" class="header-container-menu-qr" >
            <nav id="header-menu">
                <ul id="header-menu-buttoms" style="line-height: 58px" class="header-menu-buttoms-qr">
                    <li><a href="index.php">Inicio</a></li>
                    <!-- 
                    <li><a href="#main">About</a></li>
                    <li><a href="#main">Contacto</a></li> -->
                    <li class="login-status login-status-qr" style = "line-height: 59px">
                    
                        <?php


                        if(isset($_SESSION['buss_ID'])){
                            // echo '<span><a href="scan-code.php"><i style="font-size: 1.35em;color: #FFF;margin: 14px 0px;letter-spacing: 16px;" class="fas fa-user-tie" ></i>.'$_SESSION['buss_name'].'</a></span>';
                        }else if(isset($_SESSION['admin_ID'])){
                            echo '<span><a href="admin.php"><i style="font-size: 1.35em;color: #FFF;margin: 14px 0px;letter-spacing: 16px;" class="fas fa-user-tie" ></i>Admin</a></span>';
                        }
                        else{
                        }
                        ?>
                </ul>
                
            </nav>
        </div>
    </div>
        <!--Final de contenedor header-->
</header>



<script type="text/javascript" src="script/scan/instascan.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"
type="text/javascript" charset="utf-8"></script>


<?php
if(isset($_SESSION['buss_ID']) || isset($_SESSION['admin_ID']) ){

echo"<section class ='section-body'>
<!-- contenido ajax -->
</section>";
}else{
    echo"Acceso Denegado";

}
?>

<script>
      
function loadgif()
    {
        // cargamos el icono en el div donde ira el contenido
        $(".section-body").html("<img style='float:none!important; display:block;margin:auto;' src='./img/icons/loading.svg' class='loader' border='0' /><span style='text-align:center;margin:auto; display:block;font-size: 16px;'>Perfecto</span>");

    }

      



    window.onload = function() {
  //funciones a ejecutar

        // cargamos el icono en el div donde ira el contenido
        $(".section-body").html("<img style='float:none!important; display:block;margin:auto;' src='./img/icons/loading.svg' class='loader' border='0' /><span style='text-align:center;margin:auto; display:block;font-size: 16px;'>Cargando</span>");
        // cargamos la pagina en el div capa
        $(".section-body").load('scan-qr/index.php');

};


  function cargarContenido(pagina)
    {
        // cargamos el icono en el div donde ira el contenido
        $(".section-body").html("<img style='float:none!important; display:block;margin:auto;' src='./img/icons/loading.svg' class='loader' border='0' /><span style='text-align:center;margin:auto; display:block;font-size: 16px;'>Cargando</span>");
        // cargamos la pagina en el div capa
        $(".section-body").load(pagina);
    }

    </script>






</body>
</html>