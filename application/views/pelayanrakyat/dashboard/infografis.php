<div id="content-dashboard">
<h2>List Infografis</h2>
<hr>
<?php
if($this->session->flashdata('hapus_infografis_berhasil')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('hapus_infografis_berhasil').'</div>';
} ?>

<?php foreach($infografis as $row) {
    $this->table->add_row($row['id'], $row['judul'], $row['slug'], $row['submitted'], $row['submit_on'], '<a href="updateinfografis/'.$row['id'].'"/"><button class="btn-edited">Ubah</button></a> | 
    	<a href="deleteinfografis/'.$row['id'].'"/"><button class="btn-edited">Hapus</button></a>'); 
}

echo $this->table->generate(); ?>
</div>
