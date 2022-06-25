<?php
	
	require_once ("../model/funcs/conexion.php");
	require_once ("../model/funcs/funcs.php");
	// conectar la base da datos

	if(isset($_POST)){
	
		$id = $_POST['id'];
		$cedula = $_POST['cedula']; 
		$nombres = $_POST['nombres'];
		$fecha_hora = strtotime($_POST['fecha_hora']);
		$det= $_POST['det'];
		$descrip= $_POST['descrip'];
		
		$sql = "INSERT INTO asistencia (id_estudiantesFK, fecha_hora, det, descrip) VALUES ('$id', now(), '$det', '$descrip')";
		$resultado = $mysqli->query($sql);
	}

?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/bootstrap-theme.css" rel="stylesheet">
		<script src="../js/jquery-3.1.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<form action="" method="post">
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				
					<?php if($resultado) { ?>
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<a href="../view/asistenciasUser.php" class="btn btn-primary">Aceptar</a>
					
				</div>
			</div>
		</div>
		</form>	
	</body>
</html>

