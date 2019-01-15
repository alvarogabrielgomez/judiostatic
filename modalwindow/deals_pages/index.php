<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require '../../includes/deals_pages-inc.php';


?>
<div class="animated fadeIn index">
<div class = "buss-info-container">
        <img src="<?php echo $cover_url; ?>" alt="image deals">
        <div class="buss-info-metadata">
        <div class="buss-info-name"><?php echo $post_buss_name; ?></div>
        <div class="buss-info-dir"><?php echo $post_buss_dir; ?></div>
        </div>
</div>

        <div class="deal-info1">
        <p>Anota bien o <strong>guarda el lugar</strong> a donde tienes que ir una vez tengas tu codigo</p>
      <p>Si ya tienes todo listo puedes <strong>continuar</strong></p>
        </div>


        
        <div>

        <div><a class="button blue modal-continue" onClick="cargarContenido('modalwindow/deals_pages/continue.php?id=<?php echo $post_url_id;?>')"  >Voy a continuar</a></div>

        </div>
</div>