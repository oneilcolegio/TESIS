<?php
	
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
	
    $user_id = $mysqli->real_escape_string($_POST['user_id']);
	$token = $mysqli->real_escape_string($_POST['token']);
	$password = $mysqli->real_escape_string($_POST['password']);
	$con_password = $mysqli->real_escape_string($_POST['con_password']);

	if(validaPassword($password, $con_password)){
		$pass_has =hashPassword($password);

		if(cambiaPassword($pass_has, $user_id, $token)){
			echo "Contraseña modificada con éxito !!";
			echo  "<br><a href= 'index.php'>Iniciar Sesión</a>";
		}
		else{
			echo "Error al modificar la contraseña !!";
		}
	}else{
		echo "Error: las contraseñas no coinciden !!";
	}

	
?>	