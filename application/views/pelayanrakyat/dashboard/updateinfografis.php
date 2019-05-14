<div id="content-dashboard">	
<?php
if($this->session->flashdata('berhasil_ubah_infografis')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('berhasil_ubah_infografis').'</div>';
} elseif($this->session->flashdata('gagal_ubah_infografis')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('gagal_ubah_infografis').'</div>';
} else {
    echo validation_errors('<div class="alert-edited">','</div>');
}
?>
<?php foreach ($infografis as $article) : ?>
<?php echo form_open_multipart('pelayanrakyat/dashboard/updateinfografis/'.$article['id'].''); ?>
		<div class="form-konten">
		<label>Judul infografis</label>
		<input type="hidden" name="id" value="<?php echo $article['id']; ?>">
		<input type="text" name="judul" class="input-buat" value="<?php echo $article['judul']; ?>" size="30">
		</div>
		<div class="form-konten">
		<label>Keterangan</label>
		<textarea name="keterangan" id="caption" rows="20" cols="50" id="text"><?php echo $article['keterangan']; ?></textarea>
		</div>
		<div class="form-konten">
		<label>Kategori</label>
		<input type="text" name="kategori" class="input-buat" value="<?php echo $article['kategori']; ?>" size="30">
		</div>
		<div class="form-konten">
		<label>Tag</label>
		<input type="text" name="tag" class="input-buat" value="<?php echo $article['tag']; ?>" size="30">
		</div>
		<div class="form-konten">
		<label>gambar pendukung</label>
		<img src="<?php echo $article['gambar'] ?>" class="input-buat">
		</div>
		<hr>
		<button class="btn-edited" name="kirim">Ubah</button>
	</form>
<?php endforeach; ?>
</div>