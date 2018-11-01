<!DOCTYPE html>
<?php $ruta='../local/resources/views/empresas/';?>
<html class="loading" data-textdirection="ltr" lang="es">
    <head>
       <?php include('includes/referencias-top.php');?>
    </head>
</html>
<body class="vertical-layout vertical-menu 2-columns fixed-navbar" data-col="2-columns" data-menu="vertical-menu" data-open="click">
    <?php include('includes/nav.php')?>
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <!--Aside-->
        <?php include('includes/aside.php')?>
    </div>
    <!-- / main menu-->
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-xs-12 mb-1">
                    <h2 class="content-header-title">
                        Configuración
                    </h2>
                </div>
                <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo Request::root()?>/empresas/panel">
                                    Inicio
                                </a>
                            </li> 
                            <li class="breadcrumb-item active">
                                <a href="#">
                                    Configuración
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height"> 
                       <div class="col-md-12">
                            <div class="card">
                                 
                                <div class="card-body collapse in">
                                    <div class="card-block">
                                         
                                        <form class="form" id="form-imagen" enctype="multipart/form-data" method="POST">
                                            <div class="form-body">
                                                <h4 class="form-section">
                                                    <i class="icon-image">
                                                    </i>
                                                    Datos de acceso
                                                </h4>
                                                <div class="row">
                                                    <div class="col-md-6" >    
                                                        <div class="form-group">
                                                             <label>Correo</label>
                                                             <input readonly="" value="<?= validar($datos[0]->correo)?>" class="form-control" placeholder="Correo" type="text" name="">
                                                        </div>                                                         
                                                    </div>
                                                     <div class="col-md-6" > 
                                                        <div class="form-group">
                                                             <label>Clave</label>
                                                             <input id="clave" class="form-control" placeholder="Clave" type="password" name="">
                                                        </div> 
                                                    </div> 
                                                </div> 
                                            </div>
                                            <div class="form-actions"> 
                                                <button class="btn btn-primary" type="button" onclick="cambio_clave()">
                                                    <i class="icon-check2">
                                                    </i>
                                                    Guardar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
   <?php include('includes/footer.php')?>
   <?php include('local/resources/views/empresas/require/js.php');?>
   <script>
       function cambio_clave() 
       {
           if(!validar_r('clave')){}
           else if(!validar_clave('clave')){}
           else{            
                datos={ 
                clave:$('#clave').val(),  
                    }
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: 'cambioclave',
                            type: 'POST',
                            data:datos,  
                            success: function(response) { 
                                     $.notify("Clave actualizada con éxito.","success");
                            },
                            error: function(error) {
                                $.notify("Ocurrió un error al procesar la solicitud.");
                            }
                        }); 
                }
            } 
   </script> 
    <?php 
        function validar($par)
        {
            if(isset($par) && $par!="")
            {return $par;}
            else {return "";} 
        } 
    ?>
</body>
