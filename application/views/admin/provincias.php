<div class="container" ng-app="provincias" ng-controller="ProvinciaCntrl">
	<div class="row">
	<div class="col-xs-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Añadir provincia</h3>
			</div>
			<div class="panel-body">
				<div class="form-group">
				<form ng-submit="addProvincia()">
					
					<div class="col-xs-12">
						<label>Nombre</label>
						<input type="text" name="provincia" id="provincia" class="form-control" ng-model="provincia">
					</div>
					<div class="col-xs-12">
						<button type="submit" class="btn btn-primary btn-block">Agregar</button>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
		<div class="col-xs-6 col-xs-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Numero</th>
								<th>Nombre de la provincia</th>
								<th></th>
							</tr>
						</thead>
						<tbody class="table_cp">
							<tr ng-repeat="p in provincias" id="provincia{{p.id}}" ng-click="selectCategoria()">
								<td>{{p.id}}</td>
								<td>{{p.provincia}}</td>
								<td>
									<button class="btn btn-sm btn-block btn-primary" ng-click="update()">Actualizar</button>
									<button class="btn btn-sm btn-block btn-danger" ng-click="delete()">Eliminar</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('estaticos/css/toastr.min.css'); ?>">
<script src="<?php echo base_url('estaticos/js/toastr.min.js'); ?>"></script> -->
<script src="<?php echo base_url('estaticos/js/angular.min.js'); ?>"></script>
<script src="<?php echo base_url('estaticos/js/provincias/app.js'); ?>"></script>