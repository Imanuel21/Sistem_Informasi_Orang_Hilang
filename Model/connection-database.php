<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "orang_hilang";
$port ="3307";
// Create connection
$conn = new mysqli($servername, $username, $password,$db ,$port);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

