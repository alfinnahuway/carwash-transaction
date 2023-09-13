<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{


    public function hitungJumlahMotor()
    {	
		// die($this->input->get('yearMonth', TRUE) ?? date("Y-m-d"));
        $DATEYEAR = $this->input->get('yearMonth', TRUE) ?? date("Y-m-d");
		$this->db->where('ID_KENDARAAN', 1);
        $this->db->where('STATUS_CUCI', 'SUDAH DIBAYAR');
		$this->db->where('TANGGAL like', '%' . $DATEYEAR . '%');
        $query = $this->db->get('transaksi');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function hitungJumlahMobil()
    {
        $DATEYEAR = $this->input->get('yearMonth', TRUE) ?? date("Y-m-d");
		$this->db->where('ID_KENDARAAN', 2);
        $this->db->where('STATUS_CUCI', 'SUDAH DIBAYAR');
		$this->db->where('TANGGAL like', '%' . $DATEYEAR . '%');
        $query = $this->db->get('transaksi');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function dataMotor()
    {
		$DATEYEAR = $this->input->get('yearMonth', TRUE) ?? date("Y-m-d");
        $vhari = date('d');
        $this->db->select('*');
        $this->db->select('SUM(HARGA) as total');
        $this->db->from('transaksi');
		$this->db->where('TANGGAL like', '%' . $DATEYEAR . '%');
        $this->db->where('ID_KENDARAAN', 1);
        $this->db->where('STATUS_CUCI', 'SUDAH DIBAYAR');
        $query = $this->db->get()->row()->total;
        return $query;
    }

    function dataMobil()
    {
		$DATEYEAR = $this->input->get('yearMonth', TRUE) ?? date("Y-m-d");
        $vhari = date('d');
        $this->db->select('*');
        $this->db->select('SUM(HARGA) as total');
        $this->db->from('transaksi');
		$this->db->where('TANGGAL like', '%' . $DATEYEAR . '%');
        $this->db->where('ID_KENDARAAN', 2);
        $this->db->where('STATUS_CUCI', 'SUDAH DIBAYAR');
        $query = $this->db->get()->row()->total;
        return $query;
    }

    function dataBulanIni()
    {
        $vbulan = date('m');
        $this->db->select('*');
        $this->db->select('SUM(HARGA) as total');
        $this->db->from('transaksi');
        $this->db->where('month(TANGGAL)', $vbulan);
        $this->db->where('STATUS_CUCI', 'SUDAH DIBAYAR');
        $query = $this->db->get()->row()->total;
        return $query;
    }

    function dataBulanKemarin()
    {

        $vbulan = mktime(0, 0, 0, date("n") - 1);
        $bulan = date('m', $vbulan);

        $this->db->select('*');
        $this->db->select('SUM(HARGA) as total');
        $this->db->from('transaksi');
        $this->db->where('month(TANGGAL)', $bulan);
        $this->db->where('STATUS_CUCI', 'SUDAH DIBAYAR');
        $query = $this->db->get()->row()->total;
        return $query;
    }


    public function deleteTransaksiById($id)
    {
        $this->db->where('NO_TRANSAKSI', $id);
        $this->db->delete('transaksi');
    }
}
