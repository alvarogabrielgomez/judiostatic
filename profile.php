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
    <meta name="viewport" content="width=370, initial-scale=1.0, user-scalable=no"/>
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
<div id="main-container" class="main-container-profile" >
     <div id='main' class="main-profile">
    
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
WHERE c.client_id = 0
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
      <td class="item-profile id-'.$row["post_id"].'" ><span>'.$row["title"].'</span></td>
    </tr>';

  }
}
?>
</table>

        </div>
        </div>

        <div class="side-profile-container">

        <div class="container-deal-info">
        <div id="deal-info">
          <p>Valar Vergulis</p>
          <a href="">Ver en Maps</a>
        <div class="deal-info-qr">
        <canvas id="qr" style="margin:auto;display:block;margin-top:8px;"></canvas>
        </div>
        </div>
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
  var movingitem = document.getElementById('deal-info');

  $(".item-profile").on("click", function(){
    var position = $(this).offset();

    console.log(position.top);
    movingitem.style.top = ""+(position.top-235)+"px";     
  });
</script>

<script src="./js/qrious.min.js"></script>

<script>



      (function() {
        var qr = new QRious({
          element: document.getElementById('qr'),
          value: '123',
          level: 'L', // Error correction level of the QR code (L, M, Q, H)
          size: 125, // Size of the QR code in pixels.
          padding: null // padding in pixels
        });
      })();
</script>

</body>

</html>