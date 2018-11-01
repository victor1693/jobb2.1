<?php
//Experiencia laboral
Fpdf::SetFont('Arial','',10); 
Fpdf::SetTextColor(0,0,0);  // Establece el color del texto (en este caso es blanco) 
Fpdf::SetFillColor(232, 232, 232);  
Fpdf::Cell(190,5,''.utf8_decode("EXPERIENCIA LABORAL").'',0,1,'C','true');
if($datos_experiencia_lab[0]->cantidad > 0)
{ 	$total=count($datos_experiencia_lab);
	for ($i=0; $i < $total ; $i++) 
	{ 

		$this->validar(); 
		Fpdf::SetFont('Arial','B',10); 
		Fpdf::SetTextColor(46, 49, 146);
		Fpdf::Cell(190,5,quitar_caracter(utf8_decode($datos_experiencia_lab[$i]->nombre_empresa)),0,1,'0');
		Fpdf::SetFont('Arial','',9); 
		Fpdf::SetTextColor(0,0,0);
		$textotrabajar=""; 

		//($datos_experiencia_lab[$i]->act_empresa
		if($datos_experiencia_lab[$i]->hasta=="")
		{
			$datos_experiencia_lab[$i]->hasta="Actualidad";
		}
			$expe_desde_fecha=explode('-', $datos_experiencia_lab[$i]->desde);
			
			$expe_hasta_fecha="";
			if($datos_experiencia_lab[$i]->hasta=="Actualidad")
			{
				$expe_hasta_fecha="Trabajando actualmente";
			}
			else
			{
				$temp_expe=explode('-',$datos_experiencia_lab[$i]->hasta);
				$expe_hasta_fecha=$temp_expe[1].'-'.$temp_expe[0];
			}

			
			
			$expe_periodo=$expe_desde_fecha[1].'-'.$expe_desde_fecha[0]." a ".$expe_hasta_fecha." ".$this->calcular_antiguedad($datos_experiencia_lab[$i]->desde,$datos_experiencia_lab[$i]->hasta);

			
			Fpdf::SetFillColor(255, 255, 255); 
			Fpdf::Cell(85,4,''.utf8_decode("Tipo de puesto: ".$datos_experiencia_lab[$i]->tipo_de_puesto).'',0,1,'L','true');
			Fpdf::Cell(85,4,''.utf8_decode("Cargo: ".$datos_experiencia_lab[$i]->cargo).'',0,1,'L','true');
			Fpdf::Cell(85,4,''.utf8_decode("Act. Empresa: ".$datos_experiencia_lab[$i]->act_empresa).'',0,1,'L','true');
			Fpdf::Cell(85,4,''.utf8_decode("Periodo: ".$expe_periodo).'',0,1,'L','true');
			$descripcion_tareas = explode(" ", $datos_experiencia_lab[$i]->descripcion);
			$nuevo_texto_desc="";
			$bandera_desc_tarea=0;
			foreach ($descripcion_tareas as $key) {
				$nuevo_texto_desc=$nuevo_texto_desc.' '.$key;
				if(strlen($nuevo_texto_desc)>100)
				{	if($bandera_desc_tarea==0)
					{
						Fpdf::Cell(85,4,''.utf8_decode("Descripcion de tareas: ".$nuevo_texto_desc).'',0,1,'L','true');
						$bandera_desc_tarea++;
						$nuevo_texto_desc="";
					}
					else
					{
						Fpdf::Cell(85,4,''.utf8_decode("".$nuevo_texto_desc).'',0,1,'L','true');
						$nuevo_texto_desc="";
					} 
				}
		   } 
		   if($bandera_desc_tarea==0)
		   {
		   	Fpdf::Cell(85,4,''.utf8_decode("Descripcion de tareas: ".$nuevo_texto_desc).'',0,1,'L','true'); 
		   }
		   else
		   {
		   	Fpdf::Cell(85,4,''.utf8_decode("".$nuevo_texto_desc).'',0,1,'L','true'); 
		   }
		   
	}

	/*$experienia_general=
		"Tipo de puesto: ".$datos_experiencia_lab[$i]->tipo_de_puesto.
		" Cargo: ".$datos_experiencia_lab[$i]->cargo.
		" - Act. Empresa: ".$datos_experiencia_lab[$i]->act_empresa.
		" - Periodo: ".$expe_desde_fecha[1].'-'.$expe_desde_fecha[0].
		" a ".$expe_hasta_fecha[1].'-'.$expe_hasta_fecha[0]." ".$this->calcular_antiguedad($datos_experiencia_lab[$i]->desde,$datos_experiencia_lab[$i]->hasta)."";
	if(strlen($experienia_general)>120)
	{
		$texto="";
		$ban_ex=0;
		foreach (explode(' ', $experienia_general ) as $key) { 
			if($ban_ex==0){$texto = $texto.$key;$ban_ex++;}else{$texto = $texto." ".$key;}
			if(strlen($texto)>=120)
			{
				Fpdf::Cell(190,5,''.utf8_decode($texto).'',0,1,'0');
				$texto=""; 
			}
		}

		if(strlen($texto)>0)
		{
			Fpdf::Cell(190,5,''.utf8_decode($texto).'',0,1,'0');
			$texto="";
		}
	}
	else
	{
		Fpdf::Cell(190,5,''.utf8_decode($experienia_general).'',0,1,'0');
		 
	}
	
	 

 
	$cadena_experiencia=explode(" ", $datos_experiencia_lab[$i]->descripcion);
	$datos_experiencia="";
	$bandera_experiencia=0;
	$bandera=0;
	$contador=0;
	foreach ($cadena_experiencia as $key ) 
		{ 
		 	$datos_experiencia=$datos_experiencia." ".$key;
			if(strlen($datos_experiencia)<80)
			{
				
				$bandera_experiencia=0;
			}
			else
			{
				if($contador==0)
				{
					$bandera_experiencia=1;
					Fpdf::Cell(190,5,''.utf8_decode("Descripción de tareas:".$datos_experiencia."").'',0,1,'0');
					$datos_experiencia="";
					$contador++;
				}
				else
				{
					$bandera_experiencia=1;
					Fpdf::Cell(190,5,''.utf8_decode("".$datos_experiencia."").'',0,1,'0');
					$datos_experiencia="";
				} 
				}
		
		}
			if($bandera==0)
			{
				if($contador==0)
				{
					$bandera_experiencia=1;
					Fpdf::Cell(190,5,''.utf8_decode("Descripción de tareas:".$datos_experiencia."").'',0,1,'0'); 
					$contador++;
				}
				else
				{
					$bandera_experiencia=1;
					Fpdf::Cell(190,5,''.utf8_decode("".$datos_experiencia."").'',0,1,'0'); 
				} 
			} 
		}

	} */
}
else
{
	Fpdf::Cell(190,5,''.utf8_decode("Sin experiencia pero con ganas de aprender mucho.").'',0,1,'0'); 
}
 
 function quitar_caracter($var)
 {
 	$datos=str_replace('?','', $var);
 	return $datos;
 }

?>