<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Status_model');
    }

	public function index()
	{
        $data['title'] = "Status";

        $status_db['status'] = $this->Status_model->get_data();

		$this->load->view('layout/header', $data);
		$this->load->view('status/v_status', $status_db);
		$this->load->view('layout/footer');
	}

    //add data status
    public function tambah_status(){

        $data['title'] = "Tambah Status";

		$this->load->view('layout/header', $data);
		$this->load->view('status/v_tambah_status');
		$this->load->view('layout/footer');
    }

    //proses tambah status
    public function proses_tambah_status(){
     
        $this->form_validation->set_rules('nama_status', 'nama_status', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Status";
            $status_db['status'] = $this->Status_model->get_data();
            $this->load->view('layout/header', $data);
            $this->load->view('status/v_status', $status_db);
            $this->load->view('layout/footer');
        } else {
            $datastatus = [
                'nama_status' => $this->input->post('nama_status'),
            ];

            $this->db->insert('status', $datastatus);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Selamat!!! Data Berhasil Ditambah.</div>');
            redirect('status');
        }
    }

    public function edit_status($id)
    {
        $data['title'] = "Edit Data Status";

        $this->db->where('id_status', $id);
        $data_status['status'] = $this->db->get('status')->result();

        $this->load->view('layout/header', $data);
        $this->load->view('status/v_edit_status', $data_status);
        $this->load->view('layout/footer');
    }

    public function proses_edit_status(){
        $id                    = $this->input->post('id_status');
        $nama_status           = $this->input->post('nama_status');
        
        $data = array(
            'id_status'     => $id,
            'nama_status'   => $nama_status,
        );

        $this->db->where('id_status', $id);
        $this->db->update('status', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Selamat!!! Data Berhasil Diedit.</div>');
        redirect('status');
    }

    function delete_status($id){
        $this->db->where('id_status', $id);
        $this->db->delete('status');
    
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Selamat!!! Data Berhasil Dihapus.</div>');
        redirect('status');
    }

}
