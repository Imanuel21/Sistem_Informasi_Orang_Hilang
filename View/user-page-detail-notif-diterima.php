<?php
include("../Model/connection-database.php");
session_start();
$user = $_SESSION["user"];
$komen = "";
$id_user = "";
$pelapor = "";

// mendapatkan id atau nik berdasarkan username
require_once("../Control/action-main-page.php");
$y = new main_page();
$y->setUsername($user);
$y->setIdUser();
$id_user = $y->getIdUser();
$_SESSION["idUser"] = $id_user;

//mendapatkan jumlah pemberitahuan yang disimpan dalam $countNotif
$y->setCountNotif();
$countNotif = $y->getCountNotif();

// proses untuk mengambil data laporan agar ditampilkan pada detail notif
$x = new polisi();
$result = $x->getDetailLaporan($_GET["id_hilang"]);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="main-page.css" />
    <title>ORANG HILANG</title>
  </head>
  <body>
    <nav class="navbar">
      <div class="nav-wrapper">
        <img src="../img/logo.PNG" class="brand-img" alt="" />
        <div class="nav-items">
        <a href="main-page.php"><img src="../img/home.PNG" class="icon" alt="" /></a>
          <a href="page-tambah-laporan.php?user=<?php echo $user; ?>"><img src="../img/add.PNG"class="icon"/></a>
          <a href="user-notif.php?user=<?php echo $user ?>"><img src="../img/notif.png" class="icon" alt="" /></a>
          <span class="icon-button__badge"><?php echo $countNotif;?></span>
          <?php
            $sql4 = "SELECT * FROM users WHERE username = '".$user."'";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
              // output data of each row
              while($row4 = $result4->fetch_assoc()) {
              
          ?>
          <div class="dropdown">
            <?php echo '<img src= "data:image/png;base64,'.base64_encode($row4['foto_profil']).'"/> ';  ?>
          <button class="mainmenubtn"></button>
            <div class="dropdown-child">
                <a href="page-login.php">LOGOUT</a>
            </div>
          </div>
          <?php
          }
        }
          ?>
        </div>
      </div>
    </nav>
              <?php
              if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    $Image=$row['Foto'];
                  ?> 
                  <section class="main">
      <div class="wrapper">
        <div class="left-col">
          <div class="post">
            <div class="info">
              <div class="user">
              <?php $sql3 = "SELECT * FROM  users  WHERE Id_user = '".$row['pelapor']."' "; 
                $result2 = $conn->query($sql3);
                if ($result2->num_rows > 0) {
                  // output data of each row
                  while($row2 = $result2->fetch_assoc()) {
                    $pelapor=$row2['username'];
                    ?>
                    <div class="profile-pic"><?php
                      echo '<img src= "data:image/png;base64,'.base64_encode($row2['foto_profil']).'"height = "400" width ="350"/> ';
                      ?>           
                      " alt="" /></div>
                    <?php

                  }
                } else {
                    echo "Hasil Pencarian Tidak Ada";
                }
                ?>
                <p class="username"><?php echo $pelapor ;?></p>
              </div>
                </div>
                <div class="tabel-content">
              <table action="pencarian.php" method="POST" border="0" style="background-color: orange;">
                  <tr>
                    <td rowspan="7">
                      <?php
                      echo '<img src= "data:image/png;base64,'.base64_encode($row['Foto']).'"height = "400" width ="350"/> ';
                      ?>
                    </td>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?php echo $row["Nama"]; ?> </td>
                  </tr>
                  <tr>
                    <td>TTL</td>
                    <td>:</td>
                    <td><?php echo $row["Tanggal_Lahir"]; ?> </td>
                  </tr>
                  <tr >
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?php echo $row["Pekerjaan"]; ?> </td>
                  </tr>
                  <tr >
                    <td>Agama</td>
                    <td>:</td>
                    <td><?php echo $row["Agama"]; ?> </td>
                  </tr>
                  <tr >
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?php echo $row["Alamat"]; ?> </td>
                  </tr>
                  <tr >
                    <td>Ciri-ciri</td>
                    <td>:</td>
                    <td><?php echo $row["Ciri_ciri"]; ?></td>
                  </tr>
                  <tr >
                    <td>Deskripsi</td>
                    <td>:</td>
                    <td><?php echo $row["Deskripsi"]; ?> </td>
                  </tr>
                  </table>
            </div>
          </div>
          </div> 
      </div>
    </section>
              <?php
                  }
              } else {
                  echo "Hasil Pencarian Tidak Ada";
              }
              ?>
    
  </body>
</html>