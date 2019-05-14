<div id="konten">
<nav aria-label="breadcrumb">
	<ol class="breadcrumb bg-dark">
		<li class="breadcrumb-item" aria-current="page"><a href="<?php echo base_url("news");?>">Beranda</a></li>
		<li class="breadcrumb-item active" aria-current="page"><?php echo $news_item['title']; ?></li>
	</ol>
</nav>

<?php
echo '<div id="meta-konten">';
echo '<h2>'.$news_item['title'].'</h2>';
echo 'Diterbitkan pada <p>'.$news_item['datetime'].'</p>';
echo 'Diubah pada <p>'.$news_item['datetime'].'</p>';
echo 'Penulis <img src="" alt="avatar"> <p>'.$news_item['submitted'].'</p><hr>';
echo '<blockquote><i>'.$news_item['caption'].'</i></blockquote>';
echo '</div>';
echo '<div id="isi-konten">';
echo '<p>'.$news_item['pictures'].'</p>';
echo '<p>'.$news_item['text'].'</p>';
echo '</div>';
?>
</div>