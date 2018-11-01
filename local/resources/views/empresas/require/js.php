<script>
	function validar_r(par)
	{
		if($("#"+par).val()=="")
		{
			$.notify("Debe completar el campo", "info");
			$("#"+par).focus();
			return false;
		}
		else
			{return true;}
	} 
	function validar_correo(par)
	{
		 var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/; 
	    if (regex.test($('#'+par).val().trim())) {
	    	return true;
	    } else {
	        $.notify("El correo no es válido", "error");
	        $("#"+par).focus();
	        return false;
	    }
	} 

	function validar_clave(par)
	{
		 clave = $("#"+par).val()
		 if(clave.length < 8)
		 { 
		 	 $.notify("La clave debe contener 8 caracteres como mínimo.", "info");
		 	 $("#"+par).focus();
		 	 return false;
		 }
		 else {return true};
	} 

	 function set_select(par,valor)
     {
     	  $("#"+par).val(valor);
     }

     $("#provincia" ).change(function() {
             set_localidad();
     });

     function set_localidad()
     {
     	 if($("#provincia").val()=="")
               {
                    $("#localidad").html('');
                    $("#localidad").append('<option value="">Localidad</option>');return 0;
               }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'localidades',
                    type: 'POST',
                    data: {provincia:$("#provincia").val()},
                    dataType: 'json',
                    success: function(response) {
                    $("#localidad").html('');
                    $("#localidad").append('<option value="">Localidad</option>');
                    var JSONArray = jQuery.parseJSON(JSON.stringify(response));
                     jQuery.each(JSONArray, function(index, dato) {
                        $("#localidad").append('<option value="'+dato.localidad+'">'+dato.localidad+'</option>');
                    });
                    },
                    error: function(error) {
                        $.notify("Ocurrió un error al procesar la solicitud.");
                    }
                });
     } 
	
</script>

