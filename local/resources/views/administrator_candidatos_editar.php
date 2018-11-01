<?php
$mi_tokken = csrf_token();
?>
<!DOCTYPE html>
<html>
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Jobbers Argentina</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="CreativeLayers">

        <?php include('local/resources/views/includes/referencias_top.php');?> 

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="../../local/resources/views/css/bootstrap-grid.css" />
        <link rel="stylesheet" href="../../local/resources/views/css/icons.css">
        <link rel="stylesheet" href="../../local/resources/views/css/animate.min.css">
        <link rel="stylesheet" type="text/css" href="../../local/resources/views/css/style.css" />
        <link rel="stylesheet" type="text/css" href="../../local/resources/views/css/responsive.css" />
        <link rel="stylesheet" type="text/css" href="../../local/resources/views/css/chosen.css" />
        <link rel="stylesheet" type="text/css" href="../../local/resources/views/css/colors/colors.css" />
        <meta name="csrf-token" content="<?php echo $mi_tokken; ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
        
    </head>
    <body style="background: url(https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg)">
        <div class="theme-layout" id="scrollup"> 
            <!--Header responsive-->
            <?php include('local/resources/views/includes/header_administrator.php');?>  
            <?php include('local/resources/views/includes/header_responsive_admin.php');?>  
            <!--fin Header responsive-->
            <!--Modal imagenes-->
            <?php include('local/resources/views/includes/modal_cand_educacion_admin.php');?>
            <?php include('local/resources/views/includes/modal_cand_experiencia_admin.php');?>
            <style type="text/css">
            @media (min-width: 576px) {
            .modal-dialog {
            max-width: none;
            }
            }
            .modal-dialog {
            width: 99%;
            margin-right: 0px;
            height: 95%;
            }
            .modal-content {
            height: 95%;
            }
            </style>
            <!-- Modal --> 
            <section>
                <div class="block no-padding mt-75">
                    <div class="container">
                        <div class="row no-gape">
                             <?php include('includes/administrator_menu_left.php');?> 
                            <div class="col-lg-9 column">
                            
                                <div class="padding-left">
                                    <div class="manage-jobs-sec addscroll">
                                         <h3>Perfil</h3>
                                    </div> 
                                </div>   
                                <?php
                                
                                //Datos personales
                                $up_nombres="";
                                $up_apellidos="";
                                $up_edo_civil="";
                                $up_discapacidad="";
                                $up_sexo="";
                                $up_hijos="";
                                $up_nacionalidad="";
                                $up_t_id="";
                                $up_id="";
                                $up_fecha="";
                                $up_desc="";
                                $up_cuil="";
                                if(isset($bandera_datos_personales) && $bandera_datos_personales==1)
                                {
                                $up_nombres=$datos_personales_up[0]->nombres;
                                $up_apellidos=$datos_personales_up[0]->apellidos;
                                $up_edo_civil=$datos_personales_up[0]->id_edo_civil;
                                $up_discapacidad=$datos_personales_up[0]->id_discapacidad;
                                $up_sexo=$datos_personales_up[0]->id_sexo;
                                $up_hijos=$datos_personales_up[0]->hijos;
                                $up_nacionalidad=$datos_personales_up[0]->id_nacionalidad;
                                $up_t_id=$datos_personales_up[0]->id_tipo_identificacion;
                                $up_id=$datos_personales_up[0]->n_identificacion;
                                $up_fecha=$datos_personales_up[0]->fecha_nac;
                                $up_desc=$datos_personales_up[0]->sobre_mi;
                                $up_cuil=$datos_personales_up[0]->cuil;
                                }
                                // Prefenrencias laborales
                                $up_remuneracion="";
                                $up_jornada="";
                                if($bandera_preferencias_laborales==1)
                                {
                                $up_remuneracion=$preferencias_laborales_up[0]->id_remuneracion_pre;
                                $up_jornada=$preferencias_laborales_up[0]->id_jornada;
                                }
                                //Datos de contacto
                                //infocontacto[0]
                                $up_telefono_contac="";
                                $up_correo_contac="";
                                $up_sitio_contac="";
                                $up_pais_contac="";
                                $up_provincia_contac="";
                                $up_localidad_contac="";
                                $up_direccion_contac="";
                                $up_latitud_contac="";
                                $up_longitud_contac="";
                                if($bandera_datos_contacto==1)
                                {
                                $up_telefono_contac=$infocontacto[0]->telefono;
                                $up_correo_contac=$infocontacto[0]->correo;
                                $up_sitio_contac=$infocontacto[0]->web;
                                $up_pais_contac=$infocontacto[0]->id_pais;
                                $up_provincia_contac=$infocontacto[0]->id_provincia;
                                $up_localidad_contac=$infocontacto[0]->id_localidad;
                                $up_direccion_contac=$infocontacto[0]->direccion;
                                $up_latitud_contac=$infocontacto[0]->latitud;
                                $up_longitud_contac=$infocontacto[0]->logitud;
                                }
                                ?>
                                <div class="social-edit" style="padding: 0px;">  
                                    <form  id="form_datos_imagen"  action="../../adminsetprofilepic" method="POST" style="margin: 0px;"enctype="multipart/form-data">
                                           <input type="hidden" name="_token" value="<?php echo $mi_tokken;?>">
                                           <input type="hidden" name="admin_control" value="1">
                                                <span class="pf-title">Imagen</span>
                                                <div class="pf-field">
                                                   <input name="imagen_perfil" id="imagen_perfil" type="file" placeholder="" accept="image/*">
                                                </div> 

                                                <button type="submit" onClick="">Guardar</button> 
                                    </form>
                                </div>
                                    <div class="padding-left" style="padding-top: 0px;">
                                    <div class="manage-jobs-sec addscroll">
                                         <h3>Datos personales</h3>
                                    </div> 
                                </div>  
                                <div class="social-edit">
                                    <form  id="form_datos_per"  action="../../admincandidatosper" method="POST">
                                     
                                        <input type="hidden" name="_token" value="<?php echo $mi_tokken;?>">
                                        <input type="hidden" name="admin_control" value="1">
                                        <div class="row"> 
                                            <div class="col-lg-6">
                                                <span class="pf-title">Nombres</span>
                                                <div class="pf-field">
                                                    <input id="datos_per_nombres" value="<?php echo $up_nombres;?>" name="nombres" type="text" placeholder="Victor" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Apellidos</span>
                                                <div class="pf-field">
                                                    <input id="datos_per_apellidos" value="<?php echo $up_apellidos;?>" name="apellidos" type="text" placeholder="Fernández" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Identificación</span>
                                                <div class="pf-field">
                                                    <select id="tipo_id" name="t_id" name="sexo" data-placeholder="Allow In Search" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                        <?php foreach ($identificacion as $key ) {
                                                        echo'<option id="tipo_id_'.$key->id.'" value="'.$key->id.'">'.$key->descripcion.'</option>';
                                                        }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Nº de identificación</span>
                                                <div class="pf-field">
                                                    <input id="datos_per_n_identificacion" value="<?php echo $up_id;?>" name="id" type="text" placeholder="" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Estado civil</span>
                                                <div class="pf-field">
                                                    <select id="edo_civil" name="edo_civil" name="sexo" data-placeholder="Estado civil" class="chosen">
                                                        <option value="4">Seleccionar</option>
                                                        <?php foreach ($edo as $key) {
                                                        echo '<option id="edo_civil_'.$key->id.'" value="'.$key->id.'">'.$key->descripcion.'</option>';
                                                        }?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-4">
                                                <span class="pf-title">Discapacidad</span>
                                                <div class="pf-field">
                                                    <select id="discapacidad" name="discapacidad" data-placeholder="Allow In Search" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                        <?php foreach ($discapacidad as $key) {
                                                        echo '<option id="discapacidad_'.$key->id.'" value="'.$key->id.'">'.$key->descripcion.'</option>';
                                                        }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Sexo</span>
                                                <div class="pf-field">
                                                    <select id="sexo" name="sexo" data-placeholder="Allow In Search" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                        <?php foreach ($generos as $key) {
                                                        echo '<option id="sexo_'.$key->id.'" value="'.$key->id.'">'.$key->descripcion.'</option>';
                                                        }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Fecha de nacimiento</span>
                                                <div class="pf-field">
                                                    <input id="datos_per_fecha_nac" value="<?php echo $up_fecha;?>" name="fecha_nac" type="date" placeholder="" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Hijos</span>
                                                <div class="pf-field">
                                                    <select id="hijos" name="hijos" data-placeholder="Allow In Search" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                        <option id="hijos_0" value="0">Sin hijos</option>
                                                        <option id="hijos_1" value="1">1</option>
                                                        <option id="hijos_2" value="2">2</option>
                                                        <option id="hijos_3" value="3">3</option>
                                                        <option id="hijos_4" value="4">4</option>
                                                        <option id="hijos_5" value="5">5</option>
                                                        <option id="hijos_6" value="6">+</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Nacionalidad</span>
                                                <div class="pf-field">
                                                    <select id="nacionalidad" name="nacionalidad" data-placeholder="Allow In Search" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                        <?php foreach ($paises as $key) {
                                                        echo '<option id="nacionalidad_'.$key->id.'" value="'.$key->id.'">'.$key->nacionalidad.'</option> ';
                                                        }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Cuil</span>
                                                <div class="pf-field">
                                                     <input id="datos_per_cuil" value="<?php echo $up_cuil;?>" name="datos_per_cuil" type="text" placeholder="Cuil" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <span class="pf-title">¿Cómo te describes?</span>
                                                <div class="pf-field">
                                                    <textarea id="datos_per_descripcion" name="sobremi"><?php echo trim($up_desc);?></textarea>
                                                </div>
                                            </div>
                                            
                                           

                                        </div>
                                         <div class="col-lg-12">
                                                <button type="button" onClick="datos_per_validar()">Guardar</button>

                                            </div>
                                    </form>
                                    <div class="social-edit">
                                        <h3>Preferencias laborales</h3>
                                        <form id="form_preferencias_lab" method="POST" action="../../admincandipreflab">
                                            <input type="hidden" name="_token" value="<?php echo $mi_tokken;?>">
                                            <input type="hidden" name="admin_control" value="1">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <span class="pf-title">Remuneración</span>
                                                    <div class="pf-field">
                                                        <select id="remuneracion"  name="remuneracion" data-placeholder="Allow In Search" class="chosen">
                                                            <option value="">Seleccionar</option>
                                                            <?php
                                                            foreach ($salarios as $key) {
                                                            echo'<option value="'.$key->id.'">'.$key->salario.'</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <span class="pf-title">Jornada</span>
                                                    <div class="pf-field">
                                                        <select id="jorna" name="jornada" data-placeholder="Allow In Search" class="chosen">
                                                            <option value="">Seleccionar</option>
                                                            <?php
                                                            foreach ($disponibilidad as $key) {
                                                            echo'<option value="'.$key->id.'">'.$key->nombre.'</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <span class="pf-title">Cargos pretendidos</span>
                                                    <div class="pf-field">
                                                        <select id="cbn_cargos" onChange="set_cargo(this.value,this.id,'categorias_cargos',1)" name="cargos" data-placeholder="Allow In Search" class="chosen">
                                                            <option value="">Seleccionar</option>
                                                            <?php
                                                            foreach ($cargos as $key) {
                                                            echo'<option value="'.$key->id.'">'.$key->descripcion.'</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                    <div class="social-edit" style="margin-bottom: 0px;margin-top: 15px;">
                                                        
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <style type="text/css">
                                                                .addedTag span
                                                                {
                                                                margin-bottom: 20px;
                                                                }
                                                                </style>
                                                                <div class="pf-field no-margin" style="margin-top: 10px;">
                                                                    <ul class="tags" id="categorias_cargos">
                                                                        
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <button type="button" onClick="preferencias_lab_validar()">Guardar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php
                                $facebook="";
                                $instagram="";
                                $twitter="";
                                $linkendin="";
                                foreach ($redes as $key ) {
                                if($key->id_red_social=="1"){$facebook=$key->red_social;}
                                if($key->id_red_social=="3"){$instagram=$key->red_social;}
                                if($key->id_red_social=="5"){$linkendin=$key->red_social;}
                                if($key->id_red_social=="2"){$twitter=$key->red_social;}
                                }
                                ?>
                                <div class="social-edit">
                                    <h3>Redes sociales</h3>
                                    <form action="../../admincandiredescrear" method="post" id="form_candiredescrear">
                                        <input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
                                        <input type="hidden" name="pagina" value="perfil">
                                        <input type="hidden" name="admin_control" value="1">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <span class="pf-title">Facebook</span>
                                                <div class="pf-field">
                                                    <input id="facebook" name="facebook" type="text" placeholder="Facebook" value="<?php echo $facebook;?>" />
                                                    <i class="fa fa-facebook"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Twitter</span>
                                                <div class="pf-field">
                                                    <input  id="twitter" name="twitter" value="<?php echo $twitter;?>" type="text" placeholder="Twitter" />
                                                    <i class="fa fa-twitter"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Instragram</span>
                                                <div class="pf-field">
                                                    <input  id="instagram" name="instagram" value="<?php echo $instagram;?>" type="text" placeholder="Instragram" />
                                                    <i class="la la-instagram"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="pf-title">Linkedin</span>
                                                <div class="pf-field">
                                                    <input  id="linkendin" name="linkendin" value="<?php echo $linkendin;?>" type="text" placeholder="linkedin" />
                                                    <i class="la la-linkedin"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="button" onclick="redes_validar()">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="contact-edit">
                                    <h3>Información de contacto</h3>
                                    <form id="form_contact" action="../../admincandicontac" method="post">
                                        <input type="hidden"  name="_token" value="<?php echo $mi_tokken;?>">
                                        <input type="hidden" name="admin_control" value="1">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <span class="pf-title">Teléfono</span>
                                                <div class="pf-field">
                                                    <input id="telefono" value="<?php echo $up_telefono_contac;?>" name="telefono" type="text" placeholder="+90 538 963 58 96" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Correo</span>
                                                <div class="pf-field">
                                                    <input id="correo" value="<?php echo $up_correo_contac;?>" name="correo" type="text" placeholder="demo@jobbers.com" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Sitio Web</span>
                                                <div class="pf-field">
                                                    <input id="sitio_web" value="<?php echo $up_sitio_contac;?>" name="web" type="text" placeholder="www.jobbers.com" />
                                                </div>
                                            </div>
                                            <div class="row" style="background-color: #f3f3f3;border:1px solid #2e3192;padding: 15px;">
                                                <div class="col-lg-12 text-center" style="font-weight: 600;">
                                                      Dirección de domicilio  
                                                </div>
                                                <div class="col-lg-4">
                                                <span class="pf-title">País</span>
                                                <div class="pf-field">
                                                    <select id="pais_contac" name="pais" data-placeholder="Please Select Specialism" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                        <option value="10">Argentina</option>
                                                        <?php
                                                        //foreach ($paises as $key) {
                                                        //echo '<option value="'.$key->id.'">'.$key->descripcion.'</option>';
                                                        //}
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Provincia</span>
                                                <div class="pf-field">
                                                    <select id="provincia_contac" name="provincia" data-placeholder="Please Select Specialism" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                        <?php
                                                        foreach ($provincias as $key) {
                                                        echo '<option value="'.$key->id.'">'.$key->provincia.'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <span class="pf-title">Localidad</span>
                                                <div class="pf-field">
                                                    <select id="localidad_contac" name="localidad" data-placeholder="Please Select Specialism" class="chosen">
                                                        <option value="">Seleccionar</option>
                                                        <?php
                                                        foreach ($localidades as $key) {
                                                        echo '<option value="'.$key->id.'">'.$key->localidad.'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" style="">
                                                <span class="pf-title">Dirección</span>
                                                <div class="pf-field">
                                                    <input  id="direccion" value="<?php echo $up_direccion_contac;?>" name="direccion" type="text" placeholder="Buenos Aires, Argentina" />
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-lg-3">
                                                
                                                <div class="pf-field">
                                                    <input  id="latitud" value="<?php echo $up_latitud_contac;?>" name="latitud" type="hidden" placeholder="41.1589654" />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                               
                                                <div class="pf-field">
                                                    <input  id="longitud" value="<?php echo $up_longitud_contac;?>" name="longitud" type="hidden" placeholder="21.1589654" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="button" onClick="contac_validar()">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                                
                                <div class="padding-left" style="margin-bottom: 100px;margin-top: -50px;">
                                    <div class="manage-jobs-sec">
                                        <div class="border-title"><h3>Educación</h3>
                                            <a href="#" title="" data-toggle="modal" data-target="#modal_educ_cand" onClick="limpiar_mod_educ()">
                                            <i class="la la-plus"></i> Agregar estudios</a></div>
                                            <?php foreach ($educacion as $key): ?>
                                            <input type="hidden" id="estudios" value="<?php echo $key->id_area_estudio;?>" />
                                            <input type="hidden" id="nivel_es" value="<?php echo $key->id_nivel_estudio;?>" />
                                            <input type="hidden" id="pais" value="<?php echo $key->id_pais;?>" />
                                            <input type="hidden" id="titulo_" value="<?php echo $key->titulo;?>" />
                                            
                                            <div class="edu-history-sec">
                                                <div class="edu-history">
                                                    <i class="la la-graduation-cap"></i>
                                                    <div class="edu-hisinfo">
                                                        <h3 id="universidad_<?php echo $key->id;?>"><?php echo $key->nombre_institucion;?></h3>
                                                        <i id="periodo_<?php echo $key->id;?>"><?php echo $key->desde;?></i>
                                                        <span><?php echo $key->titulo;?>
                                                            <i><?php echo $key->descripcion;?></i>
                                                            <i><?php echo $key->nivel;?></i>
                                                            <i><?php echo $key->estudios;?></i>
                                                        </span>
                                                        <p></p>
                                                    </div>
                                                    <ul class="action_job">
                                                        <li><span>Editar</span><a onClick="limpiar_mod_educ(<?php echo $key->id;?>),set_educacion(<?php echo $key->id;?>)" title=""><i class="la la-pencil"></i></a></li>
                                                        <li><span>Eliminar</span><a href="../../admincandidelestudios/<?php echo $key->id;?>?admin_control=true" title=""><i class="la la-trash-o"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <?php endforeach ?>
                                            <div class="border-title"><h3>Experiencia laboral</h3><a href="#" title=""  data-toggle="modal" data-target="#modal_educ_expe"><i class="la la-plus"></i> Agregar experiencia</a></div>
                                            <div class="edu-history-sec">
                                                <?php foreach ($experiencias as $key): 
                                                    if($key->hasta==""){$key->hasta="Trabajando actualmente";}
                                                ?>
                                                <input type="hidden" id="e_sector_<?php echo $key->id;?>" value="<?php echo $key->id_actividad_empresa;?>">
                                                <div class="edu-history style2">
                                                    <i></i>
                                                    <div class="edu-hisinfo">
                                                        <h3 id="e_empresa_<?php echo $key->id;?>"><?php echo $key->nombre_empresa;?></h3> <span><?php echo $key->sector;?></span></h3>
                                                        <i id="e_periodo_<?php echo $key->id;?>"><?php echo $key->desde;?> - <?php echo $key->hasta;?></i>
                                                        <i id="e_cargo_<?php echo $key->id;?>"><?php echo $key->cargo;?></i>
                                                        <p id="e_descripcion_<?php echo $key->id;?>"><?php echo $key->descripcion;?></p>
                                                    </div>
                                                    <ul class="action_job">
                                                        <li><span>Editar</span><a onClick="limpiar_mod_expe(<?php echo $key->id;?>),set_experiencia(<?php echo $key->id;?>)" title=""><i class="la la-pencil"></i></a></li>
                                                        <li><span>Eliminar</span><a href="../../admincandidelexpe/<?php echo $key->id;?>?admin_control=true" title=""><i class="la la-trash-o"></i></a></li>
                                                    </ul>
                                                </div>
                                                <?php endforeach ?>
                                                
                                            </div>
                                            
                                            <!--HAbilidadez-->
                                            <div class="border-title"><h3>Habilidades</h3> </div>
                                            <div class="social-edit" style="margin-bottom: 0px;">
                                                <form id="form_habilidades" method="POST" action="../../admincandisethabilidad">
                                                    <input type="hidden" name="_token" value="<?php echo $mi_tokken;?>">
                                                    <input type="hidden" name="admin_control" value="1">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="pf-field">
                                                                <select id="cbn_habilidad" onChange="set_cargo(this.value,this.id,'categorias_habilidad',1)" name="cargos" data-placeholder="Allow In Search" class="chosen">
                                                                    <option value="">Seleccionar</option>
                                                                    <?php
                                                                    foreach ($habilidades as $key) {
                                                                    echo'<option value="'.$key->id.'">'.$key->descripcion.'</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="social-edit" style="margin-bottom: 0px;margin-top: 15px;">
                                                                
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <style type="text/css">
                                                                        .addedTag span
                                                                        {
                                                                        margin-bottom: 20px;
                                                                        }
                                                                        </style>
                                                                        <div class="pf-field no-margin" style="margin-top: 10px;">
                                                                            <ul class="tags" id="categorias_habilidad">
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button  type="submit">Guardar</button>
                                                </form>
                                                
                                            </div>
                                            <div class="progress-sec" style="margin-bottom: 0px;">
                                           
                                                <div class="col-lg-12">
                                                    <div class="social-edit">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Idiomas-->
                                        <div class="border-title"><h3>Idiomas</h3> </div>
                                            <div class="social-edit" style="margin-bottom: 0px;">
                                                <form id="form_idiomas" method="POST" action="../../admincandisetidioma">
                                                    <input type="hidden" name="_token" value="<?php echo $mi_tokken;?>">
                                                    <input type="hidden" name="admin_control" value="1">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="pf-field">
                                                                <select id="cbn_idioma" onChange="set_cargo(this.value,this.id,'categorias_idioma',1)" name="cargos" data-placeholder="Allow In Search" class="chosen">
                                                                    <option value="">Seleccionar</option>
                                                                    <?php
                                                                    foreach ($idiomas as $key) {
                                                                    echo'<option value="'.$key->id.'">'.$key->descripcion.'</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="social-edit" style="margin-bottom: 0px;margin-top: 15px;">
                                                                
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <style type="text/css">
                                                                        .addedTag span
                                                                        {
                                                                        margin-bottom: 20px;
                                                                        }
                                                                        </style>
                                                                        <div class="pf-field no-margin" style="margin-top: 10px;">
                                                                            <ul class="tags" id="categorias_idioma">
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button   type="submit">Guardar</button>
                                                </form> 
                                            </div> 
                                        </div>
                                    </div> 
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
    <script src="../../local/resources/views/js/select-chosen.js" type="text/javascript"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="../../local/resources/views/plugins/notify.js" type="text/javascript"></script> 
    <script type="text/javascript">
    
    //Funciones
    function set_select(id,valor)
    {
    $("#"+id).val(valor);
    $("#"+id).trigger('chosen:updated');
    }
    function set_valor(id,valor)
    {
    $("#"+id).val(valor);
    $("#"+id).trigger('chosen:updated');
    }
    
    //Modal educacion
    function limpiar_mod_educ(id)
    {
    $("#tipo").val("1");
    $("#identificador").val(id);
    $("#nivel").val("");
    $("#desde_estudio").val("");
    $("#hasta").val("");
    $("#universidad").val("");
    $("#area_estudio").val("");
    $("#titulo_obtener").val("");
    $("#uni_pais").val("");
    $("#nivel").trigger('chosen:updated');
    $("#desde_estudio").trigger('chosen:updated');
    $("#hasta").trigger('chosen:updated');
    $("#area_estudio").trigger('chosen:updated');
    $("#uni_pais").trigger('chosen:updated');
    }
    function set_educacion(id)
    {
    $("#tipo").val("2");
    periodo=$("#periodo_"+id).html();
    periodos=periodo.split(" - ");
    $("#nivel").val($("#nivel_es").val());
    $("#desde_estudio").val(periodos[0]);
    $("#hasta").val(periodos[1]);
    $("#universidad").val($("#universidad_"+id).html());
    $("#area_estudio").val($("#estudios").val());
    $("#titulo_obtener").val($("#titulo_").val());
    $("#uni_pais").val($("#pais").val());
    $("#nivel").trigger('chosen:updated');
    $("#desde_estudio").trigger('chosen:updated');
    $("#hasta").trigger('chosen:updated');
    $("#area_estudio").trigger('chosen:updated');
    $("#uni_pais").trigger('chosen:updated');
    $("#modal_educ_cand").modal("show");
    }
    
    //Fin modal educacion
    //Modal experiancia laboral
    function limpiar_mod_expe(id)
    {
    $("#expe_tipo").val("1");
    $("#expe_identificador").val(id);
    $("#expe_sector").val("");
    $("#expe_desde").val("");
    $("#expe_hasta").val("");
    $("#expe_empresa").val("");
    $("#expe_cargo").val("");
    $("#expe_descripcion").val("");
    $("#expe_sector").trigger('chosen:updated');
    $("#expe_desde").trigger('chosen:updated');
    $("#expe_hasta").trigger('chosen:updated');
    }
    function set_experiencia(id)
    {
    $("#expe_tipo").val("2");
    periodo=$("#e_periodo_"+id).html();
    periodos=periodo.split(" - ");
    if(periodos[1]=="Trabajando actualmente")
    {
        $("#trabajando_act").prop( "checked", true );
        $("#expe_hasta").hide();

    }
    else
    {
        $("#trabajando_act").prop( "checked", false );
        $("#expe_hasta").show();
    }

    $("#expe_desde").val(periodos[0]);
    $("#expe_hasta").val(periodos[1]);
    $("#expe_sector").val($("#e_sector_"+id).val());
    $("#expe_empresa").val($("#e_empresa_"+id).html());
    $("#expe_cargo").val($("#e_cargo_"+id).html());
    $("#expe_descripcion").val($("#e_descripcion_"+id).html());
    $("#expe_sector").trigger('chosen:updated');
    $("#expe_desde").trigger('chosen:updated');
    $("#modal_educ_expe").modal("show");
    }
    
    //Fin modal experiancia laboral
    function set_cargo(valor,id,id_control,tipo)
    {
    texto="";
    if(tipo==1){texto=$("#"+id+" option:selected").text();}

    if(tipo==2){texto=id;}
    agregar=' <li  class="addedTag">'+texto+'<span onclick="$(this).parent().remove();" class="tagRemove">x</span><input type="hidden" name="cand_cargos[]" value="'+valor+'"></li>';
    $("#"+id_control).append(agregar);
    }

    
    </script>

    <script type="text/javascript">
    <?php echo "set_select('tipo_id',".$up_t_id.");";?>
    <?php echo "set_select('sexo',".$up_sexo.");";?>
    <?php echo "set_select('discapacidad',".$up_discapacidad.");";?>
    <?php echo "set_select('hijos',".$up_hijos.");";?>
    <?php echo "set_select('nacionalidad',".$up_nacionalidad.");";?>
    <?php echo "set_select('edo_civil',".$up_edo_civil.");";?>
    <?php echo "set_valor('remuneracion',".$up_remuneracion.");";?>
    <?php echo "set_valor('jorna',".$up_jornada.");";?>
    <?php echo "set_select('pais_contac',".$up_pais_contac.");";?>
    <?php echo "set_select('provincia_contac',".$up_provincia_contac.");";?>
    <?php echo "set_select('localidad_contac',".$up_localidad_contac.");";?>
    //Listado datos cargos
    </script>
    <?php
    foreach ($habilidades_listado as $key) {
    echo '<script>set_cargo("'.$key->id_habilidad.'","'.$key->descripcion.'","categorias_habilidad",2);</script>';
    }
    foreach ($cargos_lista as $key) {
    echo '<script>set_cargo("'.$key->id_cargo.'","'.$key->descripcion.'","categorias_cargos",2);</script>';
    }
     foreach ($idiomas_listado as $key) {
    echo '<script>set_cargo("'.$key->id_idioma.'","'.$key->descripcion.'","categorias_idioma",2);</script>';
    }
    ?>
  
    
<script type="text/javascript">
    function notificacion(mensaje)
    {
        $.notify(mensaje, {
          className:"info",
          globalPosition: "bottom right"
          });
    }

    //Validaciones datos personales.
   function datos_per_validar()
   {
        if($("#datos_per_nombres").val()==""){notificacion("Debe colocar su nombre.")}
        else if($("#datos_per_apellidos").val()==""){notificacion("Debe colocar su apellido.")}
        else if($("#tipo_id").val()==""){notificacion("Debe colocar su tipo de identifiación.")}
        else if($("#datos_per_n_identificacion").val()==""){notificacion("Debe colocar su número de identificación.")}
        else if($("#edo_civil").val()=="4"){notificacion("Debe colocar su estado civil.")}
        else if($("#discapacidad").val()==""){notificacion("Debe colocar si tiene alguna discapacidad.")}
        else if($("#sexo").val()==""){notificacion("Debe colocar su sexo.")}
        else if($("#datos_per_fecha_nac").val()==""){notificacion("Debe colocar su fecha de nacimiento.")} 
        else if($("#nacionalidad").val()==""){notificacion("Debe colocar su nacionalidad.")} 
        else if($("#hijos").val()==""){notificacion("Debe colocar si tiene hijos.")} 
        else if($("#datos_per_descripcion").val()==""){notificacion("Debe colocar tu descripción")} 
        else
        {
            $("#form_datos_per").submit();
        }
   }

    function preferencias_lab_validar()
   {
        if($("#remuneracion").val()==""){notificacion("Debe colocar la remuneración pretendida.")}
        else if($("#jorna").val()==""){notificacion("Debe colocar su jornada de preferencia.")}
        else if($("#cbn_cargo").val()==""){notificacion("Debe colocar su tipo de identifiación.")}
        
        else
        {
            $("#form_preferencias_lab").submit();
        }
   } 

   function redes_validar()
   {
     var band = true;

     // Validar link de facebook
     var fb = /^(https:\/\/((www.facebook)|(facebook)).com\/)[A-Za-z0-9.\-\_]+(\/)?$/;
     //Validar link de twitter
     var tw = /^(https:\/\/((www.twitter)|(twitter)).com\/)[A-Za-z0-9.\-\_]+(\/)?$/;
     //Validar link de Instagram
     var ig = /^(https:\/\/((www.instagram)|(instagram)).com\/)[A-Za-z0-9.\-\_]+(\/)?$/;
     //Validar link de perfil de Linkedin
     var lkd = /^(https:\/\/((www.linkedin)|(linkedin)).com\/in\/)[A-Za-z0-9.\-\_\/]+(\/)?$/;

     if ($('#facebook').val() != "") {
        if (!fb.test($('#facebook').val())) {
            notificacion("El formato del link es invalido. Si no posees Facebook deja el campo en blanco.");
            band = false;
        }
     }

     if ($('#twitter').val() != "") {
        if (!tw.test($('#twitter').val())) {
            notificacion("El formato del link es invalido. Si no posees Twitter deja el campo en blanco.");
            band = false;
        }
     }

     if ($('#instagram').val() != "") {
        if (!ig.test($('#instagram').val())) {
            notificacion("El formato del link es invalido. Si no posees Instagram deja el campo en blanco.");
            band = false;
        }
     }

     if ($('#linkendin').val() != "") {
        if (!lkd.test($('#linkendin').val())) {
            notificacion("El formato del link es invalido. Si no posees Linkedin deja el campo en blanco.");
            band = false;
        }
     }

     if (band) {
        $('#form_candiredescrear').submit();
     }
   }

     function contac_validar()
       {
            //Validar URL de sitio web
            var web = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \?=.-]*)*\/?$/;

            if($("#telefono").val()==""){notificacion("Debe colocar su número de teléfono.")}
            else if($("#correo").val()==""){notificacion("Debe colocar su correo.")} 
            else if($("#pais_contac").val()==""){notificacion("Debe colocar su país.")}
            else if($("#provincia_contac").val()==""){notificacion("Debe colocar su provincia.")} 
            else if($("#localidad_contac").val()==""){notificacion("Debe colocar su localidad.")} 
            else if($("#direccion").val()==""){notificacion("Debe colocar su dirección.")}  
             
            else
            {
                $("#form_contact").submit();
            }
       } 
    function form_estudios_validar()
       {
            if($("#nivel").val()==""){notificacion("Debe colocar el nivel de estudio.")}
            else if($("#desde_estudio").val()==""){notificacion("Debe colocar la fecha de inicio.")} 
            else if($("#hasta_estudio").val()==""){notificacion("Debe colocar la fecha de fin.")}
            else if($("#universidad").val()==""){notificacion("Debe colocar la universidad.")} 
            else if($("#titulo_obtener").val()==""){notificacion("Debe colocar el título que obtuvo.")} 
            else if($("#uni_pais").val()==""){notificacion("Debe colocar el país donde curso los estudios.")}
            else if($("#area_estudio").val()==""){notificacion("Debe colocar el area de estudio.")} 
            else
            {
                $("#form_estudios").submit();
            }
       } 
   function form_experiencia_validar()
       {
            if($("#expe_sector").val()==""){notificacion("Debe colocar el sector en el que trabajó.")}
            else if($("#expe_desde").val()==""){notificacion("Debe colocar la fecha de inicio.")}  
            else if($("#expe_empresa").val()==""){notificacion("Debe colocar el nombre de la empresa.")} 
            else if($("#expe_cargo").val()==""){notificacion("Debe colocar el cargo que ocupó.")}
            else if(!($("#trabajando_act").is(':checked')))
            {  
                           
                if($("#expe_hasta").val()=="")
                {
                    notificacion("Debe colocar la fecha de culminacion de la jornada.")
                }
                else
                {

                        $("#form_experiencia").submit();
                    
                }
            }
        
            else
            {
                $("#form_experiencia").submit();
            }
       } 
</script>

<script>
    
    function set_trab_act()
    {
        if($("#trabajando_act").is(':checked'))
        {
            
            $("#expe_hasta").show();
        }
        else
        { 
            $("#expe_hasta").val(''); 
            $("#expe_hasta").hide();

        }
         
    }
        
</script>
  <?php if (isset($_GET['result']) && $_GET['result']!=""): ?>

        <script>notificacion("<?php echo $_GET['result'];?>");</script>      
    <?php endif ?>


</body>
</html>