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
			
			<section>
				<div class="block no-padding mt-75">
					<div class="container">
						<div class="row no-gape">
							<?php include('local/resources/views/includes/aside_candidatos.php');?>
							<div class="col-lg-9 column">
								<div class="padding-left">
									<div class="manage-jobs-sec addscroll">
										<h3>Mis redes sociales</h3>
									</div>
								</div>
								<div class="profile-form-edit" style="margin: 0px;">
									<?php
									$facebook="";
									$instagram="";
									$twitter="";
									$linkendin="";
									foreach ($datos as $key ) {
										if($key->id_red_social=="1"){$facebook=$key->red_social;}
										if($key->id_red_social=="3"){$instagram=$key->red_social;}
										if($key->id_red_social=="5"){$linkendin=$key->red_social;}
										if($key->id_red_social=="2"){$twitter=$key->red_social;}
									}
									?>
									<form action="candiredescrear" method="POST" style="margin: 0px;" id="form_candiredescrear">
										<input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
										<div class="row">
											<div class="col-lg-12">
												<span class="pf-title">Facebook</span>
												<div class="pf-field">
													<input value="<?php echo $facebook;?>" name="facebook" id="facebook" type="text" placeholder="Facebook">
													<i class="fa fa-facebook"></i>
												</div>
											</div>
											<div class="col-lg-12">
												<span class="pf-title">Twitter</span>
												<div class="pf-field">
													<input value="<?php echo $twitter;?>" name="twitter" id="twitter" type="text" placeholder="Twitter">
													<i class="fa fa-twitter"></i>
												</div>
											</div>
											<div class="col-lg-12">
												<span class="pf-title">Linkendin</span>
												<div class="pf-field">
													<input value="<?php echo $linkendin;?>" name="linkendin" id="linkendin" type="text" placeholder="Linkendin">
													<i class="fa fa-linkedin"></i>
												</div>
											</div>
											<div class="col-lg-12">
												<span class="pf-title">Instagram</span>
												<div class="pf-field">
													<input value="<?php echo $instagram;?>" name="instagram" id="instagram" type="text" placeholder="Instagram">
													<i class="fa fa-instagram"></i>
												</div>
												<a href="#" class="status" style="font-size: 13px;">¿Cómo puedo colocar mis redes sociales en Jobbers?</a>
											</div>
											<div class="col-lg-12" style="margin-bottom: 50px;">
												<button type="button" onclick="redes_validar()">Guardar</button>
											</div> 
										</div>
									</form>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	
	<script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script>
	<script src="local/resources/views/js/modernizr.js" type="text/javascript"></script>
	<script src="local/resources/views/js/script.js" type="text/javascript"></script>
	<script src="local/resources/views/js/wow.min.js" type="text/javascript"></script>
	<script src="local/resources/views/js/slick.min.js" type="text/javascript"></script>
	<script src="local/resources/views/js/parallax.js" type="text/javascript"></script>
	<script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script>
	<script src="local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
	<script src="local/resources/views/js/circle-progress.min.js" type="text/javascript"></script>
	<?php include "local/resources/views/includes/referencias_down.php";?>
	<script type="text/javascript">
		$( document ).ready(function() {
		
		});

		function notificacion(mensaje)
		{
		    $.notify(mensaje, {
		      className:"info",
		      globalPosition: "bottom right"
		      });
		}

		function redes_validar()
		{
		  var band = true;

		  // Validar link de facebook
		  var fb = /^(https:\/\/((www.facebook)|(facebook)).com\/)[A-Za-z0-9.\-\_]+(\/)?$/;
		  //Validar link de twitter
		  var tw = /^(https:\/\/((www.twitter)|(twitter)).com\/)[A-Za-z0-9.\-\_]+(\/)?$/;
		  //Validar link de Instagram
		  var ig = /^(https:\/\/((www.instagram)|(instagram)).com\/)[A-Za-z0-9.\-\_]+(\/)?$/;
		  //Validar link de perfil de Linkedin
		  var lkd = /^(https:\/\/((www.linkedin)|(linkedin)).com\/in\/)[A-Za-z0-9.\-\_\/]+(\/)?$/;

		  if ($('#facebook').val() != "") {
		     if (!fb.test($('#facebook').val())) {
		         notificacion("El formato del link es invalido. Si no posees Facebook deja el campo en blanco.");
		         band = false;
		     }
		  }

		  if ($('#twitter').val() != "") {
		     if (!tw.test($('#twitter').val())) {
		         notificacion("El formato del link es invalido. Si no posees Twitter deja el campo en blanco.");
		         band = false;
		     }
		  }

		  if ($('#instagram').val() != "") {
		     if (!ig.test($('#instagram').val())) {
		         notificacion("El formato del link es invalido. Si no posees Instagram deja el campo en blanco.");
		         band = false;
		     }
		  }

		  if ($('#linkendin').val() != "") {
		     if (!lkd.test($('#linkendin').val())) {
		         notificacion("El formato del link es invalido. Si no posees Linkedin deja el campo en blanco.");
		         band = false;
		     }
		  }

		  if (band) {
		     $('#form_candiredescrear').submit();
		  }
		}
	</script>
</body>
</html>