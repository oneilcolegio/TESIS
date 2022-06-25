<?php
	require_once ("../model/funcs/conexion.php");
	require_once ("../model/funcs/funcs.php");
	require_once("../lib/qrcode.php");
	require_once("../public/exten.php");
	
	$where = "";
	
	if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE nombre LIKE '%$valor'";
		}
	}
	$sql = "SELECT * FROM usuarios $where LIMIT 100";
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
	
	<body>
		
	<div id='navbar' class='navbar-collapse collapse'>
						
			
		<div class="container">
			<div class="row">
				<b><h2 style="text-align:center">Gestión de Usuarios</h2></b>
			</div>
			<hr>
			<div class="row">
			<a href="../view/admin.php" class="btn btn-info">Inicio</a>
				<a href="../view/registro.php" class="btn btn-primary">Nuevo Registro</a>
			</div>
			
			<br>
			
			<div class="row table-responsive" style="display:contents">
				<table class="display" id="mitabla">
					<thead>
						<tr>
							<center><th>#</th></center>
							<center><th>Tipo Usuario</th></center>
							<center><th>Nombres</th></center>
							<center><th>Usuario</th></center>
                            <center> <th>Correo Electrónico</th></center>
                            <center><th>Activo</th></center>
							<center><th>Última sesión</th></center>
							<center><th></th>
                            <center><th></th>
						</tr>
					</thead>
					
					<tbody>
						<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['id_tipo']; ?></td>
								<td><?php echo $row['nombre']; ?></td>
								<td><?php echo $row['usuario']; ?></td>
								<td><?php echo $row['correo']; ?></td>
                                <td><?php echo $row['activacion']; ?></td>
								<td><?php echo $row['last_session']; ?></td>
								
								<td><a href="../view/modificarUser.php?id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
								<td><a href="#" data-href="../controller/eliminar.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<center><h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4></center>
					</div>
					
					<center><div class="modal-body">
						¿Desea eliminar este registro de usuario?
					</div></center>
					<center><img width="100" height="90"  src="../assets/resources/iconos/basura.png"> </center>  
					<br>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-primary btn-ok">Eliminar</a>
					</div>
				</div>
			</div>
			
		</div>
		
		
		<script>
			
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
				
			});
		</script>	
		
		
	</body>
</html>	