<?php
date_default_timezone_set('America/Lima');
session_start();


// Connection PDO
class PDOconnection {
  private $Host = "127.0.0.1";
  private $User = "root";
  private $Pass = "";
  private $DB = "crud_php_mvc";
  private $Chatset = "utf8";

  public function getConnection(){
    try {
      $connection= "mysql:host=".$this->Host.";dbname=".$this->DB.";charset=".$this->Chatset;
      $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES =>false,
        PDO::ATTR_CASE,PDO::CASE_LOWER,PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC
      ];
      $PDOConn = new PDO($connection,$this->User,$this->Pass,$options);
      // $PDOConn = new PDO($conexion,$this->User,$this->Pass);
      // $PDOConn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      // $PDOConn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
			// $PDOConn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
			// $PDOConn->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
      return $PDOConn;
    } catch (PDOException $ex) {
      echo "Error ".$ex->getMessage();
    }
  }


}



?>
