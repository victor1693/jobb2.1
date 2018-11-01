<script type="text/javascript">
         function listar_archivos() {
         
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             $.ajax({
                 url: 'listar_arch',
                 type: 'post',
                 datatype: "json",
                 success: function(data) {
                     tabla = "";
                     iconosImagen='';
                     usarComo='';
                     nombre='';
                     url='';
                     $.each(JSON.parse(data), function(i, datos) {
                     url='<img src="local/resources/views/images/files/' + datos["extencion"] + '.png">';
                        if( datos["tipo_documento"]=="Imagen")
                         {
                            iconosImagen='<li><span>Ver</span><a href="#" title=""><i class="la la-eye"></i></ a></li><li><span>Ajustar</span><a href="#" title=""><i class="la la-cog"></i></a></li>';
                            usarComo='<span class="status"><a class="" style="text-decoration: underline;" data-toggle="modal" data-target="#modal_usar_como">Usar cómo</a></span>';
                            url='<img style="max-width:128px;max-height:128px;" src="uploads/min/'+datos["nombre_aleatorio"]+'">';
                             

                         }

                         if(datos["alias"]=="")
                         {
                            nombre=datos["archivo"];
                         }
                         else
                         {
                            nombre=datos["alias"];
                         }
                         tabla = tabla + '<tr><td><div class="emply-resume-thumb">'+url+'</div></td><td><div class="table-list-title"><h3><a href="#" title="">' + nombre + '</a></h3></div></td><td><span class="status active">' + datos["tipo_documento"] + '</span></td> <td style="text-align:right;"><ul class="action_job">'+iconosImagen+'<li><li><span>Nuevo alias</span><a data-toggle="modal" data-target="#modal_alias" href="#" title=""><i class="la la-pencil" onClick="set_id('+datos["id"]+')"></i></a></li><li><span>Descargar</span><a href="descargar/'+datos["nombre_aleatorio"]+'" target="_blank" title=""><i class="la la-arrow-down"></i></a></li><li><span>Eliminar</span><a href="delarchivo/'+datos["id"]+'" title=""><i class="la la-trash-o"></i></a></li></ul></td></tr>';
         
                     });
         
                     $("#tabla_archivos").html(tabla);
                 }
             })
         }

         function set_id(id)
         {
            $("#id_alias").val(id);
         } 
</script>