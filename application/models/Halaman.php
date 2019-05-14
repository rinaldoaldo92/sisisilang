<?php
class Halaman extends CI_Model {

    public $table = 'halamansisisilang';

    public function get()
    {
      // Jalankan query
      $query = $this->db->get($this->table);

      // Return hasil query
      return $query;
    }

    public function get_where($where)
    {

      // Jalankan query
      $query = $this->db
        ->where($where)
        ->get($this->table);

      // Return hasil query
      return $query;
    }

    public function tarik_isi_halaman($slug) {

      if ($slug === FALSE)
        {
                $query = $this->db->get('halamansisisilang');
                return $query->result_array();
        }

        $query = $this->db->get_where('halamansisisilang', array('slug' => $slug));

        return $query->row_array();
    }

    public function tarik_id_halaman($id) {

        if (isset($id))
        {
          $query = $this->db->get('halamansisisilang');
          return $query->result_array();
        }

        $query = $this->db->get_where('halamansisisilang', array('id' => $id));
        return $query->row_array();
    }

    public function insert($data)
    {
      // Jalankan query
      $query = $this->db->insert($this->table, $data);

      // Return hasil query
      return $query;
    }

    public function update($id, $data)
    {
      // Jalankan query
      $query = $this->db
        ->where('id', $id)
        ->update($this->table, $data);
      
      // Return hasil query
      return $query;
    }

    public function delete($id)
    {
      // Jalankan query
      $query = $this->db
        ->where('id', $id)
        ->delete($this->table);
      
      // Return hasil query
      return $query;
    }

            public function limit($judul, $limit, $start) {

          $query = $this->db
            ->where('judul', $judul)
            ->limit($limit, $start)
            ->get($this->table);

          return $query;

        } 

        public function limit_mod($kategori, $limit, $start) {

          $query = $this->db
            ->where('judul', $judul)
            ->limit($limit, $start)
            ->order_by('dibuat_pada', 'DESC')
            ->get($this->table);

          return $query;

        }

        public function order_limit($judul, $limit) {

          $query = $this->db
            ->where('judul', $judul)
            ->limit($limit)
            ->order_by('judul', 'DESC')
            ->get($this->table);

          return $query;

        }

        public function order_limit_mod($limit) {

          $query = $this->db
            ->limit($limit)
            ->order_by('dibuat_pada', 'DESC')
            ->get($this->table);

          return $query;

        }
}
?>