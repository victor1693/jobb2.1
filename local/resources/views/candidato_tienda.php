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
                                        <h3>Tienda Jobbers</h3>
                                    </div>
                                    <div class="text-center" style="padding-top: 200px;">
                                        <img src="local/resources/views/images/jobbers_shop.png">
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
        
    </body>
</html>