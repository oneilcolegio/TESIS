<?php

    require_once("../assets/resources/phpqrcode/qrlib.php");
    require_once ("../model/funcs/conexion.php");

    $codesDir = '../assets/resources/temp/';   
    $codeFile = date('d-m-Y-h-i-s').'hola'.'.png';
    $tamanio= 3;
    $level= 'H';
    $frameSize= 3;
    
        $codeString = $_POST['cedula']. "\n"; 
		$codeString .= $_POST['nombres']. "\n";
        $codeString .= $_POST['apellidos']. "\n";
		$codeString .= $_POST['correo']. "\n";
		$codeString .= $_POST['telef']. "\n";
		$codeString .= $_POST['repre']. "\n";
		$codeString .= $_POST['fecha']. "\n";
		$codeString .= $_POST['obs']. "\n";
    
        $mostrar= QRcode::png($codeString, $codesDir.$codeFile,  $level, $tamanio, $frameSize); 
       base64_decode( $data['html']= '<center><img  class="img-thumbnail" src="'.$codesDir.$codeFile.'" /></center>');
    
        header('Content-Type: image/*; application/json; charset=utf-8');
        echo json_encode($data);

?>

