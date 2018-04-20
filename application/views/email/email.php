<?php  require APPPATH.'views/email/include/e_css.php'; ?>

<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>{title}</title>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<!-- css -->
	
	<?php $this->load->view('email/include/e_css'); ?>
	
<!-- /css -->

</head>

<body style="<?= $style['body'] ?>"  bgcolor="#f6f6f6">

<!-- header -->
	<?php $this->load->view('email/include/header',$style) ?>
<!-- /header -->

<!-- body --> 
<table style="<?= $style['font'] ?> <?= $style['table_body_wrap'] ?>" bgcolor="#f6f6f6">
  <tr>
    <td></td>
    <td class="box-content" style="<?= $style['table_body_wrap_container'] ?> <?= $style['body_wrap_container'] ?>" bgcolor="#FFFFFF">

      <!-- content -->
      <div style="<?= $style['content'] ?> <?= $style['content_table'] ?>">
		  
		  <?php $this->load->view('email/include/content',$style) ?>
      
      </div>
      <!-- /content -->
      
    </td>
    <td></td>
  </tr>
</table>
<!-- /body -->

<!-- footer -->
	<?php $this->load->view('email/include/footer') ?>
<!-- /footer -->

</body>
</html>







