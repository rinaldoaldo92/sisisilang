<div id="masuk">
<h2>Administrator</h2>
<h5>Lupa password/kata sandi?<br>e-mail ke foundthebug@sisi-silang.id.</h5>

<?php
if($this->session->flashdata('sukses')) {
	echo '<div class="alert-edited">'.$this->session->flashdata('sukses').'</div>';
} elseif($this->session->flashdata('salah')) {
	echo '<div class="alert-edited">'.$this->session->flashdata('salah').'</div>';
} else {
	echo validation_errors('<div class="alert-edited">','</div>');
}
?>
<br>
<?php echo form_open('pelayanrakyat/validasi'); ?>
      <div class="form-group">
        <input type="text" name="username" id="username" size="30" class="input-buat placeholder-shown" required>
        <label class="placeholder-shown-code" for="username">Nama pengguna - username</label>
      </div>
      <div class="form-group">
        <input type="password" name="password" id="password" size="30" class="input-buat placeholder-shown" required>
        <label class="placeholder-shown-code" for="password">Kata sandi - password</label>
      </div>
        <hr>
        <button type="submit" name="masuk" class="btn-edited">Masuk</button>
      </form>
      <br>
</div>