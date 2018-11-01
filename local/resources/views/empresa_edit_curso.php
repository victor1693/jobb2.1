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
		<link rel="stylesheet" type="text/css" href="../../../local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="../../../local/resources/views/css/icons.css">
		<link rel="stylesheet" href="../../../local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="../../../local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../../../local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="../../../local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="../../../local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link  href="../../../local/resources/views/plugins/datepicker_beta/dist/datepicker.min.css" rel="stylesheet">
		<?php include('local/resources/views/includes/chat_soporte.php');?>
		<?php include('local/resources/views/includes/google_analitycs.php');?>
	</head>
	<body>
		<div class="theme-layout" id="scrollup">
			
			<?php include("includes/header_responsive_empresa.php") ?>
			
			<?php include "includes/header_empresa.php" ?>
			<section class="overlape">
				<div class="block no-padding">
					<div data-velocity="-.1" style="background: url(<?= asset('local/resources/views/images/empresa_gral.jpg') ?>) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
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
									<div class="profile-title">
										<h3>Editar curso</h3>
									</div>
									<div class="profile-form-edit" style="margin-bottom: 20px">
										<form id="form_cursos" action="<?= url('empresa/editCurso') ?>" method="post">
											<?= csrf_field() ?>
											<input type="hidden" name="id_publicacion" value="<?= $curso->id_publicacion ?>">

											<div class="row">

												<div class="col-lg-12">
													<span class="pf-title">Titulo del curso <b>*</b></span>
													<div class="pf-field">
														<input type="text" placeholder="Titulo" name="titulo" id="titulo" value="<?= $curso->titulo ?>" />
													</div>
												</div>
												<div class="col-lg-12">
													<span class="pf-title">Descripción del curso <b>*</b></span>
													<div class="pf-field">
														<textarea placeholder="Descripcion de la oferta" name="descripcion" id="descripcion" value="" ></textarea>
													</div>
												</div>
												
												<div class="col-lg-6">
													<span class="pf-title">Modalidad <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona el área" class="chosen" id="modalidad" name="modalidad">
															<option value="">Seleccionar</option>
															<option value="1" <?= $curso->id_modalidad_curso == 1 ? 'selected' : '' ?>>Online</option>
															<option value="2" <?= $curso->id_modalidad_curso == 2 ? 'selected' : '' ?>>Presencial</option>
														</select>
													</div>
												</div>
												<div class="col-lg-3">
													<span class="pf-title">Duración <b>*</b></span>
													<div class="pf-field">
														<input type="number" id="duracion" name="duracion" placeholder="" min="1" value="<?= $curso->duracion ?>" >
													</div>
												</div>
												<div class="col-lg-3">
													<span class="pf-title">&nbsp;</span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona el área" class="chosen" id="modalidad_duracion" name="modalidad_duracion" onchange="">
															<option value="1" <?= $curso->id_modalidad_duracion == 1 ? 'selected' : '' ?>>Horas</option>
															<option value="2" <?= $curso->id_modalidad_duracion == 2 ? 'selected' : '' ?>>Días</option>
															<option value="3" <?= $curso->id_modalidad_duracion == 3 ? 'selected' : '' ?>>Meses</option>
															<option value="4" <?= $curso->id_modalidad_duracion == 4 ? 'selected' : '' ?>>Semestres</option>
														</select>
													</div>
												</div>

												<div class="col-lg-6">
													<span class="pf-title">Área <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona el área" class="chosen" id="area" name="area" onchange="getSector(this.value)">
															<option value="0">Seleccionar</option>
															<?php foreach ($areas as $area): ?>
															<?php $selected = $area->id == $curso->id_area ? 'selected' : '' ?>
															<option value="<?= $area->id ?>" <?= $selected ?>><?= $area->nombre ?></option>
															<?php endforeach ?>
														</select>
													</div>
												</div>
												<div class="col-lg-6">
													<span class="pf-title">Sector <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona el sector" class="chosen" id="sector" name="sector">
															<option>Seleccionar</option>
															<?php foreach ($sectores as $sector): ?>
																<?php $selected = $sector->id == $curso->id_sector ? 'selected' : '' ?>
																<option value="<?= $sector->id ?>" <?= $selected ?>><?= $sector->nombre ?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>

												<div class="col-lg-6">
													<span class="pf-title">Precio del curso <b>*</b></span>
													<div class="pf-field">
														<input type="number" placeholder="Precio" name="precio" id="precio" min="0" value="<?= $curso->precio ?>" />
													</div>
												</div>
												<div class="col-lg-6">
													<span class="pf-title">Fecha de expiracion de la oferta <b>*</b></span>
													<div class="pf-field">
														<?php $fecha_exp = date('d/m/Y', strtotime($curso->fecha_venc)) ?>
														<input type="text" onkeypress="anularEvent(event)" placeholder="Fecha de expiracion" name="fecha_exp" id="fecha_exp" value="<?= $fecha_exp ?>" />
													</div>
												</div>

												
												<div class="col-lg-6 ubicacion" style="display: none">
													<span class="pf-title">Provincia <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona la provincia" class="chosen" id="provincia" onchange="getLocalidad(this.value)" name="provincia">
															<option value="">Seleccionar</option>
															<?php foreach ($provincias as $prov): ?>
																<?php $selected = $prov->id == $curso->id_provincia ? 'selected' : '' ?>
															<option value="<?= $prov->id ?>" <?= $selected ?>><?= $prov->provincia ?></option>
															<?php endforeach ?>
															
														</select>
													</div>
												</div>
												<div class="col-lg-6 ubicacion" style="display: none">
													<span class="pf-title">Localidad <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona la localidad" class="chosen" id="localidad" name="localidad">
															<option>Seleccionar</option>
															<?php foreach ($localidades as $loc): ?>
																<?php $selected = $loc->id == $curso->id_localidad ? 'selected' : '' ?>
															<option value="<?= $loc->id ?>" <?= $selected ?>><?= $loc->localidad ?></option>
															<?php endforeach ?>
														</select>
													</div>
												</div>
												
												<div class="col-lg-12">
													<button type="button" id="send">Actualizar</button>
												</div>
												
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<br>
			<?php include("includes/general_footer_empresas.php") ?>
		</div>
		
				<script src="../../../local/resources/views/js/jquery.min.js" type="text/javascript"></script>
				<script src="../../../local/resources/views/js/modernizr.js" type="text/javascript"></script>
				<script src="../../../local/resources/views/js/script.js" type="text/javascript"></script>
				<script src="../../../local/resources/views/js/wow.min.js" type="text/javascript"></script>
				<script src="../../../local/resources/views/js/slick.min.js" type="text/javascript"></script>
				<script src="../../../local/resources/views/js/parallax.js" type="text/javascript"></script>
				<script src="../../../local/resources/views/js/select-chosen.js" type="text/javascript"></script>
				<script src="../../../local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
				<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
				<script src="../../../local/resources/views/js/maps2.js" type="text/javascript"></script>
				<script src="../../../local/resources/views/plugins/notify.js" type="text/javascript"></script>
				<script type="text/javascript" src="../../../local/resources/views/plugins/tinymce/tinymce.min.js"></script>
				<script type="text/javascript" src="../../../local/resources/views/plugins/tinymce/skins/custom/jquery.tinymce.min.js"></script>
				<script src="../../../local/resources/views/plugins/datepicker_beta/dist/datepicker.min.js"></script>	
				<script src="../../../local/resources/views/plugins/datepicker_beta/dist/datepicker.es-ES.js"></script>	
				<script>
					var calendario = new Date();
					var dia = calendario.getDate()+1,
						mes = calendario.getMonth() + 1,
						anio = calendario.getFullYear();

					<?php if (isset($curso)): ?>
						/*console.log(tinymce)
						$('#descripcion').html('asndkansdkaskd')
						tinymce.get('descripcion').setContent("asdbiuasndk");*/
						$( window ).load(function(){         
						  tinymce.activeEditor.setContent('<?= $curso->descripcion ?>');
						});

					<?php endif; ?>


					$(document).ready(function() {

						<?php if ($curso->id_modalidad_curso == 2): ?>

							$('.ubicacion').show();

						<?php endif; ?>

						<?php if (count($errors)>0): ?>

							<?php foreach ($errors as $error): ?>

							$.notify("<?= $error ?>", {
								className:"error",
								globalPosition: "bottom center"
							});

							<?php endforeach; ?>

						<?php endif; ?>

						<?php if (isset($_REQUEST['r']) && $_REQUEST['r'] == 1): ?>

							$.notify("Se ha editado el curso satisfactoriamente.", {
								className:"success",
								globalPosition: "bottom center"
							});

						<?php endif; ?>

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

						$('#send').on('click', function(){
							$('#form_cursos').submit();
						});

						$('#modalidad').on('change', function(){
							if ($(this).val() == 2) {
								$('.ubicacion').slideDown();
							} else {
								$('#provincia').val("").trigger('chosen:updated');
								$('#localidad').val("").trigger('chosen:updated');
								$('.ubicacion').slideUp();
							}
						});

						$('#fecha_exp').datepicker({
						  autoHide: true,
						  zIndex: 2048,
						  language: 'es-ES',
						  startDate: dia+'/'+mes+'/'+anio,
						  endDate: "<?= session()->get('emp_plan_venc') ?>"
						});

						
					});
					function getSector(id_area){
						if (id_area != 0) {
							$.ajax({
								url: '<?= url("sectores") ?>/'+id_area,
								type: 'GET',
								dataType: 'json',
								beforeSend: function(){
									$('#sector').html('<option value="">Cargando...</option>').prop('disabled', true).trigger('chosen:updated');
								},
								success: function(response){
									if (response.status == 1) {
										let html = '<option value="0">Seleccionar</option>';
										response.sectores.forEach(function(sector){
											html += '<option value="'+sector.id+'">'+sector.nombre+'</option>';
										});
										$('#sector').html(html).trigger('chosen:updated');
									} else {
										alert("Error al cargar los sectores");
									}
								},
								error: function(){
									alert("Lo sentimos, ha ocurrido un error inesperado. Por favor recargue la pagina");
									$('#sector').html('<option value="0">Seleccionar</option>').trigger('chosen:updated');
								},
								complete: function(){
									$('#sector').prop('disabled', false).trigger('chosen:updated');
								}
							});
						} else {
							$('#sector').html('<option value="0">Seleccionar</option>').trigger('chosen:updated');
						}
						
					}
					function getLocalidad(id_provincia){
						if (id_provincia != 0) {
							$.ajax({
								url: '<?= url("localidades") ?>/'+id_provincia,
								type: 'GET',
								dataType: 'json',
								beforeSend: function(){
									$('#localidad').html('<option value="">Cargando...</option>').prop('disabled', true).trigger('chosen:updated');
								},
								success: function(response){
									if (response.status == 1) {
										let html = '<option value="0">Seleccionar</option>';
										response.localidades.forEach(function(localidad){
											html += '<option value="'+localidad.id+'">'+localidad.localidad+'</option>';
										});
										$('#localidad').html(html).trigger('chosen:updated');
									} else {
										$.notify("Error al cargar las localidades", {
											className:"error",
											globalPosition: "bottom center"
										});
									}
								},
								error: function(){
									alert("Lo sentimos, ha ocurrido un error inesperado. Por favor recargue la pagina");
									$('#localidad').html('<option value="0">Seleccionar</option>').trigger('chosen:updated');
								},
								complete: function(){
									$('#localidad').prop('disabled', false).trigger('chosen:updated');
								}
							});
						} else {
							$('#localidad').html('<option value="0">Seleccionar</option>').trigger('chosen:updated');
						}
					}

					function anularEvent(e)
					{
						e.preventDefault();
					}
				</script>
			</body>
		</html>