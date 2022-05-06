<?php
$servername = "163.178.107.10";
$username = "laboratorios";
$password = "KmZpo.2796";
$db = "if7103_tarea1_b72204";
// Create connection
$connection = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$connection) {
   die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>