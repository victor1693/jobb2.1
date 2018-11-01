<!DOCTYPE html>
<html>
	<head>
		 
		<meta property='og:image' content='http://jobbersargentina.net/jobbersv2/uploads/min/<?php echo $datos[0]->imagen;?>'/>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Jobbers Argentina</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		 
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="../local/resources/views/css/icons.css">
		<link rel="stylesheet" href="../local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
		
		<!-- <link href="../local/resources/views/plugins/btn_social/assets/css/bootstrap.css" rel="stylesheet"> -->
    	<link href="../local/resources/views/plugins/btn_social/assets/css/font-awesome.css" rel="stylesheet">
     
		<link rel="stylesheet" type="text/css" href="../local/resources/views/plugins/btn_social/bootstrap-social.css" />

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
		  (adsbygoogle = window.adsbygoogle || []).push({
		    google_ad_client: "ca-pub-1968505410020323",
		    enable_page_level_ads: true
		  });
		</script>
		<?php include('local/resources/views/includes/chat_soporte.php');?>
		<?php include('local/resources/views/includes/google_analitycs.php');?>
	</head>
	<body>
	  <?php $atras=1;?>
	  <?php include('local/resources/views/includes/general_header.php');?>
      <?php include('local/resources/views/includes/general_header_responsive.php');?>
		<section class="overlape">
			<div class="block no-padding">
				<div data-velocity="-.1" style="background: url(../local/resources/views/images/fondo_detalle_oferta.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
				<div class="container fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="inner-header">
								<h3><?php echo $datos[0]->titulo;?></h3>
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
						<div class="col-lg-12 column">
							<div class="job-single-sec style3">
								<div class="job-head-wide">
									<div class="row">
										<div class="col-lg-8">
											<div class="job-single-head3 emplye">
												<?php  
													$imagen = $datos[0]->confidencial == 'NO' || $datos[0]->confidencial == null ? "../uploads/min/".$datos[0]->imagen : "../uploads/min/empresa.jpg";
													$empresa = $datos[0]->confidencial == 'NO' || $datos[0]->confidencial == null ? '<a href="../empresa/detalle?e='.$datos[0]->id_empresa.'">'.$datos[0]->empresa.'</a>' : '<a href="javascript:void(0)">Confidencial</a>';
												?>
												<div class="job-thumb"> <img src="<?= $imagen ?>" alt="Logo de empresa"></div>
												<div class="job-single-info3">

													<h3><?= $empresa ?></h3>
													<?php if ($datos[0]->dir_empresa != null): ?>
													<span><i class="la la-map-marker d-none"></i><?php echo $datos[0]->dir_empresa;?></span>
													<?php else: ?>
													<span><i class="la la-desktop d-none"></i><?php echo $datos[0]->modalidad_curso;?></span> <span style="margin-left: 10px"><i class="la la-clock-o d-none"></i><?php echo $datos[0]->duracion;?></span>
													<?php endif; ?>
													<ul class="tags-jobs">
														<li><i class="la la-calendar-o d-none"></i> Publicado: <?php echo $datos[0]->tmp;?></li>
														<li><i class="la la-eye d-none"></i> Vistas: <?php echo $datos[0]->vistos;?></li>
													</ul>
												</div>
												</div><!-- Job Head -->
											</div>
											<div class="col-lg-4">
												<div class="text-center">
													<h3 style="color:#2E3192;margin-bottom: 5px"><?= $datos[0]->precio ?></h3>
													<button class="button" style="margin: 0 auto; float:none !important" id="info">Solicitar información</button>
												</div>
											</div>
											 
										</div>
									</div>
									<div class="job-wide-devider">
										<div class="row">
											<div class="col-lg-8 column">
												<div class="job-details">
													<h3><?php echo $datos[0]->titulo;?></h3>

													
													<br>
													<p><?php echo $datos[0]->descripcion;?> </p> 
													<div class="col-xs-12">
														<div class="col-sm-3">
														<p><a class="btn btn-block btn-social btn-facebook" href="https://www.facebook.com/sharer.php?s=100&p[url]=http%3A%2F%2Fjobbersargentina.net%2Fjobbersv2%2Fdetalleoferta%2F<?php echo $datos[0]->id;?>" target="_blank">
										           	 <span class="fa fa-facebook"></span> Compartir
										          	</a></p>
													</div>
													<div class="col-sm-3">
														<p><a class="btn btn-block btn-social btn-linkedin" href="http://www.linkedin.com/shareArticle?url=http%3A%2F%2Fjobbersargentina.net%2Fjobbersv2%2Fdetalleoferta%2F<?php echo $datos[0]->id;?>"  target="_blank">
										           	 <span class="fa fa-linkedin"></span> Compartir
										          	</a></p>
													</div>
													<div class="col-sm-3">
														<p><a class="btn btn-block btn-social btn-twitter"  href="https://twitter.com/share?url=http%3A%2F%2Fjobbersargentina.net%2Fjobbersv2%2Fdetalleoferta%2F<?php echo $datos[0]->id;?>" target="_blank">
										           	 <span class="fa fa-twitter"></span> Compartir
										          	</a></p>
													</div>
													<div class="col-sm-3">
														<p><a class="btn btn-block btn-social btn-google" href="https://plus.google.com/share?url=http%3A%2F%2Fjobbersargentina.net%2Fjobbersv2%2Fdetalleoferta%2F470">
										           	 <span class="fa fa-google"></span> Compartir
										          	</a></p>
													</div>
													</div>
												</div> 
											</div>
											<div class="col-lg-4 column">
												
													<div class="quick-form-job">
														<h3>¿Quieres más información?</h3>
														<span class="text-muted" style="font-size: 14px">Rellena el formulario para que el centro contacte contigo</span>
														<form method="post" action="<?= url('empresa/request_info_curso') ?>" id="form_solicitud" style="margin-top: 10px">
															
															<?= csrf_field() ?>

															<input type="hidden" name="id_pub" value="<?= $datos[0]->id ?>">
															<div class="pf-field" style="margin-bottom: 20px;">
																<input type="text" name="nombres" id="nombres" placeholder="Nombres">
															</div>

															<div class="pf-field" style="margin-bottom: 20px;">
																<input type="text" name="apellidos" placeholder="Apellidos">
															</div>

															<div class="pf-field" style="margin-bottom: 20px;">
																<input type="text" name="correo" placeholder="Email">
															</div>

															<div class="pf-field" style="margin-bottom: 20px;">
																<input type="text" name="celular" placeholder="Celular. Ej: +54635754125">
															</div>

															<div class="pf-field" style="margin-bottom: 20px;">
																<select data-placeholder="Selecciona provincia" class="chosen" name="provincia" id="provincia" onchange="getLocalidad(this.value)">
																	<option value="">Selecciona provincia</option>
																	<?php foreach ($provincias as $provincia): ?>
																		<option value="<?= $provincia->id ?>"><?= $provincia->provincia ?></option>
																	<?php endforeach; ?>
																</select>
															</div>

															<div class="pf-field" style="margin-bottom: 20px;">
																<select data-placeholder="Selecciona localidad" class="chosen" name="localidad" id="localidad">
																</select>
															</div>
															<button class="submit" id="submit_solicitud">Solicitar información</button>
														</form>
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
				<?php include("local/resources/views/includes/general_footer.php");?>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="modalSalario" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			  <div class="modal-dialog modal-sm" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			              <h4 class="modal-title" id="myModalLabel">Salario pretendido</h4>
			            </div>
			            <form action="<?= url('candipostular') ?>" method="post">
			            	<div class="modal-body">
			            		<input type="hidden" name="id_pub" value="<?= $datos[0]->id ?>">
			            		<?= csrf_field() ?>
			            	  
			            	
			            	</div>
			            	<div class="modal-footer" style="margin-top: 20px !important">
			            	  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			            	  <button type="submit" class="btn btn-primary" id="postular" style="margin-right: 5px !important">Postular</button>
			            	</div>
			            </form>
			    </div>
			  </div>
			</div>
			<?php include("local/resources/views/includes/login_register_modal.php");?>
			<script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
			<script src="../local/resources/views/js/modernizr.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/script.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/wow.min.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/slick.min.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/parallax.js" type="text/javascript"></script>
			<script src="../local/resources/views/js/select-chosen.js" type="text/javascript"></script> 
			<script src="../local/resources/views/plugins/notify.js" type="text/javascript"></script>
			<script src="../local/resources/views/plugins/btn_social/assets/js/docs.js"></script>
			<script>
				<?php if (isset($_REQUEST['info']) && $_REQUEST['info'] != ""): ?>

					$.notify("<?= $_REQUEST['info'] ?>", {
						className:"error",
						globalPosition: "bottom center"
					});

				<?php endif; ?>

				<?php if (isset($_REQUEST['r']) && $_REQUEST['r'] == 1): ?>

					$.notify("Se ha enviado su solicitud, la empresa se contactará con ud.", {
						className:"success",
						globalPosition: "bottom center"
					});

				<?php endif; ?>

				<?php if (count($errors)>0): ?> // mostrar errores si existen.

					<?php foreach ($errors->all() as $error): ?>

						$.notify("<?= $error ?>", {
							className:"error",
							globalPosition: "bottom center"
						});

					<?php endforeach; ?>

				<?php endif; ?>

				$('#info').on('click', function(){
					$('#nombres').focus();
				});

				$('#submit_solicitud').on('click', function(e){
					// e.preventDefault();
					$(this).prop('disabled', true);
					$('#form_solicitud').submit();
				});

				function getLocalidad(id_provincia){
					if (id_provincia != 0) {
						$.ajax({
							url: '<?= url("localidades") ?>/'+id_provincia,
							type: 'GET',
							dataType: 'json',
							beforeSend: function(){
								$('#localidad').html('<option value="">Cargando...</option>').prop('disabled', true).trigger('chosen:updated');
							},
							success: function(response){
								if (response.status == 1) {
									let html = '<option value="">Selecciona localidad</option>';
									response.localidades.forEach(function(localidad){
										html += '<option value="'+localidad.id+'">'+localidad.localidad+'</option>';
									});
									$('#localidad').html(html).trigger('chosen:updated');
								} else {
									$.notify("Error al cargar las localidades", {
										className:"error",
										globalPosition: "bottom center"
									});
								}
							},
							error: function(){
								alert("Lo sentimos, ha ocurrido un error inesperado. Por favor recargue la pagina");
								$('#localidad').html('<option value="0">Seleccionar</option>').trigger('chosen:updated');
							},
							complete: function(){
								$('#localidad').prop('disabled', false).trigger('chosen:updated');
							}
						});
					} else {
						$('#localidad').html('<option value="0">Seleccionar</option>').trigger('chosen:updated');
					}
				}
			</script>
		</body>
	</html>