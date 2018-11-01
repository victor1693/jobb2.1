<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Administración Jobbers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers"> 
	<?php include('local/resources/views/includes/referencias_top.php');?>
	<link rel="stylesheet" type="text/css" href="../local/resources/views/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../local/resources/views/css/icons.css">
	<link rel="stylesheet" href="../local/resources/views/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="../local/resources/views/css/style.css" />
	<link rel="stylesheet" type="text/css" href="../local/resources/views/css/responsive.css" /> 
	<link rel="stylesheet" type="text/css" href="../local/resources/views/css/colors/colors.css" /> 
	
</head>
<body  style="background-image: url('https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg');"> 
	<!--Header responsive-->
	<div class="theme-layout" id="scrollup">
			<?php include('local/resources/views/includes/header_administrator.php');?> 
			<?php include('local/resources/views/includes/header_responsive_admin.php');?> 
 <section style="margin-bottom: 20px;">
		<div class="block no-padding mt-75">
			<div class="container">
				 <div class="row no-gape">
				 	<?php include('includes/administrator_menu_left.php');?> 
				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec">
					 			<h3>Panel</h3>
					 			<div class="extra-job-info">
						 			<span><i class="la la-industry"></i><strong><?= $datos_usuario[0]->cantidad;?></strong>Empresas</span>
						 			<span><i class="la la-users"></i><strong><?= $datos_usuario[1]->cantidad;?></strong>Candidatos</span>
						 			<span><i class="la la-newspaper-o"></i><strong><?= $datos_noticias[0]->cantidad;?></strong>Noticias</span> 
						 		</div>
						 		<div class="extra-job-info">
						 			<span><i class="la la-stethoscope"></i><strong><?= $datos_publicaciones[0]->cantidad;?></strong>Ofertas</span>
						 			<span><i class="la la-hand-pointer-o"></i><strong><?= $datos_postulaciones[0]->cantidad;?></strong>Postulados</span>
						 			 <span><i class="la la-comments"></i><strong><?= $datos_recomendaciones[0]->cantidad;?></strong>Recomendaciones</span>
						 		</div> 
					 		</div>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>
</div>
<script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script> 
<script src="../local/resources/views/js/script.js" type="text/javascript"></script> 
<script src="../local/resources/views/js/slick.min.js" type="text/javascript"></script> 

</body>
</html>