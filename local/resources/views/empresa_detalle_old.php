<?php
function formatDate($dateMayor, $dateMenor){
	$menor = new DateTime($dateMenor);
	$mayor = new DateTime(date($dateMayor));
	$intervalo = $mayor->diff($menor);
	if ($intervalo->format("%m") != 0) {
		$m = $intervalo->format("%m") == 1 ? "mes" : "meses";
		return $intervalo->format("Hace %m $m");
	} elseif ($intervalo->format("%a") != 0){
		$d = $intervalo->format("%a") == 1 ? "día" : "días";
		return $intervalo->format("Hace %a $d");
	} elseif ($intervalo->format("%h") != 0){
		$h = $intervalo->format("%h") == 1 ? "hora" : "horas";
		return $intervalo->format("Hace %h $h");
	} elseif ($intervalo->format("%i") != 0){
		return $intervalo->format("Hace %i min");
	} else {
		return $intervalo->format("Hace %s seg");
	}
	}
?>
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
		<link rel="stylesheet" href="../local/resources/views/css/icons.css">
		<link rel="stylesheet" href="../local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" /> 
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
		  (adsbygoogle = window.adsbygoogle || []).push({
		    google_ad_client: "ca-pub-1968505410020323",
		    enable_page_level_ads: true
		  });
		</script>
		<?php include('local/resources/views/includes/chat_soporte.php');?>

		<style type="text/css" media="screen">

			@media (min-width: 576px) { ... }
			#contenedor_header
				 {
				 		margin-top: -100px;
				 }
 
			@media (min-width: 768px) { ... }
 			#contenedor_header
				 {
				 	margin-top: -100px;
				 }
			@media (min-width: 992px) { 
				#contenedor_header
				 {
				 	margin-top: -320px;
				 }
			}

			blockquote {
			    background: #ffb203;
			    color: #fff;
			    border-radius: 20px;
			    border-bottom: 2px solid #e59f00; 
			    /* Color de fondo */
			    padding: 10px;
			}
			blockquote:before {
			    content: "\201C";
			    /* inicio comilla */
			    font-family: Georgia;
			    font-size: 40px;
			    /* tamaño */
			    font-weight: bold;
			    line-height: 0px;
			    color: #ffffff;
			    /* Color  */
			    vertical-align: middle;
			}
			blockquote:after {
			    /* final */
			    content: "\201D";
			    font-family: Georgia;
			    font-size: 40px;
			    /* tamaño */
			    font-weight: bold;
			    line-height: 0px;
			    color: #ffffff;
			    /* Color  */
			    vertical-align: middle;
			    padding-top: 10px;
			}
		</style>
		<?php include('local/resources/views/includes/google_analitycs.php');?>
