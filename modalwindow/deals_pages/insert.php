<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
require '../../includes/deals_pages-inc.php';
?>
<div id="top" class="animated fadeIn insert-page">

<?php
if(isset($_SESSION['client_id'])){
    require 'insert-loged.php';


}else{
    require 'insert-nologed.php';
    exit();
}
?>
</div>

