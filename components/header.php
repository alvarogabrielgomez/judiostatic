<header id="header">
   <div id="header-container">
        <nav id="header-logo">
            <ul>
                <!-- <li id="header-logo-img"><a href="#"><img src="" alt=""></a></li> -->
                <li id="header-logo-spam">JUDIOSTATIC</li>
            </ul>
        </nav>
        <div id="header-container-menu">
            <nav id="header-menu">
                <ul id="header-menu-buttoms">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="#main">About</a></li>
                    <li><a href="#main">Contacto</a></li>
                    <li class="login-status">
                    
                        <?php


                        if(isset($_SESSION['user_ID'])){
                            echo '<span><a href="admin.php">Iniciaste sesion</a></span>';
                        }else{
                            echo '<span><a href="admin.php">No estas en sesion</a></span>';
                        }
                        ?>
                </ul>
                
            </nav>
        </div>
    </div>
        <!--Final de contenedor header-->
</header>