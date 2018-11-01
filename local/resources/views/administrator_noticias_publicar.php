<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Administración Jobbers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers"> 
	<?php include 'local/resources/views/includes/referencias_top.php';?> 
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../../local/resources/views/css/icons.css">
	<link rel="stylesheet" href="../../local/resources/views/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/style.css" />
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/responsive.css" /> 
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/colors/colors.css" /> 
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/chosen.css" />
	<script src="../../local/resources/views/plugins/editor/ckeditor.js"></script>
	<script src="../../local/resources/views/plugins/editor/samples/js/sample.js"></script>
</head>
<body  style="background-image: url('https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg');"> 
	<!--Header responsive-->
	<div class="theme-layout" id="scrollup">
		<?php $atras=1;?>
			<?php include('local/resources/views/includes/header_administrator.php');?> 
			<?php include('local/resources/views/includes/header_responsive_admin.php');?> 
 <section>
		<div class="block no-padding mt-75">
			<div class="container">
				 <div class="row no-gape">
				 	<?php include('includes/administrator_menu_left.php');?> 
				 	 <div class="col-xl-9 column"> 
								<div class="padding-left">
									<div class="manage-jobs-sec">
										<h3><?php echo $titulo;?></h3> 
										<?php 
										$titulo="";
										$tags="";
										$descripcion="";
										$id_categoria="";
										if (isset($datos[0])): ?>
											<img style="max-width: 500px;margin-left: 20%;" src="../../imagenes_noticias/<?php echo $datos[0]->foto;?>" alt=""> 
											<?php
										$titulo=$datos[0]->titulo;
										$tags=$datos[0]->tags;
										$descripcion=$datos[0]->descripcion;
										$id_categoria=$datos[0]->id_categoria;
										 ?>	
										<?php endif ?>
										<form  id="formulario" style="padding: 10px;" method="POST" action="<?php echo $action;?>" enctype="multipart/form-data">
											<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
											<input type="hidden" name="id" value="<?php echo $identificador;?>">
											<div class="col-lg-12">
												<p style="margin-bottom: 0px;">Cambiar imagen</p>
												<div class="pf-field" style="height: 55px;"> 
											  <input name="imagen_noticia" id="imagen_noticia" type="file" placeholder="" accept="image/*">
											</div> 
											</div>
											<p style="margin-bottom: 0px;margin-left: 20px;">Titulo</p>
											<div class="col-lg-12"> 
												<div class="pf-field" style="height: 55px;">
													<input id="noticia_titulo" value="<?php echo $titulo;?>" name="noticia_titulo" type="text" placeholder="">
												</div>
											</div>
											
											<p style="margin-bottom: 0px;margin-left: 20px;">Categoria</p>
											<div class="col-lg-12"> 
												<div class="pf-field" style="height: 55px;">
													<select id="noticias_categoria" name="noticias_categoria" class="chosen"> 
															<?php foreach ($categorias as $key): ?>
																<option value="<?php echo $key->id;?>"><?php echo $key->descripcion;?></option> 
															<?php endforeach ?>
															
													</select>
												</div>
											</div>
											<p style="margin-bottom: 0px;margin-left: 20px;"">Etiquetas<span style="color: #4286f4;font-size: 14px;"> (Ejemplo: Trabajo,trabajar,RRHH,cordoba)</span></p>
											<div class="col-lg-12"><p style="margin-bottom: 0px;"></p></div>
											<div class="col-lg-12" style=""> 
												<div class="pf-field" style="height: 65px;">
													<input id="noticias_tags" value="<?php echo $tags;?>" name="noticias_tags" type="text" placeholder="Etiqueta 1, Etiqueta 2, Etiqueta 3">
												</div>
											</div> 
										<p style="margin-bottom: 0px;margin-left: 20px;">Descripción</p>
										<div class="col-lg-12"> 
											<div id="main">
												<textarea  name="noticias_descripcion" id="editor">
													<?php echo $descripcion;?>
											    </textarea> 
												<script>
													initSample();
												</script>
											</div>
										</div> 
											<div class="col-lg-12" style="padding-top: 25px;">
												<button onClick="validar()"  class="btn btn-primary" type="button">Publicar</button> 
											</div>
										</form>
									</div>
								</div>
							</div>
				 </div>
			</div>
		</div>
	</section>
</div>
<script src="../../local/resources/views/js/jquery.min.js" type="text/javascript"></script> 
<script src="../../local/resources/views/js/script.js" type="text/javascript"></script> 
<script src="../../local/resources/views/js/slick.min.js" type="text/javascript"></script>
<script src="../../local/resources/views/js/select-chosen.js" type="text/javascript"></script> 
<script type="text/javascript">
	var descripcion = CKEDITOR.instances['editor'].getData();
	initSample();
</script>
<?php if (isset($identificador)): ?>
	<script type="text/javascript">
		$("#noticias_categoria").val(<?php echo $id_categoria;?>);
		$("#noticias_categoria").trigger('chosen:updated')
	</script>
<?php endif ?>
<script type="text/javascript">
	function  validar()
	{
		<?php if ($action=="../publicarnoticias"): ?>
		if($("#imagen_noticia").val()=="")
		{
			alert("Debe agregar una imagen.");
			$("#imagen_noticia").focus();
		}
		<?php endif ?>
		
		if($("#noticia_titulo").val()=="")
		{
			alert("Debe colocar un un título.");
			$("#noticia_titulo").focus();
		}
		else if($("#noticias_tags").val()=="")
		{
			alert("Debe colocar almenos una etiqueta.");
			$("#noticias_tags").focus();
		}
		else if($("#noticias_descripcion").val()=="")
		{
			alert("Debe colocar almenos una etiqueta.");
			$("#noticias_descripcion").focus();
		}
		else
		{
			$("#formulario").submit();
		}
	}
</script>
 
<?php
if(isset($_GET['result']) && $_GET['result']!="")
{
	echo "<script>alert('".$_GET['result']."');</script>";
} 
?>
</body>
</html>