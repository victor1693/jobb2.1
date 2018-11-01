<?php

		Fpdf::SetFont('Arial','',12); 
		Fpdf::Cell(190,10,''.utf8_decode( mb_strtoupper("")).'',0,1,'C');
		Fpdf::SetFont('Arial','',8); 
		Fpdf::SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco) 
		Fpdf::SetFillColor(46, 49, 146);  
		Fpdf::Cell(190,8,utf8_decode(strtoupper($datos_personales[0]->
nombres." ".$datos_personales[0]->apellidos)),0,1,'C','true');
		Fpdf::SetFont('Arial','',8); 
		Fpdf::SetTextColor(0,0,0);  // Establece el color del texto (en este caso es blanco) 
		Fpdf::SetFillColor(255, 255, 255); 
		Fpdf::Cell(190,5,utf8_decode($datos_personales[0]->correo ." - Teléfono: ".$datos_personales[0]->telefono),0,1,'C','true'); 

		if($datos_personales[0]->id_foto=="")
		{
			Fpdf::Image('http://neu.bodenbelaege-koch.de/wp-content/uploads/2017/02/mustermann-e1487862745115.jpeg' , 15 ,8, 25 , 35,'jpg', '');
		}
		else
		{
			$sql_foto_perfil="SELECT * FROM tbl_archivos WHERE id = ".$datos_personales[0]->id_foto."";
			$foto=DB::select($sql_foto_perfil); 
			Fpdf::Image('uploads/'.$foto[0]->nombre_aleatorio, 15 ,8, 35 , 35,$foto[0]->extencion, '');

		}
		
?>
