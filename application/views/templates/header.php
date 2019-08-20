<!DOCTYPE html>
<html lang="es" data-url="<?php echo site_url(); ?>">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<link type="text/plain" rel="author" href="<?php echo base_url('humans.txt') ?>" />
		<title>Masinfo</title>
		
		<?php if(ENVIRONMENT=='production'): ?>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<script src="//code.jquery.com/jquery.js"></script>

		<?php elseif(ENVIRONMENT=='development'): ?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('estaticos/css/bootstrap.css') ?>">

		<script src="<?php echo base_url('estaticos/js/jquery.js') ?>"></script>

		<?php endif; ?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('estaticos/css/mague.css') ?>">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<header class="container">
			<div class="col-xs-12">
				<img src="<?php echo base_url('estaticos/img/logo.jpg'); ?>" alt="" style="width:100%; height:200px">
			</div>
		</header>