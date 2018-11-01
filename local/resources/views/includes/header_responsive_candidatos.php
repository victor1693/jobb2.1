<?php 
$back="";
if(isset($atras) && $atras==1)
{
$back="../administrator_candidatos_ver.php";	
}  
?>

<div class="responsive-header">
	<div class="responsive-menubar">
		<div class="res-logo" style="background-color: #fff;padding-left: 25px;padding-right: 25px; border-radius: 10px;"><a href="inicio" title=""><img src="https://www.jobbersargentina.net/img/logo_d.png" alt="Logo Jobbers" /></a></div>		<div class="menu-resaction">
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
					<a href="<?= $back ?>candidashboard" title="" class="my-panel">Mi panel</a>
				<?php elseif (session()->get('tipo_usuario')==1): ?>
					<a href="#" title="" class="my-panel">Mi panel</a>
				<?php endif; ?>
			<?php endif; ?>
			 </div>
			
			<div class="responsivemenu res-menu-cand" style="margin-top: 10px;">
				<div class="widget">
					<div class="tree_widget-sec">
						<ul>
							<li><a href="candidashboard" title="" style="font-weight: 600;"><i class="la la-dashboard active color-icon"> </i>Inicio</a></li>
							<!--<li><a href="candifavoritos" title=""><i class="la la-heart" ></i>Mis favoritos</a></li>-->
							<li  >
								<a href="ofertas" title="" style="font-weight: 600;"><i class="la la-user-md" ></i>Ofertas</a>
							</li>
							<li >
								<a href="empresas" title="" style="font-weight: 600;"><i class="la la-industry" ></i>Empresas</a>
							</li>
							<li >
								<a href="candipostulaciones" title="" style="font-weight: 600;"><i class="la la-clipboard" ></i>Postulaciones</a>
							</li>
							<!--<li >
								<a href="candidato/<?php //echo session()->get('cand_id');?>" title=""><i class="la la-user" ></i>Mi perfil</a>
							</li>-->
							<li >
								<a href="candiperfil" title="" style="font-weight: 600;"><i class="la la-user" ></i>Mi información</a>
							</li>
							<li >
								<a style="font-weight: 600;" href="<?php echo Request::root().'/candiperfil#cvjobbers';?>" title=""><i class="la la-file-text" ></i>Mi CV Jobbers</a>
							</li>
							<!--<li >
								<a href="candicv" title=""><i class="la la-file-text" ></i>Adjuntar curriculum</a>
							</li>-->
							<li >
								<a href="candiempseg" title="" style="font-weight: 600;"><i class="la la-industry" ></i>Empresas seguidas</a>
							</li> 
							
							<li >
								<a href="canditienda" title="" style="font-weight: 600;"><i class="la la-cart-arrow-down" ></i>Tienda</a>
							</li>
							<li >
								<a href="candirecomendaciones" title="" style="font-weight: 600;"><i class="la la-check" ></i>Recomendaciones</a>
							</li>
							<li >
								<a href="candiredes" title="" style="font-weight: 600;"><i class="la la-facebook" ></i>Mis redes</a>
							</li>
							<!--<li><a href="candimaletin" title=""><i class="fa fa-briefcase" ></i>Mi Maletín</a></li>-->
							<li >
								<a href="noticias" title="" style="font-weight: 600;"><i class="fa fa-newspaper-o" ></i>Noticias</a>
							</li>
							<li><a href="candiconfiguracion" title="" style="font-weight: 600;"><i class="la la-gear" ></i>Configuración</a></li>
							<!--<li><a href="#" title=""><i class="la la-money" ></i>Pagos</a></li> -->
							<li><a href="logout" title="" style="font-weight: 600;"><i class="la la-arrow-left" ></i>Salir</a></li>
						</ul>
					</div>
				</div> 	
			</div>
		</div>
	</div>