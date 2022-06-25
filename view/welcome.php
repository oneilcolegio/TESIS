<?php
  session_start();
  require_once ("../model/funcs/conexion.php");
	require_once ("../model/funcs/funcs.php");

	if(!isset($_SESSION["id_usuario"])){
		header("location: ../index.php");
	}
		$idUsuario= $_SESSION['id_usuario'];
 
		$sql ="SELECT id, nombre FROM usuarios WHERE id= '$idUsuario'";
		$result= $mysqli->query($sql);
		$row= $result->fetch_assoc();

?>


<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bienvenido</title>

    
		<!--<link rel="stylesheet" href="css/bootstrap.min.css" >-->
		<link rel="stylesheet" href="../assets/css/bootstrap-theme.min.css" >
        <link href="../assets/css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
  </script>
        
		<script src="../js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
		
		<style>
			body {
			padding-top: 50px;
			padding-bottom: 70px;
			}
		</style>
	</head>
	
	<body class="sb-nav-fixed">
    <script>
      //import swal from 'sweetalert'
      //swal("Bienvenido!", "<?php echo 'USUARIO:  '.utf8_decode ($row['nombre']); ?>", "success");
      //document.location.reload()= null;
    </script>
  <nav class="sb-topnav navbar navbar-expand navbar navbar-dark bg-primary">	
  <td><img src="../assets/resources/imagenes/Oneil-logo.png" alt="Avatar"  width="70px" height="65px" style="border-radius: 50%;"></td>        	
   <b><a class="navbar-brand" href="admin.html" style="color: #CCECF0;">Unidad Educativa Oneil</a></b>

            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" id="userDropdown" style="color: #FEFFFF;" href="#" role="button" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
                 <?php echo 'USUARIO:'.' '.utf8_decode ($row['nombre']); ?>
                 <i class="fas fa-user-circle" style="color: #9DEAF3; font-size:25px"></i></a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#" >Configuración
              <i class="fas fa-user-cog" style="color: #1D84EA; font-size:20px"></i></a>


            <div class="dropdown-divider"></div>
      
             <a class="dropdown-item" href="../controller/logout.php">Cerrar Sesión
             <i class="fas fa-power-off" style="color: #1D84EA; font-size:20px"></i></a>
            </div>  
            </ul>
           </div>
        </div>
  </nav>
  
    <style>
      .img-gallery{
        width: 60%;
        margin: 80px auto 70px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 30px;
      }

      .img-gallery img{
        width: 40%;
        cursor: pointer;
        transition: 1s;
      }
      .img-gallery img:hover{
      transform: scale(1.4);
      }

      /* Invisible texto */
figcaption .asis, .seg, .rep, .conf, .info {
  display:none; 
  transition: all .5s;
}
/* Visible texto */
figure:hover > figcaption .asis, .seg, .rep, .conf, .info {
  display:block;
  transition: all .5s;
}

    </style>
  
    

    		
<main>
<div id="layoutSidenav_content">
  <br>
        <div class="container-fluid">
          <center><h3 class="mt-4">Bienvenido al Sistema del Departamento Médico "Unidad Educativa O'Neil"</h3></center>
          
          </div>

       <div style="background-color: #F7F8FA;">
           <center> <div class="img-gallery">
           <a class="nav-link" href="../view/operUser.php">
              <div class="sb-nav-link-icon"><i class=""></i></i></div>
              <figure>
              <img src="../assets/resources/iconos/registro.png" alt="">
              <br>
               <figcaption><h4>Registro</h4></figcaption></figure>
            </a>

            <a class="nav-link" href="../view/asistenciasUser.php">
              <div class="sb-nav-link-icon"><i class=""></i></i></div>
              <img src="../assets/resources/iconos/asistencias.png" alt="" > 
              <br>
               <figcaption class="asis"><h4>Asistencias</h4></figcaption></figure>
            </a>

            <a class="nav-link" href="../view/seg_admin.php">
              <div class="sb-nav-link-icon"><i class=""></i></i></div>
              <img src="../assets/resources/iconos/dashboard.png" alt="" href="asistencias.php"> 
              <br>
               <figcaption class="seg"><h4>Seguimiento</h4></figcaption></figure>
            </a>

            <a class="nav-link" href="../view/report_admin.php">
              <div class="sb-nav-link-icon"><i class=""></i></i></div>
              <img src="../assets/resources/iconos/reporte-de-salud.png" alt="" > 
              <br>
               <figcaption class="rep"><h4>Reportes</h4></figcaption></figure>
            </a>

            
           </div></center>
      </div>

</main>

<footer class="footer">
  <div class="container"> <span class="text-muted">

    
</footer>

<script src="dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="../js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>
  
<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script> 
<script type="text/javascript" src="../js/script.js"></script> 
	</body>
</html>		