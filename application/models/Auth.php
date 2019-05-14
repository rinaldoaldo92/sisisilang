<?php
class Auth extends CI_Model {

    public $table = 'adminsisisilang';

    public function cekAkun($username, $password)
    {
      // Get data user yang mempunyai username == $username dan active == 1
			$this->db->where('username', $username);
			$this->db->where('status', 'ON');
			
      // Jalankan query
      $query = $this->db->get($this->table)->row();
      
      // Jika query gagal atau tidak menemukan username yang sesuai 
      // maka return false
			if (!$query) return false;
			
      // Ambil data password dari database
      $hash = $query->password;
      
      // Jika $hash tidak sama dengan $password maka return false
      if (!password_verify($password, $hash)) return false;
      
      // Jika username dan password benar maka return data user
      return $query;        
    }

    public function cekPasswordLama($id, $password)
    {
      // Get data user yang mempunyai id == $id dan active == 1
			$this->db->where('id', $id);
			$this->db->where('active', '1');
			
      // Jalankan query
      $query = $this->db->get($this->table)->row();
      
      // Jika query gagal atau tidak menemukan data yang sesuai 
      // maka return false
			if (!$query) return false;
			
      // Ambil data password dari database
      $hash = $query->password;
      
      // Jika $hash tidak sama dengan $password maka return false
      if (!password_verify($password, $hash)) return false;
      
      // Jika username dan password benar maka return data user
      return $query;        
    }

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

        public function limit($role, $limit, $start) {

          $query = $this->db
            ->where('role', $role)
            ->limit($limit, $start)
            ->get($this->table);

          return $query;

        } 

        public function limit_mod($role, $limit, $start) {

          $query = $this->db
            ->where('role', $role)
            ->limit($limit, $start)
            ->order_by('nama', 'DESC')
            ->get($this->table);

          return $query;

        }

        public function limit_mod_nama($limit, $start) {

          $query = $this->db
            ->limit($limit, $start)
            ->order_by('nama', 'DESC')
            ->get($this->table);

          return $query;

        }

        public function order_limit($role, $limit) {

          $query = $this->db
            ->where('role', $role)
            ->limit($limit)
            ->order_by('role', 'DESC')
            ->get($this->table);

          return $query;

        }

        public function order_limit_mod($limit) {

          $query = $this->db
            ->limit($limit)
            ->order_by('role', 'DESC')
            ->get($this->table);

          return $query;

        }
}
?>