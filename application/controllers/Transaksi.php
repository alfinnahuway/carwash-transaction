<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Transaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Transaksi_model');
		$this->load->library('form_validation');
	}

	public function tambahTransaksi()
	{

		$data['user'] = $this->db->get_where('user', ['EMAIL' =>
		$this->session->userdata('email')])->row_array();

		$coba = $this->db->get_where('user', ['EMAIL' =>
		$this->session->userdata('email')])->row_array();

		$data['baris'] = $this->db->get('transaksi')->result_array();
		$this->form_validation->set_rules('noplat', 'No. Polisi', 'required', ['required' => 'No. Kendaraan Tidak Boleh kosong.']);
		$this->form_validation->set_rules('kendaraan', 'Kendaraan', 'required', ['required' => 'Pilih jenis kendaraan terlebih dahulu.']);
		$this->form_validation->set_rules('paket', 'Paket', 'required', ['required' => 'Pilih paket terlebih dahulu.']);
		$this->form_validation->set_rules('harga', 'Harga', 'required', ['required' => 'Pilih jenis kendaraan dan paket cucian untuk mendapatkan harga.']);



		if ($this->form_validation->run() == false) {

			$data['title'] = 'Pencucian | Tambah Data';
			$data['page'] = 'Tambah Data Pencucian';
			$data['cucian'] = $this->Transaksi_model->getCuci();
			$data['pket'] = $this->Transaksi_model->paket();
			$data['sub'] = $this->db->get('kendaraan')->result_array();
			$data['notasteam'] = $this->Transaksi_model->getNota();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('transaksi/tambahTransaksi', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$this->db->insert('transaksi', [
				'NO_TRANSAKSI' => $this->input->post('nota'),
				'TANGGAL' => date('Y-m-d'),
				'NOPLAT' => $this->input->post('noplat'),
				'ID_KENDARAAN' => $this->input->post('kendaraan'),
				'ID_PAKET' => $this->input->post('paket'),
				'STATUS_CUCI' => 'DALAM PROSES',
				'HARGA' => $this->input->post('harga'),
				'JAM' => date('H:i:s'),
				'ID_USER' => $coba['ID_USER']
			]);
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			redirect('transaksi');
		}
	}

	public function deleteTransaksi($id)
	{
		$this->Transaksi_model->deleteTransaksiById($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('transaksi/index');
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['EMAIL' =>
		$this->session->userdata('email')])->row_array();


		$data['baris'] = $this->db->get('transaksi')->result_array();

		$data['title'] = 'Transaksi | Pencucian';
		$data['page'] = 'Pencucian';
		$data['cucian'] = $this->Transaksi_model->getCuci();
		$data['pket'] = $this->Transaksi_model->paket();

		$this->Transaksi_model->pembayaran();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('transaksi/index', $data);
		$this->load->view('templates/footer', $data);
	}


	// public function editTransaksi($id){
	// 	$data['user'] = $this->db->get_where('user', ['email' =>
	// 	$this->session->userdata('email')])->row_array();

	// 	$data['title'] = 'Transaksi';
	// 	$data['page'] = 'Edit Data Transaksi';
	// 	$data['cucian'] = $this->Transaksi_model->getCuci();
	// 	$data['pket'] = $this->Transaksi_model->paket();
	// 	$data['sub'] = $this->db->get('kendaraan')->result_array();
	// 	$data['notasteam'] = $this->Transaksi_model->getNota();
	// 	$data['transaksi'] = $this->Transaksi_model->getTransaksiById($id);


	// 		$this->load->view('templates/header', $data);
	// 		$this->load->view('templates/navbar', $data);
	// 		$this->load->view('templates/sidebar', $data);
	// 		$this->load->view('transaksi/editTransaksi', $data);
	// 		$this->load->view('templates/footer', $data);

	// }


	public function editTransaksi($NO_TRANSAKSI)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('noplat', 'No. Polisi', 'required', ['required' => 'No. Kendaraan Tidak Boleh kosong.']);
		$this->form_validation->set_rules('kendaraan', 'Kendaraan', 'required', ['required' => 'Pilih jenis kendaraan terlebih dahulu.']);
		$this->form_validation->set_rules('paket', 'Paket', 'required', ['required' => 'Pilih paket terlebih dahulu.']);
		$this->form_validation->set_rules('harga', 'Harga', 'required', ['required' => 'Nominal harga tidak boleh kosong.']);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Pencucian | Edit Data';
			$data['page'] = 'Edit Data';
			$data['cucian'] = $this->Transaksi_model->getCuci();
			$data['pket'] = $this->Transaksi_model->paket();
			$data['sub'] = $this->db->get('kendaraan')->result_array();
			$data['notasteam'] = $this->Transaksi_model->getNota();
			$data['transaksi'] = $this->Transaksi_model->getTransaksiById($NO_TRANSAKSI);


			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('transaksi/editTransaksi', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$this->db->where('NO_TRANSAKSI', $NO_TRANSAKSI);
			$this->db->update('transaksi', [
				'NO_TRANSAKSI' => $this->input->post('nota'),
				'TANGGAL' => date('Y-m-d'),
				'NOPLAT' => $this->input->post('noplat'),
				'ID_KENDARAAN' => $this->input->post('kendaraan'),
				'ID_PAKET' => $this->input->post('paket'),
				'STATUS_CUCI' => 'DALAM PROSES',
				'HARGA' => $this->input->post('harga')
			]);
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('transaksi');
		}
	}




	public function pembayaran($id = null)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$nota = $this->input->post('nota');

		$data['title'] = 'Transaksi | Pembayaran';
		$data['page'] = 'Pembayaran';
		$data['id'] = $id;
		if ($id) {
			$data['cucian'] = $this->Transaksi_model->getTransaksiById($id);
		} else {
			$data['cucian'] = "";
		}

		$this->form_validation->set_rules('noplat', 'No. Polisi', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('transaksi/pembayaran', $data);
			$this->load->view('templates/footer', $data);
		} else {

			$total = $this->input->post('totals');
			$bayar = $this->input->post('bayar');
			$total = intval(str_replace('.', '', $total));
			$bayar = intval(str_replace('.', '', $bayar));
			$action = $this->input->post('action');
			if ($bayar < $total) {
				$this->session->set_flashdata('flash', 'Pembayaran kurang mohon isi nominal pembayaran');
				return redirect('transaksi/pembayaran/' . $id);
			}
			if ($action == 'save') {

				// save to pemasukan database
				$this->db->insert('pemasukan', [
					'NO_TRANSAKSI' => $this->input->post('nota'),
					'TANGGAL' => date('Y-m-d'),
					'JAM' => date('H:i:s'),
					'TOTAL' => $total
				]);
				$this->Transaksi_model->pembayaran();
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pembayaran berhasil dimasukkan!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
				return redirect('transaksi/daftarPembayaran');
			} else {
				// save to pemasukan database
				$this->db->insert('pemasukan', [
					'NO_TRANSAKSI' => $this->input->post('nota'),
					'TANGGAL' => date('Y-m-d'),
					'JAM' => date('H:i:s'),
					'TOTAL' => $total
				]);
				$this->Transaksi_model->pembayaran();
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pembayaran berhasil dimasukkan!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
				return $this->prints($nota);
				return redirect('transaksi/daftarPembayaran');
			
			}
		}
	}

	public function prints($nota)
	{
		$data['transaksi'] = $this->Transaksi_model->getTransaksiById($nota);
		$this->load->view('transaksi/print_transaksi', $data);
	}


	public function getPaket()
	{
		$ID_KENDARAAN = $this->input->post('ID_KENDARAAN');
		$paket = $this->Transaksi_model->getPkt($ID_KENDARAAN);

		if ($this->input->get('id')) {
			$transaksi = $this->Transaksi_model->getTransaksiById($this->input->get('id'));
			$lists = "<option value=''>Pilih Paket</option>";
			foreach ($paket as $data) {
				$selected = ($transaksi['ID_PAKET'] == $data->ID_PAKET) ? ' selected="selected"' : "";
				$lists .= "<option value='" . $data->ID_PAKET . "' " . $selected . ">" . $data->JENIS_PAKET . "</option>";
			}
		} else {
			$lists = "<option value=''>Pilih Paket</option>";
			foreach ($paket as $data) {
				$lists .= "<option value='" . $data->ID_PAKET . "'>" . $data->JENIS_PAKET . "</option>";
			}
		}


		header('Content-Type: application/json');
		$callback = array('daftar_paket' => $lists);
		echo json_encode($callback);
	}


	public function getharga($ID_PAKET)
	{
		$pket = $this->db->get_where("paket_cucian", array("ID_PAKET" => $ID_PAKET));
		foreach ($pket->result()  as $row) {
			$arr = array('harga_paket' => $row->HARGA_PAKET);
			header('Content-Type: application/json');
			echo json_encode($arr);
		}
	}



	public function daftarPembayaran()
	{
		$data['page'] = 'Daftar Pembayaran';
		$data['title'] = 'Transaksi | Daftar Pembayaran';
		$data['cucian'] = $this->Transaksi_model->getTransaksi();
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('transaksi/daftar_pembayaran', $data);
		$this->load->view('templates/footer', $data);
	}

	public function daftarPengeluaran()
	{
		$data['page'] = 'Pengeluaran';
		$data['title'] = 'Transaksi | Pengeluaran';
		$data['pengeluaran'] = $this->Transaksi_model->getPengeluaran();
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('transaksi/daftar_pengeluaran', $data);
		$this->load->view('templates/footer', $data);
	}

	public function daftarPengeluaranTambah()
	{


		$data['user'] = $this->db->get_where('user', ['EMAIL' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required', ['required' => 'Pilih tanggal terlebih dahulu.']);
		$this->form_validation->set_rules('alasan', 'Alasan', 'required', ['required' => 'Alasan tidak boleh kosong.']);
		$this->form_validation->set_rules('biaya', 'Biaya', 'required', ['required' => 'Isi nominal biaya pengeluaran.']);

		if ($this->form_validation->run() == false) {
			$data['page'] = 'Tambah Pengeluaran';
			$data['title'] = 'Transaksi | Tambah Pengeluaran';

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('transaksi/daftar_pengeluaran_tambah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$data = [
				'TANGGAL' => $this->input->post('tanggal'),
				'ALASAN' => $this->input->post('alasan'),
				'BIAYA' => $this->input->post('biaya'),
				'ID_USER' => $data['user']['ID_USER'],
			];
			$this->db->insert('pengeluaran', $data);
			$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
			redirect('transaksi/daftarPengeluaran');
		}
	}

	// public function simpanPengeluaran(){
	// 	$data = [
	// 		'TANGGAL' => $this->input->post('tanggal'),
	// 		'ALASAN' => $this->input->post('alasan'),
	// 		'BIAYA' => $this->input->post('biaya'),
	// 	];
	// 	$this->db->insert('pengeluaran', $data);
	// 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
	// 	redirect('/transaksi/daftarPengeluaran');
	// }

	public function editPengeluaran($NO_KELUARAN)
	{

		$data['pengeluaran'] = $this->db->get_where('pengeluaran', ['NO_KELUARAN' => $NO_KELUARAN])->row_array();

		$data['user'] = $this->db->get_where('user', ['EMAIL' =>
		$this->session->userdata('email')])->row_array();


		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required', ['required' => 'Pilih tanggal terlebih dahulu.']);
		$this->form_validation->set_rules('alasan', 'Alasan', 'required', ['required' => 'Alasan tidak boleh kosong.']);
		$this->form_validation->set_rules('biaya', 'Biaya', 'required', ['required' => 'Isi nominal biaya pengeluaran.']);

		if ($this->form_validation->run() == false) {
			$data['page'] = 'Edit Pengeluaran';
			$data['title'] = 'Pengeluaran | Edit Pengeluaran';

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('transaksi/daftar_pengeluaran_edit', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$data = [
				'TANGGAL' => $this->input->post('tanggal'),
				'ALASAN' => $this->input->post('alasan'),
				'BIAYA' => $this->input->post('biaya'),
			];
			$this->db->where('NO_KELUARAN', $NO_KELUARAN);
			$this->db->update('pengeluaran', $data);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			redirect('transaksi/daftarPengeluaran');
		}
	}

	// public function updatePengeluaran($NO_KELUARAN){
	// 	$this->db->where('NO_KELUARAN', $NO_KELUARAN);
	// 	$this->db->update('pengeluaran', [
	// 		'TANGGAL' => $this->input->post('tanggal'),
	// 		'ALASAN' => $this->input->post('alasan'),
	// 		'BIAYA' => $this->input->post('biaya'),
	// 	]);
	// 	$this->session->set_flashdata('flash', 'Diubah');

	// }

	public function hapusPengeluaran($NO_KELUARAN)
	{
		$this->db->where('NO_KELUARAN', $NO_KELUARAN);
		$this->db->delete('pengeluaran');
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		
	}
}
