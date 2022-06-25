<?php
	
	require_once ("../model/funcs/conexion.php");
	//include ("../resources/phpqrcode/qrlib.php");
	//require_once ("../model/funcs/funcs.php");

    $filename = "../assets/resources/temp";   
    $codeFile = date('d-m-Y-h-i-s').'.png';

	if(isset($_POST) && !empty($_POST)) {
	$id = $_POST['id'];
	$cedula = $_POST['cedula'];
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$correo = $_POST['correo'];
	$telef = $_POST['telef'];
	$repre = $_POST['repre'];
	$fecha = $_POST['fecha'];
	$obs = $_POST['obs'];
	}

	if (($_FILES['foto']['tmp_name'] != null)) {
	    $foto= addslashes(file_get_contents($_FILES['foto']['tmp_name']));
		$sql = "UPDATE estudiantes SET cedula= '$cedula', nombres='$nombres', apellidos='$apellidos', correo='$correo', telef='$telef', 
		repre='$repre', fecha='$fecha', obs='$obs', foto='$foto' WHERE id = '$id'";
		$resultado = $mysqli->query($sql);
	}else{
		$sql = "UPDATE estudiantes SET cedula= '$cedula', nombres='$nombres', apellidos='$apellidos', correo='$correo', telef='$telef', 
		repre='$repre', fecha='$fecha', obs='$obs' WHERE id = '$id'";
		$resultado = $mysqli->query($sql);
	}
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
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
		<div class="container" style="background-color: white; heigth: 70px;" id="cont">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
					<br>
					<img width="90px" src="../assets/resources/iconos/loop.png" alt="">
				<h3>REGISTRO MODIFICADO</h3>
				<?php } else { ?>
				<h3>ERROR AL MODIFICAR</h3>
				<?php } ?>
				<div id="btn" style="margin-bottom: 20px;">
				<a href="../view/operUser.php" id="btn-acep" class="btn btn">Aceptar</a>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>

