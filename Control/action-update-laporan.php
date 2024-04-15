<?php
include("../Model/connection-database.php");
$No_Identitas = $_POST['No_Identitas'];
$Nama  = $_POST['Nama'];
$Alamat = $_POST['Alamat'];
$Tanggal_Lahir = $_POST['Tanggal_Lahir'];
$Ciri_ciri = $_POST['Ciri_ciri'];
$Pekerjaan = $_POST['Pekerjaan'];
$Agama = $_POST['Agama'];
$Status = $_POST['Status'];
$Deskripsi = $_POST['Deskripsi'];

require_once("../Model/polisi-main-page.php");
$laporan = new laporan();
$laporan->updateLaporan($No_Identitas, $Nama, $Alamat, $Tanggal_Lahir, $Ciri_ciri, $Pekerjaan, $Agama, $Status, $Deskripsi);



?>