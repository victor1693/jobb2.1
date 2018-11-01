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
                                <div class="">
                                    <div class="profile-title">
                                        <h3>Mis Recomendaciones</h3>
                                    </div>
                                    <div class="profile-form-edit">
                                        <form action="candirecomendar" method="POST" id="form_candirecomendar">
                                            
                                            <input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
                                            <div class="row">
                                                <div class="col-lg-12" style="margin-top: -20px;">
                                                    <span class="pf-title">¿Qué te gustaría ver en Jobbers?</span>
                                                    <div class="pf-field">
                                                        <textarea placeholder="Detalle..." name="descripcion" id="descripcion" style="resize: none;min-height: 75px;padding: 10px;"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" style="margin-bottom: 50px;">
                                                    <button type="button" onclick="add_recomendacion()">Agregar</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--Desde aqui-->
                                        <div class="manage-jobs-sec addscroll">
                                            <!--Top candidatos-->
                                            <h3 style="margin-top:-25px;">Seguimiento</h3>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td>Estatus</td>
                                                        <td>Pts Obtenidos</td>
                                                        <td>Descripción</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($datos as $key) {
                                                    echo'<tr>
                                                        <td>
                                                            <span class="applied-field">1.</span><br>
                                                        </td>
                                                        <td>
                                                            <span class="applied-field">'.$key->estatus.'</span><br>
                                                            
                                                        </td>
                                                        <td>
                                                            <span class="status active">'.$key->pts.'</span>
                                                        </td>
                                                        <td>
                                                            <span class="applied-field">'.$key->descripcion.'</span><br>
                                                        </td>
                                                    </tr> ';
                                                    }?>
                                                </tbody>
                                            </table>
                                            <!--Fin Top candidatos-->
                                            
                                        </div>
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

        <script>
            function add_recomendacion()
            {
                if ($('#descripcion').val() == "") {
                    $.notify("Debes colocar una descripción de la recomendación para la plataforma", {
                    className:"error",
                    globalPosition: "bottom center"
                    });
                } else {
                    $('#form_candirecomendar').submit();
                }
            }
        </script>
        
    </body>
</html>