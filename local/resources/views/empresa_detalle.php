<!DOCTYPE html>
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <title>
            Jobbers Argentina
        </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="keywords"/>
        <meta content="CreativeLayers" name="author"/>
        <!-- Styles -->
        <link href="../../local/resources/views/css/bootstrap-grid.css" rel="stylesheet" type="text/css"/>
        <link href="../../local/resources/views/css/icons.css" rel="stylesheet"/>
        <link href="../../local/resources/views/css/animate.min.css" rel="stylesheet"/>
        <link href="../../local/resources/views/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="../../local/resources/views/css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="../../local/resources/views/css/chosen.css" rel="stylesheet" type="text/css"/>
        <link href="../../local/resources/views/css/colors/colors.css" rel="stylesheet" type="text/css"/>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
        <style type="text/css">
            .job-details ul > li 
         	{
         		margin-bottom: 0px;
         		font-weight: 700;
         	}
         	.job-details ul > li >span
         	{
         		 
         		font-weight: 400;
         	}
         	.degradado
         	{
         		background: rgba(255,255,255,1);
				background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
				background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,1)), color-stop(47%, rgba(246,246,246,1)), color-stop(100%, rgba(237,237,237,1)));
				background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
				background: -o-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
				background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
				background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed', GradientType=0 );
         	}
         	.tag
         	{
         		background-color: #ffb203;
         		color: #fff;
         		border-radius: 3px;
         		 
         		padding-right: 4px;
         		padding-left: 4px;
         		margin-left: 5px;
         	}
            .postulado
            {
                background-color: #ffb203;
            }
        </style>
        <?php include('local/resources/views/includes/google_analitycs.php');?>
    </head>
</html>
<body>
    <?php include('local/resources/views/includes/general_header.php');?>
    <?php include('local/resources/views/includes/general_header_responsive.php');?>

