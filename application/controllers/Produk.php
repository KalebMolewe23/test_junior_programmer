<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
    }

	public function index()
	{
        $data['title'] = "Produk";

        $produk_db['produk'] = $this->Product_model->get_data();

		$this->load->view('layout/header', $data);
		$this->load->view('produk/v_produk', $produk_db);
		$this->load->view('layout/footer');
	}

    public function importAPI(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://recruitment.fastprint.co.id/tes/api_tes_programmer',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('username' => 'tesprogrammer291123C00','password' => 'a535d675c74ee1507d03d6dafef10daa'),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic dGVzcHJvZ3JhbW1lcjI3MTEyM0MxNTpiaXNhY29kaW5nLTI3LTExLTIz',
            'Cookie: ci_session=15mfoe0g22ujr241eksp4g1r9s9ubi0r'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response, true);

        $data = array();

        foreach ($response['data'] as $key => $value){

            //================  Import data status =====================
            $this->db->where('nama_status', $value['status']);
            $cek_status = $this->db->get('status')->row('nama_status');

            //cek informasi status
            if ($cek_status > 0) {
            }else{
                $this->db->set('nama_status', $value['status']);
                $this->db->insert('status');
            }

            //=================== Import data kategori =====================
            $this->db->where('nama_kategori', $value['kategori']);
            $cek_kategori = $this->db->get('kategori')->row('nama_kategori');

            //cek informasi kategori
            if ($cek_kategori > 0) {
            }else{
                $this->db->set('nama_kategori', $value['kategori']);
                $this->db->insert('kategori');
            }

            //================  Import data prdouk =====================

            // $this->db->join('kategori', 'kategori.id_kategori = produk.kategori_id');
            $this->db->select('id_kategori');
            $this->db->where('nama_kategori', $value['kategori']);
            $cek_data_kategori = $this->db->get('kategori')->row('id_kategori');
            
            $this->db->select('id_status');
            $this->db->where('nama_status', $value['status']);
            $cek_data_status = $this->db->get('status')->row('id_status');

            if($cek_data_kategori){
                $id_kategori = $cek_data_kategori;
                if($cek_data_status){
                    $id_status = $cek_data_status;
                    $this->db->set('id_produk', $value['id_produk']);
                    $this->db->set('nama_produk', $value['nama_produk']);
                    $this->db->set('harga', $value['harga']);
                    $this->db->set('kategori_id', $id_kategori);
                    $this->db->set('status_id', $id_status);
                    $this->db->insert('produk');
                }else{

                }
            }else{

            }

        }
    }

    //add data produk
    public function tambah_produk(){

        $data['title'] = "Tambah Produk";

        $produk_db['status'] = $this->Product_model->get_data_status();
        $produk_db['kategori'] = $this->Product_model->get_data_kategori();

		$this->load->view('layout/header', $data);
		$this->load->view('produk/v_tambah_produk', $produk_db);
		$this->load->view('layout/footer');
    }

    //proses tambah produk
    public function proses_tambah_produk(){
     
        $this->form_validation->set_rules('nama_produk', 'nama_produk', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required|numeric');
        $this->form_validation->set_rules('kategori_id', 'kategori_id', 'required');
        $this->form_validation->set_rules('status_id', 'status_id', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Produk";
            $produk_db['produk'] = $this->Product_model->get_data();
            $this->load->view('layout/header', $data);
            $this->load->view('produk/v_produk', $produk_db);
            $this->load->view('layout/footer');
        } else {
            $dataproduk = [
                'nama_produk'           => $this->input->post('nama_produk'),
                'harga'                 => $this->input->post('harga'),
                'kategori_id'           => $this->input->post('kategori_id'),
                'status_id'             => $this->input->post('status_id'),
            ];

            $this->db->insert('produk', $dataproduk);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Selamat!!! Data Berhasil Ditambah.</div>');
            redirect('produk');
        }
    }

    public function edit_produk($id)
    {
        $data['title'] = "Edit Data Produk";

        $this->db->join('kategori', 'kategori.id_kategori = produk.kategori_id');
        $this->db->join('status', 'status.id_status = produk.status_id');
        $this->db->where('id_produk', $id);
        $data_produk['produk'] = $this->db->get('produk')->result();

        $data_produk['status'] = $this->Product_model->get_data_status();
        $data_produk['kategori'] = $this->Product_model->get_data_kategori();

        $this->load->view('layout/header', $data);
        $this->load->view('produk/v_edit_produk', $data_produk);
        $this->load->view('layout/footer');
    }

    public function proses_edit_produk(){
        $id                    = $this->input->post('id_produk');
        $nama_produk           = $this->input->post('nama_produk');
        $harga                 = $this->input->post('harga');
        $kategori_id           = $this->input->post('kategori_id');
        $status_id             = $this->input->post('status_id');

        $data = array(
            'id_produk'     => $id,
            'nama_produk'   => $nama_produk,
            'harga'         => $harga,
            'kategori_id'   => $kategori_id,
            'status_id'     => $status_id,
        );

        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Selamat!!! Data Berhasil Diedit.</div>');
        redirect('produk');
    }

    function delete_produk($id){
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');
    
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>Selamat!!! Data Berhasil Dihapus.</div>');
        redirect('produk');
      }

}
