<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Laporan_model', 'Lp');
	}

	public function index()
	{
		$data['title'] = 'Laporan | Transaksi';
		$data['page'] = 'Transaksi';

		if ($this->input->get('tgl_awal', TRUE)) {
			$data['tgl_awal'] = $this->input->get('tgl_awal', TRUE);
			$data['tgl_akhir'] = $this->input->get('tgl_akhir', TRUE);
			$data['hasil'] = $this->Lp->getAllDataByRange($data['tgl_awal'], $data['tgl_akhir']);
		} else {
			$data['tgl_awal'] = date('Y-m-d');
			$data['tgl_akhir'] =
				date('Y-m-d');
			$data['hasil'] = $this->db->get('pengeluaran')->result_array();
			$data['hasil'] = $this->Lp->getAllData();
		}

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan/index', $data);
		$this->load->view('templates/footer');
	}

	public function search()
	{
		$valid = $this->form_validation;
		$valid->set_error_delimiters('<i style="color: red;">', '</i>');
		$valid->set_rules('start_date', 'Field Start Date', 'required|trim|strip_tags|htmlspecialchars');
		$valid->set_rules('end_date', 'Field Start Date', 'required|trim|strip_tags|htmlspecialchars');

		if ($valid->run() === TRUE) {
			$input = $this->input->post(NULL, TRUE);
			$data = $this->Lp->filter($input["start_date"], $input["end_date"]);
			return $this->response([
				'data'      => array_values($data)
			]);
		} else return  $this->response(['success' => FALSE, 'error' => validation_errors()]);
	}

	public function response($data)
	{
		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
			->_display();
		exit();
	}

	public function cetaklap()
	{
		// dapatkan output html
		$html = $this->output->get_output();
		// Load/panggil library dompdfnya
		$this->load->library('dompdf_gen');
		$this->load->view('laporan/cetaklaporan');
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		//utk menampilkan preview pdf
		$sekarang = date("d:F:Y:h:m:s");
		$this->dompdf->stream("laporan" . $sekarang . ".pdf", array('Attachment' => 0));
		//atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
		//$this->dompdf->stream("welcome.pdf");
	}


	function pengeluaran()
	{
		$data['title'] = 'Laporan | Pengeluaran';
		$data['page'] = 'Pengeluaran';


		if ($this->input->get('tgl_awal', TRUE)) {
			$data['tgl_awal'] = $this->input->get('tgl_awal', TRUE);
			$data['tgl_akhir'] = $this->input->get('tgl_akhir', TRUE);
			$data['hasil'] = $this->Lp->getPengeluaran($data['tgl_awal'], $data['tgl_akhir']);
			$data['sum'] = $this->Lp->getSumPengeluaran($data['tgl_awal'], $data['tgl_akhir']);
		} else {
			$data['tgl_awal'] = date('Y-m-d');
			$data['tgl_akhir'] =
				date('Y-m-d');
			$data['hasil'] = $this->Lp->getAllDataPengeluaran();
			$data['sum'] =
				// query today
				$this->db->select_sum('BIAYA')->from('pengeluaran')
				->where('TANGGAL >=', $data['tgl_awal'])
				->where('TANGGAL <=', $data['tgl_akhir'])
				->get()->row_array();
		}



		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan/pengeluaran', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_laporan_pengeluaran()
	{
		$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

		if ($this->input->get('tgl_awal', TRUE)) {
			$data['tgl_awal'] = $this->input->get('tgl_awal', TRUE);
			$data['tgl_akhir'] = $this->input->get('tgl_akhir', TRUE);
			$data['hasil'] = $this->Lp->getPengeluaran($tgl_awal, $tgl_akhir);
			$data['sum'] = $this->Lp->getSumPengeluaran($tgl_awal, $tgl_akhir);
		
		} else {
			$data['tgl_awal'] = date('Y-m-d');
			$data['tgl_akhir'] = date('Y-m-d');
			$data['hasil'] = $this->Lp->getAllDataPengeluaran();
			$data['sum'] =
				// query today
				$this->db->select_sum('BIAYA')->from('pengeluaran')
				->where('TANGGAL >=', $data['tgl_awal'])
				->where('TANGGAL <=', $data['tgl_akhir'])
				->get()->row_array();
			
		}
		$data['page'] = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
		$this->load->view('laporan/print_laporan_pengeluaran', $data);

	}



	function pemasukan()
	{
		$data['title'] = 'Laporan | Pemasukan';
		$data['page'] = 'Pemasukan';

		if ($this->input->get('tgl_awal', TRUE)) {
			$data['tgl_awal'] = $this->input->get('tgl_awal', TRUE);
			$data['tgl_akhir'] = $this->input->get('tgl_akhir', TRUE);
			$data['hasil'] = $this->Lp->getPemasukan($data['tgl_awal'], $data['tgl_akhir']);
			$data['sum'] = $this->Lp->getSumPemasukan($data['tgl_awal'], $data['tgl_akhir']);
		} else {
			$data['tgl_awal'] = date('Y-m-d');
			$data['tgl_akhir'] = date('Y-m-d');
			$data['hasil'] =
				// group by tanggal
				$this->db->select('TANGGAL, SUM(TOTAL) AS TOTAL')
				->group_by('TANGGAL')
				->order_by('TANGGAL', 'DESC')
				->where('TANGGAL >=', $data['tgl_awal'])
				->where('TANGGAL <=', $data['tgl_akhir'])
				->get('pemasukan')
				->result_array();

			$data['sum'] =
				// query today
				$this->db->select_sum('TOTAL')->from('pemasukan')
				->where('TANGGAL >=', $data['tgl_awal'])
				->where('TANGGAL <=', $data['tgl_akhir'])
				->get()->row_array();
		}
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan/pemasukan', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_laporan_pemasukan()
	{
		$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

		if ($this->input->get('tgl_awal', TRUE)) {
			$data['tgl_awal'] = $this->input->get('tgl_awal', TRUE);
			$data['tgl_akhir'] = $this->input->get('tgl_akhir', TRUE);
			$data['hasil'] = $this->Lp->getPemasukan($tgl_awal, $tgl_akhir);
			$data['sum'] = $this->Lp->getSumPemasukan($tgl_awal, $tgl_akhir);
		
		} else {
			$data['tgl_awal'] = date('Y-m-d');
			$data['tgl_akhir'] = date('Y-m-d');
			$data['hasil'] =
				// group by tanggal
				$this->db->select('TANGGAL, SUM(TOTAL) AS TOTAL')
				->group_by('TANGGAL')
				->order_by('TANGGAL', 'DESC')
				->where('TANGGAL >=', $data['tgl_awal'])
				->where('TANGGAL <=', $data['tgl_akhir'])
				->get('pemasukan')
				->result_array();

			$data['sum'] =
				// query today

				$this->db->select_sum('TOTAL')->from('pemasukan')
				->where('TANGGAL >=', $data['tgl_awal'])
				->where('TANGGAL <=', $data['tgl_akhir'])
				->get()->row_array();
			
		}
		$data['page'] = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
		$this->load->view('laporan/print_laporan_pemasukan', $data);

	}

	public function labaRugi()
	{

		$data['title'] = 'Laporan | Laba-Rugi';
		$data['page'] = 'Laba-Rugi';

		if ($this->input->get('tgl_awal', TRUE)) {
			$data['tgl_awal'] = $this->input->get('tgl_awal', TRUE);
			$data['tgl_akhir'] = $this->input->get('tgl_akhir', TRUE);
			$data['hasil'] = $this->Lp->getLabaByTanggal($data['tgl_awal'], $data['tgl_akhir']);
			$data['sum'] = $this->getSumFromArrayKey($data['hasil']);
		} else {
			$data['tgl_awal'] = date('Y-m-d');
			$data['tgl_akhir'] = date('Y-m-d');
			$data['hasil'] = $this->Lp->getLabaByTanggal($data['tgl_awal'], $data['tgl_akhir']);
			$data['sum'] = $this->getSumFromArrayKey($data['hasil']);
		}
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan/labarugi', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_laporan_labarugi()
	{
		$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

		if ($this->input->get('tgl_awal', TRUE)) {
			$data['tgl_awal'] = $this->input->get('tgl_awal', TRUE);
			$data['tgl_akhir'] = $this->input->get('tgl_akhir', TRUE);
			$data['hasil'] = $this->Lp->getLabaByTanggal($data['tgl_awal'], $data['tgl_akhir']);
			$data['sum'] = $this->getSumFromArrayKey($data['hasil']);
		
		} else {
			$data['tgl_awal'] = date('Y-m-d');
			$data['tgl_akhir'] = date('Y-m-d');
			$data['hasil'] = $this->Lp->getLabaByTanggal($data['tgl_awal'], $data['tgl_akhir']);
			$data['sum'] = $this->getSumFromArrayKey($data['hasil']);
			
		}
		$data['page'] = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
		$this->load->view('laporan/print_laporan_labarugi', $data);

	}


	private function getSumFromArrayKey($array)
	{
		$sum['pemasukkan'] = 0;
		$sum['pengeluaran'] = 0;
		$sum['laba'] = 0;
		foreach ($array as $item) {
			$sum['pemasukkan'] += $item['TOTAL'];
			$sum['pengeluaran'] += $item['BIAYA'];
			$sum['laba'] += $item['LABA'];
		}
		return $sum;
	}
	public function cetak_laporan_transaksi()
	{
		$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

		if ($this->input->get('tgl_awal', TRUE)) {
			$data['tgl_awal'] = $this->input->get('tgl_awal', TRUE);
			$data['tgl_akhir'] = $this->input->get('tgl_akhir', TRUE);
			$data['hasil'] = $this->Lp->getAllDataByRange($tgl_awal, $tgl_akhir);
			$data['transaksi'] = $this->Lp->getSumTransaksi($tgl_awal, $tgl_akhir);
		
		} else {
			$data['tgl_awal'] = date('Y-m-d');
			$data['tgl_akhir'] =date('Y-m-d');
			$data['hasil'] = $this->db->get('pengeluaran')->result_array();
			$data['hasil'] = $this->Lp->getAllData();
			
		}
		$data['page'] = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
		$this->load->view('laporan/print_laporan_transaksi', $data);

	}
}
