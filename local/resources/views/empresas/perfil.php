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
                        Mi perfil
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
                                    Mi panel
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
                                                    Foto de perfil
                                                </h4>
                                                <div class="row">
                                                    <div class="col-md-4" style="text-align: center;">
                                                        <?php if ($empresa[0]->img_profile!=""): ?>
                                                             <div class="form-group">
                                                             <img class="img-nav-bar" style="height: 100px;width: 100px;border-radius: 50%;border: 4px solid #1d2b36;" src="../uploads/min/<?= $empresa[0]->img_profile;?>">
                                                        </div>
                                                        <?php else :?>
                                                        <div class="form-group">
                                                             <img id="img-profile" style="height: 100px;width: 100px;border-radius: 50%;border: 4px solid #1d2b36;" src="https://credly.com/web/addons/shared_addons/themes/credly/img/avatar_default_large.png">
                                                        </div>
                                                        <?php endif ?> 
                                                    </div>
                                                    <div class="col-md-8" style="border-left: 1px solid #dedede;margin-top: 10px;">
                                                        <div class="form-group">
                                                            <label for="projectinput2">
                                                                Seleccione el la imagen
                                                            </label>
                                                            <input accept="image/*" class="form-control" id="imagen" name="imagen" placeholder="Razon Social" type="file">
                                                            </input>
                                                        </div>
                                                    </div> 
                                                </div> 
                                            </div>
                                            <div class="form-actions"> 
                                                <button class="btn btn-primary" type="button" onclick="info_imagen()">
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
                        
                        <div class="col-md-12">
                            <div class="card">
                                 
                                <div class="card-body collapse in">
                                    <div class="card-block">
                                         
                                        <form class="form">
                                            <div class="form-body">
                                                <h4 class="form-section">
                                                    <i class="icon-industry">
                                                    </i>
                                                    Información general
                                                </h4>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">
                                                                Nombre de empresa
                                                            </label>
                                                            <input class="form-control" id="nombre_empresa" name="fname" placeholder="Nombre de la empresa" type="text" value="<?php echo validar($empresa[0]->nombre)?>">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput2">
                                                                Razón Social
                                                            </label>
                                                            <input class="form-control" id="razon_social" name="" placeholder="Razon Social" type="text" value="<?php echo validar($empresa[0]->razon_social)?>">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput2">
                                                                CUIT
                                                            </label>
                                                            <input class="form-control" id="cuit" name="" placeholder="CUIT" type="text" value="<?php echo validar($empresa[0]->cuit)?>">
                                                            </input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput3">
                                                                Representante
                                                            </label>
                                                            <input class="form-control" id="representante" name="representante" placeholder="Representante" type="text" value="<?php echo validar($empresa[0]->representante)?>">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput4">
                                                                Actividad de la empresa
                                                            </label>
                                                             <select id="area" class="form-control">
                                                                <option value="">Seleccionar</option>
                                                                <?php foreach ($actividad_empresa as $key): ?>
                                                                    <option value="<?= $key->nombre?>"><?=  $key->nombre?></option> 
                                                                 <?php endforeach ?> 
                                                             </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput4">
                                                                Tipo de empresa
                                                            </label>
                                                             <select id="tipo_empresa" class="form-control">
                                                                <option value="">Seleccionar</option>
                                                                 <option value="Pública">Pública</option>
                                                                 <option value="Privada">Privada</option>
                                                                 <option value="Mixta">Mixta</option> 
                                                             </select>
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="row">
                                                     <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput4">
                                                                Tamaño empresa
                                                            </label>
                                                             <select id="tamano_empresa" class="form-control">
                                                                <option value="">Seleccionar</option>
                                                                 <option value="Pequena">Pequeña (1 - 15) Trabajadores</option>
                                                                 <option value="Mediana">Mediana (15 - 25) Trabajadores</option>
                                                                 <option value="Grande">Grande (25 - 50) Trabajadores</option> 
                                                             </select>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput4">
                                                                Soy
                                                            </label>
                                                             <select id="soy" class="form-control">
                                                                <option value="">Seleccionar</option>
                                                                 <option value="Empresa">Empresa</option>
                                                                 <option value="Consultora">Consultora</option>
                                                                 <option value="Reclutador/a">Reclutador/a</option> 
                                                             </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                  <div class="row"> 
                                                      <div class="col-xs-12">
                                                         <label for="" style="float: left;">
                                                                Descripción de la empresa 
                                                            </label>
                                                            <p style="float: right;" id="contador-des-empresa">Caracteres: 400</p>
                                                          <textarea placeholder="Texto de ejemplo: [Tu empresa] es una startup con un equipo internacional que quiere tener un impacto global. Estamos construyendo una plataforma que facilita el alquiler de motos eléctricas. Con nuestro servicio, los viajeros tienen una mayor movilidad en la ciudad que visitan y además es sostenible." maxlength="400" onkeyup="contar()" id="des-empresa" class="form-control" name="" style="resize: none;height: 100px;" placeholder="¿Cómo describes tu empresa?"><?php echo validar($empresa[0]->descripcion)?></textarea>
                                                      </div>
                                                  </div>
                                            </div>
                                            <div class="form-actions"> 
                                                <button class="btn btn-primary" type="button" onclick="info_general()">
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
                    <div class="col-md-12">
                            <div class="card">
                                 
                                <div class="card-body collapse in">
                                    <div class="card-block">
                                         
                                        <form class="form">
                                            <div class="form-body">
                                                <h4 class="form-section">
                                                    <i class="icon-map">
                                                    </i>
                                                    Información de contacto de la empresa
                                                </h4>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                             <label for="projectinput4">
                                                                País
                                                            </label>
                                                             <select id="pais" class="form-control">
                                                                <option value="Argentina">Argentina</option> 
                                                             </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                             <label for="projectinput4">
                                                             Provincia
                                                            </label>
                                                             <select id="provincia" class="form-control">
                                                                <option value="">Seleccionar</option> 
                                                                <?php foreach ($provincias as $key): ?>
                                                                    <option value="<?= $key->provincia?>"><?= $key->provincia?></option>
                                                                <?php endforeach ?>
                                                             </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput4">
                                                                Localidad
                                                            </label>
                                                             <select id="localidad" class="form-control">
                                                                <option value="">Seleccionar</option>
                                                            <?php if ($empresa[0]->localidad!=""): ?>
                                                                 <option selected="true" value="<?= $empresa[0]->localidad?>"><?= $empresa[0]->localidad;?></option>
                                                             <?php endif ?> 
                                                             </select> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                     <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput4">
                                                                Dirección
                                                            </label>
                                                             <input maxlength="50" class="form-control" id="direccion" name="" placeholder="Dirección" type="text" value="<?php echo validar($empresa[0]->direccion)?>">
                                                            </input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput4">
                                                                Teléfono Celular
                                                            </label>
                                                             <input maxlength="50" class="form-control" id="telefono-celular" name="" placeholder="Teléfono Celular" type="text" value="<?php echo validar($empresa[0]->telefono_celular)?>">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput4">
                                                                Teléfono Fijo
                                                            </label>
                                                             <input maxlength="50" class="form-control" id="telefono-fijo" name="" placeholder="Teléfono Fijo" type="text" value="<?php echo validar($empresa[0]->telefono_fijo)?>">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput4">
                                                                Correo de contacto
                                                            </label>
                                                             <input maxlength="50" class="form-control" id="correo" name="" placeholder="Correo de contacto" type="text" value="<?php echo validar($empresa[0]->correo_contacto)?>">
                                                            </input>
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="row">
                                                     <div class="col-md-4">
                                                         <div class="form-group">
                                                            <label for="projectinput4">
                                                               Página Web 
                                                            </label>
                                                             <input maxlength="50" class="form-control" id="pagina" name="pagina" placeholder="Página Web " type="text" value="<?php echo validar($empresa[0]->pagina_web)?>">
                                                            </input>
                                                        </div>
                                                    </div> 

                                                     <div class="col-md-4">
                                                         <div class="form-group">
                                                            <label for="projectinput4">
                                                               Latitud
                                                            </label>
                                                             <input maxlength="50" class="form-control" id="longitud" name="longitud" placeholder="Longitud " type="text"  value="<?php echo validar($empresa[0]->latitud)?>">
                                                            </input>
                                                        </div>
                                                    </div>

                                                     <div class="col-md-4">
                                                         <div class="form-group">
                                                            <label for="projectinput4">
                                                               Longitud 
                                                            </label>
                                                             <input maxlength="50" class="form-control" id="latitud" name="latitud" placeholder="Latitud " type="text"  value="<?php echo validar($empresa[0]->longitud)?>">
                                                            </input>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="form-actions"> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                         <button onClick="info_contacto()" class="btn btn-primary" type="button">
                                                            <i class="icon-check2">
                                                            </i>
                                                            Guardar
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-6" style="text-align: right;">
                                                         <a href="#" >¿Cómo colocar la latitud y la longitud?</a>
                                                    </div> 
                                                </div> 
                                            </div> 
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-12" >
                            <div class="card" style="background-image: url('https://images.vexels.com//media/users/3/144709/raw/95b04989b71b9375d9d04c3ee50cfc05-abstract-white-background-or-backdrop.jpg');border: 2px dashed #848484;">
                                 
                                <div class="card-body collapse in">
                                    <div class="card-block">
                                         
                                        <form class="form"  method="post">
                                            <div class="form-body">
                                                <h4 class="form-section">
                                                    <i class="icon-video">
                                                    </i>
                                                    Video promocional de la empresa
                                                </h4>
                                                <div class="row">
                                                     <div class="col-md-12" style="text-align: center;">
                                                        <div class="form-group">
                                                             <img style="height: 100px;width: auto;" src="<?= $ruta?>app-assets/images/logo/youtube.png">
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">
                                                                Link de YouTube
                                                            </label>
                                                            <input class="form-control" id="video" name="fname" placeholder="YouTube" type="text" value="<?php echo validar($empresa[0]->video_youtube)?>">
                                                            </input>
                                                        </div>
                                                    </div>  
                                                </div> 
                                            </div>
                                            <div class="form-actions"> 
                                               <div class="row">
                                                    <div class="col-sm-6">
                                                        <button onClick="video_youtube()" class="btn btn-primary" type="button">
                                                            <i class="icon-check2">
                                                            </i>
                                                            Guardar
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-6" style="text-align: right;">
                                                         <a href="#" >¿Cómo subir un video a YouTube?</a>
                                                    </div> 
                                                </div> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <div class="col-md-12">
                            <div class="card"> 
                                <div class="card-body collapse in">
                                    <div class="card-block"> 
                                        <form class="form">
                                            <div class="form-body">
                                                <h4 class="form-section">
                                                    <i class="icon-facebook">
                                                    </i>
                                                    Redes sociales
                                                </h4>
                                                 
                                                 
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput4">
                                                               Linkedin
                                                            </label>
                                                             <input maxlength="50" class="form-control" id="linkedin" name="" placeholder="Linkedin" type="text" value="<?php echo validar($empresa[0]->linkedin)?>">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput4">
                                                                Facebook
                                                            </label>
                                                             <input maxlength="50" class="form-control" id="facebook" name="" placeholder="Facebook" type="text" value="<?php echo validar($empresa[0]->facebook)?>">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput4">
                                                                Twitter
                                                            </label>
                                                             <input maxlength="50" class="form-control" id="twitter" name="" placeholder="Twitter" type="text"  value="<?php echo validar($empresa[0]->twitter)?>">
                                                            </input>
                                                        </div>
                                                    </div> 
                                                </div> 
                                            </div>
                                            <div class="form-actions"> 
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                         <button onClick="info_redes()" class="btn btn-primary" type="button">
                                                            <i class="icon-check2">
                                                            </i>
                                                            Guardar
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-6" style="text-align: right;">
                                                         <a href="#" >¿Cómo agrego mis redes sociales?</a>
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
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
   <?php include('includes/footer.php')?>
   <?php include('local/resources/views/empresas/require/js.php');?>
        <script>
            function info_imagen() { 
                
                    if($("#imagen").val()=="")
                    {
                         $.notify("Debe seleccionar una imagen.","info");
                         return 0;
                    }
                    else
                    {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: 'infoimagen',
                            type: 'POST', 
                            data:new FormData($("#form-imagen")[0]), 
                             async:false, 
                             enctype: 'multipart/form-data',
                                processData: false,  // Important!
                                contentType: false,
                                cache: false,  
                            success: function(response) { 
                                     $.notify("Datos actualizados con éxito.","success"); 
                                     $(".img-nav-bar").attr('src','../uploads/min/'+response);
                            },
                            error: function(error) {
                                $.notify("Ocurrió un error al procesar la solicitud.");
                            }
                        });
                    }
                         
            }  
            function video_youtube() {            
                datos={ 
                youtube:$('#video').val(),  
                    }
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: 'infoyoutube',
                            type: 'POST',
                            data:datos,  
                            success: function(response) { 
                                     $.notify("Datos actualizados con éxito.","success");
                            },
                            error: function(error) {
                                $.notify("Ocurrió un error al procesar la solicitud.");
                            }
                        }); 
            } 
            function info_general() { 
            if(!validar_r("nombre_empresa")){} 
            else if(!validar_r("razon_social")){}   
            else if(!validar_r("representante")){} 
            else if(!validar_r("area")){} 
            else if(!validar_r("tipo_empresa")){} 
            else if(!validar_r("tamano_empresa")){} 
            else if(!validar_r("soy")){}  
            else if(!validar_r("des-empresa")){}   
            else
            {
                datos={ 
                nombre_empresa:$('#nombre_empresa').val(),
                razon_social:$('#razon_social').val(),
                representante:$('#representante').val(),  
                actividad_empresa:$('#area').val(),    
                tipo_empresa:$('#tipo_empresa').val(), 
                cuit:$('#cuit').val(),  
                tamano_empresa:$('#tamano_empresa').val(),  
                soy:$('#soy').val(),  
                descripcion:$('#des-empresa').val(),  
                    }
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: 'infogeneral',
                            type: 'POST',
                            data:datos,  
                            success: function(response) {
                                if(response=='0')
                                {
                                     $.notify("Por favor complete los campos requeridos.","info"); 
                                }else
                                {
                                     $.notify("Datos actualizados con éxito.","success");                                   
                                }                               
                            },
                            error: function(error) {
                                $.notify("Ocurrió un error al procesar la solicitud.");
                            }
                        }); 
                  } 
            }

            function info_contacto() { 
            if(!validar_r("pais")){} 
            else if(!validar_r("provincia")){}   
            else if(!validar_r("localidad")){} 
            else if(!validar_r("direccion")){} 
            else if(!validar_r("telefono-celular")){}  
            else if(!validar_r("correo")){} 
             else if(!validar_correo("correo")){}     
            else
            {
                datos={ 
                pais:$('#pais').val(),
                provincia:$('#provincia').val(),
                localidad:$('#localidad').val(),  
                direccion:$('#direccion').val(),    
                telefono_celular:$('#telefono-celular').val(), 
                telefono_fijo:$('#telefono-fijo').val(),  
                correo:$('#correo').val(),  
                pagina:$('#pagina').val(),  
                latitud:$('#latitud').val(), 
                longitud:$('#longitud').val(),  
                    }
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: 'infocontacto',
                            type: 'POST',
                            data:datos,  
                            success: function(response) {
                                if(response=='0')
                                {
                                     $.notify("Por favor complete los campos requeridos.","info"); 
                                }else
                                {
                                     $.notify("Datos actualizados con éxito.","success");                                   
                                }                               
                            },
                            error: function(error) {
                                $.notify("Ocurrió un error al procesar la solicitud.");
                            }
                        }); 
                  } 
            }

            function info_redes() {            
                datos={ 
                facebook:$('#facebook').val(),
                linkedin:$('#linkedin').val(),
                twitter:$('#twitter').val(),  
                  
                    }
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: 'inforedes',
                            type: 'POST',
                            data:datos,  
                            success: function(response) { 
                                     $.notify("Datos actualizados con éxito.","success");
                            },
                            error: function(error) {
                                $.notify("Ocurrió un error al procesar la solicitud.");
                            }
                        }); 
                  }  
        </script>
    <script>
        function contar()
        {
            letras = $("#des-empresa").val();
            $("#contador-des-empresa").html('Caracteres: '+(400-letras.length))
        } 
        contar();
        
    </script>

    <?php 
        function validar($par)
        {
            if(isset($par) && $par!="")
            {return $par;}
            else {return "";} 
        }
        echo '<script>set_select("provincia","'.$empresa[0]->provincia.'");</script>';   
        echo '<script>set_select("area","'.$empresa[0]->actividad_empresa.'");</script>';
        echo '<script>set_select("tipo_empresa","'.$empresa[0]->tipo_empresa.'");</script>';
        echo '<script>set_select("tamano_empresa","'.$empresa[0]->tamano_empresa.'");</script>';
        echo '<script>set_select("soy","'.$empresa[0]->soy.'");</script>';  
        echo '<script>set_select("pais","'.$empresa[0]->pais.'");</script>';  
    ?>
</body>
