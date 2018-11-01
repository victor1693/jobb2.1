<!DOCTYPE html>
<html>

<head>
	<?php include('local/resources/views/includes/referencias_top.php');?>
	<link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="local/resources/views/css/icons.css">
	<link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
	<link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
	<link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
	<link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
	<?php include("local/resources/views/includes/chat_soporte.php");?>
	<?php include('local/resources/views/includes/google_analitycs.php');?>
</head>

<body style="background: url(https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg)">
	<div class="theme-layout" id="scrollup">
		<!--Header responsive-->
		<?php include('local/resources/views/includes/header_responsive_noticias.php');?>
		<?php include('local/resources/views/includes/header_noticias.php');?>
		<!--fin Header responsive-->

		<section style="margin-bottom: 20px;">
			<div class="block no-padding">
				<div class="container" style="min-height: 500px;">
					<div class="row no-gape">
						<?php include('local/resources/views/includes/aside_noticias.php');?>
						<div class="col-lg-12 col-xl-9 column">
							<div class="padding-left">
								<div class="manage-jobs-sec addscroll">
									<h3>Categorías</h3>
									<div class="col-lg-12">
										<form action="addcategoria" method="POST">
											<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
											<span class="pf-title">Nueva categoría</span>
											<div class="pf-field">
												<input id="nombre_categoria" value="" name="nombre_categoria" type="text" placeholder="Nombre de la categoría.">
											</div>
											<button class="btn btn-primary">Agregar</button>
										</form>
									</div>
									<table style="width: 100%">
										<thead>
											<tr>
												<td>#</td>
												<td>Categoría</td>
												<td>Opciones</td>
											</tr>
										</thead>
										<tbody>
											<?php
												$contador=0;
												foreach ($datos as $key):
													$contador++;
												?>
												<tr>
													<td style="width: 20%;">
														<?php echo $contador;?>
													</td>
													<td style="width: 60%;">
														<div class="table-list-title">
															<h3>
																<a href="detalleoferta/2" title="">
																	<?php echo $key->descripcion;?>
																</a>
															</h3>
														</div>
													</td>

													<td style="text-align:right;width: 20%;">
														<?php if ($contador!=1): ?>
														<ul class="action_job">
															<li>
																<span>Eliminar</span>
																<a href="categoriadel/<?php echo $key->id;?>" title="">
																	<i class="la la-trash-o"></i>
																</a>
															</li>
														</ul>
														<?php endif ?>
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
	<?php include("local/resources/views/includes/aside_right_administrator.php");?>
	<?php include("local/resources/views/includes/general_footer.php");?>
	<script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script>
	<script src="local/resources/views/js/script.js" type="text/javascript"></script>
	<script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function () {

		});
	</script>
</body>

</html>