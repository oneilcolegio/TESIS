<?php
	
	require_once ("../model/funcs/conexion.php");
	require_once ("../model/funcs/funcs.php");
	
	if(isset($_POST) && !empty($_POST)) {
	$idasistencia = $_POST['idasistencia'];
	$det = $_POST['det'];
	$descrip = $_POST['descrip'];
    $receta = $_POST['receta'];
    
    $sql = "UPDATE asistencia SET det= '$det', descrip= '$descrip', receta= '$receta' WHERE idasistencia = '$idasistencia'";
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
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
				<h3>REGISTRO MODIFICADO</h3>
				<?php } else { ?>
				<h3>ERROR AL MODIFICAR</h3>
				<?php } ?>
				
				<a href="../view/asistenciasUser.php" class="btn btn-primary">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>

