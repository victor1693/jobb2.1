<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Administración Jobbers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers"> 
	<?php include('local/resources/views/includes/referencias_top.php');?>
	<link rel="stylesheet" type="text/css" href="../local/resources/views/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../local/resources/views/css/icons.css">
	<link rel="stylesheet" href="../local/resources/views/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="../local/resources/views/css/style.css" />
	<link rel="stylesheet" type="text/css" href="../local/resources/views/css/responsive.css" /> 
	<link rel="stylesheet" type="text/css" href="../local/resources/views/css/colors/colors.css" /> 
	
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
					 	<div class="padding-left" style="">
                                    
                                    <div class="manage-jobs-sec addscroll" style="">
                                        <h3>Datos de acceso</h3>
                                    </div>
                                </div>
                          <div class="profile-form-edit" style="margin: 0px;"> 
                                    <form id="formulario" action="actualizarconfiguracion" method="POST" style="margin: 0px;" id="form_candiactualizardatos">
                                        <input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
                                        <div class="row">
                                        	<div class="col-sm-12" style="padding-top: 30px;text-align: center;">
                                        		<h4 style="margin: 0px;"><strong>Usuarios</strong></h4>
                                        	</div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Correo</span>
                                                <div class="pf-field">
                                                    <input value="" name="correo" id="correo" type="text" placeholder="Correo electrónico">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Clave</span>
                                                <div class="pf-field">
                                                    <input value="" placeholder="Clave" name="clave" id="clave" type="password">
                                                </div>
                                            </div>
                                            <div class="col-lg-12" style="margin-bottom: 10px;">
                                                <button type="button" onClick="validar()" >Actualizar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="profile-form-edit" style="margin: 0px;"> 
                                    <form id="formulario_empresa" action="actualizarconfiguracionempresa" method="POST" style="margin: 0px;" id="form_candiactualizardatos">
                                        <input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
                                        <div class="row">
                                        	<div class="col-sm-12" style="padding-top: 30px;text-align: center;">
                                        		<h4 style="margin: 0px;"><strong>Empresa</strong></h4>
                                        	</div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Correo</span>
                                                <div class="pf-field">
                                                    <input value="" name="correo" id="correo_empresa" type="text" placeholder="Correo electrónico">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Clave</span>
                                                <div class="pf-field">
                                                    <input value="" placeholder="Clave" name="clave" id="clave_empresa" type="password">
                                                </div>
                                            </div>
                                            <div class="col-lg-12" style="margin-bottom: 50px;">
                                                <button type="button" onClick="validar_empresa()" >Actualizar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
					</div>
				 </div>
			</div>
		</div>
	</section>
</div>
<script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script> 
<script src="../local/resources/views/js/script.js" type="text/javascript"></script> 
<script src="../local/resources/views/js/slick.min.js" type="text/javascript"></script> 
<script type="text/javascript">
	function  validar()
	{
		if($("#correo").val()=="")
		{
			alert("Debe colocar un correo.");
			$("#correo").focus();
		}
		else if($("#clave").val()=="")
		{
			alert("Debe colocar una clave.");
			$("#clave").focus();
		}
		else
		{
			$("#formulario").submit();
		}
	}

	function  validar_empresa()
	{
		if($("#correo_empresa").val()=="")
		{
			alert("Debe colocar un correo.");
			$("#correo_empresa").focus();
		}
		else if($("#clave_empresa").val()=="")
		{
			alert("Debe colocar una clave.");
			$("#clave_empresa").focus();
		}
		else
		{
			$("#formulario_empresa").submit();
		}
	}
</script>
 
<?php
if(isset($_GET['result']) && $_GET['result']!="")
{
	echo "<script>alert('".$_GET['result']."');</script>";
} 
?>
</body>
</html>