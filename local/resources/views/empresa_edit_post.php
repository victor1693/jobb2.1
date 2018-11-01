<?php  
 	$description = preg_replace("/[\r\n|\n|\r]+/", " ", $oferta[0]->descripcion); 
?>
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
		<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../local/resources/views/css/icons.css">
		<link rel="stylesheet" href="../../local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link  href="../../local/resources/views/plugins/datepicker_beta/dist/datepicker.min.css" rel="stylesheet">
		<?php include('local/resources/views/includes/chat_soporte.php');?>
		<?php include('local/resources/views/includes/google_analitycs.php');?>
		
	</head>
	<body>
		<div class="theme-layout" id="scrollup">

			<?php $atras = 1 ?>
			
			<?php include("includes/header_responsive_empresa.php") ?>
			
			<?php include "includes/header_empresa.php" ?>
			<section class="overlape">
				<div class="block no-padding">
					<div data-velocity="-.1" style="background: url(../../local/resources/views/images/empresa_gral.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
					<div class="container fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="inner-header">
									<h3>Bienvenido <?= session()->get("emp_nombre_empresa") ?></h3>
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
										<h3>Editar oferta de trabajo</h3>
										<div class="steps-sec">
											<div class="step active" id="step1">
												<p><i class="la la-info"></i></p>
												<span>Información</span>
											</div>
											
											<div class="step" id="step2">
												<p><i class="la  la-check-circle"></i></p>
												<span>Listo</span>
											</div>
										</div>
									</div>
									<div class="profile-form-edit" style="margin-bottom: 20px">
										<form id="form_oferta">
											<div class="row">
												<input type="hidden" name="id_post" value="<?= $oferta[0]->id ?>">

												<?php if ($plantillas): ?>

													<div class="col-lg-12">
														<span class="pf-title">Plantillas predeterminadas</span>
														<div class="pf-field">
															<select data-placeholder="Por favor seleccione" class="chosen" id="plantilla" onchange="getInfoPlantilla(this.value)">
																<option value="">Publicar sin plantillas</option>
																<?php foreach ($plantillas as $plantilla): ?>
																
																	<option value="<?= $plantilla->id ?>"><?= $plantilla->nombre_plantilla ?></option>
																<?php endforeach; ?>
																
															</select>
														</div>
													</div>

												<?php endif; ?>

												<div class="col-lg-12">
													<span class="pf-title">Titulo de la oferta <b>*</b></span>
													<div class="pf-field">
														<input type="text" placeholder="Designer" name="titulo" id="titulo" value="<?= $oferta[0]->titulo ?>" autocomplete="no" onkeyup="contador(this.value)" />
													<i id="contador">50</i>
													</div>
												</div>
												<div class="col-lg-12">
													<span class="pf-title">Descripción <b>*</b></span>
													<div class="pf-field">
														<textarea placeholder="Descripcion de la oferta" name="descripcion" id="descripcion"><?= $oferta[0]->descripcion ?></textarea>
													</div>
												</div>
												
												<div class="col-lg-6">
													<span class="pf-title">Área <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona el área" class="chosen" id="area" name="area" onchange="getSector(this.value)">
															<option value="0">Seleccionar</option>
															<?php foreach ($areas as $area): ?>
																<?php $selected = $area->id == $oferta[0]->id_area ? 'selected' : '' ?>
															<option value="<?= $area->id ?>" <?= $selected ?>><?= $area->area ?></option>
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
																<?php $selected = $sector->id == $oferta[0]->id_sector ? 'selected' : '' ?>
															<option value="<?= $sector->id ?>" <?= $selected ?>><?= $sector->nombre ?></option>
															<?php endforeach ?>
														</select>
													</div>
												</div>
												<div class="col-lg-6">
													<span class="pf-title">Provincia <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona la provincia" class="chosen" id="provincia" onchange="getLocalidad(this.value)" name="provincia">
															<option value="0">Seleccionar</option>
															<?php foreach ($provincias as $prov): ?>
																<?php $selected = $prov->id == $oferta[0]->id_provincia ? 'selected' : '' ?>
															<option value="<?= $prov->id ?>" <?= $selected ?>><?= $prov->provincia ?></option>
															<?php endforeach ?>
															
														</select>
													</div>
												</div>
												<div class="col-lg-6">
													<span class="pf-title">Localidad <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona la localidad" class="chosen" id="localidad" name="localidad">
															<option>Seleccionar</option>
															<?php foreach ($localidades as $localidad): ?>
																<?php $selected = $localidad->id == $oferta[0]->id_localidad ? 'selected' : '' ?>
															<option value="<?= $localidad->id ?>" <?= $selected ?>><?= $localidad->localidad ?></option>
															<?php endforeach ?>
														</select>
													</div>
												</div>
												<div class="col-lg-12">
													<span class="pf-title">Dirección</span>
													<div class="pf-field">
														<input type="text" placeholder="Dirección de la oferta laboral" name="direccion" id="direccion" value="<?= $oferta[0]->direccion ?>" />
													</div>
												</div>
												<div class="col-lg-3">
													<span class="pf-title">Salario por ofrecer <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona el tipo de salario" class="chosen" id="salario" name="salario">
															<option value="0">Seleccionar</option>
															<?php foreach ($salarios as $salario): ?>
																<?php $selected = $salario->id == $oferta[0]->id_salario ? 'selected' : '' ?>
															<option value="<?= $salario->id ?>" <?= $selected ?>><?= $salario->salario ?></option>
															<?php endforeach ?>
														</select>
													</div>
												</div>
												<div class="col-lg-3">
													<span class="pf-title">Solicitar salario pretendido <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona el tipo de salario" class="chosen" id="salario_usuario" name="salario_usuario">
															<option value="0">Seleccionar</option>
															<option value="SI" <?= $oferta[0]->salario_usuario == 'SI' ? 'selected' : '' ?>>SÍ</option>
															<option value="NO" <?= $oferta[0]->salario_usuario == 'NO' ? 'selected' : '' ?>>NO</option>
														</select>
													</div>
												</div>
												<div class="col-lg-3">
													<span class="pf-title">Planes de estado</span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona el plan del estado" class="chosen" id="plan" name="plan">
															<option value="">Sin plan de estado</option>
															<?php foreach ($planes as $plan): ?>
																<?php $selected = $plan->id == $oferta[0]->id_plan_estado ? 'selected' : '' ?>
															<option value="<?= $plan->id ?>" <?= $selected ?>><?= $plan->plan ?></option>
															<?php endforeach ?>
														</select>
													</div>
												</div>
												<div class="col-lg-3">
													<span class="pf-title">Disponibilidad <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor la disponibilidad" class="chosen" id="disp" name="disp">
															<option value="0">Seleccionar</option>
															<?php foreach ($disponibilidades as $disp): ?>
																<?php $selected = $disp->id == $oferta[0]->id_disponibilidad ? 'selected' : '' ?>
															<option value="<?= $disp->id ?>" <?= $selected ?>><?= ucwords(strtolower($disp->nombre)); ?></option>
															<?php endforeach ?>
														</select>
													</div>
												</div>
												<div class="col-lg-4">
													<span class="pf-title">Candidatos con discapacidad <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor seleccione" class="chosen" id="discapacidad" name="discapacidad">
															<option value="">Seleccionar</option>
															<option value="1" <?= $oferta[0]->discapacidad == 'SI' ? 'selected' : '' ?>>SÍ</option>
															<option value="2" <?= $oferta[0]->discapacidad == 'NO' ? 'selected' : '' ?>>NO</option>
														</select>
													</div>
												</div>
												<div class="col-lg-4">
													<span class="pf-title">Oferta confidencial <b>*</b></span>
													<div class="pf-field">
														<select data-placeholder="Por favor seleccione" class="chosen" id="confidencial" name="confidencial">
															<option value="">Seleccionar</option>
															<option value="1" <?= $oferta[0]->confidencial == 'SI' ? 'selected' : '' ?>>SÍ</option>
															<option value="2" <?= $oferta[0]->confidencial == 'NO' ? 'selected' : '' ?>>NO</option>
														</select>
													</div>
												</div>
												<div class="col-lg-4">
													<span class="pf-title">Fecha de expiracion de la oferta <b>*</b></span>
													<div class="pf-field">
														<input type="text" onkeypress="anularEvent(event)" placeholder="Fecha de expiracion" name="fecha_exp" id="fecha_exp" value="<?= $oferta[0]->fecha_exp ?>" />
													</div>
												</div>
												<div class="col-lg-12">
													<span class="pf-title">Agregar video</span>
													<div class="pf-field">
														<input type="text" placeholder="Link/Url Youtube (Opcional)" id="video" name="video" value='<?= $oferta[0]->video_youtube ?>' />
													</div>
												</div>
												<div class="col-lg-12">
													<button type="button" id="post">Actualizar</button>
												</div>
												
											</div>
										</form>
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
		
				<script src="../../local/resources/views/js/jquery.min.js" type="text/javascript"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
				<script src="../../local/resources/views/js/modernizr.js" type="text/javascript"></script>
				<script src="../../local/resources/views/js/script.js" type="text/javascript"></script>
				<script src="../../local/resources/views/js/wow.min.js" type="text/javascript"></script>
				<script src="../../local/resources/views/js/slick.min.js" type="text/javascript"></script>
				<script src="../../local/resources/views/js/parallax.js" type="text/javascript"></script>
				<script src="../../local/resources/views/js/select-chosen.js" type="text/javascript"></script>
				<script src="../../local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
				<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
				<script src="../../local/resources/views/js/maps2.js" type="text/javascript"></script>
				<script src="../../local/resources/views/plugins/notify.js" type="text/javascript"></script>
				<script type="text/javascript" src="../../local/resources/views/plugins/tinymce/tinymce.min.js"></script>
				<script type="text/javascript" src="../../local/resources/views/plugins/tinymce/skins/custom/jquery.tinymce.min.js"></script>
				<script src="../../local/resources/views/plugins/datepicker_beta/dist/datepicker.min.js"></script>	
				<script src="../../local/resources/views/plugins/datepicker_beta/dist/datepicker.es-ES.js"></script>

				<script>
					var calendario = new Date();
					var dia = calendario.getDate()+1,
						mes = calendario.getMonth() + 1,
						anio = calendario.getFullYear();
					var desc = '<?= $description ?>';

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

						$('#fecha_exp').datepicker({
						  autoHide: true,
						  zIndex: 2048,
						  language: 'es-ES',
						  startDate: dia+'/'+mes+'/'+anio,
						  endDate: "<?= session()->get('emp_plan_venc') ?>"
						});
						
						$('#post').on('click', function(){
							var titulo = $('#titulo').val();
							var descripcion = tinymce.get('descripcion').getContent();
							var area = $('#area').val();
							var sector = $('#sector').val();
							var provincia = $('#provincia').val();
							var localidad = $('#localidad').val();
							var salario = $('#salario').val();
							var salario_usuario = $('#salario_usuario').val();
							var plan = $('#plan').val();
							var disp = $('#disp').val();
							var discapacidad = $('#discapacidad').val();
							var confidencial = $('#confidencial').val();
							var fecha_exp = $('#fecha_exp').val();

							var $btn = $(this);

							if (titulo != "" && descripcion != "" && area != 0 && sector != 0 && provincia != 0 && localidad != 0 && salario != 0 && salario_usuario != 0 && disp != 0 && discapacidad != "" && confidencial != "" && fecha_exp != "") {

								if (titulo.length > 0 && titulo.length <= 50) {
									var datos = $('#form_oferta').serialize();
									
									$.ajaxSetup({
										headers: {
										'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
										}
									});
									$.ajax({
										url: '../actualizar_post',
										type: 'POST',
										dataType: 'json',
										data: datos+'&description='+descripcion,
										beforeSend: function(){
											$btn.text("Actualizando...").prop("disabled", true);
										},
										success: function(response){
											if (response.status == 1) {
												$.notify("Oferta publicada satisfactoriamente.", {
													className:"success",
													globalPosition: "bottom center"
												});
												$('#step1').removeClass('active');
												$('#step2').addClass('active');
												$('#form_oferta')[0].reset();
												setTimeout(function(){
													window.location.assign("ofertas")
												}, 3000);
											} else {
												$.notify("Lo sentimos, ha ocurrido un error inesperado. Por favor recarge la pagina nuevamente.", {
													className:"error",
													globalPosition: "bottom center"
												});
											}
											
										},
										error: function(error){
											$.notify("Lo sentimos, ha ocurrido un error inesperado. Por favor recarge la pagina nuevamente.", {
													className:"error",
													globalPosition: "bottom center"
											});
										},
										complete: function(){
											$btn.text("Actualizar").prop("disabled", false);
										}
									});
								} else {
									$.notify("El titulo debe contener 50 caracteres max.", {
										className:"error",
										globalPosition: "bottom center"
									});
								}

								
							} else {
								$.notify("Debes completar todos los campos obligatorios.", {
									className:"error",
									globalPosition: "bottom center"
								});
							}
				
						});
					});

					<?php if (isset($oferta)): ?>
						/*console.log(tinymce)
						$('#descripcion').html('asndkansdkaskd')
						tinymce.get('descripcion').setContent("asdbiuasndk");*/
						$( window ).load(function(){         
						  tinymce.activeEditor.setContent(desc);
						});

					<?php endif; ?>

					function getSector(id_area){
						if (id_area != 0) {
							$.ajax({
								url: '../../sectores/'+id_area,
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
								url: '../../localidades/'+id_provincia,
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
										alert("Error al cargar las localidades");
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

					function getInfoPlantilla(id)
					{
						if (id != "") {
							$.ajax({
								url: '<?= url("administracion/empresas/plantilla_info") ?>/'+id,
								type: 'GET',
								dataType: 'json',
								success: function (response) {
									$('#titulo').val(response.plantilla.titulo_oferta);
									tinymce.activeEditor.setContent(response.plantilla.descripcion_oferta);
								},
								error: function (error) {
									console.dir(error);
								}
							});
							
						} else {
							$('#titulo').val('<?= $oferta[0]->titulo ?>');
							tinymce.activeEditor.setContent('<?= $oferta[0]->descripcion ?>');
						}
					}

					function contador(value)
					{
						let tam = 50 - value.length;

						if (tam > 0) {
							$('#contador').text(tam).css('color', '#AEB2E7');;
						} else {
							$('#contador').text(tam).css('color', 'red');
						}
					}

					function anularEvent(e)
					{
						e.preventDefault();
					}
				</script>
			</body>
		</html>