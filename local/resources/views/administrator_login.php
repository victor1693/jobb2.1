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
		
	</head>
	<body style="background-image: url('local/resources/views/images/administrador.jpg');background-repeat: no-repeat;background-position: center;background-size: cover;height: 100vh">
		<div class="theme-layout" id="scrollup">
			
			<section>
				<div class="block remove-bottom">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="account-popup-area signin-popup-box static" style="padding: 20px;">
									<div class="account-popup">
										<div class="text-center">
											<img src="local/resources/views/images/logo_d.png" style="width: 200px;">
										</div>
										<span>Administración del sistema</span>
										<form style="padding: 10px;" action="<?= url('admlog') ?>" method="post">
											<input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
											<div class="cfield">
												<input name="usuario" type="text" placeholder="Usuario" />
												<i class="la la-user"></i>
											</div>
											<div class="cfield">
												<input name="pass" type="password" placeholder="********" />
												<i class="la la-key"></i>
											</div>
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
			<script src="local/resources/views/js/script.js" type="text/javascript"></script> 
			<script src="local/resources/views/js/slick.min.js" type="text/javascript"></script>
			<script src="local/resources/views/plugins/notify.js" type="text/javascript"></script>
			<script>
				
				<?php if (count($errors)>0): ?>

					<?php foreach ($errors->all() as $error): ?>

						$.notify("<?= $error ?>", {
						className:"error",
						globalPosition: "bottom right"
						});

					<?php endforeach; ?>

				<?php endif; ?>

			</script>  
			 
			
		 
			<!--Fin d validaciones-->
		</body>
	</html>