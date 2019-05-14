<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten extends CI_Controller {

        public function __construct() {
                parent::__construct();
                $this->load->model('artikel');
                $this->load->library('parser');
                $this->load->model('halaman');
                $this->load->model('highlight');
        }

        public function beranda($page = 'index')
        {
                if ( ! file_exists(APPPATH.'views/konten/index.php'))
                {
                        // Whoops, we don't have a page for that!
                        show_404();
                }

                //Generate Highlight//
                $highlight = $this->highlight->order_limit(3)->row_array();
                $data['highlight'] = $highlight;

                //Generate Siber//

                $siber_item = $this->artikel->order_limit('Siber', 5)->result_array();
                $data['siber_item'] = $siber_item;

                //Generate Kupas//

                $kupas_item = $this->artikel->order_limit('Kupas', 4)->result_array();
                $data['kupas_item'] = $kupas_item;

                //Generate Programming//

                $programming_item = $this->artikel->order_limit('Programming', 5)->result_array();
                $data['programming_item'] = $programming_item;

                //Generate Media//

                $media_item = $this->artikel->order_limit('Media', 5)->result_array();
                $data['media_item'] = $media_item;

                //Generate Rekomendasi//

                //Generate Banyak Dibaca//

                //Generate Infografis//

                $infografis = $this->artikel->order_limit('Infografis', 3)->result_array();
                $data['infografis'] = $infografis;


                $data['title'] = 'Beranda | Sisi.silang beta';

                $this->load->view('konten/templates/header', $data);
                $this->load->view('konten/index', $data);
                $this->load->view('konten/templates/footer', $data);
        }

        public function landing($page = 'landing')
        {
                if ( ! file_exists(APPPATH.'views/konten/'.$page.'.php'))
                {
                        // Whoops, we don't have a page for that!
                        show_404();
                }

                $data['title'] = 'Hei, inilah yang baru dari kami.';

                $this->load->view('konten/templates/header_landing', $data);
                $this->load->view('konten/landing', $data);
                $this->load->view('konten/templates/footer_landing', $data);
        }
        
        public function halaman($slug = NULL)
        {

                $halaman_item = $this->halaman->get_where(array('slug' => $slug))->row_array();
                $data['halaman_item'] = $halaman_item;

                if (empty($data['halaman_item']))
                {
                        show_404();
                }

                $data['title'] =  $halaman_item['judul'].''.' | Sisi.silang beta';

                $this->load->view('konten/templates/header', $data);
                $this->load->view('konten/halaman', $data);
                $this->load->view('konten/templates/footer');
        }

}
?>
