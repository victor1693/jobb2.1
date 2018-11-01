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
		<link rel="stylesheet" type="text/css" href="http://www.dropzonejs.com/css/dropzone.css?v=1524508426" />
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
									<div class="profile-title" id="mp">
										<h3>Mi perfil</h3>
										<div class="upload-img-bar">
											<span><img src="<?= $imagen_perfil ?>" alt="Imagen de perfil" /></span>
											<div class="upload-info">
												<a href="javascript:void(0)" title="" data-toggle="modal" data-target="#upload_pic">Subir</a>
												<a href="javascript:void(0)" title="" data-toggle="modal" data-target="#usage_pic" id="change_pic">Cambiar Foto</a>
												<!-- <span>Max file size is 1MB, Minimum dimension: 270x210 And Suitable files are .jpg & .png</span> -->
											</div>
										</div>
									</div>
									<div class="profile-form-edit">
										<form id="form_datos_emp">
											<div class="row">
												<div class="col-lg-6">
													<span class="pf-title">Nombre de la empresa *</span>
													<div class="pf-field">
														<input type="text" placeholder="" value="<?= $empresa[0]->nombre ?>" name="nombre_empresa" id="nombre_empresa"/>
													</div>
												</div>
												<div class="col-lg-6">
													<span class="pf-title">Actividad de la empresa *</span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona la actividad" class="chosen" name="act_emp" id="act_emp">
															<option value="">Seleccionar</option>
															<?php foreach ($actividades as $act): ?>
															<?php $selected = $act->id == $empresa[0]->sector ? 'selected' : '' ?>
															<option value="<?= $act->id ?>" <?= $selected ?>><?= $act->nombre ?></option>
															<?php endforeach ?>
														</select>
													</div>
												</div>
												<div class="col-lg-4">
													<span class="pf-title">Nombre del responsable *</span>
													<div class="pf-field">
														<input type="text" placeholder="" value="<?= $empresa[0]->responsable ?>" name="nombre_resp" id="nombre_resp" />
													</div>
												</div>
												<div class="col-lg-4">
													<span class="pf-title">Correo Electronico *</span>
													<div class="pf-field">
														<input type="text" placeholder="" value="<?= $empresa[0]->correo ?>" name="correo" id="correo" />
													</div>
												</div>
												<div class="col-lg-4">
													<span class="pf-title">Razón Social *</span>
													<div class="pf-field">
														<input type="text" placeholder="" value="<?= $empresa[0]->razon_social ?>" name="razon_social" id="razon_social" />
													</div>
												</div>
												<div class="col-lg-4">
													<span class="pf-title">CUIT (Opcional)</span>
													<div class="pf-field">
														<input type="text" placeholder="" value="<?= $empresa[0]->cuit ?>" name="cuit" id="cuit" />
													</div>
												</div>
												<div class="col-lg-4">
													<span class="pf-title">Telefono *</span>
													<div class="pf-field">
														<input type="text" placeholder="" value="<?= $empresa[0]->telefono ?>" name="telefono" id="telefono" />
													</div>
												</div>
												<div class="col-lg-4">
													<span class="pf-title">País *</span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona el país" class="chosen" name="pais" id="pais">
															<option value="">Seleccionar</option>
															<?php foreach ($paises as $pais): ?>
															<?php $selected = $pais->id == $empresa[0]->pais ? 'selected' : '' ?>
															<option value="<?= $pais->id ?>" <?= $selected ?>><?= $pais->descripcion ?></option>
															<?php endforeach ?>
														</select>
													</div>
												</div>
												<div class="col-lg-6">
													<span class="pf-title">Provincia *</span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona la provincia" class="chosen" onchange="getLocalidad(this.value)" name="provincia" id="provincia">
															<option value="">Seleccionar</option>
															<?php foreach ($provincias as $prov): ?>
															<?php $selected = $prov->id == $empresa[0]->provincia ? 'selected' : '' ?>
															<option value="<?= $prov->id ?>" <?= $selected ?>><?= $prov->provincia ?></option>
															<?php endforeach ?>
														</select>
													</div>
												</div>
												<div class="col-lg-6">
													<span class="pf-title">Localidad *</span>
													<div class="pf-field">
														<select data-placeholder="Por favor selecciona la localidad" class="chosen" id="localidad" name="localidad">
															<option value="">Seleccionar</option>
															<?php foreach ($localidades as $localidad): ?>
															<?php $selected = $localidad->id == $empresa[0]->localidad ? 'selected' : '' ?>
															<option value="<?= $localidad->id ?>" <?= $selected ?>><?= $localidad->localidad ?></option>
															<?php endforeach ?>
														</select>
													</div>
												</div>
												<div class="col-lg-12">
													<span class="pf-title">Dirección *</span>
													<div class="pf-field">
														<input type="text" placeholder="" value="<?= $empresa[0]->direccion ?>" name="direccion" id="direccion" />
													</div>
												</div>
												<div class="col-lg-12">
													<span class="pf-title">Descripción de la empresa *</span>
													<div class="pf-field">
														<textarea name="descripcion_emp" id="descripcion_emp"><?= $empresa[0]->descripcion ?></textarea>
													</div>
												</div>
												<div class="col-lg-12">
													<button type="button" id="datos_empresa">Actualizar</button>
												</div>
											</div>
										</form>
									</div>

									<div class="social-edit"  id="sn">
										<h3>Contraseña</h3>
										<form id="form_contraseña">
											<div class="row">
												<div class="col-lg-4">
													<span class="pf-title">Contraseña Actual (*)</span>
													<div class="pf-field">
														<input type="password" placeholder="**********" name="pass_act" id="" value="" />
														<i class="fa fa-lock"></i>
													</div>
												</div>
												<div class="col-lg-4">
													<span class="pf-title">Nueva Contraseña (*)</span>
													<div class="pf-field">
														<input type="password" placeholder="**********" name="pass_new" id="pass_new" value="" />
														<i class="fa fa-lock"></i>
													</div>
												</div>
												<div class="col-lg-4">
													<span class="pf-title">Confirmar Nueva Contraseña (*)</span>
													<div class="pf-field">
														<input type="password" placeholder="**********" name="pass_new_conf" id="pass_new_conf" value="" />
														<i class="fa fa-lock"></i>
													</div>
												</div>
												
												<div class="col-lg-12">
													<button type="button" id="pass_emp">Actualizar</button>
												</div>
											</div>
										</form>
									</div>

									<div class="social-edit"  id="sn">
										<h3>Mis Redes Sociales</h3>
										<form id="form_redes_emp">
											<div class="row">
												<div class="col-lg-12">
													<span class="pf-title">Website</span>
													<div class="pf-field">
														<input type="text" placeholder="www.example.com" name="web" id="web" value="<?= $empresa[0]->web ?>" />
														<i class="la la-globe"></i>
													</div>
												</div>
												<div class="col-lg-6">
													<span class="pf-title">Facebook</span>
													<div class="pf-field">
														<input type="text" placeholder="www.facebook.com/TeraPlaner" name="fb" id="fb" value="<?= $empresa[0]->facebook ?>" />
														<i class="fa fa-facebook"></i>
													</div>
												</div>
												<div class="col-lg-6">
													<span class="pf-title">Twitter</span>
													<div class="pf-field">
														<input type="text" placeholder="www.twitter.com/TeraPlaner" name="tw" id="tw" value="<?= $empresa[0]->twitter ?>" />
														<i class="fa fa-twitter"></i>
													</div>
												</div>
												<div class="col-lg-6">
													<span class="pf-title">Instagram</span>
													<div class="pf-field">
														<input type="text" placeholder="www.instagram.com/TeraPlaner" name="ig" id="ig" value="<?= $empresa[0]->instagram ?>" />
														<i class="la la-instagram"></i>
													</div>
												</div>
												<div class="col-lg-6">
													<span class="pf-title">Linkedin</span>
													<div class="pf-field">
														<input type="text" placeholder="www.Linkedin.com/TeraPlaner" name="lnd" id="lnd" value="<?= $empresa[0]->linkedin ?>" />
														<i class="la la-linkedin"></i>
													</div>
												</div>
												<div class="col-lg-12">
													<button type="button" id="redes_emp">Actualizar</button>
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

				<div  id="upload_pic" class="modal" tabindex="-1" role="dialog">
				         <div class="modal-dialog" role="document">
				           <div class="modal-content">
				             <div class="modal-header">
				               <h5 class="modal-title">Subir Archivo(s)</h5>
				               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                 <span aria-hidden="true">&times;</span>
				               </button>
				             </div>
				             <div class="modal-body" style="padding-top: 0px;"> 
				               <div class="col-lg-12">
				                   <div id="dropzone" class="padding-left" style="margin-top: 20px;margin-bottom: 20px; border: 3px dashed blue">
				                      <form action="uploadImage" class="dropzone needsclick dz-clickable" id="demo-upload">
				                         <input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
				                         <div class="dz-message needsclick">
				                            Copiar archivos.
				                            <br>
				                            <span class="note needsclick">Puede arrastar los archivos al area selecionada.
				                         </div>
				                       </form>
				                    </div>       
				               </div>
				             </div>
				             <div class="modal-footer">
				               <button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal">Salir</button>
				             </div>
				           </div>
				         </div>
				</div>

				<div id="usage_pic" class="modal" tabindex="-1" role="dialog">
			         <div class="modal-dialog" role="document">
			           <div class="modal-content">
			             <div class="modal-header">
			               <h5 class="modal-title">Seleccionar Foto</h5>
			               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                 <span aria-hidden="true">&times;</span>
			               </button>
			             </div>
			             <div class="modal-body" style="padding: 10px;"> 
			               <div class="img_profile_empresa">
			               	<p style="text-align: center;"><b><em>Cargando...</em></b></p>
			               </div>
			             </div>
			             <div class="modal-footer">
			               <button type="button" class="btn btn-xs btn-primary" id="changePic">Usar Foto</button>
			               <button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal">Salir</button>
			             </div>
			           </div>
			         </div>
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
				<script src="../local/resources/views/plugins/dropzone.js" type="text/javascript"></script>
				<script>
					var bandera = '';
					var idImg = '';
					$(document).ready(function() {
						$('#datos_empresa').on('click', function(e){
							e.preventDefault();
							bandera = true;
							var validar_datos = $('#form_datos_emp').serializeArray();
							var datos = $('#form_datos_emp').serialize();
							var $btn = $(this);
							validar_datos.forEach(function(d){ // valida todos los datos del campo
								if (d.name != 'cuit') { // campo opcional
									if (d.value == "") {
										bandera = false;
									}
								}
								
							});

							var regex_num = /^\d+$/g;
							var regex_tlf = /^([0-9\-\+]{7,15})+$/g;
							var regex_dir= /^[\D][\w\s\/\-]+$/g;

							if (!regex_num.test($('#cuit').val())) {
								$.notify("Escriba un cuit valido.", {
								className:"error",
								globalPosition: "bottom center"
								});
								return 0;
							} else if (!regex_tlf.test($('#telefono').val())) {
								$.notify("Escriba un telefono valido.", {
								className:"error",
								globalPosition: "bottom center"
								});
								return 0;
							} else if (!regex_dir.test($('#direccion').val())) {
								$.notify("Escriba una dirección valida.", {
								className:"error",
								globalPosition: "bottom center"
								});
								return 0;
							}

							if (bandera) {
								$.ajaxSetup({
								headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								}
								});
								$.ajax({
									url: 'actualizar_profile',
									type: 'POST',
									dataType: 'json',
									data: datos+"&op=1",
									beforeSend: function(){
										$btn.text("Actualizando...").prop("disabled", true);
									},
									success: function(response){
										if (response.status == 1) {
											$.notify("Datos actualizados satisfactoriamente.", {
											className:"success",
											globalPosition: "bottom center"
											});
								
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
								$.notify("Debes completar todos los campos obligatorios.", {
								className:"error",
								globalPosition: "bottom center"
								});
							}
				
						});

						$('#pass_emp').on('click', function(e){

							e.preventDefault();
							var validar_datos = $('#form_contraseña').serializeArray();
							var datos = $('#form_contraseña').serialize();
							var bandera = true;
							var $btn = $(this);

							validar_datos.forEach(function(d){ // valida todos los datos del campo
									if (d.value == "") {
										bandera = false;
									}
								
							});

							if (bandera) {
								if ($('#pass_new').val() == $('#pass_new_conf').val()) {

									if ($('#pass_new').val().length >= 8 && $('#pass_new').val().length <= 12) {
										$.ajaxSetup({
											headers: {
											'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
											}
										});
										$.ajax({
											url: 'actualizar_profile',
											type: 'POST',
											dataType: 'json',
											data: datos+"&op=4",
											beforeSend: function(){
												$btn.text("Actualizando...").prop("disabled", true);
											},
											success: function(response){
												if (response.status == 1) {
													$.notify("Contraseña actualizada satisfactoriamente.", {
													className:"success",
													globalPosition: "bottom center"
													});

													$('#form_contraseña')[0].reset();
										
												} else if (response.status == 2) {
													$.notify("La contraseña actual no coincide con la que está registrada en el sistema.", {
													className:"error",
													globalPosition: "bottom center"
													});
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
										$.notify("Las contraseñas deben contener entre 8 y 12 caracteres.", {
										className:"error",
										globalPosition: "bottom center"
										});
									}
									
								} else {
									$.notify("Las contraseñas no coinciden, intentelo de nuevo.", {
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

						$('#redes_emp').on('click', function(){
							const reg_fb = /^(https:\/\/((www.facebook)|(facebook)).com\/)[A-Za-z0-9.\-\_]+(\/)?$/;
							const reg_tw = /^(https:\/\/((www.twitter)|(twitter)).com\/)[A-Za-z0-9.\-\_]+(\/)?$/;
							const reg_ig = /^(https:\/\/((www.instagram)|(instagram)).com\/)[A-Za-z0-9.\-\_]+(\/)?$/;
							const reg_web = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \?=.-]*)*\/?$/;
							const reg_lkd = /^(https:\/\/((www.linkedin)|(linkedin)).com\/in\/)[A-Za-z0-9.\-\_\/]+(\/)?$/;

							var band = true;
							var web = $('#web').val();
							var fb = $('#fb').val();
							var tw = $('#tw').val();
							var ig = $('#ig').val();
							var lnd = $('#lnd').val();
							var datos = $('#form_redes_emp').serialize();
							var $btn = $(this);

							if (web != "" || fb != "" || tw != "" || ig != "" || lnd != "") {
								if (web != ""){
									if (!reg_web.test(web)) {
										$.notify("La Url del sitio web es invalido. Si no posees pagina web deja el campo en blanco.", {
										className:"error",
										globalPosition: "bottom center"
										});
										band = false;
									}
								}
								if (fb != "") {
									if (!reg_fb.test(fb)) {
										$.notify("El formato del link de Facebook es invalido. Si no posees Facebook deja el campo en blanco.", {
										className:"error",
										globalPosition: "bottom center"
										});
										band = false;
									}
								}
								if (tw != "") {
									if (!reg_tw.test(tw)) {
										$.notify("El formato del link de Twitter es invalido. Si no posees Facebook deja el campo en blanco.", {
										className:"error",
										globalPosition: "bottom center"
										});
										band = false;
									}
								}
								if (ig != "") {
									if (!reg_ig.test(ig)) {
										$.notify("El formato del link de Instagram es invalido. Si no posees Facebook deja el campo en blanco.", {
										className:"error",
										globalPosition: "bottom center"
										});
										band = false;
									}
								}
								if (lnd != "") {
									if (!reg_lkd.test(lnd)) {
										$.notify("El formato del link de Linkedin es invalido. Si no posees Facebook deja el campo en blanco.", {
										className:"error",
										globalPosition: "bottom center"
										});
										band = false;
									}
								}
								if (band) {
										$.ajaxSetup({
											headers: {
											'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
											}
										});
										$.ajax({
											url: 'actualizar_profile',
											type: 'POST',
											dataType: 'json',
											data: datos+"&op=2",
											beforeSend: function(){
												$btn.text("Actualizando...").prop("disabled", true);
											},
											success: function(response){
												if (response.status == 1) {
													$.notify("Redes sociales actualizadas satisfactoriamente.", {
													className:"success",
													globalPosition: "bottom center"
													});
										
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
								}
								
							} else {
								$.notify("No hay redes sociales para actualizar.", {
								className:"error",
								globalPosition: "bottom center"
								});
							}
						});

						

						$('#change_pic').on('click', function(){
							$.ajaxSetup({
								headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								}
							});
							$.ajax({
								url: '../listar_arch',
								type: 'POST',
								dataType: 'json',
								success: function(response){
									let html = '';

									if (response.length > 0) {
										response.forEach(function(data){
											html += '<div class="preview_img select_img" data-img="'+data.id+'" onclick="selectImg(this)"><div class="img_detail"><img src="../uploads/'+data.nombre_aleatorio+'" alt="Imagenes de perfil"></div></div>';
										});

										$('.img_profile_empresa').html(html);
									} else {
										$('.img_profile_empresa').html('<p style="text-align: center"><b><em>No tienes imagenes asociadas...</em></b></p>');
									}

									
								},
								error: function(error){
									$('.img_profile_empresa').html('<p style="text-align: center"><b><em>Error al cargar las imagenes...</em></b></p>');
									console.dir(error);
								}
							});
							
						});

						$('#changePic').on('click', function(){

							if (idImg != '') {
								$.ajaxSetup({
									headers: {
									'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
									}
								});
								$.ajax({
									url: 'actualizar_profile',
									type: 'POST',
									data: {
										op: 3,
										id_imagen: idImg
									},
									dataType: 'json',
									success: function(response){
										
										if (response.status == 1) {
											$.notify("Foto de perfil actualizada satisfactoriamente.", {
												className:"success",
												globalPosition: "bottom center"
											});
											setTimeout(function(){
												window.location.reload();
											}, 2000);

											idImg = '';
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
									}
								});
							} else {
								$.notify("Debes seleccionar una imagen para actualizar.", {
								className:"warning",
								globalPosition: "bottom center"
								});
							}
							
						});


					});
					function getLocalidad(id_provincia){
						if (id_provincia != 0) {
							$.ajax({
								url: '../localidades/'+id_provincia,
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

					function selectImg(img){
						$('.select_img').removeClass('img_active');
						$(img).addClass('img_active');
						idImg = $(img).attr('data-img');
						console.log("ID IMG:", idImg);
					}
				</script>
			</body>
		</html>