<?php
    session_start();
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
	
	if(!isset($_SESSION["id_usuario"])){
		header("location: index.php");
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
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
		
		<style>
			body {
			padding-top: 20px;
			padding-bottom: 20px;
			}
		</style>
	</head>
	
	<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="welcome.php">Unidad Educativa Oneil</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>


		<?php echo 'Usuario:'.utf8_decode ($row['nombre']); ?>

	
  </nav>

<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script> 
<script type="text/javascript" src="js/script.js"></script> 
  <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
 
    <a class="navbar-brand" href="#">
      <img src="resources/img/logoi_Oneil.jpg" alt="" width="80" height="70" class="d-inline-block align-text-top">
    </a>
	<div id='navbar' class='navbar-collapse collapse'>
						<ul class='nav navbar-nav'>
							<li class='active'><a href='welcome.php'>Inicio</a></li>			
						</ul>

						<div id='navbar' class='navbar-collapse collapse'>
						<ul class='nav navbar-nav'>
							<li class='active'><a href='oper.php'>Estudiantes</a></li>			
						</ul>
						<div id='navbar' class='navbar-collapse collapse'>
						<ul class='nav navbar-nav'>
							<li class='active'><a href=''>Contactos</a></li>			
						</ul>
						<div id='navbar' class='navbar-collapse collapse'>
						<ul class='nav navbar-nav'>
							<li class='active'><a href='https://www.infoescuelas.com/ecuador/guayas/oneil-en-guayaquil/' target="_blank"'>Información</a></li>			
						</ul>
						<?php if($_SESSION['tipo_usuario']==1) { ?>
							<ul class='nav navbar-nav'>
								<li><a href='#'>Administrar Usuarios</a></li>
							</ul>
						<?php } ?>
						<ul class='nav navbar-nav navbar-right'>
							<li><a href='logout.php'>Cerrar Sesi&oacute;n</a></li>
						</ul>
  </div>
</nav>
<hr>

  
    <style>
  .sticky-container{
    padding:0px;
    margin:0px;
    position:fixed;
    right:-130px;
    top:230px;
    width:210px;
    z-index: 1100;
}
.sticky li{
    list-style-type:none;
    background-color:#fff;
    color:#efefef;
    height:45px;
    padding:0px;
    margin:0px 0px 1px 0px;
    -webkit-transition:all 0.25s ease-in-out;
    -moz-transition:all 0.25s ease-in-out;
    -o-transition:all 0.25s ease-in-out;
    transition:all 0.25s ease-in-out;
    cursor:pointer;
}
.sticky li:hover{
    margin-left:-10px;
}
.sticky li img{
    float:left;
    margin:5px 4px;
    margin-right:5px;
}
.sticky li p{
    padding-top:5px;
    margin:0px;
    line-height:16px;
    font-size:11px;
}
.sticky li p a{
    text-decoration:none;
    color:#2C3539;
}
.sticky li p a:hover{
    text-decoration:underline;
}
</style>

    				
<div class="container">
  <h3 class="mt-5">Bienvenido al Sistema del Departamento médico "Unidad educativa O'Neil</h3>
  <hr>
  </div>
		</div>
		<div class="col-12 col-md-12"> 
      <div class="">
      <a href="oper.php">
      <button class="btn btn-primary" data-toggle="modal" data-target="#add_new_record_modal">Iniciar</button>
      </a>   
      </div>
    </div>

		</div>
  </div>
</div>
<footer class="footer">
  <div class="container"> <span class="text-muted">

     <div class="sticky-container">
    <ul class="sticky">
        <li>
            <img src="resources/img/facebook.png" width="35" height="35">
            <p><a href="https://www.facebook.com" target="_blank"><br></a></p>
        </li>
        <li>
            <img src="resources/img/twitter.png" width="35" height="35">
            <p><a href="https://twitter.com/noprog" target="_blank"><br></a></p>
        </li>
        <li>
            <img src="resources/img/gplus.png" width="35" height="35">
            <p><a href="https://plus.google.com/programacionnet" target="_blank"><br></a></p>
        </li>
        <li>
            <img src="resources/img/linkedin.png" width="35" height="35">
            <p><a href="https://www.linkedin.com/company/programacionnet" target="_blank"><br></a></p>
        </li>
        <li>
            <img src="resources/img/youtube.png" width="35" height="35">
            <p><a href="http://www.youtube.com/programacionnet" target="_blank"><br></a></p>
        </li>
        <li>
            <img src="resources/img/pinterest.png" width="35" height="35">
            <p><a href="https://www.pinterest.com/programacionnet" target="_blank"><br></a></p>
        </li>
    </ul>
</div>
    <!--<p>Códigos <a href="https://www.baulphp.com/" target="_blank">BaulPHP</a></p>-->
    </span> </div>
</footer>

<script src="dist/js/bootstrap.min.js"></script>
	</body>
</html>		