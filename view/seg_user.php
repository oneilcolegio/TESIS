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
	
	$sql = "SELECT A.idasistencia, A.fecha_hora, A.det, E.nombres, E.cedula FROM asistencia as A  INNER JOIN estudiantes as E ON A.id_estudiantesFK = E.id $where";
	$resultado = $mysqli->query($sql);
	$asistencia = array();
	$n=0;
	//while($r=$query->fetch_object()){ $asistencia[]=$r; $n++;}
	
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Seguimiento de los estudiantes</title>
  <link href="../assets/css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>



   
		<script src="js/jquery-3.1.1.min.js"></script>
		
	
  </script>
</head>

<body class="sb-nav-fixed">
  



    
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">

          <h1 class="mt-4"></h1>
         
         
          <center><h1 class="mt-4">Datos estadísticos de los estudiantes</h1></center>
     <br>
     <a href="../view/welcome.php" class="btn btn-info">Inicio</a>
     <br>
         <br>
          <div class="row">
            <div class="col-xl-6">
              <div class="card mb-4">
                <div class="card-header">
                  <i class="fas fa-chart-area mr-1"></i>
                  Area Chart Example
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="card mb-4">
                <div class="card-header">
                  <i class="fas fa-chart-bar mr-1"></i>
                  Bar Chart Example
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
              </div>
            </div>
          </div>

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
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table mr-1"></i>

              
              Asistencias de Estudiantes
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <table class="display" id="mitabla" style="width:100%" cellspacing="0">
					<thead>
						<tr>
							<th>Código</th>
							<th>Cedula</th>
							<th>Nombres y Apellidos</th>
							<th>Fecha y Hora</th>
							<th>Detalles</th>
	
						</tr>
					</thead>
					
					<tbody>
						<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><?php echo $row['idasistencia']; ?></td>
								<td><?php echo $row['cedula']; ?></td>
								<td><?php echo $row['nombres']; ?></td>
								<td><?php echo $row['fecha_hora']; ?></td>
								<td><?php echo $row['det']; ?></td>	
							</tr>
						<?php } ?>

					</tbody>
				</table>
              </div>
            </div>
          </div>
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted"></div>
            <div>
              <a href="#"></a>
              &middot;
              <a href="#"></a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>

  
</body>

</html>