<div id="content-dashboard">
<h2>Tambah User</h2>
<hr>
<?php
if($this->session->flashdata('berhasiltambah')) {
	echo '<div class="alert-edited">'.$this->session->flashdata('berhasiltambah').'</div>';
} else {
	echo validation_errors('<div class="alert-edited">','</div>');
}
?>
<?php echo form_open_multipart('pelayanrakyat/dashboard/tambahpengguna') ?>
<label>Nama</label>
<input type="text" name="nama" class="input-buat" required>
<label>Username/Nama pengguna</label>
<input type="text" name="username" class="input-buat" required>
<label>E-mail/Surel</label>
<input type="text" name="email" class="input-buat" required>
<label>Role/Fungsi</label>
<select class="input-buat" name="role" required>
	<option selected>Pilih</option>
	<option name="options[]">Administrator</option>
	<option name="options[]">Riset</option>
	<option name="options[]">Penulis</option>
	<option name="options[]">Editor</option>
</select>
<label>Password/Kata sandi</label>
<input type="password" name="password" class="input-buat" required>
<small class="form-text text-muted">
Password default : pass@sisisilang1.
</small>
<label>Ketik kembali Password/Kata sandi</label>
<input type="password" name="repassword" class="input-buat" required>
<label>Avatar</label>
<input type="file" name="avatar">
<hr>
<button class="btn-edited">Tambah</button>
</form>
</div>