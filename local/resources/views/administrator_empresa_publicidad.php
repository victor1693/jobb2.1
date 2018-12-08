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
                                        <h3>Publicidad empresas</h3>
                                    </div>
                                </div>
                          <div class="profile-form-edit" style="margin: 0px;"> 
                             <h4 style="text-align: center;margin-top: 50px;">Empresas patrocinadas</h4>
                          	<div class="manage-jobs-sec" style="max-height: 300px;overflow-y: scroll;">
                          		<table> 
                          			<thead>
                          				<tr> 
                          					<th  style="width: 100px;"></th><!--Foto-->
                          					<th></th><!--Foto-->
                          					<th style="width: 100px;text-align: center;"></th><!--Foto-->
                          				</tr>
                          			</thead>
                          			<tbody>
                          				<?php 
                                         $contador=1;
                          				foreach ($datos as $key	): ?>
                          			    <tr> 
                          			    	<td><img style="width: 50px;height: 50px;border-radius: 50%;" src="<?= Request::root()?>/img_company_pub/logo/<?= $key->img_profile?>"></td>
                          			    	<td><a href="../company/detalle/<?= $key->id?>" title=""><?= $key->nombre;?></a></td>
                          			    	<td style="text-align: center;"><a href="publicidad?editar=<?= $key->id;?>"><i class="la la-edit"></i></a></td>
                                      <td style="text-align: center;"><a href="eliminar/publicidad/<?= $key->id;?>"><i class="la la-trash"></i></a></td>
                          			    </tr>
                          				<?php endforeach ?>
                          				
                          			</tbody>
                          		</table>
                          	</div>
                             <h4 style="text-align: center;">Empresas sugeridas (<?= count($recomendadas)?>)</h4>
                            <div class="manage-jobs-sec" style="max-height: 300px;overflow-y: scroll;">
                             
                              <table> 
                                <thead>
                                  <tr> 
                                   
                                    <th></th><!--Foto-->
                                    <th style="width: 100px;text-align: center;"></th><!--Foto-->
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                         $contador=1;
                                  foreach ($recomendadas as $key ): ?>
                                    <tr> 
                                     
                                      <td style="padding: 5px;"><a href="../company/detalle/<?= $key->id?>" title=""><?= $key->empresa;?></a></td>
                                      <td style="text-align: center;padding: 5px;"><a href="eliminar/recomendada/<?= $key->id;?>"><i class="la la-trash"></i></a></td>
                                    </tr>
                                  <?php endforeach ?>
                                  
                                </tbody>
                              </table>
                            </div>
                                  <?php 
                                  
                                  $ofertas = array();
                                   $url="addpublicidad";
                                    $operacion="0";
                                    $nombre_empresa="";
                                    $sector_empresa="";
                                    $descripcion_empresa="";
                                    $video_empresa="";
                                    $titulo_oferta="";
                                    $descripcion_oferta="";
                                    $link_oferta="";
                                    $total_oferta=0;

                                    if(isset($editar[0]->cantidad) && $editar[0]->cantidad > 0)
                                    {

                                   $arreglo=explode('#$#', $editar[0]->ofertas);
                                   
                                    foreach ($arreglo as $key) {
                                      if($key!="")
                                      {
                                        array_push($ofertas, $key);
                                      }
                                    } 
 
                                    $total_oferta=count($ofertas);       
                                         $nombre_empresa=$editar[0]->nombre;
                                          $sector_empresa=$editar[0]->sector;
                                          $descripcion_empresa=$editar[0]->descripcion;
                                          $video_empresa=$editar[0]->video;
                                          $titulo_oferta=$editar[0]->titulo_oferta;
                                          $descripcion_oferta=$editar[0]->descripcion_oferta;
                                          $link_oferta=$editar[0]->link_oferta;
                                           $url="editpublicidad";
                                          $operacion=$editar[0]->id;
                                    }
                                  ?>
                                    <form enctype="multipart/form-data" id="formulario" action="addpublicidad" method="POST" style="margin: 0px;" id="form_candiactualizardatos">
                                        <input autocomplete="off" name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
                                         <input autocomplete="off" name="operacion" type="hidden" value="<?= $operacion;?>" id="my_token">
                                        <div class="row">
                                        	<div class="col-sm-12" style="padding-top: 30px;text-align: center;">
                                        		<h4 style="margin: 0px;">Registrar nueva empresa</h4>
                                        	</div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Nombre</span>
                                                <div class="pf-field">
                                                    <input autocomplete="off" value="<?= $nombre_empresa;?>" name="nombre" id="nombre" type="text" placeholder="Nombre">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Sector</span>
                                                <div class="pf-field">
                                                    <input autocomplete="off" value="<?= $sector_empresa;?>" placeholder="Sector" name="sector" id="sector" type="text">
                                                </div>
                                            </div>

                                              <div class="col-lg-6">
                                                <span class="pf-title">Imagen de perfil</span>
                                                <div class="pf-field">
                                                    <input autocomplete="off" accept="image/*" value="" name="img_perfil" id="img_perfil" type="file" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Imagen de portada</span>
                                                <div class="pf-field">
                                                    <input autocomplete="off" accept="image/*" value="" name="img_portada_2" id="img_portada" type="file">
                                                </div>
                                            </div>
                                             <div class="col-lg-12">
                                                <span class="pf-title">Descripción de la empresa</span>
                                                <div class="pf-field">
                                                  <textarea id="descripcion_empresa"   name="descripcion" style="height: 80px;resize: none;padding: 0px;"><?= $descripcion_empresa;?></textarea>
                                                </div>
                                            </div>

                                             <div class="col-lg-12">
                                                <span class="pf-title">Video</span>
                                                <div class="pf-field">
                                                 <input autocomplete="off" value="<?= $video_empresa;?>" type="text" name=" video" id="video">
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="padding-top: 30px;text-align: center;">
                                        		<h4 style="margin: 0px;">Ofertas</h4>
                                        	</div>
                                        	   <div class="col-lg-6">
                                                <span class="pf-title">Título</span>
                                                <div class="pf-field">
                                                    <input autocomplete="off"   name="titulo_oferta" id="titulo_oferta" value="<?= $titulo_oferta;?>" type="text" placeholder="Título">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Link</span>
                                                <div class="pf-field">
                                                     <input autocomplete="off" value="<?= $link_oferta;?>" name="link" id="link_oferta" type="text" placeholder="Link">
                                                </div>
                                            </div>
                                              <div class="col-lg-12">
                                                <span class="pf-title">Descripción de la oferta</span>
                                                <div class="pf-field">
                                                  <textarea id="descripcion_oferta" name="descripcion_oferta" style="height: 80px;resize: none;padding: 0px;"><?= $descripcion_oferta;?></textarea>
                                                </div>
                                            </div>
                                             <div class="col-sm-12" style="padding-top: 30px;text-align: center;">
                                        		<h4 style="margin: 0px;">Más Ofertas</h4>
                                        	</div>
                                          <?php
                                          
                                          ?>
                                          <?php for ($i = 1; $i<=50; $i++): ?>
                                            <?php
                                            $titulo="";
                                            $link="";

                                            if($i <= $total_oferta)
                                            { 
                                              $datos_oferta=explode('**$**',$ofertas[$i-1]); 
                                               $titulo=$datos_oferta[0];
                                              $link=$datos_oferta[1];
                                            }
                                            ?>
                                        	 <div class="col-lg-6">
                                                <span class="pf-title">Título - <?= $i;?></span>
                                                <div class="pf-field">
                                                    <input autocomplete="off" value="<?= $titulo?>" name="o<?= $i;?>" id="o<?= $i;?>" type="text" placeholder="Título">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Link - <?= $i;?></span>
                                                <div class="pf-field">
                                                     <input autocomplete="off" value="<?= $link?>" name="l<?= $i;?>" id="l<?= $i;?>" type="text" placeholder="Link">
                                                </div>
                                            </div> 
                                             <?php endfor;?>
                                            <div class="col-lg-12" style="margin-bottom: 10px;">
                                                <button type="button" onclick="validar()">Guardar</button>
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
<script src="../local/resources/views/empresas/assets/js/notify.min.js" type="text/javascript"></script> 

 <?php if (isset($_GET['result']) && $_GET['result']!=""): ?>
  <?php echo '<script>$.notify("'.$_GET['result'].'","info");</script>'?>
