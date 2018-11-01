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
        <?php include('local/resources/views/includes/chat_soporte.php');?>
        <?php include('local/resources/views/includes/google_analitycs.php');?>
    </head>
    <body>
        <!--Modal imagenes-->
        <!-- Modal -->
        <div style="overflow: hidden;" class="modal fade" id="modal_imagenes" tabindex="-1" role="dialog" aria-labelledby="modal_imagenesLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="min-height: 65px;">
                        <h5 class="modal-title" id="modal_imagenesLabel">Mis imagenes
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body " style="padding: 0px;overflow-y: scroll;overflow-x: hidden;">
                        
                        <div class="row">
                            <?php
                            foreach ($imagen as $key) {
                            $imagen="0.jpg";
                            if(!$key->nombre_aleatorio=="")
                            {
                            $imagen=$key->nombre_aleatorio;
                            }
                            echo ' <div class="col-sm-3 text-center" style="padding-top: 25px;">
                                <a href="#"> <img onClick="set_imagen('.$key->id.','."'$key->nombre_aleatorio'".')" src="uploads/'.$imagen.'" data-dismiss="modal" style="max-width: 200px;max-height: 200px;"> </a>
                                
                            </div> ';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Fin modal imagenes-->
        <script type="text/javascript">
        function set_imagen(id,parametro)
        {
        $("#input_imagen").val(id);
        $('#imagen_de_perfil').attr('src', 'uploads/'+parametro);
        }
        </script>
        <div class="theme-layout" id="scrollup">
            <!--Header responsive-->
            <?php include('local/resources/views/includes/header_responsive_administrator.php');?>
            <?php include('local/resources/views/includes/header_administrator.php');?>
            <!--fin Header responsive-->
            <section class="overlape" style="padding: 0px;">
                <div class="block no-padding">
                    <div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax" style="padding: 0px;height: 100px;"></div>
                    <!-- PARALLAX BACKGROUND IMAGE -->
                    <div class="container fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-header" style="height:100px;padding:0px;padding-top: 30px;">
                                    <h3 style="font-size: 26px;font-weight: 300;">Daniel Maidana</h3>
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
                            <?php include("includes/aside_administrator.php");?>
                            <div class="col-lg-9 column">
                                <div class="">
                                    <div class="profile-title">
                                        <h3>Nueva publicación</h3>
                                    </div>
                                    <div class="text-center">
                                        <span class="round"><a href="#" data-toggle="modal" data-target="#modal_imagenes"><img id="imagen_de_perfil" class="img-circle" src="local/resources/views/images/seleccionar.jpg" style="border-radius: 50%;margin-top: 30px;height: 140px; width: 140px;"></a></span>
                                        <br>
                                        <a class="status" href="adminmalerinver" style="margin-top: 20px; font-size: 14px;text-decoration: none;">Subir imagen</a>
                                    </div>
                                    <hr>
                                    <div class="profile-form-edit">
                                        <form action="publiacionescreg" method="POST">
                                            <input value="" name="input_imagen" id="input_imagen" type="hidden" name="">
                                            <input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <span class="pf-title">Empresa</span>
                                                    
                                                    <div class="pf-field">
                                                        <select id="empresa" name="empresa" data-placeholder="" class="chosen" style="display: none;">
                                                            <option value="1">Jobbers</option>
                                                            
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <span class="pf-title">Título de publicación</span>
                                                    <div class="pf-field">
                                                        <input name="titulo_publicación" type="text" placeholder="Título de la publicación">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <span class="pf-title">Salario</span>
                                                    
                                                    <div class="pf-field">
                                                        <select id="salario" name="salario" data-placeholder="" class="chosen" style="display: none;">
                                                            <option value="">Seleccionar</option>
                                                            <?php foreach ($salarios as $key) {
                                                            echo'<option value=" '.$key->id.' ">'.$key->salario.'</option>';
                                                            }?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <span class="pf-title">Sector</span>
                                                    
                                                    <div class="pf-field">
                                                        <select id="sector" name="sector" data-placeholder="" class="chosen" style="display: none;">
                                                            <option value="">Seleccionar</option>
                                                            <?php foreach ($sectores as $key) {
                                                            echo'<option value=" '.$key->id.' ">'.$key->nombre.'</option>';
                                                            }?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <span class="pf-title">Área</span>
                                                    
                                                    <div class="pf-field">
                                                        <select id="area" name="area" data-placeholder="" class="chosen" style="display: none;">
                                                            <option value="">Seleccionar</option>
                                                            <?php foreach ($areas as $key) {
                                                            echo'<option value=" '.$key->id.' ">'.$key->nombre.'</option>';
                                                            }?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <span class="pf-title">Disponibilidad</span>
                                                    
                                                    <div class="pf-field">
                                                        <select id="disponibilidad" name="disponibilidad" data-placeholder="" class="chosen" style="display: none;">
                                                            <option value="">Seleccionar</option>
                                                            <?php foreach ($disponibilidad as $key) {
                                                            echo'<option value=" '.$key->id.' ">'.$key->nombre.'</option>';
                                                            }?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <span class="pf-title">Provincia</span>
                                                    
                                                    <div class="pf-field">
                                                        <select id="provincia" name="provincia" data-placeholder="" class="chosen" style="display: none;">
                                                            <option value="">Seleccionar</option>
                                                            <?php foreach ($provincia as $key) {
                                                            echo'<option value=" '.$key->id.' ">'.$key->provincia.'</option>';
                                                            }?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <span class="pf-title">Localidad</span>
                                                    
                                                    <div class="pf-field">
                                                        <select id="localidad" name="localidad" data-placeholder="" class="chosen" style="display: none;">
                                                            <option value="">Seleccionar</option>
                                                            <?php foreach ($localidad as $key) {
                                                            echo'<option value=" '.$key->id.' ">'.$key->localidad.'</option>';
                                                            }?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <span class="pf-title">Con discapacidad</span>
                                                    
                                                    <div class="pf-field">
                                                        <select id="discapacidad" name="discapacidad" data-placeholder="" class="chosen" style="display: none;">
                                                            <option value="">Seleccionar</option>
                                                            <option value="NO">No</option>
                                                            <option value="SI">Si</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span class="pf-title">Dirección</span>
                                                    <div class="pf-field">
                                                        <input name="direccion" type="text" placeholder="Dirección">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span class="pf-title">Descripción</span>
                                                    <div class="pf-field">
                                                        <textarea name="descripcion" style="resize: none;min-height: 75px;padding: 10px;"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" style="margin-bottom: 50px;">
                                                    <button type="submit">Agregar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include("local/resources/views/includes/aside_right_administrator.php");?>
        <script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script>
        <script src="local/resources/views/js/modernizr.js" type="text/javascript"></script>
        <script src="local/resources/views/js/script.js" type="text/javascript"></script>
        <script src="local/resources/views/js/wow.min.js" type="text/javascript"></script>
        <script src="local/resources/views/js/slick.min.js" type="text/javascript"></script>
        <script src="local/resources/views/js/parallax.js" type="text/javascript"></script>
        <script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script>
        <script src="local/resources/views/js/circle-progress.min.js" type="text/javascript"></script>
        <?php include("local/resources/views/includes/referencias_down.php");?>
        
        <script type="text/javascript">
        function localidades(id)
        {
        alert(id);
        $("#localidades").hide();
        $("#localidades_"+id).show();
        }
        $(document).ready(function() {
        });
        </script>
    </body>
</html>