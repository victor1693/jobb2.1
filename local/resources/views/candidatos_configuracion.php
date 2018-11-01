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
            
            <!--Modal imagenes-->
            </style>
            <!-- Modal -->
            <div style="overflow: hidden;" class="modal fade" id="modal_imagenes" tabindex="-1" role="dialog" aria-labelledby="modal_imagenesLabel" aria-hidden="true">
                <div class="modal-dialog modal-candidato" role="document">
                    <div class="modal-content modal-candidato-content">
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
            set_imagen_val(id);
            $('#imagen_de_perfil').attr('src', 'uploads/'+parametro);
            }
            </script>
            <section>
                <div class="block no-padding mt-75">
                    <div class="container">
                        <div class="row no-gape">
                            <?php include('local/resources/views/includes/aside_candidatos.php');?>
                            <div class="col-lg-9 column" style="padding-top: 20px;">
                              
                                <div class="padding-left" style="margin-top: -70px;">
                                    
                                    <div class="manage-jobs-sec addscroll" style="margin-top: 50px;">
                                        <h3>Datos de acceso</h3>
                                    </div>
                                </div>
                                <div class="profile-form-edit" style="margin: 0px;">
                                    <form action="candiactualizardatos" method="POST" style="margin: 0px;" id="form_candiactualizardatos">
                                        <input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <span class="pf-title">Correo</span>
                                                <div class="pf-field">
                                                    <input readonly="true" value="<?php echo $datos[0]->correo;?>" name="correo" id="correo" type="text" placeholder="Correo electrónico">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Clave</span>
                                                <div class="pf-field">
                                                    <input placeholder="Clave" name="clave" id="clave" type="password" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12" style="margin-bottom: 50px;">
                                                <button type="button" onclick="actualizar_datos()">Actualizar</button>
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
    <?php include("local/resources/views/includes/general_footer.php");?>
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
        function set_imagen_val(id) {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
    url: 'candisetprofilepic',
    type: 'post',
    data:{id_imagen:id},
    success: function(data) {
    
    }
    })
    }

    function actualizar_datos()
    {
        if ($('#correo').val() == "") {
            $.notify("Debes colocar el correo electronico", {
              className:"error",
              globalPosition: "bottom right"
              });
        } else if ($('#clave').val() == "") {
            $.notify("Debes colocar la contraseña", {
              className:"error",
              globalPosition: "bottom right"
              });
        } else {
            $('#form_candiactualizardatos').submit();
        }
    }
    </script>
</body>
</html>