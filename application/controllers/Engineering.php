<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Engineering extends CI_Controller {

public function engineer($slug = NULL)
{
        if ( ! file_exists(APPPATH.'views/engineering/'.$slug.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($slug); // Capitalize the first letter

        $this->load->view('engineering/templates/header', $data);
        $this->load->view('engineering/'.$slug, $data);
        $this->load->view('engineering/templates/footer', $data);
}
}
?>
