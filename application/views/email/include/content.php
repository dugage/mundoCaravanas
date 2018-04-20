<table style="width: 100%;">
	<tr>
		<td><h1 style="<?= $primary_color ?> <?= $h1_title ?>">{h1}</h1>

			<?php if ($banner): ?>

				<a href="#"><img style="<?= $img?>" src="<?= base_url('assets/assets_public/images/'.$banner) ?>" alt=""></a>

			<?php endif ?>

			<div style="<?= $text_content ?> <?= $justify ?> <?= $ul_lo_li?> color:#474747;">
				{body}
			</div>

			<?php if ($button): ?>

				<table style="<?= $btn_primary ?>" cellspacing="0" cellpadding="0" border="0">

					<tbody>

						<tr>
							<td style="<?= $btn_primary_td ?>" ><a style="<?= $btn_primary_td_a ?>" href="{link}">{button}</a></td>
						</tr>

					</tbody>

				</table>

			<?php endif ?>

		</td>

	</tr>

	<tr style="<?= $rrss_li_i ?> <?= $rrss_li ?>">
		<td>
			<hr style="<?= $hr ?>">
			<div>
				<div>
					<h3 style="<?= $contact_title ?>">Canal Alimentario</h3>
					<p  style="<?= $contact ?>">fduarte@canalalimentario.com<br><span style="<?= $contact_phone ?>">C/ Adelfa, 8 11011 - Cádiz</span><br><span style="<?= $contact_phone ?>">(+34) 629 535 044</span></p>
				</div>
				<!--<a style="<?= $social ?> <?= $facebook ?>"  href="" target="_new" alt="Enlace Facebook"></a>
				<a style="<?= $social ?> <?= $googleplus ?>"  href="" target="_new" alt="Enlace Google Plus"></a>-->
				<a style="<?= $social ?> <?= $linkedin ?>"  href="https://www.linkedin.com/in/canalalimentario" target="_new" alt="Enlace LinkedIn"></a>
				<!-- <a style="<?= $social ?> <?= $youtube ?>"  href="" target="_new" alt="Enlace Youtube"></a>
				<a style="<?= $social ?> <?= $twitter ?>"  href="" target="_new" alt="Enlace Twitter"></a>-->
			</div>

		</td>

	</tr>

</table>
