<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testautocomplete extends CI_Controller {

public function __construct() {
	parent::__construct();
	$this->load->model('kategori_model');
}

        public function get_autocomplete() {

            if(isset($_GET['kategori'])) {
                $result = $this->kategori_model->judul($_GET['kategori']);
                if(count($result) > 0) {
                    foreach($result as $row)
                        $arr_result[] = $row->judul;
                    echo json_encode($arr_result);
                }
            }

                $this->load->view('testautocomplete/index');
        $this->load->view('testautocomplete/templates/footer');

        }
}
?>
