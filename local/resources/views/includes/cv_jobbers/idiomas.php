<?php
//Experiencia laboral
Fpdf::SetFont('Arial','',10); 
Fpdf::SetTextColor(0,0,0);  // Establece el color del texto (en este caso es blanco) 
Fpdf::SetFillColor(232, 232, 232);  
Fpdf::Cell(190,5,''.utf8_decode("IDIOMAS").'',0,1,'C','true');

if($datos_idioma[0]->cantidad>0)
{  
	$texto="";
	$total=count($datos_idioma);
	for ($i=0; $i < $total ; $i++) {
		if($i==0)
		{
			$texto=$texto.$datos_idioma[$i]->descripcion;
		}
		else
		{
			$texto=$texto.", ".$datos_idioma[$i]->descripcion;
		} 
	}
	Fpdf::SetFont('Arial','B',10); 
	Fpdf::SetTextColor(46, 49, 146);
	Fpdf::Cell(190,5,''.utf8_decode("".$texto."").'',0,1,'0'); 
} 
else
{
	Fpdf::Cell(190,5,''.utf8_decode("Sin información").'',0,1,'0'); 
}

//HABKILIDADES
Fpdf::SetFont('Arial','',10); 
Fpdf::SetTextColor(0,0,0);  // Establece el color del texto (en este caso es blanco) 
Fpdf::SetFillColor(232, 232, 232);  
Fpdf::Cell(190,5,''.utf8_decode("HABILIDADES").'',0,1,'C','true');

if($datos_habilidades[0]->cantidad>0)
{  
	$texto="";
	$total=count($datos_habilidades);
	for ($i=0; $i < $total ; $i++) {
		if($i==0)
		{
			$texto=$texto.$datos_habilidades[$i]->descripcion;
		}
		else
		{
			$texto=$texto.", ".$datos_habilidades[$i]->descripcion;
		} 
	}
	Fpdf::SetFont('Arial','B',10); 
	Fpdf::SetTextColor(46, 49, 146);
	Fpdf::Cell(190,5,''.utf8_decode("".$texto."").'',0,1,'0'); 
} 
else
{
	Fpdf::Cell(190,5,''.utf8_decode("Sin información").'',0,1,'0'); 
}
//
function nivel($parametro)
{
	if($parametro==1){return "Básico";}
	if($parametro==2){return "Medio";}
	if($parametro==3){return "Avanzado";}
	if($parametro==4){return "Nativo";}
}
 
?>