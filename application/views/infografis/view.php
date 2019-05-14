<div id="konten">
<section>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb bg-transparent">
		<li class="breadcrumb-item" aria-current="page"><a href="<?php echo base_url("konten");?>">Beranda</a></li>
		<li class="breadcrumb-item" aria-current="page"><a href="<?php echo base_url("infografis");?>">Infografis</a></li>
		<li class="breadcrumb-item active text-white" aria-current="page"><?php echo $infografis_item['judul']; ?></li>
	</ol>
</nav>
</section>
<article>
<div id="meta-konten">
<h2><?php echo $infografis_item['judul']; ?></h2>
<p><b> Diterbitkan pada : </b><?php echo $infografis_item['submit_on']; ?></p>
<p><b> Editor : </b><?php echo $infografis_item['submitted']; ?></p>
<hr>
<blockquote><i><?php echo $infografis_item['keterangan']; ?></i></blockquote>
</div>
<div id="isi-konten">
<img src="<?php echo base_url('assets/img/media/') . $infografis_item['gambar']; ?>" alt="foto-admin" class="img-fluid img-infografisview">
<div class="komentar">
<h4>Kirim komentar disini</h4>
<div id="disqus_thread">
</div>
</div>
</div>
</article>
<aside id="advertise">
</aside>
</div>