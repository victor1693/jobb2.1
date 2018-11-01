<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Administración Jobbers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers"> 
	<?php include 'local/resources/views/includes/referencias_top.php';?> 
	<link rel="stylesheet" type="text/css" href="../../../local/resources/views/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../../../local/resources/views/css/icons.css">
	<link rel="stylesheet" href="../../../local/resources/views/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="../../../local/resources/views/css/style.css" />
	<link rel="stylesheet" type="text/css" href="../../../local/resources/views/css/responsive.css" /> 
	<link rel="stylesheet" type="text/css" href="../../../local/resources/views/css/colors/colors.css" />
	<link rel="stylesheet" type="text/css" href="../../../local/resources/views/css/chosen.css" /> 
	
</head>
<body  style="background-image: url('https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg');"> 
	<!--Header responsive-->
	<div class="theme-layout" id="scrollup">
		
			<?php include('local/resources/views/includes/header_administrator.php');?> 
			<?php include('local/resources/views/includes/header_responsive_admin.php');?> 
 <section>


		<div class="block no-padding mt-75">
			<div class="container">
				 <div class="row no-gape">
				 	<?php include('includes/administrator_menu_left.php');?> 
				 	 <div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec addscroll">
					 			<h3>Editar empresa</h3>
					 			<div class="social-edit">
					 				<form id="form_datos_emp" action="../../../administracion/empresas/editstore" method="post">
					 					<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
					 					<div class="row">

					 						<input type="hidden" name="id_empresa" value="<?= $empresa[0]->id ?>">
					 						<input type="hidden" name="id_usuario" value="<?= $empresa[0]->id_usuario ?>">

					 						<div class="col-lg-6">
					 							<span class="pf-title">Correo (*)</span>
					 							<div class="pf-field">
					 								<input type="text" placeholder="Correo" name="correo" id="correo" value="<?= $empresa[0]->correo ?>" />
					 								<i class="fa fa-at"></i>
					 							</div>
					 						</div>
					 						<div class="col-lg-6">
					 							<span class="pf-title">Contraseña (*)</span>
					 							<div class="pf-field">
					 								<input type="password" placeholder="**********" name="pass" id="pass" value="" />
					 								<i class="fa fa-lock"></i>
					 							</div>
					 						</div>

					 						<div class="col-lg-6">
					 							<span class="pf-title">Nombre de la empresa *</span>
					 							<div class="pf-field">
					 								<input type="text" placeholder="" value="<?= $empresa[0]->nombre ?>" name="nombre_empresa" id="nombre_empresa"/>
					 							</div>
					 						</div>
					 						<div class="col-lg-6">
					 							<span class="pf-title">Actividad de la empresa *</span>
					 							<div class="pf-field">
					 								<select data-placeholder="Por favor selecciona la actividad" class="chosen" name="act_emp" id="act_emp">
					 									<option value="">Seleccionar</option>
					 									<?php foreach ($actividades as $act): ?>
					 									<?php $selected = $act->id == $empresa[0]->sector ? 'selected' : '' ?>
					 									<option value="<?= $act->id ?>" <?= $selected ?>><?= $act->nombre ?></option>
					 									<?php endforeach ?>
					 								</select>
					 							</div>
					 						</div>
					 						<div class="col-lg-4">
					 							<span class="pf-title">Nombre del responsable *</span>
					 							<div class="pf-field">
					 								<input type="text" placeholder="" value="<?= $empresa[0]->responsable ?>" name="nombre_resp" id="nombre_resp" />
					 							</div>
					 						</div>
					 						<div class="col-lg-4">
					 							<span class="pf-title">Razón Social *</span>
					 							<div class="pf-field">
					 								<input type="text" placeholder="" value="<?= $empresa[0]->razon_social ?>" name="razon_social" id="razon_social" />
					 							</div>
					 						</div>
					 						<div class="col-lg-4">
					 							<span class="pf-title">CUIT (Opcional)</span>
					 							<div class="pf-field">
					 								<input type="text" placeholder="" value="<?= $empresa[0]->cuit ?>" name="cuit" id="cuit" />
					 							</div>
					 						</div>
					 						<div class="col-lg-4">
					 							<span class="pf-title">Telefono *</span>
					 							<div class="pf-field">
					 								<input type="text" placeholder="" value="<?= $empresa[0]->telefono ?>" name="telefono" id="telefono" />
					 							</div>
					 						</div>
					 						<div class="col-lg-4">
					 							<span class="pf-title">País *</span>
					 							<div class="pf-field">
					 								<select data-placeholder="Por favor selecciona el país" class="chosen" name="pais" id="pais">
					 									<option value="">Seleccionar</option>
					 									<?php foreach ($paises as $pais): ?>
					 									<?php $selected = $pais->id == $empresa[0]->pais ? 'selected' : '' ?>
					 									<option value="<?= $pais->id ?>" <?= $selected ?>><?= $pais->descripcion ?></option>
					 									<?php endforeach ?>
					 								</select>
					 							</div>
					 						</div>
					 						<div class="col-lg-6">
					 							<span class="pf-title">Provincia *</span>
					 							<div class="pf-field">
					 								<select data-placeholder="Por favor selecciona la provincia" class="chosen" onchange="getLocalidad(this.value)" name="provincia" id="provincia">
					 									<option value="">Seleccionar</option>
					 									<?php foreach ($provincias as $prov): ?>
					 									<?php $selected = $prov->id == $empresa[0]->provincia ? 'selected' : '' ?>
					 									<option value="<?= $prov->id ?>" <?= $selected ?>><?= $prov->provincia ?></option>
					 									<?php endforeach ?>
					 								</select>
					 							</div>
					 						</div>
					 						<div class="col-lg-6">
					 							<span class="pf-title">Localidad *</span>
					 							<div class="pf-field">
					 								<select data-placeholder="Por favor selecciona la localidad" class="chosen" id="localidad" name="localidad">
					 									<option value="">Seleccionar</option>
					 									<?php foreach ($localidades as $localidad): ?>
					 									<?php $selected = $localidad->id == $empresa[0]->localidad ? 'selected' : '' ?>
					 									<option value="<?= $localidad->id ?>" <?= $selected ?>><?= $localidad->localidad ?></option>
					 									<?php endforeach ?>
					 								</select>
					 							</div>
					 						</div>
					 						<div class="col-lg-12">
					 							<span class="pf-title">Dirección *</span>
					 							<div class="pf-field">
					 								<input type="text" placeholder="" value="<?= $empresa[0]->direccion ?>" name="direccion" id="direccion" />
					 							</div>
					 						</div>
					 						<div class="col-lg-12">
					 							<span class="pf-title">Descripción de la empresa *</span>
					 							<div class="pf-field">
					 								<textarea name="descripcion_emp" id="descripcion_emp"><?= $empresa[0]->descripcion ?></textarea>
					 							</div>
					 						</div>
					 						<div class="col-lg-12">
					 							<button type="button" id="datos_empresa">Actualizar</button>
					 						</div>
					 					</div>
					 				</form>
					 			</div>
					 		</div>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>
