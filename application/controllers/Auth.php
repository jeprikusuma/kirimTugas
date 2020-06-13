<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Auth_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
	}
	public function index() {

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Login';
			$this->load->view('templates/auth-header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth-footer');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$getUser = $this->db->get_where('users', ['username' => $username])->row_array();


			if ($username == 'admin' && $password == 'admin'){
				$this->session->set_userdata('tombol', 'oke');
				redirect('Admin');
			} else{

			if ($getUser) {
					if ($password == $getUser['password']) {

						$key= [
							'username' => $getUser['username'],
						];
						$this->session->set_userdata($key);
						$this->session->set_userdata('tombol', 'oke');
						redirect('User');
					} else {

						$this->session->set_flashdata('password', '<br><small class="text-danger pl-3">Password Salah!</small>');
						$this->session->set_flashdata('hidden', 1);
						redirect('auth');
					}

				} else {

					$this->session->set_flashdata('username', '<br><small class="text-danger pl-3">Username tidak Terdaftar!</small>');
					$this->session->set_flashdata('hidden', 1);
					redirect('auth');
				}
			}

		}
	}
	public function logout() {
		$this->session->unset_userdata($key);
		$this->session->unset_userdata('tombol');
		$this->session->set_flashdata('register', '<div class="alert alert-success position-absolute w-100" role="alert" >You have been logged out!</div>');
		redirect('auth');
	}

}
