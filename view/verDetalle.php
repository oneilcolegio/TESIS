<?php
    //define('FPDF_FONTPATH','yourpath/yourfolder/');
	require_once ("../model/funcs/conexion.php");

	require_once ("../lib/fpdf/fpdf.php"); 
	
	
	$id = $_GET['idasistencia'];
	
	//$sql = "SELECT * FROM asistencia WHERE idasistencia = '".$id."'";
	class MYPDF extends FPDF {
		//Page header
		
	}


	$pdf = new FPDF();
	$pdf ->AddPage();
	$pdf->SetFont('Arial','B',12);
	$pdf->Image('../assets/resources/imagenes/Oneil-logo.png',8,10,-150);
	$pdf->Ln(20);
	$pdf->Image('../assets/resources/imagenes/portada.jpeg',65,10,140);
	$pdf->Ln(20);
	$pdf->Cell(50,10,'Fecha:'.date('d.m.Y.H.i.s').'',20);
	$pdf->Ln(10);
	$pdf->Cell(100,20, utf8_decode('Reporte Oficial'));
	$pdf->Ln(5);
	$pdf->Cell(100,20, utf8_decode('Departamento Médico/ Unidad Educativa O´neil'));
	$pdf->Ln(20);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(100,20, utf8_decode('Doctor encargado del Departamento Médico'));
	$pdf->Ln(5);
	
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(20,20,'','T');
	$pdf->Cell(20,20,'','T');
	$pdf->Cell(20,20,'','T');
	$pdf->Cell(20,20,'','T');
	$pdf->Cell(20,20,'','T');
	$pdf->Cell(20,20,'','T');
	$pdf->Cell(20,20,'','T');
	$pdf->Cell(20,20,'','T');
	$pdf->Cell(20,20,'','T');
	
	$pdf->Ln(10);
	$pdf->SetFont('Arial','',11);
	

	$sql = "SELECT idasistencia, fecha_hora, det, descrip, receta, E.nombres, E.apellidos, E.cedula FROM asistencia as A  INNER JOIN estudiantes as E ON A.id_estudiantesFK = E.id where idasistencia ='$id' ";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);

	$pdf->Ln(5);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(30,20,'C.I:');
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(30,20, utf8_decode($row['cedula']), 0);

	$pdf->Ln(15);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(30,20,'Nombres:');
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(40,20, utf8_decode($row['nombres'].$row['apellidos']), 0);

	$pdf->Ln(15);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(30,20,'Motivo/Razon:');
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(30,20, utf8_decode($row['det']), 0);

	$pdf->Ln(15);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(30,20,'Fecha y Hora:');
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(30,20, utf8_decode($row['fecha_hora']), 0);

	$pdf->Ln(15);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(30,20,'Detalles:');
	$pdf->SetFont('Arial','',11);
	$pdf->Cell(30,20, utf8_decode($row['descrip']), 0);

	$pdf->Ln(15);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(30,20,'Receta/Medicina:');
	$pdf->Ln(9);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(30,20, utf8_decode($row['receta']), 0);
    $nombres= utf8_decode($row['nombres']);
	$pdf->Ln(20);
	$pdf->Image('../assets/resources/imagenes/firma.png',110,260,70,30);
	$pdf->Output();	
?>
