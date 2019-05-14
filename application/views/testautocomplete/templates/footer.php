<script src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/jquery-ui/jquery-ui.js"); ?>"></script> 
<script type="text/javascript">
	$(document).ready(function()) {
		$("#kategori").autocomplete({
			source: "<?php echo site_url('testautocomplete/get_autocomplete');?>"
		});
	});
</script>
</body>
</html>