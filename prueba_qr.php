<?php
	
	require 'resources/phpqrcode/qrlib.php';

	$dir = 'resources/temp/';

    if(!file_exists($dir))
    mkdir($dir);

    $filename= $dir.'test.png';

    $tamanio= 10;
    $level= 'H';
    $frameSize= 3;
    $contenido= 'hola mundo';

    QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);

    echo '<img src="'.$filename.'" />';
	
	
	
?>