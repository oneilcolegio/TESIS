<?php
	
	require 'funcs/conexion.php';

	$id = $_POST['id'];
	$cedula = $_POST['cedula'];
	$nombres = $_POST['nombres'];
	$correo = $_POST['correo'];
	$telef = $_POST['telef'];
	$repre = $_POST['repre'];
	$fecha = $_POST['fecha'];
	$obs = $_POST['obs'];
	
	$sql = "UPDATE estudiantes SET cedula= '$cedula', nombres='$nombres', correo='$correo', telef='$telef', repre='$repre', fecha='$fecha', obs='$obs' WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
				<h3>REGISTRO MODIFICADO</h3>
				<?php } else { ?>
				<h3>ERROR AL MODIFICAR</h3>
				<?php } ?>
				
				<a href="oper.php" class="btn btn-primary">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>
