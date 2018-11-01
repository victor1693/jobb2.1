<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Jobbers Argentina</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="CreativeLayers">
		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="local/resources/views/css/icons.css">
		<link rel="stylesheet" href="local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" /> 
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> 
		<?php include('local/resources/views/includes/google_analitycs.php');?> 
		<style type="text/css">
			body,html
			{
				overflow: hidden;


			}
			.account-popup-area.static .account-popup {
		        width: 100%; 
		        left: 0;
		        -webkit-transform: none;
		        -moz-transform: none;
		        -ms-transform: none;
		        -o-transform: none;
		        transform: none;
		        margin: 0 auto; 
		    }
		    /* Portrait tablet to landscape and desktop */
			@media (min-width: 768px) 
			{ 
				 .contenedor-login
				 {
				 	padding-left: 25%;
				 	padding-right: 25%;
				 }
			}

			/* Landscape phone to portrait tablet */
			@media (max-width: 767px)
			{ 
				 .contenedor-login
				 {
				 	padding-left: 0;
				 	padding-right: 0;
				 }
			} 
		</style>
	</head>
	<body style="background-image: url('https://www.papa-mike.com/v6/wp-content/uploads/2014/05/LOGIN-BACKGROUND-1.jpg');background-position: center; background-size: cover;">
		<div class="theme-layout" id="scrollup">
			
			<section>
				<div class="block remove-bottom" style="padding: 5px;">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 contenedor-login">
								<div class="account-popup-area signin-popup-box static" style="padding: 5px;">
									<div class="account-popup" style="border: 1px solid #ddd;">
										<div class="text-center">
											<img onclick="location.href='ofertas'" src="https://www.jobbersargentina.net/img/logo_d.png" style="width: 200px;cursor: pointer;">
										</div>

										<!--
										<div class="extra-login" style="margin-top: 0px;">
											<span>Registrarme con</span>
										 	<div class="login-social">
													<a class="fb-login" href="<?= url('redes/facebook') ?>" title=""><i class="fa fa-facebook"></i></a>
													<a class="tw-login" href="<?= url('redes/linkedin') ?>" title=""><i class="fa fa-linkedin"></i></a>
													<a class="go-login" href="<?= url('redes/google') ?>" title=""><i class="fa fa-google"></i></a>
											</div>
										</div> 
										-->
										<span>Gracias por confiar en Jobbers</span> 
										<form id="formulario" style="padding: 10px;padding-top: 0px;margin-top: 0px;" action="register" method="post">
											<input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
											<div class="col-sm-12">
												  
											<div class="row">
												 <div class="col-sm-12 col-lg-6">
												<div class="pf-field" >
													<input id="correo_1" name="correo" type="text" placeholder="Correo electrónico" />
													<i class="la la-at"></i>
												</div>
											</div>
											<div class="col-sm-12 col-lg-6">
												<div class="pf-field">
													<input id="correo_2" name="correo_2" type="text" placeholder="Repita su correo" />
													<i class="la la-at"></i>
												</div>
											</div>
											</div>

											<div class="row">
												 <div class="col-sm-12 col-lg-6">
												<div class="pf-field" >
													<input id="ojo_uno" name="pass" type="password" placeholder="Clave" />
													<i  class="la la-eye" style="cursor: pointer;" onclick="show_hide(this,1)">
													 </i>
												</div>
											</div>
											<div class="col-sm-12 col-lg-6">
												<div class="pf-field">
													<input  id="ojo_dos" name="pass_2" type="password" placeholder="Clave" />
													<i class="la la-eye" style="cursor: pointer;" onclick="show_hide(this,2)">
													</i>
												</div>
											</div>
											</div>
											</div>
											 <div class="col-sm-12">
											 	<a href="login" title="login" style="font-size: 14px;color: #0645AD;">Ya tengo cuenta</a>
											 	<button type="button" onClick="enviar_form()">Entrar</button> 
											<div>
												<span style="font-size: 13px;">© Jobbers Argentina 2018, Todos los derechos reservados</span>
											</div>
											 </div>
										</form>

									</div>
									</div><!-- LOGIN POPUP -->
								</div>
							</div>
						</div>
					</div>
				</section> 
			</div>
			<?php include("local/resources/views/includes/login_register_modal.php");?>
			<script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script>
			<script src="local/resources/views/js/modernizr.js" type="text/javascript"></script>
			<script src="local/resources/views/js/script.js" type="text/javascript"></script>  
			<script src="local/resources/views/plugins/notify.js" type="text/javascript"></script>   
			<script>
				function enviar_form()
				{
					if($("#correo_1").val()=="")
					{
						$.notify("Debe colocar un correo", "info");
						$("#correo_1").focus();
					}
					else if($("#correo_2").val()=="")
					{
						$.notify("Debe repetir su correo", "info");
						$("#correo_1").focus();
					}

					else if($("#ojo_uno").val()=="")
					{
						$.notify("Debe colocar una clave", "info");
						$("#ojo_uno").focus();
					}

					else if($("#ojo_dos").val()=="")
					{
						$.notify("Debe repetir su clave", "info");
						$("#ojo_dos").focus();
					}
					else if($("#correo_1").val()!=$("#correo_2").val())
					{
						$.notify("Los correos no son iguales", "info");
						$("#correo_1").focus();
					}
					else if($("#ojo_uno").val()!=$("#ojo_dos").val())
					{
						$.notify("Las claves no son iguales", "info");
						$("#ojo_uno").focus();
					}
					else if($("#ojo_uno").val().length < 8)
					{
						$.notify("La clave debe ser de almenos 8 caractéres", "info");
						$("#ojo_uno").focus();
					}
					else($("#formulario").submit());
				}
				function show_hide(btn,par)
				{ 
					var $btn = $(btn);
					var control="";
					if(par==1){control='ojo_uno';}else{control='ojo_dos';}
					if ($btn.hasClass('la-eye')) {
						$btn.removeClass('la-eye')
							.addClass('la-eye-slash')
							.attr('title', 'Mostrar');
						$('#'+control).attr('type', 'text');
					} else {
						$btn.removeClass('la-eye-slash')
							.addClass('la-eye')
							.attr('title', 'Ocultar');
						$('#'+control).attr('type', 'password');
					}
				}
			</script> 
			<!--Validaciones-->
			<?php
			if(isset($_GET['error']))
			{
			echo'<script>$.notify("Warning: Self-destruct in 3.. 2..", "warn");</script>';
			}
			?>
			<!--Fin d validaciones-->
		</body>
	</html>