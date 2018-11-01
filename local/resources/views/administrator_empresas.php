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
						 			<h3><?= $total_empresas ?> Empresas</h3>
						 		</div>
						 	 	
						 	 <form action="empresas" method="get" id="form_search"> 
						 	 	<a href="empresas/create" title="" style=""><span style="padding-left: 30px;text-decoration: underline; color: #009804;font-size: 16px;margin-top: -50px;">Nueva Empresa</span></a> | <a href="empresas" title="" style=""><span style="text-decoration: underline; color: #009804;font-size: 16px;margin-top: -50px;"> Limpiar filtro </span></a>
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
						 				<?php foreach ($empresas as $empresa): ?>
						 				<tr>
						 					<td>
						 						<div class="table-list-title">
						 							<h3><a href="../empresa/detalle?e=<?= $empresa->id_empresa ?>" title="" target="_blank"><?= $empresa->nombre_empresa ?></a></h3>
						 							<span><i class="la la-map-marker"></i> <?= $empresa->ubicacion ?></span>
						 						</div>
						 					</td> 
						 					<td>
						 						<div class="table-list-title">
						 							<h3><?= $empresa->plan ?></h3>
						 						</div>
						 					</td> 
						 					<td>
						 						<div class="table-list-title">
						 							<h3><?= $empresa->correo ?></h3>
						 						</div>
						 					</td> 
						 					<td>
						 						<div class="table-list-title">
						 							<h3><?= $empresa->fecha_registro ?></h3>
						 						</div>
						 					</td>  
						 					<td>
						 						<ul class="action_job">
						 							<li><span>Ver</span><a href="../empresa/detalle?e=<?= $empresa->id_empresa ?>" title="" target="_blank"><i class="la la-eye"></i></a></li>
						 							<li><span>Editar</span><a href="empresas/edit/<?= $empresa->id_empresa ?>" title=""><i class="la la-pencil"></i></a></li>
						 							<?php if ($empresa->estatus == 1): ?>
						 							<li><span>Suspender</span><a href="../administracion/empresas/suspender-habilitar/0/<?= $empresa->id_empresa ?>" title=""><i class="la la-power-off"></i></a></li>
						 							<?php else: ?>
						 							<li><span>Habilitar</span><a href="../administracion/empresas/suspender-habilitar/1/<?= $empresa->id_empresa ?>" title=""><i class="la la-power-off"></i></a></li>
						 							<?php endif; ?>
						 							<li><span>Eliminar</span><a href="../administracion/empresas/delete/<?= $empresa->id_usuario ?>" title=""><i class="la la-trash-o"></i></a></li>
						 						</ul>
						 					</td>
						 				</tr>
						 				<?php endforeach; ?> 
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

<script>
	$('#search').on('click', function(){
		if ($('#buscador').val() != "") {
			$('#form_search').submit();
		} else {
			$.notify('No puedes dejar el buscador vacío', {
			  className:"info",
			  globalPosition: "bottom right"
			  });
		}
	});

	<?php if (isset($_GET['r']) && $_GET['r'] == 1): ?>

			$.notify("Se ha creado una nueva empresa satisfactoriamente.", {
			className:"success",
			globalPosition: "bottom right"
			});

	<?php elseif (isset($_GET['r']) && $_GET['r'] == 2): ?>

		$.notify("Se ha editado la empresa satisfactoriamente.", {
		className:"success",
		globalPosition: "bottom right"
		});

	<?php elseif (isset($_GET['r']) && $_GET['r'] == 3): ?>

		$.notify("Se ha eliminado la empresa satisfactoriamente.", {
		className:"success",
		globalPosition: "bottom right"
		});

	<?php elseif (isset($_GET['r']) && $_GET['r'] == 4): ?>

		$.notify("Ha ocurrido un error inesperado. Vuelva intentarlo.", {
		className:"error",
		globalPosition: "bottom right"
		});

	<?php endif; ?>
</script> 

</body>
</html>