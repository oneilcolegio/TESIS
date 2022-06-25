<?php
	
	require_once ("../model/funcs/conexion.php");
	require_once ("../model/funcs/funcs.php");
	
	$codesDir = '../assets/resources/temp/';   

	if(isset($_POST) && !empty($_POST)) {

	$codesDir = '../assets/resources/temp/'; 	
    //$filename= $codesDir.'test.png'; 
	$codeFile = date('d-m-Y-h-i-s').'.png';
	$tamanio= 5;
    $level= 'H';
    $frameSize= 3;

	$cedula = $_POST['cedula']. "\n"; 
	$nombres = $_POST['nombres']. "\n";
	$apellidos = $_POST['apellidos']. "\n";
	$correo = $_POST['correo']. "\n";
	$telef= $_POST['telef']. "\n";
	$repre = $_POST['repre']. "\n";
	$fecha = $_POST['fecha']. "\n";
	$obs= $_POST['obs']. "\n";


	function verificar_datos($filtro,$cadena){
		if(preg_match("/^".$filtro."$/", $cadena)){
			return false;
        }else{
            return true;
        }
	}

	if(verificar_datos("[0-9]{1,10}",$cedula)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La cédula no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

	if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$nombres)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE no coincide con el formato solicitado
            </div>
        ';
        exit();
    }


if(verificar_datos("[0-9]{1,10}",$telef)){
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            El Telefono no coincide con el formato solicitado
        </div>
    ';
    exit();
}


if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$repre)){
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            El REPRESENTANTE no coincide con el formato solicitado
        </div>
    ';
    exit();
}

}

if (!empty($_FILES['foto']['tmp_name'] != null)) {
	$foto= addslashes(file_get_contents($_FILES['foto']['tmp_name']));
	$sql = "INSERT INTO estudiantes (cedula, nombres, apellidos, correo, telef, repre, fecha, obs, foto) VALUES ('$cedula', '$nombres', '$apellidos', '$correo', '$telef', '$repre', now(), '$obs', '$foto')";
	$resultado = $mysqli->query($sql);

  
} else { 
    header('location:./');
}
    
  
   //$leerQR= json_decode($datosQR);

  
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/bootstrap-theme.css" rel="stylesheet">
		<script src="../js/jquery-3.1.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>	
	</head>
	<style>
		#cont{
			margin-top: 100px;
			width: 500px;
			border-radius: 5%;
		}
		#btn{
			margin-top: 50px;
		}
		#btn-acep{
			background-color: #1D84EA;
			font-family: "Segoe UI";
			font-size: larger;
			color: #F3F5F8;
		}
	</style>
	
	<body style="background-color:#DDE0E7 ;">
		<form action="" method="post">
		<div class="container" style="background-color: white; heigth: 70px;" id="cont">
			<div class="row">
				<div class="row" style="text-align:center">
				
					<?php if($resultado) { ?>
						<br>
					<img width="90px" src="../assets/resources/iconos/loop.png" alt="">
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<div id="btn" style="margin-bottom: 20px;">
				<a href="../view/oper.php" id="btn-acep" class="btn btn">Aceptar</a>
				</div>
					
				</div>
			</div>
		</div>
		</form>	
	</body>
</html>
