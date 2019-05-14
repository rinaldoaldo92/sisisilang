<div id="content-dashboard">
<h2>List Kategori</h2>
<hr>
<?php
if($this->session->flashdata('hapus_kategori_berhasil')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('hapus_kategori_berhasil').'</div>';
} ?>

<?php foreach($kategori_item as $row) {
    $this->table->add_row($row['id'], $row['judul'], $row['slug'], $row['keterangan'], $row['submitted'], '<a href="updatekategori/'.$row['id'].'"/"><button class="btn-edited">Ubah</button></a> | 
    	<a href="deletekategori/'.$row['id'].'"/"><button class="btn-edited">Hapus</button></a>'); 
}

echo $this->table->generate(); ?>
</div>
