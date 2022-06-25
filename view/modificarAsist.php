<?php
	require_once ("../model/funcs/conexion.php");
	require_once ("../model/funcs/funcs.php");
	
	$id = $_GET['idasistencia'];
	
	//$sql = "SELECT * FROM asistencia WHERE idasistencia = '".$id."'";
    $sql = "SELECT idasistencia, fecha_hora, det, descrip, receta, E.nombres, E.apellidos, E.cedula FROM asistencia as A  INNER JOIN estudiantes as E ON A.id_estudiantesFK = E.id where idasistencia ='$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);

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
				<h3 style="text-align:center">MODIFICAR DETALLES DE ASISTENCIA</h3>
			</div>
			<br>
			<form class="form-horizontal" method="POST" id="frr" action="../controller/updateAsist.php" autocomplete="off" enctype="multipart/form-data">

			<div class="form-group">
					<label for="cedula" class="col-sm-2 control-label">ID</label>
					<div class="col-sm-10">
						<input type="num" class="form-control" id="idasistencia" readonly="" name="idasistencia"  
						value="<?php echo $row['idasistencia']; ?>" required> 
					</div>
				</div>

			<div class="form-group">
					<label for="cedula" class="col-sm-2 control-label">Cédula</label>
					<div class="col-sm-10">
						<input type="num" class="form-control" id="cedula" readonly="" name="cedula"  
						value="<?php echo $row['cedula']; ?>" required> 
					</div>
				</div>
				<div class="form-group">
					<label for="nombres" class="col-sm-2 control-label">Nombres</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombres" readonly="" name="nombres" 
						value="<?php echo $row['nombres'].$row['apellidos']; ?>" required>
					</div>
				</div>
				

				<div class="form-group">
					<label for="fecha" class="col-sm-2 control-label">Fecha</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="fecha" readonly="" name="fecha"  
						value="<?php echo $row['fecha_hora']; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="repre" class="col-sm-2 control-label">Razón o Motivo</label>
					<div class="col-sm-10">
                    <input type="text" style="text-transform:uppercase" id="det" class="form-control" name="det" 
						value="<?php echo $row['det']; ?>" required> 
					</div>
				</div>

                <div class="form-group">
					<label for="descrip" class="col-sm-2 control-label">Detallado del motivo</label>
					<div class="col-sm-10">
					<input type="text"  id="descrip" class="form-control" name="descrip" 
						value="<?php echo $row['descrip']; ?>" required> 
				
						<!--<input type="text" class="form-control" id="obs" name="obs" placeholder="Representante" required>-->
					</div>
				</div>
                <br>
				<center><h3><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Agregar Receta</h3></center>

				<div class="form-group">
					<label for="receta" class="col-sm-2 control-label">Receta Médica</label>
					<div class="col-sm-10">
						
					<textarea type="text"  id="receta" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" name="receta" cols="30" rows="5"required> <?php echo ($row['receta']);?> </textarea>
					 
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					<label class="control-label"></label>
							<br>
						<a href="../view/asistencias.php" class="btn btn-info">Regresar</a>
						<button type="submit" class="btn btn-primary" id="guarda" >Guardar</button>
					</div>
					
				</div>
			</form>
		</div>
	</body>
</html>