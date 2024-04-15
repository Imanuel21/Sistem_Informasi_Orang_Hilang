<?php
class main_page {
  public $username;
  public $id;

  public $countNotif;
  public $PolisicountNotif;

  public function setUsername($user){
    $this->username = $user;
  }
  public function getUsername(){
    return $this->username;
  }
public function setIdUser(){
    require_once("../Model/main_page.php");
    $id = new page_utama();
    $y = $this->getUsername();
    $id->setId_user($y);
    $x = $id->getId_User();
    $this->id= $x;
  }

  public function getIdUser(){
    return $this->id;
  }
  

  public function setCountNotif(){
    require_once("../Model/main_page.php");
    $id = new page_utama();
    $y = $this->getUsername();
    $id->setId_user($y);
    $id->setCountNotif();
    $x = $id->getCountNotif();
    $this->countNotif=$x;
  }
  public function getCountNotif(){
    return $this->countNotif;
  }

  public function setPolisiCountNotif(){
    require_once("../Model/main_page.php");
    $id = new page_utama();
    $y = $this->getUsername();
    $id->setId_user($y);
    $id->setPolisiCountNotif();
    $x = $id->getPolisiCountNotif();
    $this->PolisicountNotif=$x;
  }
  public function getPolisiCountNotif(){
    return $this->PolisicountNotif;
  }
  
}
require_once("../Model/polisi-main-page.php");
class polisi extends laporan{
  
}



?>