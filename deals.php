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
    <link href="https://fonts.googleapis.com/css?family=Oxygen:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/regular.css" integrity="sha384-l+NpTtA08hNNeMp0aMBg/cqPh507w3OvQSRoGnHcVoDCS9OtgxqgR7u8mLQv8poF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/solid.css" integrity="sha384-aj0h5DVQ8jfwc8DA7JiM+Dysv7z+qYrFYZR+Qd/TwnmpDI6UaB3GJRRTdY8jYGS4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/fontawesome.css" integrity="sha384-WK8BzK0mpgOdhCxq86nInFqSWLzR5UAsNg0MGX9aDaIIrFWQ38dGdhwnNCAoXFxL" crossorigin="anonymous"> 
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
                    <li>17.12.2018</li>
                </ul>
            </nav>
    </div>
</div>

<section>
<div id="main-container">
     <div id="main">
    <div id="hero-deals-container">
        <div id="hero-deals">
            <div class="col1">
                <div class="title-hero-deals">Codigo promocional comida lorem ipsum dolor sit amet
purus nec mollis vehicula, magna</div>
                <div class="desc-art">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lobortis, purus nec mollis vehicula, magna
tortor finibus libero, vitae posuere ante lectus in enim. Praesent</p>
                </div>
            </div>
             <div class="col2">
                <img src="img/tumb1.jpg" alt="image deals">
            </div>
        </div>
    
    </div>
         <div id="share-bar">
             <div id="share-bar-container">
                <nav>
                    <ul> 
                        <li><i style="font-size: 1.35em;color: #A6A4A4;margin: 14px 0px;" class="fas fa-share-alt" ></i></li>
                        <li>Compartir</li>
                    </ul>
                </nav>
            </div>
         </div>
         
         
         <div id="main-posts-container">
                <div class="main-post">    

                <div class="cupon-std">
                <div class="cupon-col1">
                    <div>VALIDO PARA UNA VEZ</div>
                </div>
                <div class="cupon-col2">
                <div class="cupon-titulo"><span>Oferta Lorem ipsum dolor sit amer us nec mollis vehicula, magna tortor finibus libero</span></div>
                <div class="cupon-desc"><span>Oferta Lorem ipsum dolor sit amer us nec mollis vehicula, magna tortor finibus libero, vitae posuere ante lectus in enim. mollis vehicula, magna tortor finibus libero, vitae</span>
                </div>
                <div class="cupon-boton button-red"><a href="#">VER OFERTA</a></div>
                </div>
                <div class="cupon-col3">

                <div class="cupon-descuento">
                    <div class="porcentaje"><span>20%</span></div>
                    <span class="s-porcentaje">AHORRA!</span>
                </div>

                </div>




                </div> 
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