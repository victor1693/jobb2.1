<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Jobbers Argentina</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers"> 
	<link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="local/resources/views/css/icons.css">
	<link rel="stylesheet" href="local/resources/views/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
	<link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
	<link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
	<link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
	<style type="text/css">
		.chosen-single
		{
			border: 1px solid #ddd;
			border-radius: 5px;
		}
	</style>
	<?php include('local/resources/views/includes/google_analitycs.php');?>
</head>
<body> 
<div class="theme-layout" id="scrollup"> 
	  <?php include('local/resources/views/includes/general_header.php');?>
	  <?php include('local/resources/views/includes/general_header_responsive.php');?>
	<section class="section-home-header">
		<div class="block no-padding overlape">
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="main-featured-sec style3">
							<ul class="main-slider-sec style3 text-arrows">
								<li><img src="local/resources/views//images/fondo_home.jpg" alt="" /></li> 
							</ul>
							<div class="job-search-sec style3">
								<div class="job-search style2">
									<div style="color: #fff;text-align: center;margin-bottom: -120px;">
									<h3 style="font-size: 42px;">Si lo puedes imaginar lo puedes lograr.</h3>
									<span>Jobbers y sus empresas aliadas te ayudan a lograr esos sueños que siempre quisiste.</span> 
										<h3 class="members-count"><span style="font-size: 24px;"> Hoy somos </span><?= $candidatos[0]->cantidad;?><span style="font-size: 24px;"> candidatos</span></h3> 
									</div>

									<div class="search-job2 style2" style="border: 2px solid #d4d4d4;border-radius: 4px; text-align: center">	
										<form method="get" action="ofertas">
											<div class="row no-gape" style="margin-top: 0px; background-image: url(local/resources/views/empresas/app-assets/images/logo/bg-3.jpg)">
												<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
													<div class="job-field">
														<label style="margin-top: 10px;font-weight: 600;font-size: 16px;padding-left: 0px;">Buscador de ofertas</label>
														<input autocomplete="false" name="buscar" class="input-search-home" style="border: 1px solid #ddd;padding: 3px;height: 40px; border-radius: 4px;margin-left: 25px;margin-right: 25px; text-align: center" type="text" placeholder="Programador, Consultor, Analísta" />
													</div>
												</div> 
												<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
													<button style="background-color: #2e3192;" type="submit" class="btn-search-home"><i class="la la-search"></i>BUSCAR</button>
												</div>
											</div>
										</form>
									</div><!-- Job Search 2 -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> 
	<section>
		<div class="block gray double-gap-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-12" style="margin-bottom: 25px;">
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

					<div class="col-lg-12">
						<div class="heading">
							<h2>Categorías con más ofertas</h2> 
						</div><!-- Heading -->
						
						<div class="cat-sec style2">
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
									<div class="p-category style2" style="border: 1px solid #cbcbcb;">
										<a href="ofertas?pagina=&buscar=&sector=<?= $categorias[0]->sector?>" title="">
											<i class="la la-industry"></i>
											<span><?= $categorias[0]->sector?></span>
											<p>(<?= $categorias[0]->cantidad?> ofertas)</p>
										</a>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="p-category style2" style="border: 1px solid #cbcbcb;">
										<a href="ofertas?pagina=&buscar=&sector=<?= $categorias[1]->sector?>" title="">
											<i class="la la-bar-chart"></i>
											<span><?= $categorias[1]->sector?></span>
											<p>(<?= $categorias[1]->cantidad?> ofertas)</p>
										</a>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="p-category style2" style="border: 1px solid #cbcbcb;">
										<a href="ofertas?pagina=&buscar=&sector=<?= $categorias[2]->sector?>" title="">
											<i class="la la-shopping-cart"></i>
											<span><?= $categorias[2]->sector?></span>
											<p>(<?= $categorias[2]->cantidad?> ofertas)</p>
										</a>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="p-category style2" style="border: 1px solid #cbcbcb;">
										<a href="ofertas?pagina=&buscar=&sector=<?= $categorias[3]->sector?>" title="">
											<i class="la la-users"></i>
											<span><?= $categorias[3]->sector?></span>
											<p>(<?= $categorias[3]->cantidad?> ofertas)</p>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="browse-all-cat">
							<a style="background-color: #ffb203;color: #fff;" href="ofertas" title="" class="style2">Ver más ofertas</a>
						</div>
					</div>
					<div class="col-sm-12" style="margin-top: 25px;">
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<ins class="adsbygoogle"
						style="display:block"
						data-ad-format="fluid"
						data-ad-layout-key="-gs-18+5m+32-1f"
						data-ad-client="ca-pub-1968505410020323"
						data-ad-slot="2781120636"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section style="border-top: 1px solid #ddd;border-bottom: 1px solid #ddd;">
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>¿Cómo funciona?</h2>
							<span>En Jobbers nos preocupamos por facilitarte tu elección de trabajo. <br>Y nuestros <?= $postulados[0]->cantidad;?> postulados lo confirman.
							</span>
						</div><!-- Heading -->
						<div class="how-to-sec style2 no-lines">
							<div class="how-to">
								<span class="how-icon" style="color: #2e3192;"><i class="la la-user"></i></span>
								<h3><a href="registrar">Créate una cuenta nueva</a></h3>
								<p>Con solo colocar un correo o clave la puedes tener una cuenta Jobbers  y si te parece complejo puedes registrarte con tus redes sociales.</p>
							</div>
							<div class="how-to">
								<span class="how-icon"  style="color: #2e3192;"><i class="la la-file-archive-o"></i></span>
								<h3><a href="ofertas">Busca el trabajo que necesitas</a></h3>
								<p>Con una vista facil y rápida listamos los mejores trabajos para tí Jobbers pone a tu disposición 11 tipos de filtros para ayudarte a econtrar tu próximo trabajo</p>
							</div>
							<div class="how-to">
								<span class="how-icon" style="color: #2e3192;"><i class="la la-list"></i></span>
								<h3>Aplicar al trabajo</h3>
								<p>Una vez encontrado el trabajo que buscabas simplemente haz click en el botón "Postularme"
								 y listo. Así de facil es conseguir trabajo con Jobbers!
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="block gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>En Jobbers crecemos constantemente</h2>
							<span>Producto de mucho esfuerzo constancia y dedicación Jobbers hoy es el portal de empleo número uno en Córdoba con altas proyecciones a seguirse expandiendo.</span>
						</div><!-- Heading -->
						<div class="stats-sec style2">
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="stats">
										<span style="color: #2e3192;"><?= ($ofertas[0]->cantidad);?></span>
										<h5>Ofertas</h5>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="stats">
										<span style="color: #2e3192;"><?= $empresas[0]->cantidad;?></span>
										<h5>Empresas</h5>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="stats">
										<span style="color: #2e3192;"><?= $candidatos[0]->cantidad;?></span>
										<h5>Candidatos</h5>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="stats">
										<span style="color: #2e3192;"><?= $postulados[0]->cantidad;?></span>
										<h5>Postulados</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	  <?php
                              function programa($parametro)
                              {
                                $imagen="";
                                if($parametro!="")
                                {
                                  if($parametro=='PPPA-Cambio empresa')
                                  {
                                   $imagen="local/resources/views/images/programas/ppp.png";
                                  }
                                  else if($parametro=='PPP-Cambio empresa')
                                  {
                                     $imagen="local/resources/views/images/programas/pppp.png";
                                  }
                                  else if($parametro=='MAS Y MEJOR TRABAJO')
                                  {
                                     $imagen="local/resources/views/images/programas/jovenes.png";
                                  }

                                  else if($parametro=='PILA-Cambio empresa')
                                  {
                                     $imagen="local/resources/views/images/programas/pila.png";
                                  }
                                  else if($parametro=='XMI')
                                  {
                                     $imagen="local/resources/views/images/programas/xmi.png";
                                  }
                                  else if($parametro=='PIP-Cambio empresa')
                                  {
                                     $imagen="local/resources/views/images/programas/pip.png";
                                  }
                                   return '<div><img style="height:30px;width:auto;" alt="" class="img-fluid img-oferta" src="'.$imagen.'">
                                        </img></div>';
                                   
                                }
                              }
                              ?>
	<section style="border-top: 1px solid #ddd;border-bottom: 1px solid #ddd;">
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="tab-sec">
							<ul class="nav nav-tabs">
							  <li><a class="current" data-tab="fjobs">Últimas ofertas</a></li>
							  <li><a data-tab="rjobs">Últimas noticias</a></li>
							</ul>
							<div id="fjobs" class="tab-content current">
								<div class="job-listings-tabs">
									<div class="row">
										<?php 
										$contador=1;
										foreach ($ultimas_ofertas as $key): ?> 
										<?php if ($contador<11): ?> 
										<div class="col-lg-6">
											<div class="job-listing wtabs">
												<div class="job-title-sec">
													<div class="c-logo"> 
														<?php if ($key->confidencial==0): ?>
				                                          <img alt="" style="idth: 100px;height: 100px;margin-right: 15px;" class="img-fluid img-oferta" src="uploads/min/<?= $key->img_profile?>">
				                                        </img>
				                                        <?php else: ?>
				                                            <img alt="" style="idth: 100px;height: 100px;margin-right: 15px;" class="img-fluid img-oferta" src="<?= Request::root()?>/local/resources/views/images/confidencial.png">
				                                        </img>
				                                      <?php endif ?>
														 
														 <?php echo  programa($key->plan_estado);?>
													</div>
													<h3><a href="ofertas-de-trabajo/<?= $key->id;?>" title="" style="font-size: 16px;font-weight: 600; text-decoration: underline !important; color: #0099ff;"><?= ucfirst(mb_strtolower($key->titulo))?></a></h3>
													 
													<div class="job-lctn"><a class="success" href="#"><?= ucfirst(mb_strtolower($key->nombre))?></a></div><br>
													<div class="job-lctn"><?= ucfirst(mb_strtolower($key->vistas))?> visitas</div>
												</div>
												<div class="job-style-bx" style="margin-top: 0px;">
													<button onclick="location.href='ofertas-de-trabajo/<?= $key->id;?>'" style="font-size: 14px; float: none" class="btn btn-primary" type="button">Ver oferta</button> 
												</div>
											</div><!-- Job --> 
										</div> 
										<?php endif ?> 
										<?php $contador++;?>
										<?php endforeach ?>
									</div>
								</div>
							</div>
							<div id="rjobs" class="tab-content">
								<div class="job-listings-tabs">
									<div class="row">
										  <?php 
										$contador=1;
										foreach ($ultimas_noticias as $key): ?> 
										<?php if ($contador<11): ?> 
										<div class="col-lg-6">
											<div class="job-listing wtabs">
												<div class="job-title-sec">
													<div class="c-logo"> <img style="width: 100px;height: 100px;margin-right: 15px;" src="imagenes_noticias/<?=$key->foto?>" alt="" /> </div>
													<h3><a href="noticias/<?= $key->id;?>" title="" style="font-size: 16px;font-weight: 600; text-decoration: underline !important; color: #0099ff;"><?= ucfirst(mb_strtolower($key->titulo))?></a></h3>
													 
													<div class="job-lctn"><a class="success" href="#"><?= ucfirst(mb_strtolower($key->descripcion))?></a></div> 
													 
												</div>
												<div class="job-style-bx" style="margin-top: 0px;">
													<button onclick="location.href='noticias/<?= $key->id;?>'" style="font-size: 14px; float: none" class="btn btn-primary" type="button">Ver noticia</button> 
												</div>
											</div><!-- Job --> 
										</div> 
										<?php endif ?> 
										<?php $contador++;?>
										<?php endforeach ?>
									</div>
								</div>
							</div> 
						</div>
					</div>
				</div>
			</div>	
		</div>
	</section>
 
	 <section>
		<div class="block gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Las mejores empresas con Jobbers</h2>
							<span></span>
						</div><!-- Heading -->
						<div class="top-company-sec">
							<div class="row" id="companies-carousel">
								<?php foreach ($top_empresas as $key): ?> 
								<div class="col-lg-3">
									<div class="top-compnay style2">
										<a href="empresa/detalle/<?= $key->id_empresa;?>" title=""><img style="height: 200px;width: auto;" src="uploads/min/<?= $key->img_profile;?>" alt="" /></a>
										<h3><a href="empresa/detalle/<?= $key->id_empresa;?>" title=""><?= $key->nombre?></a></h3>
										<span><?= $key->direccion?></span>
										<a href="empresa/detalle/<?= $key->id_empresa;?>" title=""><?= $key->cantidad?> Ofertas</a>
									</div><!-- Top Company -->
								</div> 
							<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</section> 
	 
 <section style="border-top: 1px solid #ddd;border-bottom: 1px solid #ddd;">
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 column">
						<div class="heading left">
							<h2>¿Qué te recomendamos en Jobbers?</h2>
						</div><!-- Heading -->
						<div id="toggle-widget" class="experties"  style="background-color: #fff;">
							<h2  style="padding-top: 10px;padding-bottom: 10px; background-color: #ececec;border: 1px solid #ddd;">Preguntas frecuentes en una entrevista</h2>
							<div class="content" style="border: 1px solid #ddd;">
								<p style="margin: 0px;padding: 0px;font-weight: 600;">¿Qué sabes de Jobbers?</p>
								<p style="padding-top: 0px;"> Contestarla bien es esencial, pues con la cantidad de medios existentes hoy en día para informarse, solo podría interpretarse como una falta absoluta de interés por el puesto.</p>

								<p style="margin: 0px;padding: 0px;font-weight: 600;">¿Por qué dejaste tu empleo anterior?</p>
								<p style="padding-top: 0px;">  Sirve para conocer tus trabajos anteriores y como fue tu evolución en ellos. Sin embargo, también dejará a la vista tu predisposición a hablar mal de una empresa, un jefe, etc. Este último caso será, desde luego, un motivo para ser descartado del proceso.</p>

								<p style="margin: 0px;padding: 0px;font-weight: 600;">¿Cuál fue el mayor error que cometiste en tu anterior trabajo?</p>
								<p style="padding-top: 0px;">Tranquilo. Todos comentemos errores. Lo que el seleccionador quiere saber es cual es tu visión sobre el tema, y qué capacidad de asumir errores y de aprender de ellos tienes.</p>
							</div>  

							<!--<h2  style="padding-top: 10px;padding-bottom: 10px; background-color: #ececec;border: 1px solid #ddd;">Que hacer en una entrevista</h2>
							<div class="content"  style="border: 1px solid #ddd;">
							 </div> 

							 <h2  style="padding-top: 10px;padding-bottom: 10px; background-color: #ececec;border: 1px solid #ddd;">Que no hacer en una entrevista</h2>
							<div class="content"  style="border: 1px solid #ddd;">
							 </div> -->
						</div>


					</div>
					<div class="col-lg-4 column">
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.1&appId=1480600512039518&autoLogAppEvents=1';
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>

						<div class="fb-page" data-href="https://www.facebook.com/jobbersargentina" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/jobbersargentina" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/jobbersargentina">Jobbers</a></blockquote></div>
					
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
 <?php include('local/resources/views/includes/general_footer.php');?>

<script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script>
<script src="local/resources/views/js/modernizr.js" type="text/javascript"></script>
<script src="local/resources/views/js/script.js" type="text/javascript"></script>
<script src="local/resources/views/js/wow.min.js" type="text/javascript"></script>
<script src="local/resources/views/js/slick.min.js" type="text/javascript"></script>
<script src="local/resources/views/js/parallax.js" type="text/javascript"></script>
<script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script>
<script src="local/resources/views/js/counter.js" type="text/javascript"></script>
<script src="local/resources/views/js/mouse.js" type="text/javascript"></script>

</body>
</html>

