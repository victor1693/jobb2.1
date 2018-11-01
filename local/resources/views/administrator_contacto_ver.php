<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Administración Jobbers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers"> 
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
 <section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	<?php include('includes/administrator_menu_left.php');?> 
				 	 <div class="col-xl-9 column"> 
								<div class="padding-left">
									<div class="manage-jobs-sec">
										<h3>Titulo</h3>  
											
										<form  id="formulario" style="padding: 10px;" method="POST" action="addpublicacion" enctype="multipart/form-data"> 
										
										<div class="col-lg-12">
										<p>
												Nulla vel congue mi. Mauris felis nibh, tincidunt sed nisl eu, facilisis placerat neque. Morbi lobortis interdum sollicitudin. Nulla aliquet, sapien non fringilla luctus, sapien sem consequat lacus, quis aliquet odio ligula ac neque. Mauris fermentum ex imperdiet eros dictum, nec posuere nunc tristique. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque in quam luctus, eleifend est id, mattis ipsum.
											</p> 
											<p style="margin-bottom: 0px;"><strong>Responder</strong></p>
											<div id="main">
												<textarea  name="noticias_descripcion" id="editor">
											    </textarea> 
												<script>
													initSample();
												</script>
											</div>
										</div> 
											<div class="col-lg-12" style="padding-top: 25px;padding-bottom: 50px;">
												<button onClick="validar_form()"  class="btn btn-primary" type="button">Responder</button> 
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
</body>
</html>