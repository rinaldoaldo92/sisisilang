<div id="content-dashboard">

<h2>Buat Tulisan</h2>
<hr>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('news/create'); ?>

    <label>Title</label>
    <input type="text" name="title" size="30" class="input-buat"/><br><br>

    <label>Text</label>
    <textarea name="text" id="text" size="30" class="input-buat"></textarea><br><br>

    <label>Caption</label>
    <textarea name="caption" id="caption" size="30" class="input-buat"></textarea><br><br>

    <label>Category</label>
    <input type="text" name="category" size="30" class="input-buat"><br><br>

    <label>Tags</label>
    <input type="text" name="tags" size="30" class="input-buat"><br><br>

    <label for="pictures">Pictures</label>
    <input type="file" name="pictures" size="30" class="input-buat"><br><br>

    <input type="submit" class="btn-edited" name="submit" value="Kirim" />

</form>
</div>