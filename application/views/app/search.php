<div class="col-xs-10 col-xs-offset-1">
<?php if(!empty($hoteles)): ?>
<?php foreach ($hoteles as $row):?>
	<?php $url_img="uploads/".$row['id']."/".$row['portada']; ?>
	<div class="panel_hotel" id="hotel<?php echo $row['id']?>">
		<img src="<?php echo base_url($url_img); ?>" style="width: 100%;min-height: 150px;max-height: 150px;border-radius: 1.5em;position: absolute;">
		<p class="title_panel_hotel">
			<?php echo $row['nombre']; ?>
		</p>
	</div>
<?php endforeach; ?>
<?php else: ?>
	<div class="col-xs-12">
		<h3 class="text-center">No hay resultados</h3>
	</div>
<?php endif; ?>
	<div class="col-xs-3 col-xs-offset-9" style="padding-top: 1em">
		<a href="<?php echo base_url('index.php/app'); ?>">
			<img src="<?php echo base_url('estaticos/img/volver.png') ?>" class="w100 menu-option" alt="">
		</a>
	</div>
</div>
<script>
	$(function() {
		var url=$("html").data("url")
		$(".panel_hotel").click(function(e){
			e.preventDefault()
			var id=$(this).attr('id').split("hotel")
			id=id[1]
			window.location=url+"/app/hotel/"+id
		})
	});
</script>