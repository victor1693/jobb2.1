<?php
$mi_tokken=csrf_token();
?>
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
    <meta name="csrf-token" content="<?php echo $mi_tokken;?>">
    
    <link rel="stylesheet" type="text/css" href="local/resources/views/plugins/imagen/css/jquery.Jcrop.min.css" />
    <link rel="stylesheet" type="text/css" href="http://www.dropzonejs.com/css/dropzone.css?v=1524508426" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <?php include('local/resources/views/includes/chat_soporte.php');?>
    <?php include('local/resources/views/includes/google_analitycs.php');?>
  </head>
  <body style="background: url(https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg)">
    <div class="theme-layout" id="scrollup">
      <!--Header responsive-->
      <?php include('local/resources/views/includes/header_responsive_candidatos.php');?>
      <?php include('local/resources/views/includes/header_candidatos.php');?>
      <!--fin Header responsive-->
      
      <section>
        <div class="block no-padding mt-75">
          <div class="container">
            <div class="row no-gape">
              <?php include("includes/aside_candidatos.php");?>
              <div class="col-lg-9 column">
                <div class="padding-left">
                  <div class="manage-jobs-sec addscroll">
                    <h3>Mi Maletín</h3>
                  </div>
                </div>
                <div id="dropzone" class="padding-left" style="margin-top: 20px;margin-bottom: 20px;">
                  <form action="subir" class="dropzone needsclick dz-clickable" id="demo-upload">
                    <input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
                    <div class="dz-message needsclick">
                      Copiar archivos.
                      <br>
                      <span class="note needsclick">Puede arrastar los archivos al area selecionada.
                      </div>
                    </form>
                  </div>
                  <div class="padding-left">
                    <div class="manage-jobs-sec addscroll" style="padding-top: 0px;">
                     
                      <h3>
                      Mis Archivos
                      <ul class="action_job" style="float: right;">
                        <li onClick="listar_archivos()" style="font-size: 15px;cursor: pointer;" class="status"> Actualizar </li>
                      </ul><br>
                       <span style="font-size: 10px;font-weight: 500;">* Max 5 archivos</span> 
                      </h3>
                      <table class="table" style="margin: 0px;margin-left: 10px;">
                        <tbody id="tabla_archivos">
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- Button trigger modal -->
                  
                  <!--paginacion-->
                  <!-- <div class="pagination" style="margin-bottom: 50px;">
                    <ul style="margin: 0 auto;">
                      <li class="prev"><a href=""><i class="la la-long-arrow-left"></i> Anterior</a></li>
                      <li><a href="">1</a></li>
                      <li class="active"><a href="">2</a></li>
                      <li><a href="">3</a></li>
                      <li><span class="delimeter">...</span></li>
                      <li><a href="">14</a></li>
                      <li class="next"><a href="">Siguiente <i class="la la-long-arrow-right"></i></a></li>
                    </ul>
                  </div> -->
                  <!-- Pagination -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php include("local/resources/views/includes/modales/administrator_maletin.php");?>
    </div>
    
    <script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script>
    <script src="local/resources/views/js/modernizr.js" type="text/javascript"></script>
    <script src="local/resources/views/js/script.js" type="text/javascript"></script>
    <script src="local/resources/views/js/wow.min.js" type="text/javascript"></script>
    <script src="local/resources/views/js/slick.min.js" type="text/javascript"></script>
    <script src="local/resources/views/js/parallax.js" type="text/javascript"></script>
    <script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script>
    <script src="local/resources/views/js/circle-progress.min.js" type="text/javascript"></script>
    <script src="local/resources/views/plugins/imagen/js/jquery.Jcrop.min.js" type="text/javascript"></script>
    <script src="local/resources/views/plugins/dropzone.js" type="text/javascript"></script>
    <?php include("local/resources/views/includes/referencias_down.php");?>
    
    <script type="text/javascript">
    $(document).ready(function() {
    listar_archivos();
    });

    function maletin_validar()
    {
      if ($('#alias').val() == "") {
        $.notify("Debes colocar un alias.", {
        className:"error",
        globalPosition: "bottom center"
        });
      } else {
        $('#formulario_alias').submit();
      }
    }
    </script>
    <?php
    if(isset($_GET['info']))
    {
    if($_GET['info']=="del")
    {
    echo '
    <script>
    $.notify("Archivo eliminado con éxito.", {
    className:"success",
    globalPosition: "bottom center"
    });
    </script>';
    }
    else if($_GET['info']=="up")
    {
    echo '
    <script>
    $.notify("Archivo actualizado con éxito.", {
    className:"success",
    globalPosition: "bottom center"
    });
    </script>';
    }
    }
    ?>
    <?php include("local/resources/views/includes/ajax/administrator_maletin.php");?>
  </body>
</html>