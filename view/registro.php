<?php
	
	require_once ("../model/funcs/conexion.php");
	require_once ("../model/funcs/funcs.php");
	
	$errors = array();
	if(!empty($_POST)){
		$nombre = $mysqli->real_escape_string($_POST['nombre']);
		$usuario = $mysqli->real_escape_string($_POST['usuario']);
		$password = $mysqli->real_escape_string($_POST['password']);
		$con_password = $mysqli->real_escape_string($_POST['con_password']);
		$email = $mysqli->real_escape_string($_POST['email']);
		$ip = $_SERVER['REMOTE_ADDR'];
		//$captcha = $mysqli->real_escape_string($_POST['g-recaptcha-response']);
		$activo =0;
		$tipo_usuario =2;
		$secret= "6Lcy2OAfAAAAAJ0t9Llh2eEW6hUFM_HqtQzEsRXD";

		//if(!$captcha){
			//$errors[]="verifica el captcha";
		//}
	if(isNull($nombre, $usuario, $password, $con_password, $email)){
		$errors[]= "debe llenar todos los campos";
	}
	if(!isEmail($email)){
		$errors[]= "Correo inválido";
	}
	if(!validaPassword($password, $con_password)){
		$errors[]= "Las contraseñas no coinciden";
	}
	if(usuarioExiste($usuario)){
		$errors[]= "El nombre del usuario $usuario ya existe !!";
	}
	if(emailExiste($email)){
		$errors[]= "La dirección de correo: $email ya existe para otro usuario!!";
	}
	//if(count($errors)== 0){
		//$response= file_get_contents(
		//"https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

		//$arr= json_decode($response, TRUE);

		if('success'){
        $pass_hash= hashPassword($password);
		$token= generateToken();
		$registro= registraUsuario($usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario);

		if($registro > 0){
			$url= 'http://'.$_SERVER["SERVER_NAME"].
			'/tesis/controller/activar.php?id='.$registro.'&val='.$token;

			$asunto= 'Activar Cuenta - Sistema de Usuarios';
			$cuerpo= "Estimado $nombre: <br /><br />para continuar con el proceso de registro, es necesario que le de click en <a href= '$url'>Activar Cuenta </a>";
		
			if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
				
				echo "<center><img width='180' height='180'  src='../assets/resources/iconos/gmail.png'> </center>  ";
				echo "<center><h2>Para terminar el proceso de registro, el Usuario debe seguir las instrucciones que se han enviado a la dirección de correo proporcionado: $email</h2></center>";
                echo "<br><center><h3><a href= '../view/configuracion.php'>Regresar a menú de configuración </a></h3></center>";
				exit;
			}
			else{
				$errors[]= "Error al enviar el correo !!";
			}
		
		}
		else{
			$errors[]= "Error al registrar !!";
		}
		}
		else{
			//$errors[]= "Error al comprobar captcha !!";
		}
	//}
}	
?>


<style>
	#titulo{
		font-family: "Segoe UI";
	    font-size: larger;
		color: #F3F5F8;
	}
	.form-group {
    position: relative;
}
 
label {
    width: 100%;
}
 
input {
    width: 100%;
    padding: 7px;
}
 
.form-group span {
    position: absolute;
    right: 18px;
    top: 8px;
    text-transform: uppercase;
    cursor: pointer;
    padding: 2px 10px;
	border-radius: 50%;
    background-color: #dadada;
}
	
</style>

<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Registro</title>
		
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" >
		<link rel="stylesheet" href="../assets/css/bootstrap-theme.min.css" >
		<script src="../js/bootstrap.min.js" ></script>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<script>
        
        </script>
	</head>
	
	<body>
		<div class="container">
			<div id="signupbox" style="margin-top:25px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<center><div id="titulo" class="panel-title">Reg&iacute;stro de Usuario</div></center>
						<!--<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="index.php" style="color: #F7F8FA;">Iniciar Sesi&oacute;n</a></div>-->
					</div>  
					
					<div class="panel-body" >
						
						<form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
						<center><img width="155" height="150"  src="../assets/resources/iconos/p_usuario.png"></center>
							<br>
							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>
							
							<div class="form-group">
								<label for="nombre" class="col-md-3 control-label">Nombre:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Nombre" value="<?php if(isset($nombre)) echo $nombre; ?>" required >
								</div>
							</div>
							
							<div class="form-group">
								<label for="usuario" class="col-md-3 control-label">Usuario</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="usuario" placeholder="Usuario" value="<?php if(isset($usuario)) echo $usuario; ?>" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="password" class="col-md-3 control-label">Password</label>
								<div class="col-md-9">
									<input type="password" class="form-control" id="password" name="password" placeholder="Ingrese Contraseña" maxlength="8" minlength="8" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$" required>
									<span class=""><i class="glyphicon glyphicon-eye-open"></i></span>
								</div>
							</div>
							
							<div class="form-group">
								<label for="con_password" class="col-md-3 control-label">Confirmar Password</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="con_password" placeholder="Confirmar Contraseña" maxlength="8" minlength="8" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="email" class="col-md-3 control-label">Email</label>
								<div class="col-md-9">
									<input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($email)) echo $email; ?>" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="captcha" class="col-md-3 control-label"></label>
								<!--<div class="g-recaptcha col-md-9" data-sitekey="6Lcy2OAfAAAAAAkW_Iv6kNTM6bnGqmbkXS6h37iQ"></div>-->
								<!--<button class="g-recaptcha" data-sitekey="reCAPTCHA_site_key" data-callback='onSubmit' data-action='submit'>Submit</button>-->
							</div>
							
							<div class="form-group">                                      
								<div class="col-md-offset-3 col-md-9">
								    <a href="../view/configuracion.php" class="btn btn-info">Regresar</a>
									<button id="btn-signup" type="submit" class="btn btn-primary"><i class="icon-hand-right"></i>Registrar</button> 
								</div>
							</div>
						</form>
						<?php echo resultBlock($errors); ?>
					</div>
				</div>
			</div>
		</div>

		<script>
			document.querySelector('.form-group span').addEventListener('click', e => {
    const passwordInput = document.querySelector('#password');
    if (e.target.classList.contains('show')) {
        e.target.classList.remove('show');
        e.target.textContent = '';
        passwordInput.type = 'text';
    } else {
        e.target.classList.add('show');
        e.target.textContent = '';
        passwordInput.type = 'password';
    }
});
		</script>
	</body>
</html>															