<div id="konten">
<h2>Programming</h2>
<p>Soal-soal koding, data dan sistem, semua ada disini.</p>
<hr>
<?php foreach ($programming_item as $programming) : ?>
<div class="card-dark bg-transparent card-batas">
	<img class="card-img-top img-fluid card-batas2" src="<?php echo base_url('assets/img/media/') . $programming['gambar']; ?>" alt="gambar-pendukung">
	<div class="card-body">
		<p class="card-text"><small class="text-muted"><?php echo $programming['submit_on']; ?></small></p>
		<h5 class="card-title"><?php echo $programming['judul']; ?></h5>
		<p class="card-text"><?php echo $programming['keterangan']; ?></p>
		<a href="<?php echo base_url(); ?>narasi/view/<?php echo $programming['slug']; ?>"><button class="btn-edited">Selengkapnya</button></a>
	</div>
</div>
<?php endforeach; ?>
<?php echo $pagination; ?>
</div>