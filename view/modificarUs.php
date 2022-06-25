<?php
	require_once ("../model/funcs/conexion.php");
	require_once ("../assets/resources/phpqrcode/qrlib.php");
	require_once ("../model/funcs/funcs.php");
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM estudiantes WHERE id = '".$id."'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);

?>
<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/bootstrap-theme.css" rel="stylesheet">
		<script src="../js/jquery-3.1.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container" style="background-color: #DDE0E7;">
			<div class="row">
				<h3 style="text-align:center">MODIFICAR REGISTRO</h3>
			</div>
			<br>
			<form class="form-horizontal" method="POST" id="formu" action="../controller/updateUs.php" autocomplete="off" enctype="multipart/form-data">

			<div class="form-group">
					<label for="cedula" class="col-sm-2 control-label">Cédula</label>
					<div class="col-sm-10">
						<input type="num" style="width : 600px; justify-content: center;" class="form-control" id="cedula" name="cedula" pattern="09[0-9]{1,10}" maxlength="10" minlength="10" placeholder="Cédula" 
						value="<?php echo $row['cedula']; ?>" required> 
					</div>
				</div>
				<div class="form-group">
					<label for="nombres" class="col-sm-2 control-label">Nombres</label>
					<div class="col-sm-10">
						<input type="text" style="width : 600px;" class="form-control" id="nombres" name="nombres" onkeyup="javascript:this.value=this.value.toUpperCase();" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" placeholder="Nombres" 
						value="<?php echo $row['nombres']; ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label for="apellidos" class="col-sm-2 control-label">Apellidos</label>
					<div class="col-sm-10">
						<input type="text" style="width : 600px;" class="form-control" id="apellidos" name="apellidos" onkeyup="javascript:this.value=this.value.toUpperCase();" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" placeholder="Apellidos" 
						value="<?php echo $row['apellidos']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				
				<div class="form-group">
					<label for="correo" class="col-sm-2 control-label">Correo</label>
					<div class="col-sm-10">
						<input type="email" style="width : 600px;" class="form-control" id="correo" name="correo" pattern="[a-zA-Z0-9!#$%&'*_+-]([\.]?[a-zA-Z0-9!#$%&'*_+-])+@[a-zA-Z0-9]([^@&%$\/()=?¿!.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?"/ placeholder="Correo" 
						value="<?php echo $row['correo']; ?>"  required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="telef" class="col-sm-2 control-label">Teléfono</label>
					<div class="col-sm-10">
						<input type="tel" style="width : 600px;" class="form-control" id="telef" name="telef" placeholder="Teléfono" pattern="09[0-9]{1,10}" maxlength="10"
						value="<?php echo $row['telef']; ?>"  required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="repre" class="col-sm-2 control-label">Representante</label>
					<div class="col-sm-10">
						<input type="text" class="form-control"  style="width : 600px;" id="repre" name="repre" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Representante" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" 
						value="<?php echo $row['repre']; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="fecha" class="col-sm-2 control-label">Fecha</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" style="width : 600px;" id="fecha" name="fecha" placeholder="Fecha" 
						value="<?php echo $row['fecha']; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label for="repre" class="col-sm-2 control-label">Observación</label>
					<div class="col-sm-10">
					    <input type="text" style="text-transform:uppercase; width : 600px;" id="obs" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" name="obs" maxlength="40" placeholder="Observación" 
						value="<?php echo $row['obs']; ?>" required>  
						<!--<input type="text" class="form-control" id="obs" name="obs" placeholder="Representante" required>-->
					</div>
				</div>

				<div class="form-group">
					<label for="foto" class="col-sm-2 control-label">Foto</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" style="width : 600px;"  id="foto" name="foto"
						 
						value= "<img type="file" height= "50px" src= "<?php echo base64_encode ($row['foto']) ?>">
						<br>
						<div id="muestraImg" style="float:right; border-style: groove; border-width: 4px; margin-top: -450px;">
						<img id="fotos" name="fotos"  width="300" height= "220px" src= "data:image/*.;base64, <?php echo base64_encode ($row['foto']) ?>">
						</div>
					</div>	
				</div>

				<div class="form-group">
					<label for="qr" class="col-sm-2 control-label"></label>
					<div class="col-sm-10">
					<div class="mostrar" type="" style="float:right;  margin-top: -220px;" id="qr" name="qr"></div>
					
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					<label class="control-label"></label>					
						<a href="../view/operUser.php" class="btn btn-info">Regresar</a>
						<button type="button" id="butQR" class="btn btn-success" onClick="activar()" >Generar código QR</button>
						<button type="submit" class="btn btn-primary" id="guarda" disabled="">Guardar</button>
					</div>
					<script language="javascript">
                    function activar(){
					document.getElementById('guarda').disabled = false;
					}
                   </script>

<script>
var input = document.getElementById("foto"); 
input.addEventListener('change', check); 

function check(event) { 
 var verificar = this.files.length == 0 ? true : false;   
 var enviar = document.getElementById("butQR"); 
 enviar.disabled = verificar;
}
</script>

<script>
// Obtener referencia al input y a la imagen

const $seleccionArchivos = document.querySelector("#foto"),
  $imagenPrevisualizacion = document.querySelector("#fotos");

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
				 
				</div>
			</form>
		</div>
		<script>
			$("#butQR").on("click", function(e){
				e.preventDefault();			
            let formData = new FormData($("#formu")[0]);
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
				$(".mostrar").html(response['html']);
			},
			error: function(data){
			},
			complete: function(){
			},
			});
		});
		</script>
	<script language="javascript">
		$(document).ready(function () {

$('#butQR').attr("disabled", true);

$('#cedula, #nombres, #correo, #telef, #repre, #obs, #foto').keyup(function () {
	var buttonDisabled = $('#cedula').val().length == 0 || $('#nombres').val().length == 0 || $('#apellidos').val().length == 0 ||  $('#correo').val().length == 0 || $('#telef').val().length == 0 || $('#repre').val().length == 0 || $('#obs').val().length == 0 || $('#foto').val().length == null;
	$('#butQR').attr("disabled", buttonDisabled);
});
});
</script>
	</body>
</html>