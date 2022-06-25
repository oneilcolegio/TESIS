
<?php
	require_once ("../model/funcs/conexion.php");
	require_once ("../model/funcs/fecha.php");
	require_once ("../model/funcs/fecha_hora.php");


?>
<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/bootstrap-theme.css" rel="stylesheet">
		<script src="../js/jquery-3.1.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>	
		<script src="../js/ajax_generate_code.js"></script>
		<script src="../js/funcion/activa_btn_gurdar.js"></script>
		<script src="../js/funcion/activa_btn_qr.js"></script>
		<script src="../js/qr/generar_qr.js"></script>
		
	</head>
	
	<body>
	
		
		<div class="container">
			<div class="row">
				<h3 style="text-align:center">NUEVO REGISTRO</h3>
			</div>
			<br>
			<form class="form-horizontal" id="fr"  autocomplete="off" method="POST" action="../controller/guardar.php" enctype="multipart/form-data">
			<div class="form-group">
					<label for="cedula" class="col-sm-2 control-label">Cédula</label>
					<div class="col-sm-10">
						<input type="num" class="form-control" style="width : 600px; justify-content: center;" id="cedula" name="cedula" pattern="09[0-9]{1,10}" maxlength="10" minlength="10" placeholder="Cédula" required>
					</div>
				</div>
				<div class="form-group">
					<label for="nombres" class="col-sm-2 control-label">Nombres</label>
					<div class="col-sm-10">
						<input type="text" autocomplete="on" style="width : 600px; justify-content: center;" class="form-control" id="nombres" name="nombres" onkeyup="javascript:this.value=this.value.toUpperCase();" pattern="^[A-Z][a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" placeholder="Nombres" required>
					</div>
				</div>
				<div class="form-group">
					<label for="apellidos" class="col-sm-2 control-label">Apellidos</label>
					<div class="col-sm-10">
						<input type="text" autocomplete="on" style="width : 600px; justify-content: center;" class="form-control" id="apellidos" name="apellidos" onkeyup="javascript:this.value=this.value.toUpperCase();" pattern="^[A-Z][a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" placeholder="Apellidos" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="correo" class="col-sm-2 control-label">Correo</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" style="width : 600px; justify-content: center;" autocomplete="on" id="correo" name="correo" pattern="[a-zA-Z0-9!#$%&'*_+-]([\.]?[a-zA-Z0-9!#$%&'*_+-])+@[a-zA-Z0-9]([^@&%$\/()=?¿!.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?"/ placeholder="Correo" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="telef" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
						<input type="tel" autocomplete="on" style="width : 600px; justify-content: center;" class="form-control" id="telef" name="telef"  pattern="09[0-9]{1,10}" maxlength="10" placeholder="Telefono">
					</div>
				</div>

				<div class="form-group">
					<label for="repre" class="col-sm-2 control-label">Representante</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" style="width : 600px; justify-content: center;" id="repre" onkeyup="javascript:this.value=this.value.toUpperCase();" name="repre" pattern="^[A-Z][a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" placeholder="Representante" required>
					</div>
				</div>			

				<div class="form-group">
					<label for="fecha" class="col-sm-2 control-label">Fecha</label>
					<div class="col-sm-10">
						<input type="date-local" class="form-control" style="width : 600px; justify-content: center;" id="fecha" readonly="" name="fecha" placeholder="Fecha"
						value="<?= $fechaActual ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="repre" class="col-sm-2 control-label">Observación</label>
					<div class="col-sm-10"> 
						<input type="text" class="form-control" style="width : 600px; justify-content: center;" onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="on" id="obs" name="obs" maxlength="40" placeholder="Representante" required>
					</div>
				</div>

				<div class="form-group">
					<label for="foto" class="col-sm-2 control-label">Foto</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" style="width : 600px; justify-content: center;" id="foto" name="foto" accept="image/*" required>
					</div>
				</div>

				<div id="muestraImg" style="float:right;border-style: groove; border-width: 4px; margin-top: -450px;">
						<img id="mostrar_fotos" name="fotos"  width="300" height= "220px" src= "../assets/resources/imagenes/anonimo.png">
						</div>

				<div class="form-group">
					<label for="qr" class="col-sm-2 control-label"></label>
					<div class="col-sm-10">
					<div class="div" type="" id="qr" style="float:right;  margin-top: -220px;" name="qr" accept="image/png">  
                     </div>

					</div>
				</div>

<script>
// Obtener referencia al input y a la imagen

const $seleccionArchivos = document.querySelector("#foto"),
  $imagenPrevisualizacion = document.querySelector("#mostrar_fotos");

// Escuchar cuando cambie
$seleccionArchivos.addEventListener("change", () => {
  // Los archivos seleccionados, pueden ser muchos o uno
  const archivos = $seleccionArchivos.files;
  // Si no hay archivos salimos de la función y quitamos la imagen
  if (!archivos || !archivos.length) {
    $imagenPrevisualizacion.src = "";
    return;
  }
  // Ahora tomamos el primer archivo, el cual vamos a previsualizar
  const primerArchivo = archivos[0];
  // Lo convertimos a un objeto de tipo objectURL
  const objectURL = URL.createObjectURL(primerArchivo);
  // Y a la fuente de la imagen le ponemos el objectURL
  $imagenPrevisualizacion.src = objectURL;
});
</script>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					
                            <label class="control-label"></label>
							<br>

							<a href="../view/operUser.php" class="btn btn-info">Regresar</a>
							<button type="button" id="btnQR" class="btn btn-success" disabled="" onClick="activar()" >Generar código QR</button>
							
						<button type="submit" class="btn btn-primary" id="guarda" disabled="">Guardar</button>

					</div>
				</div>
			</form>
		</div>
		</div>
		<script>
	$("#btnQR").on("click", function(e){
    e.preventDefault();
	let formData = new FormData($("#fr")[0]);
	console.log(formData);
	$.ajax({
	url:'../controller/generate_code.php',
	data: formData,
	type: "POST",
	contentType: false,
	processData: false,
	success: function(response){
		console.log(response);
		console.log(response['html']);
		$(".div").html(response['html']);
	},
	error: function(data){
	},
	complete: function(){
	},
	});
	});
		</script>
	</body>
</html>
    