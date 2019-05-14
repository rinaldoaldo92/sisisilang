<div id="konten">
<h2>Media</h2>
<p>Ngobrolin dunia media dan penyiaran secara asik.</p>
<hr>
<?php foreach ($media_item as $media) : ?>
<div class="card-dark bg-transparent card-batas">
	<div class="card-body">
		<p class="card-text"><small class="text-muted"><?php echo $media['dikirim_pada']; ?></small></p>
		<h5 class="card-title"><?php echo $media['judul']; ?></h5>
		<p class="card-text"><?php echo $media['keterangan']; ?></p>
		<a href="<?php echo base_url(); ?>narasi/view/<?php echo $media['slug']; ?>"><button class="btn-edited">Selengkapnya</button></a>
	</div>
</div>
<?php endforeach; ?>
<?php echo $pagination; ?>
</div>