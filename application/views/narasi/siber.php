<div id="konten">
<h2>Siber</h2>
<p>Masih bingung diantara belantara dunia siber (cyber) saat ini? Kami beri banyak panduannya.</p>
<hr>
<?php foreach ($siber_item as $siber) : ?>
<div class="card-dark bg-transparent card-batas">
	<img class="card-img-top img-fluid" src="<?php echo base_url('assets/img/media/') . $siber['gambar']; ?>" alt="gambar-pendukung">
	<div class="card-body">
		<p class="card-text"><small class="text-muted"><?php echo $siber['submit_on']; ?></small></p>
		<h5 class="card-title"><?php echo $siber['judul']; ?></h5>
		<p class="card-text"><?php echo $siber['keterangan']; ?></p>
		<a href="<?php echo base_url(); ?>narasi/view/<?php echo $siber['slug']; ?>"><button class="btn-edited">Selengkapnya</button></a>
	</div>
</div>
<?php endforeach; ?>
<?php echo $pagination; ?>
</div>
