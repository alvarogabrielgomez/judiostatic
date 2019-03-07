<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'includes/profile-inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=320, initial-scale=0.86, maximum-scale=0.86, minimum-scale=0.86"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tu cuenta Omeleth</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="components/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="components/slick/slick-theme.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"type="text/javascript" charset="utf-8"></script>


    <link href="https://fonts.googleapis.com/css?family=Oxygen:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/regular.css" integrity="sha384-l+NpTtA08hNNeMp0aMBg/cqPh507w3OvQSRoGnHcVoDCS9OtgxqgR7u8mLQv8poF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/solid.css" integrity="sha384-aj0h5DVQ8jfwc8DA7JiM+Dysv7z+qYrFYZR+Qd/TwnmpDI6UaB3GJRRTdY8jYGS4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/fontawesome.css" integrity="sha384-WK8BzK0mpgOdhCxq86nInFqSWLzR5UAsNg0MGX9aDaIIrFWQ38dGdhwnNCAoXFxL" crossorigin="anonymous"> 
</head>

<body>  
<div id="themoderfoquer">
<?php
require 'components/header.php'; // Header php
?>
<section id="section-whois-you">
<div id="whoisyou" class="profile-whois">
  <div id="whoisyou-img" class="profile-whois-img">
  <i style="font-size: 1.35em;color: #666;display: block;margin: auto;width: 23px;height: 25px;" class="
fas fa-user"></i>
  </div>
  <div id="whoisyou-name" class="profile-whois-name"><span>
  <?php echo $client_first." ".$client_last;?>  
    </span>
  <div id="whoisyou-email"><span>
  <?php echo $client_email;?>
</span>
</div>
</div>
</div>
</section>
<section>
<div id="main-container" class="main-container-profile" style = margin-top:0px; >
<div id='main' class="main-profile">  
<div class="side-profile-container">
<div class="container-deal-info">
<div id="deal-info">

  <div id="optDropdown" class="optDropdown-content dropdown-content">
    <div id="optDropdown-content-filled">
      <a href="#">Ver oferta</a>
      <a href="#">Ocultar oferta</a>
      <a href="#">Reportar incoveniente</a>
    </div>
  </div>

  <div id="opt-deal-info">...</div>
 <div id = "loading-img" style="width: 100%; height: 100%;position: absolute; display: flex;opacity:0;"><img style='float:none!important; display:block;margin:auto;height: 100%;max-height: 100px;' src='img/icons/loading.svg' class='loader' /></div>
  <p class="buss_name">Has click en alguna de tus ofertas para ver mas informacion.</p>
  <a class="buss_url" href=""></a>
<div class="deal-info-qr">
<canvas id="qr" style="margin:auto;display:block;margin-top:8px; opacity:0;transition: all 0.6s ease;"></canvas>
</div>
</div>
</div>
</div>
  <div class="content-profile-container">
  <div class="content-profile">

<table class="profile-table-cupons">
<?php
$sql = "
SELECT c.client_id, c.client_first, c.client_last, c.client_email, t.post_id, t.transaction_qr, t.updated_at, DATE_FORMAT(t.updated_at, '%Y-%m-%d') as updated_at_date, DATE_FORMAT(t.updated_at, '%H:%i:%s') as updated_at_hour , t.finished, p.post_id , p.title, p.description, p.offer_end_at, p.price_new, p.price_from, p.post_hero_img_url, b.buss_name, b.buss_dir, b.buss_phone, b.cover_url
FROM transactions as t
LEFT JOIN clients as c
on c.client_id = t.client_id
JOIN posts as p
    on t.post_id = p.post_id
JOIN buss as b
    on t.buss_id = b.buss_id
WHERE c.client_id = $client_id_loged
AND c.active <> 0
ORDER BY t.updated_at DESC
";

$results=mysqli_query($conn, $sql);
$resultsCheck=mysqli_num_rows($results);

if($resultsCheck < 1){
 require 'components/empty-state-related.php';
}else{

while($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
    echo '<tr>
    <div>
    <td class="item-profile id-'.$row["post_id"].'" ><span>'.$row["title"]." ".$row["updated_at_date"]." ".$row["updated_at_hour"].'</span>
    <span class = "whenis">'; imprimirTiempo($row["updated_at_date"], $row["updated_at_hour"]); echo '  </span>
    </td>
      </div>
      </td>
    </tr>';
  ?>
  <script>
   var movingitem = document.getElementById('deal-info');
   var loadingImg = document.getElementById('loading-img');
   var optDropdown = document.getElementById("optDropdown");
   var qrContainer = document.getElementById('qr');
   var optDealInfo = document.getElementById('opt-deal-info');
   var bussName = document.getElementsByClassName('buss_name')[0];
   var bussUrl = document.getElementsByClassName('buss_url')[0];
   var qrCanvas = document.getElementById('qr');


$(".id-<?php echo $row["post_id"]; ?>").on("click", function(){
var transqr = <?php echo $row["transaction_qr"]; ?>;
var dataString = JSON.stringify(transqr);
$.ajax({
  type: "POST",
  url: "includes/profile-ajax-inc.php",
  data: { transqr: dataString },
  
  success: function(data){

   makeQr(transqr+"", "L")
   console.log(data);
   $(".buss_name").html(data.buss_name);
   $(".buss_url").html("<a class='buss_url' href='"+data.buss_url+"'>Visitar Web</a>");
   $("#optDropdown-content-filled").html("<a href='deals.php?id=<?php echo $row["post_id"]; ?>'>Ver oferta</a><a href='#'>Ocultar oferta</a><a href='#'>Reportar Inconveniente</a>");
   movingitem.style.height = "240px";
   qrContainer.style.opacity = "1";
   optDealInfo.style.opacity = "1";
   bussName.style.opacity = "1";
   bussUrl.style.opacity = "1";
   loadingImg.style.opacity = "0";
  },
  error: function(e){
     console.log("ERROR");
  }

});
});
  </script>
  <?php 
  }
}
?>
</table>
        </div>
        </div>
    </div>  
</div> 
</section>
</div>
   <?php
   require 'components/footer.php'; // footer php
   ?>
<script>

  $(".item-profile").on("click", function(){
    var position = $(this).offset();
    console.log(position.top);

    movingitem.style.transform = "translateY("+(position.top-233)+"px)";

    qrContainer.style.opacity = "0";
    qrContainer.style.transition = "all 0.2s ease";

    bussName.style.opacity = "0";
    bussName.style.transition = "all 0.2s ease";

    bussUrl.style.opacity = "0";
    bussUrl.style.transition = "all 0.2s ease";

    loadingImg.style.opacity = "1";
    
    qrCanvas.getContext("2d").clearRect(0, 0, qrCanvas.width, qrCanvas.height);
  });

  var optButton = document.getElementById('opt-deal-info');
  $(optButton).on("click", function(){
    document.getElementById("optDropdown").classList.toggle("show");

  });



  window.onclick = function(event) {
  if (!event.target.matches('#opt-deal-info')) {
    var dropdowns = document.getElementsByClassName("optDropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');

      }
    }
  }
}


</script>
<script src="./js/qrious.min.js"></script>
<script>
function makeQr(value, level) {
        var qr = new QRious({
          element: document.getElementById('qr'),
          value: value,
          level: level, // Error correction level of the QR code (L, M, Q, H)
          size: 125, // Size of the QR code in pixels.
          padding: null // padding in pixels
        });
      };
</script>
</body>
</html>