<!DOCTYPE html>
<html>
<?php $token=csrf_token();?>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <title>
            Jobbers Argentina
        </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="keywords"/>
        <meta content="CreativeLayers" name="author"/>
        <!-- Styles -->
        <link href="../../local/resources/views/css/bootstrap-grid.css" rel="stylesheet" type="text/css"/>
        <link href="../../local/resources/views/css/icons.css" rel="stylesheet"/>
        <link href="../../local/resources/views/css/animate.min.css" rel="stylesheet"/>
        <link href="../../local/resources/views/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="../../local/resources/views/css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="../../local/resources/views/css/chosen.css" rel="stylesheet" type="text/css"/>
        <link href="../../local/resources/views/css/colors/colors.css" rel="stylesheet" type="text/css"/>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <meta name="csrf-token" content="<?php echo $token ?>">
        <style type="text/css">
            .job-details ul > li 
         	{
         		margin-bottom: 0px;
         		font-weight: 700;
         	}
         	.job-details ul > li >span
         	{
         		 
         		font-weight: 400;
         	}
         	.degradado
         	{
         		background: rgba(255,255,255,1);
				background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
				background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,1)), color-stop(47%, rgba(246,246,246,1)), color-stop(100%, rgba(237,237,237,1)));
				background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
				background: -o-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
				background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
				background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed', GradientType=0 );
         	}
         	.tag
         	{
         		background-color: #ffb203;
         		color: #fff;
         		border-radius: 3px;
         		 
         		padding-right: 4px;
         		padding-left: 4px;
         		margin-left: 5px;
         	}
            .postulado
            {
                background-color: #ffb203;
            }
            .vcenter {
                    display: inline-block;
                  vertical-align: middle;
                  float: none;
              }
             p
             {
              font-size: 14px;line-height: 20px;
             }
             a
             {
              color: #3967b2;
              font-weight: 600;
             }
             .slick-prev, .slick-next 
             {
              display: none;
             }
             .account-btns{
               margin-left: 0px;
             }
        </style>
        <?php include('local/resources/views/includes/google_analitycs.php');?>
    </head>
</html>
<body>
    <?php include('local/resources/views/includes/general_header.php');?>
    <?php include('local/resources/views/includes/general_header_responsive.php');?>

