<form action="<?= site_url("customers/setVehicle/".$id) ?>" method="post" class="m-form">

		<?= validation_errors(); ?>


	<div class="form-group m-form__group">

		<label for="exampleSelect1">Tipo de vehículo: <span style="color:red;">*</span></label>

		<select name="vehicle_types" class="form-control m-input m-input--square" id="vehicle_types">
			
			<option value="">  </option>

			<?php foreach ($getVehiclesTypes as $key => $type): ?>
			
				<option value="<?= $type->getId() ?>"><?= $type->getName() ?></option>

			<?php endforeach ?>
			
			
		</select>

	</div>

	<div class="form-group m-form__group">

		<label for="Marca">Marca: <span style="color:red;">*</span></label>

		<select name="vehicle_brands" class="form-control m-input m-input--square" id="vehicle_brands">
			
			<option value="">  </option>

			<?php foreach ($getVehiclesBrands as $key => $brand): ?>
			
				<option value="<?= $brand->getId() ?>"><?= $brand->getName() ?></option>

			<?php endforeach ?>
			
			
		</select>

	</div>
	
	<div class="form-group m-form__group">

		<label for="Modelo">
			Modelo:
		</label>

		<input name="model" value="" class="form-control m-input" placeholder="Introduce el modelo" type="text">

	</div>

	<div class="form-group m-form__group">

		<label for="license_plate">
			Matrícula:
		</label>

		<input name="license_plate" value="" class="form-control m-input" placeholder="Introduce número de matrícula" type="text">

	</div>

	<div class="form-group m-form__group">

		<label for="vin">
			Número de bastidor:
		</label>

		<input name="vin" value="" class="form-control m-input" placeholder="Introduce número de chasis" type="text">

	</div>

	<div class="form-group m-form__group">

		<label for="year">
			Año: <span style="color:red;">*</span>
		</label>

		<input name="year" value="" class="form-control m-input" placeholder="Introduce el año" type="text">

	</div>

	<div class="form-group m-form__group">

		<label for="exampleSelect1">Forma de pago:</label>

		<select name="paytype_id" class="form-control m-input m-input--square" id="paytype_id">
			
			<option value="">  </option>

			<?php foreach ($getPayTypes as $key => $payType): ?>
			
				<option value="<?= $payType->getId() ?>"> <?= $payType->getName() ?> </option>

			<?php endforeach ?>
			
			
		</select>

		</div>

	<div class="form-group m-form__group">
	
		<label for="pay_method">Método de pago <span style="color:red;">*</span></label>

		<select name="pay_method" id="pay_method" class="form-control m-input m-input--square">

			<option value=""></option>
			<option value="monthly">Mensual</option>
			<option value="quarterly">Trimestral</option>
			<option value="biannual">Semestral</option>
			<option value="yearly">Anual</option>

		</select>

	</div>

	<div class="form-group m-form__group">

		<label for="Parking">Parking: <span style="color:red;">*</span></label>



		<select name="parking" class="form-control m-input m-input--square" id="parking">
			
			<option value="">  </option>
			

			<?php foreach ($getParking as $key => $parking): ?>
			
				<option value="<?= $parking->getId() ?>"><?= $parking->getNumber() ?></option>

			<?php endforeach ?>
			
			
		</select>

	</div>

	<div class="form-group m-form__group" style="display: flex;justify-content: flex-end;">

		<button name="submit-form" type="submit" class="btn btn-primary send-form">

			<i class="la la-floppy-o"></i> Guardar

		</button>
	</div>

</form>