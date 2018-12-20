<?php
require 'includes/dbh-inc.php';
?>


<?php 
$sql ="
SELECT * FROM posts
 WHERE buss_id <> 2
 AND active <> 0
 ORDER BY post_id ASC
";
?>

<div><h3 style="margin-top:56px!important;">Ofertas Relacionadas</h3></div>

<?php


$results=mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){


   echo ' <div id="time-bar">
    <div id="time-bar-container">
            <nav>
                <ul> 
                    <li><i style="font-size: 1.35em;color: #A6A4A4;margin: 14px 0px;" class="far fa-clock" ></i></li>
                    <li>'.$row['updated_at'].'</li>
                </ul>
            </nav>
    </div>
</div>';

    echo '<div class="cupon-std">
    <div class="cupon-col1">
    <div>VALIDO PARA UNA VEZ</div>
    </div>
    <div class="cupon-col2">
    <div class="cupon-titulo"><span><a href="deals.php?id='.$row['post_id'].'">'.$row['title'].'</a></span></div>
    <div class="cupon-desc"><span>'.$row['description'].'</span>
    </div>
    <div class="cupon-boton button-red"><a href="#">VER OFERTA</a></div>
    </div>
    <div class="cupon-col3">
    <div class="cupon-descuento">
    <div class="porcentaje"><span>'. abs(round((($row['price_new']/$row['price_from'])*100)-100))  .'%</span></div>
    <span class="s-porcentaje">AHORRA!</span>
    </div>
    </div>
    </div>';
}

?>


