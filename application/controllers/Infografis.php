<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Infografis extends CI_Controller {

        public function __construct()
        {

        parent::__construct();
        $this->load->model('artikel');
        $this->load->library('pagination');

        }

        public function category($slug = NULL)
        {
        if ( ! file_exists(APPPATH.'views/infografis/index.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] =  'Infografis Arsip | Sisi.silang beta';

        $config['base_url'] = 'http://localhost/sisisilangnew/infografis/'.$slug.'/';
        $config['total_rows'] = $this->db->count_all('tulisansisisilang');
        $config['uri_segment'] = 3;
        $config['per_page'] = 8;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);

        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Lanjut';
        $config['prev_link'] = 'Kembali';
        $config['full_tag_open'] = '<div id="konten"><div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div></div>';
        $config['cur_tag_open'] = '<li class="page-item"><span class="page-link btn-edited">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link btn-edited">';
        $config['num_tag_close'] = '</span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link btn-edited">';
        $config['prev_tag1_close'] = '</span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link btn-edited">';
        $config['next_tag1_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link btn-edited">';
        $config['first_tag1_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link btn-edited">';
        $config['last_tag1_close'] = '</span></li>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //Generate List Infografis//

        $infografis = $this->artikel->limit_mod('Infografis', $config['per_page'], $data['page'])->result_array();
        $data['infografis'] = $infografis;

        $data['title'] = 'Infografis | Sisi.silang beta';

        $this->load->view('konten/templates/header', $data);
        $this->load->view('infografis/index', $data);
        $this->load->view('konten/templates/footer', $data);
}

        public function view($slug = NULL)
        {

        $infografis_item = $this->artikel->get_where(array('slug' => $slug), $this->db->having('kategori', 'Infografis'))->row_array();
        $data['infografis_item'] = $infografis_item;

        if (empty($data['infografis_item']))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] =  $infografis_item['judul'].''.' - Infografis | Sisi.silang beta';

        $this->load->view('konten/templates/header', $data);
        $this->load->view('infografis/view', $data);
        $this->load->view('konten/templates/footer', $data);
}

}

?>