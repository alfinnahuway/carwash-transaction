<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Dashboard Controller
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Admin_model');
		$this->load->model('Laporan_model', 'Lp');
	}

	public function index()
	{
// 
		$data['laba_rugi'] = $this->labaRugi();
		$data['laba_rugi_prev'] = $this->labaRugiPrev();
		$data['ym'] = $this->input->get('yearMonth', TRUE) ?? date("Y-m");
		$data['ymp'] = $this->getPreviousMonth($this->input->get('yearMonth', TRUE));

		$data['persentase_laba'] = [
			'pemasukkan' => $this->getDiffInPercent($data['laba_rugi']['sum_total'], $data['laba_rugi_prev']['sum_total']),
			'pengeluaran' => $this->getDiffInPercent($data['laba_rugi']['sum_biaya'], $data['laba_rugi_prev']['sum_biaya']),
			'laba' => $this->getDiffInPercent($data['laba_rugi']['sum_laba'], $data['laba_rugi_prev']['sum_laba'])
		];
		$data['title'] = 'Dashboard';
		$data['page'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['EMAIL' =>
		$this->session->userdata('email')])->row_array();
		$data['data_motor'] = $this->Admin_model->hitungJumlahMotor();
		$data['data_mobil'] = $this->Admin_model->hitungJumlahMobil();
		$data['motor'] = $this->Admin_model->dataMotor();
		$data['mobil'] = $this->Admin_model->dataMobil();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer');
	}


	private function labaRugi(){
		if ($this->input->get('yearMonth', TRUE)) {
			$data['yearMonth'] = $this->input->get('yearMonth', TRUE);
			$data['hasil'] = $this->Lp->getLabaByMonth($data['yearMonth']);
		} else {
			$data['hasil'] = $this->Lp->getLabaByMonth(date('Y-m'));
		}
		$json = [
			'tanggal' => $this->pushValueByKey($data['hasil'], 'TANGGAL'),
			'total' => $this->pushValueByKey($data['hasil'], 'TOTAL'),
			'biaya' => $this->pushValueByKey($data['hasil'], 'BIAYA'),
			'laba' => $this->pushValueByKey($data['hasil'], 'LABA'),
			'sum_total' => $this->sumValueByKey($data['hasil'], 'TOTAL'),
			'sum_biaya' => $this->sumValueByKey($data['hasil'], 'BIAYA'),
			'sum_laba' => $this->sumValueByKey($data['hasil'], 'LABA'),
		];
		return $json;
	}

	private function getDiffInPercent($current, $previous)
	{
		$diff = $current - $previous;
		if ($previous == 0) {
			if ($current == 0) {
				return 0;
			}
			return 100;
		}
		$percent = ($diff / abs($previous)) * 100;
		if ($percent > 100)
			return 100;
		if ($percent < -100)
			return -100;

		return $percent;
	}

	private function labaRugiPrev()
	{
		if ($this->input->get('yearMonth', TRUE)) {
			$data['yearMonth'] = $this->getPreviousMonth($this->input->get('yearMonth', TRUE));
			$data['hasil'] = $this->Lp->getLabaByMonth($data['yearMonth']);
		} else {
			$data['hasil'] = $this->Lp->getLabaByMonth($this->getPreviousMonth(date('Y-m')), true);
		}

		$json = [
			'tanggal' => $this->pushValueByKey($data['hasil'], 'TANGGAL'),
			'total' => $this->pushValueByKey($data['hasil'], 'TOTAL'),
			'biaya' => $this->pushValueByKey($data['hasil'], 'BIAYA'),
			'laba' => $this->pushValueByKey($data['hasil'], 'LABA'),
			'sum_total' => $this->sumValueByKey($data['hasil'], 'TOTAL'),
			'sum_biaya' => $this->sumValueByKey($data['hasil'], 'BIAYA'),
			'sum_laba' => $this->sumValueByKey($data['hasil'], 'LABA'),
		];
		return $json;
	}

	private function pushValueByKey($array, $key)
	{
		$result = [];
		foreach ($array as $item) {
			$result[] = $item[$key];
		}
		return $result;
	}

	private function getPreviousMonth($yearmonth)
	{
		return date('Y-m', strtotime($yearmonth . " -1 month"));
	}

	private function sumValueByKey($array, $key)
	{
		$result = 0;
		foreach ($array as $item) {
			$result += $item[$key];
		}
		return $result;
	}



	// public function role()
	// {
	// 	$data['title'] = 'Dashboard';
	// 	$data['page'] = 'Role';
	// 	$data['user'] = $this->db->get_where('user', ['EMAIL' =>
	// 	$this->session->userdata('email')])->row_array();

	// 	$data['role'] = $this->db->get_where('user_role')->result_array();

	// 	$this->load->view('templates/header', $data);
	// 	$this->load->view('templates/navbar', $data);
	// 	$this->load->view('templates/sidebar', $data);
	// 	$this->load->view('dashboard/role', $data);
	// 	$this->load->view('templates/footer');
	// }

	// public function roleAccess($role_id)
	// {
	//     $data['title'] = 'Admin';
	//     $data['page'] = 'Role';
	//     $data['page2'] = 'Role Access';
	//     $data['user'] = $this->db->get_where('user', ['email' =>
	//     $this->session->userdata('email')])->row_array();

	//     $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

	//     $this->db->where('id !=', 1);
	//     $data['menu'] = $this->db->get('user_menu')->result_array();

	//     $this->load->view('templates/header', $data);
	//     $this->load->view('templates/navbar', $data);
	//     $this->load->view('templates/sidebar', $data);
	//     $this->load->view('admin/role-access', $data);
	//     $this->load->view('templates/footer');
	// }

	// public function changeaccess()
	// {
	//     $menu_id = $this->input->post('menuId');
	//     $role_id = $this->input->post('roleId');

	//     $data = [
	//         'role_id' => $role_id,
	//         'menu_id' => $menu_id
	//     ];

	//     $result = $this->db->get_where('user_access_menu', $data);

	//     if ($result->num_rows() < 1) {
	//         $this->db->insert('user_access_menu', $data);
	//     } else {
	//         $this->db->delete('user_access_menu', $data);
	//     }

	//     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
	//     Access Changed!
	//     </div>');
	// }



	public function deleteTransaksi($id)
	{
		$this->Admin_model->deleteTransaksiById($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('dashboard/cuci');
	}


	public function pembayaran($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->model('Admin_model', 'mimin');
		$data['transaksi'] = $this->mimin->transaksiById($id);

		$this->form_validation->set_rules('noplat', 'No. Polisi', 'required');
		$this->form_validation->set_rules('kendaraan', 'Kendaraan', 'required');
		$this->form_validation->set_rules('paket', 'Paket', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Kasir';
			$data['page'] = 'Mencuci';
			$data['page2'] = 'Pembayaran';

			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('dashboard/bayar', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$this->Admin_model->pembayaran();
			$this->session->set_flashdata('flash', 'Pembayaran Berhasil');
			redirect('kasir/cuci');
		}
	}
}
