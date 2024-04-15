<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LOGIN</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="page-login.css">
  </head>
  <body>
    <div class="background">
      <div class="shape"></div>
      <div class="shape"></div>
    </div>
    <form action="../Control/action-page-login.php" method="POST">
      <h3>Login</h3>
      <input type="text" placeholder="Username" name="username"/>
      <input type="password" placeholder="Kata Sandi"  name="password" />
      <button>Masuk</button>
      <br></br>
      <center><p>Jika belum mempunyai akun silahkan mendaftar akun dulu di bawah ini</p></center>
      <center><a href="../View/page-register.php">Daftar</a></center>
      </div>
    </form>
  </body>
</html>
