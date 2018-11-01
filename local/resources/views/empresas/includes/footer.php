
<input id="ruta_general" type="hidden" name="" value="<?= Request::root();?>/token">
 <!-- ////////////////////////////////////////////////////////////////////////////-->
    <footer class="footer footer-static footer-light navbar-border text-center" style="bottom:0;position: fixed;width: 100%;text-align: center;margin-top: 30px;">
        <div style="margin-left: -200px;">
            2018 - Jobbers Argentina - Todos los derechos reservados
        </div>
    </footer>
    <script src="<?= $ruta;?>app-assets/js/core/libraries/jquery.min.js" type="text/javascript">
    </script>
    <script src="<?= $ruta;?>app-assets/vendors/js/ui/tether.min.js" type="text/javascript">
    </script>
    <script src="<?= $ruta;?>app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript">
    </script>
    <script src="<?= $ruta;?>app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript">
    </script>
    <script src="<?= $ruta;?>app-assets/vendors/js/ui/unison.min.js" type="text/javascript">
    </script>
    <script src="<?= $ruta;?>app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript">
    </script>
    <script src="<?= $ruta;?>app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript">
    </script>
    <script src="<?= $ruta;?>app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript">
    </script>
    <script src="<?= $ruta;?>app-assets/vendors/js/extensions/pace.min.js" type="text/javascript">
    </script>
    <script src="<?= $ruta;?>app-assets/js/core/app-menu.js" type="text/javascript">
    </script>
    <script src="<?= $ruta;?>app-assets/js/core/app.js" type="text/javascript">
    </script>
    <script src="<?= $ruta;?>assets/js/notify.min.js" type="text/javascript"></script>
    <script> 
         function token() { 
            $.ajax({
                url: $("#ruta_general").val(),
                type: 'get', 
                success: function(response) {
                 $('meta[name="csrf-token"]').attr('content',response);
                
                },
                error: function(error) {
                    //$.notify("Ocurrió un error al procesar la solicitud.");
                }
            });
        } 
       
    </script>
    