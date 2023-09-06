<?php

if(isset($_POST['formAddCus'])){

  
  $dataAddCustomer = new ctllrCustomers();
  $resDataAddCustomer=$dataAddCustomer->ctllrAddCustomer();  
  echo $resDataAddCustomer;
  
  
}else if(isset($_POST['showDataCus'])){

  $codCus=$_POST['codCus'];
  $codClie=$_POST['codClie'];

  $dataCustomer = new ctllrCustomers();
  $resDataCustomer = $dataCustomer->ctllrShowDataCus($codCus,$codClie);
  // echo(json_encode($_POST));
  echo $resDataCustomer;
  
}else if(isset($_POST['formEditCus'])){

  $dataEditCustomer = new ctllrCustomers();
  $resDataEditCustomer = $dataEditCustomer->ctllrUpdateCustomer();
  echo $resDataEditCustomer;
  // echo(json_encode($_POST));

}else if(isset($_POST['formDeleteCus'])){

  $codCusDC=$_POST['codCusDC'];
  $codCliDC=$_POST['codCliDC'];
  $stateCustomer = 0;

  $dataCustomer = array(
    "codCusDC"=>$codCusDC,
    "codCliDC"=>$codCliDC,
    "stateCustomer"=>$stateCustomer,
  );  

  $dataDelCustomer = new ctllrCustomers();
  $resDataDelCustomer = $dataDelCustomer->ctllrDeleteCustomer($dataCustomer);
  echo $resDataDelCustomer;
  
  // echo(json_encode($_POST));
}else{

  echo false;

}

class ctllrCustomers {

  public function ctllrShowCustomers(){      

    $resShowCustomers = new mdlCustomers();
    $listaCustomers = $resShowCustomers->mdlshowCustomers();      
    return $listaCustomers;

  }

