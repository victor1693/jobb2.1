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
    <!-- <link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" /> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="local/resources/views/css/icons.css">
    <link rel="stylesheet" href="local/resources/views/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-1968505410020323",
        enable_page_level_ads: true
      });
    </script>
    <?php include('local/resources/views/includes/google_analitycs.php');?>
    <?php //include("local/resources/views/includes/chat_soporte.php");?> 
  </head>
  <body>
   <?php include('local/resources/views/includes/general_header.php');?>
   <?php include('local/resources/views/includes/general_header_responsive.php');?>
    <section>
      <div class="block no-padding mt-50 back-offers">
        <div class="container">
          <div class="row no-gape">
          <div class="btn-showfilter">
            <button class="btn btn-primary" id="showFilters">Mostrar filtros <i class="fa fa-filter"></i></button>
          </div>
            <aside class="col-lg-3 column border-right d-none d-lg-block" id="side-offers" style="padding-left: 0px; border-color: transparent">
              
              <form action="empresas" method="POST" id="form_filter">
                <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                <div class="widget filter-offer" style="margin-top: 0px;">
                  <h3 class="sb-title open">Cargo</h3>
                  <div class="search_widget_job">
                    <div class="field_w_search">
                      <input type="text" name="cargo" id="cargo" value="<?= isset($_POST["cargo"]) ? $_POST["cargo"] : "" ?>" placeholder="Ej: Operador">
                      <i class="la la-search">
                      </i>
                    </div>
                  </div>
                </div>
                <div class="widget filter-offer">
                  <h3 class="sb-title open">Industrias</h3>
                  <div class="specialism_widget">
                    <div class="simple-checkbox">
                      <?php foreach ($sectores as $sect): ?>
                      <p><input type="checkbox" onclick="filter()" name="sectores[]" value="<?= $sect->id_sector ?>" id="sect_<?= $sect->id_sector ?>"><label for="sect_<?= $sect->id_sector ?>" id="label_sect_<?= $sect->id_sector ?>"><?= $sect->sector ?> (<?= $sect->cantidad ?>)</label></p>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
                <div class="widget filter-offer">
                  <h3 class="sb-title open">Provincia</h3>
                  <div class="specialism_widget">
                    <div class="simple-checkbox">
                      <?php foreach ($provincias as $prov): ?>
                      <p><input type="checkbox" onclick="filter()" name="provincias[]" value="<?= $prov->id_provincia ?>" id="prov_<?= $prov->id_provincia ?>"><label for="prov_<?= $prov->id_provincia ?>" id="label_prov_<?= $prov->id_provincia ?>"><?= $prov->provincia ?> (<?= $prov->cantidad ?>)</label></p>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
                <div class="widget filter-offer">
                  <h3 class="sb-title open">Localidad</h3>
                  <div class="specialism_widget">
                    <div class="simple-checkbox">
                      <?php foreach ($localidades as $loc): ?>
                      <p><input type="checkbox" onclick="filter()" name="localidades[]" value="<?= $loc->id_localidad ?>" id="loc_<?= $loc->id_localidad ?>"><label for="loc_<?= $loc->id_localidad ?>" id="label_loc_<?= $loc->id_localidad ?>"><?= $loc->localidad ?> (<?= $loc->cantidad ?>)</label></p>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </form>
              <div class="modrn-joblist" style="padding-top: 20px;padding-bottom: 0px;margin-bottom: -10px;"> 
                 <div class="col-xs-12" style="margin-top: 20px;text-align: center;padding-top: 0px;">
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
              </div>
            </aside>
            <div class="col-lg-9 column">

              

                <div class="tags-bar" id="filtros"> 
                  <div class="action-tags">
                    <a title="" onclick="limpiar()"><i class="la la-trash-o"></i> Quitar filtros</a>
                  </div>
                </div>
               
            <?php 
            function cantidad($valor,$arreglo)
            {
              foreach ($arreglo as $key) {
                if($key->id_empresa==$valor){return $key->cantidad;exit();}
              }
              return 0;
            } 
            ?>
            <div class="modrn-joblist" style="padding-top: 20px;padding-bottom: 0px;margin-bottom: -10px;">
               <h5 style="font-weight: 700;"><?php echo $totalEmpresas;?> Empresas</h5>
                 <div class="col-xs-12" style="margin-top: 20px;text-align: center;padding-top: 0px;">
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
              </div>
              <?php foreach ($empresas as $empresa): ?> 
                <?php $imagen = $empresa->imagen == null ? 'uploads/0.jpg' : 'uploads/'.$empresa->imagen ?>
              <div class="job-listings-sec" style="margin-top: 0px;">
                <div class="job-listing wtabs">
										<div class="mobile">
											<img src="<?= $imagen;?>" class="img-fluid img-oferta" alt="">
											<p style="cursor: pointer;" class="nombre-img" onclick="location.href='empresa/detalle?e=<?= $empresa->id_empresa?>;'"><?= $empresa->nombre_empresa ?></p>
										</div> 
										<div class="job-title-sec container-desc-oferta" style="display: grid">
											<h5 style="cursor: pointer;" onclick="location.href='empresa/detalle?e=<?= $empresa->id_empresa?>;'" class="title-recom"><?php echo $empresa->nombre_empresa ?><a href="#"></a></h5>

											<p class="desc-oferta"><?= $empresa->descripcion;?></p>
											<br>  
                      <div class="container">
                        <div class="row">
                            <div class="col-sm-3 mx-auto" style="text-align: center;">
                              <img src="local/resources/views/images/calendar.png"><br>
                               <span class="disponibilidad" style="background-color: #2e3192;">2 meses</span><br>
                               <div style="background-color: #fff;font-size: 10px;color: #595959;">(Antiguedad)</div> 
                            </div>
                             <div  class="col-sm-3 mx-auto" style="text-align: center;">
                             <img src="local/resources/views/images/firefighter.png"><br>
                               <span onclick="location.href='empresa/detalle?e=<?= $empresa->id_empresa?>;'" class="disponibilidad" style="background-color: #2e3192;"><?php echo cantidad($empresa->id_empresa,$cantidades);?> Ofertas</span><br>
                                <div onclick="location.href='empresa/detalle?e=<?= $empresa->id_empresa?>;'" style="background-color: #fff;font-size: 10px;color: #595959;">(Nº ofertas)</div> 
                            </div>
                            <div class="col-sm-3 mx-auto" style="text-align: center;padding: 0px;">
                            <img src="local/resources/views/images/creative-team.png"><br>
                               <div style="margin: 0 auto;"><?= $empresa->sector?></div>
                                <div style="background-color: #fff;font-size: 10px;color: #595959;">Actividad empresa</div> 
                            </div>
                        </div>
                      </div>
                        
											<div class="job-lctn"> 
												<div class="text-info-empresa">
                          <i><span style="font-size: 12px;">
                            <?php if ($empresa->nombre_empresa!=""): ?>
                              <?php $empresa->nombre_empresa=$empresa->nombre_empresa.', ';?>
                            <?php endif ?> 
                            <?php if ($empresa->telefono!=""): ?>
                              <?php $empresa->telefono=$empresa->telefono.', ';?>
                            <?php endif ?>

                            <?php if ($empresa->provincia_2!=""): ?>
                              <?php $empresa->provincia_2=$empresa->provincia_2.', ';?>
                            <?php endif ?>

                            <?php if ($empresa->direccion!=""): ?>
                              <?php $empresa->direccion=$empresa->direccion.'.';?>
                            <?php endif ?>

                             Argentina 
                            <?php echo $empresa->provincia_2;?>  </span></i>
                        </div>
												<div class="desk" style="float: right">
                          <?php if ($empresa->facebook!=""): ?>
                            <a target="_blank" href="<?=$empresa->facebook;?>"><span class="container-fb"><i class="fa fa-facebook mr-0"></i></span></a>
                          <?php endif ?>

                           <?php if ($empresa->twitter!=""): ?>
                            <a target="_blank" href="<?=$empresa->twitter;?>"><span class="container-tw"><i class="fa fa-twitter mr-0"></i></span></a>
                          <?php endif ?>

                           <?php if ($empresa->instagram!=""): ?>
                            <a target="_blank" href="<?=$empresa->instagram;?>"><span class="container-ig"><i class="fa fa-instagram mr-0"></i></span></a>
                          <?php endif ?>

                           <?php if ($empresa->web!=""): ?>
                            <a target="_blank" href="<?=$empresa->web;?>"><span class="container-web"><i class="fa fa-globe mr-0"></i></span></a>
                          <?php endif ?> 
												</div>
                        <!-- NOTE COMENTADO POR PEDIDO DE DANIEL -->
												<!-- <p class="container-media mobile" style="margin-bottom: 0;">
													<a href="#"><span class="container-fb" style="float: inherit"><i class="fa fa-facebook" style="margin-left: 4px; vertical-align: text-top"></i></span></a>
													<a href="#"><span class="container-in" style="float: inherit"><i class="fa fa-linkedin mr-0" style="padding:4px; margin-left: 0px; font-size: 13px; vertical-align: super;"></i></span></a>
													<a href="#"><span class="container-tw" style="float: inherit"><i class="fa fa-twitter mr-0" style="padding:3px; margin-left: 0px; vertical-align: super; font-size: 14px;"></i></span></a>
													<a href="#"><span class="container-ig" style="float: inherit"><i class="fa fa-instagram mr-0" style="padding:3px; margin-left: 0px; vertical-align: super; font-size: 14px;"></i></span></a>
													<a href="#"><span class="container-web" style="float: inherit"><i class="fa fa-globe mr-0" style="padding:3px; margin-left: 0px; vertical-align: super; font-size: 14px;"></i></span></a>
												</p> -->
											</div>
										</div>
										<div class="job-style-bx container-img-oferta-i desk">
											<img onclick="location.href='empresa/detalle?e=<?= $empresa->id_empresa?>;'" style="border:2px dashed #ff7900; width: 100px;height: 100px;border-radius: 50%;" src="<?= $imagen;?>" alt="">
											<p style="color: #4c4c4c;" onclick="location.href='empresa/detalle?e=<?= $empresa->id_empresa?>;'" class="nombre-img"><?php $r= explode(" ", $empresa->nombre_empresa); echo $r[0];?></p>
										</div>
									</div>
              </div>
              <?php endforeach; ?>
              <div class="emply-list-sec"> 
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
                                    <li class="prev"><a href="empresas?pag=<?= $previous ?>"><i class="la la-long-arrow-left"></i> Atrás</a></li> 
                                    <?php if ($paginas >= 1 && $paginas <= 5): ?>
                                      <?php for ($i=0;$i<$paginas;$i++): ?>
                                        <?php $active = isset($_GET['pag']) ? ($i+1) == $_GET['pag'] ? 'active' : "" : ($i+1) == 1 ? 'active' : "" ?>
                                        <li class="d-none <?= $active ?>"><a href="empresas?pag=<?= $i+1 ?>"><?= $i+1 ?></a></li>
                                      <?php endfor; ?>
                                    <?php else: ?>
                                      <?php if (($paginaAct+4) <= $paginas): ?>
                                        <?php for ($i=$paginaAct;$i<=($paginaAct+4);$i++): ?>
                                          <?php $active = isset($_GET['pag']) ? ($i) == $_GET['pag'] ? 'active' : "" : ($i) == 1 ? 'active' : "" ?>
                                          <li class="d-none <?= $active ?>"><a href="empresas?pag=<?= $i ?>"><?= $i ?></a></li>
                                        <?php endfor; ?>
                                      <?php elseif ($paginaAct == $paginas): ?>
                                        <?php for ($i=($paginaAct-4);$i<=$paginas;$i++): ?>
                                          <?php $active = isset($_GET['pag']) ? ($i) == $_GET['pag'] ? 'active' : "" : ($i) == 1 ? 'active' : "" ?>
                                          <li class="d-none <?= $active ?>"><a href="empresas?pag=<?= $i ?>"><?= $i ?></a></li>
                                        <?php endfor; ?>
                                      <?php else: ?>
                                        <?php for ($i=$paginaAct;$i<=$paginas;$i++): ?>
                                          <?php $active = isset($_GET['pag']) ? ($i) == $_GET['pag'] ? 'active' : "" : ($i) == 1 ? 'active' : "" ?>
                                          <li class="d-none <?= $active ?>"><a href="empresas?pag=<?= $i ?>"><?= $i ?></a></li>
                                        <?php endfor; ?>
                                      <?php endif; ?>
                                      <?php if (($paginaAct+4) < $paginas): ?>
                                      <li class="d-none"><span class="delimeter">...</span></li>
                                      <li class="d-none"><a href="empresas?pag=<?= $paginas ?>"><?= $paginas ?></a></li>
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
                                    <li class="next"><a href="empresas?pag=<?= $next ?>">Siguiente <i class="la la-long-arrow-right"></i></a></li>
                                  </ul>
                                </div> <!-- Pagination -->
                              <?php endif; ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                    <?php include("local/resources/views/includes/general_footer.php");?>
                  </div>
                  <?php include("local/resources/views/includes/login_register_modal.php");?>
                  <script src="local/resources/views/js/jquery.min.js" type="text/javascript">
                  </script>
                  <script src="local/resources/views/js/modernizr.js" type="text/javascript">
                  </script>
                  <script src="local/resources/views/js/script.js" type="text/javascript">
                  </script>
                  <script src="local/resources/views/js/wow.min.js" type="text/javascript">
                  </script>
                  <script src="local/resources/views/js/slick.min.js" type="text/javascript">
                  </script>
                  <script src="local/resources/views/js/parallax.js" type="text/javascript">
                  </script>
                  <script src="local/resources/views/js/select-chosen.js" type="text/javascript">
                  </script> 
                  <script>
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
                    
                    function filter()
                    {
                      $('#form_filter').submit();
                    }

                    function limpiar()
                    {
                       
                      $('input[type="checkbox"]').prop('checked' , false);
                      $('#cargo').val("");
                      $("#form_filter").submit();
                    }

                    function filtros_set_var(descripcion)
                    { 
                      $("#filtros").append('<span>'+descripcion+'</span>'); 
                    }

                    function set_check(parametro)
                    {
                      $("#"+parametro).attr('checked', 'true');
                    }

                    <?php if (isset($variables['cargo']) && $variables['cargo'] != ""): ?>
                         filtros_set_var("<?= $variables['cargo'] ?>");
                    <?php endif ?>

                    <?php if (isset($variables['provincias']) && count($variables['provincias'])>0): ?>
                         <?php foreach ($variables['provincias'] as $key): ?>
                         filtros_set_var($("#label_prov_<?= $key ?>").text());
                         set_check("prov_<?= $key ?>");
                       <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if (isset($variables['sectores']) && count($variables['sectores'])>0): ?>
                         <?php foreach ($variables['sectores'] as $key): ?>
                         filtros_set_var($("#label_sect_<?= $key ?>").text());
                         set_check("sect_<?= $key ?>");
                       <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if (isset($variables['localidades']) && count($variables['localidades'])>0): ?>
                         <?php foreach ($variables['localidades'] as $key): ?>
                         filtros_set_var($("#label_loc_<?= $key ?>").text());
                         set_check("loc_<?= $key ?>");
                       <?php endforeach; ?>
                    <?php endif; ?>
                  </script>
                </body>
              </html>