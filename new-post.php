<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'includes/new-post-inc.php'; // deals php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=370, initial-scale=1.0, user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JUDIOSTATIC</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Oxygen:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/fontawesome.css" integrity="sha384-WK8BzK0mpgOdhCxq86nInFqSWLzR5UAsNg0MGX9aDaIIrFWQ38dGdhwnNCAoXFxL" crossorigin="anonymous"> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"
type="text/javascript" charset="utf-8"></script>
    
</head>

<body>
    
<div id="themoderfoquer">

<?php
require 'components/header.php'; // Header php
?>




<div id="nav-bar">
<div id="nav-bar-container">
            <nav>
                <ul>
                    <li><a href="index.php"><div id="home-icon"></div></a></li>
                    <li class="navbar-divisor">></li>
                    <li><a href="deals.php" style="margin:0;padding:0;">Deals</a></li>
                    <li class="navbar-divisor">></li>
                    <li><span>Modo Editor<span></li>

                    

                </ul>
            </nav>
</div>
</div>

<h1>Modo Editor</h1>
<?php
if(isset($_GET['status'])){
                if($_GET['status']=="success"){
                    echo '<h3> Listo!, el post debe estar publicado ya.</h3>';
                }
                }else{
                    echo'<h3>Rellene todo para publicar el nuevo post</h3>';
                }
?>

<div id="time-bar">
    <div id="time-bar-container">
            <nav>
                <ul> 
                    <li><i style="font-size: 1.35em;color: #A6A4A4;margin: 14px 0px;" class="far fa-clock" ></i></li>
                    <li><?php echo date("Y-m-d"); ?></li>
                </ul>
            </nav>
    </div>
</div>

<section>
<div id="main-container">
    
     <div id="main">
         
    <div id="hero-deals-container">
        
        <div id="hero-deals">
            <div class="col1">
<form action="includes/ins-post-inc.php" method="POST">

                <div class="title-hero-deals">
                    <select class="buss_name_select" name="buss_name_select" autofocus>
                    <option value="">Buss Name</option>
<?php 
require 'includes/dbh-inc.php';
$sql = "SELECT * FROM buss";
$results=mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
    echo '<option value="'.$row['buss_id'].'">'.$row['buss_name'].'</option>';
}
?>
                    </select>
                </div>
                <div class="desc-art">
                    <p>Oferta Lorem ipsum dolor sit amer us nec mollis vehicula, magna tortor finibus libero, vitae posuere ante lectus in enim. mollis vehicula, magna tortor finibus libero, vitae<br>
                    <div class="buss-dir">
                    <i class="fas fa-map-marker-alt" style="margin-right:16px;"></i><?php echo $post_buss_dir; ?>
                    </div>
                    <div class="buss-phone">
                    <i class="fas fa-phone" style="margin-right:11px;"></i><?php echo $post_buss_phone; ?>
                    </div>
                
                </p>
                </div>
            </div>
             <div class="col2">
                <img style="width: 100%;height: 100%;" src="img/buss/placeholder.jpg" alt="image deals">
            </div>
        </div>
    
    </div>
         <div id="share-bar">
             <div id="share-bar-container">
                <nav>
                    <ul> 
                        <li><i style="font-size: 1.35em;color: #A6A4A4;margin: 14px 0px;" class="fas fa-share-alt" ></i></li>
                        <li>Compartir</li>
                    </ul>
                </nav>
            </div>
         </div>
         
         
         <div id="main-posts-container">

                <div class="main-post">    

<div class="cupon-std">
<div class="cupon-col1">
<div>VALIDO PARA UNA VEZ</div>
</div>
<div class="cupon-col2">

<div class="cupon-titulo"><span><input class="title_new" type="text" name="title"  placeholder="TITULO DEL CUPON"></span></div>
<div class="cupon-desc"><span><textarea class="desc_new" name="description"  placeholder="Descripcion del Cupon" ></textarea></span>
</div>
<input type="submit" id="post_submit"class="cupon-boton button red" name="post-submit" value="PUBLICAR POST"/>
</div>
<div class="cupon-col3">
<div class="cupon-descuento">
<div class="porcentaje p-before"><input class="new_price" type="text" name="new_price" placeholder="50.00"></div>
<span class="s-porcentaje s-after"><input class="old_price" type="text" name="old_price" placeholder="100.00"></span>
</div>
</div>
</div>
<span class="final_offer_span">
    Fecha limite de oferta:
</span>
<br/>
<input class="final_offer" type="date" name="final_offer">
</form>





            </div>



    </div> 
</div> 

</section>

</div>
        <?php
            require 'components/footer.php'; // footer php
        ?>





    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/regular.css" integrity="sha384-l+NpTtA08hNNeMp0aMBg/cqPh507w3OvQSRoGnHcVoDCS9OtgxqgR7u8mLQv8poF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/solid.css" integrity="sha384-aj0h5DVQ8jfwc8DA7JiM+Dysv7z+qYrFYZR+Qd/TwnmpDI6UaB3GJRRTdY8jYGS4" crossorigin="anonymous">
</body>

</html>