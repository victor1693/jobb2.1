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
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="../local/resources/views/css/icons.css">
		<link rel="stylesheet" href="../local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
		<?php include('local/resources/views/includes/chat_soporte.php');?>
		<?php include('local/resources/views/includes/google_analitycs.php');?>
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
										<h3>Listado de mis cursos</h3>
										<div class="extra-job-info">
											<span><i class="la la-clock-o"></i><strong><?= $total_cursos ?></strong> Cursos publicados</span>
											<!-- <span><i class="la la-file-text"></i><strong></strong> Postulados en total</span> -->
											<span><i class="la la-file-text"></i><strong>0</strong> Interesados en total</span>
											<span><i class="la la-users"></i><strong><?= $total_jobbers ?></strong> Jobbers Activos</span>
										</div>
										<table>
											<thead>
												<tr>
													<td>Titulo</td>
													<td>Precio</td>
													<td>Interesados</td>
													<td>Creado y vencido</td>
													<td>Status</td>
													<td>Acciones</td>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($cursos as $curso): ?>
													<?php $titulo = strlen($curso->titulo) > 39 ? substr($curso->titulo, 0, 39) . "..." : $curso->titulo ?>
												<tr>
													<td>
														<div class="table-list-title">
															<h3><a href="#" title="<?= $curso->titulo ?>"><?= $titulo ?></a></h3>
															<?php if ($curso->id_mc == 1): ?>
																<span><i class="la la-desktop"></i> Online </span>&nbsp;&nbsp;<span style="margin-left: 5px"><i class="la la-clock-o"></i> <?= $curso->duracion ?></span>
															<?php else: ?>
															<span><i class="la la-map-marker"></i><?= $curso->ubicacion ?></span>&nbsp;&nbsp;<span style="margin-left: 5px"><i class="la la-clock-o"></i> <?= $curso->duracion ?></span>
															<?php endif; ?>
														</div>
													</td>
													<td>
														<span><?= $curso->precio ?></span>
													</td>
													<td>
														<?php //if ($curso->postulados != 0): ?>
														<!-- <a href="#"><span class="applied-field"> Postulado(s)</span></a> -->
														<?php //else: ?>
														<a href="#"><span class="applied-field">0 Interesado(s)</span></a>
														<?php //endif ?>
													</td>
													<td>
														<span><?= $curso->fcrea_fvenc ?></span>
													</td>
													<td>
														<span class="status <?= $curso->id_estatus == 1 ? 'active' : '' ?>"><?= $curso->estatus ?></span>
													</td>
													<td>
														<ul class="action_job">
															<li><span>Ver curso</span><a href="<?= url('detalle_curso', $curso->id) ?>" title=""><i class="la la-eye"></i></a></li>
															<li><span>Editar</span><a href="<?= url('empresa/cursos/edit', $curso->id) ?>" title=""><i class="la la-pencil"></i></a></li>
															<li><span>Eliminar</span><a href="post/3/<?= $curso->id ?>" title=""><i class="la la-trash-o"></i></a></li>
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
			<br>
			<?php include("includes/general_footer_empresas.php") ?>
		</div>
		
				<script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script>
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


						<?php if (session('alert')): ?>
								$.notify("<?= session('alert') ?>", {
									className:"success",
									globalPosition: "bottom center"
								});
						<?php elseif (session('alert-error')): ?>
							$.notify("<?= session('alert-error') ?>", {
								className:"error",
								globalPosition: "bottom center"
							});

						<?php endif; ?>
					});
				</script>
			</body>
		</html>