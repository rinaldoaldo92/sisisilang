<div id="konten">
<section>
<nav aria-label="breadcrumb">
	<ol class="breadcrumb bg-transparent">
		<li class="breadcrumb-item" aria-current="page"><a href="<?php echo base_url("konten");?>">Beranda</a></li>
		<li class="breadcrumb-item" aria-current="page"><a href="<?php echo base_url('narasi/') . strtolower($narasi_item['kategori']); ?>"><?php echo $narasi_item['kategori']; ?></a></li>
		<li class="breadcrumb-item active text-white" aria-current="page"><?php echo $narasi_item['judul']; ?></li>
	</ol>
</nav>
</section>
<article>
<div id="meta-konten">
<h2><?php echo $narasi_item['judul']; ?></h2>
<p><b> Diterbitkan pada : </b><?php echo $narasi_item['dikirim_pada']; ?></p>
<p><b> Penulis : </b><a href="<?php echo base_url('narasi/user/').preg_replace('/\s+/', '-', str_replace('/','-',strtolower($narasi_item['penulis']))); ?>"><?php echo $narasi_item['penulis'] ?></a> | <b> Editor : </b><?php echo $narasi_item['dikirim_oleh']; ?></p>
<hr>
<blockquote><i><?php echo $narasi_item['keterangan']; ?></i></blockquote>
</div>
<div id="isi-konten">
<div class="isi-konten">
<?php echo $narasi_item['isi']; ?>
</div>
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