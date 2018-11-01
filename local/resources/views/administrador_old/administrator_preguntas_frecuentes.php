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
	</head>
	<body>
		<div class="theme-layout" id="scrollup">
			
			<!--Header responsive-->
			<?php include('local/resources/views/includes/header_responsive_administrator.php');?>
			<?php include('local/resources/views/includes/header_administrator.php');?>
			<!--fin Header responsive-->
			
			<section class="overlape" style="padding: 0px;">
				<div class="block no-padding">
					<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax" style="padding: 0px;height: 100px;"></div><!-- PARALLAX BACKGROUND IMAGE -->
					<div class="container fluid" >
						<div class="row">
							<div class="col-lg-12" >
								<div class="inner-header" style="height:100px;padding:0px;padding-top: 30px;">
									<h3 style="font-size: 26px;font-weight: 300;">Daniel Maidana</h3>
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
							<?php include('local/resources/views/includes/aside_administrator.php');?>
							<div class="col-lg-9 column">
								<div class="padding-left">
									<div class="manage-jobs-sec addscroll">
										<h3>Preguntas frecuentes</h3>
									</div>
								</div>
								<div class="profile-form-edit" style="margin: 0px;">
									<form action="adminfaqcrear" method="POST" style="margin: 0px;">
										<input name="_token" type="hidden" value="vPRFyJZr6mYH9DCcTaV5VEJJQUMUR82fzCrFhXzz" id="my_token">
										<div class="row">
											
											<div class="col-lg-6">
												<span class="pf-title">Pregunta</span>
												<div class="pf-field">
													<input name="titulo" type="text" placeholder="Título de la pregunta">
												</div>
											</div>
											<div class="col-lg-6">
												<span class="pf-title">Editor</span>
												<div class="pf-field">
													<input placeholder="Nombre del editor..." name="editor" type="text" placeholder="">
												</div>
											</div>
											<div class="col-lg-12">
												<span class="pf-title">Descripción</span>
												<div class="pf-field">
													<textarea placeholder="Descripcion..." name="detalle" style="resize: none;min-height: 75px;padding: 10px;"></textarea>
												</div>
											</div>
											<div class="col-lg-12" style="margin-bottom: 50px;">
												<button type="submit">Agregar</button>
											</div>
										</div>
									</form>
								</div>
								<div class="padding-left" style="margin-top: -50px;">
									<div class="manage-jobs-sec addscroll" style="margin: 0px; padding: 0px;">
										<h3>Listado de preguntas</h3>
									</div>
								</div>
								
								<div class="emply-list-sec">
									<?php foreach ($datos as $key) {
										echo '<div class="emply-list">
											<div class="emply-list-thumb">
													<a href="#" title=""><img src="local/resources/views/images/question.png" style="width: 80px;" alt=""></a>
											</div>
											<div class="emply-list-info">
													<h3><a href="fag" title="" id="titulo_'.$key->id.'">¿'.$key->titulo.'?</a><ul class="action_job" style="float:right;">
											<li><span>Ver</span><a href="fag" title=""><i class="la la-eye"></i><!-- a--></a></li>
											<li data-toggle="modal" data-target="#modal_faq" onClick="set_values('.$key->id.')"><span>Editar</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
											<li><span>Eliminar</span><a href="eliminarpre/'.$key->id.'" title=""><i class="la la-trash"></i><!-- a--></a></li>
										</ul></h3>
										<a><span id="editor_'.$key->id.'">'.$key->editor.'</span><a/>
										<p id="descripcion_'.$key->id.'">'.$key->descripcion.'</p>
									</div>
								</div>';
								}?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php include("local/resources/views/includes/modales/administrator_faq.php");?>
	</div>
	<?php include("local/resources/views/includes/aside_right_administrator.php");?>
	
	<script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script>
	<script src="local/resources/views/js/modernizr.js" type="text/javascript"></script>
	<script src="local/resources/views/js/script.js" type="text/javascript"></script>
	<script src="local/resources/views/js/wow.min.js" type="text/javascript"></script>
	<script src="local/resources/views/js/slick.min.js" type="text/javascript"></script>
	<script src="local/resources/views/js/parallax.js" type="text/javascript"></script>
	<script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script>
	<script src="local/resources/views/js/circle-progress.min.js" type="text/javascript"></script>
	<?php include("local/resources/views/includes/referencias_down.php");?>
	<script type="text/javascript">
		function set_values(id)
		{
			$("#editor_form").val($("#editor_"+id).html());
			$("#titulo_form").val($("#titulo_"+id).html());
			$("#descripcion_form").val($("#descripcion_"+id).html());
			$("#id_pregunta").val(id);
		}
		$( document ).ready(function() {
		
		});
	</script>
</body>
</html>