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
  <script type="text/javascript" src="../js/js/jquery.js"></script>
        <script type="text/javascript" src="../js/js/chartJS/Chart.min.js"></script>


   
		<script src="../js/jquery-3.1.1.min.js"></script>
		
	
  </script>
</head>
<style>
        .caja{
            margin: auto;
            max-width: 250px;
            padding: 20px;
            border: 1px solid #BDBDBD;
        }
        .caja select{
            width: 100%;
            font-size: 16px;
            padding: 5px;
        }
        .resultados{
            margin: auto;
            margin-top: 40px;
            width: 1000px;
        }
        #bod{
    background-color: #C6D8D1;
  }
    </style>

<body class="sb-nav-fixed" id="bod">
<div class="caja">
            <select onChange="mostrarResultados(this.value);">
                <?php
              
                    for($i=2022;$i<2040;$i++){
                        if($i == 2022){
                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                        }else{
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="resultados"><canvas id="grafico"></canvas></div>
  
    
    
         
          <center><h1 class="mt-4">Datos Generales (Asistencias de los estudiantes)</h1></center>
     <br>
  
    <script>
            $(document).ready(mostrarResultados(2022));  
                function mostrarResultados(year){
                    $('.resultados').html('<canvas id="grafico"></canvas>');
                    $.ajax({
                        type: 'POST',
                        url: '../public/procesar.php',
                        data: 'year='+year,
                        dataType: 'JSON',
                        success:function(response){
                            var Datos = {
                                    labels : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                    datasets : [
                                        {
                                            fillColor : 'rgba(91,228,146,0.6)', //COLOR DE LAS BARRAS
                                            strokeColor : 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
                                            highlightFill : 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
                                            highlightStroke : 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                                            data : response
                                        }
                                    ]
                                }
                            var contexto = document.getElementById('grafico').getContext('2d');
                            window.Barra = new Chart(contexto).Bar(Datos, { responsive : true });
                            Barra.clear();
                        }
                    });
                    return false;
                }
    </script>
     <a href="admin.php" class="btn btn-info">Inicio</a>
     <br>
         <br>

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
            <a href="../view/admin.php" class="btn btn-primary">Visualizar</a>
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
  <script src="../js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</html>