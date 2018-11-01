<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Administración Jobbers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers"> 
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../../local/resources/views/css/icons.css">
	<link rel="stylesheet" href="../../local/resources/views/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/style.css" />
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/responsive.css" /> 
	<link rel="stylesheet" type="text/css" href="../../local/resources/views/css/colors/colors.css" /> 
	
</head>
<body  style="background-image: url('https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg');"> 
	<!--Header responsive-->
	<div class="theme-layout" id="scrollup">
		<?php $atras=1;?>
			<?php include('local/resources/views/includes/header_administrator.php'); 
			?> 

 <section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	<?php include('includes/administrator_menu_left.php');?> 
				 	<div class="col-lg-9 column"> 
					 	<div class="padding-left" style="margin-top: -70px;">
                                    
                                    <div class="manage-jobs-sec addscroll" style="margin-top: 50px;">
                                        <h3>Nuevo soportista</h3>
                                    </div>
                                </div>
                          <div class="profile-form-edit" style="margin: 0px;">
                                    <form id="formulario" action="../nuevosoportista" method="POST" style="margin: 0px;" id="form_candiactualizardatos">
                                        <input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <span class="pf-title">Nombre</span>
                                                <div class="pf-field">
                                                    <input value="" name="nombre" id="nombre" type="text" placeholder="Correo electrónico">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Función</span>
                                                <div class="pf-field">
                                                    <input value="" name="funcion" id="funcion" type="text" placeholder="Correo electrónico">
                                                </div>
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
                                                    <input placeholder="Clave" name="clave" id="clave" type="password">
                                                </div>
                                            </div>
                                            <div class="col-lg-12" style="margin-bottom: 50px;">
                                                <button type="button" onClick="validar();">Agregar</button>
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
<script src="../../local/resources/views/js/jquery.min.js" type="text/javascript"></script> 
<script src="../../local/resources/views/js/script.js" type="text/javascript"></script> 
<script src="../../local/resources/views/js/slick.min.js" type="text/javascript"></script> 
<script type="text/javascript">
    function validar()
    {
        if($("#nombre").val()=="")
        {
            alert("Debe colocar el nombre").
            $("#nombre").focus();
        }else if($("#correo").val()=="")
        {
            alert("Debe colocar el correo").
            $("#correo").focus();
        }else if($("#clave").val()=="")
        {
            alert("Debe colocar la clave.").
            $("#clave").focus();
        }
        else
        {
            $("#formulario").submit();
        }
    }
</script>
</body>
</html>