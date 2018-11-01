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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/local/resources/views/css/font-awesome.min.css" />
		<?php include("local/resources/views/includes/chat_soporte.php");?>
		<?php include('local/resources/views/includes/google_analitycs.php');?>
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
										<span>Solo un paso más</span>
										<?php
										$parametros="";
										if(isset($_GET['red']) && $_GET['red']=='linkedin')
										{
											$parametros=$_GET['pic'].'&v='.$_GET['v'].'&t='.$_GET['t'];
										}
										else
										{
											$parametros=$_GET['pic'];
										}
										?>
										<form style="padding: 10px;" action="addcallback" method="post">
											<input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
											<input name="email" type="hidden" value="<?php echo $_GET['user'];?>" id="my_token">
											<input name="name" type="hidden" value="<?php echo $_GET['name'];?>" id="my_token">
											<input name="pic" type="hidden" value="<?php echo $parametros?>" id="pic">

											<input name="red" type="hidden" value="<?php echo $_GET['red'];?>" id="red">

											<div class="pf-field" style="margin-bottom: 20px;">
																<select name="tipo_user" data-placeholder="Allow In Search" class="chosen">
																	<option value="">Tipo de cuenta</option>
																	<option value="1">Candidato</option>
																	<option  value="2">Empresa</option> 
																</select>
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
			<link rel="stylesheet" type="text/css" href="local/resources/views/plugins/notify.js" /> 

			<script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script> 
		</body>
	</html>