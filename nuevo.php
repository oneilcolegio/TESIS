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
				<h3 style="text-align:center">NUEVO REGISTRO</h3>
			</div>
			
			<form class="form-horizontal"  autocomplete="off" method="POST" action="guardar.php" enctype="multipart/form-data">
			<div class="form-group">
					<label for="cedula" class="col-sm-2 control-label">Cédula</label>
					<div class="col-sm-10">
						<input type="num" class="form-control" id="cedula" name="cedula" placeholder="Cédula" required>
					</div>
				</div>
				<div class="form-group">
					<label for="nombres" class="col-sm-2 control-label">Nombres</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="correo" class="col-sm-2 control-label">Correo</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="telef" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="telef" name="telef" placeholder="Telefono">
					</div>
				</div>

				<div class="form-group">
					<label for="repre" class="col-sm-2 control-label">Representante</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="repre" name="repre" placeholder="Representante" required>
					</div>
				</div>

				<div class="form-group">
					<label for="fecha" class="col-sm-2 control-label">Fecha</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha" required>
					</div>
				</div>

				<div class="form-group">
					<label for="repre" class="col-sm-2 control-label">Observación</label>
					<div class="col-sm-10">
					    <textarea style="text-transform:uppercase" id="obs" class="form-control" name="obs" placeholder="Observación" required></textarea>
						<!--<input type="text" class="form-control" id="obs" name="obs" placeholder="Representante" required>-->
					</div>
				</div>

				<div class="form-group">
					<label for="foto" class="col-sm-2 control-label">Foto</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" id="foto" name="foto" accept="image/*">
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