<div class="container" ng-app="hoteles" ng-controller="HotelCntrl">
	<form ng-submit="add()">
		<div class="row">
			<div class="col-xs-6 col-xs-offset-3">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Datos del Hotel</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-6">
								<label for="nombre">Nombre</label>
								<input type="text" id="nombre" class="form-control" ng-model="nombre">
							</div>
							<div class="col-xs-6">
								<label for="provincia">Provincia</label>
								<select id="provincia" ng-model="provincia" class="form-control">
									<option ng-repeat="p in provincias" value="{{p.id}}">{{p.provincia}}</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label for="categoria">Categoria</label>
								<select id="categoria" ng-model="categoria" class="form-control">
									<option ng-repeat="c in categorias" value="{{c.id}}">{{c.categoria}}</option>
								</select>
							</div>
							<div class="col-xs-6">
									<label for="portada">Portada</label>
									<input type="file" id="portada" name="portada" ng-model="portada" class="form-control" uploader-model="portada">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-6 col-xs-offset-3">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Videos del Hotel</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-12">
								<label for="qems">¿Qué es Más info en signos?</label>
								<input type="text" ng-model="qems" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<label for="bienvenido">Bienvenido</label>
								<input type="text" ng-model="bienvenido" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<label for="habitaciones">Nuestras Habitaciones</label>
								<input type="text" ng-model="habitaciones" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<label for="instalaciones">Instalaciones</label>
								<input type="text" ng-model="instalaciones" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<label for="servicios">Servicios</label>
								<input type="text" ng-model="servicios" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<label for="accesos">Accesos y Entorno</label>
								<input type="text" ng-model="accesos" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<label for="videinterpretacion">VideInterpretación LSE</label>
								<input type="text" ng-model="videinterpretacion" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<label for="faq">Preguntas Frecuentes</label>
								<input type="text" ng-model="faq" class="form-control">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-xs-offset-3">
				<div class="col-xs-6">
					<button type="submit" class="btn btn-primary btn-block">Agregar</button>
				</div>
				<div class="col-xs-6">
					<button type="button" class="btn btn-danger btn-block">Limpiar Campos</button>
				</div>
			</div>
		</div>
	</form>
</div>

<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('estaticos/css/toastr.min.css'); ?>">
<script src="<?php echo base_url('estaticos/js/toastr.min.js'); ?>"></script> -->
<script src="<?php echo base_url('estaticos/js/angular.min.js'); ?>"></script>
<script src="<?php echo base_url('estaticos/js/hoteles/app.js'); ?>"></script>