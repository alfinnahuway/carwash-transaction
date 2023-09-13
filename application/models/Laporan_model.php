<?php defined('BASEPATH') or exit('No direct script access allowed');
class Laporan_model extends CI_Model
{
	public function getAllData()
	{
		$tanggal = date('Ymd');
		$query = "SELECT `transaksi`.*, `kendaraan`.`JENIS_KENDARAAN`,`paket_cucian`.`JENIS_PAKET`
        FROM `transaksi` 
        JOIN `kendaraan` ON `transaksi`.`ID_KENDARAAN` = `kendaraan`.`ID_KENDARAAN`
        JOIN `paket_cucian` ON `transaksi`.`ID_PAKET` = `paket_cucian`.`ID_PAKET`
        WHERE `STATUS_CUCI` = 'SUDAH DIBAYAR' AND `TANGGAL` = $tanggal
        ORDER BY `NO_TRANSAKSI` ASC
        ";
		return $this->db->query($query)->result_array();
	}
	public function getAllDataByRange($tgl_awal, $tgl_akhir)
	{
		$query = "SELECT `transaksi`.*, `kendaraan`.`JENIS_KENDARAAN`,`paket_cucian`.`JENIS_PAKET`
        FROM `transaksi` 
        JOIN `kendaraan` ON `transaksi`.`ID_KENDARAAN` = `kendaraan`.`ID_KENDARAAN`
        JOIN `paket_cucian` ON `transaksi`.`ID_PAKET` = `paket_cucian`.`ID_PAKET`
        WHERE `STATUS_CUCI` = 'SUDAH DIBAYAR' AND `TANGGAL` between '$tgl_awal' AND '$tgl_akhir'
        ORDER BY `NO_TRANSAKSI` ASC
        ";
		return $this->db->query($query)->result_array();
	}

	public function filter($start_date, $end_date)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('kendaraan', 'transaksi.ID_KENDARAAN=kendaraan.ID_KENDARAAN');
		$this->db->join('paket_cucian', 'transaksi.ID_PAKET=paket_cucian.ID_PAKET');
		$this->db->where('STATUS_CUCI', 'SUDAH DIBAYAR');
		$this->db->where('TANGGAL >=', $start_date);
		$this->db->where('TANGGAL <=', $end_date);
		return $this->db->get()->result_array();


		// $query = "SELECT `transaksi`.*, `kendaraan`.`JENIS_KENDARAAN`,`paket_cucian`.`JENIS_PAKET`
		// FROM `transaksi` 
		// JOIN `kendaraan` ON `transaksi`.`ID_KENDARAAN` = `kendaraan`.`ID_KENDARAAN`
		// JOIN `paket_cucian` ON `transaksi`.`ID_PAKET` = `paket_cucian`.`ID_PAKET`
		// WHERE `STATUS_CUCI` = 'SUDAH DIBAYAR'
		// ";
		// $this->db->where('TANGGAL >=', $start_date);
		// $this->db->where('TANGGAL <=', $end_date);
		// return $this->db->query($query)->result_array();

		// $this->db->where('TANGGAL BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"');
		// return $this->db->get('transaksi')->result();

