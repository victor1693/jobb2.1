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
		<?php include('local/resources/views/includes/google_analitycs.php');?>
		<?php include("local/resources/views/includes/chat_soporte.php");?>
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
							<div class="col-lg-8 offset-lg-2 col-xl-9 offset-xl-0 column">
								<div class="padding-left">
									<div class="manage-jobs-sec addscroll">
										<h3>Publicaciones</h3>
										<table>
											<thead>
												<tr>
													<td>Publicación</td>
													<td>Visualizar</td>
													<td>Opciones</td>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($datos as $key): 
												$estado=0;
												$texto="Ocultar";
												if($key->estado==0)
												{
													$estado=1;
													$texto="Visualizar";
												}
												?>
												<tr >
													<td style="width: 60%;">
														<div class="table-list-title">
															<h3><a href="noticias/<?php echo $key->id;?>" title=""><?php echo $key->titulo;?></a></h3>
															<span><?php echo $key->tags;?></span><br>
														</div>
													</td>
													 <td style="width: 20%;">
													 	 <form class="text-center">
													 	 	<a href="noticiaestado/<?php echo $key->id;?>/<?php echo $estado;?>" style="float: left;padding: 0px;padding: 3px;font-size: 10px;padding-right: 5px;padding-left: 5px;" class="btn btn-xs btn-primary"><?php echo $texto;?></a>
													 	 </form>
													 </td>
														<td style="text-align:right;width: 20%;"><ul class="action_job"><li><span>Ver</span><a href="noticias/<?php echo $key->id;?>" title=""><i class="la la-eye"></i><!-- a--></a></li><li></li><li><span>Editar</span><a data-toggle="modal" data-target="#modal_alias" href="panelnoticias/<?php echo $key->id;?>" title=""><i class="la la-pencil" onclick="set_id(36)"></i></a></li> <li><span>Eliminar</span><a href="noticiadel/<?php echo $key->id;?>" title=""><i class="la la-trash-o"></i></a></li></ul></td>
													 
												</tr>
												<?php endforeach ?>
											</tbody>
										</table>
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
										        <li class="prev"><a href="notipublicaciones?pag=<?= $previous ?>"><i class="la la-long-arrow-left"></i> Atrás</a></li>
										        <!-- <li><a href="">1</a></li>
										        <li class="active"><a href="">2</a></li>
										        <li><a href="">3</a></li>
										        <li><span class="delimeter">...</span></li>
										        <li><a href="">14</a></li> -->
										        <?php if ($paginas >= 1 && $paginas <= 5): ?>
										          <?php for ($i=0;$i<$paginas;$i++): ?>
										            <?php $active = isset($_GET['pag']) ? ($i+1) == $_GET['pag'] ? 'active' : "" : ($i+1) == 1 ? 'active' : "" ?>
										            <li class=" d-none d-md-block <?= $active ?>"><a href="notipublicaciones?pag=<?= $i+1 ?>"><?= $i+1 ?></a></li>
										          <?php endfor; ?>
										        <?php else: ?>
										          <?php if (($paginaAct+4) <= $paginas): ?>
										            <?php for ($i=$paginaAct;$i<=($paginaAct+4);$i++): ?>
										              <?php $active = isset($_GET['pag']) ? ($i) == $_GET['pag'] ? 'active' : "" : ($i) == 1 ? 'active' : "" ?>
										              <li class=" d-none d-md-block <?= $active ?>"><a href="notipublicaciones?pag=<?= $i ?>"><?= $i ?></a></li>
										            <?php endfor; ?>
										          <?php elseif ($paginaAct == $paginas): ?>
										            <?php for ($i=($paginaAct-4);$i<=$paginas;$i++): ?>
										              <?php $active = isset($_GET['pag']) ? ($i) == $_GET['pag'] ? 'active' : "" : ($i) == 1 ? 'active' : "" ?>
										              <li class=" d-none d-md-block <?= $active ?>"><a href="notipublicaciones?pag=<?= $i ?>"><?= $i ?></a></li>
										            <?php endfor; ?>
										          <?php else: ?>
										            <?php for ($i=$paginaAct;$i<=$paginas;$i++): ?>
										              <?php $active = isset($_GET['pag']) ? ($i) == $_GET['pag'] ? 'active' : "" : ($i) == 1 ? 'active' : "" ?>
										              <li class=" d-none d-md-block <?= $active ?>"><a href="notipublicaciones?pag=<?= $i ?>"><?= $i ?></a></li>
										            <?php endfor; ?>
										          <?php endif; ?>
										          <?php if (($paginaAct+4) < $paginas): ?>
										          <li class="d-none d-md-block"><span class="delimeter">...</span></li>
										          <li class="d-none d-md-block"><a href="notipublicaciones?pag=<?= $paginas ?>"><?= $paginas ?></a></li>
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
										        <li class="next"><a href="notipublicaciones?pag=<?= $next ?>">Siguiente <i class="la la-long-arrow-right"></i></a></li>
										      </ul>
										    </div> <!-- Pagination -->
										<?php endif; ?> 
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
			$( document ).ready(function() {
			
			});
		</script>
	</body>
</html>