<!DOCTYPE html>
<html>
	<head>
		<?php include('local/resources/views/includes/referencias_top.php');?>
		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="local/resources/views/css/icons.css">
		<link rel="stylesheet" href="local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php include('local/resources/views/includes/chat_soporte.php');?>
		<?php include('local/resources/views/includes/google_analitycs.php');?>
	</head>
	<body style="background: url(https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg)">
		<div class="theme-layout" id="scrollup">
			
			<!--Header responsive-->
			<?php include('local/resources/views/includes/header_responsive_candidatos.php');?>
			<?php include('local/resources/views/includes/header_candidatos.php');?>
			<!--fin Header responsive-->
			
			<section style="margin-bottom: 20px;">
				<div class="block no-padding mt-75">
					<div class="container">
						<div class="row no-gape">
							<?php include('local/resources/views/includes/aside_candidatos.php');?>
							<div class="col-lg-9 column" >
								<div class="padding-left">
									<div class="manage-jobs-sec">
										<h3>Mi panel</h3>
										<div class="cat-sec">
											<div class="row no-gape">
												<div class="col-lg-4 col-md-4 col-sm-12">
													<div class="p-category">
														<a href="candipostulaciones" title="">
															<i class="la la-briefcase"></i>
															<span>Postulaciones</span>
															<p><?= $postulaciones ?> Postulaciones</p>
														</a>
													</div>
												</div>
												
												<!--
													<div class="col-lg-4 col-md-4 col-sm-12">
													<div class="p-category">
														<a href="candicv" title="">
															<i class="la la-file-text "></i>
															<span>Mi CV</span>
															<p>&nbsp;</p>
														</a>
													</div>
												</div>
												-->
												<div class="col-lg-4 col-md-4 col-sm-12">
													<div class="p-category">
														<a href="candiperfil" title="">
															<i class="la la-user"></i>
															<span>Mi información</span>
															<p>Ver Perfil</p>
														</a>
													</div>
												</div> 
												<div class="col-lg-4 col-md-4 col-sm-12">
													<div class="p-category">
														<a href="candiperfil#cvjobbers" title="">
															<i class="la la-file-text"></i>
															<span>Mi CV Jobbers</span>
															<p>&nbsp;</p>
														</a>
													</div>
												</div>
											</div>
										</div>
										<div class="cat-sec">
											<div class="row no-gape"> 
												<div class="col-lg-4 col-md-4 col-sm-12">
													<div class="p-category">
														<a href="canditienda" title="">
															<i class="la la-cart-arrow-down"></i>
															<span>Tienda Jobbers</span>
															<p>&nbsp;</p>
														</a>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<div class="p-category">
														<a href="candirecomendaciones" title="">
															<i class="la la-check"></i>
															<span>Recomendaciones</span>
															<p><?= $recomendaciones ?> Recomendaciones</p>
														</a>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<div class="p-category follow-companies-popup">
														<a href="candiempseg" title="">
															<i class="la la-industry"></i>
															<span>Empresa Seguidas</span>
															<p><?= $empresas_seguidas ?> Empresas</p>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		
		<div class="follow-companiesec">
			<div class="follow-companies">
				<span class="close-follow-company">
					<i class="la la-close"></i>
				</span>
				<h3>Empresas seguidas</h3>
				<ul id="scrollbar">
					<?php if (count($list_empresas_seguidas) > 0): ?>
					<?php foreach ($list_empresas_seguidas as $val): ?>
					<li>
						<div class="job-listing wtabs">
							<div class="job-title-sec">
								<?php $imagen = $val->imagen == null ? 'uploads/0.jpg' : 'uploads/'.$val->imagen ?>
								<div class="c-logo">
									<img src="<?= $imagen ?>" alt="logo de empresa" /> </div>
								<h3>
									<a href="#" title="">
										<?= $val->nombre_empresa ?>
									</a>
								</h3>
								<div class="job-lctn">
									<?= $val->direccion ?>
								</div>
							</div>
							<a href="#" title="" class="go-unfollow">Unfollow</a>
						</div>
						<!-- Job -->
					</li>
					<?php endforeach; ?>
					<?php else: ?>
					<li>
						<p style="text-align: center;">Sin registros</p>
					</li>
					<?php endif; ?>
				</ul>
			</div>

		</div>
		<?php include("local/resources/views/includes/general_footer.php");?>
		<script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script>
		<script src="local/resources/views/js/modernizr.js" type="text/javascript"></script>
		<script src="local/resources/views/js/script.js" type="text/javascript"></script>
		<script src="local/resources/views/js/wow.min.js" type="text/javascript"></script>
		<script src="local/resources/views/js/slick.min.js" type="text/javascript"></script>
		<script src="local/resources/views/js/parallax.js" type="text/javascript"></script>
		<script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script>
		<script src="local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
		<script src="local/resources/views/js/circle-progress.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$( document ).ready(function() {
			
			});
		</script>
	</body>
</html>