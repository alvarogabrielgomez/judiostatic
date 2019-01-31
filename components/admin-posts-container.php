<div id="main-posts-container">
               <div class="main-post">    
                 <h1 class="title-login">ADMIN DASHBOARD</h1>

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

    

?>

                    <div class="main-box admin-login main-box-simple">

                    <div class="nav-login">

                    <?php
                     if(isset($_SESSION['admin_ID'])){
                         echo '<form  action="includes/logout-inc.php" method="POST">';
                         echo '<button type="submit" class="button red" name="logout-submit">Logout</button>';
                         echo '</form>';
                         echo '<h1>Sesion Iniciada.</h1>';
                         echo '<a href="signupadmin.php">Crear Cuenta</a>';
                         echo '<a href="signupbuss.php">Nuevo Buss</a>';
        
                    }else{
                    echo    '<form  action="includes/login-admin-inc.php" method="POST">';
                    echo    '<input type="text" name="mailuid" placeholder="Username/email">';
                    echo    '<input type="password" name="pwd" placeholder="password">';
                    echo    '<button type="submit" class="button red" name="login-submit">Login</button>';
                    echo    '</form>';

                    echo '<a href="signup.php">Olvide el password</a>';
            
                    }


                    
                    ?>


                    </div>

            </div>   
                
</div> 