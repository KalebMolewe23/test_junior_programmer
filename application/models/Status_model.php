<?php
class Status_model extends CI_Model {

    public function get_data() {
        $query = $this->db->get('status');
        return $query->result();
    }
    
}
?>