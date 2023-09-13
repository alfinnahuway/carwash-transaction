<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
       
    }

    public function index()
    {
        if($this->session->userdata('email')) {
            redirect('dashboard');
        }

        $data['title'] = 'Queen Steam | Login Page';
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email harus diisi.',
            'valid_email' => 'Email tidak benar! Contoh : example@gmail.com'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password harus diisi.'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('signin/index', $data);
        } else {
            //validasinya success
            $this->_login();
        }
    }



    private function _login()
    {
        $data['title'] = 'Queen Steam | Signin';
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['EMAIL' => $email])->row_array();
        if ($user) {
            // usernya ada
            if ($user['IS_ACTIVE'] == 1) {
                //cek passwordnya
                if (password_verify($password, $user['PASSWORD'])) {
                    $data = [
                        'email' => $user['EMAIL'],
                        'role_id' => $user['ROLE_ID']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['ROLE_ID'] == 1) {
                        redirect('dashboard');
                    } else{
						redirect('dashboard');
					}
                } else {
                    $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[user.PASSWORD]', [
                        'matches' => 'Password salah.',
                    ]);

                    if ($this->form_validation->run() == false) {
                        $this->load->view('signin/index', $data);
                    }
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email ini tidak aktif!
                </div>');
                redirect('signin');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email tidak terdaftar!
            </div>');
            redirect('signin');
        }
    }




    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            You have been logged out!
            </div>');
        redirect('signin');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
