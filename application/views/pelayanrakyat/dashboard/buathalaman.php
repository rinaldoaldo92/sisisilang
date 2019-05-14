<div id="content-dashboard">	
<?php
if($this->session->flashdata('berhasil_halaman')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('berhasil_halaman').'</div>';
} else {
    echo validation_errors('<div class="alert-edited">','</div>');
}
?>


<?php echo form_open('pelayanrakyat/buathalaman'); ?>
	<div class="form-konten">
		<label>Judul halaman</label>
		<input type="text" name="judul" class="input-buat" size="30">
	</div>
	<div class="form-konten">
		<label>Isi halaman</label>
		<textarea name="keterangan" id="text" rows="10" cols="40" class="input-buat"></textarea>
	</div>
	<div class="form-konten">
		<label>Upload gambar pendukung</label>
		<input type="file" name="gambar" class="input-buat">
	</div>
	<hr>
		<button class="btn-edited" name="submit">Kirim</button>
	</form>
</div>