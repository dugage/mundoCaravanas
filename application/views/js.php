<script type="text/javascript">var base_url = "<?= base_url() ?>";</script>
<script type="text/javascript">var site_url = "<?= site_url() ?>";</script>
<script src="<?= base_url('assets/vendors/base/vendors.bundle.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/demo/default/base/scripts.bundle.js') ?>" type="text/javascript"></script>
<?php if($typeLayout == "panel"): ?>

	<script src="<?= base_url('assets/app/js/dashboard.js') ?>" type="text/javascript"></script>
	<script src="<?= base_url('assets/demo/default/custom/components/datatables/base/html-table.js') ?>" type="text/javascript"></script>

<?php elseif($typeLayout == "login"): ?>

	<script src="<?= base_url('assets/snippets/pages/user/login.js') ?>" type="text/javascript"></script>

<?php endif ?>
<script src="<?= base_url('assets/app/js/ajax_actions.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/app/js/app_actions.js') ?>" type="text/javascript"></script>