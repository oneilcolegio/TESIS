<?php

	session_start();
	require_once ("./model/funcs/conexion.php");
	require_once ("./model/funcs/funcs.php");

	$errors = array();

	if(!empty($_POST)){
		$usuario = $mysqli->real_escape_string($_POST['usuario']);
		$password = $mysqli->real_escape_string($_POST['password']);

		if(isNullLogin($usuario, $password)){
			$errors[]= "debe llenar todos los campos";
		}
		$errors[]= login($usuario, $password);

	}
	
?>


<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>

		
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="../js/bootstrap.min.js" ></script>
		
	</head>

	<style>
  body{
		  	background:#DADDE4;
		  }
		  #h{
			border-radius: 5%;
		  }
		  #logo{
			
		  }
		  #fondo{
			background-position: center center;
			background-color: #F3F5F8;
           /* background: radial-gradient(ellipse, #B4D5F5, #B7CDE2, white);*/
		   /*background: radial-gradient(ellipse, #DFE6EE, #B5D2EE, #D7E7F8);*/
          }
		  #hea{
            background-color: #1D84EA;
		  }
		  #titulo{
			font-family: "Segoe UI";
			font-size: larger;
			color: #F3F5F8;
		  }
		  #usuario{
			outline: none;
			background-color: transparent;
			border: 0;
			border-color: transparent;
		  }
		  #btn-login{
			background-color: #1D84EA;
			font-family: "Segoe UI";
			font-size: larger;
			color: #F3F5F8;
		  }
		  </style>
	<body id="cax">
		
		<div class="container" id="caja">    
			<div id="loginbox" style="margin-top:40px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
				<div id="hea" class="panel panel">
					<div class="panel-heading" id="cas">
						<center><b><div id="titulo" class="panel-title" >Centro Médico U.E O'neil</div></b></center>
						
					</div>     
					
					<div id="fondo" style="padding-top:20px;"  class="panel-body"  >
						
						<div style="display:none;" id="login-alert" class="alert alert-danger col-sm-12"></div>
						
						<form id="loginform" class="text-center" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
						<div id="logo"><img width="155" height="150"  src="../tesis/assets/resources/iconos/escudo.png"></div>
                        <br>
						<form autocomplete="off" action="" class="form-validate">
							<br>
							<div style="margin-bottom: 20px" class="input-group">
	
								<img  src="../tesis/assets/resources/iconos/uss.png" alt="" class="col-sm-2">
								<div class="col-sm-10">
								<input id="usuario" type="text" class="form-control"  name="usuario" value="" placeholder="Ingrese su usuario o correo" style="background-color:transparent; border: 0;" required>                                        
							</div>
							</div>
							
							<div style="margin-bottom: 20px" class="input-group">
							    <img  src="../tesis/assets/resources/iconos/key.png" alt="" class="col-sm-2">
								<div class="col-sm-10">
								<input id="password" type="password" class="form-control" name="password" placeholder="Ingrese su contraseña" style="background-color:transparent; border: 0;" required>
							</div>
							</div>
					

							<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="../tesis/view/recupera.php">¿Olvidaste tu contraseña?</a></div>
							<br>
							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls" style="margin-bottom: 20px;">
									<button id="btn-login" type="submit" class="btn btn">Iniciar Sesi&oacute;n <i class="icon-lock5"></button>
									
								</div>
							</div>
							<br>
		
						</form>
						<?php
	                      echo resultBlock($errors);
                        ?>
					</div>                     
				</div>  
			</div>
		</div>
	
	</body>
</html>						