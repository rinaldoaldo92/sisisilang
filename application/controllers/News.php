<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url_helper');
                $this->load->library('pagination');
        }

        public function index()
        {
                $data['news'] = $this->news_model->get_news();

                $this->load->view('konten/templates/header', $data);
                $this->load->view('news/index', $data);
                $this->load->view('konten/templates/footer');
        }

        public function view($slug = NULL)
        {
                $data['news_item'] = $this->news_model->get_news($slug);

                if (empty($data['news_item']))
                {
                        show_404();
                }

                $data['judul'] = $data['news_item']['judul'];

                $this->load->view('konten/templates/header', $data);
                $this->load->view('news/view', $data);
                $this->load->view('konten/templates/footer');
        }

        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['title'] = 'Add Article';
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('text', 'Text', 'required');
            $this->form_validation->set_rules('caption', 'Caption', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('tags', 'Tags', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('konten/templates/header', $data);
                $this->load->view('news/create', $data);
                $this->load->view('konten/templates/footer', $data);
            }
            else
            {
                $this->load->model('news_model');
                $this->news_model->set_news();
                redirect('news', 'refresh');

        }
    }
}
?>