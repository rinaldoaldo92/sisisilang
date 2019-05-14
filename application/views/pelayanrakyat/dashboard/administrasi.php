<div id="content-dashboard">
<h2>List Artikel</h2>
<hr>
<?php
if($this->session->flashdata('hapus_artikel_berhasil')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('hapus_artikel_berhasil').'</div>';
} ?>

<?php foreach($tulisan_item as $row) {
    $this->table->add_row($row['id'], $row['judul'], $row['slug'], $row['penulis'], $row['dikirim_oleh'], $row['dikirim_pada'],  '<a href="updateartikel/'.$row['id'].'"/"><button class="btn-edited">Ubah</button></a> | 
    	<a href="deleteartikel/'.$row['id'].'"/"><button class="btn-edited">Hapus</button></a> | <a href="/sisisilangnew/narasi/view/'.$row['slug'].'"/"><button class="btn-edited">Lihat</button></a>'
); }

echo $this->table->generate(); ?>
</div>
