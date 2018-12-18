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
	<style type="text/css" media="screen">
		.pf-field input,textarea
		{
			margin-bottom: 0px;
		}
	</style>
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
                                        <h3>Scrapping</h3>
                </div> 
						</div>

            <div class="padding-left">
              
           
              <div class="col-sm-12 column"  style="text-align: center;margin-bottom: 25px !important;">
               <form target="_blank" id="formulario" method="get" action="<?= Request::root()?>/scrapping/bumeran">
                   <img src="https://imgbum.jobscdn.com/postulantes-assets/skins/bumeran/postulantes-desktop/img/logo.png" style="height: 50px;max-width: 300px;margin-top: 25px;">
                 <span class="pf-title">¿Desde qué página?</span>
                 <div class="pf-field" style="z-index: 1000;">
                    <input autocomplete="off" value="" name="pagina" id="pagina" type="text" placeholder="Página">
                     <button style="z-index: 1000;" type="button" onclick="validar()">Ejecutar</button>
                 </div> 
               </form>
              </div>

              <div class="col-sm-12 column"  style="text-align: center;">
               <form target="_blank" id="formulario_c" method="get" action="<?= Request::root()?>/scrapping/computrabajo">
                   <img src="http://redarbor.net/i/general/logo-computrabajo-tr-v2.png" style="height: 50px;max-width: 300px;margin-top: 25px;margin-top: 0px;">
                 <span class="pf-title">¿Desde qué página?</span>
                 <div class="pf-field">
                    <input autocomplete="off" value="" name="pagina" id="pagina_c" type="text" placeholder="Página">
                 </div>
                 <button type="button" onclick="validar_computrabajo()">Ejecutar</button>
               </form>
              </div>
             </div> 
			</div>
		</div>
	</section>
</div>
<script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script> 
<script src="../local/resources/views/js/script.js" type="text/javascript"></script> 
<script src="../local/resources/views/js/slick.min.js" type="text/javascript"></script>  
<script src="../local/resources/views/empresas/assets/js/notify.min.js" type="text/javascript"></script> 

 <?php if (isset($_GET['result']) && $_GET['result']!=""): ?>
  <?php echo '<script>$.notify("'.$_GET['result'].'","info");</script>'?>
<?php endif ?>
 <script>
   function validar()
   {
    if($("#pagina").val()!="")
    {
      $("#formulario").submit();
    }
    else
    {
      alert("Coloque el número de página");
      $("#pagina").focus();
    }
   }

   function validar_computrabajo()
   {
    if($("#pagina_c").val()!="")
    {
      $("#formulario_c").submit();
    }
    else
    {
      alert("Coloque el número de página");
      $("#pagina_c").focus();
    }
   }
 </script>
</body>
</html>