  public function ctllrAddCustomer(){

    // if(isset($_POST['formAddCus'])){
    //   $ruta= $_FILES['imgDocument']['tmp_name'];
    // }

    // return json_encode($_POST);
    
    require_once('../model/customer.model.php');


    $genero = $_POST['genero'];

    $ruta=$_FILES['imgDocument']['name'];

    $nombres = $_POST['names'];
    $apePaterno = $_POST['apePater'];
    $apeMaterno = $_POST['apeMater'];
    $pais = $_POST['pais'];
    $fechNac = $_POST['fechNac01'];
    // $fechNac = $_POST['fechNac'];
    $tipoDocumento = $_POST['tipoDocu'];
    $numDocumento = $_POST['numDocumen'];
    $celular = $_POST['cellphone'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $codRol = $_POST['rol'];
    $timeCurrent = date('Y-m-d G:i:s'); 

    $dataCustomer = [
      // "tipoFIle"=>$_FILES['imgDocumento'],
      "nombres"=>$nombres,
      "apePaterno"=>$apePaterno,
      "apeMaterno"=>$apeMaterno,
      "pais"=>$pais ,
      "fechNac"=>$fechNac,
      "tipoDocumento"=>$tipoDocumento,
      "numDocumento"=>$numDocumento,        
      "celular"=>$celular,
      "email"=>$email,
      "user"=>$nombres.' '.$apePaterno,
      "pass"=>$pass,
      "rutaImgDocumen"=>$ruta,
      "codRol"=>$codRol,
      "fechCrea"=>$timeCurrent,
    ];

    $mdlAddCustomer = new mdlCustomers();
    $resAddcustomer = $mdlAddCustomer -> mdlAddCustomer($dataCustomer);
    
    if($resAddcustomer=='ok'){
      // $resShowCustomers = new mdlCustomers();
      // $listaCustomers = $resShowCustomers->mdlshowCustomers();      
      // return json_encode($listaCustomers);    
      
      return json_encode("ok");
    }

    
     
 

  //   // // $imgDocumento = getimagesize($_FILES['imgDocumento']['tmp_name']);

  //   // // 
  //   // // list($ancho, $alto) = getimagesize($_FILES['imgDocumento']['tmp_name']);

  //   // // $nuevoAncho = 480;
  //   // // $nuevoAlto = 480;

  //   // // $directorio = "../view/images/users";

  //   $ruta="ruta de la imagen";

  //   // // if($_FILES['imgDocumento']['type']=="image/jpeg"){
  //   // //   $aleatorio = mt_rand(10000,99999);
  //   // //   $ruta = $directorio."/".$aleatorio.".jpg";
  //   // //   $origen = imagecreatefromjpeg($_FILES['imgDocumento']['tmp_name']);
  //   // //   $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
  //   // //   imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
  //   // //   imagejpeg($destino, $ruta);
  //   // // }

  //   // // if($_FILES['imgDocumento']['type']=="image/png"){
  //   // //   $aleatorio = mt_rand(100,999);
  //   // //   $ruta = $directorio."/".$aleatorio.".png";
  //   // //   $origen = imagecreatefromjpeg($_FILES['imgDocumento']['tmp_name']);
  //   // //   $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
  //   // //   imagealphablending($destino, false);
  //   // //   imagesavealpha($destino, true);
  //   // //   imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
  //   // //   imagepng($destino, $ruta);
  //   // // }
        
  }

  public function ctllrShowDataCus($codCus,$codClie){
    require_once('../model/customer.model.php');
    $dataCustomer = new mdlCustomers();
    $reDataCustomer = $dataCustomer->mdlShowDataCustomer($codCus,$codClie);
    return json_encode($reDataCustomer[0]); 

  }

  public function ctllrUpdateCustomer(){

    require_once('../model/customer.model.php');

       
      $codCusEC = $_POST['codCusEC'];
      $codCliEC = $_POST['codCliEC'];
      $namesEC = $_POST['namesEC'];
      $apePaterEC = $_POST['apePaterEC'];
      $apeMaterEC = $_POST['apeMaterEC'];
      $paisEC = $_POST['paisEC'];
      $fechNac01EC = $_POST['fechNac01EC'];
      // $fechNacEC = $_POST['fechNacEC'];
      $tipoDocuEC = $_POST['tipoDocuEC'];
      $numDocumenEC = $_POST['numDocumenEC'];
      $cellphoneEC = $_POST['cellphoneEC'];
      $emailEC = $_POST['emailEC'];
      $passEC = $_POST['passEC'];
      $rolEC = $_POST['rolEC'];
      // $timeCurrent = date('Y-m-d G:i:s'); 

      $datosUser = [
        "codUserUpUs"=> $codCusEC,
        "codCliUpUs"=>$codCliEC,
        "nombresUpUs"=>$namesEC,
        "apePaternoUpUs"=>$apePaterEC,
        "apeMaternoUpUs"=>$apeMaterEC,
        "paisUpUs"=>$paisEC ,
        "fechNacUpUs"=>$fechNac01EC,
        "tipoDocumUpUs"=>$tipoDocuEC,
        "numDocumUpUs"=>$numDocumenEC,
        "celularUpUs"=>$cellphoneEC,
        "emailUpUs"=>$emailEC,   
        "userUpUs"=>$namesEC.' '.$apePaterEC,         
        "passUpUs"=>$passEC,
        "codRolUpUs"=>$rolEC,
      ];

      $mdlUpdateCustomer = new mdlCustomers();
      $resUpdateCustomer = $mdlUpdateCustomer->mdlUpdateCustomer($datosUser);
      if($resUpdateCustomer=='ok'){
        // $resShowUsers = new mdlUsers();
        // $listaUsers = $resShowUsers->mdlShowUsers();      
        return json_encode($resUpdateCustomer);           
      }
  }

  public function ctllrDeleteCustomer($deleteCustomer){

    require_once('../model/customer.model.php');

    $mdlDeleteCustomer = new mdlCustomers();
    $resDeleteCus = $mdlDeleteCustomer -> mdlDeleteCustomer($deleteCustomer);
    if($resDeleteCus=='ok'){
      return json_encode("ok");   
      // echo '<script>window.location.replace("users");</script>';           
      // var_dump($resdatosUser); 
      // $resShowUsers = new mdlUsers();
      // $listaUsers = $resShowUsers->mdlShowUsers();      
      // return json_encode($listaUsers);      
    }
  }

}



?>