<?php
$mi_tokken = csrf_token();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'local/resources/views/includes/referencias_top.php';?> 
        <link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
        <link rel="stylesheet" href="local/resources/views/css/icons.css">
        <link rel="stylesheet" href="local/resources/views/css/animate.min.css">
        <link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
        <link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
        <link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
        <link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
        <meta name="csrf-token" content="<?php echo $mi_tokken; ?>">
        <?php include('local/resources/views/includes/chat_soporte.php');?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php include('local/resources/views/includes/google_analitycs.php');?>
    </head>
    <body style="background: url(https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg)">
        <div class="theme-layout" id="scrollup">
            <!--Header responsive-->
            <?php include 'local/resources/views/includes/header_responsive_candidatos.php';?>
            <?php include 'local/resources/views/includes/header_candidatos.php';?>
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
            
            
            <section>
                <div class="block no-padding mt-75">
                    <div class="container">
                        <div class="row no-gape">
                            <?php include 'local/resources/views/includes/aside_candidatos.php';?>
                            <div class="col-lg-9 column">
                                <div class="padding-left">
                                    <div class="manage-jobs-sec addscroll">
                                        <h3>Mi perfil</h3>
                                    </div>
                                </div>
                               <div class="social-edit" style="padding: 0px;">  
                                    <form  id="form_datos_per"  action="addcv" method="POST" style="margin: 0px;"enctype="multipart/form-data">
                                           <input type="hidden" name="_token" value="<?php echo $mi_tokken;?>">
                                                <span class="pf-title">Adjuntar curriculum <span style="float: right;color: #00681d;text-decoration: underline;font-weight: 600;"><a target="_black" href="reporte/<?php echo session()->get('cand_id');?>">Mi curriculum Jobbers</a></span></span>

                                                <div class="pf-field">
                                                   <input name="documento" id="documento" type="file" placeholder="" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                                </div> 
                                                <button type="submit" onClick="">Guardar</button>

                                    </form>
                                    
                                </div> 
                                <div class="text-center">
                                    <a style="display: none;" id="usando_jobbers" href="cvjobbers"><img style="" src="local/resources/views/images/sin_usar.jpg"></a>
                                    <a target="_blank" style="display: none;" id="sin_usar_jobbers" href="reporte/<?php echo session()->get('cand_id');?>"><img style="" src="local/resources/views/images/usando.jpg"></a>
                                </div>
                            
                                <div class="padding-left">
                                    <div class="manage-jobs-sec addscroll">
                                        <h3>Mis curriculums</h3>
                                    </div>
                                </div>
                                <div class="manage-jobs-sec addscroll">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td style="width: 60%;">Alias</td>
                                                <td style="width: 10%;">Formato</td>
                                                <td  style="width: 10%;">Mostrar</td> 
                                                <td  style="width: 10%;">Eliminar</td>
                                            </tr>
                                        </thead>

                                        <tbody>
                                           
                                           <?php
                                           $contador=0;
                                           $mostrar="";
                                            foreach ($datos as $key): ?>
                                             <?php
                                             if($key->mostrar=="1" && $mostrar=="")
                                             {
                                                $mostrar="1";
                                             }
                                             if($key->mostrar=="1"){$key->mostrar="checked";}else{$key->mostrar="";
                                             } 
                                             $contador++;
                                                if($key->alias==""){$key->alias="Curriculum (".$contador.")";}
                                                ?>
                                                <tr>
                                               <td><?php echo $key->alias;?></td>
                                                <td><?php echo $key->extension;?></td>
                                                <td><div class="form-check">
                                                    <input <?php echo $key->mostrar;?> onClick="set_cv_up(<?php echo $key->id;?>)" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1_<?php echo $key->id;?>" value="option1">
                                                    <label class="form-check-label" for="exampleRadios1_<?php echo $key->id;?>">
                                                    </label>
                                                </div></td>
                                                <td class="text-center"><a href="candidelcv/<?php echo $key->id;?>"><i class="la la-trash"></i></a></td>
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
    <form id="form_cv_update" action="candiselectsv" method="POST">
        <input type="hidden" name="_token" value="<?php echo $mi_tokken;?>">
         <input id="cvupiden" type="hidden" name="cv" value="">       
    </form>
    <?php include "local/resources/views/includes/general_footer.php";?>
    <script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script> 
    <script src="local/resources/views/js/script.js" type="text/javascript"></script> 
    <script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script> 
    <?php include "local/resources/views/includes/referencias_down.php";?>
    
    <script type="text/javascript">
     
    function set_cv_up(id)
    { 
    $("#cvupiden").val(id);
    $("#form_cv_update").submit();
    }

    </script>
 <?php if ($mostrar=="1"): ?>
    <script>
         $("#usando_jobbers").show();
         $("#sin_usar_jobbers").hide();
    </script>
     <?php endif ?>
     <?php if ($mostrar==""): ?>
     <script>
      $("#usando_jobbers").hide();
         $("#sin_usar_jobbers").show();
     </script>
    <?php endif ?> 
</body>
</html>