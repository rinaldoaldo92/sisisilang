<div id="konten">

		<?php foreach ($media_item as $media) : ?>
		<div class="card-dark bg-transparent card-halamanutama">
			<div class="card-body">
				<h5 class="card-title"><?php echo $media['judul']; ?></h5>
				<p class="card-text"><i class="fas fa-user"></i> | <a href="<?php echo base_url('narasi/user/').preg_replace('/\s+/', '-', str_replace('/','-',strtolower($media['penulis']))); ?>"><?php echo $media['penulis'] ?></a></p>
				<p class="card-text"><?php echo $media['keterangan']; ?></p>
				<a href="<?php echo base_url(); ?>narasi/view/<?php echo $media['slug']; ?>"><button class="btn-edited">Selengkapnya</button></a>
			</div>
		</div>
		<?php endforeach; ?>

</div>