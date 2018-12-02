<?php

$mi_tokken=csrf_token();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <title>
            Jobbers Argentina
        </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="keywords"/>
        <meta content="CreativeLayers" name="author"/>
        <meta content="<?php echo $mi_tokken;?>" name="csrf-token"/> 
         <link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
        <link href="local/resources/views/css/bootstrap-grid.css" rel="stylesheet" type="text/css"/>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="local/resources/views/css/icons.css" rel="stylesheet"/>
        <link <link="" href="local/resources/views/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="local/resources/views/css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="local/resources/views/css/colors/colors.css" rel="stylesheet" type="text/css"/> 
        <?php include('local/resources/views/includes/google_analitycs.php');?>
        <style>
          .ofertas-externas
          {
            min-height: 130px;
          } 
        </style>
 <script src="local/resources/views/js/jquery.min.js" type="text/javascript">
    </script>
    </head>
</html>
<body>
    <?php include('local/resources/views/includes/general_header.php');?>
    <?php include('local/resources/views/includes/general_header_responsive.php');?> 
           
    <section class="section-offers" style="overflow-y: hidden;">
        <div class="block no-padding back-offers">
                <div class="container"> 
                    <div class="job-listings-tabs">
                  <div class="row" style="padding-top: 50px;"> 
                    <div class="col-lg-12">
                      <form id="formulario" method="GET" action="<?= Request::root()?>/bolsa">
                         <input type="hidden" name="pagina" id="pagina">
                        <h1 style="font-size: 28px;text-align: center;">Bolsa de empleo Nacional
                          <br>
                          <span style="font-size: 16px;">Jobbers hace una búsqueda en todo internet para poner a tu disposición los mejores empleos del momento.</span>
                        </h1>
                       <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-0"> 
                        </div>  
                          <div class="col-sm-3"  style="padding: 0px;">
                          <div class="pf-field">
                             <select onchange="$('#formulario').submit()" name="provincia" data-placeholder="Provincia" class="chosen">
                              <option value="">Provincia</option>
                              <?php foreach ($provincia as $key): ?>
                              <option value="<?= $key->provincia;?>"><?= utf8_decode($key->provincia);?></option>    
                              <?php endforeach ?>
                                                          
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-3"  style="padding: 0px;">
                          <div class="pf-field">
                           <select onchange="$('#formulario').submit()"  name="localidad" data-placeholder="Localidad" class="chosen">
                            <option value="">Localidad</option>
                            option
                              <?php foreach ($localidad as $key): ?>
                              <option value="<?= $key->localidad;?>"><?= utf8_decode($key->localidad);?></option>    
                              <?php endforeach ?>                             
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-4"  style="padding: 0px;">
                          <div class="pf-field">
                           <select onchange="$('#formulario').submit()" name="empresa" data-placeholder="Empresa" class="chosen">
                            <option value="">Empresa</option>
                              <?php foreach ($empresas as $key): ?>
                              <option value="<?= $key->empresa;?>"><?= utf8_decode($key->empresa);?></option>    
                              <?php endforeach ?>                             
                              </select>
                            </div>
                          </div>
                           <div class="col-lg-2 col-md-2 col-sm-0"> 
                        </div>
                       </div> 
                       <div class="row" style="padding-top: 25px;">
                        <div class="col-lg-3 col-md-3 col-sm-0"> 
                        </div>
                          <div class="col-sm-5"  style="padding: 0px;">
                            <div class="pf-field" style="text-align: center;">
                                    <input name="buscar" value="" style="border: 1px solid #c4c4c4;" id="buscador_1" type="text" placeholder="Buscar... Consultor, programador, analísta..."> 
                            </div>
                         </div>
                         <div class="col-sm-1"  style="padding: 0px;">
                            <button type="submit" class="btn btn-lg btn-warning" style="margin-top: 0px;height: 49px;">Buscar</button>
                         </div>
                          <div class="col-lg-2 col-md-2 col-sm-0"> 
                        </div>
                       </div>
                      </form>
                    </div>
                     <div class="col-sm-12" style="margin-bottom: 25px;">
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
                       <?php 

                                  $pagina=ceil((count($datos)/25));
                                  if (empty($_GET['pagina']) || $_GET['pagina']=="") {
                                       $_GET['pagina']=1;
                                  }
                                  $atras=1;
                                  $siguiente=$pagina;
                                  if($_GET['pagina']!=1)
                                  {
                                    $atras=$_GET['pagina']-1; 
                                  }
                                   if($_GET['pagina']!=$pagina)
                                  {
                                    $siguiente=$_GET['pagina']+1; 
                                  }
                                  ?>

                    <?php 
                    $contador=0;
                    $contador_de_pagina=0;
                     $inicio =($_GET['pagina']*25)-25;
                     $final =($_GET['pagina']*25);
                    foreach ($datos as $key): ?> 
                    <?php if ($contador_de_pagina>=$inicio && $contador_de_pagina<=$final): ?>
                    <div class="col-lg-6">
                       <div class="job-listing wtabs ">
                          <div class="ofertas-externas">
                             <div class="c-logo"> <a href="bolsa/<?= $key->amigable;?>" title=""><img style="width: 100px;height: 100px;margin-right: 15px;margin-top: 10px;" src="<?= utf8_decode($key->img)?>" alt=""></a> 
                             <div>
                                <span style="font-weight: 600;font-size: 14px;"><?= utf8_decode($key->empresa);?></span>
                              </div> 
                             </div>
                             <h1 style="font-weight: 600;margin-bottom: 5px; font-size: 16px;font-weight: 600; text-decoration: underline !important; color: #0099ff;"><a href="bolsa/<?= $key->amigable;?>" title=""><?= utf8_decode($key->titulo);?></a></h1>
                              <h3 style="font-size: 12px;margin-bottom: 5px;font-weight: 500"><?= utf8_decode($key->provincia);?> > <?= utf8_decode($key->localidad);?></h3>       
                             <h2 style="font-size: 14px;">
                              <?php
                              $descripcion= substr($key->descripcion,0,120);
                              echo  strip_tags(utf8_decode($descripcion)) .'...';
                              ?>                              
                             </h2>

                          <div class="job-style-bx" style="margin-top: 0px;">
                             <button onclick="location.href='bolsa/<?= $key->amigable;?>'" style="font-size: 14px; float: right;" class="btn btn-primary" type="button">Ver oferta</button> 
                          </div>

                          </div> 
                       </div>
                       <!-- Job --> 
                    </div>
                    <?php
                    $contador++;
                    ?>
                    <?php if ($contador==2): ?>
                      <div class="col-lg-12" style="margin-top: 35px">
                       <h3 style="text-align: center;margin-top: 15px;margin-bottom: 20px;font-weight: 600;">
                         Grandes <a style="text-decoration: underline !important;color: #0099ff;" href="<?= Request::root()?>/empresas" title="">Empresas</a>
                       </h3> 
                       <?php if (count($publicidad)>1): ?> 

                                <div class="col-lg-3 col-md-3  col-sm-12 col-xs-12" style="background-color: #fff;margin-bottom: 15px;padding: 0px;padding: 5px;padding-top: 12px; border:1px solid #ddd;border:1px solid #ddd; border-radius: 5px;border-top: 5px solid #4caf50;min-height: 300px;">

                                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <ins class="adsbygoogle"
                                style="display:block;height: 120px;"
                                data-ad-format="fluid"
                                data-ad-layout-key="-6t+ed+2i-1n-4w"
                                data-ad-client="ca-pub-1968505410020323"
                                data-ad-slot="2571530788"></ins>
                                <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                                </script> 
                                </div>
                                <?php foreach ($publicidad as $key): ?>
                                    <!--Ofertas de empresas -->
                                 <div class="col-lg-3 col-md-3  col-sm-12 col-xs-12" style="background-color: #fff;margin-bottom: 15px;padding: 0px;padding: 5px;padding-top: 12px; border:1px solid #ddd;border:1px solid #ddd; border-radius: 5px;border-top: 5px solid #4caf50;min-height: 300px;">
                                 <div style="text-align: center;">
                                  <a href="company/detalle/<?= $key->id;?>" title="">
                                    <img style="height: 145px;max-width: 280px;margin: 0 auto;" src="<?= Request::root()?>/img_company_pub/portada/<?= $key->img_portada?>"></a>
                                    <p style="text-align: left;font-weight: 600;font-size: 
                                    16px;font-family: 'Calibri';color: #4c4c4c;margin-left: 12px;margin-bottom: 0px;"><a href="company/detalle/<?= $key->id;?>" title=""><?= $key->nombre?></a> </p>
                                   

                                   <div style="text-align: left;font-weight: 300;font-size: 
                                    14px;font-family: 'Calibri';color: #919191;padding-left: 15px;">
                                      <span style=" letter-spacing: -1;"><?= substr($key->titulo_oferta, 0,75)?></span>
                                   </div>
                                 </div>
                                 <div style="padding-top: 15px;padding-bottom: 15px;text-align: right;padding-right: 15px;">
                                   <a style="border:1px solid #bfbfbf;text-align: center;color: #919191;font-size: 12px;padding: 5px;" href="company/detalle/<?= $key->id;?>" title="">Más información</a>
                                 </div>
                                </div>
                                <!--Fin ofertas empresas-->
                                <?php endforeach ?> 
                                <?php endif ?>
                                <a href="registrar" title=""><img style="height: auto;width: 100%;" src="local/resources/views/images/descarga-cv.jpg"></a>
                    </div>
                    <?php endif ?>
                    <?php if ($contador==10): ?>
                       <div class="col-sm-12" style="margin-bottom: 10px;margin-top: 10px;">
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
                    <?php endif ?>
                    <?php if ($contador==16): ?>
                      <div class="col-sm-12">
                        <h3 style="text-align: center;margin-top: 15px;margin-bottom: 20px;font-weight: 600;">
                         <a style="text-decoration: underline !important;color: #0099ff;" href="<?= Request::root()?>/ofertas" title="">Ofertas</a> Jobbers
                       </h3>
                      <div class="row"  style="padding-bottom: 30px; background-image: url(local/resources/views/empresas/app-assets/images/logo/bg-1.png)"> 
                        <?php foreach ($ofertas as $key): ?>
                          
                        
                      <div class="col-lg-6">
                       <div class="job-listing wtabs " style="border:2px solid #efb810;">
                          <div class="ofertas-externas">
                             <div class="c-logo"> <a href="detalleoferta/<?= $key->id;?>" title=""> <img style="width: 100px;height: 100px;margin-right: 15px;margin-top: 10px;" src="uploads/min/<?= $key->img_profile;?>" alt=""></a>
                             <div>
                                <span style="font-weight: 600;font-size: 14px;"><?= $key->empresa;?></span>
                              </div> 
                             </div>
                             <h1 style="font-weight: 600;margin-bottom: 5px; font-size: 16px;font-weight: 600; text-decoration: underline !important; color: #0099ff;"><a href="detalleoferta/<?= $key->id;?>" title=""><?= $key->titulo?></a></h1>
                              <h3 style="font-size: 12px;margin-bottom: 5px;font-weight: 500"><?= $key->provincia?> > <?= $key->localidad?></h3>       
                             <h2 style="font-size: 14px;">
                              <?php
                              $descripcion = substr($key->descripcion, 0,120);
                              echo strip_tags($descripcion);
                              ?>
                             </h2>

                          <div class="job-style-bx" style="margin-top: 0px;">
                             <button onclick="location.href='detalleoferta/<?= $key->id;?>'" style="font-size: 14px; float: right;" class="btn btn-primary" type="button">Ver oferta</button> 
                          </div>

                          </div> 
                       </div>
                       <!-- Job -->   </div> 
                       <?php endforeach ?>
                  
                    </div>
                      </div> 
                    <?php endif ?>
                     <?php endif ?>
                                <?php 
                                $contador_de_pagina++; 
                              endforeach ?> 
                    
                      
                   <div class="col-sm-12" style="margin-bottom:5px;">
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

                    <div class="col-lg-12">
                      <div class="pagination">
                                  <ul>
                                    <li class="prev"><a onClick="paginar(<?= $atras;?>)" ><i class="la la-long-arrow-left"></i> Atrás</a></li>
                                    <li class=" d-none active"><a onClick="paginar(<?= $_GET['pagina'];?>)" ><?= $_GET['pagina'];?></a></li>
                                    <?php 
                                    $contador=1;
                                    for ($i=$_GET['pagina']+1; $i <= $pagina; $i++): $contador++;?>
                                       <li class=" d-none "><a onClick="paginar(<?php echo $i;?>)"><?php echo $i;?></a></li>
                                       <?php if ($contador>3): ?>
                                         <?php break;?>
                                       <?php endif ?>
                                    <?php endfor?> 
                                      <li class="d-none"><span class="delimeter">...</span></li> 
                                      <li class="d-none"><a onClick="paginar(<?= $pagina;?>)" ><?= $pagina;?></a></li>
                                      <li class="next"><a  onClick="paginar(<?= $siguiente;?>)">Siguiente <i class="la la-long-arrow-right"></i></a></li>
                                  </ul>
                       </div>
                    </div>
                </div>
                  </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <?php include('local/resources/views/includes/general_footer.php');?>
   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    <script src="local/resources/views/js/modernizr.js" type="text/javascript">
    </script>
    <script src="local/resources/views/js/script.js" type="text/javascript">
    </script> 
    <script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script> 
    <script type="text/javascript">
       function paginar(parametro)
      {
          $("#pagina").val(parametro);
          $("#formulario").submit();
      }
    </script>
</body>
