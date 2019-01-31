<div id="nav-bar">
<div id="nav-bar-container">
            <nav>
                <ul>
                    <li><a href="index.php"><div id="home-icon"></div></a></li>
                    <li class="navbar-divisor">></li>
                    <?php
                    if(isset($_GET['id'])){
                    echo '<li><a href="deals.php" style="margin:0;padding:0;">Deals</a></li>
                    <li class="navbar-divisor">></li>
                    <li><span>Códigos Promocionais<span></li>';
                    }else{
                        echo '<li><span>Deals<span></li>';
                    }

                    ?>

                </ul>
            </nav>
</div>
</div>