	<button onclick="toTop()" id="btn-keatas" aria-label="back-to-top"><i class="fas fa-arrow-up"></i></button>
<div class="footer-pelayanrakyat">
	<p style="text-align: center;">Menemukan bug atau problem saat mengakses halaman ini? Segera kirim surel/e-mail ke foundthebug@sisi-silang.id.</p>
	<p style="text-align: center;"><b>Copyright 2018. Powered by [nama hosting]. All rights reserved.</b></p>
</div>
<script src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/jquery-ui/jquery-ui.js"); ?>"></script> 
<script type="text/javascript">
	window.onscroll = function() { scrollFunction()};
	function scrollFunction() { if(document.body.scrollTop>40 || document.documentElement.scrollTop > 40) {

	document.getElementById("btn-keatas").style.display = "block"; } else { 

	document.getElementById("btn-keatas").style.display = "none"; } }

	function toTop() { document.body.scrollTop = 0; 

		document.documentElement.scrollTop = 0; }
</script>
<script type="text/javascript">
	$(document).ready(function()) {
		$( "#kategori" ).autocomplete({
			source: "<?php echo site_url('pelayanrakyat/tarik_kategori/?');?>"
		});
	});
</script>
</body>
</html>