<div id="content-dashboard">	
<?php
if($this->session->flashdata('berhasil_highlight')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('berhasil_highlight').'</div>';
} else {
    echo validation_errors('<div class="alert-edited">','</div>');
}
?>

<?php echo form_open_multipart('pelayanrakyat/dashboard/buathighlight'); ?>
	
	<div class="form-konten">
	<label>Judul highlight</label>
	<input type="text" name="judul" class="input-buat" size="30">
	</div>
	<div class="form-konten">
	<label>Isi highlight</label>
	<textarea name="keterangan" id="text" rows="20" cols="50" class="input-buat"></textarea>
	</div>
	<div class="form-konten">
	<label>Upload gambar pendukung</label>
	<input type="file" name="gambar" class="input-buat">
	</div>
	<hr>
	<button class="btn-edited" name="kirim">Kirim</button>
	
	</form>
</div>