<div id="content-dashboard">	
<?php
if($this->session->flashdata('berhasil_ubah_kategori')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('berhasil_ubah_kategori').'</div>';
} elseif($this->session->flashdata('gagal_ubah_highlight')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('gagal_ubah_kategori').'</div>';
} else {
    echo validation_errors('<div class="alert-edited">','</div>');
}
?>
<?php foreach ($kategori as $article) : ?>
<?php echo form_open_multipart('pelayanrakyat/dashboard/updatekategori/'.$article['id'].''); ?>
		<div class="form-konten">
		<label>Judul halaman</label>
		<input type="hidden" name="id" value="<?php echo $article['id']; ?>">
		<input type="text" name="judul" class="input-buat" value="<?php echo $article['judul']; ?>" size="30">
		</div>
		<div class="form-konten">
		<label>Isi halaman</label>
		<textarea name="keterangan" rows="20" cols="50" id="text"><?php echo $article['keterangan']; ?></textarea>
		</div>
		<hr>
		<button class="btn-edited" name="kirim">Ubah</button>
	</form>
<?php endforeach; ?>
</div>