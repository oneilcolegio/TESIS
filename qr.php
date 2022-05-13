
<!DOCTYPE html>
    <html>
    <head>
    	    <title>Agregar Estudinate QR</title>
    	<link rel="icon" type="image/png" href="resources/imagenes/icono.png" />
        <link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>

    </head>

<style>
	


body{

background-image: url();
background-size: 100%;

}

.contenedor{

width: 60%;
background-color: #F3F4F8;
margin-top: 70px;

margin-left: 20%;
margin-right: 20%;
margin-top: 20px;



}

</style>


    <body>

<div class="contenedor">
<?php  
require 'funcs/conexion.php';
require 'guardar.php';
require 'resources/phpqrcode/qrlib.php';

echo "<BR>";
    echo "<center><h3><font color='black'>QR DEL ESTUADIANTE</font></h3><hr/></center>";

    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    

    $PNG_WEB_DIR = 'resources/temp/';

   

    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';
    

    $errorCorrectionLevel = 'H';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 4;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    if (isset($_REQUEST['data'])) { 
    
    
        if (trim($_REQUEST['data']) == '')
            die('data cannot be empty! <a href="?">back</a>');
            
    
        $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    }  




    echo '<center><form action="qr.php" method="post">
        <font color="black" size="3">Nombre del Estudiante:&nbsp;</font><input name="data" value="'.(isset($_REQUEST['data'])?htmlspecialchars($_REQUEST['data']):'producto').'" />&nbsp;
        
        
        <input class="btn btn-danger" type="submit" value="Crear QR del estudiante"></form> ';

        ?>

<br>
   <a href="oper.php"><button class="col-sm-offset-2 col-sm-3">Volver</button></a>
<br>
<br>
        <?php

    
        

    echo '<center><img src="'.$PNG_WEB_DIR.basename($filename).' " /><br><hr/></center>';  
    


    ?>

</div>
 
    </body>
    </html>

    