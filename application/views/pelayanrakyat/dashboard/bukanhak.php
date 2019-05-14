<div id="content-dashboard" style="height: 450px;">
<?php if($this->session->flashdata('bukan_hak')) {
    echo '<div class="alert-edited">'.$this->session->flashdata('bukan_hak').'</div>';
} ?>

</div>