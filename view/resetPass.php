<?php
	
	require_once ("../model/funcs/conexion.php");
	require_once ("../model/funcs/funcs.php");
		
	$sql = "SELECT * FROM usuarios";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
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
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cambiar Password</title>
		
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" >
		<link rel="stylesheet" href="../assets/css/bootstrap-theme.min.css" >
		<script src="../js/bootstrap.min.js" ></script>
		
	</head>
	
	<body>
		
		<div class="container">    
			<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
				<div class="panel panel-primary" >
					<div class="panel-heading">
						<div class="panel-title" id="titulo">Restaurar Contraseña</div>
						
					</div>  
					<br> 
					<center><img width="100" height="100"  src="../assets/resources/iconos/recovery.png"> </center>     
					
					<div style="padding-top:30px" class="panel-body" >
						
						<form id="loginform" class="form-horizontal" role="form" action="../controller/guardaResetPass.php" method="POST" autocomplete="off">
							
							<input type="hidden" id="user_id" name="user_id" value ="<?php echo $row['usuario']; ?>" />
							
							<div class="form-group">
								<label for="password" class="col-md-3 control-label">Nueva Contraseña</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="password" placeholder="Ingrese su nueva contraseña" maxlength="8" minlength="8" style="background-color:transparent; border: 0;" value="ueO12345" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="con_password" class="col-md-3 control-label">Confirmar Contraseña</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="con_password" placeholder="Confirmar Contraseña" maxlength="8" minlength="8" style="background-color:transparent; border: 0;" value="ueO12345" required>
								</div>
							</div>
							
							<center><div style="margin-top:10px" class="form-group">
								<div class="col-sm-12 controls">
                                <a href="../view/configuracion.php" class="btn btn-info">Regresar</a>
									<button id="btn-login" type="submit" class="btn btn-primary">Guardar Cambios</button>
									
								</div>
							</div> </center>
						</form>
					</div>                     
				</div>  
			</div>
		</div>
	</body>
</html>	