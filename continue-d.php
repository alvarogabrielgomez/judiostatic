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
            require 'components/header.php'; // Main Items php
        ?>


<!--Final main portada-->
<section>
<div id="main-container">

    
        <?php
        
if(isset($_GET['signup'])){
    if($_GET['signup']=="empty"){
        echo '<h3 class="error-signup">Llena todos los campos</h3>';
    }
    else if($_GET['signup']=="mail-invalid"){
        echo '<h3 class="error-signup">Introduce una direccion de correo valida</h3>';
    }
    else if($_GET['signup']=="password-check"){
        echo '<h3 class="error-signup">El pass no coincide</h3>';
    }
    else if($_GET['signup']=="sqlerror"){
        echo '<h3 class="error-signup">Error desconocido</h3>';
    }
    else if($_GET['signup']=="taken"){
        echo '<h3 class="error-signup">El usuario ya existe</h3>';
    }
    else if($_GET['signup']=="email-taken"){
        echo '<h3 class="error-signup">El email ya existe</h3>';
    }
}

        ?>

        </div> 
    </section>
</div>

<footer>
    
</footer>

</body>

</html>