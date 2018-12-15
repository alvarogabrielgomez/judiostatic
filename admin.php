<?php
session_start();


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
            require 'components/header.php'; // Main Items php
        ?>


<!--Final main portada-->
<section>
<div id="main-container">


        <?php
            require 'components/admin-posts-container.php'; // Main posts admin php
        ?>

        </div> 
    </section>
</div>

<footer>
    
</footer>

</body>

</html>