<?php

?>

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
                    <li><a href="index.php">Home</a></li>
                    <?php if(isset($_SESSION['admin_ID'])){
                            echo '<li><a href="new-post.php">New Post</a></li>';
                    }
                    else{
                        echo '<li><a href="#main">About</a></li>';
                    }
                    ?>


                    <?php if(isset($_SESSION['admin_ID']) || isset($_SESSION['buss_ID']) ){
                            echo '<li><a href="scan-code.php">Scan QR</a></li>';
                    }else{
                        echo '<li><a href="#main">Contacto</a></li>';
                    }
                    ?>
                    
                    <?php
                    require 'login-status.php';
                    ?>

                </ul>
                
            </nav>
        </div>
    </div>
        <!--Final de contenedor header-->
</header>