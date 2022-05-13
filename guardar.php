<?php
	
	require 'funcs/conexion.php';
	require 'resources/phpqrcode/qrlib.php';

	$dir = 'resources/temp/';

    if(!file_exists($dir))
    mkdir($dir);
    $filename= $dir.'test.png';  

	           $cedula = $_POST['cedula']; 
	           $nombres = $_POST['nombres'];
	           $correo = $_POST['correo'];
	           $telef= $_POST['telef'];
	           $repre = $_POST['repre'];
	           $fecha = $_POST['fecha'];
	           $obs= $_POST['obs'];
			   //$foto= $_POST['foto'];
			   $foto= addslashes(file_get_contents($_FILES['foto']['tmp_name']));
			   


	$sql = "INSERT INTO estudiantes (cedula, nombres, correo, telef, repre, fecha, obs, foto) VALUES ('$cedula', '$nombres', '$correo', '$telef', '$repre', '$fecha', '$obs', '$foto')";
	$resultado = $mysqli->query($sql);
    
	$datosQR= json_encode($_POST);
	$tamanio= 7;
    $level= 'H';
    $frameSize= 3;
    QRcode::png($datosQR, $filename, $level, $tamanio, $frameSize);
   echo '<img src="'.$filename.'" />';

   //$sql = "INSERT INTO estudiantes (qr) VALUES ('$filename')";
	
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
