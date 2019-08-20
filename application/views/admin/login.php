<div class="container">
	<div class="row" style="margin-top:15%">
		<div class="col-xs-4 col-xs-offset-4">
		<?php $error=$this->session->flashdata('error');
			if(strlen($error)>0): ?>
			<div class="alert alert-warning">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $error; ?>
			</div>
		<?php endif; ?>
			<?php echo form_open('admin/login',array("role"=>"form")); ?>
				<legend class="text-center">Iniciar Sesion</legend>
			
				<div class="form-group">
					<label for="user">Usuario</label>
					<input type="text" class="form-control" id="user" name="user" placeholder="">
				</div>
				<div class="form-group">
					<label for="pass">Contraseña</label>
					<input type="password" class="form-control" id="pass" name="pass">
				</div>
			
				
			
				<button type="submit" class="btn btn-primary btn-block">Ingresar</button>
			</form>
		</div>
	</div>
</div>