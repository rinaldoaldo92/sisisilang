<div id="konten">
<div id="list-konten">
<?php foreach ($news as $news_item): ?>
		<img class="img-fluid rounded gambar-pendukung" src="<?php echo $news_item['gambar']; ?>" alt="gambar-pendukung">
		<div class="judul-caption">
        <h5><?php echo $news_item['judul']; ?></h5>
        <p><?php echo $news_item['caption']; ?></p>
        <a href="<?php echo base_url('news/'.$news_item['slug']); ?>"><button class="btn-edited">Selengkapnya</button></a>
    </div>
<?php endforeach; ?>
</div>
</div>
