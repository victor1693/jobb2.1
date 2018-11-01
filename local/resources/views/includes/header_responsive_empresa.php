<div class="responsive-header">
	<div class="responsive-menubar">
		<div class="res-logo" style="background-color: #fff;padding-left: 25px;padding-right: 25px; border-radius: 10px;"><a href="../inicio" title=""><img src="https://www.jobbersargentina.net/img/logo_d.png" alt="" /></a></div>
		<div class="menu-resaction">
			<div class="res-openmenu">
				<img src="../local/resources/views/images/icon.png" alt="" /> Menú
			</div>
			<div class="res-closemenu">
				<img src="../local/resources/views/images/icon2.png" alt="" /> Cerrar
			</div>
		</div>
	</div>
	<div class="responsive-opensec">
		<!-- <div class="btn-extars">
			<a href="#" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
			<ul class="account-btns">
				<li class="signup-popup"><a title=""><i class="la la-key"></i> Sign Up</a></li>
				<li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Login</a></li>
			</ul>
			</div>Btn Extras
			<form class="res-search">
				<input type="text" placeholder="Job title, keywords or company name" />
				<button type="submit"><i class="la la-search"></i></button>
			</form> -->
			<div class="responsivemenu tree_widget-sec no-margin">
				<ul>
					<li class="no-margin">
						<a href="../inicio" title="" style="margin: 15px 0;"><i class="fa fa-home"></i>Inicio</a>
						<?php $nombre_plan = session()->get("emp_plan")[0]->nombre ?>
						<a href="planes" title="" style="margin: 15px 0;"><i class=" fa fa-certificate"></i>Plan: <?= strtoupper($nombre_plan); ?></a>
					</li>
					<li class="inner-child">
					<a href="#" title="Mi empresa"><i class="la la-file-text"></i>Mi empresa</a>
					<ul>
						<li onclick="location.href='detalle?e=<?= session()->get("emp_ide") ?>'"><a href="detalle?e=<?= session()->get("emp_ide") ?>" title="Mi Perfil">Mi Perfil</a></li>
						<li onclick="location.href='perfil?e=<?= session()->get("emp_ide") ?>'"><a href="perfil?e=<?= session()->get("emp_ide") ?>" title="Editar Perfil">Editar Perfil</a></li>
					</ul>
					</li>
					<li class="inner-child">
						<a href="#" title="Ofertas de Trabajo"><i class="la la-briefcase"></i>Oferta de trabajo</a>
						<ul>
							<li onclick="location.href='<?= url('empresa/ofertas') ?>'"><a href="<?= url('empresa/ofertas') ?>" title="Ver Ofertas de Trab.">Ver mis ofertas</a></li>
							<li onclick="location.href='<?= url('empresa/new_post') ?>'"><a href="<?= url('empresa/new_post') ?>" title="Nueva Oferta de Trab.">Nueva oferta</a></li>
							<li onclick="location.href='<?= url('empresa/plantillas') ?>'"><a href="<?= url('empresa/plantillas') ?>" title="Nueva Oferta de Trab.">Mis plantillas</a></li>
						</ul>
					</li>
					<?php if (session()->get('emp_plan')[0]->id_plan == 2): ?>
					<li class="inner-child">
						<a href="#" title="Cursos"><i class="la la-university"></i>Cursos</a>
						<ul>
							<li onclick="location.href='<?= url('empresa/cursos') ?>'"><a href="<?= url('empresa/cursos') ?>" title="Mis cursos">Mis cursos</a></li>
							<li onclick="location.href='<?= url('empresa/new_curso') ?>'"><a href="<?= url('empresa/new_curso') ?>" title="Nuevo curso">Nuevo curso</a></li>
						</ul>
					</li>
					<?php endif; ?>
					<li class="inner-child">
						<a href="#" title="Planes"><i class="la la-trophy"></i>Planes</a>
						<ul>
							<li onclick="location.href='planes'"><a href="planes" title="Manejar Planes">Manejar Planes</a></li>
						</ul>
					</li>
					<li><a href="../candidatos" title=""><i class="la la-users"></i>Candidatos</a></li>
					<li onclick="location.href='../logout'"><a href="../logout" title=""><i class="la la-unlink"></i>Salir</a></li>
				</ul>
			</div>
		</div>
	</div>