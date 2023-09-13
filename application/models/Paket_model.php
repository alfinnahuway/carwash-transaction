<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket_model extends CI_Model
{

	
	public function getPaket(){
		$this->db->select('paket_cucian.*, kendaraan.JENIS_KENDARAAN');
		$this->db->from('paket_cucian');
		$this->db->join('kendaraan', 'paket_cucian.ID_KENDARAAN = kendaraan.ID_KENDARAAN');
		$this->db->order_by('paket_cucian.id_paket', 'desc');
		return $this->db->get()->result();
	} 

	public function getPaketById($id){
		$this->db->select('paket_cucian.*, kendaraan.JENIS_KENDARAAN');
		$this->db->from('paket_cucian');
		$this->db->join('kendaraan', 'paket_cucian.ID_KENDARAAN = kendaraan.ID_KENDARAAN');
		$this->db->where('paket_cucian.id_paket', $id);
		return $this->db->get()->row();
	}
}
