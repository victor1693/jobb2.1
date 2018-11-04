<!DOCTYPE html>
<?php $ruta='../local/resources/views/empresas/';?>
<html class="loading" data-textdirection="ltr" lang="es">
    <head>
      <?php include('includes/referencias-top.php');?>
    </head>
    <body class="vertical-layout vertical-menu 1-column blank-page blank-page" data-col="1-column" data-menu="vertical-menu" data-open="click" style="background-image: url(../local/resources/views/images/log_empresa.jpg);background-position: center; background-size: cover;">
        <!-- ////////////////////////////////////////////////////////////////////////////-->
        <div class="app-content content container-fluid">
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="flexbox-container">
                        <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0" >
                            <div class="card border-grey border-lighten-3 m-0" style="border-radius: 8px;">
                                <div class="card-header no-border" style="border-radius: 8px;">
                                    <div class="card-title text-xs-center">
                                        <div class="p-1">
                                            <img  onclick="location.href='../ofertas'" alt="branding logo" src="<?= $ruta;?>app-assets/images/logo/jobbers_logo.png" style="height: 75px;cursor: pointer;"/>
                                        </div>
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2">
                                        <span>
                                            Bienvenido a Jobbers
                                        </span>
                                    </h6>
                                </div>
                                <div class="card-body collapse in">
                                    <div class="card-block">
                                        <form action="index.html" class="form-horizontal form-simple" novalidate="">
                                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                                <input class="form-control form-control-lg input-lg" id="correo" placeholder="Correo" required="" type="text">
                                                    <div class="form-control-position">
                                                        <i class="icon-email">
                                                        </i>
                                                    </div>
                                                </input>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left" style="margin-top: 15px;">
                                                <input class="form-control form-control-lg input-lg" id="clave" placeholder="Clave" required="" type="password">
                                                    <div class="form-control-position">
                                                        <i class="icon-key3">
                                                        </i>
                                                    </div>
                                                </input>
                                            </fieldset>
                                            <button onClick="login()" class="btn btn-primary btn-lg btn-block" type="button">
                                                Ingresar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="">
                                        <p class="float-sm-left text-xs-center m-0">
                                            <a class="card-link" href="recuperacion">
                                                Recuperar clave
                                            </a>
                                        </p>
                                        <p class="float-sm-right text-xs-center m-0">
                                            Eres nuevo en jobbers?
                                            <a class="card-link" href="registro">
                                                Registrate
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div> 
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
        <script src="<?= $ruta;?>app-assets/js/core/app-menu.js" type="text/javascript">
        </script>
        <script src="<?= $ruta;?>app-assets/js/core/app.js" type="text/javascript">
        </script> 
        <script src="<?= $ruta;?>assets/js/notify.min.js" type="text/javascript"></script>
        <?php include('local/resources/views/empresas/require/js.php');?>
        <script>
           $('body').keyup(function(e) {
                if(e.keyCode == 13) {
                   login();
                }
            });
            function login() {
        
            if(!validar_r("correo")){} 
            else if(!validar_correo("correo")){}
            else if(!validar_clave("clave")){}
            else if(!validar_r("clave")){}    
            else
            {
                datos={ 
                correo:$('#correo').val(),
                clave:$('#clave').val(),  
                    }
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: 'login',
                            type: 'POST',
                            data:datos,  
                            success: function(response) {
                                if(response=='1')
                                {
                                     location.href = 'panel';
                                }else
                                {
                                     $.notify("Los datos introducidos son incorrectos.","info");                                   
                                }                               
                            },
                            error: function(error) {
                                $.notify("Ocurrió un error al procesar la solicitud.");
                            }
                        }); 
                  } 
            }
        </script>
    </body>
</html>
