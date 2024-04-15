<?php
session_start();
$username = $_POST["username"];
$password = $_POST["password"];
$_SESSION["user"] = $username;

include("../Model/login.php");
$log = new login();
$log->query($username, $password);
?>