<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Jobbers Argentina - Empresa</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="CreativeLayers">
		<meta name="csrf-token" content="<?php echo csrf_token(); ?>">
		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="../local/resources/views/css/icons.css">
		<link rel="stylesheet" href="../local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link  href="../local/resources/views/plugins/datepicker_beta/dist/datepicker.min.css" rel="stylesheet">
		<?php include('local/resources/views/includes/chat_soporte.php');?>
		<?php include('local/resources/views/includes/google_analitycs.php');?>
	</head>
	<body>
		<div class="theme-layout" id="scrollup">
			
			<?php include("includes/header_responsive_empresa.php") ?>
			
			<?php include "includes/header_empresa.php" ?>
			<section class="overlape">
				<div class="block no-padding">
					<div data-velocity="-.1" style="background: url(../local/resources/views/images/empresa_gral.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
					<div class="container fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="inner-header">
									<h3>Bienvenido <?= session()->get("emp_nombre_empresa") != "" ? session()->get("emp_nombre_empresa") : session()->get("empresa") ?></h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section>
				<div class="block no-padding">
					<div class="container">
						<div class="row no-gape">
							
							<?php include("includes/aside_empresa.php") ?>
							<div class="col-lg-9 column">
								<div class="padding-left">
									<div class="manage-jobs-sec addscroll">
										<h3>Nueva plantilla de oferta</h3>
										<div class="profile-form-edit">
											<form id="form_plantilla" action="<?= url('administracion/empresas/plantillas') ?>" method="post">
												<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
												<div class="row">

													<?php if ($plantillas): ?>

														<div class="col-lg-12">
															<span class="pf-title">Plantillas predeterminadas</span>
															<div class="pf-field">
																<select data-placeholder="Por favor seleccione" class="chosen" id="plantilla" onchange="getInfoPlantilla(this.value)">
																	<option value="">Nueva plantilla</option>
																	<?php foreach ($plantillas as $plantilla): ?>
																	
																		<option value="<?= $plantilla->id ?>"><?= $plantilla->nombre_plantilla ?></option>
																	<?php endforeach; ?>
																	
																</select>
															</div>
														</div>

														<input type="hidden" name="id_plantilla" id="id_plantilla">


													<?php endif; ?>

													<input type="hidden" name="accion" id="accion" value="1">
													<input type="hidden" name="id_empresa" id="id_empresa" value="<?= session()->get('emp_ide') ?>">

													<div class="col-lg-6">
														<span class="pf-title">Titulo de la plantilla (*)</span>
														<div class="pf-field">
															<input type="text" placeholder="Ejm: Plantilla de Director de Ventas" name="nombre_plantilla" id="nombre_plantilla" value="" />
														</div>
													</div>

													<div class="col-lg-6">
														<span class="pf-title">Titulo de la oferta (*)</span>
														<div class="pf-field">
															<input type="text" placeholder="Titulo" name="titulo" id="titulo" value="" onkeyup="contador(this.value)" />
															<i id="contador">50</i>
														</div>
													</div>
													
													<div class="col-lg-12">
														<span class="pf-title">Descripción de la oferta *</span>
														<div class="pf-field">
															<textarea name="descripcion" id="descripcion"></textarea>
														</div>
													</div>
													<div class="col-lg-12">
														<button type="button" id="submiter">Guardar</button>
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
				<?php include("includes/modal_update_plan.php") ?>
			</section>
			<br>
			<?php include("includes/general_footer_empresas.php") ?>
		</div>
		
				<script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
				<script src="../local/resources/views/js/modernizr.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/script.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/wow.min.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/slick.min.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/parallax.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/select-chosen.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
				<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
				<script src="../local/resources/views/js/maps2.js" type="text/javascript"></script>
				<script src="../local/resources/views/plugins/notify.js" type="text/javascript"></script>
				<script type="text/javascript" src="../local/resources/views/plugins/tinymce/tinymce.min.js"></script>
				<script type="text/javascript" src="../local/resources/views/plugins/tinymce/skins/custom/jquery.tinymce.min.js"></script>
				<script src="../local/resources/views/plugins/datepicker_beta/dist/datepicker.min.js"></script>	
				<script src="../local/resources/views/plugins/datepicker_beta/dist/datepicker.es-ES.js"></script>	
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

						$('#submiter').on('click', function(){
							if ($('#titulo').val().length > 0 && $('#titulo').val().length <= 50) {
								$('#form_plantilla').submit();
							} else {
								$.notify("El titulo de la oferta solo puede contener 50 caracteres max.", {
									className:"error",
									globalPosition: "bottom center"
								});
							}
						});
					});

					function contador(value)
					{
						let tam = 50 - value.length;

						if (tam > 0) {
							$('#contador').text(tam).css('color', '#AEB2E7');;
						} else {
							$('#contador').text(tam).css('color', 'red');
						}
					}

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