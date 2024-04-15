<?php

class Register{

    // public function query($nik, $nama, $alamat, $hp, $user, $pass, $data, $uppercase, $lowercase, $number, $specialChars, $foto, $password ){
    public function query($nik, $nama, $alamat, $hp, $user, $pass, $uppercase, $lowercase, $number, $specialChars, $foto){
        include("connection-database.php");
        $sql1= "SELECT * FROM users WHERE username = '".$user."'";
        $result = $conn->query($sql1);
        if ($result->num_rows > 0) {
                echo '<script language="javascript">alert("username anda sudah ada, Silahkan pilih yang lain");</script>';
                echo "<script>document.location = '../View/page-register.php'</script>";
        }else{
                if(!$foto){
                    echo '<script language="javascript">alert("Foto yang anda masukkan kurang tepat, silahkan coba kembali");</script>';
                    echo "<script>document.location = '../View/page-register.php'</script>";
                }else{
                        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) <= 8) {
                            echo '<script language="javascript">alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.");</script>';
                            echo "<script>document.location = '../View/page-register.php'</script>";
                        }else{
                            $dbh = new PDO('mysql:host=localhost;port=3307;dbname=orang_hilang', 'root', '');
                            if (isset($_POST['btn']) && $nik != "" && $nama != "" && $alamat != "" && $hp != "" && $user != "") {
                                $data = file_get_contents($_FILES['myfile']['tmp_name']);
                                $stmt = $dbh->prepare("INSERT INTO users VALUES(?,?,?,?,?,?,?)");
                                $stmt->bindParam(1,$nik);
                                $stmt->bindParam(2,$nama);
                                $stmt->bindParam(3,$alamat);
                                $stmt->bindParam(4,$hp);
                                $stmt->bindParam(5,$user);
                                $stmt->bindParam(6,$pass);
                                $stmt->bindParam(7,$data);
                                if ($stmt->execute() ==  TRUE) {
                                echo '<script language="javascript">alert("Akun ada berhasil didaftarkan, silahkan login");</script>';
                                echo "<script>document.location = '../View/page-login.php'</script>";
                                }else {
                                echo '<script language="javascript">alert("Akun anda gagal terdaftar, Silahkan coba kembali");</script>';
                                echo "<script>document.location = '../View/page-register.php'</script>";
                            }
                        }else{
                        echo '<script language="javascript">alert("Data yang anda masukkan kurang tepat, silahkan coba kembali");</script>';
                        echo "<script>document.location = '../View/page-register.php'</script>";
                        }
                    }
                
                }
        }
    }
}

?>