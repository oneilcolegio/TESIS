<?php

require_once ("../model/funcs/conexion.php");
require_once ("../model/funcs/funcs.php");

	$errors = array();

	if(!empty($_POST)){
		$email = $mysqli->real_escape_string($_POST['email']);
		
		if(isEmail($email)){
			$errors[]= "El correo proporcionado no es válido";
		}
		if(emailExiste($email)){
		 $user_id= getValor('id', 'correo', $email);
		 $nombre= getValor('nombre', 'correo', $email);	
		 $token= generaTokenPass($user_id);

		 $url= 'http://'.$_SERVER["SERVER_NAME"].
			'/tesis/controller/cambia_pass.php?user_id='.$user_id.'&token='.$token;

			$asunto= 'RECUPERAR CONTRASEÑA - Sistema de Usuarios';
			$cuerpo= "Estimado $nombre: <br /><br />Ud ha solicitado RECUPERACIÓN DE CONTRASEÑA.<br/><br/> Para continuar es necesario que le de click en la siguiente dirección: <a href= '$url'>Recuperar Contraseña</a>";

			if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
                //echo  "<a href= '../index.php'>Iniciar Sesión</a>";
				echo "<center><div><H1>PASSWORD RECOVERY</H1></div> </center>  ";
				echo "<center><img width='180' height='180'  src='../assets/resources/iconos/gmail.png'> </center>  ";
				echo "<br><center><h3><a href= 'https://www.google.com/intl/es/gmail/about/'>Iniciar Sesion en G-mail para la recuperación de la contraseña </a></h3></center>";
				exit;
			}
			else{
				$errors[]= "Error al enviar el correo !!";
			}
		
		}else{
			$errors[]= "La dirección de correo proporcioanda no existe !!";
		}
		
	}
	
?>

<style>
	#titulo{
		font-family: "Segoe UI";
	    font-size: larger;
		color: #F3F5F8;
	}
</style>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Recuperar Password</title>
		
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" >
		<link rel="stylesheet" href="../assets/css/bootstrap-theme.min.css" >
		<script src="../js/bootstrap.min.js" ></script>
		
	</head>
	
	<body>
		
		<div class="container">    
			<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
				<div class="panel panel-primary" id="">
					<div class="panel-heading" id="">
						<div class="panel-title" id="">Recuperar Contraseña</div>
						<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="../index.php"></a></div>
					</div> 
					<br> 
					<center><img width="100" height="90"  src="../assets/resources/iconos/contrasena.png"> </center>  
					
					<div style="padding-top:30px" class="panel-body" >
						
						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						
						<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div style="margin-bottom: 30px" class="input-group">
							<img  src="../assets/resources/iconos/correo-electronico.png" alt="" class="col-sm-2">
								<div class="col-sm-10">
									<br>
								<input id="email" type="email" class="form-control" name="email" placeholder="Inserte su correo electrónico" style="background-color:transparent; border: 0;" required>                                        
							</div>
							</div>
							<div style="border-top: 1px solid#888; padding-top:15px; font-size:90%" id="fottt">
								<i><h5>Inserta tu correo electrónico para proceder a la recuperación de la contraseña !!</h5></i>
							</div>
							<br>
							
							<div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
								   
								    <a href="../index.php" class="btn btn-info">Login</a>
									<button id="btn-login" type="submit" class="btn btn-primary">Enviar</a>
								</div>
								
							</div>
							
							
							<div class="form-group">
								<div class="col-md-12 control">
									<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" style="color: #778090;" >
										No tienes una cuenta! <a href="../registro.php">Registrate aquí</a>
									</div>
								</div>
							</div>    
						</form>
						<?php echo resultBlock($errors); ?>
					</div>                     
				</div>  
			</div>
		</div>
	</body>
</html>							