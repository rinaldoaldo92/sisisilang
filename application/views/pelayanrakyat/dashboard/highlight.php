<div id="content-dashboard">
<h2>List Highlight</h2>
<hr>
<?php
if($this->session->flashdata('hapus_highlight_berhasil')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('hapus_highlight_berhasil').'</div>';
} ?>

<?php foreach($highlight_item as $row) {
    $this->table->add_row($row['id'], $row['judul'], $row['slug'], $row['keterangan'], $row['submitted'], $row['submit_on'], '<a href="updatehighlight/'.$row['id'].'"/"><button class="btn-edited">Ubah</button></a> | 
    	<a href="deletehighlight/'.$row['id'].'"/"><button class="btn-edited">Hapus</button></a>'); 
}

echo $this->table->generate(); ?>
</div>
