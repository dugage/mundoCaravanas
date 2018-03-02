<!DOCTYPE html>

<html lang="<?= $lang ?>">

	<head>

		<?php

			$meta = array(
		        array('name' => 'robots', 'content' => $robots),
		        array('name' => 'title', 'content' => $title),
		        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
		    );

		?>

		<?=  meta($meta); ?>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>

		<title><?= $title; ?></title>

		<?php $this->load->view("css") ?>

	</head>

	<body class="<?= $class ?>" <?php if(isset($reference)): ?>id="<?= $reference ?>"<?php endif ?>>

		<?php if($typeLayout == "panel"): ?>

			<?php $this->load->view("header") ?>

			<?php $this->load->view($content) ?>

			<?php $this->load->view("footer") ?>

		<?php elseif($typeLayout == "login"): ?>

			<?php $this->load->view($content) ?>

		<?php endif ?>

		<?php $this->load->view("js") ?>
		
	</body>

</html>