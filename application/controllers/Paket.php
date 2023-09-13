<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Paket extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Paket_model', 'Pkt');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Master Data | Paket Cucian';
		$data['page'] = 'Paket Cucian';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['paket'] = $this->Pkt->getPaket();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('paket/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function edit($id)
	{
		

		$data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('jenis_kendaraan', 'Jenis Kendaraan', 'required', ['required' => 'Pilih jenis kendaraan terlebih dahulu.']);
		$this->form_validation->set_rules('jenis_paket', 'Jenis Paket', 'required', ['required' => 'Jenis Paket tidak boleh kosong.']);
        $this->form_validation->set_rules('harga_paket', 'Harga Paket', 'required', ['required' => 'Nominal harga paket tidak boleh kosong.']);
   

        if ($this->form_validation->run() == false) {
			$data['title'] = 'Master Data - Edit Paket';
			$data['page'] = 'Paket Cucian';
			$data['jenis_kendaraan'] = $this->db->get('kendaraan')->result();
			$data['paket'] = $this->Pkt->getPaketById($id);
			$data['id'] = $id;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('paket/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
			$data = [
				'JENIS_PAKET' => $this->input->post('jenis_paket'),
				'ID_KENDARAAN' => $this->input->post('jenis_kendaraan'),
				'HARGA_PAKET' => $this->input->post('harga_paket'),
			];
			$this->db->where('ID_PAKET', $id);
			$this->db->update('paket_cucian', $data);
            $this->session->set_flashdata('flash', 'Berhasil di Ubah');
            redirect('paket');
        }
	}


	public function tambahPaket()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('jenis_kendaraan', 'Jenis Kendaraan', 'required', ['required' => 'Pilih jenis kendaraan terlebih dahulu.']);
		$this->form_validation->set_rules('jenis_paket', 'Jenis Paket', 'required', ['required' => 'Jenis Paket tidak boleh kosong.']);
        $this->form_validation->set_rules('harga_paket', 'Harga Paket', 'required', ['required' => 'Nominal harga paket tidak boleh kosong.']);
   

        if ($this->form_validation->run() == false) {
			$data['title'] = 'Paket Cucian | Tambah Paket Cucian';
			$data['page'] = 'Tambah Paket Cucian';
			$data['jenis_kendaraan'] = $this->db->get('kendaraan')->result();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('paket/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
			$data = [
				'JENIS_PAKET' => $this->input->post('jenis_paket'),
				'ID_KENDARAAN' => $this->input->post('jenis_kendaraan'),
				'HARGA_PAKET' => $this->input->post('harga_paket'),
			];
			$this->db->insert('paket_cucian', $data);
            $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
            redirect('paket');
        }
    }

	// public function store()
	// {
	// 	$data = [
	// 		'JENIS_PAKET' => $this->input->post('jenis_paket'),
	// 		'ID_KENDARAAN' => $this->input->post('jenis_kendaraan'),
	// 		'HARGA_PAKET' => $this->input->post('harga_paket'),
	// 	];
	// 	$this->db->insert('paket_cucian', $data);
	// 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
	// 	redirect('paket');
	// }

	// // public function update($id){
	// // 	$data = [
	// // 		'JENIS_PAKET' => $this->input->post('jenis_paket'),
	// // 		'ID_KENDARAAN' => $this->input->post('jenis_kendaraan'),
	// // 		'HARGA_PAKET' => $this->input->post('harga_paket'),
	// // 	];
	// // 	$this->db->where('ID_PAKET', $id);
	// // 	$this->db->update('paket_cucian', $data);
	// // 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
	// // 	redirect('paket');
	// // }

	public function hapus($id){
		$this->db->where('ID_PAKET', $id);
		$this->db->delete('paket_cucian');
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		redirect('paket');
	}
}
