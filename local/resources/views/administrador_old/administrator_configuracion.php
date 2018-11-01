<!DOCTYPE html>
<html>
	<head>
		<?php include('local/resources/views/includes/referencias_top.php');?>
		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="local/resources/views/css/icons.css">
		<link rel="stylesheet" href="local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="theme-layout" id="scrollup">
			
			<!--Header responsive-->
			<?php include('local/resources/views/includes/header_responsive_administrator.php');?>
			<?php include('local/resources/views/includes/header_administrator.php');?>
			<!--fin Header responsive-->
			
			<section class="overlape" style="padding: 0px;">
				<div class="block no-padding">
					<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax" style="padding: 0px;height: 100px;"></div><!-- PARALLAX BACKGROUND IMAGE -->
					<div class="container fluid" >
						<div class="row">
							<div class="col-lg-12" >
								<div class="inner-header" style="height:100px;padding:0px;padding-top: 30px;">
									<h3 style="font-size: 26px;font-weight: 300;">Daniel Maidana</h3>
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
							<?php include('local/resources/views/includes/aside_administrator.php');?>
							<div class="col-lg-9 column">
								<div class="padding-left">
									<div class="manage-jobs-sec addscroll">
										<h3>Cambiar datos de acceso.</h3>
									</div>
								</div>
								<div class="profile-form-edit" style="margin: 0px;">
									<form action="adminconfigcrear" method="POST" style="margin: 0px;">
										<input name="_token" type="hidden" value="vPRFyJZr6mYH9DCcTaV5VEJJQUMUR82fzCrFhXzz" id="my_token">
										<div class="row">
											<div class="col-lg-4">
												<span class="pf-title">Nombre</span>
												<div class="pf-field">
													<input name="nombre" type="text" placeholder="Correo electrónico">
												</div>
											</div>
											<div class="col-lg-4">
												<span class="pf-title">Correo</span>
												<div class="pf-field">
													<input name="correo" type="text" placeholder="Correo electrónico">
												</div>
											</div>
											<div class="col-lg-4">
												<span class="pf-title">Clave</span>
												<div class="pf-field">
													<input placeholder="Clave" name="clave" type="password" placeholder="">
												</div>
											</div>
											<div class="col-lg-12" style="margin-bottom: 50px;">
												<button type="submit">Actualizar</button>
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
	</div>
	<?php include("local/resources/views/includes/aside_right_administrator.php");?>
	
	<script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script>
	<script src="local/resources/views/js/modernizr.js" type="text/javascript"></script>
	<script src="local/resources/views/js/script.js" type="text/javascript"></script>
	<script src="local/resources/views/js/wow.min.js" type="text/javascript"></script>
	<script src="local/resources/views/js/slick.min.js" type="text/javascript"></script>
	<script src="local/resources/views/js/parallax.js" type="text/javascript"></script>
	<script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script>
	<script src="local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
	<script src="local/resources/views/js/circle-progress.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$( document ).ready(function() {
		
		});
	</script>
</body>
</html>