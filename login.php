<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();    
if(!isset($_SESSION["client_id"])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=320, initial-scale=0.86, maximum-scale=0.86, minimum-scale=0.86"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tu cuenta Omeleth</title>
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

<?php
require 'components/header.php'; // Header php
?>



<!--Final main portada-->
<section>
<div id="main-container">
     <div id='main'>
    

     <div id="main-posts-container">
               <div class="main-post">    
                 <h1 class="title-login">Inicia sesion</h1>

<?php

    if(isset($_GET['signup'])){
    if($_GET['signup']=="success"){
        echo '<h3 class="success-signup">Listo!</h3>';
    }
    }

    if(isset($_GET['login'])){
        if($_GET['login']=="empty"){
            echo '<h3 class="error-login">Llena todos los campos</h3>';
        }
        else if($_GET['login']=="no-user"){
            echo '<h3 class="error-login">El usuario no existe</h3>';
        }
        else if($_GET['login']=="wrong-pwd"){
            echo '<h3 class="error-login">Pass es incorrecto</h3>';
        }

        else if($_GET['login']=="user-unactive"){
            echo '<h3 class="error-login">El usuario no esta activo</h3>';
        }
        else if($_GET['login']=="sqlerror"){
            echo '<h3 class="error-login">Error desconocido</h3>';
        }
    }

    if(isset($_GET['newpwd'])){
        if($_GET['newpwd']=="success"){
            echo '<h3 class="error-signup">Has cambiado tu password!</h3>'; 
        }
        else if ($_GET['newpwd']=="error") {
            echo '<h3 class="error-signup">Hubo un error! (d0)</h3>'; 
        }
        else if ($_GET['newpwd']=="errord1") {
            echo '<h3 class="error-signup">Hubo un error! (d1)</h3>'; 
        }
        else if ($_GET['newpwd']=="errord2") {
            echo '<h3 class="error-signup">Hubo un error! (d2)</h3>'; 
        }
    }

?>
                    <div class="main-box admin-login main-box-simple" style ="padding: 15px;">

                    <div class="nav-login">

                    <form  action="includes/login-inc.php" method="POST">
                    <input type="text" name="mailuid" placeholder="Username/email">
                    <input type="password" name="pwd" placeholder="password">
                    <button type="submit" class="button red" name="login-submit">Login</button>
                    </form>

                    <a href="signup.php">Sign up</a>
                    <a href="iforgot/reset-password.php">Olvide el password</a>

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
<?php }
else{
    header("Location: profile.php?login=loged");
    exit();
} ?>