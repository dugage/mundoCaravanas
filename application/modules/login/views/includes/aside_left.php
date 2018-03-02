<div class="m-login__signin">

	<div class="m-login__head">

		<h3 class="m-login__title">
			Accede al panel de control
		</h3>

	</div>

	<form class="m-login__form m-form" method="post">

		<?= validation_errors(); ?>

			<?= $msn; ?>

		<div class="form-group m-form__group">

			<input class="form-control m-input" type="text" placeholder="Email" name="email" autocomplete="off">

		</div>

		<div class="form-group m-form__group">

			<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">

		</div>

		<div class="row m-login__form-sub">

			<div class="col m--align-right">

				<a href="javascript:;" id="m_login_forget_password" class="m-link">
					Recuperar acceso a tu cuenta
				</a>

			</div>

		</div>

		<div class="m-login__form-action">

			<button name="submitLogin" id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
				Acceder
			</button>

		</div>

	</form>

</div>

<div class="m-login__forget-password">

	<div class="m-login__head">

		<h3 class="m-login__title">
			¿Has olvidado tu contraseña?
		</h3>
		<div class="m-login__desc">
			Introduce tu email para generar una nueva contraseña:
		</div>
	</div>

	<form class="m-login__form m-form" method="post" action="<?= site_url('login/passwordRecovery') ?>">

		<div class="form-group m-form__group">

			<input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">

		</div>

		<div class="m-login__form-action">

			<button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
				Recuperar
			</button>

			<button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom">
				Cancelar
			</button>

		</div>

	</form>

</div>