<?php
Class comment{

    public $id_informan, $informasi, $id_laporan;
    public function __construct($id_informan, $informasi, $id_laporan) {
        $this->id_informan = $id_informan;
        $this->informasi = $informasi;
        $this->id_laporan = $id_laporan;
    }
    
    public function tambahComment(){
        include("connection-database.php");
        $sql1 = "INSERT INTO `informasi`(No_Informasi, Id_Informan, Informasi) VALUES ('[value-1]','".$this->id_informan."','".$this->informasi."')";
        if ($conn->query($sql1) === TRUE) {
            $sql2 = "SELECT * FROM `informasi` ORDER BY No_Informasi DESC LIMIT 1";
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0) {
                // output data of each row
                while($row2 = $result2->fetch_assoc()) {
                    $sql3 = "INSERT INTO `detail_laporan`(No_Laporan, No_Informasi) VALUES ('".$this->id_laporan."','". $row2["No_Informasi"]."')";
                    if ($conn->query($sql3) === TRUE) {
                        echo '<script language="javascript">alert("Informasi berhasil ditambahkan");</script>';
                        echo "<script>document.location = '../View/main-page.php'</script>";
                    }else {
                        echo '<script language="javascript">alert("Informasi gagal ditambahkan");</script>';
                        echo "<script>document.location = '../View/main-page.php'</script>";
                    }
                }
            }else{
                echo '<script language="javascript">alert("Informasi berhasil ditambahkan");</script>';
                echo "<script>document.location = '../View/main-page.php'</script>";
            }
        } else {
            echo '<script language="javascript">alert("Informasi gagal ditambahkan");</script>';
            echo "<script>document.location = '../View/main-page.php'</script>";
        }
    }
}


?>