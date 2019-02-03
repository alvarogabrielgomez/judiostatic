<?php
require '../includes/dbh-inc.php';
?>


<?php 
$sql ="
SELECT b.buss_name, b.buss_dir, b.buss_phone, b.buss_phone, b.buss_url, p.post_id, p.title, p.description, p.price_from, p.price_new, p.offer_end_at, p.created_at, p.updated_at, p.buss_id, p.post_hero_img_url, b.cover_url, CONCAT(YEAR(p.updated_at),'-', MONTH(p.updated_at), '-' , DAY(p.updated_at)) AS data
FROM posts as p
JOIN buss as b
    on b.buss_id = p.buss_id
    WHERE p.active <> 0
ORDER BY p.updated_at DESC
LIMIT 25

";
?> 

<script>
function loaded() {
  //funciones a ejecutar
  $("#onload-carousel").css("background", "linear-gradient(to bottom, rgba(255,255,255,0.01) 5%, rgba(251,251,242,0.87) 89%");

}

loaded();

</script>

  <div class="animated fadeIn carousel-container">
  <div class="carousel">
<?php 
$results=mysqli_query($conn, $sql);
$resultsCheck=mysqli_num_rows($results);

if($resultsCheck < 1){

        require 'empty-state.php';
        exit();
}else{

    

    while($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
      if(strtotime($row['offer_end_at']) > 1){

      if(time() - strtotime($row['offer_end_at']) <= 1.5 * 86400){

      $post_offer_end_at = $row['offer_end_at'];
        echo'    
        
        <a href="deals.php?id='.$row['post_id'].'" class="main-box">

        <div class="main-img">
            <img src="'.$row['post_hero_img_url'].'" alt="">
        </div>
    
        <div class="buss-name"><span>'.$row['buss_name'].'</span></div>
        ';


        if(time() - strtotime($row['created_at']) <= 3 * 86400){
          if(strtotime($row['offer_end_at']) > 1){
            if(time() - strtotime($post_offer_end_at) <= 0){

              if (abs(strtotime($row['created_at']) - strtotime($row['offer_end_at'])) <= 3 * 86400) {
              echo '<div class="badge">
              <span>OFERTA SPEEDY</span>
              </div>
              <div class="clock-time clock-speedy"></div>';
            }else if(abs(time() - strtotime($post_offer_end_at)) >= 2 * 86400){
              echo '<div class="badge">
              <span>OFERTA DE ÚLTIMA HORA</span> </div>';
              if(abs(time() - strtotime($post_offer_end_at)) >= 8 * 86400){
                  echo '<div class="clock-tim clock-7"></div>'; 
              }else if(abs(time() - strtotime($post_offer_end_at)) <= 2 * 86400){
                  echo '<div class="clock-time clock-70"></div>'; 
              }else if(abs(time() - strtotime($post_offer_end_at)) <= 3 * 86400 && abs(time() - strtotime($post_offer_end_at)) > 2 * 86400){
                  echo '<div class="clock-time clock-30"></div>'; 
              }else if(abs(time() - strtotime($post_offer_end_at)) <= 4 * 86400 && abs(time() - strtotime($post_offer_end_at)) > 3 * 86400){
                  echo '<div class="clock-time clock-25"></div>'; 
              }else if(abs(time() - strtotime($post_offer_end_at)) <= 7 * 86400 && abs(time() - strtotime($post_offer_end_at)) > 4 * 86400){
                  echo '<div class="clock-time clock-15"></div>';
              }
          }
        }
        else if (time() - strtotime($post_offer_end_at) > 1){
          echo '<div class="clock-time clock-100"></div>';
        }
        }else{
            echo '<div class="badge">
            <span>OFERTA DE ÚLTIMA HORA</span> </div>';
          }
        }

        if (time() - strtotime($row['created_at']) > 3 * 86400 && time() - strtotime($row['created_at']) <= 7 * 86400) {
          if(strtotime($row['offer_end_at']) > 1 ){
            if(time() - strtotime($post_offer_end_at) <= 0){
            if (abs(time() - strtotime($row['offer_end_at'])) < 3 * 86400 && abs(time() - strtotime($row['offer_end_at'])) > 2 * 86400) {
              echo '<div class="badge">
              <span>OFERTA POR ACABAMENTO</span>
              </div>
              <div class="clock-time clock-30"></div>
              ';
            }else if(abs(time() - strtotime($row['offer_end_at'])) < 2 * 86400){
              echo '<div class="badge">
              <span>OFERTA POR ACABAMENTO</span>
              </div>
              <div class="clock-time"></div>
              ';
            }else{
              echo '<div class="badge">
              <span>OFERTA DESTA SEMANA</span>
              </div>';
            }
          }else if (time() - strtotime($post_offer_end_at) > 1){
            echo '<div class="clock-time clock-100"></div>';
          }
          }
          
          else{
            echo '<div class="badge">
            <span>OFERTA DESTA SEMANA</span>
            </div>';
          }


          
        }
        
        if (time() - strtotime($row['created_at']) > 7 * 86400) {
          if(strtotime($row['offer_end_at']) > 1){
          if(time() - strtotime($post_offer_end_at) <= 0){
          
            if (abs(time() - strtotime($row['offer_end_at'])) < 3 * 86400 && abs(time() - strtotime($row['offer_end_at'])) > 2 * 86400) {
              echo '<div class="badge">
              <span>OFERTA POR ACABAMENTO</span>
              </div>
              <div class="clock-time clock-30"></div> 
              ';
            }else if(abs(time() - strtotime($row['offer_end_at'])) < 2 * 86400){
              echo '<div class="badge">
              <span>OFERTA POR ACABAMENTO</span>
              </div>
              <div class="clock-time"></div>
              ';
            }else{
              if (abs(time() - strtotime($row['offer_end_at'])) >= 3 * 86400 && abs(time() - strtotime($row['offer_end_at'])) < 4 * 86400) {
                echo '<div class="clock-time clock-25"></div>'; 
              }else if(abs(time() - strtotime($row['offer_end_at'])) >= 4 * 86400 && abs(time() - strtotime($row['offer_end_at'])) <= 7 * 86400){
                echo '<div class="clock-time clock-15"></div>';
              }
            }

          }else if (time() - strtotime($post_offer_end_at) > 1){
            echo '<div class="clock-time clock-100"></div>';
          }
        }
        }

        if (strtotime($post_offer_end_at) > 1 && abs(time() - strtotime($row['created_at'])) >= 3 * 86400) {
          if(time() - strtotime($post_offer_end_at) <= 0){
          if (abs(time() - strtotime($post_offer_end_at)) <= 2 * 86400) {
              echo '<div class="clock-time"></div></li>';
          }else if(abs(time() - strtotime($post_offer_end_at)) >= 2 * 86400){
              if(abs(time() - strtotime($post_offer_end_at)) >= 8 * 86400){
                  echo '<div class="clock-time clock-7"></div>'; 
              }else if(abs(time() - strtotime($post_offer_end_at)) <= 2 * 86400){
                  echo '<div class="clock-time clock-70"></div>'; 
              }else if(abs(time() - strtotime($post_offer_end_at)) <= 3 * 86400 && abs(time() - strtotime($post_offer_end_at)) > 2 * 86400){
                  echo '<div class="clock-time clock-30"></div>'; 
              }else if(abs(time() - strtotime($post_offer_end_at)) <= 4 * 86400 && abs(time() - strtotime($post_offer_end_at)) > 3 * 86400){
                  echo '<div class="clock-time clock-25"></div>'; 
              }else if(abs(time() - strtotime($post_offer_end_at)) <= 7 * 86400 && abs(time() - strtotime($post_offer_end_at)) > 4 * 86400){
                  echo '<div class="clock-time clock-15"></div>';
              }
          }
      }else if (time() - strtotime($post_offer_end_at) > 1){
        echo '<div class="clock-time clock-100"> <span class="span-clock">Oferta Acabou</span></div>';

      }
    }
        
        
        echo'
        
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
  }else if (strtotime($row['offer_end_at']) < 1){


    echo' <a href="deals.php?id='.$row['post_id'].'" class="main-box">

    <div class="main-img">
        <img src="'.$row['post_hero_img_url'].'" alt="">
    </div>

    <div class="buss-name"><span>'.$row['buss_name'].'</span></div>
    
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


}


?>

  </div>
  </div>




  <script>

function createSlick(){
      $('.carousel').not('.slick-initialized').slick({
        dots: true,
        infinite: true,
        variableWidth: true,
        dragable:true,
        mobileFirst:true,
        autoplay:false,
        accessibility:true,
        pauseOnFocus:true,
        pauseOnHover:false,
        arrows: false,
        centerMode: true,

        responsive: [{ 
        breakpoint: 800,
        settings: {
            arrows: true,
            centerMode: false
        } 
    }]
      });
}



    $(document).ready(function(){
    createSlick();
    });
  </script>