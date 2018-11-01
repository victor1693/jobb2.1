<?php  
  function datos_candidato($id, $foto, $nombre, $apellido)
  {
    $url_candidato = "";
    $url_candidato_imagen = "";
    if (session()->get("empresa") == null) {
      $url_candidato = "login";
      $url_candidato_imagen = "local/resources/views/images/avatar.jpg";
      $nombre = $nombre;
    } elseif (session()->get("empresa") != "") {
      if (session()->get("emp_plan")[0]->id_plan == 1) {
        $url_candidato = "empresa/planes";
        $url_candidato_imagen = "local/resources/views/images/avatar.jpg";
        $nombre = $nombre;
      } else {
        $url_candidato = "candidato/$id";
        $url_candidato_imagen = "uploads/min/$foto";
        $nombre = $nombre . " " . $apellido;
      }
    } elseif (session()->get("candidato") == null || session()->get("candidato") != null) {
      $url_candidato = "candidatos";
      $url_candidato_imagen = "local/resources/views/images/avatar.jpg";
      $nombre = $nombre;
    }

    return [
      "candidato" => $url_candidato,
      "imagen" => $url_candidato_imagen,
      "nombre" => $nombre
    ];
  }


?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Jobbers Argentina
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="CreativeLayers">
    <!-- Styles -->

    <link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="local/resources/views/css/icons.css">
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-1968505410020323",
        enable_page_level_ads: true
      });
    </script>
    <?php include('local/resources/views/includes/chat_soporte.php');?>
    <?php include('local/resources/views/includes/google_analitycs.php');?>
  </head>
  <body>
    <?php include('local/resources/views/includes/general_header.php');?>
    <?php include('local/resources/views/includes/general_header_responsive.php');?>
    <section class="overlape mt-responsive">
      <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(local/resources/views/images/fondo_candidatos.jpg) repeat scroll 10% 422.28px transparent;" class="parallax scrolly-invisible no-parallax">
        </div>
        <!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="inner-header">
                <h3 style="font-size: 36px;">Jobbers tiene los mejores perfiles
                </h3>
                <h3 style="font-size: 22px;margin-top: -40px;">para los mejores puestos de trabajo.
                </h3>
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
          <div class="btn-showfilter">
            <button class="btn btn-primary" id="showFilters">Mostrar filtros <i class="fa fa-filter"></i></button>
          </div>
            <aside class="col-lg-3 column border-right" id="side-offers">
              <form id="form_filtros" method="POST" action="candidatos">
                <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                  
                  <?php if (sizeof($datos_habilidades) != 0): ?>               
                    <div class="widget" >
                      <h3 class="sb-title open">Habilidades</h3>
                      <div class="specialism_widget" style="">
                        <!-- Search Widget -->
                        
                        <div class="simple-checkbox scrollbar ss-container"  >
                          <div class="ss-wrapper">
                            <div class="ss-content"> 
                              <?php
                              $aux=array();
                              ?>
                              <?php foreach ($datos_habilidades as $key): ?>
                              <?php if (in_array($key->descripcion, $aux)!=1): ?>
                              <p>
                                <input onclick="filtros_set()" type="checkbox" name="habilidad[]" id="as_habilidad_<?php echo str_replace(' ','_',$key->descripcion);?>" value="<?php echo $key->descripcion;?>">
                                <label id="label_as_habilidad_<?php echo str_replace(' ','_',$key->descripcion);?>" for="as_habilidad_<?php echo $key->descripcion;?>"><?php echo $key->descripcion;?> (<?php echo $key->cantidad;?>)</label>
                              </p>
                              <?php array_push($aux, $key->descripcion);?>
                              <?php endif ?>
                              <?php endforeach ?>
                            </div>
                          </div>
                          <div class="" style="height: 58.5859%; top: 0%; right: -329px;"></div>
                        </div>
                      </div>
                    </div>
                  <?php endif ?>

                  <?php if(sizeof($datos_provincia) != 0): ?>
                    <div class="widget" >
                      <h3 class="sb-title open">Provincia</h3>
                      <div class="specialism_widget" style="">
                        <div class="simple-checkbox scrollbar ss-container"  >
                          <div class="ss-wrapper">
                            <div class="ss-content">
                              <?php
                              $aux=array();
                              ?>
                              <?php foreach ($datos_provincia as $key): ?>
                              <?php if (in_array($key->provincia, $aux)!=1): ?>
                              <p>
                                <input onclick="filtros_set()" type="checkbox" name="provincias[]" id="as_provincia_<?php echo $key->id_provincia;?>" value="<?php echo $key->id_provincia;?>">
                                <label for="as_provincia_<?php echo $key->id_provincia;?>" id="label_as_provincia_<?php echo $key->id_provincia;?>" ><?php echo $key->provincia;?> (<?php echo $key->cantidad;?>)</label>
                              </p>
                              <?php array_push($aux, $key->provincia);?>
                              <?php endif ?>
                              <?php endforeach ?>
                            </div>
                          </div>
                          <div class="" style="height: 58.5859%; top: 0%; right: -329px;"></div>
                        </div>
                      </div>
                    </div>
                  <?php endif ?>

                  <?php if(sizeof($datos_localidades) != 0): ?>
                    <div class="widget" >
                      <h3 class="sb-title open">Localidades</h3>
                      <div class="specialism_widget" style="">
                        <div class="simple-checkbox scrollbar ss-container"  >
                          <div class="ss-wrapper">
                            <div class="ss-content">
                              <?php
                              $aux=array();
                              ?>
                              <?php foreach ($datos_localidades as $key): ?>
                              <?php if (in_array($key->localidad, $aux)!=1): ?>
                              <p>
                                <input onclick="filtros_set()" type="checkbox" name="localidad[]" id="as_localidad_<?php echo $key->id_localidad;?>" value="<?php echo $key->id_localidad;?>">
                                <label for="as_localidad_<?php echo $key->id_localidad;?>" id="label_as_localidad_<?php echo $key->id_localidad;?>"><?php echo $key->localidad;?> (<?php echo $key->cantidad;?>)</label>
                              </p>
                              <?php array_push($aux, $key->localidad);?>
                              <?php endif ?>
                              <?php endforeach ?>
                            </div>
                          </div>
                          <div class="" style="height: 58.5859%; top: 0%; right: -329px;"></div>
                        </div>
                      </div>
                    </div> 
                  <?php endif ?>

                  <?php if(sizeof($datos_disponibilidad) != 0): ?>
                    <div class="widget" >
                      <h3 class="sb-title open">Disponibilidad</h3>
                      <div class="specialism_widget" style="">
                        <!-- Search Widget -->
                        <div class="simple-checkbox scrollbar ss-container"  >
                          <div class="ss-wrapper">
                            <div class="ss-content">
                              
                              <?php
                              foreach ($datos_disponibilidad as $key):?>
                              <p>
                                <input onclick="filtros_set()" value="<?php echo $key->id_jornada?>" type="checkbox" name="disponibilidad[]" id="disponibilidad_<?php echo $key->id_jornada?>">

                                <label for="disponibilidad_<?php echo $key->id_jornada?>" id="label_disponibilidad_<?php echo $key->id_jornada?>"><?php echo $key->nombre;?> (<?php echo $key->cantidad;?>)</label>
                              </p>
                              <?php endforeach?>
                              
                            </div>
                          </div>
                          <div class="" style="height: 58.5859%; top: 0%; right: -329px;"></div>
                        </div>
                      </div>
                    </div>
                  <?php endif ?>

                  <?php if(sizeof($datos_idioma) != 0): ?> 
                    <div class="widget"  >
                      <h3 class="sb-title open">Idiomas</h3>
                      <div class="specialism_widget" style="">
                        <!-- Search Widget -->
                        <div class="simple-checkbox scrollbar ss-container"  >
                          <div class="ss-wrapper">
                            <div class="ss-content">
                              
                              <?php foreach ($datos_idioma as $key): ?>
                              <p>
                                <input onclick="filtros_set()" value="<?php echo $key->descripcion?>" type="checkbox" name="idiomas[]" id="as_idiomas_<?php echo str_replace(' ','_',$key->descripcion);?>">

                                <label for="as_idiomas_<?php echo str_replace(' ','_',$key->descripcion);?>" id="label_as_idiomas_<?php echo str_replace(' ','_',$key->descripcion);?>"><?php echo $key->descripcion;?> (<?php echo $key->cantidad?>)</label>
                              </p>
                              <?php endforeach ?>
                              
                            </div>
                          </div>
                          <div class="" style="height: 58.5859%; top: 0%; right: -329px;"></div>
                        </div>
                      </div>
                    </div> 
                  <?php endif ?>

                  <?php if(sizeof($datos_generos) != 0): ?>
                    <div class="widget"   >
                      <h3 class="sb-title open">Género</h3>
                      <div class="specialism_widget" style="">
                        <!-- Search Widget -->
                        <div class="simple-checkbox scrollbar ss-container"  >
                          <div class="ss-wrapper">
                            <div class="ss-content"> 
                                <?php foreach ($datos_generos as $key): ?>
                                <p>
                                  <input value="<?php echo $key->id_sexo?>" onclick="filtros_set()" type="checkbox" name="sexo[]" id="as_genero_<?php echo $key->id_sexo?>">
                                  <label for="as_genero_<?php echo $key->id_sexo?>" id="label_as_genero_<?php echo $key->id_sexo?>"><?php echo $key->descripcion;?>  (<?php echo $key->cantidad?>)</label>
                                </p>
                                <?php endforeach ?> 
                            </div>
                          </div>
                          <div class="" style="height: 58.5859%; top: 0%; right: -329px;"></div>
                        </div>
                      </div>
                    </div>
                  <?php endif ?>

                  <?php if(sizeof($datos_salarios) != 0): ?>
                    <div class="widget" >
                      <h3 class="sb-title open">Salarios</h3>
                      <div class="specialism_widget" style="">
                        <!-- Search Widget -->
                        <div class="simple-checkbox scrollbar ss-container"  >
                          <div class="ss-wrapper">
                            <div class="ss-content"> 
                                <?php foreach ($datos_salarios as $key): ?>
                                <p>
                                  <input value="<?php echo $key->id_remuneracion_pre?>" onclick="filtros_set()" type="checkbox" name="salarios[]" id="as_salarios_<?php echo $key->id_remuneracion_pre?>">
                                  <label  for="as_salarios_<?php echo $key->id_remuneracion_pre?>" id="label_as_salarios_<?php echo $key->id_remuneracion_pre?>"><?php echo $key->salario;?>  (<?php echo $key->cantidad?>)</label>
                                </p>
                                <?php endforeach ?> 
                            </div>
                          </div>
                          <div class="" style="height: 58.5859%; top: 0%; right: -329px;"></div>
                        </div>
                      </div>
                    </div>
                  <?php endif ?>

                  <?php if(sizeof($datos_cargos) != 0): ?>
                    <div class="widget" >
                      <h3 class="sb-title open">Cargos</h3>
                      <div class="specialism_widget" style="">
                        <!-- Search Widget -->
                        <div class="simple-checkbox scrollbar ss-container"  >
                          <div class="ss-wrapper">
                            <div class="ss-content"> 
                                <?php foreach ($datos_cargos as $key): ?>
                                <p>
                                  <input value="<?php echo $key->descripcion?>" onclick="filtros_set()" class="control_seleccionado" type="checkbox" name="cargos[]" id="as_cargos_<?php echo str_replace(' ','_',$key->descripcion);?>">
                                  <label  for="as_cargos_<?php echo str_replace(' ','_',$key->descripcion);?>" id="label_as_cargos_<?php echo str_replace(' ','_',$key->descripcion);?>"><?php echo $key->descripcion;?> (<?php echo $key->cantidad?>)</label>
                                </p>
                                <?php endforeach ?> 
                            </div>
                          </div>
                          <div class="" style="height: 58.5859%; top: 0%; right: -329px;"></div>
                        </div>
                      </div>
                    </div> 
                  <?php endif ?>
              </form>
               
              <div class="widget">
                <div class="subscribe_widget">
                  <h3>Algún problema?</h3>
                  <p>Escribenos en <a class="status" href="contacto">contacto jobbers</a> y te ayudaremos con lo que necesites.</p>
                </div>
              </div>
            </aside>
            <div class="col-lg-9 column">
              <div class="modrn-joblist">
                <div class="tags-bar" id="filtros">
                  
                  <div class="action-tags">
                    <a title="" onClick="limpiar()"><i class="la la-trash-o"></i> Quitar filtros</a>
                  </div>
                </div>
                <!-- Tags Bar -->
                <div class="filterbar">
                  <h5><?php echo count($datos_candidatos);?> candidatos</h5>
                </div>
              </div>
             
              
              <!-- MOdern Job LIst -->
              <div class="job-list-modern">
                <div class="job-listings-sec">
                  
                  <?php
                  foreach ($datos_candidatos as $key):

                  $datos = datos_candidato($key->id, $key->foto, $key->nombre, $key->apellido);
                  $imagen="uploads/empresa.jpg";
                  $nombre="Sin nombre";
                  $direccion=$key->localidades." / ".$key->direccion;
                  $disponibilidad='<span class="job-is ft">'.$key->disponibilidad.'</span>';
                  if($key->foto!="")
                  {
                  $imagen='uploads/min/'.$key->foto;
                  }
                  if($key->nombre!="")
                  {
                  $nombre=$key->nombre;
                  }
                  if($key->localidades=="" && $key->direccion=="")
                  {
                  $direccion="Sin dirección";
                  }
                  if($key->disponibilidad=="")
                  {
                  $disponibilidad="";
                  }
                  ?>
                  <div class="job-listing wtabs">
                    <div class="job-title-sec">
                      <div class="c-logo"> <img style="height: 98px; width: 98px;border-radius: 50%;margin-right: 25px;" src="<?php echo $datos["imagen"];?>" alt=""> </div>
                      
                      <h3><a href="<?php echo $datos["candidato"] ?>" title=""><?php echo $datos["nombre"];?></a></h3>
                      <span><i class="la la-map-marker"></i><?php echo $direccion;?></span>
                      <div class="job-lctn"></div>
                    </div>
                    <div class="job-style-bx">
                      <?php echo $disponibilidad;?>
                      <i></i>
                    </div>
                  </div>
                  <?php endforeach ?>
                  
              <?php if ($paginas > 0): ?>
                  <div class="pagination">
                    <ul>
                      <?php  
                        if (isset($_GET['pag'])) {
                          if ($_GET['pag'] != 1) {
                            $previous = intval($_GET['pag']) - 1;
                          } else {
                            $previous = 1;
                          }
                        } else {
                          $previous = 1;
                        }
                      ?>
                      <li class="prev"><a href="candidatos?pag=<?= $previous ?>"><i class="la la-long-arrow-left"></i> Atrás</a></li>
                      <!-- <li><a href="">1</a></li>
                      <li class="active"><a href="">2</a></li>
                      <li><a href="">3</a></li>
                      <li><span class="delimeter">...</span></li>
                      <li><a href="">14</a></li> -->
                      <?php if ($paginas >= 1 && $paginas <= 5): ?>
                        <?php for ($i=0;$i<$paginas;$i++): ?>
                          <?php $active = isset($_GET['pag']) ? ($i+1) == $_GET['pag'] ? 'active' : "" : ($i+1) == 1 ? 'active' : "" ?>
                          <li class=" d-none <?= $active ?>"><a href="candidatos?pag=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                        <?php endfor; ?>
                      <?php else: ?>
                        <?php if (($paginaAct+4) <= $paginas): ?>
                          <?php for ($i=$paginaAct;$i<=($paginaAct+4);$i++): ?>
                            <?php $active = isset($_GET['pag']) ? ($i) == $_GET['pag'] ? 'active' : "" : ($i) == 1 ? 'active' : "" ?>
                            <li class=" d-none <?= $active ?>"><a href="candidatos?pag=<?= $i ?>"><?= $i ?></a></li>
                          <?php endfor; ?>
                        <?php elseif ($paginaAct == $paginas): ?>
                          <?php for ($i=($paginaAct-4);$i<=$paginas;$i++): ?>
                            <?php $active = isset($_GET['pag']) ? ($i) == $_GET['pag'] ? 'active' : "" : ($i) == 1 ? 'active' : "" ?>
                            <li class=" d-none <?= $active ?>"><a href="candidatos?pag=<?= $i ?>"><?= $i ?></a></li>
                          <?php endfor; ?>
                        <?php else: ?>
                          <?php for ($i=$paginaAct;$i<=$paginas;$i++): ?>
                            <?php $active = isset($_GET['pag']) ? ($i) == $_GET['pag'] ? 'active' : "" : ($i) == 1 ? 'active' : "" ?>
                            <li class=" d-none <?= $active ?>"><a href="candidatos?pag=<?= $i ?>"><?= $i ?></a></li>
                          <?php endfor; ?>
                        <?php endif; ?>
                        <?php if (($paginaAct+4) < $paginas): ?>
                        <li class="d-none"><span class="delimeter">...</span></li>
                        <li class="d-none"><a href="candidatos?pag=<?= $paginas ?>"><?= $paginas ?></a></li>
                        <?php endif ?>
                      <?php endif; ?>
                      <?php  
                        if (isset($_GET['pag'])) {
                          if ($_GET['pag'] != $paginas) {
                            $next = intval($_GET['pag']) + 1;
                          } else {
                            $next = $paginas;
                          }
                        } else {
                          $next = 2;
                        }
                      ?>
                      <li class="next"><a href="candidatos?pag=<?= $next ?>">Siguiente <i class="la la-long-arrow-right"></i></a></li>
                    </ul>
                  </div> <!-- Pagination -->
              <?php endif; ?>
                </div> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include("local/resources/views/includes/general_footer.php");?>
    <?php include("local/resources/views/includes/login_register_modal.php");?>
    <script src="local/resources/views/js/jquery.min.js" type="text/javascript">
    </script>
    <script src="local/resources/views/js/script.js" type="text/javascript">
    </script>
    <script src="local/resources/views/js/select-chosen.js" type="text/javascript">
    </script>
    <script src="local/resources/views/plugins/notify.js" type="text/javascript"></script>
    <style type="text/css">
    .ss-content
    {
    overflow-x: hidden;
    }
    </style>
    <script type="text/javascript">
      var clicks = 1;
      $('#showFilters').click(function(e) {

        // Show or hide filters
        if (clicks % 2 == 1) {
          $('#side-offers').fadeIn();
          $('#showFilters').html('Ocultar filtros <i class="fa fa-ban"></i>');
          // Scroll Up
          e.preventDefault();
          $('html, body').animate({
              scrollTop : $('html, body').offset().top
          }, 500);
        } else {
          $('#side-offers').fadeOut();
          $('#showFilters').html('Mostrar filtros <i class="fa fa-filter"></i>');
        }
        clicks++;
      });

      function filtros_set_var(id,descripcion)
      { 
        $("#filtros").append('<span>'+descripcion+'</span>'); 
      }
      function filtros_set()
      {  
        $("#form_filtros").submit()
      }
      function set_check(parametro)
      {
        $("#"+parametro).attr('checked', 'true');
      }
      function limpiar()
      {
         
        $('input[type="checkbox"]').prop('checked' , false);
        $("#form_filtros").submit()
      }
    </script>
     <?php 
              if(isset($variables['habilidad']) && count($variables['habilidad']) > 0)
              {
                foreach ($variables['habilidad'] as $key) { 
                  echo '';
                }
              } 
              ?>
 
      <?php if (isset($variables['habilidad']) && count($variables['habilidad'])>0): ?>
           <?php foreach ($variables['habilidad'] as $key): ?>
           <script>filtros_set_var('as_habilidad_<?php echo str_replace(' ','_',$key);?>',$("#label_as_habilidad_<?php echo str_replace(' ','_',$key);?>").html());</script>
           <script>set_check("as_habilidad_<?php echo str_replace(' ','_',$key);?>");</script>
         <?php endforeach ?>
      <?php endif ?>

      <?php if (isset($variables['provincias']) && count($variables['provincias'])>0): ?>
           <?php foreach ($variables['provincias'] as $key): ?>
           <script>filtros_set_var(<?php echo $key;?>,$("#label_as_provincia_"+<?php echo $key;?>).html());</script>
           <script>set_check("as_provincia_"+<?php echo $key;?>);</script>
         <?php endforeach ?>
      <?php endif ?>

      <?php if (isset($variables['localidad']) && count($variables['localidad'])>0): ?>
           <?php foreach ($variables['localidad'] as $key): ?>
           <script>filtros_set_var(<?php echo $key;?>,$("#label_as_localidad_"+<?php echo $key;?>).html());</script>
           <script>set_check("as_localidad_"+<?php echo $key;?>);</script>
         <?php endforeach ?>
      <?php endif ?>

      <?php if (isset($variables['idiomas']) && count($variables['idiomas'])>0): ?>
           <?php foreach ($variables['idiomas'] as $key): ?>
           <script>filtros_set_var('<?php echo str_replace(' ','_',$key);?>',$("#label_as_idiomas_<?php echo str_replace(' ','_',$key);?>").html());</script>
           <script>set_check("as_idiomas_<?php echo str_replace(' ','_',$key);?>");</script>
         <?php endforeach ?>
      <?php endif ?>

       <?php if (isset($variables['sexo']) && count($variables['sexo'])>0): ?>
           <?php foreach ($variables['sexo'] as $key): ?>
           <script>filtros_set_var(<?php echo $key;?>,$("#label_as_genero_"+<?php echo $key;?>).html());</script>
           <script>set_check("as_genero_"+<?php echo $key;?>);</script>
         <?php endforeach ?>
      <?php endif ?>

      <?php if (isset($variables['cargos']) && count($variables['cargos'])>0): ?>
           <?php foreach ($variables['cargos'] as $key): ?>
           <script>filtros_set_var('<?php echo str_replace(' ','_',$key);?>',$("#label_as_cargos_<?php echo str_replace(' ','_',$key);?>").html());</script>
           <script>set_check("as_cargos_<?php echo str_replace(' ','_',$key);?>");</script>
         <?php endforeach ?>
      <?php endif ?>

      <?php if (isset($variables['salarios']) && count($variables['salarios'])>0): ?>
           <?php foreach ($variables['salarios'] as $key): ?>
           <script>filtros_set_var(<?php echo $key;?>,$("#label_as_salarios_"+<?php echo $key;?>).html());</script>
           <script>set_check("as_salarios_"+<?php echo $key;?>);</script>
         <?php endforeach ?>
      <?php endif ?>

       <?php if (isset($variables['disponibilidad']) && count($variables['disponibilidad'])>0): ?>
           <?php foreach ($variables['disponibilidad'] as $key): ?>
           <script>filtros_set_var(<?php echo $key;?>,$("#label_disponibilidad_"+<?php echo $key;?>).html());</script>
           <script>set_check("disponibilidad_"+<?php echo $key;?>);</script>
         <?php endforeach ?>
      <?php endif ?> 
    <script type="text/javascript">
       function notificacion(mensaje)
        {
            $.notify(mensaje, {
              className:"info",
              globalPosition: "bottom right"
              });
        }
    </script>
    
    <?php if (isset($_GET['result'])): ?>
      <script type="text/javascript">notificacion('<?php echo $_GET['result'];?>');</script>
    <?php endif ?>
    <?php 
?>
  </body>
</html>