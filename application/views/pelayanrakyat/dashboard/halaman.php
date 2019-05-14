<div id="content-dashboard">
<h2>List Halaman</h2>
<hr>
<?php
if($this->session->flashdata('hapus_berhasil')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('hapus_berhasil').'</div>';
} ?>

<?php foreach($halaman_item as $row) {
    $this->table->add_row($row['id'], $row['judul'], $row['slug'], $row['submitted'], $row['datetime'], '<a href="updatehalaman/'.$row['id'].'"/"><button class="btn-edited">Ubah</button></a> | 
    	<a href="deletehalaman/'.$row['id'].'"/"><button class="btn-edited">Hapus</button></a> | <a href="/sisisilangnew/konten/'.$row['slug'].'"/"><button class="btn-edited">Lihat</button></a>'); 
}

echo $this->table->generate(); ?>
</div>