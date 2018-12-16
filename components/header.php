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
                    <li><a onClick="cargarContenido('landing.html')"  href="#main">Inicio</a></li>
                    <li><a onClick="cargarContenido('about.html')"  href="#main">About</a></li>
                    <li><a onClick="cargarContenido('contact.html')"  href="#main">Contacto</a></li>
                    <li class="login-status">
                    
                        <?php


                        if(isset($_SESSION['userID'])){
                            echo '<span>Iniciaste sesion</span>';
                        }else{
                            echo '<span>No estas en sesion</span>';
                        }
                        ?>
                </ul>
                
            </nav>
        </div>
    </div>
        <!--Final de contenedor header-->
</header>