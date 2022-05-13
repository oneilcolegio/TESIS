<?php
	require 'funcs/conexion.php';
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM estudiantes WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
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
				<h3 style="text-align:center">MODIFICAR REGISTRO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="update.php" autocomplete="off">

			<div class="form-group">
					<label for="cedula" class="col-sm-2 control-label">Cédula</label>
					<div class="col-sm-10">
						<input type="num" class="form-control" id="cedula" name="cedula" placeholder="Cédula" 
						value="<?php echo $row['cedula']; ?>" required> 
					</div>
				</div>
				<div class="form-group">
					<label for="nombres" class="col-sm-2 control-label">Nombres</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" 
						value="<?php echo $row['nombres']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				
				<div class="form-group">
					<label for="correo" class="col-sm-2 control-label">Correo</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" 
						value="<?php echo $row['correo']; ?>"  required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="telef" class="col-sm-2 control-label">Teléfono</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="telef" name="telef" placeholder="Teléfono" 
						value="<?php echo $row['telef']; ?>"  required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="repre" class="col-sm-2 control-label">Representante</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="repre" name="repre" placeholder="Representante" 
						value="<?php echo $row['repre']; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="fecha" class="col-sm-2 control-label">Fecha</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha" 
						value="<?php echo $row['fecha']; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="repre" class="col-sm-2 control-label">Observación</label>
					<div class="col-sm-10">
					    <input type="text" style="text-transform:uppercase" id="obs" class="form-control" name="obs" placeholder="Observación" 
						value="<?php echo $row['obs']; ?>" required>  
						<!--<input type="text" class="form-control" id="obs" name="obs" placeholder="Representante" required>-->
					</div>
				</div>

				<div class="form-group">
					<label for="foto" class="col-sm-2 control-label">Foto</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" id="foto" name="foto"
						value="<?php echo $row['foto']; ?>" required> 
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="oper.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>