<?php

?>
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
                    
                    <li class="login-status">
                    
                        <?php


                        if(isset($_SESSION['admin_ID'])){
                            echo '<span><a href="admin.php"><i style="font-size: 1.35em;color: #FFF;margin: 14px 0px;letter-spacing: 16px;" class="fas fa-user-tie" ></i>  Admin</a></span>';
                        }else if(isset($_SESSION['client_id'])){
                            echo '<span><a href="profile.php"><i style="font-size: 1.35em;color: #FFF;margin: 14px 0px;letter-spacing: 16px;" class="fas fa-user-tie" ></i>'.$_SESSION['client_first'].'</a></span>';
                        }
                        else if(isset($_SESSION['buss_ID'])){
                            echo '<span><a href="buss-profile.php"><i style="font-size: 1.35em;color: #FFF;margin: 14px 0px;letter-spacing: 16px;" class="fas fa-user-tie" ></i>'.$_SESSION['buss_name'].'</a></span>';
                        }
                        else{
                            echo '<span><a href="login.php"><i style="font-size: 1.35em;color: #FFF;margin: 14px 0px;letter-spacing: 16px;" class="fas fa-user-ninja" ></i></a></span>';
                        }
                        ?>
                </ul>
                
            </nav>
        </div>
    </div>
        <!--Final de contenedor header-->
</header>