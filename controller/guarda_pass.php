<?php
	
	require_once ("../model/funcs/conexion.php");
	require_once ("../model/funcs/funcs.php");
	
    $user_id = $mysqli->real_escape_string($_POST['user_id']);
	$token = $mysqli->real_escape_string($_POST['token']);
	$password = $mysqli->real_escape_string($_POST['password']);
	$con_password = $mysqli->real_escape_string($_POST['con_password']);

	if(validaPassword($password, $con_password)){
		$pass_has =hashPassword($password);

		if(cambiaPassword($pass_has, $user_id, $token)){
			echo "<center><img width='180' height='180'  src='../assets/resources/iconos/pulgar-arriba.png'> </center>";				
			echo "<center><H2><b>Contraseña modificada con éxito !!</b></H2></center>";
			echo  "<br><center><H2><p><a class='btn btn-primary btn-lg' href='../index.php' role='button'>Iniciar Sesi&oacute;n</a></p></H2></center>";
		}
		else{
			echo "<center><img width='180' height='180'  src='../assets/resources/iconos/cerrar.png'> </center>";
			echo "<center><H2><b>Error al modificar la contraseña !!</b></H2></center>";
		}
	}else{
		echo "<center><img width='180' height='180'  src='../assets/resources/iconos/advertencia.png'> </center>";
		echo "<center><H2><b>Error: las contraseñas no coinciden !!</b></H2></center>";
	}

	
?>	