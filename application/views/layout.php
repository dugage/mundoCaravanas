<!DOCTYPE html>

<html lang="es">

	<head>

		<?php

			$meta = array(
		        array('name' => 'robots', 'content' => 'noindex, follow'),
		        array('name' => 'title', 'content' => $title),
		        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
		    );

		?>

		<?=  meta($meta); ?>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>

		<link rel="shortcut icon" href="<?= base_url('assets/demo/default/media/img/logo/favicon.ico') ?>" />

		<title><?= $title; ?></title>

		<?php $this->load->view("css") ?>

	</head>

	<body class="<?= $class ?>" <?php if(isset($reference)): ?>id="<?= $reference ?>"<?php endif ?> >

		<?php if($typeLayout == "panel"): ?>

			<div class="m-content--skin-light2 m-grid m-grid--hor m-grid--root m-page">

				<?php $this->load->view("header") ?>

				<?php $this->load->view("content") ?>

				<?php $this->load->view("footer") ?>

			</div>

		<?php elseif($typeLayout == "login"): ?>

			<?php $this->load->view($content) ?>

		<?php endif ?>

		<?php $this->load->view("resources/modal") ?>

		<?php $this->load->view("js") ?>
		
	</body>

</html>