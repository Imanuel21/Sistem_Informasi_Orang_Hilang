<?php
include("../Model/connection-database.php");
session_start();

$informasi = "";
$id_informan = $_SESSION["idUser"];
$informasi = $_GET["comment"];
$id_laporan = $_GET["id_laporan"];

require_once("../Model/tambah-comment.php");
$comment = new comment($id_informan, $informasi, $id_laporan);
$comment->tambahComment();

?>