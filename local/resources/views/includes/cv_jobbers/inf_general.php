<?php 
		Fpdf::ln();Fpdf::ln();Fpdf::ln();
		Fpdf::SetFont('Arial','',10); 
		Fpdf::SetTextColor(0,0,0);  // Establece el color del texto (en este caso es blanco) 
		Fpdf::SetFillColor(232, 232, 232);  
		Fpdf::Cell(190,5,''.utf8_decode("INFORMACIÓN GENERAL").'',0,1,'C','true');
		Fpdf::SetFont('Arial','B',8); 
		Fpdf::SetFillColor(255, 255, 255);  
		Fpdf::Cell(85,4,''.utf8_decode("DNI:").'',0,1,'L','true');
		Fpdf::Cell(85,4,''.utf8_decode("Nº CUIL:").'',0,1,'L','true');
		Fpdf::Cell(85,4,''.utf8_decode("NACIONALIDAD:").'',0,1,'L','true');
		Fpdf::Cell(85,4,''.utf8_decode("DIRECCIÓN").'',0,1,'L','true');
		Fpdf::Cell(85,4,''.utf8_decode("FECHA DE NACIMIENTO:").'',0,1,'L','true');
		Fpdf::Cell(85,4,''.utf8_decode("EDAD:").'',0,1,'L','true');
		Fpdf::Cell(85,4,''.utf8_decode("SEXO:").'',0,1,'L','true');
		Fpdf::Cell(85,4,''.utf8_decode("DISCAPACIDAD:").'',0,1,'L','true');
		Fpdf::Cell(85,4,''.utf8_decode("EDO. CIVIL:").'',0,1,'L','true');
		Fpdf::Cell(85,4,''.utf8_decode("HIJOS:").'',0,1,'L','true');
		$linea=4;
		Fpdf::SetFont('Arial','',8);
		Fpdf::Text(21,56+24,$datos_personales[0]->sexo); 
		Fpdf::Text(34,56+28,$datos_personales[0]->discapacidad);
		Fpdf::Text(28,56+32,$datos_personales[0]->edo_civil);
		Fpdf::Text(21,56+36,$datos_personales[0]->hijos); 
		Fpdf::Text(18,56,$datos_personales[0]->n_identificacion); 
		Fpdf::Text(23,56+$linea,$datos_personales[0]->cuil); 
		$linea=$linea+4;
		Fpdf::Text(35,56+$linea,utf8_decode(strtoupper($datos_generales[0]->nacionalidad))); 
		$linea=$linea+4;
		Fpdf::Text(28,56+$linea,utf8_decode($datos_generales[0]->descripcion.". ".$datos_generales[0]->provincia.". ".$datos_generales[0]->localidad.". ". $datos_generales[0]->direccion)); 
		$linea=$linea+4;
		$fecha_nacimiento=explode("-",$datos_personales[0]->fecha_nac);
		Fpdf::Text(46,56+$linea,$fecha_nacimiento[2]."-".$fecha_nacimiento[1]."-".$fecha_nacimiento[0]); 
		$linea=$linea+4;
		Fpdf::Text(20,56+$linea,' '.$this->edad($datos_personales[0]->fecha_nac).utf8_decode(" Años")); 
?>