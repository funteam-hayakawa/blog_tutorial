<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?php echo __('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>

    <!-- Bootstrap -->
	<?php
	// echo $this->Html->css('cake.generic');
	 ?>
	<?php echo $this->Html->css('bootstrap.min'); ?>
	<?php echo $this->Html->css('bootstrap-select'); ?>
	<!-- Le styles -->
	<style>
    body {
      padding-top: 50px;
    }
    .starter-template {
      padding: 40px 15px;
      text-align: center;
    }
	</style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <?php echo $this->Session->flash(); ?>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<?php echo $this->Html->script('jquery-1.12.3.min'); ?>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo $this->Html->script('bootstrap.min'); ?>
		<?php echo $this->Html->script('bootstrap-select'); ?>
    <?php echo $this->fetch('script'); ?>

		<?php echo $this->fetch('content'); ?>
  </body>

</html>
