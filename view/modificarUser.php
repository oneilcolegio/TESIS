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
}
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM usuarios WHERE id = '".$id."'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);

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
						<center><div id="titulo" class="panel-title">Modificaci&oacute;n de Usuario</div></center>
						<!--<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="index.php" style="color: #F7F8FA;">Iniciar Sesi&oacute;n</a></div>-->
					</div>  
					
					<div class="panel-body" >
						
						<form id="signupform" class="form-horizontal" role="form" action="../controller/updateUser.php" method="POST" autocomplete="off">
						<center><img width="155" height="150"  src="../assets/resources/iconos/p_usuario.png"></center>
							<br>
							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>
							<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
							
							<div class="form-group">
								<label for="nombre" class="col-md-3 control-label">Nombre:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="nombre" name="nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" required >
								</div>
							</div>
							
							<div class="form-group">
								<label for="usuario" class="col-md-3 control-label">Usuario</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $row['usuario']; ?>" required>
								</div>
							</div>

                            <div class="form-group">
								<label for="email" class="col-md-3 control-label">Correo</label>
								<div class="col-md-9">
									<input type="email" class="form-control" id="correo" name="correo" placeholder="Email" value="<?php echo $row['correo']; ?>" required>
								</div>
							</div>

                            <div class="form-group">
								<label for="email" class="col-md-3 control-label">Tipo Usuario</label>
								<div class="col-md-9">
                                <input type="text" class="form-control" style="width : 100px;"id="tipo" name="tipo" placeholder="" value="<?php echo $row['id_tipo']; ?>">
								</div>
							</div>
							
							<div class="form-group">                                      
								<div class="col-md-offset-3 col-md-9">
								    <a href="../view/configuracion.php" class="btn btn-info">Regresar</a>

									<button id="btn-signup" type="submit" class="btn btn-primary"><i class="icon-hand-right"></i>Guardar</button> 
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