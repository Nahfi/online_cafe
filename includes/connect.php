<?php
session_start();
$servername = "localhost";
$server_user = "root";
$server_pass = "root";
$dbname = "food";
$name = $_SESSION['name'];
$role = $_SESSION['role'];


  //  echo "<img src = '".$photo.'" />';

$con = new mysqli($servername, $server_user, $server_pass, $dbname);
?>