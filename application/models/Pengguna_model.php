<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_model extends CI_Model
{
	public function getUser()
	{
		$this->db->select('*,user.ID_USER as pid, user_role.ROLE');
		$this->db->from('user');
		$this->db->join('user_role', 'user.ROLE_ID = user_role.ROLE_ID');
		$this->db->order_by('user.ID_USER', 'desc');
		return $this->db->get()->result();
	} 
}

	