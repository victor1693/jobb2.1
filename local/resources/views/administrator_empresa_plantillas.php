<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Administración Jobbers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers"> 
	<?php include('local/resources/views/includes/referencias_top.php');?>
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../../local/resources/views/css/icons.css">
	<link rel="stylesheet" href="../../local/resources/views/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/style.css" />
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/responsive.css" /> 
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/colors/colors.css" />
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/chosen.css" /> 
	
</head>
<body  style="background-image: url('https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg');"> 
	<!--Header responsive-->
	<div class="theme-layout" id="scrollup">
		
			<?php include('local/resources/views/includes/header_administrator.php');?> 
			<?php include('local/resources/views/includes/header_responsive_admin.php');?> 
 <section>


		<div class="block no-padding mt-75">
			<div class="container">
				 <div class="row no-gape">
				 	<?php include('includes/administrator_menu_left.php');?> 
				 	 <div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec addscroll">
					 			<h3>Nueva plantilla de oferta</h3>
					 			<div style="float:left; width: 100%;">
					 				<form id="form_datos_emp" action="<?= url('administracion/empresas/plantillas') ?>" method="post">
					 					<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
					 					<div class="row">

					 						<?php if ($plantillas): ?>

					 							<div class="col-lg-12">
					 								<span class="pf-title">Plantillas predeterminadas</span>
					 								<div class="pf-field">
					 									<select data-placeholder="Por favor seleccione" class="chosen" id="plantilla" onchange="getInfoPlantilla(this.value)">
					 										<option value="">..........</option>
					 										<?php foreach ($plantillas as $plantilla): ?>
					 										
					 											<option value="<?= $plantilla->id ?>"><?= $plantilla->nombre_plantilla ?></option>
					 										<?php endforeach; ?>
					 										
					 									</select>
					 								</div>
					 							</div>

					 							<input type="hidden" name="id_plantilla" id="id_plantilla">


					 						<?php endif; ?>

					 						<input type="hidden" name="accion" id="accion" value="1">

					 						<div class="col-lg-6">
					 							<span class="pf-title">Titulo de la plantilla (*)</span>
					 							<div class="pf-field">
					 								<input type="text" placeholder="Ejm: Plantilla de Director de Ventas" name="nombre_plantilla" id="nombre_plantilla" value="" />
					 								<i class="fa fa-at"></i>
					 							</div>
					 						</div>

					 						<div class="col-lg-6">
					 							<span class="pf-title">Titulo de la oferta (*)</span>
					 							<div class="pf-field">
					 								<input type="text" placeholder="Titulo" name="titulo" id="titulo" value="" />
					 								<i class="fa fa-at"></i>
					 							</div>
					 						</div>
					 						
					 						<div class="col-lg-12">
					 							<span class="pf-title">Descripción de la oferta *</span>
					 							<div class="pf-field">
					 								<textarea name="descripcion" id="descripcion"></textarea>
					 							</div>
					 						</div>
					 						<div class="col-lg-12">
					 							<button type="submit" id="datos_empresa">Guardar</button>
					 						</div>
					 					</div>
					 				</form>
					 			</div>
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
<script src="../../local/resources/views/plugins/notify.js" type="text/javascript"></script>
<script src="../../local/resources/views/js/select-chosen.js" type="text/javascript"></script>
<script type="text/javascript" src="../../local/resources/views/plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../../local/resources/views/plugins/tinymce/skins/custom/jquery.tinymce.min.js"></script>

<script>

	$(document).ready(function() {
		tinymce.init({
			selector: '#descripcion',
			height: 150,
			plugins: [
				'advlist lists charmap print preview anchor',
				'searchreplace visualblocks code fullscreen',
				'insertdatetime table contextmenu paste code'
			],
			toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
			language: 'es'
		});
	});

	function getInfoPlantilla(id)
	{
		if (id != "") {
			$.ajax({
				url: '<?= url("administracion/empresas/plantilla_info") ?>/'+id,
				type: 'GET',
				dataType: 'json',
				success: function (response) {
					$('#id_plantilla').val(response.plantilla.id);
					$('#nombre_plantilla').val(response.plantilla.nombre_plantilla);
					$('#titulo').val(response.plantilla.titulo_oferta);
					tinymce.activeEditor.setContent(response.plantilla.descripcion_oferta);
					$('#accion').val(2); // accion para editar plantilla
				},
				error: function (error) {
					console.dir(error);
				}
			});
			
		} else {
			$('#accion').val(1); // accion para editar plantilla
			$('#nombre_plantilla').val('');
			$('#titulo').val('');
			tinymce.activeEditor.setContent('');
		}
	}

	<?php if (count($errors) > 0): ?>

		<?php foreach ($errors->all() as $error): ?>

			$.notify("<?= $error ?>", {
			className:"error",
			globalPosition: "bottom center"
			});

		<?php endforeach; ?>

	<?php endif; ?>

	<?php if (isset($_GET['r']) && $_GET['r'] == 1): ?>
		$.notify("Plantilla creada satisfactoriamente.", {
		className:"success",
		globalPosition: "bottom center"
		});

	<?php elseif (isset($_GET['r']) && $_GET['r'] == 2): ?>
		$.notify("Plantilla editada satisfactoriamente.", {
		className:"success",
		globalPosition: "bottom center"
		});
	<?php endif; ?>

</script> 

</body>
</html>