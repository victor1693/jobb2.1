<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Jobbers Argentina</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="CreativeLayers">
		<meta name="csrf-token" content="<?php echo csrf_token(); ?>">
		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="../local/resources/views/css/icons.css">
		<link rel="stylesheet" href="../local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/local/resources/views/css/font-awesome.min.css" />
		<?php include('local/resources/views/includes/google_analitycs.php');?>
		<?php include("local/resources/views/includes/chat_soporte.php");?> 
	</head>
	<style>
		.box-btn {
			margin-top: 5px !important;
			margin-bottom: 5px !important;
			padding: 5px !important;
		}
	</style>
	<body style="background-image: url('../local/resources/views/images/145.jpg'); background-size: cover;background-position: center; height: 100vh">
		<div class="theme-layout" id="scrollup">
			
			<section>
				<div class="block remove-bottom">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div id="step1" class="back-cont">
									
									<div class="account-popup-area signin-popup-box static" style="padding: 20px;">
										<div class="account-popup">
											<div class="text-center">
												<img src="../local/resources/views/images/logo_d.png" style="width: 200px;">
											</div>
											<span>Bienvenido! Registre sus datos como empresa</span>
											<form style="padding: 10px;">
												<div class="cfield">
													<input type="text" placeholder="Usuario (*)" id="user" />
													<i class="la la-user"></i>
												</div>
												<div class="cfield">
													<input type="text" placeholder="Correo electrónico (*)" id="email" />
													<i class="la la-at"></i>
												</div>
												<div class="cfield">
													<input type="text" placeholder="Confirmar Correo electrónico (*)" id="email_verify" />
													<i class="la la-at"></i>
												</div>
												<div class="cfield">
													<input type="password" placeholder="Contraseña (*)" id="password" />
													<i class="la la-key"></i>
												</div>
												<div class="cfield">
													<input type="password" placeholder="Confirmar Contraseña (*)" id="password_verify" />
													<i class="la la-key"></i>
												</div>
												<div class="cfield">
													<input type="text" placeholder="Nombre Responsable (*)" id="nombre_responsable" />
													<i class="la la-user"></i>
												</div>
												<div class="cfield">
													<input type="text" placeholder="Nombre de la Empresa (*)" id="nombre_empresa" />
													<i class="la la-industry"></i>
												</div>
												<div class="cfield">
													<input type="text" placeholder="Razón Social (*)" id="razon_social" />
													<i class="la la-industry"></i>
												</div>
												<div class="cfield">
													<input type="text" placeholder="CUIT (Opcional)" id="cuit" />
													<i class="la la-slack"></i>
												</div>
												<div class="cfield">
													<input type="text" placeholder="Teléfono (*)" id="telefono" />
													<i class="la la-phone"></i>
												</div>
												
												<p class="vtchek">
													<input type="checkbox" name="" id="accept_term">
													<label for="accept_term">Acepto términos, condiciones y políticas de privacidad.</label>
												</p>
												<button type="button" class="next" data-target="1">Continuar</button>
											</form>
										</div>
									</div>
								</div>
								<div id="step2" class="back-cont" style="display: none; width: 870px; background: #FFF; padding: 20px; margin: 0 auto">
									<div class="row">
										<div class="col-lg-12">
											<div class="heading">
												<h2>Compra nuestro planes y paquetes</h2>
												<span>Recuerda que comprando el plan PREMIUM tienes todos los beneficios de nuestra plataforma y te ayudará a conseguir a los mejores jobbers del mundo.</span>
												</div><!-- Heading -->
												<div class="plans-sec">
													<div class="row">
														<div class="col-lg-6">
															<div class="pricetable">
																<div class="pricetable-head">
																	<h3>Gratis</h3>
																	<h2><i>$</i>0</h2>
																	<span>30 días</span>
																	</div><!-- Price Table -->
																	<ul>
																		<li>1 job posting</li>
																		<li>0 featured job</li>
																		<li>Job displayed for 20 days</li>
																		<li>Premium Support 24/7</li>
																	</ul>
																	<a href="javascript:void(0)" class="addPlan" title="">SELECCIONAR</a>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="pricetable">
																	<div class="pricetable-head">
																		<h3>Premium</h3>
																		<h2><i>$</i>100</h2>
																		<span>1 Año</span>
																		</div><!-- Price Table -->
																		<ul>
																			<li>11 job posting</li>
																			<li>12 featured job</li>
																			<li>Job displayed for 30 days</li>
																			<li>Premium Support 24/7</li>
																		</ul>
																		<a href="javascript:void(0)" class="addPlan" title="">SELECCIONAR</a>
																	</div>
																</div>
															</div>
														</div>
														<div class="account-popup box-btn">
															<form action="">
																<div class="pull-left">
																	<button type="button" class="back" data-target="2">Atras</button>
																</div>
																<div class="pull-right">
																	<button type="button" class="next" data-target="2">Continuar</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
											<div id="step3" class="back-cont" style="display: none; width: 870px; background: #FFF; padding: 20px; margin: 0 auto; overflow: auto;">
												<div class="col-lg-12 column">
													<div class="padding-left">
														<div class="manage-jobs-sec addscroll">
															<h3>Datos de plan</h3>
															<table>
																<thead>
																	<tr>
																		<td>Tipo</td>
																		<td>Precio</td>
																		<td>Impuesto</td>
																		<td>Total</td>
																	</tr>
																</thead>
																<tbody>
																	
																	<tr>
																		<td>
																			<span>Gratis</span>
																		</td>
																		<td>
																			<span>0 $</span>
																		</td>
																		<td>
																			<span>0 %</span>
																		</td>
																		<td>
																			<span>0 %</span>
																		</td>
																		
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
												<div class="account-popup box-btn">
													
													<form action="">
														<div class="pull-left">
															<button type="button" class="back" data-target="3">Atras</button>
														</div>
														<div class="pull-right">
															<button type="button" class="next" data-target="3">Finalizar</button>
														</div>
													</form>
												</div>
											</div>
											<br>
											<br>
											<br>
										</div>
									</div>
								</div>
							</div>
						</section>
						<footer style="clear: both;">
							<div class="bottom-line">
								<span>© 2018 Jobbers Argentina todos los derechos reservados.</span>
							</div>
						</footer>
					</div>
					<script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script>
					<script src="../local/resources/views/js/modernizr.js" type="text/javascript"></script>
					<script src="../local/resources/views/js/script.js" type="text/javascript"></script>
					<script src="../local/resources/views/js/wow.min.js" type="text/javascript"></script>
					<script src="../local/resources/views/js/slick.min.js" type="text/javascript"></script>
					<script src="../local/resources/views/js/parallax.js" type="text/javascript"></script>
					<script src="../local/resources/views/js/select-chosen.js" type="text/javascript"></script>
					<script src="../local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
					<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
					<script src="../local/resources/views/js/maps2.js" type="text/javascript"></script>
					<script>
						var plan = 1;
						$(document).ready(function() {
							
							$('.addPlan').on('click', function(){
								$('.addPlan').html('SELECCIONAR').closest('.pricetable').removeClass('active');
								$(this).html('<i class="la la-check-circle"></i> SELECCIONADO').closest('.pricetable').addClass('active');
							});
							$('.next').on('click', function(){
										console.log('alsndjasnd');
								switch($(this).attr('data-target')) {
									case '1':
										var user = $('#user').val();
										var email = $('#email').val();
										var email_verify = $('#email_verify').val();
										var password = $('#password').val();
										var password_verify = $('#password_verify').val();
										var nombre_responsable = $('#nombre_responsable').val();
										var nombre_empresa = $('#nombre_empresa').val();
										var razon_social = $('#razon_social').val();
										var cuit = $('#cuit').val();
										var telefono = $('#telefono').val();
										if (user != "" && email != "" && email_verify != "" && password != "" && password_verify != "" && nombre_responsable != "" && nombre_empresa != "" && razon_social != "" && telefono != "") {
											if (isEmail(email)) {
												if (email.trim().toLowerCase() == email_verify.trim().toLowerCase()) {
													if (password == password_verify) {
														if (password.length >= 8 && password.length <= 12) {
															if ($('#accept_term').is(':checked')) {
																$.ajaxSetup({
															headers: {
															'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
															}
																});
																$.ajax({
																	url: 'exists',
																	type: 'POST',
																	dataType: 'json',
																	data: {email: email},
																	success: function(response){
																		if (response.status == 1) {
																			$('.back-cont').hide();
																			$('#step2').fadeIn('slow');
																		} else {
																			alert("Ya existe una empresa registrada con ese correo electronico.");
																		}
																	},
																	error: function(error){
																		alert("Lo sentimos, ha ocurrido un error en el proceso. Por favor intentelo de nuevo.");
																	}
																});
															} else {
																alert("Debes aceptar todos los terminos y condiciones de uso de la plataforma para continuar");
															}
														} else {
															alert("La contraseña solo puede contener entre 8 a 12 caracteres");
														}
													} else {
														alert("Las contraseñas no coinciden");
													}
												} else {
													alert("Los correos electronicos no coinciden");
												}
											} else {
												alert("El email introducido no es un correo electronico válido");
											}
										} else {
											alert("Debes completar los campos obligatorios");
										}
										break;
									case '2':
										$('.back-cont').hide();
										$('#step3').fadeIn('slow');
										break;
									case '3':
											$.ajaxSetup({
										headers: {
										'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
										}
											});
											$.ajax({
												url: 'registro_success',
												type: 'POST',
												dataType: 'json',
												data: {
													user: $('#user').val(),
													email: $('#email').val(),
													password: $('#password').val(),
													nombre_responsable: $('#nombre_responsable').val(),
													nombre_empresa : $('#nombre_empresa').val(),
													razon_social : $('#razon_social').val(),
													cuit: $('#cuit').val(),
													telefono: $('#telefono').val(),
													plan: plan
												},
												success: function(response){
													if (response.status == 1) {
														alert('Empresa registrada satisfactoriamente.');
														setTimeout(function(){
															window.location.assign("../empresa");
														}, 3000);
													} else {
														alert("Lo sentimos, ha ocurrido un error en el registro. Por favor intentelo de nuevo.");
													}
												},
												error: function(error){
													alert("Lo sentimos, ha ocurrido un error en el proceso. Por favor intentelo de nuevo.");
												}
											});
										
										break;
								}
							});
							$('.back').on('click', function(){
								if ($(this).attr('data-target') == 3) {
									$('.back-cont').hide();
									$('#step2').fadeIn('slow');
								} else {
									$('.back-cont').hide();
									$('#step1').fadeIn('slow');
								}
							});
						});
						function isEmail(email) {
						var regex = /^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
						return regex.test(email);
						}
					</script>
				</body>
			</html>