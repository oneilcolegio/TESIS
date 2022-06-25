<?php
	require_once ("../model/funcs/conexion.php");
	require_once ("../model/funcs/funcs.php");
	
	$where = "";
	
	if(!empty($_POST))
	{
		$valor = $_POST['campo'];
		if(!empty($valor)){
			$where = "WHERE nombre LIKE '%$valor'";
		}
	}
	
	$sql = "SELECT A.idasistencia, A.fecha_hora, A.det, A.descrip, E.nombres, E.apellidos, E.cedula FROM asistencia as A  INNER JOIN estudiantes as E ON A.id_estudiantesFK = E.id $where";
	$resultado = $mysqli->query($sql);
	$asistencia = array();
	$n=0;
	//while($r=$query->fetch_object()){ $asistencia[]=$r; $n++;}
	
	
?>
<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/jquery.dataTables.min.css" rel="stylesheet">
		<link href="../assets/css/bootstrap-theme.css" rel="stylesheet">
		<link href="../assets/css/buttons.dataTables.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>

  
		
		<script src="../jspdf/dist/jspdf.min.js"></script>
        <script src="../js/jspdf.plugin.autotable.min.js"></script>
		
		<script src="../js/jquery-3.1.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>	
		<script src="../js/jquery.dataTables.min.js"></script>
	

		<script>
			$(document).ready(function(){
				$('#mitabla').DataTable({
					"order":[[1, "asc"]],
					dom: 'Bfrtip',
					buttons: [{
        //Botón para Excel
        extend: 'excelHtml5',
        footer: true,
        title: 'Reporte de asistencias',
        filename: 'Reporte_asistencias',
        //Aquí es donde generas el botón personalizado
        text: '<button class="btn btn">Exportar a Excel <i class="fas fa-file-excel"></i></button>'
      },
      //Botón para PDF
      {
        extend: 'pdfHtml5',
        footer: true,
        title: 'Reporte de asistencias',
        filename: 'Reporte_asistencias',
        text: '<button class="btn btn">Exportar a PDF <i class="far fa-file-pdf"></i></button>'
      }
    ],
                  
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
	<br>
	<body >
		
	<div id='navbar' class='navbar-collapse collapse'>
						
			
		<div class="container">
			<div class="row">
				<h2 style="text-align:center">Registro de Asistencias</h2>
			</div>
			<hr>
			<div class="row">
			<div class="col-md-4" style="right: 17px;">
			<a href="../view/admin.php" class="btn btn-info">Inicio</a>
			<a href="../view/buscarE.php" class="btn btn-primary">Nueva Asistencia</a>
	
			</div>
			</div>
			
			<div class="box-tools pull-right">
    
           </div>
			
			<br>
			
			<div class="row table-responsive">
				<table class="display" id="mitabla" style="width:100%">
					<thead>
						<tr>
							<th><center>ID</center></th>
							<th><center>Cedula</center></th>
							<th><center>Nombres</center></th>
							<th><center>Fecha</center></th>
							<th><center>Motivo</center></th>

							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					
					<tbody>
						<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><center><?php echo $row['idasistencia']; ?></center></td>
								<td><center><?php echo $row['cedula']; ?></center></td>
								<td><center><?php echo $row['nombres'].$row['apellidos']; ?></center></td>
								<td><center><?php echo $row['fecha_hora']; ?></center></td>
								<td><center><?php echo $row['det']; ?></center></td>	
                               
								<td><a href="../view/verDetalle.php?idasistencia=<?php echo $row['idasistencia']; ?>" target="_blank"><span class="glyphicon glyphicon-download-alt"></span></a></td>
								<td><a href="../view/modificarAsist.php?idasistencia=<?php echo $row['idasistencia']; ?>" ><span class="glyphicon glyphicon-pencil"></span></a></td>
								<td><a href="#" data-href="../controller/eliminarAsist.php?idasistencia=<?php echo $row['idasistencia']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
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
						¿Desea eliminar este registro de estudiante?
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
		


		
		<script src="../js/buttons/jquery-3.5.1.js"></script>
		<script src="../js/buttons/jquery.dataTables.min.js"></script>
		<script src="../js/buttons/dataTables.buttons.min.js"></script>
		<script src="../js/buttons/jszip.min.js"></script>
		<script src="../js/buttons/pdfmake.min.js"></script>
		<script src="../js/buttons/vfs_fonts.js"></script>
		<script src="../js/buttons/buttons.html5.min.js"></script>	
	</body>
</html>	