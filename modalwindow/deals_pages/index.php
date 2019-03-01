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
        <p>Anote bem ou <strong>salve o lugar</strong> onde você tem que ir depois de ter seu código</p>
      <p>Se você tem tudo pronto, você pode<strong>continuar</strong></p>
        </div>


        
        <div>

        <div><a class="button blue modal-continue" onClick="cargarContenido('modalwindow/deals_pages/continue.php?id=<?php echo $post_url_id;?>#top')"  >Vou continuar</a></div>

        </div>
</div>