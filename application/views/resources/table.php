<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">

	<div class="row align-items-center">

		<div class="col-xl-8 order-2 order-xl-1">
			
			<div class="form-group m-form__group row align-items-center">
				
				<?php if( !isset($modal) ): ?>

					<div class="col-md-4">

						<div class="m-input-icon m-input-icon--left">
							<input class="form-control m-input m-input--solid" placeholder="Buscar..." id="generalSearch" type="text">

							<span class="m-input-icon__icon m-input-icon__icon--left">

								<span><i class="la la-search"></i></span>

							</span>

						</div>

					</div>

				<?php endif ?>

			</div>

		</div>

		<div class="col-xl-4 order-1 order-xl-2 m--align-right">
			
			<?php if( isset($modal) ): ?>

				<a id="<?= $id ?>" href="#" data-title="<?= $title ?>" data-url="<?= $modal ?>" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air modal-set" data-toggle="modal" data-target="#appModal">
					<span><i class="fa flaticon-add"></i><span> Crear</span></span>
				</a>

			<?php elseif( isset($nameModule) ): ?>

				<a href="<?= site_url(strtolower(str_replace(' ','-',$nameModule)).'/add') ?>" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
					<span><i class="fa flaticon-add"></i><span> Crear</span></span>
				</a>

			<?php endif ?>

		</div>

	</div>

</div>

<table class="m-datatable" id="html_table" width="100%">

	<thead>

		<tr>

			<?php $count = 1 ?>

			<?php foreach ($tableTh as $key => $th): ?>
				
				<th title="Field #<?= $count ?>">

					<?= $th ?>

				</th>

				<?php $count ++ ?>
				
			<?php endforeach ?>

			<th title="Field #<?= $count ?>">
				
				Acciones

			</th>

		</tr>

	</thead>
	
	<tbody>

	<?php if( $getResult ): ?>

		<?php foreach ($getResult as $key => $result): ?>

			<tr>
				
				<?php $id = 0 ?>

				<?php foreach ($tableTh as $key => $th): ?>
					
					<?php if( $key == 'DischargeDate' ): ?>

						<td><?= $result->{'get'.$key}()->format('d/m/Y') ?></td>

					<?php else: ?>
						
						<?php if( isset( $keyObj[$key] ) ): ?>

							<td><?= $result->{'get'.$key}()->{'get'.$keyObj[$key]}() ?></td>

						<?php else: ?>

							<td><?= $result->{'get'.$key}() ?></td>

						<?php endif ?>

						<?php if( $key == 'Id' ) $id = $result->{'get'.$key}() ?>

					<?php endif ?>

				<?php endforeach ?>

				<td>
					
					<?php if( isset($modal) ): ?>

						<a href="#" id="<?= $id ?>" data-title="<?= $title ?>" data-url="<?= $modal ?>" class="btn btn-warning m-btn m-btn--icon m-btn--icon-only modal-edit" data-toggle="modal" data-target="#appModal">
							<i class="fa flaticon-edit-1"></i>
						</a>

						<a href="#" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only">
							<i class="fa flaticon-circle"></i>
						</a>

						<?php if( $image ): ?>

							<a href="#" class="btn btn-brand m-btn m-btn--icon m-btn--icon-only">
								<i class="fa fa-camera"></i>
							</a>

						<?php endif ?>

					<?php elseif( isset($nameModule) ): ?>
						
						<a href="<?= site_url(strtolower(str_replace(' ','-',$nameModule)).'/edit/'.$id) ?>" class="btn btn-warning m-btn m-btn--icon m-btn--icon-only">
							<i class="fa flaticon-edit-1"></i>
						</a>

						<a href="<?= site_url(strtolower(str_replace(' ','-',$nameModule)).'/delete/'.$id) ?>" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only">
							<i class="fa flaticon-circle"></i>
						</a>

					<?php endif ?>

					
					
				</td>

			</tr>

		<?php endforeach ?>

	<?php else: ?>

		<div class="m-alert m-alert--outline alert alert-warning alert-dismissible fade show" role="alert">

			<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>

			<strong>
				Atención!
			</strong>

			Esta sección no tiene datos para mostrar.

		</div>

	<?php endif ?>

	</tbody>
	

</table>

