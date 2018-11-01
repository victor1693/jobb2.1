<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Administración Jobbers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="CreativeLayers">
    <?php include('local/resources/views/includes/referencias_top.php');?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../local/resources/views/css/icons.css">
    <link rel="stylesheet" href="../local/resources/views/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="../local/resources/views/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../local/resources/views/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="../local/resources/views/css/colors/colors.css" />

</head>

<body style="background-image: url('https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg');">
    <!--Header responsive-->
    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-md">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Enviar correo</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row" style="padding: 15px;">
                                     <form action="candidatos/enviar" method="post">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                        <input type="hidden" name="identificador" id="identificador" value=""> 
                                        <span style="font-weight: 600;">Detalle</span>
                                         <textarea name="detalle" style="resize: none;" placeholder="Mensaje..." class="form-control"></textarea>
                                         <button type="submit">Enviar</button>
                                    </form>
                                </div>
                             </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                            </div>
                          </div>
                        </div>
                      </div>

    <div class="theme-layout" id="scrollup">

        <?php include('local/resources/views/includes/header_administrator.php');?>
        <?php include('local/resources/views/includes/header_responsive_admin.php');?>
        <!-- Modal -->
             
            <section>
                <div class="block no-padding mt-75">
                     
                    <div class="container">
                        <div class="row no-gape">
                            <?php include('includes/administrator_menu_left.php');?>
                                <div class="col-lg-9 column">
                                    <div class="padding-left">
                                        <div class="manage-jobs-sec addscroll">
                                            <h3>Candidatos 
					 			</h3>
                                            <div class="extra-job-info" style="margin-bottom: 30px;background-color: #f0f0f0;">
                                                <span style=""><span style="font-size: 24px;"><?php echo ($datos_resumen[0]->cantidad+$datos_resumen[1]->cantidad+$datos_resumen[2]->cantidad);?></span><strong></strong></span>
                                                <span><i class="la la-venus"></i><strong><?php echo $datos_resumen[1]->cantidad;?></strong><a href="noticias/categorias" title="">Hombres</a></span>
                                                <span><i class="la la-mars"></i><strong><?php echo $datos_resumen[2]->cantidad;?></strong><a href="noticias/categorias" title="">Mujeres</a></span>
                                            </div>

                                            <form action="candidatos" method="get">
                                                <a href="candidatos/nuevo" title="" style=""><span style="padding-left: 30px;text-decoration: underline; color: #009804;font-size: 16px;margin-top: -50px;">Nuevo candidato</span></a>
                                                <div class="pf-field" style="padding-left: 30px;margin-top: 25px;">
                                                    <input style="margin-bottom: 0px;" id="noticia_titulo" value="<?php if(isset($_GET['filtrar'])){echo $_GET['filtrar'];}?>" name="filtrar" type="text" placeholder="Buscador...">
                                                    <span style="color: #009804;font-size: 12px;margin-top: -50px;">*El buscador funciona por nombre, apellido o correo.</span>
                                                </div>
                                            </form>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <td>Nombre</td>
                                                        <td style="width:200px;">Opciones</td>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php foreach ($datos_candidatos as $key ): ?>
                                                      
                                                        <tr>
                                                            <td>
                                                                <div class="table-list-title">
                                                                    <h3><a href="candidatos/resumen/<?= $key->id;?>" title=""><?php echo $key->nombre;?></a></h3>
                                                                    <span><?php echo $key->correo;?></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <ul class="action_job">
                                                                    <li><span>Ver</span><a href="../candidato/<?= $key->id;?>" title=""><i class="la la-eye"></i></a></li>
                                                                    <li><span>Editar</span><a href="candidatos/<?= $key->id;?>" title=""><i class="la la-pencil"></i></a></li>
                                                                    <li><span>Descargar CV</span><a target="_blank" href="../reporte/<?= $key->id;?>" title=""><i class="la la-download"></i></a></li>
                                                                    <li><span>Resumen</span><a href="candidatos/resumen/<?= $key->id;?>" title=""><i class="la la-file-text"></i></a></li>
                                                                    <li><span>Enviar correo</span><a onClick="enviar_correo('<?php echo $key->correo;?>')" href="#" title=""><i class="la la-envelope"></i></a></li>
                                                                    <li><span>Eliminar</span><a href="candidatos/eliminar?id=<?= $key->id;?>" title=""><i class="la la-trash-o"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach ?>
                                                </tbody>
                                            </table> 
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
    </div>
    <script src="../local/resources/views/js/jquery.min.js" type="text/javascript"></script>
    <script src="../local/resources/views/js/script.js" type="text/javascript"></script>
    <script src="../local/resources/views/js/slick.min.js" type="text/javascript"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function enviar_correo(correo)
        {
           $("#identificador").val(correo);
           $("#myModal").modal('show');  
        } 
    </script>
</body> 
</html>