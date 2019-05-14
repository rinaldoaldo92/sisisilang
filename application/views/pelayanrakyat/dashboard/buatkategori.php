<div id="content-dashboard">	
<?php
if($this->session->flashdata('berhasil_kategori')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('berhasil_kategori').'</div>';
} else {
    echo validation_errors('<div class="alert-edited">','</div>');
}
?>

<?php echo form_open_multipart('pelayanrakyat/dashboard/buatkategori'); ?>
	
	<div class="form-konten">
	<label>Judul kategori</label>
	<input type="text" name="judul" class="input-buat" size="30">
	</div>
	<div class="form-konten">
	<label>Isi kategori</label>
	<textarea name="keterangan" id="text" rows="20" cols="50" class="input-buat"></textarea>
	</div>
	<hr>
	<button class="btn-edited" name="kirim">Kirim</button>
	
	</form>
</div>