
<ul class="desk-1024">
	<!-- <li class="li-nav"> -->
	<li class="">
		<a href="<?= url('inicio') ?>" title="">Inicio&nbsp;&nbsp;&nbsp;|</a>
		<!-- <a href="<?//= url('inicio') ?>" class="a-nav" title="">Inicio</a> -->
	</li>
	<li class="">
		<a href="<?= url('ofertas') ?>" title="">&nbsp;&nbsp;&nbsp;Empleos&nbsp;&nbsp;&nbsp;|</a>
	</li>
	<li class="">
		<a href="<?= url('empresas') ?>" title="">&nbsp;&nbsp;&nbsp;Empresas&nbsp;&nbsp;&nbsp;|</a>
	</li>
	<?php if (session()->get("candidato") == null): ?>
	 
	<?php endif ?>
	<li class="">
		<a  href="<?= url('noticias') ?>" title="">&nbsp;&nbsp;&nbsp;Noticias&nbsp;&nbsp;&nbsp;|</a>
	</li>
	<li class="">
		<a style="color:#fff;font-weight: 600;" href="<?= Request::root()?>/empresas/entrar" title="">&nbsp;&nbsp;&nbsp;Soy empresa</a>
	</li>
</ul>
<ul class="mobile-1024 mobile">
	<!-- <li class="li-nav"> -->
	<li class="">
		<a href="<?= url('inicio') ?>" title="">Inicio</a>
		<!-- <a href="<?//= url('inicio') ?>" class="a-nav" title="">Inicio</a> -->
	</li>
	<li class="">
		<a href="<?= url('ofertas') ?>" title="">Empleos</a>
	</li>
	<li class="">
		<a href="<?= url('empresas') ?>" title="">Empresas</a>
	</li>
	<?php if (session()->get("candidato") == null): ?>
	 
	<?php endif ?>
	<li class="">
		<a href="<?= url('noticias') ?>" title="">Noticias</a>
	</li>
</ul>



