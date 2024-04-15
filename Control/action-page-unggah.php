<?php
  
include("../Model/connection-database.php");
session_start();
$user = $_SESSION["idUser"];

$t=time();
$dateHariini = (date("Y-m-d",$t));

$pelapor = "";
$id_Polisi = "";

require_once("../Model/polisi-main-page.php");
$laporan = new laporan();
// $id_Polisi = $laporan->getidPolisi($user);


// untuk mendapatkan data pelapor
$No_Identitas = $_GET["id_hilang"];
$pelapor = $laporan->getPelapor($No_Identitas);;

// unggah laporan
// $laporan->unggahLaporan($No_Identitas, $pelapor, $id_Polisi,$dateHariini);
$laporan->unggahLaporan($No_Identitas, $pelapor, $user,$dateHariini);


?>