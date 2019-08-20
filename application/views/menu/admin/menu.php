<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Masinfo</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="<?php echo base_url('index.php/admin'); ?>">Inicio</a></li>
				<li><a href="<?php echo base_url('index.php/admin/categorias') ?>">Categorias</a></li>
				<li><a href="<?php echo base_url('index.php/admin/provincias') ?>">Provincias</a></li>
				<li><a href="<?php echo base_url('index.php/admin/hoteles') ?>">Hoteles</a></li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo base_url('index.php/admin/logout') ?>">Cerrar Sesion</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>