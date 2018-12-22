<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'deals_pages-inc.php';
?>

<div class = "buss-info-container">
        <div class="deal-info-metadata">
        <div class="deal-info-name"><?php echo $post_title; ?></div>
        <div class="deal-info-box"><?php echo $post_desc; ?></div>
        </div>
</div>

        <div class="deal-info2">
        <p>Aceptas darme todo tu dinero?</p>
      <p>Si no le das a "NO" se considera un si...</p>
        </div>


        
        <div>

        <div><a class="button-red modal-continue" a onClick="cargarContenido('modalwindow/deals_pages/continue.php?id=<?php echo $post_url_id;?>')"  href="#">Voy a continuar</a></div>

        </div>
