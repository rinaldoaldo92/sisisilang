<div id="content-dashboard">
<h2>List Menu</h2>
<hr>
<?php
if($this->session->flashdata('hapus_menu_berhasil')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('hapus_menu_berhasil').'</div>';
} ?>

<?php foreach($menu_item as $row) {
    $this->table->add_row($row['id'], $row['judul'], $row['slug'], $row['posisi'], '<a href="updatemenu/'.$row['id'].'"/"><button class="btn-edited">Ubah</button></a> | 
    	<a href="deletemenu/'.$row['id'].'"/"><button class="btn-edited">Hapus</button></a>'); 
}

echo $this->table->generate(); ?>
</div>
