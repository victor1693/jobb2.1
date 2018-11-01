<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Jobbers Argentina - Empresa</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="CreativeLayers">
		<meta name="csrf-token" content="<?php echo csrf_token(); ?>">
		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="../local/resources/views/css/icons.css">
		<link rel="stylesheet" href="../local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="../local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
		<?php include('local/resources/views/includes/chat_soporte.php');?>
		<?php include('local/resources/views/includes/google_analitycs.php');?>
	</head>
	<body>
		<div class="theme-layout" id="scrollup">
			
			<?php include("includes/header_responsive_empresa.php") ?>
			
			<?php include "includes/header_empresa.php" ?>
			<section class="overlape">
				<div class="block no-padding">
					<div data-velocity="-.1" style="background: url(../local/resources/views/images/empresa_gral.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
					<div class="container fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="inner-header">
									<h3>Bienvenido <?= session()->get("emp_nombre_empresa") != "" ? session()->get("emp_nombre_empresa") : session()->get("empresa") ?></h3>
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
							
							<?php include("includes/aside_empresa.php") ?>
							<!-- Inicio del contenido de la vista -->
							<div class="col-lg-9 column">
								<div class="padding-left">
									<br><br>
									<div class="row">
										<div class="col-lg-12">
											<div class="heading">
												<h2>Compra nuestro planes y paquetes</h2>
												<span>Recuerda que comprando el plan PREMIUM tienes todos los beneficios de nuestra plataforma y te ayudará a conseguir a los mejores jobbers del mundo.</span>
												</div><!-- Heading -->
												<div class="plans-sec">
													<div id="step1">
														<div class="row">
															<div class="col-lg-6">
																<div class="pricetable">
																	<div class="pricetable-head">
																		<h3>Gratis</h3>
																		<h2><i>$</i>0</h2>
																		</div><!-- Price Table -->
																		<ul>
																			<?php foreach ($beneficios_planes as $ben): ?>
																					<li>
																						<?= strstr($ben->planes_asignados, "1") ? '<i class="fa fa-check" style="color: #88CAB7"></i>' : '<i class="fa fa-remove" style="color: #F44242"></i>' ?> <?= $ben->alias_gratis ?>
																					</li>
																			<?php endforeach ?>
																		</ul>
																		<a href="javascript:void(0)" class="addPlan" title="" data-p="1">SELECCIONAR</a>
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="pricetable">
																		<div class="pricetable-head">
																			<h3>Premium</h3>
																			<h2><i>$</i><?= $plan[0]->valor ?></h2>
																			</div><!-- Price Table -->
																			<ul>
																				<?php foreach ($beneficios_planes as $ben): ?>
																						<li>
																							<?= strstr($ben->planes_asignados, "2") ? '<i class="fa fa-check" style="color: #88CAB7"></i>' : '<i class="fa fa-remove" style="color: #F44242"></i>' ?> <?= $ben->alias_premium ?>
																						</li>
																				<?php endforeach ?>
																			</ul>
																			<a href="javascript:void(0)" class="addPlan" title="" data-p="2">SELECCIONAR</a>
																		</div>
																	</div>
																</div>
														</div>

														<div id="step2" style="display: none;">
															<div class="row">
																<div class="col-lg-12">
																		<div id="containerFree">
																			<div class="manage-jobs-sec">
																				<table>
																					<thead>
																						<tr>
																							<td>Tipo</td>
																							<td>Precio</td>
																							<td>Valido Por: </td>
																						</tr>
																					</thead>
																					<tbody>
																				
																						<tr>
																							<td>
																								<span>Gratis</span>
																							</td>
																							<td>
																								<span>0$</span>
																							</td>
																							<td>
																								<span>1 Mes</span>
																							</td>
																						</tr>
																						
																					</tbody>
																				</table>
																			</div>
																		</div>

																		<div id="containerPay">
																			<div class="manage-jobs-sec">
																				<table id="tablePay">
																					<thead>
																						<tr>
																							<td>Tipo</td>
																							<td>Precio</td>
																							<td>Impuesto </td>
																							<td>Total </td>
																						</tr>
																					</thead>
																					<tbody>

																						<tr>
																							<td colspan="4">
																								<span style="text-align: center;">Cargando...</span>
																							</td>
																						</tr>
																				
																					</tbody>
																				</table>
																			</div>
																			<button class="btn btn-primary" id="payMP">Realizar Pago <i class="fa fa-money"></i></button>
																		</div>
																</div>
															</div>
														</div>
													</div>
														
														<div style="float: left; width: 100%; margin-top: 10px; padding: 20px">
															<button class="btn btn-primary btn-block" id="updatePlan">
															Aceptar
															</button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- Fin del contenido de la vista -->
									</div>
								</div>
							</div>
							<?php include("includes/modal_update_plan.php") ?>
						</section>
						<br>
						<?php include("includes/general_footer_empresas.php") ?>
					</div>
					
							<script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script>
							<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
							<script src="../local/resources/views/js/modernizr.js" type="text/javascript"></script>
							<script src="../local/resources/views/js/script.js" type="text/javascript"></script>
							<script src="../local/resources/views/js/wow.min.js" type="text/javascript"></script>
							<script src="../local/resources/views/js/slick.min.js" type="text/javascript"></script>
							<script src="../local/resources/views/js/parallax.js" type="text/javascript"></script>
							<script src="../local/resources/views/js/select-chosen.js" type="text/javascript"></script>
							<script src="../local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
							<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCYc537bQom7ajFpWE5sQaVyz1SQa9_tuY&sensor=true&libraries=places"></script>
							<script src="../local/resources/views/js/maps2.js" type="text/javascript"></script>
							<script src="../local/resources/views/plugins/notify.js" type="text/javascript"></script>
							<script type="text/javascript">
							(function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
							</script>
							<script>
								var plan = 1;
								var info_plan = JSON.parse('<?php echo json_encode(session()->get("emp_plan")); ?>');
								$(document).ready(function() {

									$(".addPlan").each(function(index, value) {
										if(info_plan[0].id_plan == $(this).attr("data-p")) {
											$(this).html('<i class="fa fa-check"></i> SELECCIONADO').closest('.pricetable').addClass("active");
										}
									});

									$('.addPlan').on('click', function(){
										$('.addPlan').html('SELECCIONAR').closest('.pricetable').removeClass('active');
										$(this).html('<i class="fa fa-check"></i> SELECCIONADO').closest('.pricetable').addClass('active');
										plan = $(this).attr('data-p');
									});

									$("#updatePlan").click(function() {
										var $btn = $(this);
										var band = false;
										if($(".addPlan").closest('.pricetable').hasClass("active")) {
											band = true;
										}
										if(band) {
											$("#step1").css("display", "none");
											$("#step2").css("display", "block");
											$btn.hide();

											if(parseInt(plan) != 1) {
												$("#containerFree").css("display", "none");
												$("#containerPay").css("display", "block");

												$.ajaxSetup({
													headers: {
													'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
													}
												});
												
												$.ajax({
													type: 'POST',
													url: '../pagos/requestMP',
													data: {
														plan: plan
													},
													dataType: 'json',
													success: function(data) {
														console.log(data);
														$("#payMP").attr("data-v", data.data.response.init_point);
														// $("#payMP").attr("data-v", data.data.response.sandbox_init_point);
														var html = '';
														var total = 0;
														
														total += parseFloat(data.servicios[0].precio);
														
														var impuesto = parseFloat(data.iva);
														
														html += '<tr><td><span>'+data.servicios[0].nombre+'</span></td><td><span>'+data.servicios[0].precio+'</span></td><td><span>'+(total * impuesto)+' ('+(impuesto * 100)+'%)</span></td><td><span>'+(total + (total * impuesto))+'</span></td></tr>'
														
														$("#tablePay tbody").html(html);

														$("#payMP").click(function() {
															$MPC.openCheckout ({
																url: $("#payMP").attr("data-v"),
																mode: "modal",
																onreturn: function(data) {
																	console.log(data);
																	execute_my_onreturn(data);
																}
															});
														});
													},
													error: function(error){
														$.notify("Ha ocurrido un error inesperado, vuelva a intentarlo.", {
															className:"error",
															globalPosition: "bottom center"
														});
													}
												});
											}
											else {
												$("#containerFree").css("display", "block");
												$("#containerPay").css("display", "none");
											}
										}
										else {
											$.notify("Debe seleccionar un plan para continuar.", {
												className:"info",
												globalPosition: "bottom center"
											});
										}
									});
								});

								function execute_my_onreturn (json) {
									if (json.collection_status=='approved'){

										$.notify("Pago Acreditado.", {
											className:"success",
											globalPosition: "bottom center"
										});

										$.ajaxSetup({
											headers: {
											'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
											}
										});
										
										$.ajax({
						                   type: 'POST',
						                   url: '../pagos/update',
						                   data: 'plan=' + plan + '&transaction=' + JSON.stringify(json),
						                   dataType: 'json',
						                   success: function(data) {
					                           console.log(data);
					                           window.location.reload();
						                   }
						           		});

										
										
									} else if(json.collection_status=='pending'){
										$.notify("El usuario no completó el proceso de pago, no se ha generado ningún pago.", {
											className:"warning",
											globalPosition: "bottom center"
										});
									} else if(json.collection_status=='in_process'){    
										$.notify("El pago está siendo revisado. Se le notificará cuando la transacción se complete.", {
											className:"info",
											globalPosition: "bottom center"
										});
									} else if(json.collection_status=='rejected'){
										$.notify("El pago fué rechazado, el usuario puede intentar nuevamente el pago.", {
											className:"error",
											globalPosition: "bottom center"
										});
									} else if(json.collection_status==null){
										$.notify("El usuario no completó el proceso de pago, no se ha generado ningún pago.", {
											className:"warning",
											globalPosition: "bottom center"
										});
									}
								}
							</script>
						</body>
					</html>