</head>
	<body style="background-color: #eeeeee;">
		<div class="theme-layout" id="scrollup">
			<?php
			if (session()->get("empresa") == null) {
				
				include("includes/general_header_responsive.php");
				include("includes/general_header.php");
			} else {
				include("includes/header_responsive_empresa.php");
				include("includes/header_empresa.php");
			}
			?>
			<section class="overlape" id="contenedor_header" >
				<div class="block no-padding" >
					<div data-velocity="-.1" style="background: url(../local/resources/views/images/detalle.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
					<div class="container fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="inner-header">
								 
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section>
				<div class="block">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 column" >
								<div class="job-single-sec style3">
									<div class="job-head-wide">
										<div class="row">
											<div class="col-lg-12">
												<div class="job-single-head3 emplye" style="background-color: #fff;padding-top: 15px;padding-left: 15px;border: 1px solid #c6c6c6;">
													<?php $imagen_perfil = $empresa[0]->imagen == null || $empresa[0]->imagen == '' ? asset('../local/resources/views/images/company-avatar.png') : asset('uploads/'.$empresa[0]->imagen) ?>
													<div class="job-thumb"> <img src="<?= $imagen_perfil ?>" alt="Imagen de la empresa" width="120" height="120" /></div>
													<div class="job-single-info3">
														<h3><?= $empresa[0]->nombre_empresa ?></h3>
														<?php if ($empresa[0]->provincia_localidad): ?>
														<span><i class="la la-map-marker"></i><?= $empresa[0]->provincia_localidad ?></span>
														<?php endif; ?>
														<ul class="tags-jobs">
															<li><i class="la la-file-text"></i> Candidatos: <?= $empresa[0]->candidatos ?></li>
															<li><i class="la la-calendar-o"></i> Ultima Oferta: <?= $empresa[0]->last_date_oferta ?></li>
														</ul>
													</div>
													</div><!-- Job Head -->
												</div>
												 
											</div>
										</div>
										<div class="job-wide-devider">
											<div class="row">
												<div class="col-lg-9 column">
													<div class="job-details" style="padding-top: 30px;">
														<?php if ($empresa[0]->descripcion!=""): ?>
															<blockquote><span style="padding-left: 10px;padding-right: 10px;s"><?php echo $empresa[0]->descripcion?></span> </blockquote>  
														<?php endif ?> 
													</div>
													<?php if (count($ofertas) > 0): ?>
													<div class="recent-jobs">
														<h3>Ofertas de la Empresa</h3>
														<div class="job-list-modern">
															
															<div class="job-listings-sec no-border">
															<?php foreach ($ofertas as $pub): ?>

															  <?php if ($pub->id_plan == 2): ?>

															        <?php if ($pub->modalidad == 1): ?>

															            <!-- Oferta recomendada -->
															            <a href="../detalleoferta/<?= $pub->id ?>"><div class="job-listing wtabs borde-recomend" style="background: url(<?= asset('local/resources/views/images/back-ofertas.jpg') ?>); background-size: cover">
															              <div class="recomend"><span><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> Oferta destacada</span></div>
															                <div class="job-title-sec container-desc-oferta">
															                <div class="row">
															                  <div class="col-6"> 
															                    <?php if ($pub->facebook || $pub->linkedin || $pub->twitter): ?>
															                    <p class="time-pub" style="margin-left: 20px; margin-bottom: 20px">
															                      Redes:
															                          <?php if ($pub->facebook): ?> 
															                          <a href="<?= $pub->facebook ?>"><span class="container-fb" style="float: inherit"><i class="fa fa-facebook" style="padding:6px; margin-left: 0px;"></i></span></a>
															                          <?php endif; ?>
															                          <?php if ($pub->linkedin): ?>
															                          <a href="<?= $pub->linkedin ?>"><span class="container-in" style="float: inherit"><i class="fa fa-linkedin mr-0" style="padding:4px; margin-left: 0px; font-size: 13px;"></i></span></a>
															                          <?php endif; ?>
															                          <?php if ($pub->twitter): ?>
															                          <a href="<?= $pub->twitter ?>"><span class="container-tw" style="float: inherit"><i class="fa fa-twitter mr-0" style="padding:3px; margin-left: 0px;"></i></span></a><a href="#" class="jump mobile-inline"><br></a>
															                          <?php endif; ?>
															                    </p>
															                    <?php endif; ?>
															                  </div>
															                  <div class="col-6">
															                    <img src="<?= $pub->confidencial == 'NO' || $pub->confidencial == null ? $pub->imagen == null ? asset('../local/resources/views/images/company-avatar.png') : asset('uploads/'.$pub->imagen) : asset('../local/resources/views/images/company-avatar.png') ?>" class="img-fluid" width="80" alt="">
															                  </div>
															                  <?php if ($pub->plan_estado): ?>
															                  <!-- <div class="col-12">
															                    <img src="<?= asset('local/resources/views/images/programas') ?>/<?= $pub->plan_estado ?>.png" alt="" class="img-fluid img-oferta">
															                  </div> -->
															                  <?php endif; ?>
															                </div>
															              
															                <h5 class="title-recom"><?= $pub->titulo ?> <!-- <a href="#"><span style="float: right; color: #bbbbbb; font-size: 15px; font-weight: 400;"><sup>Denunciar</sup> <i class="fa fa-exclamation-circle exclamation-icon"></i></span></a> --></h5>
															                  <p class="time-pub"><i class="fa fa-calendar"></i> Publicada <?= $pub->fecha_pub ?> a las <?= $pub->hora_pub ?> - Termina: <?= $pub->fecha_venc ?></p>
															                  <p class="desc-oferta"><?= strlen($pub->descripcion) > 350 ? substr(strip_tags($pub->descripcion), 0, 350) . "..." : strip_tags($pub->descripcion) ?> </p>
															                  <br>
															                  <div class="job-lctn">
															                    <?= $pub->confidencial == 'NO' || $pub->confidencial == null ? $pub->nombre : 'Confidencial' ?> 
															                    <i class="fa fa-eye"></i><?= $pub->vistos ?>&nbsp;
															                    <!-- <i class="fa fa-heart red"></i>3&nbsp; -->
															                    <i class="fa fa-clock-o mr-0"></i>
															                    <span class="disponibilidad"><?= $pub->disponibilidad ?></span>&nbsp;
															                    <?php if ($pub->discapacidad == 'SI'): ?>
															                    <i class="fa fa-wheelchair blue"></i>
															                    <?php endif; ?>
															              
															                    <?php if ($pub->facebook || $pub->linkedin || $pub->twitter): ?>
															                    <div class="desk" style="float: right">
															                      <?php if ($pub->facebook): ?> 
															                      <a href="<?= $pub->facebook ?>"><span class="container-fb"><i class="fa fa-facebook"></i></span></a>
															                      <?php endif; ?>
															                      <?php if ($pub->linkedin): ?>
															                      <a href="<?= $pub->linkedin ?>"><span class="container-in"><i class="fa fa-linkedin mr-0"></i></span></a>
															                      <?php endif; ?>
															                      <?php if ($pub->twitter): ?>
															                      <a href="<?= $pub->twitter ?>"><span class="container-tw"><i class="fa fa-twitter mr-0"></i></span></a>
															                      <?php endif; ?>
															                    </div>
															                    <?php endif; ?>

															                    <?php if ($pub->facebook || $pub->linkedin || $pub->twitter): ?>
															                    <p class="container-media mobile" style="margin-bottom: 0;">
															                      <?php if ($pub->facebook): ?> 
															                      <a href="<?= $pub->facebook ?>"><span class="container-fb" style="float: inherit"><i class="fa fa-facebook" style="vertical-align: text-top"></i></span></a>
															                      <?php endif; ?>
															                      <?php if ($pub->linkedin): ?>
															                      <a href="<?= $pub->linkedin ?>"><span class="container-in" style="float: inherit"><i class="fa fa-linkedin mr-0" style="padding:4px; margin-left: 0px; font-size: 13px; vertical-align: super;"></i></span></a>
															                      <?php endif; ?>
															                      <?php if ($pub->twitter): ?>
															                      <a href="<?= $pub->twitter ?>"><span class="container-tw" style="float: inherit"><i class="fa fa-twitter mr-0" style="padding:3px; margin-left: 0px; vertical-align: text-bottom;"></i></span></a>
															                      <?php endif; ?>
															                    </p>
															                    <?php endif; ?>
															                  </div>
															                </div>
															                <div class="job-style-bx container-img-oferta desk">
															                  <img src="<?= asset('local/resources/views/images/award.png') ?>" class="img-fluid img-oferta" alt="">
															                </div>
															              </div></a>
															        <?php else: ?>

															          <!-- CURSO GRATIS -->
															          <span id="url_'.$key->id.'" style="display:none;">detalleoferta/'.$key->id.'</span>
															          <div class="job-listing wtabs borde-urgente">
															          <div class="urgente"><span>Cursos</span></div>
															            <div class="job-title-sec container-desc-curso" ;>
															              <h3>
															                <a href="<?= url('detalle_curso', $pub->id) ?>" title="">
															                  <div style="font-size:22px; color: #494949" id="descripcion_'.$key->id.'"><?= $pub->titulo ?> <span class="link-urgente"><?= $pub->nombre ?></span></div>
															                </a>
															              </h3>
															              <p><span style="color: #555555; line-height: 18px; color: #494949">
															                <?= strlen($pub->descripcion) > 350 ? substr(strip_tags($pub->descripcion), 0, 350) . "..." : strip_tags($pub->descripcion) ?>
															                </span></p>
															              <br>
															            </div>
															          </div>
															          <a href=""></a>



															        <?php endif; ?>

															  <?php else: ?>

															<!-- Oferta normal -->
															<a href="../detalleoferta/<?= $pub->id ?>"><div class="job-listing wtabs">
															  <div class="mobile">
															        <img src="<?= $pub->confidencial == 'NO' || $pub->confidencial == null ? $pub->imagen == null ? asset('local/resources/views/images/company-avatar.png') : asset('uploads/'.$pub->imagen) : asset('local/resources/views/images/company-avatar.png') ?>" class="img-fluid img-oferta" alt="">
															        <?php if ($pub->plan_estado): ?>
															        <img src="<?= asset('local/resources/views/images/programas') ?>/<?= $pub->plan_estado ?>.png" alt="" class="img-fluid img-oferta">
															        <?php endif; ?>
															        <p class="nombre-img"><?php //= $pub->confidencial == 'NO' || $pub->confidencial == null ? $pub->nombre : 'Confidencial' ?></p>
															      </div>
															    <div class="job-title-sec container-desc-oferta">
															    <h5 class="title-recom"><?= $pub->titulo ?> <!-- <a href="#"><span style="float: right; color: #bbbbbb; font-size: 15px; font-weight: 400;"><sup>Denunciar</sup> <i class="fa fa-exclamation-circle exclamation-icon"></i></span></a> --></h5>
															      <p class="time-pub"><i class="fa fa-calendar"></i> Publicada <?= $pub->fecha_pub ?> a las <?= $pub->hora_pub ?> - Termina: <?= $pub->fecha_venc ?></p>
															      <p class="desc-oferta"><?= strlen($pub->descripcion) > 350 ? substr(strip_tags($pub->descripcion), 0, 350) . "..." : strip_tags($pub->descripcion) ?> </p>
															      <br>
															      <div class="job-lctn">
															        <?= $pub->confidencial == 'NO' || $pub->confidencial == null ? $pub->nombre : 'Confidencial' ?> 
															        <i class="fa fa-eye"></i><?= $pub->vistos ?>&nbsp;
															        <!-- <i class="fa fa-heart red"></i>3&nbsp; -->
															        <i class="fa fa-clock-o mr-0"></i>
															        <span class="disponibilidad"><?= $pub->disponibilidad ?></span>&nbsp;
															        <?php if ($pub->discapacidad == 'SI'): ?>
															        <i class="fa fa-wheelchair blue"></i>
															        <?php endif; ?>
															  
															        <?php if ($pub->facebook || $pub->linkedin || $pub->twitter): ?>
															        <div class="desk" style="float: right">
															          <?php if ($pub->facebook): ?> 
															          <a href="<?= $pub->facebook ?>"><span class="container-fb"><i class="fa fa-facebook"></i></span></a>
															          <?php endif; ?>
															          <?php if ($pub->linkedin): ?>
															          <a href="<?= $pub->linkedin ?>"><span class="container-in"><i class="fa fa-linkedin mr-0"></i></span></a>
															          <?php endif; ?>
															          <?php if ($pub->twitter): ?>
															          <a href="<?= $pub->twitter ?>"><span class="container-tw"><i class="fa fa-twitter mr-0"></i></span></a>
															          <?php endif; ?>
															        </div>
															        <?php endif; ?>
															        
															        <?php if ($pub->facebook || $pub->linkedin || $pub->twitter): ?>
															        <p class="container-media mobile" style="margin-bottom: 0;">
															          <?php if ($pub->facebook): ?> 
															          <a href="<?= $pub->facebook ?>"><span class="container-fb" style="float: inherit"><i class="fa fa-facebook" style="vertical-align: text-top"></i></span></a>
															          <?php endif; ?>
															          <?php if ($pub->linkedin): ?>
															          <a href="<?= $pub->linkedin ?>"><span class="container-in" style="float: inherit"><i class="fa fa-linkedin mr-0" style="padding:4px; margin-left: 0px; font-size: 13px; vertical-align: super;"></i></span></a>
															          <?php endif; ?>
															          <?php if ($pub->twitter): ?>
															          <a href="<?= $pub->twitter ?>"><span class="container-tw" style="float: inherit"><i class="fa fa-twitter mr-0" style="padding:3px; margin-left: 0px; vertical-align: text-bottom;"></i></span></a>
															          <?php endif; ?>
															        </p>
															        <?php endif; ?>
															      </div>
															    </div>
															    <div class="job-style-bx container-img-oferta desk">
															      <img src="<?= $pub->confidencial == 'NO' || $pub->confidencial == null ? $pub->imagen == null ? asset('local/resources/views/images/company-avatar.png') : asset('uploads/'.$pub->imagen) : asset('local/resources/views/images/company-avatar.png') ?>" class="img-fluid img-oferta" alt="">
															      <?php if ($pub->plan_estado): ?>
															      <img src="<?= asset('local/resources/views/images/programas') ?>/<?= $pub->plan_estado ?>.png" alt="" class="img-fluid img-oferta">
															      <?php endif; ?>
															      <p class="nombre-img"><?php //= $pub->confidencial == 'NO' || $pub->confidencial == null ? $pub->nombre : 'Confidencial' ?></p>
															    </div>
															  </div></a>
															  <?php endif; ?>

															<?php endforeach; ?>


																
															</div>
															
														</div>
													</div>
													<?php endif ?>
												</div>
												<div class="col-lg-3 column">
													<div class="job-overview" style="border: 0px;background-color: #fff;border:1px solid #c6c6c6;padding: 0px;"> 
														<ul style="border:0px;">
														 
															<li><i class="la la-file-text"></i><h3>Ofertas Publicadas</h3><span><?= $empresa[0]->total_ofertas ?></span></li>
															<li><i class="la la-bars"></i><h3>Actividad/Industria</h3><span><?= $empresa[0]->actividad_empresa ?></span></li>
																<?php if (($empresa[0]->facebook != "" || $empresa[0]->facebook != null) || ($empresa[0]->instagram != "" || $empresa[0]->instagram != null) || ($empresa[0]->twitter != "" || $empresa[0]->twitter != null) || ($empresa[0]->linkedin != "" || $empresa[0]->linkedin != null) || ($empresa[0]->web != "" || $empresa[0]->web != null)): ?>
															<li><i class="la la-bullhorn"></i>
																<h3>Redes Sociales</h3>
																<div class="share-bar">
																	<?php if ($empresa[0]->facebook != "" || $empresa[0]->facebook != null): ?>
																	<a href="<?= $empresa[0]->facebook ?>" title="" class="share-fb"><i style="position: initial; font-size: initial; color:inherit;" class="fa fa-facebook"></i></a>
																	<?php endif ?>
																	<?php if ($empresa[0]->instagram != "" || $empresa[0]->instagram != null): ?>
																	<a href="<?= $empresa[0]->instagram ?>" title="" class="share-ig"><i style="position: initial; font-size: initial; color:inherit;" class="fa fa-instagram"></i></a>
																	<?php endif ?>
																	<?php if ($empresa[0]->twitter != "" || $empresa[0]->twitter != null): ?>
																	<a href="<?= $empresa[0]->twitter ?>" title="" class="share-twitter"><i style="position: initial; font-size: initial; color:inherit;" class="fa fa-twitter"></i></a>
																	<?php endif ?>
																	<?php if ($empresa[0]->linkedin != "" || $empresa[0]->linkedin != null): ?>
																	<a href="<?= $empresa[0]->linkedin ?>" title="" class="share-lkd"><i style="position: initial; font-size: initial; color:inherit;" class="fa fa-linkedin"></i></a>
																	<?php endif ?>
																	<?php if ($empresa[0]->web != "" || $empresa[0]->web != null): ?>
																	<a href="<?= $empresa[0]->web ?>" title="" class="share-web"><i style="position: initial; font-size: initial; color:inherit;" class="la la-globe"></i></a>
																	<?php endif ?>
																</div>
															</li>
																<?php endif ?>
														</ul>
														</div><!-- Job Overview -->
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<?php include("includes/general_footer_empresas.php") ?>
					<?php include("local/resources/views/includes/login_register_modal.php");?>
					</div>
					
							<script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script> 
							<script src="../local/resources/views/js/script.js" type="text/javascript"></script> 
							<script src="../local/resources/views/plugins/notify.js" type="text/javascript"></script>
						</body>
					</html>