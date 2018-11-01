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
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
		<link rel="stylesheet" href="local/resources/views/css/icons.css"> 
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" /> 
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" /> 
		<?php include("local/resources/views/includes/chat_soporte.php");?>
		<?php include('local/resources/views/includes/google_analitycs.php');?>
	</head>
	<body>
		<?php include('local/resources/views/includes/general_header.php');?>
		<?php include('local/resources/views/includes/general_header_responsive.php');?>

		<section class="section-offers">
			<div class="block back-offers">
				<div class="container">
					<div class="row">
						<div class="col-lg-9 col-md-9 column" style="padding-top: 10px;">
							  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				              <div class="col-xs-12" style="text-align: center;padding-top: 0px;margin-bottom: 30px;">
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
							<div id="carousel-news" class="carousel slide" data-ride="carousel" style="display: none;">

								<!-- Wrapper for slides -->
								<div class="carousel-inner carousel-height" role="listbox">

									<div class="item active">
										<img src="https://via.placeholder.com/900x350" alt="..." class="carousel-height" style="width: 100%;">
										<div class="carousel-caption">
											<h3>Jobbers Argentina</h3>
											<p>Publicidad</p>
										</div>
									</div>

									<div class="item">
										<img src="https://via.placeholder.com/900x350" alt="..." class="carousel-height" style="width: 100%;">
										<div class="carousel-caption">
											<h3>Jobbers Argentina</h3>
											<p>Publicidad</p>
										</div>
									</div>
								</div>

								<!-- Controls -->
								<a class="left carousel-control" href="#carousel-news" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#carousel-news" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							<div class="bloglist-sec">
								<?php foreach ($datos as $key): ?>
								
								<div class="col-sm-12 blogpost style2 filter-offer">
										
									<div class="blog-posthumb"> <a href="noticias/<?php echo $key->id;?>" title="">

										<?php if ($key->foto!=""): ?>
											<img style="width: 322px;max-height: 280px;border-radius: 10px;border:1px solid #e0e0e0;" src="imagenes_noticias/<?php echo $key->foto;?>" alt="" />
										<?php endif ?> 
									</a> </div>
								
									<div class="blog-postdetail" style="text-align: justify;">
										<ul class="post-metas"><li><a href="#" title=""><i class="la la-calendar-o"></i><?php echo $key->tmp;?></a></li><li><a class="metascomment" href="#" title=""></ul>
										<h3><a href="noticias/<?php echo $key->id;?>" title=""><?php echo $key->titulo;?></a></h3>
										<p><?php echo strlen($key->descripcion) > 300 ? (substr(strip_tags($key->descripcion), 0, 300)."...") : strip_tags($key->descripcion); ?></p>
										<a class="bbutton" href="noticias/<?php echo $key->id;?>" title="">Ver más <i class="la la-long-arrow-right"></i></a>
									</div>
									
								
									</div>
									<?php endforeach ?>
									<!-- Blog Post -->
									<div class="col-xs-12" style="text-align: center;margin-top: 30px;">
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
									<?php if ($paginas > 0): ?>
									    <div class="pagination">
									      <ul>
									        <?php  
									          if (isset($_GET['pag'])) {
									            if ($_GET['pag'] != 1) {
									              $previous = intval($_GET['pag']) - 1;
									            } else {
									              $previous = 1;
									            }
									          } else {
									            $previous = 1;
									          }
									        ?>
									        <li class="prev"><a href="noticias?pag=<?= $previous ?>"><i class="la la-long-arrow-left"></i> Atrás</a></li>
									        <!-- <li><a href="">1</a></li>
									        <li class="active"><a href="">2</a></li>
									        <li><a href="">3</a></li>
									        <li><span class="delimeter">...</span></li>
									        <li><a href="">14</a></li> -->
									        <?php if ($paginas >= 1 && $paginas <= 5): ?>
									          <?php for ($i=0;$i<$paginas;$i++): ?>
									            <?php $active = isset($_GET['pag']) ? ($i+1) == $_GET['pag'] ? 'active' : "" : ($i+1) == 1 ? 'active' : "" ?>
									            <li class="d-none <?= $active ?>"><a href="noticias?pag=<?= $i+1 ?>"><?= $i+1 ?></a></li>
									          <?php endfor; ?>
									        <?php else: ?>
									          <?php if (($paginaAct+4) <= $paginas): ?>
									            <?php for ($i=$paginaAct;$i<=($paginaAct+4);$i++): ?>
									              <?php $active = isset($_GET['pag']) ? ($i) == $_GET['pag'] ? 'active' : "" : ($i) == 1 ? 'active' : "" ?>
									              <li class="d-none <?= $active ?>"><a href="noticias?pag=<?= $i ?>"><?= $i ?></a></li>
									            <?php endfor; ?>
									          <?php elseif ($paginaAct == $paginas): ?>
									            <?php for ($i=($paginaAct-4);$i<=$paginas;$i++): ?>
									              <?php $active = isset($_GET['pag']) ? ($i) == $_GET['pag'] ? 'active' : "" : ($i) == 1 ? 'active' : "" ?>
									              <li class="d-none <?= $active ?>"><a href="noticias?pag=<?= $i ?>"><?= $i ?></a></li>
									            <?php endfor; ?>
									          <?php else: ?>
									            <?php for ($i=$paginaAct;$i<=$paginas;$i++): ?>
									              <?php $active = isset($_GET['pag']) ? ($i) == $_GET['pag'] ? 'active' : "" : ($i) == 1 ? 'active' : "" ?>
									              <li class="d-none <?= $active ?>"><a href="noticias?pag=<?= $i ?>"><?= $i ?></a></li>
									            <?php endfor; ?>
									          <?php endif; ?>
									          <?php if (($paginaAct+4) < $paginas): ?>
									          <li class="d-none"><span class="delimeter">...</span></li>
									          <li class="d-none"><a href="noticias?pag=<?= $paginas ?>"><?= $paginas ?></a></li>
									          <?php endif ?>
									        <?php endif; ?>
									        <?php  
									          if (isset($_GET['pag'])) {
									            if ($_GET['pag'] != $paginas) {
									              $next = intval($_GET['pag']) + 1;
									            } else {
									              $next = $paginas;
									            }
									          } else {
									            $next = 2;
									          }
									        ?>
									        <li class="next"><a href="noticias?pag=<?= $next ?>">Siguiente <i class="la la-long-arrow-right"></i></a></li>
									      </ul>
									    </div> <!-- Pagination -->
									<?php endif; ?> 
									</div>
								</div>
								<aside class="col-lg-3 col-md-3 column">
									<div class="widget">
										
										<div class="widget filter-offer">
											<h3>Categorías</h3>
											<div class="sidebar-links">
												<?php foreach ($datos_categorias as $key): ?>
													<form id="form_id_<?php echo $key->id;?>" action="noticias" method="POST">
														<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
														<input type="hidden" name="categoria" value="<?php echo $key->id;?>">
													</form>
													<a onClick="$('#form_id_<?php echo $key->id;?>').submit()" href="#" title=""><i class="la la-angle-right arrow-right-news"></i><?php echo $key->descripcion;?> (<?= $key->cantidad ?>)</a> 
												<?php endforeach ?> 
											</div>
										</div>
										<div class="widget filter-offer">
											<h3>Últimas noticias</h3>
											<div class="post_widget">
												<?php
												$contador=0;
												 foreach ($datos as $key): 
												 	$contador++;
												 	?>
												 	<?php if ($contador<=5): ?>
													<div class="mini-blog">
													<span><a href="noticias/<?php echo $key->id;?>" title=""><img  style="width: 54px;height:44px;" src="imagenes_noticias/<?php echo $key->foto;?>" alt="" /></a></span>
													<div class="mb-info">
														<h3><a href="noticias/<?php echo $key->id;?>" title=""><?php echo $key->titulo;?></a></h3>
														<span><?php echo $key->tmp;?></span>
													</div>
												 	<?php endif ?> 
												</div> 
												<?php endforeach ?> 
											</div>

										</div> 
											
									</aside>
								</div>
							</div>
						</div>
					</section>
				</aside>
				<?php include("local/resources/views/includes/general_footer.php");?>
			</div>
			<?php include("local/resources/views/includes/login_register_modal.php");?>
			<script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script>   
			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script src="local/resources/views/js/modernizr.js" type="text/javascript"></script>
			<script src="local/resources/views/js/script.js" type="text/javascript"></script>   
		</body>
	</html>