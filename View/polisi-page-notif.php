<?php
include("../Model/connection-database.php");
session_start();
$user = $_SESSION["user"];

$id_user = "";

// mendapatkan NRP  berdasarkan username
require_once("../Control/action-main-page.php");
$y = new polisi;
$id_user = $y->getidPolisi($user);
$_SESSION["idUser"] = $id_user;

//mendapatkan jumlah pemberitahuan yang disimpan dalam $countNotif
$countNotif = $y->getPolisiCountNotif();

$count = 1;

$sql1 = "SELECT  * FROM orang_hilang WHERE Visible = '0'";
$result = $conn->query($sql1);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="polisi-main-page.css" />
    <title>NOTIFIKASI</title>
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
<section class="main">
      <div class="wrapper">
        <div class="left-col">
          <div class="post">
                <div class="tabel-content">
                <?php
                  if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {

                  ?>
                  <div class="link">
                  <a style="color: black;" href="polisi-page-detail-notif.php?id_hilang=<?php echo $row["No_Identitas"];  ?>&user=<?php echo $user;?>"><?php echo $count.". ".$row["pelapor"]." telah menambahkan laporan <br>"; $count++; ?></a>
                  </div>
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
              </div>
          </div>
          </div> 
      </div>
    </section>
  </body>
</html>