		// $this->db->where('TANGGAL >=', $start_date);
		// $this->db->where('TANGGAL <=', $end_date);
		// return $this->db->get($table)->result();
	}

	public function getPengeluaran($tgl_awal, $tgl_akhir)
	{
		$this->db->select('*');
		$this->db->from('pengeluaran');
		$this->db->where('TANGGAL >=', $tgl_awal);
		$this->db->where('TANGGAL <=', $tgl_akhir);
		$this->db->order_by('TANGGAL ASC');
		return $this->db->get()->result_array();
	}

	public function getAllDataPengeluaran()
	{
		$tanggal = date('Ymd');
		$this->db->where('TANGGAL =', $tanggal);
		$this->db->order_by('TANGGAL ASC');
		return $this->db->get('pengeluaran')->result_array();
	}

	public function getSumPengeluaran($tgl_awal, $tgl_akhir)
	{
		$this->db->select_sum('BIAYA');
		$this->db->from('pengeluaran');
		$this->db->where('TANGGAL >=', $tgl_awal);
		$this->db->where('TANGGAL <=', $tgl_akhir);
		$this->db->order_by('TANGGAL ASC');
		return $this->db->get()->row_array();
	}

	public function getSumTransaksi($tgl_awal, $tgl_akhir)
	{
		$this->db->select_sum('HARGA');
		$this->db->from('transaksi');
		$this->db->where('TANGGAL >=', $tgl_awal);
		$this->db->where('TANGGAL <=', $tgl_akhir);
		$this->db->where('STATUS_CUCI', 'SUDAH DIBAYAR');
		return $this->db->get()->result_array();
	}

	public function getSumPemasukan($tgl_awal, $tgl_akhir)
	{
		$this->db->select_sum('TOTAL');
		$this->db->from('pemasukan');
		$this->db->where('TANGGAL >=', $tgl_awal);
		$this->db->where('TANGGAL <=', $tgl_akhir);
		return $this->db->get()->row_array();
	}

	public function getPemasukan($tgl_awal, $tgl_akhir)
	{
		$this->db->select('*,sum(TOTAL) as TOTAL');
		$this->db->from('pemasukan');
		$this->db->where('TANGGAL >=', $tgl_awal);
		$this->db->where('TANGGAL <=', $tgl_akhir);
		// group by tanggal
		$this->db->group_by('TANGGAL');
		return $this->db->get()->result_array();
	}

	public function groupByDateGetSum()
	{
		$this->db->select('TANGGAL, SUM(TOTAL) AS TOTAL');
		$this->db->from('pemasukan');
		$this->db->group_by('TANGGAL');
		return $this->db->get()->result_array();
	}



	public function getLaba()
	{
		$this->db->select('IFNULL(DATE(pemasukan.TANGGAL),DATE(pengeluaran.TANGGAL)) as TANGGAL,IFNULL( SUM(pemasukan.TOTAL) , 0 ) AS TOTAL, IFNULL(SUM(pengeluaran.BIAYA),0) AS BIAYA, IFNULL(SUM(pemasukan.TOTAL),0) - IFNULL(SUM(pengeluaran.BIAYA),0) AS LABA');
		$this->db->from('pemasukan');
		$this->db->join('pengeluaran', 'pemasukan.TANGGAL = pengeluaran.TANGGAL', 'right outer');
		$this->db->group_by('TANGGAL');
		$query_1 = $this->db->get_compiled_select();


		$this->db->select('IFNULL(DATE(pengeluaran.TANGGAL),DATE(pemasukan.TANGGAL)) as TANGGAL, IFNULL(SUM(pemasukan.TOTAL),0) AS TOTAL, IFNULL(SUM(pengeluaran.BIAYA),0) AS BIAYA,IFNULL(SUM(pemasukan.TOTAL),0) - IFNULL(SUM(pengeluaran.BIAYA),0) AS LABA');
		$this->db->from('pengeluaran');
		$this->db->join('pemasukan', 'pemasukan.TANGGAL = pengeluaran.TANGGAL', 'right outer');
		$this->db->group_by('TANGGAL');
		$query_2 = $this->db->get_compiled_select();
		$final_query = $this->db->query($query_1 . ' UNION ' . $query_2);

		return $final_query->result_array();
	}
	public function getLabaByTanggal($tgl_awal, $tgl_akhir)
	{

		// where between
		// get semua tanggal transaksi pengeluaran dan pemasukkan
		$queryOnlyTanggal = "SELECT   
			DATE_FORMAT(tanggal,'%Y-%m-%d') as TANGGAL
			FROM `pengeluaran` 
			WHERE  TANGGAL BETWEEN '$tgl_awal' AND '$tgl_akhir'
		UNION 
		SELECT 
			DATE_FORMAT(tanggal,'%Y-%m-%d')
			FROM `pemasukan`
			WHERE  TANGGAL BETWEEN '$tgl_awal' AND '$tgl_akhir'
			;";
		// execute raw query
		$resultOnlyTanggal = $this->db->query($queryOnlyTanggal)->result_array();



		// foreach tanggal and get total pemasukkan pengeluaran
		$results = [];
		foreach ($resultOnlyTanggal as $key => $value) {
			$tanggal = $value['TANGGAL'];
			// get from pemasukkan by tanggal
			$queryPemasukkan = "SELECT  sum(pemasukan.TOTAL) as TOTAL_PEMASUKKAN FROM pemasukan";
			$queryPemasukkan .= " WHERE pemasukan.TANGGAL LIKE '$tanggal%' ";
			// execute raw query
			$resultPemasukkan = $this->db->query($queryPemasukkan)->row_array();
			// if resultPemasukkan not found retun 0
			if (empty($resultPemasukkan)) {
				$total_pemasukkan = 0;
			} else {
				$total_pemasukkan = $resultPemasukkan['TOTAL_PEMASUKKAN'];
			}

			// get from pengeluaran by tanggal
			$queryPengeluaran = "SELECT sum(pengeluaran.BIAYA) as TOTAL_PENGELUARAN FROM pengeluaran";
			$queryPengeluaran .= " WHERE pengeluaran.TANGGAL LIKE '$tanggal%' ";
			// execute raw query
			$resultPengeluaran = $this->db->query($queryPengeluaran)->row_array();
			// if resultPengeluaran not found retun 0
			if (empty($resultPengeluaran)) {
				$total_pengeluaran = 0;
			} else {
				$total_pengeluaran = $resultPengeluaran['TOTAL_PENGELUARAN'];
			}

			// get laba
			$laba = $total_pemasukkan - $total_pengeluaran;

			// pusth top result by tanggal
			$results[] = [
				'TANGGAL' => $tanggal,
				'TOTAL' => $total_pemasukkan,
				'BIAYA' => $total_pengeluaran,
				'LABA' => $laba

			];
		}
		return $results;
		// $this->db->select('IFNULL(DATE(pemasukan.TANGGAL),DATE(pengeluaran.TANGGAL)) as TANGGAL,IFNULL( SUM(pemasukan.TOTAL) , 0 ) AS TOTAL, IFNULL(SUM(pengeluaran.BIAYA),0) AS BIAYA, IFNULL(SUM(pemasukan.TOTAL),0) - IFNULL(SUM(pengeluaran.BIAYA),0) AS LABA');
		// $this->db->from('pemasukan');
		// $this->db->join('pengeluaran', 'pemasukan.TANGGAL = pengeluaran.TANGGAL', 'right outer');
		// $this->db->where('pengeluaran.TANGGAL >=', $tgl_awal);
		// $this->db->where('pengeluaran.TANGGAL <=', $tgl_akhir);
		// $this->db->group_by('TANGGAL');
		// $query_1 = $this->db->get_compiled_select();


		// $this->db->select('IFNULL(DATE(pengeluaran.TANGGAL),DATE(pemasukan.TANGGAL)) as TANGGAL, IFNULL(SUM(pemasukan.TOTAL),0) AS TOTAL, IFNULL(SUM(pengeluaran.BIAYA),0) AS BIAYA,IFNULL(SUM(pemasukan.TOTAL),0) - IFNULL(SUM(pengeluaran.BIAYA),0) AS LABA');
		// $this->db->from('pengeluaran');
		// $this->db->join('pemasukan', 'pemasukan.TANGGAL = pengeluaran.TANGGAL', 'right outer');
		// $this->db->where('pemasukan.TANGGAL >=', $tgl_awal);
		// $this->db->where('pemasukan.TANGGAL <=', $tgl_akhir);
		// $this->db->group_by('TANGGAL');
		// $query_2 = $this->db->get_compiled_select();
		// $final_query = $this->db->query($query_1 . ' UNION ' . $query_2);

		// return $final_query->result_array();
	}

	public function getLabaByMonth($yearMonth, $isPrev = false)
	{
		// get semua tanggal transaksi pengeluaran dan pemasukkan
		$queryOnlyTanggal = "SELECT   
			DATE(TANGGAL) as TANGGAL
			FROM `pengeluaran` 
			WHERE TANGGAL LIKE '$yearMonth%'
		UNION 
		SELECT 
			DATE(TANGGAL)
			FROM `pemasukan`
			WHERE TANGGAL LIKE '$yearMonth%'
			ORDER BY TANGGAL ASC";
		// execute raw query
		$resultOnlyTanggal = $this->db->query($queryOnlyTanggal)->result_array();


		// foreach tanggal and get total pemasukkan pengeluaran
		$results = [];
		foreach ($resultOnlyTanggal as $key => $value) {
			$tanggal = $value['TANGGAL'];
			// get from pemasukkan by tanggal
			$queryPemasukkan = "SELECT  sum(pemasukan.TOTAL) as TOTAL_PEMASUKKAN FROM pemasukan";
			$queryPemasukkan .= " WHERE pemasukan.TANGGAL LIKE '$tanggal%' ";
			// execute raw query
			$resultPemasukkan = $this->db->query($queryPemasukkan)->row_array();
			// if resultPemasukkan not found retun 0
			if (empty($resultPemasukkan)) {
				$total_pemasukkan = 0;
			} else {
				$total_pemasukkan = $resultPemasukkan['TOTAL_PEMASUKKAN'];
			}

			// get from pengeluaran by tanggal
			$queryPengeluaran = "SELECT sum(pengeluaran.BIAYA) as TOTAL_PENGELUARAN FROM pengeluaran";
			$queryPengeluaran .= " WHERE pengeluaran.TANGGAL LIKE '$tanggal%' ";
			// execute raw query
			$resultPengeluaran = $this->db->query($queryPengeluaran)->row_array();
			// if resultPengeluaran not found retun 0
			if (empty($resultPengeluaran)) {
				$total_pengeluaran = 0;
			} else {
				$total_pengeluaran = $resultPengeluaran['TOTAL_PENGELUARAN'];
			}

			// get laba
			$laba = $total_pemasukkan - $total_pengeluaran;

			// pusth top result by tanggal
			$results[] = [
				'TANGGAL' => $tanggal,
				'TOTAL' => $total_pemasukkan,
				'BIAYA' => $total_pengeluaran,
				'LABA' => $laba

			];
		}

		return $results;
	}

	public function getSumLabaByTanggal($tgl_awal, $tgl_akhir)
	{
		$this->db->select('IFNULL(DATE(pemasukan.TANGGAL),DATE(pengeluaran.TANGGAL)) as TANGGAL,IFNULL( SUM(pemasukan.TOTAL) , 0 ) AS TOTAL, IFNULL(SUM(pengeluaran.BIAYA),0) AS BIAYA, IFNULL(SUM(pemasukan.TOTAL),0) - IFNULL(SUM(pengeluaran.BIAYA),0) AS LABA');
		$this->db->from('pemasukan');
		$this->db->join('pengeluaran', 'pemasukan.TANGGAL = pengeluaran.TANGGAL', 'right outer');
		$this->db->where('pengeluaran.TANGGAL >=', $tgl_awal);
		$this->db->where('pengeluaran.TANGGAL <=', $tgl_akhir);
		$this->db->group_by('TANGGAL');
		$query_1 = $this->db->get_compiled_select();


		$this->db->select('IFNULL(DATE(pengeluaran.TANGGAL),DATE(pemasukan.TANGGAL)) as TANGGAL, IFNULL(SUM(pemasukan.TOTAL),0) AS TOTAL, IFNULL(SUM(pengeluaran.BIAYA),0) AS BIAYA,IFNULL(SUM(pemasukan.TOTAL),0) - IFNULL(SUM(pengeluaran.BIAYA),0) AS LABA');
		$this->db->from('pengeluaran');
		$this->db->join('pemasukan', 'pemasukan.TANGGAL = pengeluaran.TANGGAL', 'right outer');
		$this->db->where('pemasukan.TANGGAL >=', $tgl_awal);
		$this->db->where('pemasukan.TANGGAL <=', $tgl_akhir);
		$this->db->group_by('TANGGAL');
		$query_2 = $this->db->get_compiled_select();
		$final_query = $this->db->query($query_1 . ' UNION ' . $query_2);

		return $final_query->result_array();
	}
}
