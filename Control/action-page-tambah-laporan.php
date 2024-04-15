<?php
session_start();
$user = $_SESSION["user"];
date_default_timezone_set('Asia/Jakarta');
$dateHariini = date( 'Y-m-d  H:i:s');
$nik = $_POST["nik"] ;
$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$ttl = $_POST["ttl"];
$ciri = $_POST["ciri"];
$pekerjaan = $_POST["pekerjaan"];
$agama = $_POST["agama"];
$status = "Menghilang";
$deskripsi = $_POST["deskripsi"];

$foto = $_FILES["myfile"]['name'];
$pelapor = $_SESSION["idPelapor"];
$id_Polisi = "";

    if(!$foto){ 
        echo '<script language="javascript">alert("Data yang anda masukkan kurang tepat, silahkan coba kembali ");</script>';
        echo "<script>document.location = '../View/page-tambah-laporan.php?user=$user'</script>";
    }else{
        require_once("../Model//polisi-main-page.php");
        $laporan = new laporan();
        $laporan->tambahLaporan($pelapor, $nik , $nama, $alamat, $ttl,$ciri,$pekerjaan,$agama, $status,$deskripsi,$dateHariini, $foto);

    }

?>



