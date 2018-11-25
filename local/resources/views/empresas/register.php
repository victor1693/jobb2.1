<!DOCTYPE html>
<?php $ruta='../local/resources/views/empresas/';?>
<html class="loading" data-textdirection="ltr" lang="es">
    <head>
       <?php include('includes/referencias-top.php');?>
        <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
    </head>
    <body class="vertical-layout vertical-menu 1-column blank-page blank-page" data-col="1-column" data-menu="vertical-menu" data-open="click" style="background-image: url(../local/resources/views/images/log_empresa.jpg);background-position: center; background-size: cover;">
        <!-- ////////////////////////////////////////////////////////////////////////////-->
        <div class="app-content content container-fluid">
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="flexbox-container">
                        <div class="col-sm-6" style="margin: 0 auto;">
                            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                                <div class="card-header no-border">
                                    <div class="card-title text-xs-center">
                                        <img onclick="location.href='../ofertas'" alt="branding logo" src="<?= $ruta;?>app-assets/images/logo/jobbers_logo.png" style="height: 75px;cursor: pointer;">
                                        </img>
                                    </div>
                                </div>
                                <div class="card-body collapse in">
                                    <div class="card-block">
                                        <form action="registrar" class="form-horizontal form-simple" method="post" novalidate="">
                                            <div class="col-sm-6">
                                                    <fieldset class="form-group position-relative has-icon-left mb-1">
                                                        <input class="form-control form-control-lg input-lg" id="representante" name="representante" placeholder="Representante" required="true" type="text">
                                                            <div class="form-control-position">
                                                                <i class="icon-head">
                                                                </i>
                                                            </div>
                                                        </input>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-6">
                                                    <fieldset class="form-group position-relative has-icon-left mb-1">
                                                        <input class="form-control form-control-lg input-lg" id="empresa" name="empresa" placeholder="Nombre empresa" required="true" type="text">
                                                            <div class="form-control-position">
                                                                <i class="icon-industry">
                                                                </i>
                                                            </div>
                                                        </input>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-6">
                                                    <fieldset class="form-group position-relative has-icon-left mb-1">
                                                        <select id="provincia" class="form-control" name="interested" style="padding-left: 5px;height: 40px;">
                                                            <option value="">
                                                                Provincia
                                                            </option>
                                                            <?php foreach ($provincias as $key): ?>
                                                                 <option value="<?= $key->provincia?>">
                                                                 <?= $key->provincia;?>
                                                                 </option>
                                                            <?php endforeach ?> 
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-6">
                                                    <fieldset class="form-group position-relative has-icon-left mb-1">
                                                        <select class="form-control" id="localidad" name="interested" style="padding-left: 5px;height: 40px;">
                                                            <option value="">
                                                                Localidad
                                                            </option>
                                                            <option value="Localidad">
                                                                Localidad
                                                            </option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-12">
                                                    <fieldset class="form-group position-relative has-icon-left">
                                                        <input class="form-control form-control-lg input-lg" id="direccion" name="direccion" placeholder="Dirección" required="true" type="text">
                                                            <div class="form-control-position">
                                                                <i class="icon-map">
                                                                </i>
                                                            </div>
                                                        </input>
                                                    </fieldset>
                                                    <fieldset class="form-group position-relative has-icon-left">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-lg input-lg" id="correo" name="correo" placeholder="Correo" required="true" type="email">
                                                            <div class="form-control-position">
                                                                <i class="icon-mail6">
                                                                </i>
                                                            </div>
                                                        </input>
                                                            </div>

                                                             <div class="col-sm-6">
                                                                <input class="form-control form-control-lg input-lg" id="correo_2" name="correo" placeholder="Repita correo" required="true" type="email">
                                                            <div class="form-control-position">
                                                                <i class="icon-mail6">
                                                                </i>
                                                            </div>
                                                        </input>
                                                            </div>

                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="form-group position-relative has-icon-left">
                                                      <div class="row">
                                                           <div class="col-sm-6">
                                                            <input class="form-control form-control-lg input-lg" id="clave" name="clave" placeholder="Clave" required="true" type="password">
                                                            <div class="form-control-position">
                                                                <i class="icon-key3">
                                                                </i>
                                                            </div>
                                                        </input>
                                                       </div>
                                                       <div class="col-sm-6">
                                                            <input class="form-control form-control-lg input-lg" id="clave_2" name="clave" placeholder="Repita su clave" required="true" type="password">
                                                            <div class="form-control-position">
                                                                <i class="icon-key3">
                                                                </i>
                                                            </div>
                                                        </input>
                                                       </div>
                                                      </div>
                                                    </fieldset>
                                                    <button onClick="add_company()" class="btn btn-primary btn-lg btn-block" type="button">
                                                        Registrar
                                                    </button>
                                                </div>
                                            </input>
                                        </form>
                                    </div>
                                    <p class="text-xs-center">
                                        Ya tienes una cuenta?
                                        <a class="card-link" href="entrar">
                                            <strong>
                                                Ingresar
                                            </strong>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////-->
        <!-- BEGIN VENDOR JS-->
        <script src="<?= $ruta;?>app-assets/js/core/libraries/jquery.min.js" type="text/javascript">
        </script>
        <script src="<?= $ruta;?>app-assets/vendors/js/ui/tether.min.js" type="text/javascript">
        </script>
        <script src="<?= $ruta;?>app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript">
        </script>
        <script src="<?= $ruta;?>app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript">
        </script>
        <script src="<?= $ruta;?>app-assets/vendors/js/ui/unison.min.js" type="text/javascript">
        </script>
        <script src="<?= $ruta;?>app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript">
        </script>
        <script src="<?= $ruta;?>app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript">
        </script>
        <script src="<?= $ruta;?>app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript">
        </script>
        <script src="<?= $ruta;?>app-assets/vendors/js/extensions/pace.min.js" type="text/javascript">
        </script>  
        </script>
        <script src="<?= $ruta;?>app-assets/js/core/app.js" type="text/javascript">
        </script> 
        <script src="<?= $ruta;?>assets/js/notify.min.js" type="text/javascript">
        </script>  
        <?php include('local/resources/views/empresas/require/js.php');?>
        <script>

              $('body').keyup(function(e) {
                if(e.keyCode == 13) {
                  add_company();
                }
            });

          function add_company() 
          {
                if($("#clave").val() != $("#clave_2").val())
                {
                    if($("#clave_2").val()=="")
                    {
                        $("#clave_2").focus();
                        $.notify("Favor coloque su clave nuevamente.","info");
                    }
                    else
                    {
                         $.notify("Las claves no son iguales.","info");
                    } 
                }
                else if($("#correo").val() != $("#correo_2").val())
                {
                     if($("#correo_2").val()=="")
                    {
                        $("#correo_2").focus();
                        $.notify("Favor coloque su correo nuevamente.","info");
                    }
                    else
                    {
                          $.notify("Sus correos no son iguales.","info");
                    } 
                   
                }
                else
                {
                        if(!validar_r("representante")){}
            else if(!validar_r("empresa")){}
            else if(!validar_r("provincia")){}
            else if(!validar_r("localidad")){}
            else if(!validar_r("direccion")){}
            else if(!validar_r("correo")){}
            else if(!validar_r("clave")){}
            else if(!validar_clave("clave")){}
            else if(!validar_correo("correo")){}    
            else
            {
                datos={
                representante:$('#representante').val(),
                correo:$('#correo').val(),
                clave:$('#clave').val(), 
                empresa:$('#empresa').val(),
                provincia:$('#provincia').val(),
                localidad:$('#localidad').val(),
                direccion:$('#direccion').val(),
                    }
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: 'registrar',
                            type: 'POST',
                            data:datos,  
                            success: function(response) {
                                if(response=='correo_existe')
                                {
                                     $.notify("Este correo ya esta registrado.","info");
                                }else
                                {
                                     $.notify("Empresa registrada con éxito.","success");
                                    $("input").val("");
                                    $("select").val("");
                                    setTimeout(function() {
                                      window.location.href = "panel";
                                      }, 500);
                                }
                               
                            },
                            error: function(error) {
                                $.notify("Ocurrió un error al procesar la solicitud.");
                            }
                        }); 
                  }     
                }
                 
            } 
        </script>
    </body>
</html>
