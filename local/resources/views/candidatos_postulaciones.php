<!DOCTYPE html>
<html>
	<head>
		<?php include('local/resources/views/includes/referencias_top.php');?>
		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/bootstrap-grid.css" />
		<link rel="stylesheet" href="local/resources/views/css/icons.css">
		<link rel="stylesheet" href="local/resources/views/css/animate.min.css">
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/style.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/responsive.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/chosen.css" />
		<link rel="stylesheet" type="text/css" href="local/resources/views/css/colors/colors.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php include('local/resources/views/includes/chat_soporte.php');?>
		<?php include('local/resources/views/includes/google_analitycs.php');?>
	</head>
	<body style="background: url(https://cdn5.f-cdn.com/contestentries/1108779/15284413/5994ef1193f43_thumb900.jpg)">
		<div class="theme-layout" id="scrollup">
			
			<!--Header responsive-->
			<?php include('local/resources/views/includes/header_responsive_candidatos.php');?>
			<?php include('local/resources/views/includes/header_candidatos.php');?>
			<!--fin Header responsive-->
			
			<section >
				<div class="block no-padding mt-75">
					<div class="container">
						<div class="row no-gape">
							<?php include('local/resources/views/includes/aside_candidatos.php');?>
							<div class="col-lg-9 column" >
								<div class="padding-left">
									<div class="manage-jobs-sec addscroll">
										<h3>Mis Postulaciones</h3>
										<table>
											<thead>
												<tr>
													<td style="max-width: 300px;">Publicación</td>
													<td>Empresa</td>
													<td>Postulados</td>
													<td>Ver</td>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($datos as $key) {
													echo'<tr>
														<td style="max-width: 250px;">
																<div class="table-list-title">
																		<h3><a href="detalleoferta/'.$key->id.'" title="">'.$key->titulo.'</a></h3> 
																</div>
														</td>
														
														<td style="text-align:center;">
																<span class="applied-field">'.$key->nombre.'</span>
														</td>
														<td style="text-align:center;">
																<span style="text-align:center;" id="postu_'.$key->id.'" class="status active">'.$key->cantidad.'</span>
														</td>
														<td>
																<ul class="action_job">
																		<li><span>Ver publiación</span><a href="detalleoferta/'.$key->id.'" title=""><i class="la la-eye"></i></a></li>
																</ul>
														</td>
												</tr> ';
												};?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="view-resumesec">
			<div class="view-resumes">
				<span class="close-resume-popup"><i class="la la-close"></i></span>
				<h3>13 Times Viewed By 8 Companies.</h3>
				<div class="job-listing wtabs">
					<div class="job-title-sec">
						<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
						<h3><a href="#" title="">Web Designer / Developer</a></h3>
						<span>Massimo Artemisis</span>
						<div class="job-lctn">Sacramento, California</div>
					</div>
					<span class="date-resume">11.02.2017</span>
					</div><!-- Job -->
					<div class="job-listing wtabs">
						<div class="job-title-sec">
							<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
							<h3><a href="#" title="">C Developer (Senior) C .Net</a></h3>
							<span>Massimo Artemisis</span>
							<div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
						</div>
						<span class="date-resume">11.02.2017</span>
						</div><!-- Job -->
						<div class="job-listing wtabs">
							<div class="job-title-sec">
								<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
								<h3><a href="#" title="">Web Designer / Developer</a></h3>
								<span>Massimo Artemisis</span>
								<div class="job-lctn">Sacramento, California</div>
							</div>
							<span class="date-resume">11.02.2017</span>
							</div><!-- Job -->
							<div class="job-listing wtabs">
								<div class="job-title-sec">
									<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
									<h3><a href="#" title="">Web Designer / Developer</a></h3>
									<span>Massimo Artemisis</span>
									<div class="job-lctn">Sacramento, California</div>
								</div>
								<span class="date-resume">11.02.2017</span>
								</div><!-- Job -->
							</div>
						</div>
						<div class="follow-companiesec">
							<div class="follow-companies">
								<span class="close-follow-company"><i class="la la-close"></i></span>
								<h3>Follow Companies.</h3>
								<ul id="scrollbar">
									<li>
										<div class="job-listing wtabs">
											<div class="job-title-sec">
												<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
												<h3><a href="#" title="">Web Designer / Developer</a></h3>
												<div class="job-lctn">Sacramento, California</div>
											</div>
											<a href="#" title="" class="go-unfollow">Unfollow</a>
											</div><!-- Job -->
										</li>
										<li>
											<div class="job-listing wtabs">
												<div class="job-title-sec">
													<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
													<h3><a href="#" title="">Tix Dog</a></h3>
													<div class="job-lctn">Sacramento, California</div>
												</div>
												<a href="#" title="" class="go-unfollow">Unfollow</a>
												</div><!-- Job -->
											</li>
											<li>
												<div class="job-listing wtabs">
													<div class="job-title-sec">
														<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
														<h3><a href="#" title="">StarHealth</a></h3>
														<div class="job-lctn">Sacramento, California</div>
													</div>
													<a href="#" title="" class="go-unfollow">Unfollow</a>
													</div><!-- Job -->
												</li>
												<li>
													<div class="job-listing wtabs">
														<div class="job-title-sec">
															<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
															<h3><a href="#" title="">Altes Bank</a></h3>
															<div class="job-lctn">Sacramento, California</div>
														</div>
														<a href="#" title="" class="go-unfollow">Unfollow</a>
														</div><!-- Job -->
													</li>
													<li>
														<div class="job-listing wtabs">
															<div class="job-title-sec">
																<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
																<h3><a href="#" title="">StarHealth</a></h3>
																<div class="job-lctn">Sacramento, California</div>
															</div>
															<a href="#" title="" class="go-unfollow">Unfollow</a>
															</div><!-- Job -->
														</li>
														<li>
															<div class="job-listing wtabs">
																<div class="job-title-sec">
																	<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
																	<h3><a href="#" title="">Altes Bank</a></h3>
																	<div class="job-lctn">Sacramento, California</div>
																</div>
																<a href="#" title="" class="go-unfollow">Unfollow</a>
																</div><!-- Job -->
															</li>
														</ul>
													</div>
												</div>
												<?php include("local/resources/views/includes/general_footer.php");?>
												<script src="local/resources/views/js/jquery.min.js" type="text/javascript"></script>
												<script src="local/resources/views/js/modernizr.js" type="text/javascript"></script>
												<script src="local/resources/views/js/script.js" type="text/javascript"></script>
												<script src="local/resources/views/js/wow.min.js" type="text/javascript"></script>
												<script src="local/resources/views/js/slick.min.js" type="text/javascript"></script>
												<script src="local/resources/views/js/parallax.js" type="text/javascript"></script>
												<script src="local/resources/views/js/select-chosen.js" type="text/javascript"></script>
												<script src="local/resources/views/js/jquery.scrollbar.min.js" type="text/javascript"></script>
												<script src="local/resources/views/js/circle-progress.min.js" type="text/javascript"></script>
												 
											</body>
										</html>