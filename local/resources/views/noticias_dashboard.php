<!DOCTYPE html>
<html>
	<head>
		<?php include('local/resources/views/includes/referencias_top.php');?>
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
        <link rel="stylesheet" href="local/resources/views/css/icons.css"> 
        <link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" /> 
        <link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" /> 
        <link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
        <link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="local/resources/views/plugins/editor/ckeditor.js"></script>
		<script src="local/resources/views/plugins/editor/samples/js/sample.js"></script>
		<?php include("local/resources/views/includes/chat_soporte.php");?>
		<?php include('local/resources/views/includes/google_analitycs.php');?>
	</head>
	<body style="background: url(https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg)">
		<div class="theme-layout" id="scrollup">
			<!--Header responsive-->
			<?php include('local/resources/views/includes/header_responsive_noticias.php');?>
			<?php include('local/resources/views/includes/header_noticias.php');?>
			<!--fin Header responsive-->
			
			<section class="overlape">
				<div class="block no-padding pb-50" >
					<div class="container">
						<div class="row no-gape" style="min-height: 500px;">
							<?php include('local/resources/views/includes/aside_noticias.php');?>
							<div class="col-xl-9 column"> 
								<div class="padding-left">
									<div class="manage-jobs-sec">
										<h3>Publicaciones</h3> 
										<form  id="formulario" style="padding: 10px;" method="POST" action="addpublicacion" enctype="multipart/form-data">
											<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
											<div class="col-lg-12">
												<p style="margin-bottom: 0px;">Imagen</p>
												<div class="pf-field" style="height: 55px;"> 
											  <input name="imagen_noticia" id="imagen_noticia" type="file" placeholder="" accept="image/*">
											</div> 
											</div>
											<p style="margin-bottom: 0px;margin-left: 20px;">Titulo</p>
											<div class="col-lg-12"> 
												<div class="pf-field" style="height: 55px;">
													<input id="noticia_titulo" value="" name="noticia_titulo" type="text" placeholder="">
												</div>
											</div>
											
											<p style="margin-bottom: 0px;margin-left: 20px;">Categoria</p>
											<div class="col-lg-12"> 
												<div class="pf-field" style="height: 55px;">
													<select id="noticias_categoria" name="noticias_categoria" class="chosen">
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
													<input id="noticias_tags" value="" name="noticias_tags" type="text" placeholder="Etiqueta 1, Etiqueta 2, Etiqueta 3">
												</div>
											</div> 
										<p style="margin-bottom: 0px;margin-left: 20px;"">Descripción</p>
										<div class="col-lg-12"> 
											<div id="main">
												<textarea  name="noticias_descripcion" id="editor">
											    </textarea> 
												<script>
													initSample();
												</script>
											</div>
										</div> 
											<div class="col-lg-12" style="padding-top: 25px;">
												<button onClick="validar_form()"  class="btn btn-primary" type="button">Publicar</button> 
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
			<script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script>  
			<script src="local/resources/views/js/script.js" type="text/javascript"></script>  
	        <script src="local/resources/views/js/parallax.js" type="text/javascript"></script>
	        <script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script>
	        <script src="local/resources/views/plugins/notify.js" type="text/javascript"></script> 
			<script>

			<?php if (isset($_GET['error']) && $_GET['error'] != ""): ?>
				$.notify("<?= $_GET['error'] ?>", {
					className:"error",
					globalPosition: "bottom center"
				});
			<?php endif; ?>

			function validar_form()
			{
				var descripcion = CKEDITOR.instances['editor'].getData();
				
				if (document.getElementById('imagen_noticia').files.length == 0) {
					$.notify("Debe seleccionar una imagen para la noticia.", {
						className:"error",
						globalPosition: "bottom center"
					});
				}
				else if($("#noticia_titulo").val()=="")
				{
					$.notify("Debe colocar el titulo de la noticia.", {
						className:"error",
						globalPosition: "bottom center"
					});
					$("#noticia_titulo").focus();
				}
				else if ($('#noticias_categoria').val() == ""){

					$.notify("Debe seleccionar una categoria.", {
						className:"error",
						globalPosition: "bottom center"
					});
				} 
				else if($("#noticias_tags").val()=="")
				{
					$.notify("Debe colocar al menos un tag.", {
						className:"error",
						globalPosition: "bottom center"
					});
					$("#noticias_tags").val().focus();
				}
				else if (descripcion == '') {
					$.notify("Debe colocar la descripción de la noticia", {
						className:"error",
						globalPosition: "bottom center"
					});
					$("#editor").focus();
				}
				else 
				{
					$("#formulario").submit();
				}
			}
			initSample();
			</script> 
		</body>
	</html>