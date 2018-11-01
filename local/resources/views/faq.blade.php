<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Jobhunt</title>
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
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
		<?php include("local/resources/views/includes/chat_soporte.php");?> 
		<?php include('local/resources/views/includes/google_analitycs.php');?>
	</head>
	<body>
		<!--Header responsive-->
		<?php include("local/resources/views/includes/general_header_responsive.php")?>
		<?php include("local/resources/views/includes/general_header.php");?>
		<section class="mt-responsive">
			<div class="block no-padding  gray" style="padding-top: 50px;">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="inner2">
								<div class="inner-title2">
									<h3>Preguntas frecuentes</h3>
									<span>Lo que mas preguntan nuestros Jobbers</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="block ">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<?php foreach ($datos as $key) {
								echo '<div class="faqs">
									<div class="faq-box">
											<h2>¿'.$key->titulo.'? <i class="la la-minus"></i></h2>
											<div class="contentbox">
													<p>'.$key->descripcion.'</p>
											</div>
									</div>
							</div>';
							}?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php include("local/resources/views/includes/general_footer.php");?>
	</div>
	<?php include("local/resources/views/includes/login_register_modal.php");?>
	<script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script>
	<script src="local/resources/views/js/modernizr.js" type="text/javascript"></script>
	<script src="local/resources/views/js/script.js" type="text/javascript"></script>
	<script src="local/resources/views/js/wow.min.js" type="text/javascript"></script>
	<script src="local/resources/views/js/slick.min.js" type="text/javascript"></script>
	<script src="local/resources/views/js/parallax.js" type="text/javascript"></script>
	<script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script>
	<script src="local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
	<script src="local/resources/views/js/maps2.js" type="text/javascript"></script>
</body>
</html>