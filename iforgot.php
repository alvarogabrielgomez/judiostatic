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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

               <h1 class="title-login">Reset my Password</h1>
               <div class="main-box iforgot-box main-box-simple">

               <div class="nav-signup" >
               <p>Oh, has olvidado tu password, descuida, te enviaremos un Email con instrucciones para recuperarla rapidamente.</p>
                    <form action="includes/iforgot-inc.php" method="POST">
                        <input style="margin: 2px auto 22px; width:65%;" type="text" name="email"  placeholder="E-Mail" autofocus>
                        <button style="margin: 2px auto 0px; width:65%;" type="submit" class="button red" name="iforgot-submit">Enviame mi email</button>
                    </form>
                    <a href="login.php">Volver</a>

                    </div>

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
<?php }
else{
    header("Location: profile.php?login=loged");
    exit();
} ?>