<?php
class Highlight extends CI_Model {

        public $table = 'highlightsisisilang';

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

        public function order_limit($limit) {

          $query = $this->db
            ->limit($limit)
            ->order_by('dikirim_pada', 'DESC')
            ->get($this->table);

          return $query;

        }

        public function order_mod($where, $limit) {

          $query = $this->db
            ->where($where)
            ->limit($limit)
            ->order_by('dikirim_pada', 'DESC')
            ->get($this->table);

          return $query;

        }
    }