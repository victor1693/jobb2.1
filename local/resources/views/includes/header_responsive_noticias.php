<?php  

$dir = '';
if ($_SERVER["SERVER_NAME"] == "localhost") {
	$dir = "/jobbers2.0";
} else {
	$dir = "/jobbersv2";
}

$back="";
if(isset($atras) && $atras==1)
{
$back="../administrator_candidatos_ver.php";	
} 

?>
<div class="responsive-header">
	<div class="responsive-menubar">
		<div class="res-logo" style="background-color: rgba(255,255,255,0.5);padding-left: 25px;padding-right: 25px;">
			<a href="<?php echo $back;?>" title="">
				<img src="https://www.jobbersargentina.net/img/logo_d.png" alt="Logo Jobbers" />
			</a>
		</div>
		<div class="menu-resaction">
			<div class="res-openmenu">
				<img src="<?= $dir ?>/local/resources/views/images/icon.png" alt="" /> Menú
			</div>
			<div class="res-closemenu">
				<img src="<?= $dir ?>/local/resources/views/images/icon2.png" alt="" /> Cerrar
			</div>
		</div>
	</div>
	<div class="responsive-opensec">
		<!-- Btn Extras -->
		<div class="responsivemenu">
			<ul>
				<li>
					<a href="<?php echo $back;?>panelnoticias" title="">
						<i class="la la-dashboard active"></i>Publicar</a>
				</li>
				<li>
					<a href="<?php echo $back;?>notipublicaciones" title="">
						<i class="la la-industry"></i>Publicaciones</a>
				</li>
				<li>
					<a href="<?php echo $back;?>noticategorias" title="">
						<i class="la la-group"></i>Categorias</a>
				</li>
				<li>
					<a href="<?php echo $back;?>noticias" title="">
						<i class="la la-file-text"></i>Ver noticias</a>
				</li>
				<li>
					<a href="<?php echo $back;?>redactoressalir" title="">
						<i class="la la-arrow-left"></i>Salir</a>
				</li>
			</ul>
		</div>
	</div>
</div>