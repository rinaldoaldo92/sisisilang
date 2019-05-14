<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Narasi extends CI_Controller {

        public function __construct()
        {

        parent::__construct();
        $this->load->model('artikel');
        $this->load->library('pagination');
        $this->load->model('auth');

        }

        public function view($slug = NULL)
        {
 
        $narasi_item = $this->artikel->get_where(array('slug' => $slug))->row_array();
        $data['narasi_item'] = $narasi_item;

        if (empty($data['narasi_item']))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] =  $narasi_item['judul'].''.' - Narasi | Sisi.silang beta';

        $this->load->view('konten/templates/header', $data);
        $this->load->view('narasi/view', $data);
        $this->load->view('konten/templates/footer', $data);

        }

        public function category($slug = NULL)
        {
                
        if ( ! file_exists(APPPATH.'views/narasi/'.$slug.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] =  'Kategori '.ucfirst($slug).''.' - Narasi | Sisi.silang beta';

        $config['base_url'] = 'http://localhost/sisisilangnew/narasi/'.$slug.'/';
        $config['total_rows'] = $this->db->count_all('tulisansisisilang');
        $config['uri_segment'] = 3;
        $config['per_page'] = 12;
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

        //Generate Siber//

        $siber_item = $this->artikel->limit_mod('Siber', $config['per_page'], $data['page'])->result_array();
        $data['siber_item'] = $siber_item;

        //Generate Kupas//

        $kupas_item = $this->artikel->limit_mod('Kupas', $config['per_page'], $data['page'])->result_array();
        $data['kupas_item'] = $kupas_item;

        //Generate Programming//

        $programming_item = $this->artikel->limit_mod('Programming', $config['per_page'], $data['page'])->result_array();
        $data['programming_item'] = $programming_item;

        //Generate Media//

        $media_item = $this->artikel->limit_mod('Media', $config['per_page'], $data['page'])->result_array();
        $data['media_item'] = $media_item;

        $this->load->view('konten/templates/header', $data);
        $this->load->view('narasi/'.$slug, $data);
        $this->load->view('konten/templates/footer', $data);

        }

        public function user($slug = NULL)
        {
        
        $artikel_item = $this->artikel->select_join()->result_array();
        $user_item = $this->auth->get()->row_array();
        $data['user_item'] = $user_item;
        $data['artikel_item'] = $artikel_item;

        if (empty($data['user_item']))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] =  'Penulis - '.$user_item['nama'].''.' | Sisi.silang beta';

        $this->load->view('konten/templates/header', $data);
        $this->load->view('narasi/user', $data);
        $this->load->view('konten/templates/footer', $data);

        }

        public function penulis($slug = NULL)
        {
        if ( ! file_exists(APPPATH.'views/narasi/penulis.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] =  'Para Penulis | Sisi.silang beta';

        $config['base_url'] = 'http://localhost/sisisilangnew/narasi/penulis/'.$slug.'/';
        $config['total_rows'] = $this->db->count_all('adminsisisilang');
        $config['uri_segment'] = 3;
        $config['per_page'] = 12;
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

        $penulis = $this->auth->limit_mod('Penulis', $config['per_page'], $data['page'])->result_array();
        $data['penulis'] = $penulis;

        $this->load->view('konten/templates/header', $data);
        $this->load->view('narasi/penulis', $data);
        $this->load->view('konten/templates/footer', $data);
        }
}

?>