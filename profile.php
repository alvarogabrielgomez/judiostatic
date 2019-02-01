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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tu cuenta Omeleth</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="components/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="components/slick/slick-theme.css"/>



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



<section>
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
        <?php 
        require 'components/content-profile.php';
        ?>
        </div>
        </div>
        <div class="side-profile-container">

        </div>
          

    </div>  
</div> 

</section>

</div>
        <?php
            require 'components/footer.php'; // footer php
        ?>

</body>

</html>