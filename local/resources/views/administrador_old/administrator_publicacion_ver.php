<!DOCTYPE html>
<html>
  <head>
    <?php include('local/resources/views/includes/referencias_top.php');?>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="local/resources/views/css/icons.css">
    <link rel="stylesheet" href="local/resources/views/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
    <link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="theme-layout" id="scrollup">
      <!--Header responsive-->
      <?php include('local/resources/views/includes/header_responsive_administrator.php');?>
      <?php include('local/resources/views/includes/header_administrator.php');?>
      <!--fin Header responsive-->
      <section class="overlape" style="padding: 0px;">
        <div class="block no-padding">
          <div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax" style="padding: 0px;height: 100px;">
          </div>
          <!-- PARALLAX BACKGROUND IMAGE -->
          <div class="container fluid" >
            <div class="row">
              <div class="col-lg-12" >
                <div class="inner-header" style="height:100px;padding:0px;padding-top: 30px;">
                  <h3 style="font-size: 26px;font-weight: 300;">Daniel Maidana
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
              <?php include('local/resources/views/includes/aside_administrator.php');?>
              <div class="col-lg-9 column">
                <div class="modrn-joblist">
                  <div class="filterbar">
                    
                    <div class="sortby-sec">
                      <div class="sortby-sec">
                        <span>Fitrar
                        </span>
                        <select data-placeholder="Most Recent" class="chosen" style="display: none;">
                          <option>Sin filtro
                          </option>
                          <option>Más vistas
                          </option>
                          <option>Recientes
                          </option>
                          <option>Favoritas
                          </option>
                          <option>Activas
                          </option>
                          <option>Inactivas
                          </option>
                          <option>Con menbresia
                          </option>
                        </select>
                      </div>
                    </div>
                    <h5>Publicaciones
                    </h5>
                  </div>
                </div>
                <!-- MOdern Job LIst -->
                <div class="job-list-modern">
                  <div class="job-listings-sec">
                    <?php foreach ($datos as $key) {
                    $estatus="Activa";
                    $discapacitados="Discapacitados /";
                    if(!$key->tmp==1){$estatus="Inactivo";}
                    if(!$key->discapacidad==1){$discapacitados="";}
                    $imagen="0.jpg";
                    if(!$key->imagen=="")
                    {
                    $imagen=$key->imagen;
                    }
                    echo'<div class="job-listing wtabs">
                      <div class="job-title-sec">
                        <div class="c-logo">
                          <img src="uploads/'.$imagen.'" alt="" style="width:98px;">
                        </div>
                        <h3>
                        <a href="#" title="">'.$key->titulo.'
                        </a>
                        </h3>
                        <span>'.$key->nombre.'
                        </span>
                        <div class="job-lctn">
                          <i class="la la-map-marker">
                          </i>'.$key->provincia.','.$key->localidad.','.$key->direccion.'
                        </div>
                      </div>
                      <div class="job-style-bx">
                        <span class="job-is ft">'.$key->disponibilidad.'
                        </span>
                        <i>  Vistos '.$key->vistos.' / <span class="status">'.$estatus.'</span> / '.$key->tmp.'
                        </i>
                      </div>
                    </div>';
                    }?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include("local/resources/views/includes/aside_right_administrator.php");?>
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
    <script src="local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript">
    </script>
    <script src="local/resources/views/js/circle-progress.min.js" type="text/javascript">
    </script>
    <script type="text/javascript">
    $( document ).ready(function() {
    }
    );
    </script>
  </body>
</html>