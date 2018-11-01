<?php
			$back="";
			if(isset($atras) && $atras==1)
			{
			$back="../";	
			} 

			?>
<header class="stick-top">
	<div class="menu-sec">
		<div class="container">
			<div class="logo">
			<div class="logo" style="background-color: #fff;padding-left: 25px;padding-right: 25px; border-radius: 10px;"><a href="inicio" title=""><img src="https://www.jobbersargentina.net/img/logo_d.png" style="width: 120px;" alt="Logo Jobbers" /></a></div>
				</div><!-- Logo -->
				<div class="my-profiles-sec">
					<?php $imagen_header = session()->get('cand_img') == null || session()->get('cand_img') == "" ? "local/resources/views/images/avatar.jpg" : "uploads/min/".session()->get('cand_img') ?>
					<span><img style=" width: 50px;height: 50px;" src="<?php echo $imagen_header;?>" alt="" /><?php echo session()->get('candidato');?><!--<i class="la la-bars"></i>--></span>
				</div>
				<div class="wishlist-dropsec">
					<!--<span><i class="la la-heart"></i><strong>3</strong></span>-->
					<div class="wishlist-dropdown">
						<ul class="scrollbar">
							<li>
								<div class="job-listing">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">Web Designer / Developer</a></h3>
										<span>Massimo Artemisis</span>
									</div>
									</div><!-- Job -->
								</li>
								<li>
									<div class="job-listing">
										<div class="job-title-sec">
											<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
											<h3><a href="#" title="">C Developer (Senior) C .Net</a></h3>
											<span>StarHealth</span>
										</div>
										</div><!-- Job -->
									</li>
									<li>
										<div class="job-listing">
											<div class="job-title-sec">
												<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
												<h3><a href="#" title="">Marketing Director</a></h3>
												<span>Tix Dog</span>
											</div>
											</div><!-- Job -->
										</li>
										<li>
											<div class="job-listing">
												<div class="job-title-sec">
													<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
													<h3><a href="#" title="">Web Designer / Developer</a></h3>
													<span>Massimo Artemisis</span>
												</div>
												</div><!-- Job -->
											</li>
											<li>
												<div class="job-listing">
													<div class="job-title-sec">
														<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
														<h3><a href="#" title="">Web Designer / Developer</a></h3>
														<span>Massimo Artemisis</span>
													</div>
													</div><!-- Job -->
												</li>
											</ul>
										</div>
									</div>
									<nav>
										
										</nav><!-- Menus -->
									</div>
								</div>
							</header>