</div>
<script src="../../../local/resources/views/js/jquery.min.js" type="text/javascript"></script> 
<script src="../../../local/resources/views/js/script.js" type="text/javascript"></script> 
<script src="../../../local/resources/views/js/slick.min.js" type="text/javascript"></script>
<script src="../../../local/resources/views/plugins/notify.js" type="text/javascript"></script>
<script src="../../../local/resources/views/js/select-chosen.js" type="text/javascript"></script>

<script>
	$('#search').on('click', function(){
		if ($('#buscador').val() != "") {
			$('#form_search').submit();
		} else {
			$.notify('No puedes dejar el buscador vacío', {
			  className:"info",
			  globalPosition: "bottom right"
			  });
		}
	});

	<?php if (count($errors) > 0): ?>

	<?php foreach ($errors->all() as $error): ?>

		$.notify("<?= $error ?>", {
		  className:"error",
		  globalPosition: "bottom right"
		  });

	<?php endforeach; ?>

	<?php endif; ?>

	$('#datos_empresa').on('click', function(e){
		e.preventDefault();

		var regex_num = /^\d+$/g;
		var regex_tlf = /^([0-9\-\+]{7,15})+$/g;
		var regex_dir= /^[\D][\w\s\/\-]+$/g;

		if ($('#cuit').val() != "") {
			if (!regex_num.test($('#cuit').val())) {
				$.notify("Escriba un cuit valido.", {
				className:"error",
				globalPosition: "bottom center"
				});
				return 0;
			} else if (!regex_tlf.test($('#telefono').val())) {
				$.notify("Escriba un telefono valido.", {
				className:"error",
				globalPosition: "bottom center"
				});
				return 0;
			} else if (!regex_dir.test($('#direccion').val())) {
				$.notify("Escriba una dirección valida.", {
				className:"error",
				globalPosition: "bottom center"
				});
				return 0;
			}
		}

		if ($('#pass').val() != "") {
			if (!$('#pass').val().length >= 8 && !$('#pass').val().length <= 12) {
				$.notify("La contraseña debe contener entre 8 y 12 caracteres.", {
				className:"error",
				globalPosition: "bottom center"
				});

				return 0;
				
			}
		}

		$('#form_datos_emp').submit();
			
		

	});

	<?php if (isset($_GET['r']) && $_GET['r'] == 2): ?>
		$.notify("Ha ocurrido un error inesperado. Por favor vuelva a intentarlo.", {
		className:"error",
		globalPosition: "bottom center"
		});
	<?php elseif (isset($_GET['r']) && $_GET['r'] == 3): ?>
		$.notify("Ya existe una empresa con ese correo electronico.", {
		className:"error",
		globalPosition: "bottom center"
		});
	<?php endif; ?>

	function getLocalidad(id_provincia){
		if (id_provincia != 0) {
			$.ajax({
				url: '../../localidades/'+id_provincia,
				type: 'GET',
				dataType: 'json',
				beforeSend: function(){
					$('#localidad').html('<option value="">Cargando...</option>').prop('disabled', true).trigger('chosen:updated');
				},
				success: function(response){
					if (response.status == 1) {
						let html = '<option value="0">Seleccionar</option>';
						response.localidades.forEach(function(localidad){
							html += '<option value="'+localidad.id+'">'+localidad.localidad+'</option>';
						});
						$('#localidad').html(html).trigger('chosen:updated');
					} else {
						alert("Error al cargar las localidades");
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

	function isEmail(email) {
	  var regex = /^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	  return regex.test(email);
	}
</script> 

</body>
</html>