<div class="theme-layout pt-offer" id="scrollup">
    <section style="background-color: #eeeeee;margin-top: -25px;">
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 column" style="background-color: #fff;padding-top: 15px;border: 1px solid #ddd;">
                        <div class="job-single-sec">
                            <div class="job-single-head degradado" style="border: 1px dashed #b2b2b2;padding: 4px;">
                                <div class="job-thumb">
                                	<?php if ($datos[0]->img_profile!=""): ?>
                                		<img style="height: 101px;width: 107px;" alt="" src="../../uploads/min/<?= $datos[0]->img_profile?>"/>
                                		<?php else: ?>
                                	 <img alt="" src="http://placehold.it/107x101"/>
                                	<?php endif ?>
                                    
                                </div>
                                <div class="job-head-info">
                                    <h4 style="margin-top: 6px;font-size: 28px;">
                                        <?= ucfirst(mb_strtolower($datos[0]->nombre));?>
                                    </h4>  
                                </div> 
                            </div>
                            <div class="job-overview divide"> 
                                    <ul>
                                        <li><i class="la la-industry"></i><h3>Sector </h3><span><?= $datos[0]->actividad_empresa?></span></li>
                                        <li><i class="la la-file-text"></i><h3>Oferta</h3><span><?=(count($ofertas));?></span></li>
                                        <li><i class="la la-map"></i><h3>Dirección</h3><span><?= $datos[0]->direccion?></span></li>
                                    </ul>
                                    <ul>
                                        <li><i class="la la-bars"></i><h3>Tipo</h3><span><?= $datos[0]->tipo_empresa?></span></li> 
                                        <li><i class="la la-users"></i><h3>Tamaño</h3><span><?= $datos[0]->tamano_empresa?></span></li>
                                    </ul> 
                                </div>
                            <!-- Job Head -->
                          <div class="job-details" > 
                          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- prueba 3 -->
                            <ins class="adsbygoogle"
                            style="display:block"
                            data-ad-client="ca-pub-1968505410020323"
                            data-ad-slot="2357238982"
                            data-ad-format="auto"
                            data-full-width-responsive="true"></ins>
                            <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                            
                          </div>
                            <div class="job-details" style="text-align: justify;"> 
                                 <div>
                                 	<p style="font-weight: 600;"></p>
                                 </div>
                                 <?php if ($datos[0]->descripcion!=""): ?>
                                   <h3>
                                    Descripción
                                </h3>
                                 <div>
                                     <p><?= $datos[0]->descripcion;?></p>
                                 </div>
                                 <?php endif ?> 
                            </div>
                            <?php if ($datos[0]->facebook!="" || $datos[0]->linkedin!="" || $datos[0]->twitter!=""): ?>
                                <div class="share-bar">
                                        <span>
                                            Redes
                                        </span>
                                        <?php if ($datos[0]->facebook!=""): ?>
                                            <a class="share-fb" href="<?= $datos[0]->facebook?>" title=""  target="_blank">
                                            <i class="fa fa-facebook">
                                            </i>
                                        </a>
                                        <?php endif ?>
                                        <?php if ($datos[0]->linkedin!=""): ?>
                                        <a class="share-linkedin" href="$datos[0]->linkedin?>" title=""  target="_blank">
                                            <i class="fa fa-linkedin">
                                            </i>
                                        </a>
                                          <?php endif ?>
                                        <?php if ($datos[0]->twitter!=""): ?>
                                        <a class="share-twitter" href="$datos[0]->twitter" title="" target="_blank">
                                            <i class="fa fa-twitter">
                                            </i>
                                        </a>
                                          <?php endif ?>
                                    </div>
                            <?php endif ?>
                            
                              <div class="recent-jobs">
                                <h3>
                                    Ofertas de <?= ucfirst(mb_strtolower($datos[0]->nombre));?>
                                </h3>
                                <div class="job-list-modern">
                                    <div class="job-listings-sec no-border" > 
                                        
                                            
                                                <?php if (count($ofertas)>0): ?> 
                                                <?php foreach ($ofertas as $key): ?>
                                                    <div class="job-listing wtabs" style="padding-top: 5px;padding-bottom: 5px;">
                                                <div class="job-title-sec"> 
                                                    <?php if ($datos[0]->img_profile!=""): ?>
                                                    <div class="c-logo">
                                                        <a href="../../detalleoferta/<?=$key->id;?>" title=""><img style="width: 100px;height: 100px;margin-right: 15px;" alt="" src="../../uploads/min/<?= $datos[0]->img_profile;?>"/></a>
                                                    </div>
                                                    <?php else: ?>
                                                    <div class="c-logo">
                                                        <a href="../../detalleoferta/<?=$key->id;?>" title=""><img style="margin-right: 15px;" alt="" src="http://placehold.it/98x51"/> </a>
                                                    </div>  
                                                    <?php endif ?> 
                                                    <h3>
                                                        <a href="../../detalleoferta/<?=$key->id;?>" title="">
                                                          <?= ucfirst(mb_strtolower($key->titulo))?>
                                                        </a>
                                                    </h3>
                                                    <span>
                                                      <?= ucfirst(mb_strtolower($key->sector))?>
                                                    </span><br>
                                                    <span>
                                                       <?= ucfirst(mb_strtolower($key->provincia.' '.$key->localidad))?>
                                                    </span>
                                                </div>
                                                <div class="job-style-bx">
                                                    <span class="job-is ft">
                                                      <?= $key->disponibilidad?>
                                                    </span> 
                                                    <i>
                                                     <?php if ($key->dias==0): ?>
                                                        Hoy
                                                    <?php endif ?>
                                                    <?php if($key->dias==1): ?>
                                                        Ayer
                                                    <?php endif ?>
                                                   <?php if($key->dias>1): ?>
                                                        Publicado el día <?= fecha($key->fecha_creacion);?>
                                                    <?php endif ?>
                                                    </i>
                                                </div>
                                                  </div>
                                                 <?php endforeach ?>
                                              <?php endif ?>
                                      
                                        
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-lg-4 column mt-md-0" style="background-image: url('../../local/resources/views/empresas/app-assets/images/logo/bg-1.png')"> 
                        
                        <div class="reviews-sec" id="reviews" style="background-color: #fff;padding-top: 25px;border: 1px solid #ddd;margin-bottom: 25px;">
                            <h5 style="text-align: center;">Empresas relacionadas</h5>
                            <?php 
                            $contador=1;
                            foreach ($new as $key): ?>
                                <?php if ($key->img_profile !="" && $contador<6): ?>
                                     <div class="col-lg-6">
                                        <div class="reviews style2" style="padding-left: 10px;padding-right: 10px;">
                                            <a href="<?= $key->id;?>"><img  style="width: 250px;height: 250px; border-radius: 1%;" src="../../uploads/min/<?= $key->img_profile;?>" alt="" />
                                            <h3 style="font-weight: 600;color: #000aff;margin-bottom: 0px;"><?=$key->nombre?><span><?=$key->actividad_empresa?></span></a>
                                                
                                            </h3>  
                                        </div><!-- Reviews -->
                                    </div> 
                                <?php 
                                $contador++;
                                endif ?>
                            <?php endforeach ?> 
                        </div> 

                          <div class="emply-list box contendor_empresa" style="padding-top: 10px; padding-right: 5px;padding-left: 5px;">
                                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <ins class="adsbygoogle"
                                style="display:block"
                                data-ad-format="fluid"
                                data-ad-layout-key="-6t+ed+2i-1n-4w"
                                data-ad-client="ca-pub-1968505410020323"
                                data-ad-slot="2571530788"></ins>
                                <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                              </div><!-- Employe List -->
                         <div style="background-color: #fff;text-align: center">
                                <div id="fb-root" style="text-align: center;margin: 0 auto;"></div>
                                    <script>(function(d, s, id) {
                                      var js, fjs = d.getElementsByTagName(s)[0];
                                      if (d.getElementById(id)) return;
                                      js = d.createElement(s); js.id = id;
                                      js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.1&appId=1480600512039518&autoLogAppEvents=1';
                                      fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));</script>

                                    <div class="fb-page" data-href="https://www.facebook.com/jobbersargentina" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/jobbersargentina" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/jobbersargentina">Jobbers</a></blockquote></div>
                                
                                    </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
 <?php include('local/resources/views/includes/general_footer.php');?>
