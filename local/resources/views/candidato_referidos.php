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
                                        <h3>Mis Referidos</h3>
                                    </div>
                                    <div class="profile-form-edit">
                                        <form action="publiacionescreg" method="POST">
                                            
                                            <input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
                                            <div class="row">
                                                
                                                <div class="col-lg-12">
                                                    <span class="pf-title">Mi link de referido.</span>
                                                    <div class="pf-field">
                                                        <input value="http://www.jobbers.com.net/r/<?php echo session()->get("cand_token").'/2'?>" name="direccion" type="text" placeholder="¿Con qué tiene problemas?" id="id_token"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" style="margin-bottom: 50px;">
                                                    <button data-clipboard-target="#id_token" id="btn_copiar" type="button">Copiar link</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--Desde aqui-->
                                        <div class="manage-jobs-sec addscroll">
                                            <!--Top candidatos-->
                                            <h3 style="margin-top:-25px;">Mis usuarios referios</h3>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td>Usuario</td>
                                                        <td>Fecha de registro</td>
                                                        <td>Pts. Obtenidos</td>
                                                        <td>Ver</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $contador=0;
                                                    foreach ($datos as $key) {
                                                    $contador++;
                                                    echo'<tr>
                                                        <td>
                                                            <span class="applied-field">'.$contador.'.</span><br>
                                                        </td>
                                                        <td>
                                                            <span class="status">'.substr($key->token, 0,10).'</span><br>
                                                        </td>
                                                        <td>
                                                            <span class="applied-field">****'.substr($key->correo, -15).'</span><br>
                                                        </td>
                                                        <td>
                                                            <span class="status active">+5</span>
                                                        </td>
                                                        <td>
                                                            <ul class="action_job">
                                                                <li><span>Ver estado</span><a href="#" title=""><i class="la la-eye"></i></a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>';
                                                    }
                                                    ?>
                                                    
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
        <script src="https://cdn.rawgit.com/zenorocha/clipboard.js/v1.5.3/dist/clipboard.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $('#btn_copiar').on('click', function() {
                
                var clipboard = new Clipboard('#btn_copiar');

                $.notify("Link de referido copiado exitosamente.", {
                className:"success",
                globalPosition: "bottom center"
                });
                
            });
        });
        </script>
        
    </body>
</html>