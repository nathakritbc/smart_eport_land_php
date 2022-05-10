<?php 
$servername = "localhost";
$username = "sa";
$password = "sa";
$dbname = "ltax";
$db_port="3304";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname,$db_port);
// Change character set to utf8
mysqli_set_charset($conn,"utf8");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}