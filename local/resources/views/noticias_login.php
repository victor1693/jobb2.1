<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Jobbers Argentina</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="CreativeLayers"> 
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="local/resources/views/css/icons.css">
		<link rel="stylesheet" href="local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
		<?php include('local/resources/views/includes/google_analitycs.php');?>	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/local/resources/views/css/font-awesome.min.css" />
		<?php include("local/resources/views/includes/chat_soporte.php");?>
	</head>
	<body style="background-image: url('local/resources/views/images/fondo_soportista.jpg'); background-size: cover; background-repeat: no-repeat;background-position: center; height: 100vh">
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
										<span>Redactores Jobbers</span>
										<form style="padding: 10px;" action="logredactores" method="post">
											<input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
											<div class="cfield">
												<input name="correo" type="text" placeholder="Correo electrónico" />
												<i class="la la-user"></i>
											</div>
											<div class="cfield">
												<input name="pass" type="password" placeholder="********" />
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
			<script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script> 
			<link rel="stylesheet" type="text/css" href="local/resources/views/plugins/notify.js" />
			
			 
		</body>
	</html>