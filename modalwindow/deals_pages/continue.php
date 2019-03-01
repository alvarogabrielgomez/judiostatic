<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require '../../includes/deals_pages-inc.php';
?>
<div id="top" class="animated fadeIn continue">
<div class = "buss-info-container">
        <div class="deal-info-metadata">
        <div class="deal-info-name"><?php echo $post_title; ?></div>
        <div class="deal-info-box"><?php echo $post_desc; ?></div>
        </div>
</div>

        <div class="deal-info2">
        <p><strong>Verifique</strong> se tudo está em ordem e é a oferta que você deseja. Se tudo estiver correto, você pode <strong>continuar</strong>*</p>
      <p style="font-size: 13px;
    color: #9a9a9a;
    font-weight: 600;">*Depois de continuar, você estará aceitando os termos e condições.</p>
        </div>


        
        <div>

        <div><a class="button blue modal-continue" onClick="cargarContenido('modalwindow/deals_pages/insert.php?id=<?php echo $post_url_id;?>#top')" >Vou continuar</a></div>

        </div>
</div>