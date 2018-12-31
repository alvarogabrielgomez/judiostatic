<?php
$blob = $_POST['canvas'];
//return $blob;
file_put_contents('/media/crop_products/test.png', $blob);
?>