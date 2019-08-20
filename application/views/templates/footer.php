		<?php if(ENVIRONMENT=='production'): ?>
		<!-- jQuery -->
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<?php elseif(ENVIRONMENT=='development'): ?>
		<!-- jQuery -->
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url('estaticos/js/bootstrap.min.js') ?>"></script>
 		<?php endif; ?>
	</body>
</html>