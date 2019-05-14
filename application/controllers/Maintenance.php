<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends CI_Controller {

public function view($slug = NULL)
{
        if ( ! file_exists(APPPATH.'views/maintenance/'.$slug.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($slug); // Capitalize the first letter

        $this->load->view('konten/templates/header', $data);
        $this->load->view('maintenance/'.$slug, $data);
        $this->load->view('konten/templates/footer', $data);
}
}

?>