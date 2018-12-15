<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JUDIOSTATIC</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Oxygen:400,700" rel="stylesheet">

</head>

<body>
    
<div id="themoderfoquer">

<?php
require 'components/header.php'; // Header php
?>


<?php
require 'components/main-hero.php'; // Header php
?>

<!--Final main portada-->
<section>
<div id="main-container">
     <div id='main'>

        <?php
            require 'components/main-items.php'; // Main Items php
        ?>


        <?php
            require 'components/main-posts.php'; // Main posts php
        ?>
                
    </div>  
</div> 

</section>

</div>
        <?php
            require 'components/footer.php'; // footer php
        ?>

</body>

</html>