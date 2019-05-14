<div id="content-dashboard">
<h2>List Pengguna</h2>
<hr>
<?php
if($this->session->flashdata('hapus_user_berhasil')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('hapus_user_berhasil').'</div>';
} ?>
<?php foreach($user_item as $row) {
    $this->table->add_row($row['id'], $row['nama'], $row['username'], $row['email'], $row['status'], $row['role'], '<a href="updatepengguna/'.$row['id'].'"/"><button class="btn-edited">Ubah</button></a> | 
    	<a href="deletepengguna/'.$row['id'].'"/"><button class="btn-edited">Hapus</button></a>'); 
}

echo $this->table->generate(); ?>
</div>
