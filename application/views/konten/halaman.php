<div id="konten">
<nav aria-label="breadcrumb">
	<ol class="breadcrumb bg-transparent">
		<li class="breadcrumb-item" aria-current="page"><a href="<?php echo base_url("konten");?>">Beranda</a></li>
		<li class="breadcrumb-item active text-white" aria-current="page"><?php echo $halaman_item['judul']; ?></li>
	</ol>
</nav>
<div id="konten">
<?php
echo '<p>'.$halaman_item['keterangan'].'</p>';
?>
<div class="komentar">
<h4>Kirim komentar disini</h4>
<div id="disqus_thread">
</div>
</div>
</div>
</div>

