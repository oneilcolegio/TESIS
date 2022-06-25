<?php
require_once ("../model/funcs/conexion.php");

	$where = "";
	
	if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE nombre LIKE '%$valor'";
		}
	}
	$sql = "SELECT * FROM estudiantes $where LIMIT 100";
	$resultado = $mysqli->query($sql);
	
?>
<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/jquery.dataTables.min.css" rel="stylesheet">
		<link href="../assets/css/bootstrap-theme.css" rel="stylesheet">
		
		<script src="../js/jquery-3.1.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>	
		<script src="../js/jquery.dataTables.min.js"></script>	

		<script>
			$(document).ready(function(){
				$('#mitabla').DataTable({
                  "order":[[1, "asc"]],
				  "language":{
					  "lengthMenu": "Mostrar _MENU_ registros por página",
					  "info": "Mostrando página _PAGE_  de _PAGES_",
					  "infoEmpty": "No hay registros disponibles !!",
					  "infoFiltered": "(Filtrada de _MAX_ registros)",
					  "search": "Buscar",
					  "processing": "Procesando..",
					  "loadingRecords": "Cargando..",
					  "zeroRecords": "No se encontraron registros !!",
					  "paginate":{
					    "next": "Siguiente",
					    "previous": "Anterior"
					  }
					
				  }
				});

			});
		</script>
	</head>
	
	<body >
		
	<div id='navbar' class='navbar-collapse collapse'>
						
			
		<div class="container">
			<div class="row">
				<h2 style="text-align:center">Consultar Estudiantes</h2>
			</div>
			<hr>
			<div class="row">
			<a href="../view/asistenciasUser.php" class="btn btn-success">Menú Asistencias</a>
				
			</div>
			
			<br>
			
			<div class="row table-responsive">
				<table class="display" id="mitabla">
					<thead>
						<tr>
							<center><th>ID</th></center>
							<center><th>Cédula</th></center>
							<center><th>Nombres</th></center>
							<center><th>Correo</th></center>
							<center><th>Telefono</th></center>
							<center><th>Representante</th></center>
							<center><th>Consulta</th></center>
						</tr>
					</thead>
					
					<tbody>
						<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['cedula']; ?></td>
								<td><?php echo $row['nombres'].$row['apellidos']; ?></td>
								<td><?php echo $row['correo']; ?></td>
								<td><?php echo $row['telef']; ?></td>
								<td><?php echo $row['repre']; ?></td>
								
								<td><a href="../view/newAsist_Us.php?id=<?php echo $row['id']; ?>" ><span class="glyphicon glyphicon-plus"></span></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
					
	</body>
</html>	