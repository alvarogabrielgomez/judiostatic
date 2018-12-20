
  <?php
require 'includes/dbh-inc.php';
?>


<?php 
$sql ="
SELECT b.buss_name, b.buss_dir, b.buss_phone, b.buss_phone, b.buss_url, p.post_id, p.title, p.description, p.price_from, p.price_new, p.offer_end_at, p.created_at, p.updated_at, p.buss_id, p.post_hero_img_url, b.cover_url, CONCAT(YEAR(p.updated_at),'-', MONTH(p.updated_at), '-' , DAY(p.updated_at)) AS data
FROM posts as p
JOIN buss as b
    on b.buss_id = p.buss_id
    WHERE p.active <> 0
ORDER BY p.updated_at


";
?> 
  <div class="carousel-container">
  <div class="carousel">
<?php 
$results=mysqli_query($conn, $sql);
$resultsCheck=mysqli_num_rows($results);

if($resultsCheck < 1){

        require'404-ini.php';
        exit();
}else{

    

    while($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
        echo'    <a href="deals.php?id='.$row['post_id'].'" class="main-box">

        <div class="main-img">
            <img src="'.$row['post_hero_img_url'].'" alt="">
        </div>
    
        <div class="buss-name"><span>'.$row['buss_name'].'</span></div>
        
        <div class="badge">
                <span>OFERTA DE ULTIMA HORA</span>
        </div>
    
        
        <div class="box-title"><span>'.$row['title'].'</span></div>
        <div class="price-box">
        
            <div class="price-new"> <abbr title="BRL">R$</abbr><span>'.$row['price_new'].'</span>  </div>
            <div class="price-from"> <abbr title="BRL">R$</abbr> <span>'.$row['price_from'].'</span></div>
    
        </div>
    
        <p class="main-box-desc">
        '.$row['description'].'
    
        </p>
    
    </a>
        
        ';
    }
}


?>

  </div>
  </div>


  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="components/slick/slick.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.carousel').slick({
        dots: true,
        infinite: true,
        variableWidth: true,
        dragable:true,
        mobileFirst:true,
        autoplay:true,
        accessibility:true,
        pauseOnFocus:true,
        pauseOnHover:false
      });
    });
  </script>