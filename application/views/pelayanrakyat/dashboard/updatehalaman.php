<div id="content-dashboard">	
<?php
if($this->session->flashdata('berhasil')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('berhasil').'</div>';
} elseif($this->session->flashdata('gagal')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('gagal').'</div>';
} else {
    echo validation_errors('<div class="alert-edited">','</div>');
}
?>
<?php foreach ($articles as $article) : ?>
<?php echo form_open_multipart('pelayanrakyat/dashboard/updatehalaman/'.$article['id'].''); ?>
		<label>Judul halaman</label>
		<input type="hidden" name="id" value="<?php echo $article['id']; ?>">
		<input type="text" name="judul" class="input-buat" value="<?php echo $article['judul']; ?>" size="30"><br><br>
		<label>Isi halaman</label>
		<textarea name="keterangan" rows="20" cols="50" id="text"><?php echo $article['keterangan']; ?></textarea><br><br>
		<label>Upload gambar pendukung</label>
		<input type="file" name="gambar" class="input-buat">
		<br><br>
		<button class="btn-edited" name="kirim">Ubah</button>
	</form>
<?php endforeach; ?>
</div>