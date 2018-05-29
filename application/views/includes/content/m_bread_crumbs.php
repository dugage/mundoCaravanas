<div class="m-subheader ">

	<div class="d-flex align-items-center">

		<div class="mr-auto">

			<h3 class="m-subheader__title m-subheader__title--separator">
				<?= $nameModule ?>
			</h3>

			<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">

				<li class="m-nav__item m-nav__item--home">
					<a href="<?= site_url('/') ?>" class="m-nav__link m-nav__link--icon">
						<i class="m-nav__link-icon la la-home"></i>
					</a>
				</li>

				<?php if (!empty($breadCrumbs)): ?>

					<?php foreach ($breadCrumbs as $key => $breadCrumb): ?>
						
						<li class="m-nav__separator">
							-
						</li>

						<li class="m-nav__item">

							<a href="<?= (site_url($breadCrumb)) ?>" class="m-nav__link">

								<span class="m-nav__link-text">
								
									<?= $breadCrumb ?>

								</span>

							</a>

						</li>

					<?php endforeach ?>
					
				<?php endif ?>

			</ul>

		</div>
		
	</div>

</div>