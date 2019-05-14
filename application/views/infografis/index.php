<div id="konten">
<h2>Infografis</h2>
<p>Kumpulan infografis yang pernah ditampilkan di Sisi.silang.</p>
<hr>
	<?php foreach ($infografis as $infografis) : ?>
	<div id="card-infografis">
			<img src="<?php echo base_url('assets/img/media/') . $infografis['gambar']; ?>" alt="foto-admin" class="img-fluid img-infografis">
			<hr>
		<h2><?php echo $infografis['judul']; ?></h2>
		<a href="<?php echo base_url(); ?>infografis/view/<?php echo $infografis['slug']; ?>"><button class="btn-edited">Selengkapnya</button></a>
	</div>
	<?php endforeach; ?>
</div>
