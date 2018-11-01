<?php
$mi_tokken = csrf_token();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'local/resources/views/includes/referencias_top.php';?> 
        <link rel="stylesheet" type="text/css" href="../../local//resources/views/css/bootstrap-grid.css" />
        <link rel="stylesheet" href="../../local//resources/views/css/icons.css"> 
        <link rel="stylesheet" type="text/css" href="../../local//resources/views/css/style.css" />
        <link rel="stylesheet" type="text/css" href="../../local//resources/views/css/responsive.css" /> 
        <link rel="stylesheet" type="text/css" href="../../local//resources/views/css/colors/colors.css" />
        <meta name="csrf-token" content="<?php echo $mi_tokken; ?>"> 
    </head>
    <body style="background: url(https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg)">
        <div class="theme-layout" id="scrollup"> 
            <!--Header responsive-->
            <?php $atars=2;?>
            <?php include('local/resources/views/includes/header_administrator.php');?>  
            <?php include('local/resources/views/includes/header_responsive_admin.php');?>  
            <section>
                <div class="block no-padding mt-75">
                    <div class="container">
                        <div class="row no-gape">
                            <?php include('includes/administrator_menu_left.php');?> 
                            <div class="col-lg-9 column"> 
                                    <div class="padding-left" style="padding-top: 0px;">
                                    <div class="manage-jobs-sec addscroll">
                                         <h3>Datos de acceso</h3>
                                    </div> 
                                </div>  
                                <div class="social-edit">
                                    <form  id="form_datos_per"  action="nuevo" method="POST"> 
                                        <input type="hidden" name="_token" value="<?php echo $mi_tokken;?>">
                                        <div class="row"> 
                                            <div class="col-lg-6">
                                                <span class="pf-title">Correo</span>
                                                <div class="pf-field">
                                                    <input id="correo" value="<?php if(isset($_GET['correo'])){echo $_GET['correo'];}?>" name="correo" type="text" placeholder="correo@dominio.com" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Clave</span>
                                                <div class="pf-field">
                                                    <input id="clave" value="<?php if(isset($_GET['clave'])){echo $_GET['clave'];}?>" name="clave" type="password" placeholder="*********" />
                                                </div>
                                            </div> 
                                        </div>
                                         <div class="col-lg-12">
                                                <button type="submit">Guardar</button> 
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
    <?php include "local/resources/views/includes/general_footer.php";?>
    <script src="../../local/resources/views/js/jquery.min.js" type="text/javascript"></script> 
    <script src="../../local/resources/views/js/script.js" type="text/javascript"></script> 
    <?php include "local/resources/views/includes/referencias_down.php";?>     
    <?php if (isset($_GET['result']) && $_GET['result']!=""): ?>
        <script>notificacion("<?php echo $_GET['result'];?>");</script>      
    <?php endif ?>
</body>
</html> 