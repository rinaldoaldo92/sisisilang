<div id="content-dashboard">
<h2>Buat Tulisan</h2>
<hr>
<?php
if($this->session->flashdata('berhasil_buat')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('berhasil_buat').'</div>';
} else {
    echo validation_errors('<div class="alert-edited">','</div>');
}
?>

<?php echo form_open_multipart('pelayanrakyat/dashboard/buat'); ?>

    <div class="form-konten">
    <label>Judul tulisan</label>
    <input type="text" name="judul" size="30" class="input-buat"/>
    </div>
    <div class="form-konten">
    <label>Isi tulisan</label>
    <textarea type="text" name="isi" id="text" rows="15" cols="50" class="input-buat"></textarea>
    </div>
    <div class="form-konten">
    <label>Keterangan</label>
    <textarea type="text" name="keterangan" id="caption" rows="15" cols="50" class="input-buat"></textarea>
    </div>
    <div class="form-konten">
    <label>Kategori</label>
    <input type="text" name="kategori" id="kategori" size="30" class="input-buat">
    </div>
    <div class="form-konten">
    <label>Tag</label>
    <input type="text" name="tag" size="30" class="input-buat">
    </div>
    <div class="form-konten">
    <label>Penulis</label>
    <input type="text" name="penulis" size="30" class="input-buat">
    </div>
    <div class="form-konten">
    <label for="gambar">Gambar utama</label>
    <input type="file" name="gambar" size="30" class="input-buat">
    </div>
    <hr>
    <input type="submit" class="btn-edited" name="kirim" value="Kirim" />

</form>
</div>