<div id="main-posts-container">
               <div class="main-post">    
                 <h1 class="title-login">New Buss</h1>
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
                        else if($_GET['signup']=="name-taken"){
                            echo '<h3 class="error-signup">El nombre ya existe</h3>';
                        }
                    }

                    ?>
                    <div class="main-box admin-signup main-box-simple">

                    <div class="nav-signup">
                    <form enctype="multipart/form-data" action="includes/signupbuss-inc.php" method="POST">
                        <input type="text" name="buss_name"  placeholder="Buss Name" autofocus>
                        <input type="text" name="buss_dir"  placeholder="Buss Dir">
                        <input type="text" name="buss_phone"  placeholder="Buss Phone">
                        <input type="text" name="buss_url"  placeholder="Buss URL">
                        <input type="text" name="uid"  placeholder="Nombre de Usuario">
                        <input type="password" name="pwd"  placeholder="Contraseña">
                        <input type="password" name="pwd-repeat" placeholder="Repite la Contraseña">
                        <!-- <input type="file" name="cover"> -->
                        <button type="submit" class="button red" name="signup-submit">Crear</button>
                    </form>
                    <a href="admin.php">Volver</a>

                    </div>

            </div> 