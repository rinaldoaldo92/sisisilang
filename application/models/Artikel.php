<?php
class Artikel extends CI_Model {

        public $table = 'tulisansisisilang';

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

        public function limit($kategori, $limit, $start) {

          $query = $this->db
            ->where('kategori', $kategori)
            ->limit($limit, $start)
            ->get($this->table);

          return $query;

        } 

        public function limit_mod($kategori, $limit, $start) {

          $query = $this->db
            ->where('kategori', $kategori)
            ->limit($limit, $start)
            ->order_by('dikirim_pada', 'DESC')
            ->get($this->table);

          return $query;

        }

        public function order_limit($kategori, $limit) {

          $query = $this->db
            ->where('kategori', $kategori)
            ->limit($limit)
            ->order_by('dikirim_pada', 'DESC')
            ->get($this->table);

          return $query;

        }

        public function order_limit_mod($limit) {

          $query = $this->db
            ->limit($limit)
            ->order_by('dikirim_pada', 'DESC')
            ->get($this->table);

          return $query;

        }

        public function select_join()
        {
          $query = $this->db
          ->select('*')
          ->from($this->table)
          ->join('adminsisisilang', 'adminsisisilang.nama = tulisansisisilang.penulis', 'inner')
          ->order_by('dikirim_pada', 'DESC')
          ->get();

          return $query;
        }
    }