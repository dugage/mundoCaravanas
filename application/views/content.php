<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
	
	<?php $this->load->view("includes/content/m_ver_menu") ?>
	
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		
		<?php $this->load->view("includes/content/m_bread_crumbs") ?>
		
		<div class="m-content">

			<div class="row">

				<div class="col-md-12">

					<div class="m-portlet">

						<div class="m-portlet__head">

							<div class="m-portlet__head-caption">

								<div class="m-portlet__head-title">

									<span class="m-portlet__head-icon m--hide">
										<i class="la la-gear"></i>
									</span>

									<h3 class="m-portlet__head-text">
										<?= $nameModule ?>
									</h3>

								</div>

							</div>

						</div>

						<?php $this->load->view($content) ?>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>