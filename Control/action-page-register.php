<?php
$nik = $_POST["nik"] ;
$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$hp = $_POST["hp"];
$user = $_POST["username"];
$pass = $_POST["password"];
$foto = $_FILES["myfile"]['name'];

// Given password
$password = $_POST["password"];;

// Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);
// $data = file_get_contents($_FILES['myfile']['tmp_name']);

include("../Model/register.php");
$reg = new Register();
$reg->query($nik, $nama, $alamat, $hp, $user, $pass, $uppercase, $lowercase, $number, $specialChars, $foto );

?>

