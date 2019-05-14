<div id="content-dashboard">
<div class="row">
<div class="md-col-6" id="konten">
<h2>Profil Admin</h2>
<hr>
<div class="form-konten">
<label>Nama</label>
<input type="text" value="<?php echo $this->session->userdata('nama'); ?>" readonly class="input-buat" size="30">
</div>
<div class="form-konten">
<label>Username</label>
<input type="text" value="<?php echo $this->session->userdata('username'); ?>" readonly class="input-buat" size="30">
</div>
<div class="form-konten">
<label>E-mail/surel</label>
<input type="text" value="<?php echo $this->session->userdata('email'); ?>" readonly class="input-buat" size="30">
</div>
<div class="form-konten">
<label>Role</label>
<input type="text" value="<?php echo $this->session->userdata('role'); ?>" readonly class="input-buat" size="30">
</div>
<hr>
<?php
if($this->session->flashdata('berhasil')) {
	echo '<div class="alert-edited">'.$this->session->flashdata('berhasil').'</div>';
} elseif($this->session->flashdata('gagal')) {
	echo '<div class="alert-edited">'.$this->session->flashdata('gagal').'</div>';
} else {
	echo validation_errors('<div class="alert-edited">','</div>');
}
?>
<?php echo form_open('pelayanrakyat/dashboard/profil') ?>
<div class="form-konten">
<label>Facebook</label>
<input type="url" name="facebook" value="<?php echo $this->session->userdata('facebook'); ?>" class="input-buat" size="30">
<small class="form-text text-muted">
Cara isinya seperti ini : http://fb.com/username.
</small>
</div>
<div class="form-konten">
<label>Twitter</label>
<input type="url" name="twitter" value="<?php echo $this->session->userdata('twitter'); ?>" class="input-buat" size="30">
<small class="form-text text-muted">
Cara isinya seperti ini : http://twitter.com/username.
</small>
</div>
<div class="form-konten">
<label>Instagram</label>
<input type="url" name="instagram" value="<?php echo $this->session->userdata('instagram'); ?>" class="input-buat" size="30">
<small class="form-text text-muted">
Cara isinya seperti ini : http://instagram.com/username.
</small>
</div>
<div class="form-konten">
<label>Bio</label>
<textarea type="text" name="bio" class="input-buat" rows="5" cols="35"><?php echo $this->session->userdata('bio'); ?></textarea>
</div>
<br>
<button class="btn-edited">Ganti</button>
</form>
</div>
<div class="md-col-4" id="konten">
<h2>Ganti Foto</h2>
<hr>
<img src="<?php echo base_url('assets/img/avatar/') . $this->session->userdata('avatar'); ?>" alt="foto-admin" class="img-fluid img-avatar">
<br>
<br>
<?php
if($this->session->flashdata('ganti_avatar')) {
	echo '<div class="alert-edited">'.$this->session->flashdata('ganti_avatar').'</div>';
} elseif($this->session->flashdata('gagal_avatar')) {
	echo '<div class="alert-edited">'.$this->session->flashdata('gagal_avatar').'</div>';
} elseif ($this->session->flashdata('gambar_tak_tersedia')) {
	echo '<div class="alert-edited">'.$this->session->flashdata('gambar_tak_tersedia').'</div>';
}
?>
<?php echo form_open_multipart('pelayanrakyat/dashboard/gantiava') ?>
<label>Ganti avatar</label>
<input type="file" name="avatar" id="avatar" required>
<br>
<button class="btn-edited">Ganti</button>
</form>
</div>
<div class="md-col-2" id="konten">
<h3>Ubah Password/Kata sandi</h3>
<hr>
<p>Gunakan nama pengguna/username untuk request.</p>
<?php echo form_open_multipart('pelayanrakyat/dashboard/ubahpass') ?>
<div class="form-group">
<input type="text" name="username" cols="30" class="input-buat placeholder-shown" required>
<label class="placeholder-shown-code" for="username">Username</label>
</div>
<button class="btn-edited">Ubah Password</button>
</form>
</div>
</div>
</div>
