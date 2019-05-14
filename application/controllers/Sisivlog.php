<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sisivlog extends CI_Controller {

public function view($slug = NULL)
{
        if ( ! file_exists(APPPATH.'views/sisivlog/'.$slug.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = 'SisiVlog | Sisi.silang';

        $this->load->view('konten/templates/header', $data);
        $this->load->view('sisivlog/'.$slug, $data);
        $this->load->view('konten/templates/footer', $data);
}
}

?>