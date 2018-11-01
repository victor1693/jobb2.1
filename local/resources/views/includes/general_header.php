<?php
$back="";
if(isset($atras) && $atras==1)
{
$back="../";	
} 
?>
<header class="stick-top" style="position: fixed;">
	<div class="menu-sec">
		<div class="container">
			<div class="logo" style="background-color: #fff;padding-left: 25px;padding-right: 25px; border-radius: 10px;">
				<a href="<?= url('inicio') ?>" title=""><img style="width: 120px;" class="hidesticky" src="https://www.jobbersargentina.net/img/logo_d.png" alt="" /><img style="width: 120px;" class="showsticky" src="https://www.jobbersargentina.net/img/logo_d.png" alt="" /></a>
				</div><!-- Logo -->
				<div class="btn-extars">
					<!-- Btn Extras -->
					 <nav style="float: left">

					 	<?php include("local/resources/views/includes/menus_publicos.php");?>
					 		
					 </nav>
 
					 <?php if(session()->get('tipo_usuario')==2 || session()->get('tipo_usuario')== 1): ?>
					 	<?php if(session()->get('tipo_usuario')==2): ?> 
					 	
					 		<a href="<?= url('candidashboard') ?>" title="" class="my-panel">Mi panel</a>
					 	<?php elseif (session()->get('tipo_usuario')==1): ?>
					 	
					 		<a href="<?= url('empresa/new_post') ?>" title="" class="my-panel" style="margin-right: 5px" >Publicar oferta</a>
					 		<a href="<?= url('empresa/ofertas') ?>" title="" class="my-panel">Mi panel</a>
					 	<?php endif; ?>
					 	
					<?php else: ?>
					 	<ul class="account-btns">
					 		<li onclick="location.href='<?php echo Request::root()?>/registrar'"><a title=""><i class="la la-key"></i>Registrar</a></li> 
					 		<li onclick="location.href='<?php echo Request::root()?>/login'"><a title="#"><i class="la la-external-link-square"></i>Ingresar</a></li>
					 	</ul> 
					 <?php endif; ?>
					 	</div>
					</div>
				</div>
			</header>