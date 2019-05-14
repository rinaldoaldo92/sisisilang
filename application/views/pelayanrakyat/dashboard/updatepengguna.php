<div id="content-dashboard">
<h2>Update Data User</h2>
<hr>
<?php
if($this->session->flashdata('berhasil_pengguna')) {
	echo '<div class="alert-edited">'.$this->session->flashdata('berhasil_pengguna').'</div>';
} elseif ($this->session->flashdata('gagal_pengguna')){
	echo '<div class="alert-edited">'.$this->session->flashdata('gagal_pengguna').'</div>';
} else {
	echo validation_errors('<div class="alert-edited">','</div>');
}
?>
<?php foreach ($datapengguna as $pengguna) : ?>
<?php echo form_open_multipart('pelayanrakyat/dashboard/updatepengguna/'.$pengguna['id'].'') ?>
<input type="hidden" name="id" value="<?php echo $pengguna['id']; ?>">
<div class="form-konten">
<label>Nama</label>
<input type="text" name="nama" class="input-buat" value="<?php echo $pengguna['nama']; ?>" disabled>
</div>
<div class="form-konten">
<label>Username/Nama pengguna</label>
<input type="text" name="username" class="input-buat" value="<?php echo $pengguna['username']; ?>" disabled>
</div>
<div class="form-konten">
<label>E-mail/Surel</label>
<input type="text" name="email" class="input-buat" value="<?php echo $pengguna['email']; ?>" disabled>
</div>
<div class="form-konten">
<label>Role/Fungsi</label>
<select class="input-buat" name="role" required>
	<option><?php echo $pengguna['role']; ?></option>
	<option name="options[]">Administrator</option>
	<option name="options[]">Riset</option>
	<option name="options[]">Penulis</option>
	<option name="options[]">Editor</option>
</select>
</div>
<div class="form-konten">
<label>Status</label>
<select class="input-buat" name="status" required>
	<option><?php echo $pengguna['status']; ?></option>
	<option name="options[]">ON</option>
	<option name="options[]">OFF</option>
</select>
</div>
<hr>
<button class="btn-edited">Ubah</button>
</form>
<?php endforeach; ?>
</div>