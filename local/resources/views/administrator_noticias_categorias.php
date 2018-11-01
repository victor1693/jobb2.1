<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Administración Jobbers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers"> 
	<?php include 'local/resources/views/includes/referencias_top.php';?> 
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../../local/resources/views/css/icons.css">
	<link rel="stylesheet" href="../../local/resources/views/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/style.css" />
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/responsive.css" /> 
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/colors/colors.css" /> 
	
</head>
<body  style="background-image: url('https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg');"> 
	<!--Header responsive-->
	<div class="theme-layout" id="scrollup">
			<?php $atras=1;?>
			<?php include('local/resources/views/includes/header_administrator.php');?> 
			<?php include('local/resources/views/includes/header_responsive_admin.php');?> 
 <section>


		<div class="block no-padding mt-75">
			<div class="container">
				 <div class="row no-gape">
				 	<?php include('includes/administrator_menu_left.php');?> 
				 	 <div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec addscroll">
					 			<h3>Categorías de noticias 
					 			</h3>
					 			<div class="extra-job-info"> 
						 			<span><i class="la la-plus"></i><strong>&nbsp;</strong><a href="noticias/publicar" title="">Nueva categoría</a></span> 
						 		</div>
						 	 
						 		<table>
						 			<thead>
						 				<tr>
						 					<td>Nombre de categoría</td>   
						 					<td style="width:120px;">Opciones</td>
						 				</tr>
						 			</thead>
						 			<tbody>
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title="">Categoría.</a></h3> 
						 						</div>
						 					</td> 
						 					 
						 					<td>
						 						<ul class="action_job"> 
						 							<li><span>Editar</span><a href="#" title=""><i class="la la-pencil"></i></a></li> 
						 							<li><span>Eliminar</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
						 						</ul>
						 					</td>
						 				</tr> 
						 			</tbody>
						 		</table>
					 		</div>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>
</div>
<script src="../../local/resources/views/js/jquery.min.js" type="text/javascript"></script> 
<script src="../../local/resources/views/js/script.js" type="text/javascript"></script> 
<script src="../../local/resources/views/js/slick.min.js" type="text/javascript"></script> 

</body>
</html>