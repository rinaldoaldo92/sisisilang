<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_news($slug = FALSE)
        {
        
        if ($slug === FALSE)
        {
                $query = $this->db->get('tulisansisisilang');
                return $query->result_array();
        }

        $query = $this->db->get_where('tulisansisisilang', array('slug' => $slug));
        return $query->row_array();

        }

        public function set_news()
        {
        $this->load->library("upload");
            $this->load->helper('url');
            $slug = url_title($this->input->post('title'),'dash',TRUE);
            $config['upload_path'] = './img/media/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|PNG|jpeg';
            $this->upload->initialize($config); 
            $this->upload->do_upload('pictures');
            $image_data = $this->upload->data();
            $pictures = $image_data['file_name'];
            $data = array(
                'title' => $this->input->post('title'),
                'text' => $this->input->post('text'),
                'category' => $this->input->post('category'),
                'tags' => $this->input->post('tags'),
                'caption' => $this->input->post('caption'),
                'slug' => $slug,
                'pictures' => $pictures
            );
    return $this->db->insert('tulisansisisilang', $data);
        }
    }