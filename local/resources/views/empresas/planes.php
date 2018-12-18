<!DOCTYPE html>
<?php $ruta='../local/resources/views/empresas/';?>
<html class="loading" data-textdirection="ltr" lang="es">
    <head>
       <?php include('includes/referencias-top.php');?>
    </head>
    <style type="text/css">
        .plan-gold
        {
            background: rgba(255,255,255,1);
            background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(245,245,245,1) 47%, rgba(237,237,237,1) 100%);
            background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,1)), color-stop(47%, rgba(245,245,245,1)), color-stop(100%, rgba(237,237,237,1)));
            background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(245,245,245,1) 47%, rgba(237,237,237,1) 100%);
            background: -o-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(245,245,245,1) 47%, rgba(237,237,237,1) 100%);
            background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(245,245,245,1) 47%, rgba(237,237,237,1) 100%);
            background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(245,245,245,1) 47%, rgba(237,237,237,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed', GradientType=0 );
        }
        .rayar
        {
            text-decoration:line-through;
        } 
    </style>

      <script type="text/javascript">
                (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
            </script>
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
                        Planes
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
                                    Planes
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
                                                    <i class="icon-star-full">
                                                    </i>
                                                    Planes Jobbers
                                                </h4>
                                                <div class="row plan-gold" style="border: 1px solid #c5c5c5;">
                                                    <div class="col-md-4" style="padding-right: 0px; text-align: center;padding-top: 30px;background-image: url('../local/resources/views/empresas/app-assets/images/logo/bg-1.png')">
                                                         <div class="form-group" style="background-color: rgba(255,255,255,0.8);">
                                                             <img id="img-profile" style="height: 150px;width: auto;" src="http://www.transparentpng.com/download/award/3vi84B-award-background.png">
                                                             <h3>Jobbers Premium</h3>
                                                             <h3><span style="text-decoration: line-through;color: #a3a3a3;font-weight: 400;">$ 2.500</span> $ 1.250</h3>
                                                             <?php if (session()->get('company_plan')=='Premium'): ?>
                                                                 <div class="form-actions"> 
                                                                    <button onclick="alert('Ya cuenta con el plan Premium')"  type="button" class="btn btn-primary" >Realizar Pago <i class="fa fa-money"></i></button>
                                                                </div>
                                                                <?php else: ?>
                                                                <div class="form-actions"> 
                                                                <button type="button" onclick="pagar()" class="btn btn-primary" id="payMP">Realizar Pago <i class="fa fa-money"></i></button>
                                                            </div>
                                                             <?php endif ?>
                                                             
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8" style="border-left: 1px solid #dedede;margin-top: 10px;">
                                                         <div style="background-color: ">
                                                             <ul style="list-style: none;">
                                                                 <li>Gestión de entrevistas <span class="tag tag-warning">Proximamente</span></li>
                                                                 <li>Ofertas ilimitadas</li>
                                                                 <li>Tiempo ilimitado</li>
                                                                 <li>Ver todos los postulados</li>
                                                                 <li class="rayar">Publicidad</li>
                                                                 <li>Recomendación Jobbers</li> 
                                                                 <li>Listado de candidatos con filtros <span class="tag tag-warning">Proximamente</span></li>
                                                                 <li>Acceso a CV descargable de los candidatos</li>
                                                                 <li>Marcador de cantidatos: <span style="font-size: 11px;"><strong>(Visto, Finalista, Contactado, Entrevistado, Descartado, Contratado)</strong></span></li>
                                                                 <li>Video de YouTube</li>
                                                                 <li>Plantillas de publicación</li>
                                                                 <li>Editar Ofertas</li> 
                                                             </ul>
                                                         </div>
                                                    </div> 
                                                </div> 

                                                 <div class="row" style="border: 1px solid #c5c5c5;margin-top: 35px;">
                                                    <div class="col-md-4" style="padding-right: 0px; text-align: center;padding-top: 30px;">
                                                         <div class="form-group" style="background-color: rgba(255,255,255,0.8);">
                                                             <img id="img-profile" style="height: 150px;width: auto;" src="http://unsuppoetaulit.fr/wp-content/uploads/2018/07/cropped-rocket_icon-icons.com_54375-300x300.png">
                                                             <h3>Jobbers Inicio</h3>
                                                             <h3><span style="text-decoration: line-through;color: #a3a3a3;font-weight: 400;">$ 299</span> Gratis</h3>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8" style="border-left: 1px solid #dedede;margin-top: 10px;">
                                                         <div style="background-color: ">
                                                             <ul style="list-style: none;">
                                                                 <li class="rayar">Gestión de entrevistas <span class="tag tag-warning">Proximamente</span></li>
                                                                 <li>5 Ofertas</li>
                                                                 <li>30 días</li>
                                                                 <li>Ver los primeros 25 postulados</li>
                                                                 <li>Publicidad</li>
                                                                 <li  class="rayar">Recomendación Jobbers</li>
                                                                 <li  class="rayar">Evaluación de candidatos por Jobbers</li>
                                                                 <li  class="rayar">Listado de candidatos con filtros <span class="tag tag-warning">Proximamente</span></li>
                                                                 <li>Acceso a CV descargable de los candidatos</li>
                                                                 <li>Marcador de cantidatos: <span style="font-size: 11px;"><strong>(Visto, Finalista, Contactado, Entrevistado, Descartado, Contratado)</strong></span></li>
                                                                 <li>Video de YouTube</li>
                                                                 <li  class="rayar">Plantillas de publicación</li>
                                                                 <li class="rayar">Editar Ofertas</li> 
                                                             </ul>
                                                         </div>
                                                    </div> 
                                                </div> 
                                            </div> 
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </section> 
            </div>
        </div>
    </div>
   <?php include('includes/footer.php')?>
   <?php include('local/resources/views/empresas/require/js.php');?>
   <script>
   function pagar()
        { 
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }); 
            $.ajax({
                type: 'post',
                url: '../pago',
                data: {},
                dataType: 'json',
                success: function(data) { 
                    $("#payMP").attr("data-v", data.data.response.init_point);
                    //$("#payMP").attr("data-v", data.data.response.sandbox_init_point);  
                        $MPC.openCheckout({
                            url: $("#payMP").attr("data-v"),
                            mode: "modal",
                            onreturn: function(data) {
                               //console.log(data);
                                execute_my_onreturn(data);
                            } 
                    });
                },
                error: function(error) {
                    console.log("Ha ocurrido un error inesperado, vuelva a intentarlo.", {
                        className: "error",
                        globalPosition: "bottom center"
                    });
                }
            });
        }    

        function execute_my_onreturn(json) {
            if (json.collection_status == 'approved') {   
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });  
            $.ajax({
                type: 'post',
                url: '../generar/pago',
                data: 'transaction=' + JSON.stringify(json),
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    window.location.reload();
                }
            }); 

        } else if (json.collection_status == 'pending') {
            console.log("El usuario no completó el proceso de pago, no se ha generado ningún pago.", {
                className: "warning",
                globalPosition: "bottom center"
            });
        } else if (json.collection_status == 'in_process') {
            console.log("El pago está siendo revisado. Se le notificará cuando la transacción se complete.", {
                className: "info",
                globalPosition: "bottom center"
            });
        } else if (json.collection_status == 'rejected') {
            console.log("El pago fué rechazado, el usuario puede intentar nuevamente el pago.", {
                className: "error",
                globalPosition: "bottom center"
            });
        } else if (json.collection_status == null) {
            console.log("El usuario no completó el proceso de pago, no se ha generado ningún pago.", {
                className: "warning",
                globalPosition: "bottom center"
            });
        }
    } 
        </script>
</body>