<script src="../../local/resources/views/js/jquery.min.js" type="text/javascript">
</script>
<script src="../../local/resources/views/js/modernizr.js" type="text/javascript">
</script>
<script src="../../local/resources/views/js/script.js" type="text/javascript">
</script>
<script src="../../local/resources/views/js/wow.min.js" type="text/javascript">
</script>
<script src="../../local/resources/views/js/slick.min.js" type="text/javascript">
</script>
<script src="../../local/resources/views/js/parallax.js" type="text/javascript">
</script>
<script src="../../local/resources/views/js/select-chosen.js" type="text/javascript">
</script>
<script src="../../local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript">
</script>
<script src="../../local/resources/views/empresas/assets/js/notify.min.js" type="text/javascript"></script>
<script type="text/javascript">
      function aplicar(publicacion)
        {    
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                url: '../../candipostular',
                type: 'POST',
                dataType:'json',
                data: {id:publicacion},
                success: function(response) { 
                if(response=="session")
                {
                    $.notify("Debe iniciar sessión","info");
                }
                else if(response=='1')
                {
                    $(".btn-postular").addClass(' postulado');
                    $(".btn-postular").html('<i class="la la-check"></i> Postulado');
                     
                }               
                },
                error: function(error) {
                    $.notify("Ocurrió un error al procesar la solicitud.");
                }
            });
        }

        function postulado(){$.notify("Ya se encuentra postulado","info");}
        function session(){$.notify("Debe iniciar sesión","info");}
</script>
<?php
	function fecha($fecha)
	{
		$old = explode('-',$fecha);
		return $old[2]."-".$old[1]."-".$old[0];
	}
?>
</body>