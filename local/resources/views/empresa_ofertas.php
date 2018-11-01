<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Jobbers Argentina - Empresa</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="CreativeLayers">
		<!-- Styles -->
		
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="../local/resources/views/css/icons.css">
		<link rel="stylesheet" href="../local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
		<?php include('local/resources/views/includes/google_analitycs.php');?>
		<?php include('local/resources/views/includes/chat_soporte.php');?>
	</head>
	<body>
		<div class="theme-layout" id="scrollup">
			
			<?php include("includes/header_responsive_empresa.php") ?>
			
			<?php include "includes/header_empresa.php" ?>
			<section class="overlape mt-responsive">
				<div class="block no-padding">
					<div data-velocity="-.1" style="background: url(../local/resources/views/images/empresa_gral.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
					<div class="container fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="inner-header">
									<h3>Bienvenido <?= session()->get("emp_nombre_empresa") != "" ? session()->get("emp_nombre_empresa") : session()->get("empresa") ?> </h3>
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
							
							<?php include("includes/aside_empresa.php") ?>
							<div class="col-lg-12 col-xl-9 column">
								<div class="padding-left">
									<div class="manage-jobs-sec empresa-offers-resp">
										<h3>Listado de ofertas de trabajo</h3> 
										<div class="extra-job-info">
											<span><i class="la la-clock-o"></i><strong><?= $total_ofertas ?></strong> Ofertas publicadas</span>
											<span><i class="la la-file-text"></i><strong><?= $total_postulados ?></strong> Postulados en total</span>
											<span><i class="la la-users"></i><strong><?= $total_jobbers ?></strong> Jobbers Activos</span>
										</div>
										<table>
											<thead>
												<tr>
													<td>Titulo</td>
													<td>Postulados</td>
													<td>Creado y vencido</td>
													<td>Estatus</td>
													<td>Acciones</td>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($ofertas as $oferta): ?>
													<?php $titulo = strlen($oferta->titulo) > 39 ? substr($oferta->titulo, 0, 39) . "..." : $oferta->titulo ?>
												<tr>
													<td>
														<div class="table-list-title">
															<h3><a href="../detalleoferta/<?= $oferta->id ?>" title="<?= $oferta->titulo ?>"><?= $titulo ?></a></h3>
															<span><i class="la la-map-marker"></i><?= $oferta->ubicacion ?></span>
														</div>
													</td>
													<td>
														<?php if ($oferta->postulados != 0): ?>
														<a href="candidatos-postulados/<?= $oferta->id ?>"><span class="applied-field"><?= $oferta->postulados ?> Postulado(s)</span></a>
														<?php else: ?>
														<a href="#"><span class="applied-field">0 Postulado(s)</span></a>
														<?php endif ?>
													</td>
													<td>
														<span><?= $oferta->fcrea_fvenc ?></span>
													</td>
													<td>
														<span class="status <?= $oferta->id_estatus == 1 ? 'active' : '' ?>"><?= $oferta->estatus ?></span>
													</td>
													<td>
														<ul class="action_job">
															<li><span>Ver Oferta</span><a href="../detalleoferta/<?= $oferta->id ?>?ref=_panelEmpresa" title=""><i class="la la-eye"></i></a></li>
															<li><span>Editar</span><a href="edit_post/<?= $oferta->id ?>" title=""><i class="la la-pencil"></i></a></li>
															<?php $pausar_continuar = $oferta->estatus == 'Activo' ? '<span>Pausar</span><a href="post/1/'.$oferta->id.'" title=""><i class="la la-pause"></i></a>' : '<span>Habilitar</span><a href="post/2/'.$oferta->id.'" title=""><i class="la la-play"></i></a>' ?>
															<?php if ($oferta->dias_venc < 0): ?>
															<li><?= $pausar_continuar ?></li>
															<?php else: ?>
															<li><span>Renovar</span><a href="post/4/<?= $oferta->id ?>" title=""><i class="la la-refresh"></i></a></li>
															<?php endif ?>
															<li><span>Eliminar</span><a href="post/3/<?= $oferta->id ?>" title=""><i class="la la-trash-o"></i></a></li>
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
				<?php include("includes/modal_update_plan.php") ?>
			</section>
			<br>
			<?php include("includes/general_footer_empresas.php") ?>
		</div>
		
				<script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
				<script src="../local/resources/views/js/modernizr.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/script.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/wow.min.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/slick.min.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/parallax.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/select-chosen.js" type="text/javascript"></script>
				<script src="../local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
				<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
				<script src="../local/resources/views/js/maps2.js" type="text/javascript"></script>
				<script src="../local/resources/views/plugins/notify.js" type="text/javascript"></script>
				<script>
					$(document).ready(function() {


						<?php if (isset($_REQUEST['response'])): ?>
							<?php if ($_REQUEST['response'] == 1): ?>
								$.notify("Se ha cambiado el estatus de la oferta satisfactoriamente.", {
									className:"success",
									globalPosition: "bottom center"
								});
							<?php elseif ($_REQUEST['response'] == 2): ?>
								$.notify("Ha ocurrido un error al intentar cambiar el estatus de la oferta.", {
									className:"error",
									globalPosition: "bottom center"
								});
							<?php elseif (session('alert')): ?>
								$.notify("<?= session('alert') ?>", {
									className:"success",
									globalPosition: "bottom center"
								});
							<?php elseif (session('alert-error')): ?>
								$.notify("<?= session('alert-error') ?>", {
									className:"error",
									globalPosition: "bottom center"
								});
							<?php elseif ($_REQUEST['response'] == 5): ?>
								$.notify("Se ha renovado la oferta satisfactoriamente.", {
									className:"success",
									globalPosition: "bottom center"
								});
							<?php else: ?>
								$.notify("Ha ocurrido un error al intentar renovar la oferta.", {
									className:"error",
									globalPosition: "bottom center"
								});
							<?php endif; ?>
						<?php endif; ?>

						$('#post').on('click', function(){
							$.notify("Oferta publicada satisfactoriamente.", {
								className:"success",
								globalPosition: "bottom center"
							});
							$('#step1').removeClass('active');
							$('#step2').addClass('active');
						});
					});
				</script>
			</body>
		</html>