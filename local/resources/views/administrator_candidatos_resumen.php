<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Administración Jobbers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../../local/resources/views/css/icons.css">
	<link rel="stylesheet" href="../../../local/resources/views/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="../../../local/resources/views/css/style.css" />
	<link rel="stylesheet" type="text/css" href="../../../local/resources/views/css/responsive.css" /> 
	<link rel="stylesheet" type="text/css" href="../../../local/resources/views/css/colors/colors.css" /> 
	
</head>
<body  style="background-image: url('https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg');"> 

	<div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-md">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Enviar correo</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row" style="padding: 15px;">
                                     <form action="../../candidatos/enviar" method="post">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                        <input type="hidden" name="identificador" id="identificador" value=""> 
                                        <span style="font-weight: 600;">Detalle</span>
                                         <textarea name="detalle" style="resize: none;" placeholder="Mensaje..." class="form-control"></textarea>
                                         <button type="submit">Enviar</button>
                                    </form>
                                </div>
                             </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                            </div>
                          </div>
                        </div>
                      </div>
	<!--Header responsive-->
	<div class="theme-layout" id="scrollup">
			<?php $atras=2;?>
			<?php include('local/resources/views/includes/header_administrator.php');?> 
 <section>


		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	<?php include('includes/administrator_menu_left.php');?> 
				 	 <div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec addscroll">
					 			<h3><?= $datos_candidato[0]->nombre;?>  - Resumen 
					 			</h3>
					 			<div class="extra-job-info" style="margin-bottom: 30px;background-color: #f0f0f0;"> 
						 		 
						 		 	<span><i class="la la-clipboard"></i><strong><?= $datos_postulaciones;?></strong><a href="noticias/categorias" title="">Postulaciones</a></span>
						 			<span><i class="la la-sign-out"></i><strong>0</strong><a href="noticias/categorias" title="">Sesiones</a></span>
						 			<span><i class="la la-file-text"></i><strong><?= $datos_recomendaciones;?></strong><a href="noticias/categorias" title="">Recomendaciones</a></span>
						 			<span><i class="la la-sort-numeric-asc"></i><strong>0</strong><a href="noticias/categorias" title="">Puntos</a></span> 
						 			<span><i class="la la-user"></i><strong><span id="id_porcentaje"></span></strong><a href="noticias/categorias" title="">Perfil completado</a></span>
						 		</div> 
						 		<table>
						 			<thead>
						 				<tr>
						 					<td>Nombre</td>   
						 					<td style="width:200px;">Opciones</td>
						 				</tr>
						 			</thead>
						 			
						 			<tbody>
						 				<tr>
						 					<td>
						 						  <?php 
                 				if($datos_candidato[0]->nombre==""){$datos_candidato[0]->nombre="Sin información";}
                 				if($datos_candidato[0]->tmp==""){$datos_candidato[0]->tmp="Sin información";}
                                                   ?>
						 						<div class="table-list-title">
						 							<h3><a href="../../candidatos/<?= $datos_candidato[0]->id;?>" title=""><?= $datos_candidato[0]->nombre;?></a></h3>
						 							<span><?= $datos_candidato[0]->tmp;?></span>
						 						</div>
						 					</td>  
						 					<td>
						 						<ul class="action_job">
                                                                    <li><span>Ver</span><a target="_blank" href="../../../candidato/<?= $datos_candidato[0]->id;?>" title=""><i class="la la-eye"></i></a></li>
                                                                    <li><span>Editar</span><a href="../../candidatos/<?= $datos_candidato[0]->id;?>" title=""><i class="la la-pencil"></i></a></li>
                                                                    <li><span>Descargar CV</span><a target="_blank" href="../../../reporte/<?= $datos_candidato[0]->id;?>" title=""><i class="la la-download"></i></a></li> 
                                                                    <li><span>Enviar correo</span><a onClick="enviar_correo('<?php echo $datos_user[0]->correo;?>')" href="#" title=""><i class="la la-envelope"></i></a></li>
                                                                    <li><span>Eliminar</span><a href="../../candidatos/eliminar?id=<?= $datos_candidato[0]->id;?>" title=""><i class="la la-trash-o"></i></a></li>
                                                                </ul>
						 					</td>
						 				</tr> 
						 			</tbody >
						 		</table>
						 		
						 		 
					 		</div>
					 	</div>
					 	<?php 
					 	 
					  

					 	$cantidad=11;
					 	global $contador;
					 	$contador=0;
					 	if(isset($datos_datos_personales[0]->nombres))
					 	{
					 		alert($datos_datos_personales[0]->nombres,"nombres",1);
					 	}
					 	else{alert("","nombres",1);}

					 	if(isset($datos_datos_personales[0]->apellidos))
					 	{
					 		alert($datos_datos_personales[0]->apellidos,"apellidos",1);
					 	}
					 	else{alert("","apellidos",1);}
					 	
					 	
					 	if(isset($datos_datos_personales[0]->n_identificacion))
					 	{
					 		alert($datos_datos_personales[0]->n_identificacion,"identificación",1);
					 	}
					 	else{alert("","identificación",1);}

					 	

					 	if(isset($datos_datos_personales[0]->id_discapacidad))
					 	{
					 		alert($datos_datos_personales[0]->id_discapacidad,"discapacidad",1);
					 	}
					 	else{alert("","discapacidad",1);}
					  	
					  	if(isset($datos_datos_personales[0]->fecha_nac))
					 	{
					 		alert($datos_datos_personales[0]->fecha_nac,"nacimiento",1);
					 	}
					 	else{alert("","nacimiento",1);}
					   
					 	if(isset($datos_datos_personales[0]->id_sexo))
					 	{
					 		alert($datos_datos_personales[0]->id_sexo,"sexo",1);
					 	}
					 	else{alert("","sexo",1);}

					 	if(isset($datos_datos_educacion[0]->id))
					 	{
					 		alert($datos_datos_educacion[0]->id,"No se cargó información académica.",2);
					 	}
					 	else{alert("","No se cargó información académica.",2);}

					 	if(isset($datos_experiencia_lab[0]->id))
					 	{
					 		alert($datos_experiencia_lab[0]->id,"No se cargó información laboral.",2);
					 	}
					 	else{alert("","No se cargó información laboral.",2);}

					 	if(isset($datos_contacto[0]->id))
					 	{
					 		alert($datos_contacto[0]->id,"No se cargó información de contacto.",2);
					 	}
					 	else{alert("","No se cargó información de contacto.",2);}

					 	 if(isset($datos_preferencias[0]->id_remuneracion_pre))
					 	{
					 		alert($datos_preferencias[0]->id_remuneracion_pre,"remuneración pretendida.",1);
					 	}
					 	else{alert("","remuneración pretendida.",1);}

					 	 if(isset($datos_preferencias[0]->id))
					 	{
					 		alert($datos_preferencias[0]->id,"tipo de jornada",1);
					 	}
					 	else{alert("","tipo de jornada",1);}
 

					 	function alert($valor,$campo,$tipo)
					 	{	
					 		$texto=$campo;
					 		if($tipo==2){$texto='</span> <span style="float:right;"> '.$campo.'</span>';}
					 		else{$texto='</span> <span style="float:right;"> Campo '.$campo.' vacío.</span>';}
					 		if($valor=="")
					 		{
					 			 echo '<div class="padding-left" style="padding-left:20px;padding-right:20px;padding-top:5px;margin:0px;"><div class="alert alert-success" style="background-color:#f2dede;color:#a94464;border-radius:5px;padding:5px;">
                                                          <span style="font-weight: 600;">Requerido!</span> '.$texto.'
                                                        </div> </div>';
                                                         global $contador;
                                                         $contador++;
					 		}
					 	} 
					 	?>

					</div>
				 </div>
			</div>
		</div>
	</section>
</div>
<script src="../../../local/resources/views/js/jquery.min.js" type="text/javascript"></script> 
<script src="../../../local/resources/views/js/script.js" type="text/javascript"></script> 
<script src="../../../local/resources/views/js/slick.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
<?php echo '<script>$("#id_porcentaje").html("'.(100-round((($contador/$cantidad)*100))).'%")</script> ';?>
 <script>
        function enviar_correo(correo)
        {
           $("#identificador").val(correo);
           $("#myModal").modal('show');  
        } 
    </script>
</body>
</html>