<?php

 error_reporting(E_ALL);
 ini_set('display_errors', '1'); 
 
 
$serverName = "localhost";
$dbUsername = "admin";   
$dbPassword = "A8qFQIz8haQlWQpx";
$dbName = "login_system";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}