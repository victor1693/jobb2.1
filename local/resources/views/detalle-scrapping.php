<?php
$mi_tokken=csrf_token();
?>
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
        <meta content="<?php echo $mi_tokken;?>" name="csrf-token"/> 
         <link rel="stylesheet" type="text/css" href="../local/resources/views/css/chosen.css" />
        <link href="../local/resources/views/css/bootstrap-grid.css" rel="stylesheet" type="text/css"/>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="../local/resources/views/css/icons.css" rel="stylesheet"/>
        <link <link="" href="../local/resources/views/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="../local/resources/views/css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="../local/resources/views/css/colors/colors.css" rel="stylesheet" type="text/css"/> 
        <?php include('local/resources/views/includes/google_analitycs.php');?>
        <style>
          .ofertas-externas
          {
            min-height: 130px;
          }

        </style>
    </head>
</html>
<body>
    <?php include('local/resources/views/includes/general_header.php');?>
    <?php include('local/resources/views/includes/general_header_responsive.php');?> 
           
    <section class="section-offers" style="overflow-y: hidden;">
        <div class="block no-padding back-offers" style="background-image: url(https://saenz-si.com/templates/saenz-si/img/fondo-aniversario.png)">
                <div class="container"> 
                    <div class="job-listings-tabs">
                  <div class="row" style="padding-top: 50px;"> 
                    <div class="col-lg-12">
                      <form action="../ofertas-de-empleo" method="get">
                        <h1 style="font-size: 28px;text-align: center;">Seguir Buscando 
                        </h1> 
                       <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-0"> 
                        </div>
                          <div class="col-sm-5"  style="padding: 0px;">
                            <div class="pf-field" style="text-align: center;">
                                    <input name="buscar" value="" style="border: 1px solid #c4c4c4;" id="buscador_1" type="text" placeholder="Buscar... Consultor, programador, analísta..."> 
                            </div>
                         </div>
                         <div class="col-sm-1"  style="padding: 0px;">
                            <button type="submit" class="btn btn-lg btn-warning" style="margin-top: 0px;height: 49px;">Buscar</button>
                         </div>
                          <div class="col-lg-2 col-md-2 col-sm-0"> 
                        </div>
                       </div>
                      </form>
                    </div>


                    <div class="col-lg-9">

                       <div class="job-listing wtabs " style="padding: 0px;">
                         <div style="min-height: 130px;background-image: url('https://www.sintec.com/wp-content/uploads/2014/06/Blog_propuesta-valor.jpg');border-top-left-radius: 8px;border-top-right-radius: 8px;">
                              
                            </div>
                            <div class="col-lg-12" style="text-align: center;margin-top: -60px;"> 
                              <img style="border:3px solid #fff; border-radius: 50%; width: 100px;height: 100px;margin-right: 15px;margin-top: 10px;" src="<?= $datos[0]->img;?>" alt="">
                             <div style="margin-left: -10px;">
                                <span><?= ($datos[0]->empresa);?></span>
                              </div> 
                             </div>
                          <div class="ofertas-externas" style="padding: 15px;"> 
                            <div class="col-sm-12" style="margin-bottom: 25px;margin-top: 25px;">
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
                             <h1 style="font-weight: 600;margin-bottom: 5px; font-size: 16px;font-weight: 600; text-decoration: underline !important; color: #0099ff;"><a href="#" title=""><?= ($datos[0]->titulo);?></a></h1>
                              <h3 style="font-size: 12px;margin-bottom: 5px;font-weight: 500"><?= ($datos[0]->provincia);?> > <?= ($datos[0]->localidad);?></h3> 
                            
                             <h2 style="font-size: 14px;text-align: justify;"><?= ($datos[0]->descripcion);?></h2> 
                          </div> 
                         <div style="text-align: center;padding-bottom: 25px;">
                            <a class="btn btn-success" href="<?= $datos[0]->url;?>" style="font-size: 14px;margin: 0 auto;" type="button">Postularme ahora</a> 
                         </div>
 
                         <div class="row">
                            <div class="col-lg-12">
                              <?php if (count($ofertas)>0): ?>
                                  <h3 style="text-align: center;margin-top: 15px;margin-bottom: 20px;font-weight: 600;">
                                     Más ofertas de <?= ($datos[0]->empresa);?>
                                   </h3>
                                   <div class="col-sm-12" style="margin-bottom: 25px;margin-top: 25px;">
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
                                <?php foreach ($ofertas as $key): ?>
                                    <div class="col-lg-12">
                                     <div class="job-listing wtabs ">
                                        <div class="ofertas-externas">
                                           <div class="c-logo"> <img style="width: 100px;height: 100px;margin-right: 15px;" src="<?= ($key->img);?>" alt="">
                                           <div>
                                              <span style="font-weight: 600;font-size: 14px;"><?= ($key->empresa);?></span>
                                            </div> 
                                           </div>
                                           <h1 style="font-weight: 600;margin-bottom: 5px; font-size: 16px;font-weight: 600; text-decoration: underline !important; color: #0099ff;"><a href="<?= (utf8_decode($key->amigable));?>" title=""><?= ($key->titulo);?></a></h1>
                                            <h3 style="font-size: 12px;margin-bottom: 5px;font-weight: 500"><?= ($key->provincia);?> > localidad</h3>       
                                           <h2 style="font-size: 14px;"> 
                                            <?php
                                              $descripcion= substr($key->descripcion,0,150);
                                              echo  strip_tags(($descripcion)) .'...';
                                              ?>    
                                            </h2>

                                        <div class="job-style-bx" style="margin-top: 0px;">
                                           <button onclick="location.href='<?= (utf8_decode($key->amigable));?>'" style="font-size: 14px; float: right;" class="btn btn-primary" type="button">Ver oferta</button> 
                                        </div>

                                        </div> 
                                     </div>
                                     <!-- Job --> 
                                  </div>
                                <?php endforeach ?>
                              <?php endif ?> 
                  
                    </div>
                         </div>
                       </div>
                    </div>
                    <div class="col-lg-3" style="padding:0px;">
                       <div class="col-sm-12" style="margin-top: 30px;padding: 0px;">
                          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <ins class="adsbygoogle"
                                style="display:block;height: 120px;"
                                data-ad-format="fluid"
                                data-ad-layout-key="-6t+ed+2i-1n-4w"
                                data-ad-client="ca-pub-1968505410020323"
                                data-ad-slot="2571530788"></ins>
                                <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                                </script> 
                       </div>
                       <div class="job-listing wtabs " style="text-align: center;padding: 10px;margin-top: -15px;">
                       <a href="../registrar" title=""><img src="../local/resources/views/images/descarga-cv-2.jpg"> </a>
                       </div> 
                    </div> 
 
                  </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <?php include('local/resources/views/includes/general_footer.php');?>
    <script src="../local/resources/views/js/jquery.min.js" type="text/javascript">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    <script src="../local/resources/views/js/modernizr.js" type="text/javascript">
    </script>
    <script src="../local/resources/views/js/script.js" type="text/javascript">
    </script> 
    <script src="../local/resources/views/js/select-chosen.js" type="text/javascript"></script> 
</body>
