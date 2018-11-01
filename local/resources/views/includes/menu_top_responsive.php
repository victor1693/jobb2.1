<?php  
$back="";
if(isset($atras) && $atras==1)
{
$back="../administrator_candidatos_ver.php";	
} 
?>
<!-- <div class="theme-layout" id="scrollup"> -->
	<div class="responsive-header">
		<div class="responsive-menubar">
		<div class="logo" style="background-color: #fff;padding-left: 25px;padding-right: 25px; border-radius: 10px;">
				<a href="<?= url('inicio') ?>" title=""><img style="width: 120px;" class="hidesticky" src="https://www.jobbersargentina.net/img/logo_d.png" alt="" /><img style="width: 120px;" class="showsticky" src="https://www.jobbersargentina.net/img/logo_d.png" alt="" /></a>
				</div>
			<div class="menu-resaction">
				<div class="res-openmenu">
					<img src="local/resources/views/images/icon.png" alt="" /> Menú
				</div>
				<div class="res-closemenu">
					<img src="local/resources/views/images/icon2.png" alt="" /> Cerrar
				</div>
			</div>
		</div>
		<div class="responsive-opensec">
			<div class="btn-extars">
				<?php if (session()->get('tipo_usuario')==2 || session()->get('tipo_usuario')== 1): ?>
					<?php if (session()->get('tipo_usuario')==2): ?>
						<a href="<?= $back ?>candidashboard" title="" class="post-job-btn"><i class="la la-plus"></i>Mi panel</a>
					<?php elseif (session()->get('tipo_usuario')==1): ?>
						<a href="empresa/ofertas" title="" class="post-job-btn"><i class="la la-plus"></i>Mi panel</a>
					<?php endif; ?>
				<?php else: ?>
					<ul class="account-btns pull-left">
						<li class="signup-popup"><a title=""><i class="la la-key"></i> Registrar</a></li>
						<li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Ingresar</a></li>
					</ul>
				<?php endif; ?>
				</div><!--Btn Extras -->
				
				<div class="responsivemenu">
					<?php include("local/resources/views/includes/menus_publicos.php");?> 
						
				</div>
			</div>
		</div>