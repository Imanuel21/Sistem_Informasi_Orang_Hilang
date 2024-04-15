<?php
class page_utama{
    public $id_user;
    public $counNotif;
    public $PolisicounNotif;
    public function setId_user($username){
        $user = $username;
        include("connection-database.php");
        
        // $sql0 = "SELECT * FROM users WHERE username = '".$username."'";
        $sql0 = "SELECT * FROM users WHERE username = '".$user."'";
        $result0 = $conn->query($sql0);
        if ($result0->num_rows > 0) {
        // output data of each row
        while($row0 = $result0->fetch_assoc()) {
            $this->id_user = $row0['Id_user'];
        }
        }
    }
    public function getId_User(){
        return $this->id_user;
    }
    public function setCountNotif(){
        include("connection-database.php");
        $temp = 0;
        $sql5 = "SELECT  * FROM orang_hilang WHERE pelapor = '".$this->getId_User()."' AND NOT Visible = '0'";
        $result5 = $conn->query($sql5);
        if ($result5->num_rows > 0) {
        // output data of each row
        while ($row5 = $result5->fetch_assoc()) {
            $temp++;
        }
        }
        $this->counNotif = $temp;
    }
    public function getCountNotif(){
        return $this->counNotif;
    }

    public function setPolisiCountNotif(){
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
        $this->PolisicounNotif = $temp;
    }
    public function getPolisiCountNotif(){
        return $this->PolisicounNotif;
    }

    
}

?>