<?php
class Kategori_model extends CI_Model {

    public function get_data() {
        $query = $this->db->get('kategori');
        return $query->result();
    }
    
}
?>