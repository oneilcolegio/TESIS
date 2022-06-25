<?php
	require_once ("../model/funcs/conexion.php");
	require_once ("../model/funcs/funcs.php");
	//include("../assets/resources/phpqrcode/qrlib.php");
	require('../lib/fpdf.php');
	require_once("../lib/qrcode.php");
	require_once("../public/exten.php");
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM estudiantes WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
?>



<!DOCTYPE html>
<html lang="en" >
<head>
	<title>QR Code Generator</title>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="../assets/css/tarjeta/tarjeta.css">
    <script src="../js/jquery-3.1.1.min.js"></script>
	

</head>

    <body>
		<script type="text/javascript">	
		setTimeout(function () {
        mywindow.print();
        mywindow.close();
        }, 0); 
		</script>

	 <div id="bg">
            <div id="id">
            	 <table>
        <tr> <td>
        	
        	<img src="../assets/resources/img/logoi_Oneil.jpg" alt="Avatar"  width="80px" height="80px"> 
        	</td>
        <td><h5><b>Unidad Educativa O'neil</b></h5></td>
       </tr>        
    </table><center>
	<div class="container py-3">
		<div class="row">
			<div class="col-md-12"> 
							<div class="card-body">
								<form autocomplete="off" class="form" id="frm" action="" method="">

								    <div class="form-group">
									<label for="foto" class="col-sm-2 control-label"></label>
									<div class="col-sm-10">	
									<td><img height='150px' id="foto" alt="style='border: 2px solid black;" width='180px' src= "data:image/*.;base64, 
									<?php echo base64_encode ($row['foto']) ?> " required></td>
									</div>
								    </div>
									<br>
									<br><br><br><br>
									<div id="datos" style="">
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label" id="cedula">Cédula:</label>
										<div class="col-lg-9" id="ced">
										 <?php echo $row['cedula']; ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label" id="nombre">Nombres:</label>
										<div class="col-lg-9" id="nom">
                                         <?php echo $row['nombres']; ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label" id="apellido">Apellidos:</label>
										<div class="col-lg-9" id="ape">
                                         <?php echo $row['apellidos']; ?>
										</div>
									</div>
                                     <br>
									<div class="form-group row" style=" text-align:center">
									<label  style="background-color: gray; text-align:center" lass="col-lg-3 col-form-label form-control-label" for="" id="curso"></label>
									<div class="col-lg-9" id="cur" style=" text-align:center; left: 30px;">
                                        <b><?php echo $row['curso']; ?></b> 
										</div>
									</div>
									
									<div class="id-1">
    	 
									<div class="form-group">
									<label for="qr" class="col-sm-2 control-label"></label>
									<div class="col-sm-10" id="cod">
											
									<center><td><img height= "200px" src= "<?=  base_url();  ?>
									../lib/qrcode.php?s=qr-h&d=<?=
									 $row['cedula']. "\n".
									 $row['nombres']. "\n".
									 $row['apellidos']. "\n";
									?>"></td></center>
									</div>
								    </div>
                            
							<div class="container" align="center" id="letras" style="margin-top: 2%;">
                            
							<h2 style="color:#1153EC; "><b>IDENTIFICACIÓN </b></h2>
							<br><br>
							<p id="firma" style="margin:auto"></p>
							<img src="../assets/resources/imagenes/firma.PNG" style="width: 180px; height: 120px;" alt="">
							<hr align="center" style="border: 1px solid black;width:80%;margin-top:3%"></hr> 

							<p align="center" style="margin-top:-2%; font-size: 12px; ">Autorización</p>
							<p> <?php if(isset($code)){ echo$code;}?>
							</p>
							<?php if(isset($name)){ echo"Property of ".$name;}?> </center>
						</div>
							</div>
							</div>           
								<br>
								<div style=" top: 20; position: realtive; height: 700px; width: 900px;"  id="btnImp">
								<input type="button" value="Imprimir" class="printbutton">
								</div>
						</form>	
								</div>
							</div><!-- /form user info -->
						</div>
				</div>

			</div><!--/col-->
		</div><!--/row-->
	</div><!--/container-->
		</div>
		<script type="text/javascript">
			function impri(){
					window.print();
				
		setTimeout(function(){
			window.close()
		
		},1000)}
		</script>

		<script>
			document.querySelectorAll('.printbutton').forEach(function(element) {
element.addEventListener('click', function() {
print();
});
});
		</script>
</body>
</html>