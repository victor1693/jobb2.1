<div class="account-popup-area signin-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="la la-close"></i></span>
		<h3>Jobbers Argentina</h3>
		<form action="<?= url('loguear') ?>" method="POST">
			<div class="cfield">
				<input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
				<input type="text" placeholder="Correo" name="correo" />
				<i class="la la-user"></i>
			</div>
			<div class="cfield">
				<input type="password" placeholder="********" name="pass" />
				<i class="la la-eye" style="cursor: pointer;" onclick="show_hide(this)" title="Mostrar"></i>
			</div>
			<p class="remember-label">
			</p>
			<a href="recuperarclave" title="">Olvidé mi clave</a>

			<button type="submit">Entrar</button>
			<a class="signup-popup" href="#" title="">Registrarme</a>			
		</form>
		<div class="extra-login">
			<span>Entrar con</span>
		 	<div class="login-social">
					<a class="fb-login" href="<?php echo url('redes/facebook') ?>" title=""><i class="fa fa-facebook"></i></a>
					<a class="tw-login" href="<?php echo url('redes/linkedin') ?>" title=""><i class="fa fa-linkedin"></i></a>
					<a class="go-login" href="<?php echo url('redes/google') ?>" title=""><i class="fa fa-google"></i></a>
			</div>
		</div>
	</div>
	</div><!-- LOGIN POPUP -->
	<div class="account-popup-area signup-popup-box">
		<div class="account-popup">
			<span class="close-popup"><i class="la la-close"></i></span>
			<h3>Registrarme</h3>
			<div class="select-user">
				<span onClick="set_tipo(2)">Candidato</span>
				<span onClick="set_tipo(1)">Empresa</span>
			</div>
			<form action="<?= url('register') ?>" method="POST" id="form_register">
				<input name="_token" type="hidden" value="<?php echo csrf_token();?>" id="my_token">
				<input id="tipo" name="tipo" type="hidden" value="">
				<div class="cfield">
					<input name="correo" id="correo" type="email" placeholder="Correo" />
					<i class="la la-envelope-o"></i>
				</div>
				<div class="cfield">
					<input name="correo2" id="correo2" type="email" placeholder="Confirmar correo" />
					<i class="la la-at"></i>
				</div>
				<div class="cfield">
					<input name="clave" id="clave" type="password" placeholder="Contraseña" />
					<i class="la la-eye" style="cursor: pointer;" onclick="show_hide(this)" title="Mostrar"></i>
				</div>
				<div class="cfield">
					<input name="clave2" id="clave2" type="password" placeholder="Confirmar contraseña" />
					<i class="la la-lock"></i>
				</div>
				<div class="simple-checkbox">
				  <p><input type="checkbox" name="condiciones" id="condiciones"><label for="condiciones">Acepto <a href="terminos" style="color: #10c9e5">términos, condiciones y políticas de privacidad</a>.</label></p>
				</div>
				<p id="error" style="color: red; display: none"></p>
				<button type="button" onclick="registrar()">Registrarme</button>
			</form>
			<div class="extra-login">
				<span>Entrar con</span>
			<div class="login-social">
					<a class="fb-login" href="<?= url('redes/facebook') ?>" title=""><i class="fa fa-facebook"></i></a>
					<a class="tw-login" href="<?= url('redes/linkedin') ?>" title=""><i class="fa fa-linkedin"></i></a>
					<a class="go-login" href="<?= url('redes/google') ?>" title=""><i class="fa fa-google"></i></a>
			</div>
			</div>
		</div>
		</div><!-- SIGNUP POPUP -->
		<script type="text/javascript">

			function show_hide(btn)
			{
				var $btn = $(btn);

				if ($btn.hasClass('la-eye')) {
					$btn.removeClass('la-eye')
						.addClass('la-eye-slash')
						.attr('title', 'Mostrar');
					$('input[name="clave"],input[name="pass"]').attr('type', 'text');
				} else {
					$btn.removeClass('la-eye-slash')
						.addClass('la-eye')
						.attr('title', 'Ocultar');
					$('input[name="clave"],input[name="pass"]').attr('type', 'password');
				}
			}

			function set_tipo(tipo)
			{
				$("#tipo").val(tipo);
			}

			function registrar()
			{
				var correo = isEmail($('#correo').val());
				var correo2 = isEmail($('#correo2').val());
				$('#error').hide();

				if ($('#correo').val() != "" && $('#clave').val() != "") {
					if (correo && correo2) {
						if ($('#clave').val().length >= 8 && $('#clave').val().length <= 12) {

							if ($('#condiciones').is(':checked')) {

								if ($('#tipo').val() != "") {
									
									if ($('#correo').val() == $('#correo2').val()) {

										if ($('#clave').val() == $('#clave2').val()) {

											$.ajaxSetup({
												headers: {
												'X-CSRF-TOKEN': $('#my_token').val()
												}
											});
											$.ajax({
												url: 'existEmail',
												type: 'POST',
												dataType: 'json',
												data: {correo: $('#correo').val()},
												success: function(response) {
													if (response.data == 1) {
														$('#error').html('<i class="la la-close"></i> Correo electrónico en uso intente de nuevo').show();
													} else {
														$('#form_register').submit();
														// console.log("registrado");
													}
												},
												error: function (error) {
													$('#error').html('<i class="la la-close"></i> Ha ocurrido un error inesperado. Por for intentelo de nuevo').show();
												}
											});
										} else {
											$('#error').html('<i class="la la-close"></i> Las contraseñas no coinciden.').show();
										}
									} else {
										$('#error').html('<i class="la la-close"></i> Los correos electronicos no coinciden.').show();
									}
								} else {
									$('#error').html('<i class="la la-close"></i> Debes seleccionar un rol para poder registrarte.').show();
								}
							} else {
								$('#error').html('<i class="la la-close"></i> Debes aceptar los términos, políticas y condiciones para continuar con el registro').show();
							}

						} else {
							$('#error').html('<i class="la la-close"></i> La contraseña debe contener entre 8 y 12 caracteres').show();
						}
					} else {
						$('#error').html('<i class="la la-close"></i> Correo Electronico no valido').show();
					}
				} else {
					$('#error').html('<i class="la la-close"></i> Has dejado campos vacios').show();
				}

				
			}

			function isEmail(email) {
			  var regex = /^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
			  return regex.test(email);
			}

		</script>