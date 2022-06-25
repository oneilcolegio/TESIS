<?php
	require_once ("../model/funcs/conexion.php");
	require_once ("../model/funcs/funcs.php");
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM estudiantes WHERE id = '".$id."'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
?>
<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
	<div class="container">
			<div class="row">
				<h3 style="text-align:center">NUEVO REGISTRO DE ASISTENCIA</h3>
			</div>
            <br>
            <br>
			<form class="form-horizontal" method="POST" id="" action="../controller/guardarAsist_Us.php" autocomplete="off" enctype="multipart/form-data">
            
			<div class="form-group">
					<label for="cedula" class="col-sm-2 control-label">ID</label>
					<div class="col-sm-10">
						<input type="num" class="form-control" readonly="" id="id" name="id" placeholder="ID" 
						value="<?php echo $row['id']; ?>" required> 
					</div>
				</div>
			<div class="form-group">
					<label for="cedula" class="col-sm-2 control-label">Cédula</label>
					<div class="col-sm-10">
						<input type="num" class="form-control" id="cedula"  readonly="" name="cedula" placeholder="Cédula" 
						value="<?php echo $row['cedula']; ?>" required> 
					</div>
				</div>
				<div class="form-group">
					<label for="nombres" class="col-sm-2 control-label">Nombres</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombres"  readonly="" name="nombres" placeholder="Nombres" 
						value="<?php echo $row['nombres']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="id" name="id"  value="<?php echo $row['id']; ?>" />
				<?php 
					date_default_timezone_set('America/Guayaquil');
					$fecha_actual=date('m-d-Y H:i:s');
					 ?>

				<?php
				// Obteniendo la fecha actual del sistema con PHP
				$fechaActual = date('d-m-Y');
				
				?>
				

				<div class="form-group">
					<label for="fecha_hora" class="col-sm-2 control-label">Fecha</label>
					<div class="col-sm-10">
					
						<input type="date-local" class="form-control"  readonly="" id="fecha_hora" name="fecha_hora" 
						value="<?= $fechaActual ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="repre" class="col-sm-2 control-label">Motivo</label>
					<div class="col-sm-10">
					<textarea onkeyup="javascript:this.value=this.value.toUpperCase();" id="det" class="form-control" name="det" onFocus="" placeholder="INGRESE EL MOTIVO DE LA CONSULTA" required></textarea>
						<!--<input type="text" class="form-control" id="obs" name="obs" placeholder="Representante" required>-->
					</div>
				</div>

				<div class="form-group">
					<label for="descrip" class="col-sm-2 control-label">Detalles</label>
					<div class="col-sm-10">
					<textarea onkeyup="javascript:this.value=this.value.toUpperCase();" id="descrip" class="form-control" name="descrip" onFocus="" placeholder="DETALLAR EL MOTIVO DE LA CONSULTA" required></textarea>
						<!--<input type="text" class="form-control" id="obs" name="obs" placeholder="Representante" required>-->
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					<label class="control-label"></label>
							<br>
							
						<a href="../view/buscarE_Us.php" class="btn btn-default">Regresar</a>
						<button type="submit" name="insertar" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>


