            <div id="main-posts-container">
               <div class="main-post">    
                 <h1 class="title-login">SIGNUP</h1>
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
                    <div class="main-box admin-signup main-box-simple">

                    <div class="nav-signup">
                    <form action="includes/signup-inc.php" method="POST">
                        <input type="text" name="first"  placeholder="Nombre" autofocus>
                        <input type="text" name="last"  placeholder="Apellido">
                        <input type="email" name="email"  placeholder="E-mail">
                        <input type="text" name="uid"  placeholder="Nombre de Usuario">
                        <input type="password" name="pwd"  placeholder="Contraseña">
                        <input type="password" name="pwd-repeat" placeholder="Repite la Contraseña">
                        <button type="submit" class="button-red" name="signup-submit">Signup</button>
                    </form>
                    <a href="admin.php">Volver</a>

                    </div>

            </div> 