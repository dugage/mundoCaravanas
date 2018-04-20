<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
  WebFont.load({
    google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
    active: function() {
        sessionStorage.fonts = true;
    }
  });
</script>
<?= link_tag('assets/vendors/base/vendors.bundle.css') ?>
<?= link_tag('assets/demo/default/base/style.bundle.css') ?>
<link rel="shortcut icon" href="<?= site_url('assets/demo/default/media/img/logo/favicon.ico') ?> />