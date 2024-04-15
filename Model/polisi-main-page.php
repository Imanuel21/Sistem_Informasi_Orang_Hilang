<?php
class laporan{

    public function tambahLaporan($pelapor, $nik , $nama, $alamat, $ttl,$ciri,$pekerjaan,$agama, $status,$deskripsi,$dateHariini, $foto){
        if(!$foto){
            echo '<script language="javascript">alert("Data yang anda masukkan kurang tepat, silahkan coba kembali ");</script>';
            echo "<script>document.location = '../View/page-tambah-laporan.php?user=this->user'</script>";
        }else{
            $dbh = new PDO('mysql:host=localhost;port=3307;dbname=orang_hilang', 'root', '');
            if (isset($_POST['btn'])) {
                $data = file_get_contents($_FILES['myfile']['tmp_name']);
                $stmt = $dbh->prepare("INSERT INTO orang_hilang VALUES(?,?,?,?,?,?,?,?,?,'0',?,?,?)");
                $stmt->bindParam(1,$nik);
                $stmt->bindParam(2,$nama);
                $stmt->bindParam(3,$alamat);
                $stmt->bindParam(4,$ttl);
                $stmt->bindParam(5,$ciri);
                $stmt->bindParam(6,$pekerjaan);
                $stmt->bindParam(7,$agama);
                $stmt->bindParam(8,$data);
                $stmt->bindParam(9,$status);
                $stmt->bindParam(10,$deskripsi);
                $stmt->bindParam(11,$pelapor);
                $stmt->bindParam(12,$dateHariini);
                if ($stmt->execute() ==  TRUE) {
                    echo '<script language="javascript">alert("Laporan anda berhasil ditambahkan, silahkan tunggu laporan diverivikasi");</script>';
                    echo "<script>document.location = '../View/main-page.php'</script>";
                }else {
                    echo '<script language="javascript">alert("Laporan anda gagal ditambahkan");</script>';
                    echo "<script>document.location = '../View/page-tambah-laporan.php'</script>";
                }
            }else{
                  echo '<script language="javascript">alert("Data yang anda masukkan kurang tepat, silahkan coba kembali");</script>';
                  echo "<script>document.location = '../View/page-tambah-laporan.php'</script>";
            }
          }
    }

    public function unggahLaporan($No_Identitas, $pelapor, $id_Polisi,$dateHariini){
        include("connection-database.php");
        $sql2 = "INSERT INTO laporan (`No_Laporan`, `ID_User`, `No_Identitas`, `ID_Polisi`, `Tanggal_Validasi`) VALUES ('','".$pelapor."','".$No_Identitas."','".$id_Polisi."','".$dateHariini."')";


        if ($conn->query($sql2) === TRUE) {
          //set visible jadi 1 yang artinya sudah diunggah
          $sql3 = "UPDATE `orang_hilang` SET `Visible` = '1' WHERE `orang_hilang`.`No_Identitas` = '".$No_Identitas."'";
          if ($conn->query($sql3)) {
            echo '<script language="javascript">alert("LAPORAN BERHASIL DIUNGGAH");</script>';
            echo "<script>document.location = '../View/polisi-page-notif.php'</script>";
          }else {
            echo '<script language="javascript">alert("LAPORAN GAGAL DIUNGGAH");</script>';
            echo "<script>document.location = '../View/polisi-page-detail-notif.php'</script>";
          }
          
        } 
    }

    public function tolakLaporan($No_Identitas){
        include("connection-database.php");

        //set visible jadi 2 yang artinya laporan ditolak
        $sql3 = "UPDATE `orang_hilang` SET `Visible` = '2' WHERE `orang_hilang`.`No_Identitas` = '".$No_Identitas."'";
        if ($conn->query($sql3)) {
          echo '<script language="javascript">alert("LAPORAN BERHASIL DITOLAK");</script>';
          echo "<script>document.location = '../View/polisi-page-notif.php'</script>";
        }else {
          echo '<script language="javascript">alert("LAPORAN GAGAL DITOLAK");</script>';
          echo "<script>document.location = '../View/polisi-page-detail-notif.php'</script>";
        }
    }

    public function updateLaporan($No_Identitas , $Nama, $Alamat, $Tanggal_Lahir,$Ciri_ciri,$Pekerjaan,$Agama, $Status,$Deskripsi){
        include("connection-database.php");
        $sql = "UPDATE `orang_hilang` SET `Nama`='".$Nama."',`Alamat`='".$Alamat."',
        `Tanggal_Lahir`='".$Tanggal_Lahir."',`Ciri_ciri`='".$Ciri_ciri."',
        `Pekerjaan`='".$Pekerjaan."',`Agama`='".$Agama."',
        `Status`='".$Status."',`Deskripsi`='".$Deskripsi."' WHERE No_Identitas = '".$No_Identitas."'";

        if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">alert("Laporan berhasil diedit");</script>';
        echo "<script>document.location = '../View/polisi-main-page.php'</script>";
        } else {
        echo '<script language="javascript">alert("Laporan gagal diedit");</script>';
        echo "<script>document.location = '../View/edit-laporan.php'</script>";
        }
    }

    

    

    public function getPelapor($No_Identitas){
        include("connection-database.php");
        $sql1 = "SELECT  * FROM orang_hilang WHERE No_Identitas = '".$No_Identitas."'";
        $result2 = $conn->query($sql1);
        if ($result2->num_rows > 0) {
        // output data of each row
        while($row2 = $result2->fetch_assoc()) {
            $pelapor = $row2['pelapor'];
        }
        }
        return $pelapor;
    }

    public function getLaporan(){
        include("connection-database.php");
        $sql1 = "SELECT  *
        FROM orang_hilang e JOIN laporan d
        ON (e.No_Identitas = d.No_Identitas) WHERE e.Status = 'Menghilang'";

        $result = $conn->query($sql1);

        return $result;
    }

    public function getDetailLaporan($No_Identitas){
        include("connection-database.php");
        // proses untuk menampilkan data laporan kedalam tabel
        $sql1 = "SELECT  * FROM orang_hilang e JOIN laporan d
        ON (e.No_Identitas = d.No_Identitas) WHERE e.No_Identitas = '".$No_Identitas."'";

        $result = $conn->query($sql1);
        return $result;
    }

    public function getDetailOrangHilang($No_Identitas){
        include("connection-database.php");
        // proses untuk menampilkan data laporan kedalam tabel
        $sql1 = "SELECT  * FROM orang_hilang WHERE No_Identitas = '".$No_Identitas."'";

        $result = $conn->query($sql1);
        return $result;
    }
    public function getidPolisi($userPolisi){
        include("connection-database.php");
        $sql0 = "SELECT * FROM missing_person_unit WHERE Username = '".$userPolisi."'";
        $temp = "";
        $result0 = $conn->query($sql0);
        if ($result0->num_rows > 0) {
            // output data of each row
            while ($row = $result0->fetch_assoc()) {
                $temp = $row['ID_Polisi'] ;
            }
        }
        return $temp;
    }

    public function getPolisiCountNotif(){
        include("connection-database.php");
        $temp = 0;
        $sql5 = "SELECT  * FROM orang_hilang WHERE Visible = '0'";
        $result5 = $conn->query($sql5);
        if ($result5->num_rows > 0) {
            // output data of each row
            while ($row5 = $result5->fetch_assoc()) {
                $temp++;
            }
        }
        return $temp;
    }
}
// $y = new laporan;
// $id_user = $y->getidPolisi("polisiJaya");
// echo " user : " . $id_user . "<br>";






?>