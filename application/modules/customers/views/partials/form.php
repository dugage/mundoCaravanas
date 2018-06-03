<form method="post" class="m-form">

	<div class="m-portlet__body">

		<?= validation_errors(); ?>

		<div class="form-group m-form__group">

			<label for="name">
				Nombre:
			</label>

			<input name="name" value="<?= (isset( $id )) ? $getResult->getName() : set_value('name') ?>" class="form-control m-input" placeholder="Introduce el nombre del cliente" type="text">

		</div>

		<div class="form-group m-form__group">

			<label for="surname">
				Apellidos:
			</label>

			<input name="surname" value="<?= (isset( $id )) ? $getResult->getSurname() : set_value('surname') ?>" class="form-control m-input" placeholder="Introduce los apellidos del cliente" type="text">

		</div>

		<div class="form-group m-form__group">

			<label for="nif">
				NIF:
			</label>

			<input name="nif" value="<?= (isset( $id )) ? $getResult->getNif() : set_value('nif') ?>" class="form-control m-input" placeholder="Ejem. 00000000S" type="text">

		</div>

		<div class="form-group m-form__group">

			<label for="phone_primary">
				Teléfono:
			</label>

			<input name="phone_primary" value="<?= (isset( $id )) ? $getResult->getPhonePrimary() : set_value('phone_primary') ?>" class="form-control m-input" placeholder="Ejem.000000000" type="text">

		</div>

		<div class="form-group m-form__group">

			<label for="phone_second">
				Teléfono secundario:
			</label>

			<input name="phone_second" value="<?= (isset( $id )) ? $getResult->getPhoneSecond() : set_value('phone_second') ?>" class="form-control m-input" placeholder="Ejem.000000000" type="text">

		</div>

		<div class="form-group m-form__group">

			<label for="email">
				Email:
			</label>

			<input name="email" value="<?= (isset( $id )) ? $getResult->getEmail() : set_value('email') ?>" class="form-control m-input" placeholder="" type="text">

		</div>

		<div class="form-group m-form__group">

			<label for="address">
				Dirección:
			</label>

			<input name="address" value="<?= (isset( $id )) ? $getResult->getAddress() : set_value('address') ?>" class="form-control m-input" placeholder="Ejem. c/. Agua, 23 - Sevilla" type="text">

		</div>

		<div class="form-group m-form__group">

			<label for="zip">
				CP:
			</label>

			<input name="zip" value="<?= (isset( $id )) ? $getResult->getZip() : set_value('zip') ?>" class="form-control m-input" placeholder="Ejem. 00000" type="text">

		</div>

		<div class="form-group m-form__group">

			<label for="EntranceRegister">
				Alta en puerta:
			</label>

			<input name="EntranceRegister" value="<?= (isset( $id )) ? $getResult->getEntranceRegister() : set_value('EntranceRegister') ?>" class="form-control m-input" placeholder="Un número de 0-1000" type="text">

		</div>

		<div class="form-group m-form__group">

			<label class="m-checkbox">

				<input name="state" value="1" <?= (isset( $id )) ? ( $getResult->getState() == 1 ) ? 'checked' : ''  : 'checked'  ?> type="checkbox">Estado<span></span>

			</label>

		</div>


	</div>

	<div class="m-portlet__foot m-portlet__foot--fit">

		<div class="m-form__actions m-form__actions">

			<button name="submit-form" type="submit" class="btn btn-primary"><i class="la la-floppy-o"></i> Guardar</button>
			
			<?php if( isset( $id ) ): ?>

				<a href="<?= site_url('clientes') ?>" class="btn btn-secondary"><i class="la la-angle-left"></i> Volver</a>

			<?php endif ?>

		</div>


	</div>

</form>