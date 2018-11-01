<?php
			$back="";
			if(isset($atras) && $atras==1)
			{
				$back="../";
			}
?>
	<header class="stick-top">
		<div class="menu-sec" style="margin-top: 18px;">
			<div class="container">
				<div class="logo" style="background-color: rgba(255,255,255,0.5);padding-left: 25px;padding-right: 25px;">
					<a href="inicio" title="">
						<img src="https://www.jobbersargentina.net/img/logo_d.png" style="width: 120px;">
					</a>
				</div>
				<!-- Menus -->
			</div>
		</div>
	</header>
	<section class="overlape" style="padding: 0px; background-color: #2E3192">
		<div class="block no-padding">
			<!-- <div data-velocity="-.1" style="background: url(<?php echo $back;?>local/resources/views/images/fondo_panel_noticias.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax" style="padding: 0px;height: 100px;"></div> -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header" style="height:100px;padding:0px;padding-top: 30px;">
							<h3 style="font-size: 26px;font-weight: 300;">
								<?php echo session()->get('nombre');?>
							</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>