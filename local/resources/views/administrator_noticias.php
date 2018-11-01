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
					 			<h3>Noticias 
					 			</h3>
					 			<div class="extra-job-info"> 
						 			<span><i class="la la-plus"></i><strong>&nbsp;</strong><a href="noticias/publicar" title="">Publicar</a></span>
						 			<span><i class="la la-plus"></i><strong>&nbsp;</strong><a href="noticias/categorias" title="">Categorias</a></span>
						 			<span><i style="font-size: 24"><?php echo count($datos)?></i><strong>&nbsp;</strong><a href="noticias/categorias" title="">Noticias</a></span>
						 		</div>
						 	<div class="profile-form-edit">
						 		
						 
						 	 <form action="buscarnoticia" method="POST" accept-charset="utf-8">
						 	 	<input type="hidden" name="_token" value="<?php echo csrf_token();?>"> 
								<div class="col-sm-8" style="padding: 0px;">
						 	 			<div class="pf-field" style="margin-top: 25px;">
													<input style="margin-bottom: 0px;" id="" value="<?php echo $buscador;?>" name="buscador" type="text" placeholder="Buscador...">
													<span style="color: #009804;font-size: 12px;margin-top: -50px;">*El buscador funciona por el título de la noticia.</span>

													<a style="color: #009804;font-size: 12px;" href="../administracion/noticias"><i><strong>Quitar filtros</strong></i></a>
												</div>

						 	 	</div>
						 	  
						 	 </form>	</div>
						 		<table>
						 			<thead>
						 				<tr>
						 					<td>Noticia</td>  
						 					<td>Redactor</td>  
						 					<td style="width:120px;">Opciones</td>
						 				</tr>
						 			</thead>
						 			<tbody><?php foreach ($datos as $key): ?> 
						 				<tr>
						 											 					
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title=""><?php echo $key->titulo;?></a></h3>
						 							<span><?php echo $key->tmp;?></span>
						 						</div>
						 					</td> 
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="#" title=""><?php echo $key->redactor;?></a></h3> 
						 						</div>
						 					</td> 
						 					<td>
						 						<ul class="action_job">
						 							<li><span>Ver</span><a href="../noticias/<?php echo $key->id;?>" title=""><i class="la la-eye"></i></a></li>
						 							<li><span>Editar</span><a href="noticias/<?php echo $key->id?>" title=""><i class="la la-pencil"></i></a></li>
						 							<?php if ($key->estado==1): ?>
						 								<li><span>Pausar</span><a href="noticias/bloquear/<?php echo $key->id;?>" title=""><i class="la la-pause"></i></a></li>
						 							<?php endif ?>
						 							<?php if ($key->estado==0): ?>
						 								<li><span>Publicar</span><a href="noticias/desbloquear/<?php echo $key->id;?>" title=""><i class="la la-play"></i></a></li>
						 							<?php endif ?>
						 							<li><span>Eliminar</span><a href="noticias/eliminar/<?php echo $key->id?>" title=""><i class="la la-trash-o"></i></a></li>
						 						</ul>
						 					</td>
						 					
						 				</tr> <?php endforeach ?>
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