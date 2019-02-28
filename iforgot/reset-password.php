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
    <title>Olvide mi contrasena</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">
    <link rel="stylesheet" type="text/css" href="../components/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="../components/slick/slick-theme.css"/>



    <link href="https://fonts.googleapis.com/css?family=Oxygen:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/regular.css" integrity="sha384-l+NpTtA08hNNeMp0aMBg/cqPh507w3OvQSRoGnHcVoDCS9OtgxqgR7u8mLQv8poF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/solid.css" integrity="sha384-aj0h5DVQ8jfwc8DA7JiM+Dysv7z+qYrFYZR+Qd/TwnmpDI6UaB3GJRRTdY8jYGS4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/fontawesome.css" integrity="sha384-WK8BzK0mpgOdhCxq86nInFqSWLzR5UAsNg0MGX9aDaIIrFWQ38dGdhwnNCAoXFxL" crossorigin="anonymous"> 
</head>

<body>
    
<div id="themoderfoquer">

<header id="header">
   <div id="header-container">
        <nav id="header-logo">
            <ul>
                <!-- <li id="header-logo-img"><a href="#"><img src="" alt=""></a></li> -->
                <li id=""><div id="header-logo-container" class="classic-logo"></div></li>
            </ul>
        </nav>
        <div id="header-container-menu" class="normal-opacity-menu">
            <nav id="header-menu">
                <ul id="header-menu-buttoms">
                    <li><a href="../index.php">Home</a></li>
                    <?php if(isset($_SESSION['admin_ID'])){
                            echo '<li><a href="../new-post.php">New Post</a></li>';
                    }
                    else{
                       // echo '<li><a href="#main">About</a></li>';
                    }
                    ?>


                    <?php if(isset($_SESSION['admin_ID']) || isset($_SESSION['buss_ID']) ){
                            echo '<li><a href="../scan-code.php">Scan QR</a></li>';
                    }else{
                       // echo '<li><a href="#main">Contacto</a></li>';
                    }
                    ?>
                    

                </ul>
                
            </nav>
        </div>
    </div>
        <!--Final de contenedor header-->
</header>



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
                    <form action="../includes/iforgot-inc.php" method="POST">
                        <input style="margin: 2px auto 22px; width:65%;" type="text" name="email"  placeholder="E-Mail" autofocus>
                        <button style="margin: 2px auto 0px; width:65%;" type="submit" class="button red" name="iforgot-submit">Enviame mi email</button>
                    </form>
                    <?php
                    if(isset($_GET["reset"])){
                        if ($_GET["reset"] == "success") {
                           echo '<p>Check your email!</p>';
                        }
                    }
                    ?>
                    <a href="../login.php">Volver</a>

                    </div>

               </div>



                    </div>

            </div>   
                
</div> 


    </div>  
</div> 

</section>

</div>
<footer id="footer">
<div id="ir-arriba"><a href="#">Subir</a></div>

<div class="f-container">
    <div class="b1">
    <div class="navFooterHeader">Saiba mais sobre nós</div>
    <ul class="navFooter">
        <li class="">
            <a href="" class="">Jobs</a>
        </li>
        <li>
            <a href="" class="">Blog</a>
        </li>
        <li>
            <a href="" class="">Sobre o Omeleth</a>
        </li>

    </ul>
    </div>


	<div class="b2">

    <div class="navFooterHeader">Venda conosco</div>
    <ul class="navFooter">
        <li class="">
            <a href="../documents/with-us.html" class="">Venda seus cupons em Omeleth</a>
        </li>
        <li>
            <a href="../documents/lets-start.html" class="">Como começar conosco</a>
        </li>


    </ul>
    </div>

    <div class="b3">
    <div class="navFooterHeader">Deixe-nos ajudá-lo</div>
    <ul class="navFooter">
        <li class="">
            <a href="" class="">Sua conta</a>
        </li>
        <li>
            <a href="" class="">Comunicar um erro</a>
        </li>
        <li>
            <a href="" class="">Contribua com sugestões</a>
        </li>

    </ul>    </div>
    </div>
    <div id="creditos"><div  class="logo-creditos"></div></div>

    <div id="creditos"><div><a href="../documents/terms.html">Condições de uso</a> <a href="../documents/privacy-policy.html">Privacidade</a><a href="https://ckj.one" rel="external"> © Alvaro Gabriel Gomez</a>. TODOS OS DIREITOS RESERVADOS</div></div>

</footer>


</body>

</html>
<?php }
else{
    header("Location: ../profile.php?login=loged");
    exit();
} ?>