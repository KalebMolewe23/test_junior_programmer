<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kategori_model');
    }

	public function index()
	{
        $data['title'] = "Kategori";

        $kategori_db['kategori'] = $this->Kategori_model->get_data();

		$this->load->view('layout/header', $data);
		$this->load->view('kategori/v_kategori', $kategori_db);
		$this->load->view('layout/footer');
	}

    //add data kategori
    public function tambah_kategori(){

        $data['title'] = "Tambah Kategori";

		$this->load->view('layout/header', $data);
		$this->load->view('kategori/v_tambah_kategori');
		$this->load->view('layout/footer');
    }

    //proses tambah kategori
    public function proses_tambah_kategori(){
     
        $this->form_validation->set_rules('nama_kategori', 'nama_kategori', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Kategori";
            $kategori_db['Kategori'] = $this->Kategori_model->get_data();
            $this->load->view('layout/header', $data);
            $this->load->view('kategori/v_kategori', $kategori_db);
            $this->load->view('layout/footer');
        } else {
            $datakategori = [
                'nama_kategori' => $this->input->post('nama_kategori'),
            ];

            $this->db->insert('kategori', $datakategori);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Selamat!!! Data Berhasil Ditambah.</div>');
            redirect('kategori');
        }
    }

    public function edit_kategori($id)
    {
        $data['title'] = "Edit Data Kategori";

        $this->db->where('id_kategori', $id);
        $data_kategori['kategori'] = $this->db->get('kategori')->result();

        $this->load->view('layout/header', $data);
        $this->load->view('kategori/v_edit_kategori', $data_kategori);
        $this->load->view('layout/footer');
    }

    public function proses_edit_kategori(){
        $id                    = $this->input->post('id_kategori');
        $nama_kategori           = $this->input->post('nama_kategori');
        
        $data = array(
            'id_kategori'     => $id,
            'nama_kategori'   => $nama_kategori,
        );

        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Selamat!!! Data Berhasil Diedit.</div>');
        redirect('kategori');
    }

    function delete_kategori($id){
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Selamat!!! Data Berhasil Dihapus.</div>');
        redirect('kategori');
      }

}
