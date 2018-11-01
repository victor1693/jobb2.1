<?php
//Experiencia laboral
Fpdf::SetFont('Arial','',10); 
Fpdf::SetTextColor(0,0,0);  // Establece el color del texto (en este caso es blanco) 
Fpdf::SetFillColor(232, 232, 232);  
Fpdf::Cell(190,5,''.utf8_decode("INFORMACIÓN ADICIONAL").'',0,1,'C','true');
if(count($datos_info_extra)>0)
{
$linea=$linea+86;
Fpdf::SetFont('Arial','B',10); 
Fpdf::SetTextColor(46, 49, 146);
Fpdf::Cell(190,6,''.utf8_decode('Remuneración pretendida: '.$datos_info_extra[0]->salario).'',0,1,'0'); 
Fpdf::SetFont('Arial','',9); 
Fpdf::SetTextColor(0, 0, 0);  
 

Fpdf::SetFont('Arial','B',10); 
Fpdf::SetTextColor(46, 49, 146);
Fpdf::Cell(190,6,''.utf8_decode('Disponibilidad: '.$datos_info_extra[0]->nombre).'',0,1,'0'); 
Fpdf::SetFont('Arial','',9); 
Fpdf::SetTextColor(0, 0, 0);  

Fpdf::SetFont('Arial','B',10); 
Fpdf::SetTextColor(46, 49, 146);
Fpdf::Cell(190,5,''.utf8_decode('Sobre mí: ').'',0,1,'0');
Fpdf::SetFont('Arial','',9); 
Fpdf::SetTextColor(0,0,0);

$cadena=explode(" ", $datos_info_extra[0]->sobre_mi);
$datos="";
$bandera=0;
foreach ($cadena as $key ) {
	
	if(strlen($datos)<105)
	{
		$datos=$datos." ".$key;
		$bandera=0;
	}
	else
	{
		$bandera=1;
		Fpdf::Cell(190,5,''.utf8_decode("".$datos." ".$key."").'',0,1,'0');
		$datos="";	
	}
	
}
	if($bandera==0)
	{
		Fpdf::Cell(190,5,''.utf8_decode("".$datos."").'',0,1,'0');
	} 
}

else
{
	Fpdf::Cell(190,5,''.utf8_decode("Sin información").'',0,1,'0');
}
?>