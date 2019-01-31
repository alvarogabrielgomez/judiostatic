<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if(isset($_SESSION['client_id'])){
    require 'dbh-inc.php';

}else{
    require 'login.php'; // Main Items php
    exit();
}