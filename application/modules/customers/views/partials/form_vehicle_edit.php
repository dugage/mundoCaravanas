<form action="<?= site_url("customers/editVehicle/".$id) ?>" method="post" class="m-form">

	<?= validation_errors(); ?>

<?php //var_dump($getRow->getVehicleTypes()); ?>


	<div class="form-group m-form__group">

		<label for="exampleSelect1">Tipo de vehículo: <span style="color:red;">*</span></label>
		

		<select name="vehicle_types" class="form-control m-input m-input--square" id="vehicle_types">
			
			<option value="">  </option>

			<?php foreach ($getVehiclesTypes as $key => $type): ?>
			
				<option value="<?= $type->getId() ?>" <?= $getRow->getVehicleTypes()->getId() == $type->getId() ? 'selected':'' ?> ><?= $type->getName() ?></option>

			<?php endforeach ?>
			
			
		</select>

	</div>

	<div class="form-group m-form__group">

		<label for="Marca">Marca: <span style="color:red;">*</span></label>

		<select name="vehicle_brands" class="form-control m-input m-input--square" id="vehicle_brands">
			
			<option value="">  </option>

			<?php foreach ($getVehiclesBrands as $key => $brand): ?>
			
				<option value="<?= $brand->getId() ?>" <?= $getRow->getVehicleBrands()->getId() == $brand->getId() ? 'selected':'' ?> ><?= $brand->getName() ?></option>

			<?php endforeach ?>
			
			
		</select>

	</div>
	
	<div class="form-group m-form__group">

		<label for="Modelo">
			Modelo:
		</label>

		<input name="model" value="<?= $getRow->getModel() ?>" class="form-control m-input" placeholder="Introduce el modelo" type="text">

	</div>

	<div class="form-group m-form__group">

		<label for="license_plate">
			Matrícula:
		</label>

		<input name="license_plate" value="<?= $getRow->getLicensePlate() ?>" class="form-control m-input" placeholder="Introduce número de matrícula" type="text">

	</div>

	<div class="form-group m-form__group">

		<label for="vin">
			Número de bastidor:
		</label>

		<input name="vin" value="<?= $getRow->getVin() ?>" class="form-control m-input" placeholder="Introduce número de chasis" type="text">

	</div>

	<div class="form-group m-form__group">

		<label for="year">
			Año: <span style="color:red;">*</span>
		</label>

		<input name="year" value="<?= $getRow->getYear() ?>" class="form-control m-input" placeholder="Introduce el año" type="text">

	</div>

	<div class="form-group m-form__group">

		<label for="Parking">Parking: <span style="color:red;">*</span></label>



		<select name="parking" class="form-control m-input m-input--square" id="parking">
			
			<option value="">  </option>
			

			<?php foreach ($getParking as $key => $parking): ?>
			
				<option value="<?= $parking->getId() ?>" <?= $getRow->getParking()->getId() == $parking->getId() ? 'selected':'' ?> ><?= $parking->getNumber() ?></option>

			<?php endforeach ?>
			
			
		</select>

	</div>

	<div class="form-group m-form__group" style="display: flex;justify-content: flex-end;">

		<button name="submit-form" type="submit" class="btn btn-primary send-form">

			<i class="la la-floppy-o"></i> Guardar

		</button>
	</div>

</form>