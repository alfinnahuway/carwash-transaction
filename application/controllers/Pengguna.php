<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pengguna extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Pengguna_model', 'Usr');
	}

	public function index()
	{
		$data['title'] = 'Master Data | Pengguna';
		$data['page'] = 'Pengguna';
		$data['user'] = $this->db->get_where('user', ['EMAIL' =>
		$this->session->userdata('email')])->row_array();
		$data['pengguna'] = $this->Usr->getUser();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pengguna/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('name', 'Nama', 'required', ['required' => 'Nama tidak boleh kosong.',
		]);
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', ['required' => 'Email tidak boleh kosong.',
		'valid_email' => 'Format email tidak benar! Contoh : example@gmail.com']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password tidak boleh kosong.']);
		$this->form_validation->set_rules('role_id', 'Role', 'required', ['required' => 'Pilih role terlebih dahulu.']);

		if ($this->form_validation->run() == false){
		$data['title'] = 'Pengguna | Pengguna Tambah';
		$data['page'] = 'Tambah Pengguna';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pengguna/tambah', $data);
		$this->load->view('templates/footer', $data);
		} else {
		$data = [
			'NAME' => htmlspecialchars($this->input->post('name', true)),
			'EMAIL' => htmlspecialchars($this->input->post('email', true)),
			'IMAGE' => '',
			'PASSWORD' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'ROLE_ID' => htmlspecialchars($this->input->post('role_id', true)),
			'IS_ACTIVE' => htmlspecialchars($this->input->post('is_active', true)),
			'DATE_CREATED' => time()
		];
		$upload_image = $_FILES['image']['name'];	
		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']     = '2048';
			$config['upload_path'] = './assets/img/profile/';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('image')) {
				$new_image = $this->upload->data('file_name');
				$data['IMAGE'] = $new_image;
			} else {
				echo $this->upload->display_errors();
				die();
			}
		}
	
		$this->db->insert('user', $data);
		$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
		redirect('pengguna');
	}
		
	}

	

	public function edit($id){

		$this->form_validation->set_rules('name', 'Nama', 'required', ['required' => 'Nama tidak boleh kosong.',
		]);
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', ['required' => 'Email tidak boleh kosong.',
		'valid_email' => 'Format email tidak benar! Contoh : example@gmail.com']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password tidak boleh kosong.']);
		$this->form_validation->set_rules('role_id', 'Role', 'required', ['required' => 'Pilih role terlebih dahulu.']);

		if ($this->form_validation->run() == false){
		$data['title'] = 'Pengguna | Edit Pengguna';
		$data['page'] = 'Edit Pengguna';
		$data['user'] = $this->db->get_where('user', ['EMAIL' =>
		$this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result();
		$data['pengguna'] = $this->db->get_where('user', ['ID_USER' => $id])->row();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pengguna/edit', $data);
		$this->load->view('templates/footer', $data);
	} else {
		$data = [
			'NAME' => htmlspecialchars($this->input->post('name', true)),
			'EMAIL' => htmlspecialchars($this->input->post('email', true)),
			'ROLE_ID' => htmlspecialchars($this->input->post('role_id', true)),
			'IS_ACTIVE' => htmlspecialchars($this->input->post('is_active', true)),
			'DATE_CREATED' => time()
		];

		if($this->input->post('password')){
			$data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		}

		$upload_image = $_FILES['image']['name'];	
		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']     = '2048';
			$config['upload_path'] = './assets/img/profile/';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('image')) {
				$new_image = $this->upload->data('file_name');
				$data['image'] = $new_image;
			} else {
				echo $this->upload->display_errors();
				die();
			}
		}	
			$this->db->where('ID_USER', $id);
			$this->db->update('user', $data);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			redirect('pengguna');
		}

	}

	

	public function hapus($id){
		$this->db->where('ID_USER', $id);
		$this->db->delete('user');
		$this->session->set_flashdata('flash', 'Berhasil dihapus');
		redirect('pengguna');
	}

	public function editProfile($id){

		$this->form_validation->set_rules('name', 'Nama', 'required', ['required' => 'Nama tidak boleh kosong.',
		]);
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', ['required' => 'Email tidak boleh kosong.',
		'valid_email' => 'Format email tidak benar! Contoh : example@gmail.com']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password tidak boleh kosong.']);

		if ($this->form_validation->run() == false){
		$data['title'] = 'Edit Profile';
		$data['page'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('user', ['EMAIL' =>
		$this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result();
		$data['pengguna'] = $this->db->get_where('user', ['ID_USER' => $id])->row();
		// print_r($data['pengguna']);
		// die();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pengguna/editProfile', $data);
		$this->load->view('templates/footer', $data);
		} else {
			$data = [
				'NAME' => htmlspecialchars($this->input->post('name', true)),
				'EMAIL' => htmlspecialchars($this->input->post('email', true)),
				'IS_ACTIVE' => htmlspecialchars($this->input->post('is_active', true)),
				'DATE_CREATED' => time()
			];
	
			if ($this->input->post('password')) {
				$data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			}
	
			$upload_image = $_FILES['image']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/profile/';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$new_image = $this->upload->data('file_name');
					$data['image'] = $new_image;
				} else {
					echo $this->upload->display_errors();
					die();
				}
			}
			$this->db->where('ID_USER', $id);
			$this->db->update('user', $data);
			$this->session->set_flashdata('flash', 'Berhasil diubah');
			redirect('pengguna/editProfile/' . $id);
		}
	}
}
