<!DOCTYPE html>
<html>
	<head>
		<?php include('local/resources/views/includes/referencias_top.php');?>
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="../local/resources/views/css/icons.css">
		<link rel="stylesheet" href="../local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="../local/resources/views/plugins/editor/ckeditor.js"></script>
		<script src="../local/resources/views/plugins/editor/samples/js/sample.js"></script>
		<?php include('local/resources/views/includes/google_analitycs.php');?>
		<?php include("local/resources/views/includes/chat_soporte.php");?>
	</head>
	<body style="background: url(https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg)">
		<?php $atras=1;?>
		<div class="theme-layout" id="scrollup">
			<!--Header responsive-->
			<?php include('local/resources/views/includes/header_responsive_noticias.php');?>
			<?php include('local/resources/views/includes/header_noticias.php');?>
			<!--fin Header responsive-->
			
			<section style="margin-bottom: 20px;">
				<div class="block no-padding" >
					<div class="container">
						<div class="row no-gape" style="min-height: 500px;">
							<?php include('local/resources/views/includes/aside_noticias.php');?>
							<div class="col-lg-9 column">
								<div class="padding-left">
									<div class="manage-jobs-sec">
										<h3>Editar publicación</h3>
										<form  style="padding: 10px;" method="POST" action="../editpublicacion" enctype="multipart/form-data">
											<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
											<input type="hidden" name="identificador" value="<?php echo $identificador;?>">
											<div class="col-lg-12">
												<p style="margin-bottom: 0px;">Imagen</p>
												<div class="pf-field" style="height: 55px;">
													<input name="imagen_noticia" type="file" placeholder="" accept="image/*">
												</div>
											</div>
											<p style="margin-bottom: 0px;margin-left: 20px;">Titulo</p>
											<div class="col-lg-12">
												<div class="pf-field" style="height: 55px;">
													<input id="noticia_titulo" value="<?php echo $datos_noticia[0]->titulo?>" name="noticia_titulo" type="text" placeholder="">
												</div>
											</div>
											<p style="margin-bottom: 0px;margin-left: 20px;">Categoria</p>
											<div class="col-lg-12">
												<div class="pf-field" style="height: 55px;">
													<select id="cbn_categorias" name="noticias_categoria" class="chosen">
														<?php foreach ($datos_categorias as $key): ?>
														<option value="<?php echo $key->id;?>"><?php echo $key->descripcion;?></option>
														<?php endforeach ?>
													</select>
												</div>
											</div>
											
											<p style="margin-bottom: 0px;margin-left: 20px;"">Etiquetas<span style="color: #4286f4;font-size: 14px;"> (Ejemplo: Trabajo,trabajar,RRHH,cordoba)</span></p>
											<div class="col-lg-12"><p style="margin-bottom: 0px;"></p></div>
											<div class="col-lg-12" style="">
												<div class="pf-field" style="height: 65px;">
													<input id="noticias_tags" value="<?php echo $datos_noticia[0]->tags;?>" name="noticias_tags" type="text" placeholder="Etiqueta 1, Etiqueta 2, Etiqueta 3">
												</div>
											</div>
											<p style="margin-bottom: 0px;margin-left: 20px;"">Descripción</p>
											<div class="col-lg-12">
												<div id="main">
													<textarea name="noticias_descripcion" id="editor">
													<?php echo $datos_noticia[0]->descripcion;?>
													</textarea>
													<script>
														initSample();
													</script>
												</div>
											</div>
											<div class="col-lg-12" style="padding-top: 25px;">
												<button  class="btn btn-primary" type="submit">Publicar</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<?php include("local/resources/views/includes/aside_right_administrator.php");?>
			<?php include("local/resources/views/includes/general_footer.php");?>
			<script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/modernizr.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/script.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/wow.min.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/slick.min.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/parallax.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/select-chosen.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/circle-progress.min.js" type="text/javascript"></script>
			<script>
			initSample();
			</script>
			<script>
			$("#cbn_categorias").val(<?php echo $datos_noticia[0]->id_categoria;?>);
			$("#cbn_categorias").trigger('chosen:updated')
			</script>
		</body>
	</html>