<?php endif ?>

<script>
	function validar()
	{
		if($("#nombre").val()==""){$.notify("Debe completar el campo Nombre","info");$("#nombre").focus();}
		else if($("#sector").val()==""){$.notify("Debe completar el campo Sector","info");$("#sector").focus();}
		else if($("#sector").val()==""){$.notify("Debe completar el campo Sector","info");$("#sector").focus();}
		else if($("#img_perfil").val()==""){$.notify("Debe subir una imagen de perfil","info");$("#img_perfil").focus();}
		else if($("#img_portada").val()==""){$.notify("Debe subir una imagen de portada","info");$("#img_portada").focus();}
		else if($("#descripcion_empresa").val()==""){$.notify("Debe completar el campo descripcion de empresa","info");$("#descripcion_empresa").focus();}
 

		else if($("#titulo_oferta").val()==""){$.notify("Debe completar el titulo de la oferta","info");$("#titulo_oferta").focus();}
		else if($("#link_oferta").val()==""){$.notify("Debe completar el link de la oferta","info");$("#link_oferta").focus();}
		else if($("#descripcion_oferta").val()==""){$.notify("Debe completar la descripción de la oferta","info");$("#descripcion_oferta").focus();}
		else
		{
			$("#formulario").submit();
		}

	}	
</script>
</body>
</html>