<div class="theme-layout" id="scrollup">
    <section style="background-color: #eeeeee;margin-top: -25px;">
        <div class="block">
            <div class="container">
                <div class="row">
                     <div class="col-sm-9 mt-75 company-mb-90" style="background-color: #fff;padding-top: 15px;border:2px solid #ffaf03;border-radius: 5px;">
                      <div class="col-sm-12 mb-30" style="  min-height: 215px; padding: 0px;padding-top: 40px; background-image: url(../../img_company_pub/portada/<?= $detalle[0]->img_portada;?>);background-color: #000;">
                         <div class="col-sm-2  vcenter" >
                           <img class="fondo_portada" style="  border:3px solid #fff;border-radius: 50%;height: 120px;width: 120px;" src="../../img_company_pub/logo/<?= $detalle[0]->img_profile;?>">
                        </div> 
                        <div class="col-sm-8 vcenter"  >
                          <span  style="height: 35px;color: #fff;font-size: 32px;"><?= $detalle[0]->nombre;?></span><br>
                          <span  style="height: 35px;color: #fff;font-size: 18px;"><?= $detalle[0]->sector;?></span>
                        </div>
                      </div>
                       
                       <div class="col-sm-12" style="height: 120px;padding: 0px;">
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

                        <div class="col-xs-12" style="text-align: justify; padding-top: 20px;"> 
                            <p><?= $detalle[0]->descripcion;?></p> 
                        </div>
                        <div class="row">
                          <?php if ($detalle[0]->video!=""): ?>
                            <div class="col-sm-7" style="padding: 15px; background-color: #f7f7f7;">

                       <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $detalle[0]->video;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <?php
                          $contador_video=5;
                          ?>
                        </div>
                        <?php else: ?>
                          <?php
                          $contador_video=12;
                          ?>
                          <?php endif ?>
                            
                        <div class="col-sm-<?= $contador_video;?>" style="padding: 0px; text-align: center;background-color: #f7f7f7;padding-top: 15px;"> 
                            <img style="width: 75px;height: 75px;" src="../../img_company_pub/logo/<?= $detalle[0]->img_profile;?>" alt=""> 
                            <p><a href="<?= $detalle[0]->id?>" title=""><?= $detalle[0]->nombre?></a></p>
                            <p style="text-align: justify;padding: 10px;"> 
                              <strong><?= $detalle[0]->titulo_oferta?></strong><br>
                              <?= $detalle[0]->descripcion_oferta?><br> <a href="<?= $detalle[0]->link_oferta?>" title="">Ver oferta</a></p>

                        </div>
                        </div>
                        
                         <a href="../../bolsa" title=""> <img src="../../local/resources/views/images/bolsa_1.jpg" style="height: auto;width: 100%;"></a>  
                         <div class="col-sm-12 " style="padding: 0px; padding-top: 25px;">
                          <h5 style="text-align: center;">Más ofertas de <strong><?= $detalle[0]->nombre?></strong></h5>
                          <hr>
                         <div class="row">
                             <?php

                                $arreglo=explode('#$#', $detalle[0]->ofertas);
                                $bandera=0;
                                foreach ($arreglo as $key) {
                                  if($key!="")
                                  {
                                    $datos=explode('**$**', $key);
                                    echo ' 
                                    <div class="col-sm-6" style="cursor: pointer;">
                                      <div class="job-listing wtabs" style="padding: 5px;">
                                        <div class="job-title-sec" style="padding: 5px;width: 100%">
                                          <div class="c-logo"> <img style="width: 75px;height: 75px;margin-right: 15px;" src="../../img_company_pub/logo/'.$detalle[0]->img_profile.'" alt=""> 
                                         </div>
                                          <h5 style="padding-top: 25px;"><a  href="'.$datos[1].'" title="" style="font-size: 16px;font-weight: 600;">'.$datos[0].'</a> </h5>
                                        </div> 
                                      </div>
                                    </div> ';
                                  }
                                }                      
                              ?>
                         </div>

                     </div>
                    
                     <div class="row" style="background-color: #f7f7f7;margin-top: 25px;">
                      <div class="col-sm-12 " style="height: 120px;padding: 0px;">
                          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <ins class="adsbygoogle"
                                style="display:block"
                                data-ad-format="fluid"
                                data-ad-layout-key="-fb+5w+4e-db+86"
                                data-ad-client="ca-pub-1968505410020323"
                                data-ad-slot="2781120636"></ins>
                                <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                        </div>

                        <div class="col-lg-12" style="padding-top: 25px;"> 
                           <h5 style="text-align: center;"><strong>Jobbers </strong> te muestra las mejores empresas.</h5>
                          <hr>
                          <div class="top-company-sec">
                            <div class="row" id="companies-carousel">
                               <?php foreach ($destacadas as $key): ?>
                                  <div class="col-sm-12">
                                    <div class="top-compnay style2">
                                      <img style="height: 100px;width: 100px;" src="../../img_company_pub/logo/<?= $key->logo?>" alt="" />
                                      <h3><a href="#" title=""><?= $key->nombre?></a></h3>
                                      <span><?= $key->sector?></span>
                                      <a href="<?= $key->id?>" title="">Postularme</a>
                                    </div><!-- Top Company -->
                                  </div> 
                               <?php endforeach ?> 
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                
                <div class="col-sm-3 company-margins">
                    <div class="row ml-5-company" style="background-color: #fff;border-radius: 5px;border:2px solid #ffaf03;">
                      <form id="form_empresa" action="../../company/recomendar" method="POST" style="width: 100%">
                        <input type="hidden" name="_token" value="<?= $token;?>">
                        <input type="hidden" name="identificador" value="<?= $identificador;?>">
                       <div class="col-lg-12">
                          <h5 class="pf-title" style="text-align: center;font-size: 16px;font-weight: 500;">¿Qué empresa quieres ver en Jobbers?</h5>
                          <div class="pf-field">
                             <input autocomplete="off" value="" placeholder="Empresa" name="empresa" id="empresa" type="text">
                          </div>
                            <button onclick="validar_empresa()"  style="width: 100%;margin-top: -10px;" type="button">Enviar</button>
                       </div> 
                    </div> 
                  </form>
                    <div class="row ml-5-company" style="background-color: #fff;border-radius: 5px;border:2px solid #ffaf03;margin-top: 25px;">
                       <div class="col-lg-12">

                          <h5 class="pf-title" style="text-align: center;font-size: 16px;font-weight: 500;">¿Qué opinas de Jobbers?</h5>
                            <form id="form_valoracion" action="../../company/valorar" method="POST" >
                             <input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
                             <input type="hidden" name="identificador" value="<?= $identificador;?>">
                        <div class="pf-field">
                           <select id="valoracion" name="valoracion" data-placeholder="Seleccionar" class="chosen">
                              <option value="">Seleccionar</option>
                              <option value="Excelente">Excelente</option>
                              <option value="Muy bueno">Muy bueno</option>
                              <option value="Bueno">Bueno</option>
                              <option value="Debe Mejorar">Debe Mejorar</option>
                           </select>
                        </div>   
                          <div class="pf-field">
                              <textarea  placeholder="¿Qué te gustaría mejorar?" style="padding: 5px; resize: none;height: 100px;margin-top: 15px;" name="detalle"></textarea>
                          </div>
                            <button onclick="validar_evaluacion()" style="width: 100%;margin-top: -10px;" type="button">Enviar</button>
                       </div> 
                    </div> 
        
                    <div class="row ml-5-company" style="background-color: #fff;border-radius: 5px;border:2px solid #ffaf03;margin-top: 25px;">
                       <div class="col-lg-12">

                          <h5 class="pf-title" style="text-align: center;font-size: 16px;font-weight: 500;">Ofertas en Jobbers</h5>
                          <?php foreach ($ofertas as $key ): ?>
                            <?php 
                            $texto="";
                            if (strlen($key->titulo)>27) 
                              $texto= substr($key->titulo, 0,27)."...";
                            else
                            {
                               $texto=  $key->titulo;
                            }
                            ?>
                            <a style="font-size: 13px;" href="../../detalleoferta/<?= $key->id?>" title=""><?php echo $texto?></a><br>
                          <?php endforeach ?>
                          
                          
                          <p style="text-align: center;"><a href="#" title="" >Ver más</a></p>

                       </div> 
                    </div>                   
                </div>
            </div>
        </div>
    </section>
