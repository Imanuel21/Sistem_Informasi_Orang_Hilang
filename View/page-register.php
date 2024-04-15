<!DOCTYPE html>
<html lang="en">
  <head>
    <title>REGISTRASI AKUN</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="page-register.css">
  </head>
  <body>
  <div class="wrapper">
        <form action="../Control/action-page-register.php" method="POST" enctype="multipart/form-data">
        <h3>Registrasi</h3>
        <br></br>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="on" type="text" class="form-control" name="nik" placeholder="Nomor Induk Kependudukan (NIK)">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="on" type="text" class="form-control" name="nama" placeholder="Nama">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="on" type="text" class="form-control" name="alamat" placeholder="Alamat">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="on" type="text" class="form-control" name="hp" placeholder="No.HP">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group d-flex align-items-center">
                <input autocomplete="off" type="file" class="form-control" name="myfile" id="myfile" title="Foto Profil" enctype="multipart/form-data">
            </div>
            <button  name="btn" >Daftar</button>
            <br></br>
            <!-- <center><p>Pastikan anda menginput data dengan benar!</p></center> -->
            <center><p>Jika sudah mempunyai akun silahkan login di bawah ini</p></center>
            <center><a href="page-login.php">Login</a></center>
        </form>
    </div>
  </body>
</html>