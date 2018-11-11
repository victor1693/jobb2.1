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
 <section>


		<div class="block no-padding mt-75">
			<div class="container">
				 <div class="row no-gape">
				 	<?php include('includes/administrator_menu_left.php');?> 
				 	 <div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec addscroll">
					 			<h3>Empresas 
					 			</h3>
					 			<div class="extra-job-info" style="margin-bottom: 30px;background-color: #f0f0f0;"> 
						 			<h3> <?= count($datos);?> Empresas</h3>
						 		</div>
						 	 	
						 	 <form action="empresas" method="get" id="form_search"> 
						 	 	<a href="empresas" title="" style=""><span style="padding-left: 30px;text-decoration: underline; color: #009804;font-size: 16px;margin-top: -50px;">Limpiar filtro</span></a> 
							 	<div class="pf-field" style="padding-left: 30px;margin-top: 25px;">
									<input style="margin-bottom: 0px;" id="buscador" value="<?= isset($_GET['buscador']) ? $_GET['buscador'] : '' ?>" name="buscador" type="text" placeholder="Buscador...">
									<i class="la la-search" style="cursor: pointer;" id="search"></i>
									<span style="color: #009804;font-size: 12px;margin-top: -50px;">*El buscador funciona por Nombre, Razón Social o Correo</span>
								</div>	 
						 	 </form>
						 		<table>
						 			<thead>
						 				<tr>
						 					<td>Nombre</td>   
						 					<td>Plan</td>   
						 					<td>Email</td>   
						 					<td>Fecha de registro</td>   
						 					<td>Opciones</td>
						 				</tr>
						 			</thead>
						 			
						 			<tbody>
						 				 <?php foreach ($datos as $key): ?>
						 				 	
						 				
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href=" " title="" target="_blank"><?= $key->nombre?></a></h3> 
						 						</div>
						 					</td> 
						 					<td  style="padding-right: 10px;">
						 						<div class="table-list-title">
						 							<h3><?= $key->plan?></h3>
						 						</div>
						 					</td> 
						 					<td>
						 						<div class="table-list-title">
						 							<h3><?= $key->correo?></h3>
						 						</div>
						 					</td> 
						 					<td>
						 						<div class="table-list-title">
						 							<h3><?= $key->fecha_registro?></h3>
						 						</div>
						 					</td>  
						 					<td>
						 						<ul class="action_job">
						 							 
						 							<li><span>Eliminar</span><a href="empresas/delete/<?= $key->id;?>" title=""><i class="la la-trash-o"></i></a></li>
						 						</ul>
						 					</td>
						 				</tr> 
						 				 <?php endforeach ?>
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
<script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script> 
<script src="../local/resources/views/js/script.js" type="text/javascript"></script> 
<script src="../local/resources/views/js/slick.min.js" type="text/javascript"></script>
<script src="../local/resources/views/plugins/notify.js" type="text/javascript"></script> 
</body>
</html>