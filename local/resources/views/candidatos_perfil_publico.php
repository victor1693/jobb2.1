<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Jobbers Argentina</title>
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		 
 
		<?php include('local/resources/views/includes/google_analitycs.php');?>
		<?php // include('local/resources/views/includes/chat_soporte.php');?>
		<style type="text/css" media="screen">

			@media (min-width: 576px) { ... }
			#contenedor_header
				 {
				 	margin-top: 0px;
				 }
 
			@media (min-width: 768px) { ... }
 			#contenedor_header
				 {
				 	margin-top: -0px;
				 }
			@media (min-width: 992px) { 
				#contenedor_header
				 {
				 	margin-top: -150px;
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
			.detalle-expe-educ
			{
				background-color: #ebeef2; 
				padding: 15px;
				border-radius: 15px; 
				border:1px solid #cdd4de;
			}
			header
			{
				border-bottom: 1px solid rgba(255,255,255,0.3);
			}
		</style>	
	</head>
	<body style="background-color: #eeeeee">
		
	<?php $atras=1;?>
		<div class="theme-layout" id="scrollup">
			<!--Header responsive-->
			<?php include('local/resources/views/includes/general_header.php');?>
			<?php include('local/resources/views/includes/general_header_responsive.php');?>
			<!--fin Header responsive-->
			<section id="contenedor_header" class="overlape" >
				<div class="block no-padding">
					<div data-velocity="-.1" style="background: url(../local/resources/views/images/fondo_perfil_candidatos.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax" style="padding: 0px;height: 100px;"></div><!-- PARALLAX BACKGROUND IMAGE -->
					<div class="container fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="inner-header">
									<div class="container">
										<div class="row">
											<div class="col-lg-6">
												<div class="text-socail">
													<?php
													//datos_redes_sociales										 
													foreach ($datos_redes_sociales as $key) {
														if ($key->descripcion=="Facebook" && $key->red_social!="") {
													 
														echo '<a target="_blank" href="'.$key->red_social.'" title=""><i class="fa fa-facebook"></i></a>';
															}

															if ($key->descripcion=="Twitter" && $key->red_social!="") {
														echo '<a target="_blank" href="'.$key->red_social.'" title=""><i class="fa fa-twitter"></i></a>';
															}

															if ($key->descripcion=="Instagram" && $key->red_social!="") {
														echo '<a target="_blank" href="'.$key->red_social.'" title=""><i class="fa fa-instagram"></i></a>';
															}

															if ($key->descripcion=="Youtube" && $key->red_social!="") {
														echo '<a target="_blank" href="'.$key->red_social.'" title=""><i class="fa fa-youtube"></i></a>';
															}

															if ($key->descripcion=="Linkedin" && $key->red_social!="") {
														echo '<a target="_blank" href="'.$key->red_social.'" title=""><i class="fa fa-linkedin"></i></a>';
															}
													
													}
													?>  
												</div>
											</div>
											 
										
											<div class="col-lg-6">
												<div class="action-inner style2">
													<?php if($datos_cv_descargable[0]->cantidad>0): ?>
													<div class="download-cv">
														<a id="btn-descargar-cv" target="_blank" href="../descargar/<?php echo $datos_cv_descargable[0]->alias;?>" title="">Descargar CV <i class="la la-download"></i></a>
													</div>
													<?php endif ?>
													<?php if($datos_cv_descargable[0]->cantidad==0): ?>
													<div class="download-cv">
														<a id="btn-descargar-cv" target="_blank" href="../reporte/<?php echo $datos_personales[0]->id_usuario;?>" title="">Descargar CV <i class="la la-download"></i></a>
													</div>
													<?php endif ?>  
													<a href="#" title=""><i class="la la-map-marker"></i><?php echo $datos_datos_contacto[0]->provincia;?> / <?php echo $datos_datos_contacto[0]->localidad;?></a>
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
			<section class="overlape">
				<div class="block remove-top">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="cand-single-user">
									<div class="share-bar circle"></div>
									<div class="can-detail-s">
										<?php
										$imagen="";
										if(isset($datos_foto[0]->foto))
										{
											$imagen=$datos_foto[0]->foto;
										}
										?>
										<div class="cst"><img style="width: 144px;height: 144px;" src="../uploads/<?php echo $imagen;?>" alt=""></div>
										<h3  style="margin-bottom: 20px;"><?php echo $datos_personales[0]->nombres ." ".$datos_personales[0]->apellidos;?></h3> 
									</div>
									<div class="download-cv"></div>
								</div>
								<div class="col-lg-12 column" style="padding-left: 0px;padding-right: 0px;">
									<div class="job-overview style2" style="background-color: #ffffff;border: 1px dashed #969696;">
													<ul style="text-align: center;">
														<li style="font-weight: 600"><h3><i class="la la-money"></i>Salario </h3><span><?php echo $datos_preferencias_lab[0]->salario;?> $</span></li>
														<li style="font-weight: 600"><i class="la la-mars-double"></i><h3>Genero</h3><span><?php echo $datos_personales[0]->genero;?></span></li>
														<li style="font-weight: 600"><i class="la la-thumb-tack"></i><h3>Disponibilidad</h3><span><?php echo $datos_preferencias_lab[0]->nombre;?></span></li>
														<li style="font-weight: 600"><i class="la la-wheelchair"></i><h3>Discapacidad</h3><span><?php echo $datos_personales[0]->discapacidad;?></span></li>
														<li style="font-weight: 600"><i class="la la-child"></i><h3>Hijos</h3><span><?php echo $datos_personales[0]->hijos == 0 ? 'Sin hijos' : $datos_personales[0]->hijos . ' hijos' ?></span></li>
														<li style="font-weight: 600"><i class="la la-diamond"></i><h3>Estado civil</h3><span><?php echo $datos_personales[0]->edo_civil;?></span></li>

													</ul>
													</div>
								</div>
							
								<div class="cand-details-sec">
									<div class="row no-gape">
										<div class="col-lg-9 column" style="background-color: #fff;padding: 25px;border:1px solid #cdd4de;">
											<div class="cand-details">
													<div class="col-xs-12" style="text-align: center;padding-top: 0px;">
											                  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
											                  <!-- prueba 3 -->
											                  <ins class="adsbygoogle"
											                  style="display:block"
											                  data-ad-client="ca-pub-1968505410020323"
											                  data-ad-slot="2357238982"
											                  data-ad-format="auto"
											                  data-full-width-responsive="true"></ins>
											                  <script>
											                  (adsbygoogle = window.adsbygoogle || []).push({});
											                  </script>
											                </div> 
												<!-- Job Overview -->
													<h2>Acerca de <?php echo $datos_personales[0]->nombres;?></h2>
													<blockquote><span style="padding-left: 10px;padding-right: 10px;s"><?php echo $datos_personales[0]->sobre_mi;?></span> </blockquote> 
													<div class="edu-history-sec">
														<h2>Educación</h2>
														<?php foreach ($datos_educacion as $key): ?>
														<div class="edu-history detalle-expe-educ" >
															<i class="la la-graduation-cap"></i>
															<div class="edu-hisinfo">
																<h3><?php echo $datos_educacion[0]->nombre_institucion;?></h3>
																<i><?php echo $datos_educacion[0]->desde;?> - <?php echo $datos_educacion[0]->hasta;?></i>
																<span><?php echo $datos_educacion[0]->titulo;?><i><?php echo $datos_educacion[0]->area_estudio;?></i></span>
																<p></p>
															</div>
														</div>
														<?php endforeach ?>
													</div>
													<div class="edu-history-sec ">
														<h2>Experiencia laboral</h2>
														<?php foreach ($datos_experiencias as $key): ?>
															<div class="edu-history detalle-expe-educ">
														 	<i class="la la-industry"></i>
															<div class="edu-hisinfo">
																<h3><?php echo $key->nombre_empresa?> <span><?php echo $key->nombre?></span></h3>
																<i><?php echo $key->desde;?> - <?php echo $key->hasta;?></i>
																<p><?php echo $key->descripcion?></p>
															</div>
														</div> 
														<?php endforeach ?>
														
													</div> 
													
													<div class="companyies-fol-sec">
														<h2>Habilidades</h2>
														<div class="skills-badge" style="min-width: 500px;">
															<?php foreach ($datos_habilidades as $key): ?>
															<?php echo "<span style='background-color:#ffb203;color:#fff;'>".$key->habilidad."</span>";?>
															<?php endforeach ?>
														</div>
													</div>

													<div class="companyies-fol-sec">
														<h2>Idiomas</h2>
														<div class="skills-badge" style="min-width: 500px;">
															<?php foreach ($datos_idiomas as $key): ?>
															<?php echo "<span style='background-color:#ffb203;color:#fff;'>".$key->descripcion."</span>";?>
															<?php endforeach ?>
														</div>
													</div>

													<div class="companyies-fol-sec">
														<h2>Empresas seguidas</h2>
														<div class="cmp-follow">
															<div class="cmp-follow"><div class="row">
														<?php
														$contador=0;
														foreach ($datos_empresas_seguidas as $key): 

															$foto="../uploads/0.jpg";
															if($key->nombre_aleatorio!="")
															{
																$foto="../uploads/".$key->nombre_aleatorio;
															}
														?>
														<?php if ($contador<5): ?>
														 	<div class="col-sm-2">
																	<a href="#" title=""><img style="width: 80px;height: 80px;" src="<?php echo $foto;?>" alt=""><span><?php echo $key->nombre?></span></a>
																</div>
														 <?php $contador++; endif ?>  
														<?php endforeach ?>
															</div>
														</div> 
														</div>
													</div> 
												</div> 
											</div>
											<div class="col-lg-3 column" style="text-align: center;padding: 20px;padding-top: 0px;padding-right:0px;">
		 										<div class="job-overview style3" style="background-color: #fff;border:1px solid #cdd4de;padding-top: 15px; "> 
														<img style="border-radius: 50%;width: 75px;height: 75px;margin-left: -10px;" src="../uploads/<?php echo $imagen;?>" alt="">
														<br>
														<span style="background-color:#a9a9a9;color:#fff;border-radius: 10px;padding-left: 10px;padding-right: 10px;text-align: "> 
															<?php echo $datos_personales[0]->nombres ." ".$datos_personales[0]->apellidos;?>
														</span>
														<div style="background-color: #ebeef2;border:1px solid #bcc7d5;border-radius: 10px;margin-top: 10px;min-height: 300px;margin-top: 10px;text-align: center;">
																<span style="font-weight: 700;font-size: 13px;">Vista rápida</span>
																<br><br>   
															 
																<div style="font-size: 12px;text-align: left;padding: 5px;font-weight: 700;">
																	 <span style="color: #2e3192;">DNI:</span>
																		<span style="font-size: 12px;font-weight: 600;"> 
																		********
																	</span> 
																</div> 

																<div style="font-size: 12px;text-align: left;padding: 5px;font-weight: 700;">
																	 <span style="color: #2e3192;">CUIL:</span>
																		<span style="font-size: 12px;font-weight: 600;"> 
																		********
																	</span> 
																</div> 

																<div style="font-size: 12px;text-align: left;padding: 5px;font-weight: 700;">
																	 <span style="color: #2e3192;">F. Nacimiento:</span>
																		<span style="font-size: 12px;font-weight: 600;"> 
																		<?php echo fecha($datos_personales[0]->fecha_nac);?>
																	</span> 
																</div> 

																<div style="font-size: 12px;text-align: left;padding: 5px;font-weight: 700;">
																	 <span style="color: #2e3192;">Edad:</span>
																		<span style="font-size: 12px;font-weight: 600;"> 
																		<?php echo edad($datos_personales[0]->fecha_nac);?> Años
																	</span> 
																</div> 

																<div style="font-size: 12px;text-align: left;padding: 5px;font-weight: 700;">
																	 <span style="color: #2e3192;">Sexo:</span>
																		<span style="font-size: 12px;font-weight: 600;"> 
																		<?php echo $datos_personales[0]->genero;?>
																	</span> 
																</div>

																<div style="font-size: 12px;text-align: left;padding: 5px;font-weight: 700;">
																	 <span style="color: #2e3192;">Hijos:</span>
																		<span style="font-size: 12px;font-weight: 600;"> 
																		<?php echo $datos_personales[0]->hijos == 0 ? 'Sin hijos' : $datos_personales[0]->hijos . ' hijos' ?>
																	</span> 
																</div>
																<div style="font-size: 12px;text-align: left;padding: 5px;font-weight: 700;">
																	 <span style="color: #2e3192;">Discapacidad:</span>
																		<span style="font-size: 12px;font-weight: 600;"> 
																		<?php echo $datos_personales[0]->discapacidad;?>
																	</span> 
																</div>
																<div style="font-size: 12px;text-align: left;padding: 5px;font-weight: 700;">
																	 <span style="color: #2e3192;">Edo. Civil:</span>
																		<span style="font-size: 12px;font-weight: 600;"> 
																		<?php echo $datos_personales[0]->edo_civil;?>
																	</span> 
																</div>

																

																<div style="font-size: 12px;text-align: left;padding: 5px;font-weight: 700;">
																	 <span style="color: #2e3192;">Cant. Trabajos:</span>
																		<span style="font-size: 12px;font-weight: 600;"> 
																		 <?php echo count($datos_experiencias);?>
																	</span> 
																</div>
  
																<div style="font-size: 12px;text-align: left;padding: 5px;font-weight: 700;">
																	 <span style="color: #2e3192;">Idiomas:</span>
																		<span style="font-size: 12px;font-weight: 600;"> 
																			<?php if (count($datos_idiomas)>0): ?>
																					<?php 
																					$contador=0;
																					foreach ($datos_idiomas as $key): ?>
																						<?php if ($contador==0): ?>
																							<?php echo $key->descripcion; $contador=1;?> 
																						<?php else: ?>
																							<?php echo $key->descripcion;?> 
																					<?php endif ?>
																					<?php endforeach ?>
																			<?php else: ?>
																				<?php echo 'Sin información';?> 
																			<?php endif ?>
																		
																	</span> 
																</div>

																<div style="font-size: 12px;text-align: left;padding: 5px;font-weight: 700;">
																	 <span style="color: #2e3192;">Salario pretendido:</span>
																		<span style="font-size: 12px;font-weight: 600;"> 
																		<?php echo $datos_preferencias_lab[0]->salario;?> $
																	</span> 
																</div>

																<div style="font-size: 12px;text-align: left;padding: 5px;font-weight: 700;">
																	 <span style="color: #2e3192;">Disponibilidad:</span>
																		<span style="font-size: 12px;font-weight: 600;"> 
																		<?php echo $datos_preferencias_lab[0]->nombre;?>
																	</span> 
																</div>

																<div style="font-size: 12px;text-align: left;padding: 5px;font-weight: 700;">
																	 <span style="color: #2e3192;">Dirección:</span>
																		<span style="font-size: 12px;font-weight: 600;"> 
																		<?php echo $datos_datos_contacto[0]->provincia;?> / <?php echo $datos_datos_contacto[0]->localidad;?>
																	</span> 
																</div>
																<button onClick="descargar_cv()" type="button" class="form-control" href="#" style="background-color:#ffb203;color:#fff;padding: 5px;margin-top: 10px;margin-bottom: 10px;border-radius: 5px;width: 100%;">Descargar CV</button>

															</div>
 															 <div style="text-align: justify;">
 															 	<img onClick="location.href='../noticias'" style="cursor: pointer;" src="../local/resources/views/images/jobbers-noticias.jpg">
 															 	<p style="line-height: 14px;font-size: 13px;"><strong>Jobbers</strong> te mantiene informado materia laboral y de emprendimiento profecional
 															 		<a href="../noticias" style="color: #2e3192;text-decoration: underline;font-size: 13px;font-weight: 600;float: right;margin-top: 15px;">Ver noticias</a>
 															 		</p> 
 															 			
 															 		 
 															 </div>

											                 <div class="col-xs-12" style="margin-top: 20px;text-align: center;padding-top: 0px;">
											                  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
											                  <!-- prueba 3 -->
											                  <ins class="adsbygoogle"
											                  style="display:block"
											                  data-ad-client="ca-pub-1968505410020323"
											                  data-ad-slot="2357238982"
											                  data-ad-format="auto"
											                  data-full-width-responsive="true"></ins>
											                  <script>
											                  (adsbygoogle = window.adsbygoogle || []).push({});
											                  </script>
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
					 <?php include("local/resources/views/includes/general_footer.php");?>
					</div> 
					<script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script> 
					<script src="../local/resources/views/js/script.js" type="text/javascript"></script> 
					<script src="../local/resources/views/js/parallax.js" type="text/javascript"></script> 
					<script type="text/javascript">
						$( document ).ready(function() {
						
						});
					function descargar_cv()
					{ 
						window.location = $('#btn-descargar-cv').attr('href');
					}
					</script>
					<?php function fecha($fecha)
					{
						$old=explode("-", $fecha);
						$new=$old[2]."-".$old[1]."-".$old[0];
						return $new;
					}
					function edad($fecha)
					{
						$fecha1 = explode("-",$fecha); // fecha nacimiento 
						$fecha2 = explode("-",date("Y-m-d")); // fecha actual 

						$Edad = $fecha2[0]-$fecha1[0]; 
						if($fecha2[1]<=$fecha1[1] and $fecha2[2]<=$fecha1[2]){ 
						$Edad = $Edad - 1; 
						} 
						return $Edad;
					}
					?>
				</body>
			</html>