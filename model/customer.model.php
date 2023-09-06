<?php
require_once('connection.php');

class mdlCustomers extends PDOConnection{  

  public function mdlshowCustomers(){

    try {
      $connection=$this->getConnection();
      $stm = $connection->prepare("CALL consultar_usuarios();");
      $stm->execute();
      $listaUsuarios = $stm->fetchAll();
      return $listaUsuarios;
    } catch(PDOException $ex){
      echo "Error:  " . $ex->getMessage();
      return "Error";
    } 
  }

  public function mdlAddCustomer($dataCustomer){

    try {

      $connection=$this->getConnection();      
      $query ="CALL spRegistroCliente(:nombresC, :apePaternoC, :apeMaternoC, :paisC, :fechNacC, :tipoDocum, :numDocum, :celularC, :correoC, :usuarioC, :passUser, :rutaImgDocumU, :codRol, :fechCreaC, @ID)";
      $stm = $connection->prepare($query);
      $stm->bindParam(':nombresC', $dataCustomer['nombres'], PDO::PARAM_STR,50);
      $stm->bindParam(':apePaternoC', $dataCustomer['apePaterno'], PDO::PARAM_STR,50);
      $stm->bindParam(':apeMaternoC', $dataCustomer['apeMaterno'], PDO::PARAM_STR,50);
      $stm->bindParam(':paisC', $dataCustomer['pais'], PDO::PARAM_INT,11);
      $stm->bindParam(':fechNacC', $dataCustomer['fechNac'], PDO::PARAM_STR);
      $stm->bindParam(':tipoDocum', $dataCustomer['tipoDocumento'], PDO::PARAM_INT,11);
      $stm->bindParam(':numDocum', $dataCustomer['numDocumento'], PDO::PARAM_STR,50);
      $stm->bindParam(':celularC', $dataCustomer['celular'], PDO::PARAM_STR,15);
      $stm->bindParam(':correoC', $dataCustomer['email'], PDO::PARAM_STR,50);
      $stm->bindParam(':usuarioC', $dataCustomer['user'], PDO::PARAM_STR,30);      
      $stm->bindParam(':passUser', $dataCustomer['pass'], PDO::PARAM_STR,50);
      $stm->bindParam(':rutaImgDocumU', $dataCustomer['rutaImgDocumen'], PDO::PARAM_STR);
      $stm->bindParam(':codRol', $dataCustomer['codRol'], PDO::PARAM_INT,11);
      $stm->bindParam(':fechCreaC', $dataCustomer['fechCrea'], PDO::PARAM_STR);
      
      if($stm->execute()){
        return "ok";
      }else{
        echo "error";
      }

      $stm->closeCursor();
      

    } catch(PDOException $ex){

      echo "Error:  " . $ex->getMessage();
      return "Error";
    } 

  }

  public function mdlShowDataCustomer($codCus,$codClie){

    try {
      $connection=$this->getConnection();
      $stm = $connection->prepare("CALL consultarCliUsuCod(:codUsuC,:codClie);");
      $stm->bindParam(':codUsuC', $codCus, PDO::PARAM_INT,11);
      $stm->bindParam(':codClie', $codClie, PDO::PARAM_INT,11);
      $stm->execute();
      $dataCustomer = $stm->fetchAll();
      return $dataCustomer;
    } catch (PDOException $ex) {
      echo "Error:  " . $ex->getMessage();
      return "Error";
    } 

  }

  public function mdlUpdateCustomer($dataCustomer){

    try {
      $connection=$this->getConnection();      
      $query ="CALL spUpdateCliente(:codUsuC, :codClie, :nombresC, :apePaternoC, :apeMaternoC, :paisC, :fechNacC, :tipoDocum, :numDocum, :celularC,:correoC, :usuarioC, :passUserC, :codRolC, @ID)";
      $stm = $connection->prepare($query);
      $stm->bindParam(':codUsuC', $dataCustomer['codUserUpUs'], PDO::PARAM_INT,11);
      $stm->bindParam(':codClie', $dataCustomer['codCliUpUs'], PDO::PARAM_INT,11);
      $stm->bindParam(':nombresC', $dataCustomer['nombresUpUs'], PDO::PARAM_STR,50);
      $stm->bindParam(':apePaternoC', $dataCustomer['apePaternoUpUs'], PDO::PARAM_STR,50);
      $stm->bindParam(':apeMaternoC', $dataCustomer['apeMaternoUpUs'], PDO::PARAM_STR,50);
      $stm->bindParam(':paisC', $dataCustomer['paisUpUs'], PDO::PARAM_INT,11);
      $stm->bindParam(':fechNacC', $dataCustomer['fechNacUpUs'], PDO::PARAM_STR);
      $stm->bindParam(':tipoDocum', $dataCustomer['tipoDocumUpUs'], PDO::PARAM_INT,11);
      $stm->bindParam(':numDocum', $dataCustomer['numDocumUpUs'], PDO::PARAM_STR,50);
      $stm->bindParam(':celularC', $dataCustomer['celularUpUs'], PDO::PARAM_STR,15);
      $stm->bindParam(':correoC', $dataCustomer['emailUpUs'], PDO::PARAM_STR,15);
      $stm->bindParam(':usuarioC', $dataCustomer['userUpUs'], PDO::PARAM_STR,30);
      $stm->bindParam(':passUserC', $dataCustomer['passUpUs'], PDO::PARAM_STR,50);
      $stm->bindParam(':codRolC', $dataCustomer['codRolUpUs'], PDO::PARAM_INT,11);

      if($stm->execute()){
        return "ok";
      }else{
        echo "error";
      }
      $stm->closeCursor();

    } catch(PDOException $ex){
      echo "Error:  " . $ex->getMessage();
      return "Error";
    } 

  }

  public function mdlDeleteCustomer($dataCustomer){

    try {
      $connection=$this->getConnection(); 
      $query ="CALL spBajaUsuario(:codUsuC,:estadoUsuC)";
      $stm = $connection->prepare($query);
      $stm->bindParam(':codUsuC', $dataCustomer['codCusDC'], PDO::PARAM_INT,11);
      $stm->bindParam(':estadoUsuC', $dataCustomer['stateCustomer'], PDO::PARAM_INT,11);      
      if($stm->execute()){
        return "ok";
      }else{
        echo "error";
      }
      $stm->closeCursor();
      
    } catch(PDOException $ex){
      echo "Error:  " . $ex->getMessage();
      return "Error";
    }

  }

}



?>