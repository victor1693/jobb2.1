<!DOCTYPE html>
<html>
    <head>
        <title>
            Pagar
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" rel="stylesheet"/>
        <script crossorigin="anonymous" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
        </script>
         <script type="text/javascript">
                (function(){function $MPC_load(){window.$MPC_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = document.location.protocol+"//secure.mlstatic.com/mptools/render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPC_loaded = true;})();}window.$MPC_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPC_load) : window.addEventListener('load', $MPC_load, false)) : null;})();
            </script>
    </head>
    <body>
        <h4 style="text-align: center;font-family: calibri">
            Si funciona
        </h4>
        <button onclick="pagar()" class="btn btn-primary" id="payMP">Realizar Pago <i class="fa fa-money"></i></button>

        <script>

        function pagar()
        {
        	 

			$.ajax({
			    type: 'get',
			    url: 'pago',
			    data: {
			        
			    },
			    dataType: 'json',
			    success: function(data) {
			        console.log(data);
			        //$("#payMP").attr("data-v", data.data.response.init_point);
			        $("#payMP").attr("data-v", data.data.response.sandbox_init_point);  
			            $MPC.openCheckout({
			                url: $("#payMP").attr("data-v"),
			                mode: "modal",
			                onreturn: function(data) {
			                    console.log(data);
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

        console.log("Pago Acreditado.", {
            className: "success",
            globalPosition: "bottom center"
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '../pagos/update',
            data: 'plan=' + plan + '&transaction=' + JSON.stringify(json),
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
</html>