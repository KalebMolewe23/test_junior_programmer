<?php
class Product_model extends CI_Model {

    public function get_data() {
        $this->db->join('kategori', 'kategori.id_kategori = produk.kategori_id');
        $this->db->join('status', 'status.id_status = produk.status_id');
        $this->db->where('nama_status', 'bisa dijual');
        $query = $this->db->get('produk');
        return $query->result();
    }

    public function get_data_kategori() {
        $query = $this->db->get('kategori');
        return $query->result();
    }

    public function get_data_status() {
        $query = $this->db->get('status');
        return $query->result();
    }

    public function edit_data($table,$where){
        return  $this->db->get_where($table,$where);
    }
    
}
?>