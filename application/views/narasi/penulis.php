<div id="konten">
<h2>Para Penulis</h2>
<hr>
<?php foreach ($penulis as $penulis) : ?>
<div class="card-dark bg-transparent card-batas-penulis">
	<img class="card-img-top img-fluid card-penulis" src="<?php echo base_url('assets/img/avatar/') . $penulis['avatar']; ?>" alt="gambar-pendukung">
	<div class="card-body">
		<h5 class="card-title"><?php echo $penulis['nama']; ?></h5>
		<p class="card-text"><?php echo $penulis['bio']; ?></p>
		<a href="<?php echo base_url(); ?>narasi/user/<?php echo preg_replace('/\s+/', '-', str_replace('/','-',strtolower($penulis['nama']))); ?>"><button class="btn-edited">Selengkapnya</button></a>
	</div>
</div>
<?php endforeach; ?>
<?php echo $pagination; ?>
</div>