</div>
 <?php include('local/resources/views/includes/general_footer.php');?>
<script src="../../local/resources/views/js/jquery.min.js" type="text/javascript">
</script>
<script src="../../local/resources/views/js/modernizr.js" type="text/javascript">
</script>
<script src="../../local/resources/views/js/script.js" type="text/javascript">
</script>
<script src="../../local/resources/views/js/wow.min.js" type="text/javascript">
</script>
<script src="../../local/resources/views/js/slick.min.js" type="text/javascript">
</script>
<script src="../../local/resources/views/js/parallax.js" type="text/javascript">
</script>
<script src="../../local/resources/views/js/select-chosen.js" type="text/javascript">
</script>
<script src="../../local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript">
</script>
<script src="../../local/resources/views/empresas/assets/js/notify.min.js" type="text/javascript"></script> 

<script>
  function validar_empresa()
  {
    if($("#empresa").val()=="")
    {
       $.notify("Debe agregar una empresa.","info");
       $("#empresa").focus();
    }
    else
    {
      $("#form_empresa").submit();
    }
  }

  function validar_evaluacion()
  {
    if($("#valoracion").val()=="")
    {
       $.notify("Seleccionar una valoración.","info");
       $("#valoracion").focus();
    }
    else
    {
      $("#form_valoracion").submit();
    }
  }
</script>

<?php if (isset($_GET['result']) && $_GET['result']!=""): ?>
  <?php echo '<script>$.notify("'.$_GET['result'].'","info");</script>'?>
<?php endif ?>
</body>