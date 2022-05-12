<?php
	
	require 'funcs/conexion.php';
	
	$cedula = $_POST['cedula'];
	$nombres = $_POST['nombres'];
	$correo = $_POST['correo'];
	$telef= $_POST['telef'];
	$repre = $_POST['repre'];
	$fecha = $_POST['fecha'];
	$obs= $_POST['obs'];
	
	
	
	$sql = "INSERT INTO estudiantes (cedula, nombres, correo, telef, repre, fecha, obs) VALUES ('$cedula', '$nombres', '$correo', '$telef', '$repre', '$fecha', '$obs')";
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
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<a href="oper.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
