<?php
//Experiencia laboral
if(-1>0)
{

	Fpdf::SetFont('Arial','',10);
	Fpdf::SetTextColor(0,0,0);  // Establece el color del texto (en este caso es blanco)
	Fpdf::SetFillColor(232, 232, 232);
	Fpdf::Cell(190,5,''.utf8_decode("OTROS CONOCIMIENTOS").'',0,1,'C','true');


	if(count($datos_otros_conocimentos)>0)
	{
		for ($i=0; $i < count($datos_otros_conocimentos) ; $i++)
			{
				Fpdf::SetFont('Arial','B',10);
				Fpdf::SetTextColor(46, 49, 146);
				Fpdf::Cell(190,5,''.utf8_decode("".$datos_otros_conocimentos[$i]['nombre']."").'',0,1,'0');
				Fpdf::SetFont('Arial','',9);
				Fpdf::SetTextColor(0,0,0);
				$contenido_datos=$datos_otros_conocimentos[$i]['descripcion'];
				//Fpdf::Cell(190,5,''.utf8_decode("".$datos_otros_conocimentos[$i]['descripcion']."").'',0,1,'0');

				$datos_imprimir="";
				$variable_bandera=0;
				if(strlen($contenido_datos)<110)
				{
					//Fpdf::Cell(190,5,''.utf8_decode("".$datos_otros_conocimentos[$i]['descripcion']."").'',0,1,'0');
					Fpdf::Cell(190,5,''.utf8_decode("".$datos_otros_conocimentos[$i]['descripcion']."").'',0,1,'0');
				}
				else
				{
					$partes=explode(" ",$contenido_datos);
					$datos_mostrar="";
					foreach ($partes as $key ) {
						$datos_mostrar=$datos_mostrar." ".$key;
						if(strlen($datos_mostrar)>100)
						{
							Fpdf::Cell(190,5,''.utf8_decode("".$datos_mostrar."").'',0,1,'0');
							 
							//$variable_bandera=1;
							$datos_mostrar="";
						}
						/*else
						{
							$datos_imprimir=$datos_imprimir." ".$key;
							$variable_bandera=0;
						}*/
					}
					Fpdf::Cell(190,5,''.utf8_decode("".$datos_mostrar."").'',0,1,'0');
				}
			}
	}
	else
	{
		Fpdf::Cell(190,5,''.utf8_decode("Sin información").'',0,1,'0');
	}
}
?>
