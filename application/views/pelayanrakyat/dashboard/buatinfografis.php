<div id="content-dashboard">	
<?php
if($this->session->flashdata('berhasil_infografis')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('berhasil_infografis').'</div>';
} else {
    echo validation_errors('<div class="alert-edited">','</div>');
}
?>

<?php echo form_open_multipart('pelayanrakyat/dashboard/buatinfografis'); ?>
	
	<div class="form-konten">
	<label>Judul infografis</label>
	<input type="text" name="judul" class="input-buat" size="30">
	</div>
	<div class="form-konten">
	<label>Keterangan</label>
	<textarea name="keterangan" id="caption" rows="20" cols="50" class="input-buat"></textarea>
	</div>
	<div class="form-konten">
	<label>Kategori</label>
	<input type="text" name="kategori" class="input-buat">
	</div>
	<div class="form-konten">
	<label>Tag</label>
	<input type="text" name="tag" class="input-buat">
	</div>
	<div class="form-konten">
	<label>Upload gambar pendukung</label>
	<input type="file" name="gambar" class="input-buat">
	</div>
	<hr>
	<button class="btn-edited" name="kirim">Kirim</button>
	
	</form>
</div>