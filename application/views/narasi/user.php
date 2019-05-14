<div id="konten">

	<section>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb bg-transparent">
			<li class="breadcrumb-item" aria-current="page"><a href="<?php echo base_url("konten");?>">Beranda</a></li>
			<li class="breadcrumb-item" aria-current="page"><a href="<?php echo base_url("narasi/penulis"); ?>">Para Penulis</a></li>
			<li class="breadcrumb-item active text-white" aria-current="page"><?php echo $user_item['nama']; ?></li>
		</ol>
	</nav>
	</section>

	<article>
	<div id="data-diri">
			<h2><?php echo $user_item['nama']; ?></h2>
			<p><?php echo $user_item['bio']; ?></p>
			<a href="<?php echo $user_item['facebook'] ?>" data-toggle="tooltip" data-placement="bottom" title="facebook"><img src="<?php echo base_url("assets/img/logofacebook.png"); ?>" alt="logo-facebook" class="logo-sosmed"></a>
			<a href="<?php echo $user_item['twitter'] ?>" data-toggle="tooltip" data-placement="bottom" title="twitter"><img src="<?php echo base_url("assets/img/logotwitter.png"); ?>" alt="logo-twitter" class="logo-sosmed"></a>
			<a href="<?php echo $user_item['instagram'] ?>" data-toggle="tooltip" data-placement="bottom" title="instagram"><img src="<?php echo base_url("assets/img/logoinstagram.png"); ?>" alt="logo-instagram" class="logo-sosmed"></a>
	</div>
	<div id="tulisan-dari-penulis">
	<?php foreach ($artikel_item as $artikel): ?>
	<div class="blok-tulisan">
	<h4><?php echo $artikel['judul']; ?></h4>
	<a href="<?php echo base_url('narasi/') . $artikel['slug']; ?>"><button class="btn-edited">Selengkapnya</button></a>
	</div>
	<?php endforeach ?>
	</div>
	</article>

	<aside id="advertise">
	</aside>

</div>