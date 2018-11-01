<?php
//Experiencia laboral
Fpdf::SetFont('Arial','',10);
Fpdf::SetTextColor(0,0,0);  // Establece el color del texto (en este caso es blanco)
Fpdf::SetFillColor(232, 232, 232);
Fpdf::Cell(190,5,''.utf8_decode("ESTUDIOS REALIZADOS").'',0,1,'C','true');

$bandera=0;
 if($datos_estudios[0]->cantidad>0)
 {
	$total=count($datos_estudios);
	for ($i=0; $i < $total ; $i++)
	{
	Fpdf::SetFont('Arial','B',10);
	Fpdf::SetTextColor(46, 49, 146);
	
	Fpdf::Cell(190,5,''.quitar_caracter(utf8_decode("".$datos_estudios[$i]->nombre_institucion."")).'',0,1,'0');
	Fpdf::SetFont('Arial','',9);
	Fpdf::SetTextColor(0,0,0);

	$datos_experiencia="";
	$cadena="País: ".$datos_estudios[$i]->descripcion.". Área: ".$datos_estudios[$i]->area_estudio.". Título: ".$datos_estudios[$i]->titulo.". Estado: (".$datos_estudios[$i]->fecha.")";
	$cadena_experiencia=explode(" ", $cadena);

	foreach ($cadena_experiencia as $key )
		{
			if(strlen($datos_experiencia)<110)
			{
				$datos_experiencia=$datos_experiencia." ".$key;
				$bandera_experiencia=0;
			}
			else
			{
					$bandera_experiencia=1;
					Fpdf::Cell(190,5,''.utf8_decode("".$datos_experiencia."").'',0,1,'0');
					$datos_experiencia="";

			}
		}

			if($bandera==0)
			{
				 $bandera_experiencia=1;
				 Fpdf::Cell(190,5,''.utf8_decode("".$datos_experiencia."").'',0,1,'0');
			}
	}
}

 else
{
	Fpdf::Cell(190,5,''.utf8_decode("Sin información").'',0,1,'0');
} 
 function estado($parametro)
{
	if($parametro==1){return "En curso";}
	if($parametro==2){return "Graduado";}
	if($parametro==3){return "Abandonado";}
} 
?>
