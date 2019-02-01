<div class="box-content-p">

<div class="box-content-p-img">
    <img src="<?php echo $post_hero_img;?>" alt="">


</div>
<div class="container-p">
<div class="box-content-p-title">
<div class="box-content-p-title-buss-img">
<img src="<?php echo $post_buss_cover;?>" alt="">
</div>
<div class="name-data-container">
   <span><?php echo $post_title;?></span>
<span style="font-size: 12px;margin-top: 2px;"><?php imprimirTiempo($updated_at_date, $updated_at_hour); ?></span>
 
</div>
</div>

<div class="box-content-p-buss"  style="margin-top: 5px;">
<strong><?php echo $post_buss_name;?></strong>
</div>

<div class="box-content-p-qr-data">
<?php echo $trans_updated_at;?>
</div>

<div class="box-content-p-qr-finished">
<?php
if($finished >= 1){
echo '<span style="color:red;">Ya reclamado</span>';
}else{
 echo '<span style="color:green;">Aun sin reclamar</span>';
}

?>
</div>

<div class="box-content-p-qr">
Ver codigo
</div>

</div>
</div>