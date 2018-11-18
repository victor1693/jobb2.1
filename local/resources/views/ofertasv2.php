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
        <!-- Styles -->
        <link href="local/resources/views/css/bootstrap-grid.css" rel="stylesheet" type="text/css"/>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="local/resources/views/css/icons.css" rel="stylesheet"/>
        <link <link="" href="local/resources/views/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="local/resources/views/css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="local/resources/views/css/colors/colors.css" rel="stylesheet" type="text/css"/>
        <style >

          .filter-offer
          {
            max-height: 450px;overflow-y: scroll;
           
          }
           .filter-offer::-webkit-scrollbar {
                    width: 5px;
              }

            /* Track */
            .filter-offer::-webkit-scrollbar-track {
                background: #f1f1f1; 
            }
             
            /* Handle */
            .filter-offer::-webkit-scrollbar-thumb {
                background: #a3a3a3; 
            }

            /* Handle on hover */
            .filter-offer::-webkit-scrollbar-thumb:hover {
                background: #555; 
            }
        </style>
        <?php include('local/resources/views/includes/google_analitycs.php');?>
    </head>
</html>
<body>
    <?php include('local/resources/views/includes/general_header.php');?>
    <?php include('local/resources/views/includes/general_header_responsive.php');?>

            <?php
                    function generar($objeto,$buscar)
                    {
                        $temp= array();
                        foreach ($objeto as $key) {
                           if($buscar=='genero'){array_push($temp,$key->genero);}
                           if($buscar=='provicia'){array_push($temp,$key->provincia);} 
                           if($buscar=='localidad'){array_push($temp,$key->localidad);} 
                           if($buscar=='disponibilidad'){array_push($temp,$key->disponibilidad);} 
                           if($buscar=='sector'){array_push($temp,$key->sector);}  
                           if($buscar=='nivel_estudio'){array_push($temp,$key->nivel_estudio);}   
                           if($buscar=='plan_estado'){array_push($temp,$key->plan_estado);} 
                           if($buscar=='turno'){array_push($temp,$key->turno);} 
                           if($buscar=='discapacidad'){array_push($temp,$key->discapacidad);}  
                           
                           if($buscar=='habilidades')
                           {
                              if($key->habilidades!=""){
                              $habilidades=explode(',',$key->habilidades);
                              if(count($habilidades)>0){
                                foreach ($habilidades as $key => $value) {
                                  array_push($temp,$value);
                                } 
                              }
                            }
                          }

                            if($buscar=='idiomas')
                           {
                                if($key->idiomas!=""){
                                  $idiomas=explode(',',$key->idiomas);
                                  if(count($idiomas)>0){
                                    foreach ($idiomas as $key => $value) {
                                      array_push($temp,$value);
                                    } 
                                  }
                                }
                            }    

                        }
                       return $temp;
                    }
                    
                    ?>
    <section class="section-offers" style="overflow-y: hidden;">
        <div class="block no-padding back-offers">
            <div class="container">
                <div class="row no-gape">
                  
                    <aside class="col-lg-3 column border-right" id="side-offers" style="padding-left: 0px;padding-right: 15px;">
                        
                        <form action="" id="form_filter" method="get">
                           <input type="hidden" name="pagina" id="pagina">
                  <input type="hidden" name="buscar" id="buscar" value="<?php if(isset($_GET['buscar'])){echo $_GET['buscar'];}?>">
                            <div class="widget filter-offer "  ">
                                <h3 class="sb-title open">
                                    Provincia
                                </h3>
                                <div class="type_widget" style="">
                                  <?php 
                                  $contador=0; 
                                  $tilde="";
                                  foreach (array_count_values(generar($datos,'provicia')) as $key => $value): ?>
                                   <?php  
                                   $contador++;
                                  
                                   ?>
                                    <p class="flchek">
                       <?php $tilde=""; if(isset($_GET['provincia']) && $_GET['provincia'] == $key){$tilde="checked";}else{$tilde="";}?>
                                        <input <?= $tilde;?> onclick="document.getElementById('form_filter').submit();" id="pronvincia_<?= $key;?>" name="provincia" type="radio" value="<?= $key?>">
                                            <label for="pronvincia_<?= $key;?>" id="label_pronvincia_<?= $key;?>">
                                                <?= $key?>
                                            </label>
                                            (<?= $value?>)
                                        </input>
                                    </p>
                                    <br> 
                                  <?php endforeach ?> 
                                </div>
                            </div>

                            <div class="widget filter-offer "  ">
                                <h3 class="sb-title open">
                                    Localidad
                                </h3>
                                <div class="type_widget" style="">
                                  <?php 
                                  $contador=0;
                                  $tilde="";
                                  foreach (array_count_values(generar($datos,'localidad')) as $key => $value): ?>
                                   <?php  $contador++;?>
                                    <p class="flchek">
                  <?php if(isset($_GET['localidad']) && $_GET['localidad'] == $key){$tilde="checked";}else{$tilde="";}?>
                                        <input <?= $tilde;?> onclick="document.getElementById('form_filter').submit();" id="localidad_<?= $key;?>" name="localidad" type="radio" value="<?= $key?>">
                                            <label for="localidad_<?= $key;?>" id="label_localidad_<?= $key;?>">
                                                <?= $key?>
                                            </label>
                                            (<?= $value?>)
                                        </input>
                                    </p>
                                    <br> 
                                  <?php endforeach ?> 
                                </div>
                            </div>
                              <?php 
                            $bandera_habilidades=0;
                            foreach ($datos as $key): ?>
                              <?php if ($key->habilidades=""): ?>
                                <?php $bandera_habilidades=1;?>
                              <?php endif ?>
                            <?php endforeach ?>
                            <?php if ($bandera_habilidades==1): ?>
                            <div class="widget filter-offer "  ">
                                <h3 class="sb-title open">
                                    Habilidades
                                </h3>
                                <div class="type_widget" style="">
                                  <?php 
                                  $contador=0;
                                  $tilde="";
                                  foreach (array_count_values(generar($datos,'habilidades')) as $key => $value): ?>
                                   <?php  $contador++;?>
                                    <p class="flchek">
                                    <?php if(isset($_GET['habilidades']) && $_GET['habilidades'] == $key){$tilde="checked";}else{$tilde="";}?>
                                        <input <?= $tilde;?> onclick="document.getElementById('form_filter').submit();" id="habilidades_<?= $key;?>" name="habilidades" type="radio" value="<?= $key?>">
                                            <label for="habilidades_<?= $key;?>" id="label_habilidades_<?= $key;?>">
                                                <?= $key?>
                                            </label>
                                            (<?= $value?>)
                                        </input>
                                    </p>
                                    <br> 
                                  <?php endforeach ?> 
                                </div>
                            </div>
                             <?php endif ?>
                                <?php 
                            $bandera_idiomas=0;
                            foreach ($datos as $key): ?>
                              <?php if ($key->idiomas=""): ?>
                                <?php $bandera_idiomas=1;?>
                              <?php endif ?>
                            <?php endforeach ?>
                            <?php if ($bandera_idiomas==1): ?>
                            <div class="widget filter-offer "  ">
                                <h3 class="sb-title open">
                                    Idiomas
                                </h3>
                                <div class="type_widget" style="">
                                  <?php 
                                  $contador=0;
                                  $tilde="";
                                  foreach (array_count_values(generar($datos,'idiomas')) as $key => $value): ?>
                                   <?php  $contador++;?>
                                    <p class="flchek">
                                    <?php if(isset($_GET['idiomas']) && $_GET['idiomas'] == $key){$tilde="checked";}else{$tilde="";}?>
                                        <input <?= $tilde;?> onclick="document.getElementById('form_filter').submit();" id="idiomas_<?= $key;?>" name="idiomas" type="radio" value="<?= $key?>">
                                            <label for="idiomas_<?= $key;?>" id="label_idiomas_<?= $key;?>">
                                                <?= $key?>
                                            </label>
                                            (<?= $value?>)
                                        </input>
                                    </p>
                                    <br> 
                                  <?php endforeach ?> 
                                </div>
                            </div>
                             <?php endif ?>
                            <div class="widget filter-offer ">
                                <h3 class="sb-title open">
                                    Disponibilidad
                                </h3>
                                <div class="type_widget" style="">
                                  <?php 
                                  $contador=0;
                                  foreach (array_count_values(generar($datos,'disponibilidad')) as $key => $value): ?>
                                    <?php $tilde=""; if(isset($_GET['disponibilidad']) && $_GET['disponibilidad'] == $key){$tilde="checked";}else{$tilde="";}?>
                                   <?php  $contador++;?>
                                    <p class="flchek">
                                        <input <?= $tilde?> onclick="document.getElementById('form_filter').submit();" id="disponibilidad_<?= $key;?>" name="disponibilidad" type="radio" value="<?= $key?>">
                                            <label for="disponibilidad_<?= $key;?>" id="label_disponibilidad_<?= $key;?>">
                                                <?= $key?>
                                            </label>
                                            (<?= $value?>)
                                        </input>
                                    </p>
                                    <br> 
                                  <?php endforeach ?> 
                                </div>
                            </div> 
                                <?php 
                            $bandera_genero=0;
                            foreach ($datos as $key): ?>
                              <?php if ($key->nivel_estudio!="Cualquiera"): ?>
                                <?php $bandera_genero=1;?>
                              <?php endif ?>
                            <?php endforeach ?>
                            <?php if ($bandera_genero==1): ?>
                            <div class="widget filter-offer "   ">
                                <h3 class="sb-title open">
                                    Género
                                </h3>
                                <div class="type_widget" style="">
                                  <?php 
                                  $contador=0;
                                  foreach (array_count_values(generar($datos,'genero')) as $key => $value): ?>
                                    <?php $tilde=""; if(isset($_GET['genero']) && $_GET['genero'] == $key){$tilde="checked";}else{$tilde="";}?>
                                   <?php  $contador++;?>
                                    <p class="flchek">
                                        <input  <?= $tilde?> onclick="document.getElementById('form_filter').submit();" id="genero_<?= $key;?>" name="genero" type="radio" value="<?= $key?>">
                                            <label for="genero_<?= $key;?>" id="label_genero_<?= $key;?>">
                                                 <?php if ($key=='Cualquiera'): ?>
                                                  Ambos 
                                                 <?php else: ?>
                                                  <?= $key?>
                                                 <?php endif ?> 
                                            </label>
                                            (<?= $value?>)
                                        </input>
                                    </p>
                                    <br> 
                                  <?php endforeach ?> 
                                </div>
                            </div><?php endif ?>

                            <div class="widget filter-offer "   style="height: 450px;overflow-y: scroll;">
                                <h3 class="sb-title open">
                                    Sector
                                </h3>
                                <div class="type_widget" >
                                  <?php 
                                  $contador=0;
                                  foreach (array_count_values(generar($datos,'sector')) as $key => $value): ?>
                                     <?php $tilde=""; if(isset($_GET['sector']) && $_GET['sector'] == $key){$tilde="checked";}else{$tilde="";}?>
                                   <?php  $contador++;?>
                                    <p class="flchek">
                                        <input <?= $tilde?>  onclick="document.getElementById('form_filter').submit();" id="sector_<?= $key;?>" name="sector" type="radio" value="<?= $key?>">
                                            <label for="sector_<?= $key;?>" id="label_sector_<?= $key;?>">
                                                <?= $key?>
                                            </label>
                                            (<?= $value?>)
                                        </input>
                                    </p>
                                    <br> 
                                  <?php endforeach ?> 
                                </div>
                            </div>

                               <?php 
                            $bandera_nivel_estudio=0;
                            foreach ($datos as $key): ?>
                              <?php if ($key->nivel_estudio!="Cualquiera"): ?>
                                <?php $bandera_nivel_estudio=1;?>
                              <?php endif ?>
                            <?php endforeach ?>
                            <?php if ($bandera_nivel_estudio==1): ?> 
                            <div class="widget filter-offer ">
                                <h3 class="sb-title open">
                                    Nivel estudio
                                </h3>
                                <div class="type_widget" style="">
                                  <?php 
                                  $contador=0;
                                  foreach (array_count_values(generar($datos,'nivel_estudio')) as $key => $value): ?>
                                     <?php $tilde=""; if(isset($_GET['nivel_estudio']) && $_GET['nivel_estudio'] == $key){$tilde="checked";}else{$tilde="";}?>
                                   <?php  $contador++;?>
                                    <p class="flchek">
                                        <input <?= $tilde?> onclick="document.getElementById('form_filter').submit();" id="nivel_estudio_<?= $key;?>" name="nivel_estudio" type="radio" value="<?= $key?>">
                                            <label for="nivel_estudio_<?= $key;?>" id="label_nivel_estudio_<?= $key;?>">
                                                <?php if ($key=='Cualquiera'): ?>
                                                  Sin Definir 
                                                 <?php else: ?>
                                                  <?= $key?>
                                                 <?php endif ?>  
                                            </label>
                                            (<?= $value?>)
                                        </input>
                                    </p>
                                    <br> 
                                  <?php endforeach ?> 
                                </div>
                            </div> <?php endif ?>

                            <div class="widget filter-offer ">
                                <h3 class="sb-title open">
                                   Plan Estado
                                </h3>
                                <div class="type_widget" style="">
                                  <?php 
                                  $contador=0;
                                  foreach (array_count_values(generar($datos,'plan_estado')) as $key => $value): ?>
                                     <?php $tilde=""; if(isset($_GET['plan_estado']) && $_GET['plan_estado'] == $key){$tilde="checked";}else{$tilde="";}?>
                                   <?php  $contador++;?>
                                    <p class="flchek">
                                        <input <?= $tilde?> onclick="document.getElementById('form_filter').submit();" id="plan_estado_<?= $key;?>" name="plan_estado" type="radio" value="<?= $key?>">
                                            <label for="plan_estado_<?= $key;?>" id="label_plan_estado_<?= $key;?>">
                                                <?php if ($key==""): ?>
                                                  Sin definir
                                                  <?php else: ?>
                                                    <?= $key?>
                                                <?php endif ?> 
                                            </label>
                                            (<?= $value?>)
                                        </input>
                                    </p>
                                    <br> 
                                  <?php endforeach ?> 
                                </div>
                            </div>
                            <?php 
                            $bandera_turno=0;
                            foreach ($datos as $key): ?>
                              <?php if ($key->turno!="Sin Defini"): ?>
                                <?php $bandera_turno=1;?>
                              <?php endif ?>
                            <?php endforeach ?>
                            <?php if ($bandera_turno==1): ?> 
                            <div class="widget filter-offer ">
                                <h3 class="sb-title open">
                                   Turno
                                </h3>
                                <div class="type_widget" style="">
                                  <?php 
                                  $contador=0;
                                  foreach (array_count_values(generar($datos,'turno')) as $key => $value): ?>
                                     <?php $tilde=""; if(isset($_GET['turno']) && $_GET['turno'] == $key){$tilde="checked";}else{$tilde="";}?>
                                   <?php  $contador++;?>
                                    <p class="flchek">
                                        <input <?= $tilde?> onclick="document.getElementById('form_filter').submit();" id="turno_<?= $key;?>" name="turno" type="radio" value="<?= $key?>">
                                            <label for="turno_<?= $key;?>" id="label_turno_<?= $key;?>">
                                                <?php if ($key == 'Sin Defini'): ?>
                                                  Sin definir
                                                <?php endif ?>
                                            </label>
                                            (<?= $value?>)
                                        </input>
                                    </p>
                                    <br> 
                                  <?php endforeach ?> 
                                </div>
                            </div>
                            <?php endif ?>
                              <?php 
                            $bandera_discapacidad=0;
                            foreach ($datos as $key): ?>
                              <?php if ($key->discapacidad!="Sin Definir"): ?>
                                <?php $bandera_turno=1;?>
                              <?php endif ?>
                            <?php endforeach ?>
                            <?php if ($bandera_discapacidad==1): ?> 
 
                            <div class="widget filter-offer ">
                                <h3 class="sb-title open">
                                   Discapacidad
                                </h3>
                                <div class="type_widget" style="">
                                  <?php 
                                  $contador=0;
                                  foreach (array_count_values(generar($datos,'discapacidad')) as $key => $value): ?>
                                   <?php  $contador++;?>
                                     <?php $tilde=""; if(isset($_GET['discapacidad']) && $_GET['discapacidad'] == $key){$tilde="checked";}else{$tilde="";}?>
                                    <p class="flchek">
                                        <input <?= $tilde?> onclick="document.getElementById('form_filter').submit();" id="discapacidad_<?= $key;?>" name="discapacidad" type="radio" value="<?= $key?>">
                                            <label for="discapacidad_<?= $key;?>" id="label_discapacidad_<?= $key;?>">
                                                <?php if ($key == '0'): ?>
                                                  Sin definir
                                                <?php endif ?>
                                            </label>
                                            (<?= $value?>)
                                        </input>
                                    </p>
                                    <br> 
                                  <?php endforeach ?> 
                                </div>
                            </div>
                            <?php endif ?>
                        </form>
                    </aside>
                    <div class="col-lg-9 column" id="offers" style="padding-top: 64px;">
                        <div class="col-xs-7" style="text-align: center;padding: 0px;">
                          
                           <div class="pf-field">
                                    <input value="<?php if(isset($_GET['buscar'])){echo $_GET['buscar'];}?>" style="border: 1px solid #c4c4c4;" id="buscador_1"  type="text" placeholder="Buscar... Consultor, programador, analísta...">
                            </div>
                        </div> 

                        <div class="col-xs-2" style="padding-left: 0px;">
                          <div class="pf-field" >
                            <button onclick="buscar()" class="btn btn-primary" style="margin-top: 0px;height: 49px;width: 80px;float: left;">Buscar</button>

                          </div>
                        </div> 
                         <div class="col-xs-3" style="padding-left: 0px; text-align: right;padding-right: 0px;">
                            <button type="button" onclick="location.href='ofertas'" title="Limpiar filtros" class="btn btn-warning" style="margin-top: 0px;height: 49px;width: 50px;float: right;">
                              <i class="fa fa-trash" style="font-size: 24px;"></i></button>
                            <p style="font-weight: 600;font-size: 16px;padding-top: 7px;text-align: left;padding-left: 9px;">
                              <?= count($datos);?> Ofertas
                            </p>
                            
                        </div> 
                        <div class="col-sm-12" style="padding: 0px;height: 130px;">
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
                        <div class="job-list-modern">
                            <div class="job-listings-sec">   
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
                                <?php if (count($publicidad)>1): ?>
                                  
                                
                                <div class="alert alert-info">
                                  <span style="font-weight: 600">Jobbers</span> Buscando siempre las mejores oportunidadades de empleo para  tí.
                                </div>
                                <div class="col-lg-4 col-md-4  col-sm-12 col-xs-12" style="background-color: #fff;margin-bottom: 15px;padding: 0px;padding: 5px;padding-top: 12px; border:1px solid #ddd;border:1px solid #ddd; border-radius: 5px;border-top: 5px solid #4caf50;min-height: 300px;">

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
                                 <div class="col-lg-4 col-md-4  col-sm-12 col-xs-12" style="background-color: #fff;margin-bottom: 15px;padding: 0px;padding: 5px;padding-top: 12px; border:1px solid #ddd;border:1px solid #ddd; border-radius: 5px;border-top: 5px solid #4caf50;min-height: 300px;">
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
                                  
                                <?php

                                $contador=0;
                                $inicio =($_GET['pagina']*25)-25;
                                $final =($_GET['pagina']*25);


                                foreach ($datos as $key): ?>
                                 <?php if ($contador>=$inicio && $contador<=$final): ?>
                                    
                                
                               
                                <div class="job-listing wtabs">
                                    <a href="#">
                                        <div class="mobile">
                                            <img alt="" class="img-fluid img-oferta" src="uploads/min/<?= $key->img_profile?>">
                                                <p class="nombre-img">
                                                </p>
                                            </img>
                                              <?php echo  programa($key->plan_estado);?>
                                        </div>
                                    </a>
                                    <div class="job-title-sec container-desc-oferta">
                                        <a href="detalleoferta/<?= $key->id;?>">
                                            <h5 class="title-recom" style="font-size: 18px;">
                                                <?= ucfirst(mb_strtolower($key->titulo))?>
                                            </h5>
                                        </a>
                                        <p class="time-pub">
                                            <i class="fa fa-calendar">
                                            </i>
                                            Publicada <?= $key->tmp;?>
                                        </p>
                                        <p class="desc-oferta">
                                           <?= substr(strip_tags($key->descripcion), 0,350) ;?>...
                                        </p> 
                                        <div class="job-lctn">
                                            <a href="">
                                               
                                                <i class="fa fa-eye  mr-0">
                                                </i> Visitas
                                                <?= $key->vistas;?>
                                                <i class="fa fa-clock-o mr-0">
                                                </i>
                                                 Disponibilidad
                                                <span class="disponibilidad">
                                                   <?= $key->disponibilidad;?>
                                                </span>
                                            </a> 
                                        </div>
                                    </div>
                                    <div class="job-style-bx container-img-oferta desk">
                                        <img alt="" style="height: 75px;width: 75px;" class="img-fluid img-oferta" src="uploads/min/<?= $key->img_profile?>">
                                        </img>
                                        <?php echo  programa($key->plan_estado);?>
                                    </div>
                                </div>
                                 <?php endif ?>
                                <?php 
                                $contador++; 
                              endforeach ?> 
  <?php
                              function programa($parametro)
                              {
                                $imagen="";
                                if($parametro!="")
                                {
                                  if($parametro=='PPPA-Cambio empresa')
                                  {
                                   $imagen="local/resources/views/images/programas/ppp.png";
                                  }
                                  else if($parametro=='PPP-Cambio empresa')
                                  {
                                     $imagen="local/resources/views/images/programas/pppp.png";
                                  }
                                  else if($parametro=='MAS Y MEJOR TRABAJO')
                                  {
                                     $imagen="local/resources/views/images/programas/jovenes.png";
                                  }

                                  else if($parametro=='PILA-Cambio empresa')
                                  {
                                     $imagen="local/resources/views/images/programas/pila.png";
                                  }
                                  else if($parametro=='XMI')
                                  {
                                     $imagen="local/resources/views/images/programas/xmi.png";
                                  }
                                  else if($parametro=='PIP-Cambio empresa')
                                  {
                                     $imagen="local/resources/views/images/programas/pip.png";
                                  }
                                   return '<div><img style="height:30px;width:auto;" alt="" class="img-fluid img-oferta" src="'.$imagen.'">
                                        </img></div>';
                                   
                                }
                              }
                              ?>
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
    </section>
     <?php include('local/resources/views/includes/general_footer.php');?>
    <script src="local/resources/views/js/jquery.min.js" type="text/javascript">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    <script src="local/resources/views/js/modernizr.js" type="text/javascript">
    </script>
    <script src="local/resources/views/js/script.js" type="text/javascript">
    </script>
    <script type="text/javascript">
      function paginar(parametro)
      {
          $("#pagina").val(parametro);
          $("#form_filter").submit();
      }
      function buscar()
      {
          $("#buscar").val($("#buscador_1").val());
               $("#form_filter").submit();
      }
      $("#buscador_1").keypress(function(e) {
          if(e.which == 13) {
              buscar();
          }
      });
    </script>
</body>
