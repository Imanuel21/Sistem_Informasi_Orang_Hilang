<?php
// session_start();
$_SESSION["user"] = $_SESSION["user"];
class login {
    
    public function query ($user, $pass){
        include("connection-database.php");
        $sql1 = "SELECT username, password FROM `users` WHERE username = '".$user."' AND password ='".$pass."'";
        $result = $conn->query($sql1);
        if ($result->num_rows > 0) {
            header("Location: http://localhost/rpl/View/main-page.php?");
            // header("Location: http://localhost/rpl/Control/control-main-page.php");
        } 
        else { //jika yang login adalah polisi
                $username =  $user;
                $password = $pass;
                include("connection-database.php");
                $sql2 = "SELECT username, password FROM `missing_person_unit` WHERE Username = '".$user."' AND Password ='".$pass."'";
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                    header("Location: http://localhost/rpl/View/polisi-main-page.php");
                } else {
                    echo '<script language="javascript">alert("LOGIN GAGAL");</script>';
                    echo "<script>document.location = 'http://localhost/rpl/View/page-register.php'</script>";
            }
        }
    }
}


?>