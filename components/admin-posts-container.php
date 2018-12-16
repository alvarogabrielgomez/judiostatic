<div id="main-posts-container">
               <div class="main-post">    
                 <h1 class="title-login">ADMIN DASHBOARD</h1>

                    

                    <div class="main-box admin-login">

                    <div class="nav-login">

                    <?php
                     if(isset($_SESSION['user_ID'])){
                         echo '<form  action="includes/logout-inc.php" method="POST">';
                         echo '<button type="submit" class="button" name="logout-submit">Logout</button>';
                         echo '</form>';
                         echo '<h1>Marico el que lo lea, ay mariquito</h1>';
                         
                    }else{
                    echo    '<form  action="includes/login-inc.php" method="POST">';
                    echo    '<input type="text" name="mailuid" placeholder="Username/email">';
                    echo    '<input type="password" name="pwd" placeholder="password">';
                    echo    '<button type="submit" class="button" name="login-submit">Login</button>';
                    echo    '</form>';
                    echo '<a href="signup.php">Crear Cuenta</a>';
                    echo '<a href="signup.php">Olvide el password</a>';
            
                    }


                    
                    ?>


                    </div>

            </div>   
                
</div> 