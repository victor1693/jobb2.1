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
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../../local/resources/views/css/icons.css">
	<link rel="stylesheet" href="../../local/resources/views/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/style.css" />
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/responsive.css" /> 
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/colors/colors.css" /> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
	
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
					 			<h3>Ofertas para renovar 
					 			</h3><br> 

						 	 <form action="ofertas-renovar" method="get" id="form_search">

						 	 	<a href="ofertas-renovar" title="" style=""><span style="padding-left: 30px; text-decoration: underline; color: #009804;font-size: 16px;margin-top: -50px;"> Limpiar filtro </span></a>
							 	<div class="pf-field" style="padding-left: 30px;margin-top: 25px;">
									<input style="margin-bottom: 0px;" id="buscador" value="<?= isset($_GET['buscador']) ? $_GET['buscador'] : '' ?>" name="buscador" type="text" placeholder="Buscador...">
									<i class="la la-search" style="cursor: pointer;" id="search"></i>
									<span style="color: #009804;font-size: 12px;margin-top: -50px;">*El buscador funciona por Titulo de la oferta o por Nombre de la empresa</span>
								</div>	 
						 	 </form>
						 		<table>
						 			<thead>
						 				<tr>
						 					<td width="35">No.</td>   
						 					<td width="450">Titulo curso</td>   
						 					<td>Fecha curso / Venc curso</td>   
						 					<td>Opciones</td>
						 				</tr>
						 			</thead>
						 			
						 			<tbody>
						 				<?php foreach ($cursos as $i => $curso): ?>

						 					<tr>
						 						<td>
						 							<div class="table-list-title">
						 								<h3><?= $i+1 ?></h3>
						 							</div>
						 						</td>
						 						<td>
						 							<div class="table-list-title">
						 								<h3><a href="<?= url('detalleoferta') ?>/<?= $curso->id ?>" title="" target="_blank"><?= $curso->titulo ?></a></h3>
						 								<span><i class="la la-industry"></i> <?= $curso->nombre_empresa ?></span>
						 							</div>
						 						</td>
						 						<td><div class="table-list-title">
						 							<h3><?= $curso->fcrea_fvenc ?></h3>
						 								
						 							</div>
						 						</td>
						 						<td>
						 							<ul class="action_job">
													 <li><span>Ver</span><a href="<?= url('detalle_curso') ?>/<?= $curso->id ?>" title=""><i class="fa fa-eye"></i></a></li>
						 							<li><span>Aprobar</span><a href="<?= url('administracion/empresas/aprobarCurso') ?>/<?= $curso->id ?>" title=""><i class="fa fa-check"></i></a></li>
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
<script src="../../local/resources/views/js/jquery.min.js" type="text/javascript"></script> 
<script src="../../local/resources/views/js/script.js" type="text/javascript"></script> 
<script src="../../local/resources/views/js/slick.min.js" type="text/javascript"></script>
<script src="../../local/resources/views/plugins/notify.js" type="text/javascript"></script>

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

			$.notify("La oferta ha sido renovada satisfactoriamente.", {
			className:"success",
			globalPosition: "bottom right"
			});

	<?php elseif (isset($_GET['r']) && $_GET['r'] == 2): ?>

		$.notify("Ha ocurrido un error inesperado. Por favor intentelo de nuevo.", {
		className:"error",
		globalPosition: "bottom right"
		});

	<?php endif; ?>
</script> 

</body>
</html>