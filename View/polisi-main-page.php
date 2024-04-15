<?php
include("../Model/connection-database.php");
session_start();
$user = $_SESSION["user"];
$komen = "";
$id_user = "";

// mendapatkan NRP  berdasarkan username
require_once("../Control/action-main-page.php");
$y = new polisi;
$id_user = $y->getidPolisi($user);
$_SESSION["idUser"] = $id_user;

//mendapatkan jumlah pemberitahuan yang disimpan dalam $countNotif
$countNotif = $y->getPolisiCountNotif();

// mendapatkan hasil query tentang laporan
$x = new polisi();
$result = $x->getLaporan();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="polisi-main-page.css" />
    <title>ORANG HILANG</title>
  </head>
  <style>
    .icon-button {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 50px;
  height: 50px;
  color: #333333;
  background: #dddddd;
  border: none;
  outline: none;
  border-radius: 50%;
}

.icon-button:hover {
  cursor: pointer;
}

.icon-button:active {
  background: #cccccc;
}

.icon-button__badge {
  position: absolute;
  top: -4px;
  right: 5px;
  width: 15px;
  height: 15px;
  background: red ;
  color: #ffffff;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
}
.button {
  /* margin-top: 40px; */
    width: 100px;
    background-color: #4169E1;
    color: white;
    padding: 7px 0;
    font-size: 15px;
    font-weight: 60;
    border: none;
    cursor: pointer;
    margin-left: -20px;
}
  </style>
  <body>
    <nav class="navbar">
      <div class="nav-wrapper">
        <img src="../img/logo.PNG" class="brand-img" alt="" />
        <div class="nav-items">
          <a href="polisi-main-page.php"><img src="../img/home.PNG" class="icon" alt="" /></a>
          <a href="polisi-page-notif.php"><img src="../img/notif.png" class="icon" alt="" /></a>
          <span class="icon-button__badge"><?php echo $countNotif;?></span>
          <?php
            $sql4 = "SELECT * FROM missing_person_unit WHERE username = '".$user."'";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
              // output data of each row
              while($row4 = $result4->fetch_assoc()) {
          ?>
          <div class="dropdown">
            <?php echo '<img style="border-radius = 50%" src= "data:image/png;base64,'.base64_encode($row4['foto_profil']).'"/> ';  ?>
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
                  while($row2 = $result2->fetch_assoc()) {
                    $pelapor=$row2['username'];
                    ?>
                    <div class="profile-pic">
                      <?php
                      echo '<img src= "data:image/png;base64,'.base64_encode($row2['foto_profil']).'"height = "400" width ="350"/> ';
                      ?>           
                    </div>
                    <?php
                  }
                } else {
                    echo "Hasil Pencarian Tidak Ada";
                }
                ?>
                <?php $sql3 = "SELECT * FROM  users  WHERE Id_user = '".$row['pelapor']."' "; 
                $result2 = $conn->query($sql3);
                if ($result2->num_rows > 0) {
                  // output data of each row
                  while($row2 = $result2->fetch_assoc()) {
                    $pelapor=$row2['username'];
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
                    <td><b>Nama</b></td>
                    <td><b>:</b></td>
                    <td><b><?php echo $row["Nama"]; ?></b></td>
                  </tr>
                  <tr>
                    <td><b>TTL</b></td>
                    <td><b>:</b></td>
                    <td><b><?php echo $row["Tanggal_Lahir"]; ?></b> </td>
                  </tr>
                  <tr >
                    <td><b>Pekerjaan</b></td>
                    <td><b>:</b></td>
                    <td><b><?php echo $row["Pekerjaan"]; ?></b> </td>
                  </tr>
                  <tr >
                    <td><b>Agama</b></td>
                    <td><b>:</b></td>
                    <td><b><?php echo $row["Agama"]; ?> </b></td>
                  </tr>
                  <tr >
                    <td><b>Alamat</b></td>
                    <td><b>:</b></td>
                    <td><b><?php echo $row["Alamat"]; ?></b> </td>
                  </tr>
                  <tr >
                    <td><b>Ciri-ciri</b></td>
                    <td><b>:</b></td>
                    <td><b><?php echo $row["Ciri_ciri"]; ?></b></td>
                  </tr>
                  <tr >
                    <td><b>Deskripsi</b></td>
                    <td><b>:</b></td>
                    <td><b><?php echo $row["Deskripsi"]; ?></b> </td>
                  </tr>
                  </table>
            </div>
            <div class="post-content">
              <div class="reaction-wrapper">
                <a href="edit-laporan.php?No_Identitas=<?php echo $row["No_Identitas"]?>&user=<?php echo $user;?>"><button class="button">Edit Laporan</button></a>
              </div>
              <?php
                $no_laporan = $row["No_Laporan"];
                $sql2 = "SELECT * FROM laporan 
                JOIN detail_laporan ON laporan.No_Laporan = detail_laporan.No_Laporan
                JOIN informasi ON informasi.No_Informasi = detail_laporan.No_Informasi 
                JOIN users ON users.Id_user = informasi.Id_Informan WHERE laporan.No_Laporan = ".$no_laporan."";
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                  // output data of each row
                  while($row2 = $result2->fetch_assoc()) {
              ?>
                  <p class="description"><span><?php echo $row2["username"]; ?></span> <?php echo $row2["Informasi"]; ?></p>
              <?php
                  }
                }
              ?>
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
              // echo "user : " . $id_user."<br>";
              // echo "user : " . $id_user."<br>";
              // echo "user : " . $id_user."<br>";
              // echo "user : " . $id_user."<br>";
              // echo "user : " . $id_user."<br>";
              // echo "user : " . $id_user."<br>";
              // echo "user : " . $id_user."<br>";
              ?>
    
  </body>
</html>
