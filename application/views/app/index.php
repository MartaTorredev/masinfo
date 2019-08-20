		<div class="container">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
					<iframe style="border-radius: 10px" class="video" src="https://www.youtube.com/embed/xFutjZEBTXs?list=PLgFPSBWI2ATvMcpv8z61cipCaA67Edz0E" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="row search">
				<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
					<?php echo form_open('app/search', array("role"=>"search")); ?>
						<div class="input-group">
					    	<input type="text" class="form-control form-control-nbr input-search" name="search">
				    		<span class="input-group-btn">
				    			<button class="btn btn-default btn-nbr btn-search" type="submit">
				    				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				    			</button>
				    		</span>
					    </div><!-- /input-group -->
					</form>
				</div>
			</div>
			<div class="row menu">
				<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
					<div class="col-xs-4 col-sm-3 col-sm-offset-1 col-md-2">
						<a href="#">
							<img src="<?php echo base_url('estaticos/img/comentar.png') ?>" class="w100 menu-option" alt="">
						</a>
					</div>
					<div class="col-xs-4 col-sm-3 col-sm-offset-1 col-md-2 col-md-offset-2">
						<a href="#">
							<img src="<?php echo base_url('estaticos/img/compartir.png') ?>" class="w100 menu-option" alt="">
						</a>
					</div>
					<div class="col-xs-4 col-sm-3 col-sm-offset-1 col-md-2 col-md-offset-2">
						<a href="#">
							<img src="<?php echo base_url('estaticos/img/idiomas.png') ?>" class="w100 menu-option" alt="">
						</a>
					</div>
					<div style="padding-right: 0; padding-left: 0; " class="col-xs-4 col-sm-3 col-sm-offset-1 col-md-2 text-center">
						Acceso Directo
					</div>
					<div style="padding-right: 0; padding-left: 0; " class="col-xs-4 col-sm-3 col-sm-offset-1 col-md-2 col-md-offset-2 text-center">
						Compartir
					</div>

					<div style="padding-right: 0; padding-left: 0; " class="col-xs-4 col-sm-3 col-sm-offset-1 col-md-2 col-md-offset-2 text-center">
						Idioma
					</div>
					
				</div>
			</div>
		</div>