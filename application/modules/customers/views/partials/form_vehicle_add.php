<form action="<?= site_url("customers/setVehicle/".$id) ?>" method="post" class="m-form">

		<?= validation_errors(); ?>


	<div class="form-group m-form__group">

		<label for="exampleSelect1">Tipo de vehículo:</label>

		<select name="vehicle_types" class="form-control m-input m-input--square" id="vehicle_types">
			
			<option value="">  </option>

			<?php foreach ($getVehiclesTypes as $key => $type): ?>
			
				<option value="<?= $type->getId() ?>"><?= $type->getName() ?></option>

			<?php endforeach ?>
			
			
		</select>

	</div>

	<div class="form-group m-form__group">

		<label for="Marca">Marca:</label>

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

		<input name="customer" value="" class="form-control m-input" placeholder="Introduce el modelo" type="text">

	</div>

	<div class="form-group m-form__group">

		<label for="license_plate">
			Matrícula:
		</label>

		<input name="licence_plate" value="" class="form-control m-input" placeholder="Introduce número de matrícula" type="text">

	</div>

	<div class="form-group m-form__group">

		<label for="vin">
			Número de bastidor:
		</label>

		<input name="vin" value="" class="form-control m-input" placeholder="Introduce número de chasis" type="text">

	</div>

	<div class="form-group m-form__group">

		<label for="year">
			Año:
		</label>

		<input name="year" value="" class="form-control m-input" placeholder="Introduce el año" type="number">

	</div>

	<div class="form-group m-form__group" style="display: flex;justify-content: flex-end;">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"> Cerrar

		</button>

		<button name="submit-form" type="submit" class="btn btn-primary send-form">

			<i class="la la-floppy-o"></i> Guardar

		</button>
	</div>

</form>