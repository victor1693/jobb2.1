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

        .contendor_empresa
        {
          background-color: #fff;
          border: 1px solid #ddd;
          height: 100%;
        }
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

                           if($buscar=='provicia'){if($key->provincia!=""){array_push($temp,$key->provincia);} }
                           if($buscar=='localidad'){if($key->localidad!=""){array_push($temp,$key->localidad);} }
                           if($buscar=='tamano'){if($key->tamano_empresa!=""){array_push($temp,$key->tamano_empresa);}} 
                           if($buscar=='sector'){if($key->actividad_empresa!=""){array_push($temp,$key->actividad_empresa);} } 
                           if($buscar=='tipo'){if($key->tipo_empresa!=""){array_push($temp,$key->tipo_empresa);}}   
                        }
                       return $temp;
                    }
                    
                    function validar($cadena)
                    {
                      if($cadena==""){return "&nbsp;";} 
                      else{
                          $nueva_cadena="";
                          if(strlen($cadena)>30)
                          {
                               $nueva_cadena=ucfirst(mb_strtolower(substr($cadena, 0,30)));
                               $nueva_cadena=$nueva_cadena."...";
                          }
                          else
                          {
                              $nueva_cadena=ucfirst(mb_strtolower($cadena));
                          }
                         
                          return $nueva_cadena;
                        }
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
                             <div class="widget filter-offer " >
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
                                </div> </div>
                    

                            <div class="widget filter-offer " >
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

                            <div class="widget filter-offer " >
                                <h3 class="sb-title open">
                                    Categoría
                                </h3>
                                <div class="type_widget" style="">
                                  <?php 
                                  $contador=0;
                                  $tilde="";
                                  foreach (array_count_values(generar($datos,'sector')) as $key => $value): ?>
                                   <?php  $contador++;?>
                                    <p class="flchek">
                  <?php if(isset($_GET['categoria']) && $_GET['categoria'] == $key){$tilde="checked";}else{$tilde="";}?>
                                        <input <?= $tilde;?> onclick="document.getElementById('form_filter').submit();" id="categoria<?= $key;?>" name="categoria" type="radio" value="<?= $key?>">
                                            <label for="categoria<?= $key;?>" id="label_categoria_<?= $key;?>">
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
                            $bandera_tamano=0;
                            foreach ($datos as $key): ?>
                              <?php if ($key->tamano_empresa!="Sin Definir"): ?>
                                <?php $bandera_tamano=1;?>
                              <?php endif ?>
                            <?php endforeach ?>
                            <?php if ($bandera_tamano==1): ?>

                            <div class="widget filter-offer " >
                                <h3 class="sb-title open">
                                    Tamaño de la empresa
                                </h3>
                                <div class="type_widget" style="">
                                  <?php 
                                  $contador=0;
                                  $tilde="";
                                  foreach (array_count_values(generar($datos,'tamano')) as $key => $value): ?>
                                   <?php  $contador++;?>
                                    <p class="flchek">
                  <?php if(isset($_GET['tamano']) && $_GET['tamano'] == $key){$tilde="checked";}else{$tilde="";}?>
                                        <input <?= $tilde;?> onclick="document.getElementById('form_filter').submit();" id="tamano<?= $key;?>" name="tamano" type="radio" value="<?= $key?>">
                                            <label for="tamano<?= $key;?>" id="label_tamano_<?= $key;?>">
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
                            $bandera_tipo_emp=0;
                            foreach ($datos as $key): ?>
                              <?php if ($key->tipo_empresa!="Sin definir"): ?>
                                <?php $bandera_tipo_emp=1;?>
                              <?php endif ?>
                            <?php endforeach ?>
                            <?php if ($bandera_tipo_emp==1): ?>

                            <div class="widget filter-offer " >
                                <h3 class="sb-title open">
                                    Tipo de empresa
                                </h3>
                                <div class="type_widget" style="">
                                  <?php 
                                  $contador=0;
                                  $tilde="";
                                  foreach (array_count_values(generar($datos,'tipo_empresa')) as $key => $value): ?>
                                   <?php  $contador++;?>
                                    <p class="flchek">
                  <?php if(isset($_GET['tipo']) && $_GET['tipo'] == $key){$tilde="checked";}else{$tilde="";}?>
                                        <input <?= $tilde;?> onclick="document.getElementById('form_filter').submit();" id="tipo<?= $key;?>" name="tipo" type="radio" value="<?= $key?>">
                                            <label for="tipo<?= $key;?>" id="label_tipo_<?= $key;?>">
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
                        </form>
                    </aside>
                    <div class="col-lg-9 column" id="offers" style="padding-top: 64px;">
                        <div class="col-xs-9 col-sm-7" style="text-align: center;padding: 0px;">
                          
                           <div class="pf-field">
                                    <input value="<?php if(isset($_GET['buscar'])){echo $_GET['buscar'];}?>" style="border: 1px solid #c4c4c4;" id="buscador_1"  type="text" placeholder="Buscar... Jobbers, Activos humanos, Acento">
                            </div>
                        </div> 

                        <div class="col-xs-3 col-sm-2">
                          <div class="pf-field" >
                            <button onclick="buscar()" class="btn btn-primary" style="margin-top: 0px;height: 49px;width: 80px;float: left;">Buscar</button>

                          </div>
                        </div> 
                         <div class="col-xs-12 col-sm-3" style="padding-left: 0px; text-align: right;padding-right: 0px;">
                            <button type="button" onclick="location.href='ofertas'" title="Limpiar filtros" class="btn btn-warning" style="margin-top: 0px;height: 49px;width: 50px;float: right;">
                              <i class="fa fa-trash" style="font-size: 24px;"></i></button>
                            <p style="font-weight: 600;font-size: 16px;padding-top: 7px;text-align: left;padding-left: 9px;">
                              <?= count($datos);?> Empresas
                            </p>
                            
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
                       <div class="col-sm-12" style="padding-left: 0px;padding-right: 0px;">
                         <?php 

                                  $pagina=ceil((count($datos)/26));
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
                                  <?php if (count($publicidad )>1): ?>
                                    
                                
                                <div class="alert alert-info">
                                  <span style="font-weight: 600">Jobbers</span> Buscando siempre las mejores oportunidadades de empleo para  tí.
                                </div>
                                <div class="col-lg-4 col-md-4  col-sm-12 col-xs-12" style="background-color: #fff;margin-bottom: 15px;padding: 0px;padding: 5px;padding-top: 12px; border:1px solid #ddd;border:1px solid #ddd; border-radius: 5px;border-top: 5px solid #4caf50;min-height: 300px;">

                                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <ins class="adsbygoogle"
                                style="display:block"
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
                                    <img style="height: 145px;width: 280px;margin: 0 auto;" src="<?= Request::root()?>/img_company_pub/portada/<?= $key->img_portada?>"></a>
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
                                $inicio =($_GET['pagina']*26)-26;
                                $final =($_GET['pagina']*26);


                                foreach ($datos as $key): ?>
                                 <?php if ($contador>=$inicio && $contador<=$final): ?>


                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 "style="padding-left: 0px;padding-right: 0px;">
                              <div class="emply-list box contendor_empresa" style="padding-right: 5px;padding-left: 5px;">
                                <div class="emply-list-thumb">
                                  <a href="empresa/detalle/<?= $key->id;?>" title=""><img style="width: 80px;height: 80px;" src="uploads/min/<?= $key->img_profile;?>" alt=""></a>
                                </div>
                                <div class="emply-list-info">
                                  <div class="emply-pstn"><?= $key->cantidad;?> Ofertas</div>
                                  <h3><a href="empresa/detalle/<?= $key->id;?>" title=""><?= validar($key->nombre);?></a></h3>
                                  <span><?= validar($key->actividad_empresa);?></span>
                                  <h6><i class="la la-map-marker"></i> <?= validar($key->provincia.' - '.$key->localidad);?></h6>
                                  <button onclick="location.href='empresa/detalle/<?= $key->id;?>'" type="button" class=" btn btn-primary" style="float: none">Ver</button>
                                </div>
                              </div><!-- Employe List -->
                            </div> 
                              <?php endif ?>
                                <?php 
                                $contador++; 
                              endforeach ?>  
                         </div>
                        
                        <div class="job-list-modern"> 
                            <div class="job-listings-sec"> 
                                <!-- Oferta normal -->
                                
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
                                    <?php endfor ?> 
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
