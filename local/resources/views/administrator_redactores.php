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
					 			<h3>Redactores 
					 			</h3>
					 			<div class="extra-job-info"> 
						 			<span><i class="la la-plus"></i><strong>&nbsp;</strong><a href="redactores/nuevo" title="">Nuevo redactor</a></span>
						 		</div>
						 	 
						 		<table>
						 			<thead>
						 				<tr>
						 					<td>Nombre</td>  
						 					<td style="width:100px;">Opciones</td>
						 				</tr>
						 			</thead>
						 			<tbody>
						 				<?php foreach ($datos as $key): ?>
						 				 <tr>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title=""><?php echo $key->nombre;?></a></h3>
						 							<span><?php echo $key->funcion;?></span>
						 						</div>
						 					</td> 
						 					<td>
						 						<ul class="action_job">
						 							<?php if ($key->estatus==1): ?>
						 								<li><span>Bloquear</span><a href="redactores/bloquear/<?php echo $key->id;?>" title=""><i class="la la-unlock-alt"></i></a></li>	
						 							<?php endif ?> 
						 							<?php if ($key->estatus==0): ?>
						 								<li><span>Desbloquear</span><a href="redactores/desbloquear/<?php echo $key->id;?>" title=""><i class="la la-unlock"></i></a></li>	
						 							<?php endif ?>
						 							<li><span>Editar</span><a href="redactores/<?php echo $key->id;?>" title=""><i class="la la-pencil"></i></a></li> 
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
<?php
if(isset($_GET['result']) && $_GET['result']!="")
{
	echo "<script>alert('".$_GET['result']."');</script>";
} 
?>
</body>
</html>