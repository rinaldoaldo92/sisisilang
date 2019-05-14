<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelayanrakyat extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('artikel');
                $this->load->model('auth');
                $this->load->model('halaman');
                $this->load->model('kategori');
                $this->load->model('menu');
                $this->load->model('highlight');
                $this->load->library('pagination');
                $this->load->library('table');
                $this->load->library('form_validation');
                $this->load->library('upload');
                $this->load->library('session');
                $this->load->helper('url');
                $this->load->helper('form');
                $this->load->helper('date');
        }

        public function utama($slug = NULL) {
        
        if ( ! file_exists(APPPATH.'views/pelayanrakyat/'.$slug.'.php')) {
        // Whoops, we don't have a page for that!
        show_404();
        }

        $data['title'] = 'Login Pelayan Rakyat/Administrator | Sisi.silang';

        $this->load->view('pelayanrakyat/templates/header', $data);
        $this->load->view('pelayanrakyat/'.$slug, $data);
        $this->load->view('pelayanrakyat/templates/footer'); 
        
        }

        public function validasi()  {

        $config['title'] = 'Login Pelayan Rakyat/Administrator | Sisi.silang';

        $this->form_validation->set_rules('username', 'Username', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('pelayanrakyat/templates/header'. $config);
            $this->load->view('pelayanrakyat/index');
            $this->load->view('pelayanrakyat/templates/footer'); 
        } 

        else {
            // Mengambil data dari form login dengan method POST
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Jalankan function cekAkun pada auth
            $query = $this->auth->cekAkun($username, $password);
                
            // Jika query gagal maka return false
            if (!$query) {
                // Mengatur pesan error validasi data
                $this->session->set_flashdata('salah', 'Username dan/atau password yang diketik salah? <br> Anda/kamu belum melakukan verifikasi akun di e-mail? <br> Silahkan dicek kembali.');

                $this->load->view('pelayanrakyat/templates/header', $config);
                $this->load->view('pelayanrakyat/index');
                $this->load->view('pelayanrakyat/templates/footer'); 
                }

                // Jika berhasil maka set user session dan return true
                else {
                // data user dalam bentuk array
                $userData = array(
                        'id' => $query->id,
                        'username' => $query->username,
                        'avatar' => $query->avatar,
                        'nama' => $query->nama,
                        'role' => $query->role,
                        'email' => $query->email,
                        'facebook' => $query->facebook,
                        'twitter' => $query->twitter,
                        'instagram' => $query->instagram,
                        'bio' => $query->bio
                );
                                        
                // set session untuk user
                $this->session->set_userdata($userData);

                redirect('pelayanrakyat/dashboard');
                }
        }

        }

        public function logout() {

        // Hapus semua data pada session
        session_destroy();

        // redirect ke halaman login        
        redirect('pelayanrakyat');
        
        }

        public function administrator($slug = NULL) {

        if ( ! file_exists(APPPATH.'views/pelayanrakyat/dashboard/'.$slug.'.php'))
        {
        // Whoops, we don't have a page for that!
        show_404();
        }

        $data['title'] =  ucfirst($slug).''.' - Pelayan Rakyat | Sisi.silang';

        $this->load->view('pelayanrakyat/dashboard/templates/header', $data);
        $this->load->view('pelayanrakyat/dashboard/'.$slug, $data);
        $this->load->view('pelayanrakyat/dashboard/templates/footer');

        }

        public function beranda()
        {
            
        //Generate List Tulisan//

        $articles = $this->artikel->order_limit('Media', 5)->result_array();
        $data['articles'] = $articles;


        $articles_indepth = $this->artikel->order_limit('Indepth', 5)->result_array();
        $data['articles_indepth'] = $articles_indepth;


        $articles_siber = $this->artikel->order_limit('Siber', 5)->result_array();
        $data['articles_siber'] = $articles_siber;

        //Generate List Halaman//

        $halaman = $this->halaman->order_limit_mod(5)->result_array();
        $data['halaman'] = $halaman;

        //Generate List Penulis//

        $kontributor = $this->auth->order_limit('Penulis', 5)->result_array();
        $data['kontributor'] = $kontributor;

        $data['title'] = 'Beranda - Pelayan Rakyat | Sisi.silang';

        $this->load->view('pelayanrakyat/dashboard/templates/header', $data);
        $this->load->view('pelayanrakyat/dashboard/beranda', $data);
        $this->load->view('pelayanrakyat/dashboard/templates/footer');

        }

        public function halaman() {


        $halaman_item = $this->halaman->get()->result_array();
        $data['halaman_item'] = $halaman_item;

        $template = array(
        'table_open'            => '<table class="table table-striped table-responsive">',
        'table_close'           => '</table>'
        );

        $this->table->set_template($template);

        $this->table->set_heading('ID', 'Judul', 'Slug', 'Penulis', 'Dibuat pada', 'Action');

        $data['title'] =  'List Halaman - Pelayan Rakyat | Sisi.silang';

        $this->load->view('pelayanrakyat/dashboard/templates/header', $data, $template);
        $this->load->view('pelayanrakyat/dashboard/halaman', $data, $template);
        $this->load->view('pelayanrakyat/dashboard/templates/footer');

        }

        public function listpengguna() {

        $config['title'] = 'List Pengguna - Pelayan Rakyat | Sisi.silang';

        if($this->session->userdata('role') != 'Administrator') {
            $this->session->set_flashdata('bukan_hak', 'Mohon maaf, kamu/anda tidak bisa mengakses halaman ini. Terima kasih.');

            $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
            $this->load->view('pelayanrakyat/dashboard/bukanhak');
            $this->load->view('pelayanrakyat/dashboard/templates/footer'); 

        } else {

        $user_item = $this->auth->get()->result_array();
        $data['user_item'] = $user_item;

        $template = array(
        'table_open'            => '<table class="table table-striped table-responsive">',
        'table_close'           => '</table>'
        );

        $this->table->set_template($template);

        $this->table->set_heading('ID', 'Nama', 'Username', 'Email', 'Status', 'Role', 'Action');

        $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
        $this->load->view('pelayanrakyat/dashboard/listpengguna', $data, $template);
        $this->load->view('pelayanrakyat/dashboard/templates/footer');

        }
    }

        public function highlight() {

        $highlight_item = $this->highlight->get()->result_array();
        $data['highlight_item'] = $highlight_item;

        $template = array(
        'table_open'            => '<table class="table table-striped table-responsive">',
        'table_close'           => '</table>'
        );

        $this->table->set_template($template);

        $this->table->set_heading('ID', 'Judul', 'Slug', 'Keterangan', 'Submitted', 'Submit On', 'Action');

        $data['title'] =  'List Highlight - Pelayan Rakyat | Sisi.silang';

        $this->load->view('pelayanrakyat/dashboard/templates/header', $data, $template);
        $this->load->view('pelayanrakyat/dashboard/highlight', $data, $template);
        $this->load->view('pelayanrakyat/dashboard/templates/footer');

        }

        public function kategori() {

        $kategori_item = $this->kategori->get()->result_array();
        $data['kategori_item'] = $kategori_item;

        $template = array(
        'table_open'            => '<table class="table table-striped table-responsive">',
        'table_close'           => '</table>'
        );

        $this->table->set_template($template);

        $this->table->set_heading('ID', 'Judul', 'Slug', 'Keterangan', 'Dibuat oleh', 'Action');

        $data['title'] =  'List Kategori - Pelayan Rakyat | Sisi.silang';

        $this->load->view('pelayanrakyat/dashboard/templates/header', $data, $template);
        $this->load->view('pelayanrakyat/dashboard/kategori', $data, $template);
        $this->load->view('pelayanrakyat/dashboard/templates/footer');

        }

        public function tulis() {

        $tulisan_item = $this->artikel->get()->result_array();
        $data['tulisan_item'] = $tulisan_item;

        $template = array(
        'table_open'            => '<table class="table table-striped table-responsive">',
        'table_close'           => '</table>'
        );

        $this->table->set_template($template);

        $this->table->set_heading('ID', 'Judul', 'Slug', 'Penulis', 'Dikirim oleh', 'Dibuat pada', 'Action');

        $data['title'] =  'List Tulisan - Pelayan Rakyat | Sisi.silang';

        $this->load->view('pelayanrakyat/dashboard/templates/header', $data, $template);
        $this->load->view('pelayanrakyat/dashboard/administrasi', $data, $template);
        $this->load->view('pelayanrakyat/dashboard/templates/footer');       
        }

        public function infografis() {

        $infografis_item = $this->artikel->get($this->db->having('kategori', 'Infografis'), $this->db->limit(5))->result_array();
        $data['infografis'] = $infografis_item;

        $template = array(
        'table_open'            => '<table class="table table-striped table-responsive">',
        'table_close'           => '</table>'
        );

        $this->table->set_template($template);

        $this->table->set_heading('ID', 'Judul', 'Slug', 'Dikirim oleh', 'Dibuat pada', 'Action');

        $data['title'] =  'List Tulisan - Pelayan Rakyat | Sisi.silang';

        $this->load->view('pelayanrakyat/dashboard/templates/header', $data, $template);
        $this->load->view('pelayanrakyat/dashboard/infografis', $data, $template);
        $this->load->view('pelayanrakyat/dashboard/templates/footer');       
        }

        public function buat() {

        $config['title'] = 'Buat Tulisan - Pelayan Rakyat | Sisi.silang';

        $this->form_validation->set_rules('judul', 'Judul', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));
        $this->form_validation->set_rules('isi', 'Isi', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));
        $this->form_validation->set_rules('kategori', 'Kategori', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));
        $this->form_validation->set_rules('tag', 'Tag', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));
        $this->form_validation->set_rules('penulis', 'Penulis', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
            $this->load->view('pelayanrakyat/dashboard/buat');
            $this->load->view('pelayanrakyat/dashboard/templates/footer');
        }

        else {
            
            //untuk generate slug secara otomatis mengikuti judul//    
            $slug = url_title($this->input->post('judul'),'dash',TRUE);
            
            //untuk proses upload gambar ke folder img/media disisi root//
            $config['upload_path'] = './assets/img/media/';
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $config['detect_mime'] = TRUE;
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|PNG|jpeg';
            $this->upload->initialize($config); 

                if (!$this->upload->do_upload('gambar')) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('upload_form', $error);
                }

                else {
                        //untuk penarikan informasi nama file gambar untuk masuk ke database//
                        $image_data = $this->upload->data();
                        $gambar = $image_data['file_name'];
                        
                        //untuk menarik informasi yang disubmit untuk dikirim ke database dan masuk ke sisi view//
                        $data['judul'] = $this->input->post('judul');
                        $data['isi'] = $this->input->post('isi');
                        $data['kategori'] = $this->input->post('kategori');
                        $data['tag'] = $this->input->post('tag');
                        $data['keterangan'] = $this->input->post('keterangan');
                        $data['slug'] = $slug;
                        $data['gambar'] = $gambar;
                        $data['penulis'] = $this->input->post('penulis');
                        $data['submitted'] = $this->session->userdata('nama');

                        $this->artikel->insert($data);

                        $this->session->set_flashdata('berhasil_buat', 'Tulisan sudah diterbitkan. Silahkan cek di halaman list tulisan untuk informasi lebih lanjut.');

                        $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
                        $this->load->view('pelayanrakyat/dashboard/buat');
                        $this->load->view('pelayanrakyat/dashboard/templates/footer');
                }
           

            }

        } 

        public function buatinfografis() {

        $config['title'] = 'Buat Infografis - Pelayan Rakyat | Sisi.silang';

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('tag', 'Tag', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
            $this->load->view('pelayanrakyat/dashboard/buatinfografis');
            $this->load->view('pelayanrakyat/dashboard/templates/footer');
        }

        else {
            
            //untuk generate slug secara otomatis mengikuti judul//    
            $slug = url_title($this->input->post('judul'),'dash',TRUE);
            
            //untuk proses upload gambar ke folder img/media disisi root//
            $config['upload_path'] = './assets/img/media/';
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $config['detect_mime'] = TRUE;
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|PNG|jpeg';
            $this->upload->initialize($config); 

                if (!$this->upload->do_upload('gambar')) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('upload_form', $error);
                }

                else {

                    //untuk penarikan informasi nama file gambar untuk masuk ke database//
                    $image_data = $this->upload->data();
                    $gambar = $image_data['file_name'];
                    
                    //untuk menarik informasi yang disubmit untuk dikirim ke database dan masuk ke sisi view//
                    $data['judul'] = $this->input->post('judul');
                    $data['isi'] = $this->input->post('isi');
                    $data['kategori'] = $this->input->post('kategori');
                    $data['tag'] = $this->input->post('tag');
                    $data['keterangan'] = $this->input->post('keterangan');
                    $data['slug'] = $slug;
                    $data['gambar'] = $gambar;
                    $data['submitted'] = $this->session->userdata('nama');

                    $this->artikel->insert($data);

                    $this->session->set_flashdata('berhasil_infografis', 'Infografis sudah diterbitkan. Silahkan cek di halaman list infografis untuk informasi lebih lanjut.');

                    $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
                    $this->load->view('pelayanrakyat/dashboard/buatinfografis');
                    $this->load->view('pelayanrakyat/dashboard/templates/footer');

                }

            }

        } 

        public function updateinfografis($id)
        {
        $config['title'] = 'Update Infografis - Pelayan Rakyat | Sisi.silang';
        
        $infografis = $this->artikel->get_where(array('id' => $id, 'kategori' => 'Infografis'))->result_array();
        $data['infografis'] = $infografis;
        $data['pageContent'] = $this->load->view('pelayanrakyat/dashboard/updateinfografis', $data, TRUE);

        $this->form_validation->set_rules('judul', 'Judul', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));
        $this->form_validation->set_rules('kategori', 'Kategori', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));
        $this->form_validation->set_rules('tag', 'Tag', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));

        if ($this->form_validation->run() === FALSE) {
        $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
        $this->load->view('pelayanrakyat/dashboard/updateinfografis', $data);
        $this->load->view('pelayanrakyat/dashboard/templates/footer');
        } 

        else {

        //untuk proses upload gambar ke folder img/media disisi root//
        $config['upload_path'] = './assets/img/media/';
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['detect_mime'] = TRUE;
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|PNG|jpeg';
        $this->upload->initialize($config); 
        $this->upload->do_upload('gambar');

        //untuk penarikan informasi nama file gambar untuk masuk ke database//
        $image_data = $this->upload->data();
        $gambar = $image_data['file_name'];

        // Jalankan function update pada model_users
        $data = array(
            'judul' => $this->input->post('judul'), 
            'isi' => $this->input->post('isi'), 
            'keterangan' => $this->input->post('keterangan'),
            'kategori' => $this->input->post('kategori'), 
            'tag' => $this->input->post('tag'),  
            'gambar' => $gambar
        );

        // Jalankan function update pada model_users
        $query = $this->artikel->update($id, $data);

        // cek jika query berhasil
        if ($query) {

          // Set success message
            $notif = $this->session->set_flashdata('berhasil_ubah_infografis', 'Infografis telah berubah. Silahkan cek menu List Infografis untuk informasi lebih lanjut.');

            redirect(base_url('pelayanrakyat/dashboard/updateinfografis/'.$id.'', 'location', $data, $notif));

        
        } else {

          // Set error message
            $notifgagal = $this->session->set_flashdata('gagal_ubah_infografis', 'Infografis gagal diupdate di database.');
        
            redirect(base_url('pelayanrakyat/dashboard/updateinfografis/'.$id.'', 'location', $data, $notifgagal));

        }
        }
    }

        public function deleteinfografis($id) {

        $data['query'] = $this->artikel->delete($id);

        if ($data) {

          // Set success message
            $this->session->set_flashdata('hapus_infografis_berhasil', 'Infografis telah dihapus.');

          // Update session baru
          $this->session->set_userdata($data);

          redirect(base_url('pelayanrakyat/dashboard/infografis'));

            }
        }

        public function tarik_kategori() {

            if(isset($_GET['kategori'])) {
                $result = $this->artikel->add_kategori($_GET['kategori']);
                if(count($result) > 0) {
                    foreach($result as $row)
                        $arr_result[] = $row->add_kategori;
                    echo json_encode($arr_result);
                }
            }

        }

        public function updateartikel($id)
        {
        $config['title'] = 'Update Halaman - Pelayan Rakyat | Sisi.silang';
        
        $articles = $this->artikel->get_where(array('id' => $id))->result_array();
        $data['articles'] = $articles;
        $data['pageContent'] = $this->load->view('pelayanrakyat/dashboard/updateartikel', $data, TRUE);

        $this->form_validation->set_rules('judul', 'Judul', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));

        if ($this->form_validation->run() === FALSE) {
        $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
        $this->load->view('pelayanrakyat/dashboard/updateartikel', $data);
        $this->load->view('pelayanrakyat/dashboard/templates/footer');
        } 

        else {

        //untuk proses upload gambar ke folder img/media disisi root//
        $config['upload_path'] = './assets/img/media/';
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['detect_mime'] = TRUE;
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|PNG|jpeg';
        $this->upload->initialize($config); 
        $this->upload->do_upload('gambar');

        //untuk penarikan informasi nama file gambar untuk masuk ke database//
        $image_data = $this->upload->data();
        $gambar = $image_data['file_name'];

        // Jalankan function update pada model_users
        $data = array(
            'judul' => $this->input->post('judul'), 
            'keterangan' => $this->input->post('keterangan'), 
            'gambar' => $gambar
        );

        // Jalankan function update pada model_users
        $query = $this->halaman->update($id, $data);

        // cek jika query berhasil
        if ($query) {

          // Set success message
            $notif = $this->session->set_flashdata('berhasil_ubah_artikel', 'Artikel telah berubah. Silahkan cek menu List Artikel untuk informasi lebih lanjut.');

            redirect(base_url('pelayanrakyat/dashboard/updateartikel/'.$id.'', 'location', $data, $notif));

        
        } else {

          // Set error message
            $notifgagal = $this->session->set_flashdata('gagal_ubah_artikel', 'Artikel gagal diupdate di database.');
        
            redirect(base_url('pelayanrakyat/dashboard/updateartikel/'.$id.'', 'location', $data, $notifgagal));

        }
        }
    }


        public function deleteartikel($id) {

            $data['query'] = $this->artikel->delete($id);

        if ($data) {

          // Set success message
            $this->session->set_flashdata('hapus_artikel_berhasil', 'Artikel telah dihapus.');

          // Update session baru
          $this->session->set_userdata($data);

          redirect(base_url('pelayanrakyat/dashboard/administrasi'));

        }
    }  

        public function buathighlight() {

        $config['title'] = 'Buat Highlight - Pelayan Rakyat | Sisi.silang';

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() === FALSE) {
        $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
        $this->load->view('pelayanrakyat/dashboard/buathighlight');
        $this->load->view('pelayanrakyat/dashboard/templates/footer');
        }

        else {
            
            //untuk generate slug secara otomatis mengikuti judul//    
            $slug = url_title($this->input->post('judul'),'dash',TRUE);
            
            //untuk proses upload gambar ke folder img/media disisi root//
            $config['upload_path'] = './assets/img/highlight/';
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $config['detect_mime'] = TRUE;
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|PNG|jpeg';
            $this->upload->initialize($config); 
            $this->upload->do_upload('gambar');

            //untuk penarikan informasi nama file gambar untuk masuk ke database//
            $image_data = $this->upload->data();
            $gambar = $image_data['file_name'];
            
            //untuk menarik informasi yang disubmit untuk dikirim ke database dan masuk ke sisi view//
            $data['judul'] = $this->input->post('judul');
            $data['keterangan'] = $this->input->post('keterangan');
            $data['slug'] = $slug;
            $data['gambar'] = $gambar;
            $data['submitted'] = $this->session->userdata('nama');

            $this->highlight->insert($data);

            $this->session->set_flashdata('berhasil_highlight', 'highlight sudah diterbitkan. Silahkan cek di halaman list tulisan untuk informasi lebih lanjut.');        

            $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
            $this->load->view('pelayanrakyat/dashboard/buathighlight');
            $this->load->view('pelayanrakyat/dashboard/templates/footer');
        } 
          
        }

        public function updatehighlight($id)
        {
        $config['title'] = 'Update Highlight - Pelayan Rakyat | Sisi.silang';
        
        $highlight = $this->highlight->get_where(array('id' => $id))->result_array();
        $data['highlight'] = $highlight;
        $data['pageContent'] = $this->load->view('pelayanrakyat/dashboard/updatehighlight', $data, TRUE);

        $this->form_validation->set_rules('judul', 'Judul', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));

        if ($this->form_validation->run() === FALSE) {
        $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
        $this->load->view('pelayanrakyat/dashboard/updatehighlight', $data);
        $this->load->view('pelayanrakyat/dashboard/templates/footer');
        } 

        else {

        //untuk proses upload gambar ke folder img/media disisi root//
        $config['upload_path'] = './assets/img/media/';
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['detect_mime'] = TRUE;
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|PNG|jpeg';
        $this->upload->initialize($config); 
        $this->upload->do_upload('gambar');

        //untuk penarikan informasi nama file gambar untuk masuk ke database//
        $image_data = $this->upload->data();
        $gambar = $image_data['file_name'];

        // Jalankan function update pada model_users
        $data = array(
            'judul' => $this->input->post('judul'), 
            'keterangan' => $this->input->post('keterangan'), 
            'gambar' => $gambar
        );

        // Jalankan function update pada model_users
        $query = $this->halaman->update($id, $data);

        // cek jika query berhasil
        if ($query) {

          // Set success message
            $notif = $this->session->set_flashdata('berhasil_ubah_highlight', 'Highlight telah berubah. Silahkan cek menu List highlight untuk informasi lebih lanjut.');

            redirect(base_url('pelayanrakyat/dashboard/updatehighlight/'.$id.'', 'location', $data, $notif));

        
        } else {

          // Set error message
            $notifgagal = $this->session->set_flashdata('gagal_ubah_highlight', 'Highlight gagal diupdate di database.');
        
            redirect(base_url('pelayanrakyat/dashboard/updatehighlight/'.$id.'', 'location', $data, $notifgagal));

        }
        }
    }


        public function deletehighlight($id) {

        $data['query'] = $this->highlight->delete($id);

        if ($data) {

          // Set success message
            $this->session->set_flashdata('hapus_highlight_berhasil', 'User telah dihapus.');

          // Update session baru
          $this->session->set_userdata($data);

          redirect(base_url('pelayanrakyat/dashboard/highlight'));

            }
        }

        public function buatkategori() {

        $config['title'] = 'Buat Kategori - Pelayan Rakyat | Sisi.silang';

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() === FALSE) {
        $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
        $this->load->view('pelayanrakyat/dashboard/buatkategori');
        $this->load->view('pelayanrakyat/dashboard/templates/footer');
        }

        else {
            
            //untuk generate slug secara otomatis mengikuti judul//    
            $slug = url_title($this->input->post('judul'),'dash',TRUE);
            
            //untuk menarik informasi yang disubmit untuk dikirim ke database dan masuk ke sisi view//
            $data['judul'] = $this->input->post('judul');
            $data['keterangan'] = $this->input->post('keterangan');
            $data['slug'] = $slug;
            $data['submitted'] = $this->session->userdata('username');

            $this->kategori->insert($data);

            $this->session->set_flashdata('berhasil_kategori', 'Kategori sudah diterbitkan. Silahkan cek di halaman list kategori untuk informasi lebih lanjut.');        

            $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
            $this->load->view('pelayanrakyat/dashboard/buatkategori');
            $this->load->view('pelayanrakyat/dashboard/templates/footer');
        } 
          
        }

        public function updatekategori($id)
        {
        $config['title'] = 'Update Kategori - Pelayan Rakyat | Sisi.silang';
        
        $kategori = $this->kategori->get_where(array('id' => $id))->result_array();
        $data['kategori'] = $kategori;
        $data['pageContent'] = $this->load->view('pelayanrakyat/dashboard/updatekategori', $data, TRUE);

        $this->form_validation->set_rules('judul', 'Judul', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));

        if ($this->form_validation->run() === FALSE) {
        $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
        $this->load->view('pelayanrakyat/dashboard/updatekategori', $data);
        $this->load->view('pelayanrakyat/dashboard/templates/footer');
        } 

        else {

        // Jalankan function update pada model_users
        $data = array(
            'judul' => $this->input->post('judul'), 
            'keterangan' => $this->input->post('keterangan'), 
        );

        // Jalankan function update pada model_users
        $query = $this->kategori->update($id, $data);

        // cek jika query berhasil
        if ($query) {

          // Set success message
            $notif = $this->session->set_flashdata('berhasil_ubah_kategori', 'Kategori telah berubah. Silahkan cek menu List Kategori untuk informasi lebih lanjut.');

            redirect(base_url('pelayanrakyat/dashboard/updatekategori/'.$id.'', 'location', $data, $notif));

        
        } else {

          // Set error message
            $notifgagal = $this->session->set_flashdata('gagal_ubah_kategori', 'Kategori gagal diupdate di database.');
        
            redirect(base_url('pelayanrakyat/dashboard/updatekategori/'.$id.'', 'location', $data, $notifgagal));

        }
        }
    }


        public function deletekategori($id) {

        $data['query'] = $this->kategori->delete($id);

        if ($data) {

          // Set success message
            $this->session->set_flashdata('hapus_kategori_berhasil', 'User telah dihapus.');

          // Update session baru
          $this->session->set_userdata($data);

          redirect(base_url('pelayanrakyat/dashboard/kategori'));

            }
        }


        public function buathalaman() {

        $config['title'] = 'Buat Halaman - Pelayan Rakyat | Sisi.silang';

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() === FALSE) {
        $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
        $this->load->view('pelayanrakyat/dashboard/buathalaman');
        $this->load->view('pelayanrakyat/dashboard/templates/footer');
        }

        else {

        $this->artikel->buat_halaman();

        $this->session->set_flashdata('berhasil_halaman', 'Halaman sudah diterbitkan. Silahkan cek di halaman list halaman untuk informasi lebih lanjut.');

        $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
        $this->load->view('pelayanrakyat/dashboard/buathalaman');
        $this->load->view('pelayanrakyat/dashboard/templates/footer');
                } 
          
        } 

        public function updatehalaman($id)
        {
        $config['title'] = 'Update Halaman - Pelayan Rakyat | Sisi.silang';
        
        $articles = $this->halaman->get_where(array('id' => $id))->result_array();
        $data['articles'] = $articles;
        $data['pageContent'] = $this->load->view('pelayanrakyat/dashboard/updatehalaman', $data, TRUE);

        $this->form_validation->set_rules('judul', 'Judul', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));

        if ($this->form_validation->run() === FALSE) {
        $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
        $this->load->view('pelayanrakyat/dashboard/updatehalaman', $data);
        $this->load->view('pelayanrakyat/dashboard/templates/footer');
        } 

        else {

        //untuk proses upload gambar ke folder img/media disisi root//
        $config['upload_path'] = './assets/img/media/';
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['detect_mime'] = TRUE;
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|PNG|jpeg';
        $this->upload->initialize($config); 
        $this->upload->do_upload('gambar');

        //untuk penarikan informasi nama file gambar untuk masuk ke database//
        $image_data = $this->upload->data();
        $gambar = $image_data['file_name'];

        // Jalankan function update pada model_users
        $data = array(
            'judul' => $this->input->post('judul'), 
            'keterangan' => $this->input->post('keterangan'), 
            'gambar' => $gambar
        );

        // Jalankan function update pada model_users
        $query = $this->halaman->update($id, $data);

        // cek jika query berhasil
        if ($query) {

          // Set success message
            $notif = $this->session->set_flashdata('berhasil', 'Halaman telah berubah. Silahkan cek menu List Halaman untuk informasi lebih lanjut.');

            redirect(base_url('pelayanrakyat/dashboard/updatehalaman/'.$id.'', 'location', $data, $notif));

        
        } else {

          // Set error message
            $notifgagal = $this->session->set_flashdata('gagal', 'Halaman gagal diupdate di database.');
        
            redirect(base_url('pelayanrakyat/dashboard/updatehalaman/'.$id.'', 'location', $data, $notifgagal));

        }
        }
    }

        public function deletehalaman($id) {

            $data['query'] = $this->halaman->delete($id);

        if ($data) {

          // Set success message
            $this->session->set_flashdata('hapus_berhasil', 'Halaman telah dihapus.');

          // Update session baru
          $this->session->set_userdata($data);

          redirect(base_url('pelayanrakyat/dashboard/halaman'));

        }
    }

        public function gantiava() {

        $config['title'] = 'Profil Pengguna - Pelayan Rakyat | Sisi.silang';

        //untuk proses upload gambar ke folder img/media disisi root//
        $config['upload_path'] = './assets/img/avatar/';
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['detect_mime'] = TRUE;
        $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|PNG|jpeg';
        $this->upload->initialize($config); 
        $this->upload->do_upload('avatar');

        //untuk penarikan informasi nama file gambar untuk masuk ke database//
        $image_data = $this->upload->data();
        $data['avatar'] = $image_data['file_name'];

        // Ambil user ID dari session
        $userId = $this->session->userdata('id');

        // Jalankan function update pada model_users
        $query = $this->auth->update($userId, $data);

        // cek jika query berhasil
        if ($query) {

          // Set success message
            $this->session->set_flashdata('ganti_avatar', 'Data user sudah diupdate di database.');

          // Update session baru
          $this->session->set_userdata($data);

            $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
            $this->load->view('pelayanrakyat/dashboard/profil');
            $this->load->view('pelayanrakyat/dashboard/templates/footer'); 
        
        } else {

          // Set error message
            $this->session->set_flashdata('gagal_avatar', 'Data user gagal diupdate di database.');

            $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
            $this->load->view('pelayanrakyat/dashboard/profil');
            $this->load->view('pelayanrakyat/dashboard/templates/footer'); 
        }
        
        }

        public function ubahpass() {

        }

        public function updatepengguna($id) {

        $config['title'] = 'Ubah Data Pengguna - Pelayan Rakyat | Sisi.silang';
        $data['datapengguna'] = $this->auth->get_where(array('id' => $id))->result_array();
        $data['pageContent'] = $this->load->view('pelayanrakyat/dashboard/updatepengguna', $data, TRUE);
 

            if($this->session->userdata('role') != 'Administrator') {
                $this->session->set_flashdata('bukan_hak', 'Mohon maaf, kamu/anda tidak bisa mengakses halaman ini. Terima kasih.');

                $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
                $this->load->view('pelayanrakyat/dashboard/bukanhak');
                $this->load->view('pelayanrakyat/dashboard/templates/footer'); 

            }  else {

                $this->form_validation->set_rules('role', 'role', 'required', array(
                        'required'      => 'Kemana isiannya?',
                ));
                $this->form_validation->set_rules('status', 'Status', 'required', array(
                        'required'      => 'Kemana isiannya?',
                ));

                    if ($this->form_validation->run() === FALSE) {

                        $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
                        $this->load->view('pelayanrakyat/dashboard/updatepengguna', $data);
                        $this->load->view('pelayanrakyat/dashboard/templates/footer'); 

                    } else {

                        $data = array(
                                    'role' => $this->input->post('role'), 
                                    'status' =>$this->input->post('status'),
                        );

                        // Jalankan function update pada model_users
                        $query = $this->auth->update($id, $data);

                        // cek jika query berhasil
                            if ($query) {

                                // Set success message
                                $notif = $this->session->set_flashdata('berhasil_pengguna', 'Halaman telah berubah. Silahkan cek menu List Halaman untuk informasi lebih lanjut.');

                                redirect(base_url('pelayanrakyat/dashboard/updatepengguna/'.$id.'', 'location', $data, $notif));

                                
                                } else {

                                // Set error message
                                $notifgagal = $this->session->set_flashdata('gagal_pengguna', 'Halaman gagal diupdate di database.');
                                
                                redirect(base_url('pelayanrakyat/dashboard/updatepengguna/'.$id.'', 'location', $data, $notifgagal));
                                }
                    }
            }
        }

        public function tambahpengguna() {

        $config['title'] = 'Tambah Pengguna - Pelayan Rakyat | Sisi.silang';

        if($this->session->userdata('role') != 'Administrator') {
            $this->session->set_flashdata('bukan_hak', 'Mohon maaf, kamu/anda tidak bisa mengakses halaman ini. Terima kasih.');

            $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
            $this->load->view('pelayanrakyat/dashboard/bukanhak');
            $this->load->view('pelayanrakyat/dashboard/templates/footer'); 

        } else {

        $config['title'] = 'Tambah Pengguna - Pelayan Rakyat | Sisi.silang';

        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));
        $this->form_validation->set_rules('username', 'Username', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[adminsisisilang.email]', array(
                'required'      => 'Kemana isiannya?', 'is_unique' => 'Alamat surel/e-mail atau username telah terdaftar.'
        ));
        $this->form_validation->set_rules('role', 'role', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));
        $this->form_validation->set_rules('repassword', 'Repassword', 'required|matches[password]', array(
                'required'      => 'Kemana isiannya?', 'matches' => 'Kata sandi yang diketik tidak sama dengan isian sebelumnya. Mohon dicek kembali.'
        ));

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
            $this->load->view('pelayanrakyat/dashboard/tambahpengguna');
            $this->load->view('pelayanrakyat/dashboard/templates/footer'); 

        } else {

            //untuk proses upload gambar ke folder img/media disisi root//
            $config['upload_path'] = './assets/img/avatar/';
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $config['detect_mime'] = TRUE;
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|PNG|jpeg';
            $this->upload->initialize($config); 
            $this->upload->do_upload('avatar');

            //untuk penarikan informasi nama file gambar untuk masuk ke database//
            $image_data = $this->upload->data();
            $avatar = $image_data['file_name'];

            $hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

            $data['nama'] = $this->input->post('nama');
            $data['username'] = $this->input->post('username');
            $data['email'] = $this->input->post('email');
            $data['role'] = $this->input->post('role');
            $data['password'] = $hash;
            $data['status'] = 'OFF';
            $data['avatar'] = $avatar;

            $query = $this->auth->insert($data);

                // Set success message
                $this->session->set_flashdata('berhasiltambah', 'Data user sudah ditambah di database. <br>Silahkan instruksikan user untuk mengecek e-mailnya yang terdaftar disini untuk segera melakukan verifikasi yang hanya boleh sekali klik saja. Terima kasih.');

                $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
                $this->load->view('pelayanrakyat/dashboard/tambahpengguna');
                $this->load->view('pelayanrakyat/dashboard/templates/footer'); 
            }

        }
    }

        public function deletepengguna($id) {

            $data['query'] = $this->auth->delete($id);

        if ($data) {

          // Set success message
            $this->session->set_flashdata('hapus_user_berhasil', 'User telah dihapus.');

          // Update session baru
          $this->session->set_userdata($data);

          redirect(base_url('pelayanrakyat/dashboard/listpengguna'));

            }
        }

        public function profil() {

        $config['title'] = 'Profil Pengguna - Pelayan Rakyat | Sisi.silang';

        $this->form_validation->set_rules('bio', 'Bio', 'required', array(
                'required'      => 'Kemana isiannya?',
        ));

        if ($this->form_validation->run() === FALSE) {
        $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
        $this->load->view('pelayanrakyat/dashboard/profil');
        $this->load->view('pelayanrakyat/dashboard/templates/footer');
        } 

        else {
        $data['facebook'] = $this->input->post('facebook');
        $data['twitter'] = $this->input->post('twitter');
        $data['instagram'] = $this->input->post('instagram');
        $data['bio'] = $this->input->post('bio');

        // Ambil user ID dari session
        $userId = $this->session->userdata('id');

        // Jalankan function update pada model_users
        $query = $this->auth->update($userId, $data);

        // cek jika query berhasil
        if ($query) {

          // Set success message
            $this->session->set_flashdata('berhasil', 'Data user sudah diupdate di database.');

          // Update session baru
          $this->session->set_userdata($data);

            $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
            $this->load->view('pelayanrakyat/dashboard/profil', $data);
            $this->load->view('pelayanrakyat/dashboard/templates/footer'); 
        
        } else {

          // Set error message
            $this->session->set_flashdata('gagal', 'Data user gagal diupdate di database.');

            $this->load->view('pelayanrakyat/dashboard/templates/header', $config);
            $this->load->view('pelayanrakyat/dashboard/profil', $data);
            $this->load->view('pelayanrakyat/dashboard/templates/footer'); 
        }
        }
        
        }
}
?>