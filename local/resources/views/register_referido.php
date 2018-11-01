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
		<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="../../local/resources/views/css/icons.css">
		<link rel="stylesheet" href="../../local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/../../local/resources/views/css/font-awesome.min.css" />
		<?php include('local/resources/views/includes/chat_soporte.php');?>
		<?php include('local/resources/views/includes/google_analitycs.php');?>
	</head>
	<body style="background-image: url('../../local/resources/views/images/administrator_fondo_login.jpg');background-repeat: no-repeat;background-position: center;">
		<div class="theme-layout" id="scrollup">
			
			<section>
				<div class="block remove-bottom">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="account-popup-area signin-popup-box static" style="padding: 20px;">
									<div class="account-popup">
										<div class="text-center">
											<img src="https://www.jobbersargentina.net/img/logo_d.png" style="width: 200px;">
										</div>
										<span>Hola! Nuevo Jobbers</span>
										<form style="padding: 10px;" action="../../regreferido" method="post">
											<input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
											<input name="tipo" type="hidden" value="<?php echo $tipo?>">
											<input name="token" type="hidden" value="<?php echo $token?>">
											<div class="cfield">
												<input name="correo" type="text" placeholder="Correo electrónico" />
												<i class="la la-user"></i>
											</div>
											<div class="cfield">
												<input name="clave" type="password" placeholder="****" />
												<i class="la la-key"></i>
											</div>
											<p class="remember-label">
											</p>
											<button type="submit">Entrar</button>
										</form>
									</div>
									</div><!-- LOGIN POPUP -->
								</div>
							</div>
						</div>
					</div>
				</section>
				<?php include('local/resources/views/includes/footer_single.php');?>
			</div>
			<script src="../../local/resources/views/js/jquery.min.js" type="text/javascript"></script>
			<script src="../../local/resources/views/js/modernizr.js" type="text/javascript"></script>
			<script src="../../local/resources/views/js/script.js" type="text/javascript"></script>
			<script src="../../local/resources/views/js/wow.min.js" type="text/javascript"></script>
			<script src="../../local/resources/views/js/slick.min.js" type="text/javascript"></script>
			<script src="../../local/resources/views/js/parallax.js" type="text/javascript"></script>
			<script src="../../local/resources/views/js/select-chosen.js" type="text/javascript"></script>
			<script src="../../local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
			<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
			<script src="../../local/resources/views/js/maps2.js" type="text/javascript"></script>
			<link rel="stylesheet" type="text/css" href="../../local/resources/views/plugins/notify.js" />
			
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