<div id="content-dashboard">

	<aside id="info-user">
		<p><i class="fas fa-info-circle fa-2x"></i></p>
		<h5><b>Selamat datang,</b> <?php echo $this->session->userdata('username'); ?>.</h5>
		<hr>
	</aside>

				<section>
				<div class="card-dark bg-transparent card-batas">
					<h2>List Artikel</h2>
					<hr>
					<?php foreach ($articles as $article) : ?>
					<ul>
					<li><a href="<?php echo base_url(); ?>pelayanrakyat/dashboard/updateartikel/<?php echo $article['id']; ?>"><?php echo $article['judul']; ?></a></li>
					</ul>
					<?php endforeach; ?>
					<a href="<?php echo base_url("pelayanrakyat/dashboard/administrasi"); ?>"><button class="btn-edited nav-item">Selengkapnya</button></a>
				</div>

				<div class="card-dark bg-transparent card-batas">
					<h2>List Kontributor</h2>
					<hr>
					<?php foreach ($kontributor as $kontrib) : ?>
					<ul>
						<li><a href="<?php echo base_url(); ?>pelayanrakyat/dashboard/updatepengguna/<?php echo $kontrib['id']; ?>"><?php echo $kontrib['username']; ?></a></li>
					</ul>
					<?php endforeach; ?>
					<a href="<?php echo base_url("pelayanrakyat/dashboard/listpengguna"); ?>"><button class="btn-edited nav-item">Selengkapnya</button></a>
				</div>

				<div class="card-dark bg-transparent card-batas">
					<h2>List Halaman</h2>
					<hr>
					<?php foreach ($halaman as $halaman_item) : ?>
					<ul>
						<li><a href="<?php echo base_url(); ?>pelayanrakyat/dashboard/updatehalaman/<?php echo $halaman_item['id']; ?>"><?php echo $halaman_item['judul']; ?></a></li>
					</ul>
					<?php endforeach; ?>
					<a href="<?php echo base_url("pelayanrakyat/dashboard/halaman"); ?>"><button class="btn-edited nav-item">Selengkapnya</button></a>
				</div>
				</section>

</div>