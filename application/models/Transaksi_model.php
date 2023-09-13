<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{

    public function getCuci()
    {
        $query = "SELECT `transaksi`.*, `kendaraan`.`JENIS_KENDARAAN`,`paket_cucian`.`JENIS_PAKET`
        FROM `transaksi` 
        JOIN `kendaraan` ON `transaksi`.`ID_KENDARAAN` = `kendaraan`.`ID_KENDARAAN`
        JOIN `paket_cucian` ON `transaksi`.`ID_PAKET` = `paket_cucian`.`ID_PAKET`
        WHERE `STATUS_CUCI` = 'DALAM PROSES'
        ORDER BY `NO_TRANSAKSI` ASC
        ";

        return $this->db->query($query)->result_array();
    }

    public function getKendaraan()
    {
        $this->db->order_by('JENIS_KENDARAAN', 'ASC');
        $hasil = $this->db->get('kendaraan');
        return $hasil->result_array();
    }

    public function getPkt($ID_KENDARAAN)
    {
        $this->db->where('ID_KENDARAAN', $ID_KENDARAAN);
        $hasil = $this->db->get('paket_cucian')->result();

        return $hasil;
    }


    public function paket()
    {
        return $this->db->get('paket_cucian')->result_array();
    }

    public function getNota()
    {

        //TIMEZONE
        date_default_timezone_set("Asia/Jakarta");
        $date = date("Ymd");

        // NOMOR URUT ORDER
        $sql = $this->db->query("SELECT max(NO_TRANSAKSI) as maxKode FROM transaksi WHERE NO_TRANSAKSI LIKE '$date%'");

        $dta = $sql->row_array();
        $notransaksi = $dta['maxKode'];
        $lastnourut = null;
        if($notransaksi !== null) {
        $lastnourut = (int) substr($notransaksi, 8, 3);
        }
        $noUrut = $lastnourut + 1;
        return  $date . sprintf("%03s", $noUrut);
    }

    public function editTransaksi($nota)
    {
        $nota = $this->input->post('nota');
        $data = array(
            'NO_TRANSAKSI' => $this->input->post('nota'),
            'TANGGAL' => date('Ymd'),
            'NOPLAT' => $this->input->post('nopol'),
            'ID_KENDARAAN' => $this->input->post('idken'),
            'ID_PAKET' => $this->input->post('idpaket'),
            'HARGA' => $this->input->post('total')
        );
        $this->db->where('NO_TRANSAKSI', $nota);
        $this->db->update('transaksi', $data);
    }

    public function deleteTransaksiById($id)
    {
        $this->db->where('NO_TRANSAKSI', $id);
        $this->db->delete('transaksi');
    }


    public function transaksiById($id)
    {
        $query = "SELECT `transaksi`.*, `kendaraan`.`JENIS_KENDARAAN`,`paket_cucian`.`JENIS_PAKET`
        FROM `transaksi` 
        JOIN `kendaraan` ON `transaksi`.`ID_KENDARAAN` = `kendaraan`.`ID_KENDARAAN`
        JOIN `paket_cucian` ON `transaksi`.`ID_PAKET` = `paket_cucian`.`ID_PAKET`
        WHERE `NO_TRANSAKSI` = $id
        ";

        return $this->db->query($query)->row_array();
    }

    public function pembayaran()
    {
        $data = [
            'STATUS_CUCI' => 'SUDAH DIBAYAR',
            'HARGA' => $this->input->post('ttl'),
            'BAYAR' => $this->input->post('byr'),
            'KEMBALI' => $this->input->post('kbl')
        ];

        $this->db->where('NO_TRANSAKSI', $this->input->post('nota'));
        $this->db->update('transaksi', $data);
    }

    public function cetakNota($nota)
    {
        $query = "SELECT `transaksi`.*, `kendaraan`.`JENIS_KENDARAAN`,`paket_cucian`.`JENIS_PAKET`
        FROM `transaksi` 
        JOIN `kendaraan` ON `transaksi`.`ID_KENDARAAN` = `kendaraan`.`ID_KENDARAAN`
        JOIN `paket_cucian` ON `transaksi`.`ID_PAKET` = `paket_cucian`.`ID_PAKET`
        WHERE `NO_TRANSAKSI` = $nota
        ";

        return $this->db->query($query)->result();
    }

    // function cariTransaksi($keyword){
    //     $query = "SELECT * FROM `transaksi` WHERE 
    //                 `NO_TRANSAKSI` LIKE '%$keyword%' OR
    //                 `TANGGAL` LIKE '%$keyword%' OR
    //                 `NOPLAT` LIKE '%$keyword%' OR
    //                 `ID_KENDARAAN` LIKE '%$keyword%' OR
    //                 `ID_PAKET` LIKE '%$keyword%' OR
    //                 `STATUS_CUCI` LIKE '%$keyword%' OR
    //                 `HARGA` LIKE '%$keyword%' OR
    //                 `BAYAR` LIKE '%$keyword%' OR
    //                 `KEMBALI` LIKE '%$keyword%'
    //                 ORDER BY `id` DESC
    //     ";
    //     return $this->db->query($query)->row_array();
    // }

	public function getTransaksiById($id){
		$query = "SELECT `transaksi`.*, `kendaraan`.`JENIS_KENDARAAN`,`paket_cucian`.`JENIS_PAKET`,`user`.`NAME`, `user_role`.`ROLE`
		FROM `transaksi` 
		JOIN `kendaraan` ON `transaksi`.`ID_KENDARAAN` = `kendaraan`.`ID_KENDARAAN`
		JOIN `paket_cucian` ON `transaksi`.`ID_PAKET` = `paket_cucian`.`ID_PAKET`
        JOIN `user` ON `transaksi`.`ID_USER` = `user`.`ID_USER`
        JOIN `user_role` ON `user`.`ROLE_ID` = `user_role`.`ROLE_ID`
		WHERE `NO_TRANSAKSI` = $id
		";

		return $this->db->query($query)->row_array();
	}

	public function getTransaksi(){
		$query = "SELECT `transaksi`.*, `kendaraan`.`JENIS_KENDARAAN`,`paket_cucian`.`JENIS_PAKET`,`user`.`NAME`, `user_role`.`ROLE`
		FROM `transaksi` 
		JOIN `kendaraan` ON `transaksi`.`ID_KENDARAAN` = `kendaraan`.`ID_KENDARAAN`
		JOIN `paket_cucian` ON `transaksi`.`ID_PAKET` = `paket_cucian`.`ID_PAKET`
        JOIN `user` ON `transaksi`.`ID_USER` = `user`.`ID_USER`
        JOIN `user_role` ON `user`.`ROLE_ID` = `user_role`.`ROLE_ID`
		ORDER BY `NO_TRANSAKSI` DESC
		";

		return $this->db->query($query)->result_array();
	}

	public function getPengeluaran(){
		$query = "SELECT `pengeluaran`.*
		FROM `pengeluaran` 
		ORDER BY `NO_KELUARAN` ASC
		";

		return $this->db->query($query)->result_array();
	}
}
