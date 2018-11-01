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
                        <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                                <div class="card-header no-border pb-0">
                                    <div class="card-title text-xs-center">
                                        <img onclick="location.href='../ofertas'" alt="branding logo" src="<?= $ruta;?>app-assets/images/logo/jobbers_logo.png" style="height: 75px;cursor: pointer;">
                                        </img>
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2">
                                        <span>
                                            Enviaremos una clave a su correo
                                        </span>
                                    </h6>
                                </div>
                                <div class="card-body collapse in">
                                    <div class="card-block">
                                        <form action="login-simple.html" class="form-horizontal" novalidate="">
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input class="form-control form-control-lg input-lg" id="user-email" placeholder="Correo" required="" type="email">
                                                    <div class="form-control-position">
                                                        <i class="icon-mail6">
                                                        </i>
                                                    </div>
                                                </input>
                                            </fieldset>
                                            <button class="btn btn-primary btn-lg btn-block" type="submit">
                                                Recuperar clave
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer no-border">
                                    <p class="float-sm-left text-xs-center">
                                        <a class="card-link" href="entrar">
                                            <strong>
                                                Ingresar
                                            </strong>
                                        </a>
                                    </p>
                                    <p class="float-sm-right text-xs-center">
                                        Nuevo en  Jobbers?
                                        <a class="card-link" href="registro">
                                            <strong>
                                                Crear cuenta
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
        <!-- BEGIN VENDOR JS-->
        <!-- BEGIN PAGE VENDOR JS-->
        <!-- END PAGE VENDOR JS-->
        <!-- BEGIN ROBUST JS-->
        <script src="<?= $ruta;?>app-assets/js/core/app-menu.js" type="text/javascript">
        </script>
        <script src="<?= $ruta;?>app-assets/js/core/app.js" type="text/javascript">
        </script>
        <!-- END ROBUST JS-->
        <!-- BEGIN PAGE LEVEL JS-->
        <!-- END PAGE LEVEL JS-->
    </body>
</html>
