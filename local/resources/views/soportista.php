
<?php 
$mi_tokken = csrf_token();
?>
<!DOCTYPE html><html>
<head> 
<meta name="csrf-token" content="<?php  echo $mi_tokken;?>">
<script src="https://use.typekit.net/hoy3lrg.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<link rel="stylesheet" type="text/css" href="../local/resources/views/css/soporte.css" />
<?php include('local/resources/views/includes/google_analitycs.php');?>s
</head>
<body> 
<div id="frame">
    <div id="sidepanel">
        <div id="profile">
            <div class="wrap">
                <img style="background-color: #fff;" id="profile-img" src="../local/resources/views/images/soporte_jobbers.png" class="online" alt="" />
                <p>Soporte Jobbers</p>  
            </div>
        </div> 
        <div id="contacts">
            <ul>
            	 <?php $mi_foto="";?>
              <?php  foreach ($datos_soporte as $key):?>
              	<?php $mi_foto= $key->foto == null ? "../local/resources/views/images/avatar.jpg" : "../uploads/". $key->foto;?>
                  <li class="contact">
                    <div class="wrap" onClick="location.href ='../soportista/<?php  echo $key->codigo;?>'"> 
                        <img style="width: 40px;height: 40px;" src="<?php  echo $mi_foto;?>" alt="" />
                        <div class="meta">
                            <p class="name"><?php echo substr($key->titulo,0, 15);?>...</p>
                            <p class="preview"> </p>
                        </div>
                    </div>
                </li> 
              <?php endforeach ?> 
            </ul>
        </div>
        <?php echo'<script type="text/javascript">var foto_de_perfil="../uploads/'.$mi_foto.'";</script>';?>
    </div>
    <div class="content">
        <div class="contact-profile">  
            <a href="../salirsoportista" style="float: right;padding-right:10px;text-decoration: none;color: #383838;">Salir</a> 
   			 <a href="../inicio" style="float: right;padding-right:10px;text-decoration: none;color: #383838;"><?php echo session('soportista_nombre');?></a> 
   </div>
        <div class="messages" style="background-image: url(../local/resources/views/images/fondo_chat.jpg);">
            <ul id="identificador_mensajes">
            <?php
             $total_mensajes=0;
             $mi_codigo=0;
             $mi_id=0;
             if (count($datos_mensajes)>0): ?> 
              <?php  
               
              $mi_id=$tikect; 
              foreach ($datos_mensajes as $key): 
              $mensaje="sent";             
              $mi_codigo=$key->codigo;
              //$mi_id=$key->id;
              $imagen="";

              if ($key->nombre_aleatorio == null) {
                $imagen="../local/resources/views/images/avatar.jpg";
              } else {
                $imagen="../uploads/".$key->nombre_aleatorio;
              }
              
              if($key->id_tipo_mensaje==2)
              {
                $mensaje="replies";
                $imagen="../local/resources/views/images/soporte_jobbers.png";
              }
              ?> 
              <?php if ($key->id!=""): ?>
              	 <li class="<?php echo $mensaje;?>">
                    <img style="width: 25px;height: 25px;" src="<?php  echo $imagen;?>" alt="" />
                    <p><?php  echo $key->descripcion;?></p>
                </li>
               <?php $total_mensajes=$total_mensajes+1;?>
              <?php endif ?> 
              <?php   
             
              endforeach  ?>
           <?php endif ?>
            </ul>
        </div>
        <?php  if (count($datos_mensajes)>0): ?> 
        	 <div class="message-input">
            <div class="wrap">
            <input id="mensaje" type="text" placeholder="Mensaje..." />
            <!--<i class="fa fa-paperclip attachment" aria-hidden="true"></i>-->
            <button onclick="agregar_mensaje('<?= $mi_id ?>')" type="button" class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </div>
        </div>
        <?php endif ?>
       
    </div>
</div>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>

<script >$(".messages").animate({ scrollTop: $(document).height() }, "fast"); 
$("#profile-img").click(function() {
    $("#status-options").toggleClass("active");
});

$(".expand-button").click(function() {
  $("#profile").toggleClass("expanded");
    $("#contacts").toggleClass("expanded");
});

$("#status-options ul li").click(function() {
    $("#profile-img").removeClass();
    $("#status-online").removeClass("active");
    $("#status-away").removeClass("active");
    $("#status-busy").removeClass("active");
    $("#status-offline").removeClass("active");
    $(this).addClass("active");
    
    if($("#status-online").hasClass("active")) {
        $("#profile-img").addClass("online");
    } else if ($("#status-away").hasClass("active")) {
        $("#profile-img").addClass("away");
    } else if ($("#status-busy").hasClass("active")) {
        $("#profile-img").addClass("busy");
    } else if ($("#status-offline").hasClass("active")) {
        $("#profile-img").addClass("offline");
    } else {
        $("#profile-img").removeClass();
    };
    
    $("#status-options").removeClass("active");
}); 
//# sourceURL=pen.js
</script>
<input id="cantidad_mensajes" value="<?php  echo ($total_mensajes);?>" type="hidden" name="">
<audio   id="audio"   style="display: none;">
<source type="audio/wav" src="../local/resources/views/mp3/chat.mp3">
</audio>
<script type="text/javascript">
 
 mi_codigo = '<?php echo $mi_codigo;?>';
 mi_id = '<?php  echo $mi_id;?>'; 
function agregar_mensaje(mi_id)
{ 
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
  $.ajax({
    url: '../soportmensaje',
    type: 'POST', 
    data: {mensaje:$("#mensaje").val(),ticket:mi_id},
  })
  .done(function(data) {
    $("#mensaje").val(""); 
     desplazar();
  }) 
}

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    if($("#mensaje").val()!="")
    {
    	agregar_mensaje(mi_id);
    }
    return false;
  }
});
function add_mensaje(total_mensajes,mi_codigo)
{ 
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
  $.ajax({
    url: '../candimensajes_soporte',
    type: 'POST',
    dataType:'json', 
    data: {cantidad:total_mensajes,codigo:mi_codigo},
  })
  .done(function(data) {
     tipo_de_mensaje=0;
    var incrementar=0;
    $.each(data, function(datos,valor) { 
    	 tipo_de_mensaje=valor.id_tipo_mensaje;
       tipo_mensaje="replies";  
        imagen="../local/resources/views/images/soporte_jobbers.png";
       if(valor.id_tipo_mensaje==1)
       {
        tipo_mensaje="sent";
         imagen=foto_de_perfil;
       }
       mensaje='<li class="'+tipo_mensaje+'">'+
                      '<img style="width:25px;height:25px;" src="'+imagen+'" alt="" />'+
                      '<p>'+valor.mensaje+'</p>'+
                  '</li>';
      incrementar=incrementar+1;
      $("#identificador_mensajes").append(mensaje); 
    });  
  sumar=(parseInt(total_mensajes)+parseInt(incrementar));
  $("#cantidad_mensajes").val(sumar); 
  if(incrementar>0 && tipo_de_mensaje==1)
  {  
   $("#audio")[0].play(); 
  } 
  desplazar();
  }) 
}

function desplazar()
{  
    $(".messages").animate({ scrollTop: $('.messages')[0].scrollHeight}, 1000);
}

$(document).ready(function() { 
   setInterval('add_mensaje($("#cantidad_mensajes").val(),mi_codigo)', 2000);
   desplazar(); 
});


</script>
</body></html>