<?php
session_start();
$user = $_SESSION["idUser"];

// untuk dapatkan yang lapor
$No_Identitas = $_GET["id_hilang"];

require_once("../Model/polisi-main-page.php");
$laporan = new laporan();
$laporan->tolakLaporan($No_Identitas);

?>