<div id="content-dashboard">
<h2>Buat Tulisan</h2>
<hr>
<?php
if($this->session->flashdata('berhasil_ubah_artikel')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('berhasil_ubah_artikel').'</div>';
} else {
    echo validation_errors('<div class="alert-edited">','</div>');
}
?>
<?php foreach ($articles as $article) : ?>
<?php echo form_open_multipart('pelayanrakyat/dashboard/updateartikel/'.$article['id'].''); ?>

    <input type="hidden" name="id" value="<?php echo $article['id']; ?>">

    <div class="form-konten">
    <label>Judul tulisan</label>
    <input type="text" name="judul" size="30" class="input-buat" value="<?php echo $article['judul'] ?>"><br><br>
    </div>

    <div class="form-konten">
    <label>Isi tulisan</label>
    <textarea type="text" name="isi" id="text" size="30" class="input-buat"><?php echo $article['isi'] ?></textarea><br><br>
    </div>

    <div class="form-konten">
    <label>Keterangan</label>
    <textarea type="text" name="keterangan" id="caption" size="30" class="input-buat"><?php echo $article['keterangan'] ?></textarea>
    </div>

    <div class="form-konten">
    <label>Kategori</label>
    <input type="text" name="kategori" size="30" class="input-buat" value="<?php echo $article['kategori'] ?>"><br><br>
    </div>

    <div class="form-konten">
    <label>Tag</label>
    <input type="text" name="tag" size="30" class="input-buat" value="<?php echo $article['tag'] ?>"><br><br>
    </div>

    <div class="form-konten">
    <label for="gambar">Gambar utama</label>
    <input type="file" name="gambar" size="30" class="input-buat"><br><br>
    </div>
    <button class="btn-edited" name="kirim">Ubah</button>

</form>
<?php endforeach; ?>
</div>