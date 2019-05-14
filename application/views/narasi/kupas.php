<div id="konten">
<h2>Kupas</h2>
<p>Membahas berbagai hal disekitar kita secara unik dan berbeda.</p>
<hr>
<?php foreach ($kupas_item as $kupas) : ?>
<div class="card-dark bg-transparent card-batas">
	<img class="card-img-top img-fluid" src="<?php echo base_url('assets/img/media/') . $kupas['gambar']; ?>" alt="gambar-pendukung">
	<div class="card-body">
		<p class="card-text"><small class="text-muted"><?php echo $kupas['submit_on']; ?></small></p>
		<h5 class="card-title"><?php echo $kupas['judul']; ?></h5>
		<p class="card-text"><?php echo $kupas['keterangan']; ?></p>
		<a href="<?php echo base_url(); ?>narasi/view/<?php echo $kupas['slug']; ?>"><button class="btn-edited">Selengkapnya</button></a>
	</div>
</div>
<?php endforeach; ?>
<?php echo $pagination; ?>
</div>
