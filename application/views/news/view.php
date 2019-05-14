<div id="konten">
<nav aria-label="breadcrumb">
	<ol class="breadcrumb bg-dark">
		<li class="breadcrumb-item" aria-current="page"><a href="<?php echo base_url("news");?>">Beranda</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?php echo $news_item['judul']; ?></li>
	</ol>
</nav>

<?php
echo '<div id="meta-konten">';
echo '<h2>'.$news_item['judul'].'</h2>';
echo 'Diterbitkan pada <p>'.$news_item['submit_on'].'</p>';
echo 'Penulis <img src="" alt="avatar"> <p>'.$news_item['submitted'].'</p><hr>';
echo '<blockquote><i>'.$news_item['caption'].'</i></blockquote>';
echo '</div>';
echo '<div id="isi-konten">';
echo '<img src='.$news_item['gambar'].'></img>';
echo '<p>'.$news_item['keterangan'].'</p>';
echo '</div>';
?>
</div>