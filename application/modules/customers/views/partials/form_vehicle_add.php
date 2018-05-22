<form action="<?= site_url("customers/setVehicle/".$id) ?>" method="post" class="m-form">

	<div class="form-group m-form__group">

		<label for="exampleSelect1">Tipo de vehículo:</label>

		<select name="paytype_id" class="form-control m-input m-input--square" id="paytype_id">
			
			<option value="">  </option>

			<?php foreach ($getVehiclesTypes as $key => $type): ?>
			
				<option value="<?= $type->getId() ?>"><?= $type->getName() ?></option>

			<?php endforeach ?>
			
			
		</select>

	</div>

	<div class="form-group m-form__group">

		<label for="exampleSelect1">Marca:</label>

		<select name="paytype_id" class="form-control m-input m-input--square" id="paytype_id">
			
			<option value="">  </option>

			<?php foreach ($getVehiclesBrands as $key => $brand): ?>
			
				<option value="<?= $brand->getId() ?>"><?= $brand->getName() ?></option>

			<?php endforeach ?>
			
			
		</select>

	</div>
	
	<div class="form-group m-form__group">

		<label for="name">
			Modelo:
		</label>

		<input name="name" value="" class="form-control m-input" placeholder="Introduce el nombre del cliente" type="text">

	</div>

	<div class="form-group m-form__group">

		<label for="name">
			Matrícula:
		</label>

		<input name="name" value="" class="form-control m-input" placeholder="Introduce el nombre del cliente" type="text">

	</div>

	<div class="form-group m-form__group">

		<label for="name">
			Número de bastidor:
		</label>

		<input name="name" value="" class="form-control m-input" placeholder="Introduce el nombre del cliente" type="text">

	</div>

	<div class="form-group m-form__group">

		<label for="name">
			Año:
		</label>

		<input name="name" value="" class="form-control m-input" placeholder="Introduce el nombre del cliente" type="text">

	</div>

</form>