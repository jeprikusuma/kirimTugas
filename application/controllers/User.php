<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index() {

		if ($this->session->userdata('tombol') != 'oke') {
			redirect('auth');
			die();
		}

		$user = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$user['title'] = 'Kirim';
		$user['modelData'] = 'Apakah anda ingin keluar sebagai '.$user['nama'];
		$user['judulModel'] = 'Keluar';
		$this->load->view('templates/header', $user);
		$this->load->view('user/index', $user);
		$this->load->view('templates/footer');

	}
	public function kirim(){
		$user = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		
		$jenisTugas = $this->input->post('jenisTugas');
		$matkul = $this->input->post('matkul');
		$tugasKe = $this->input->post('tugasKe');
		$file = $this->input->post('file');
		$kelompokKe = $this->input->post('kelompokKe');

		if ( $jenisTugas === "0") {
			$this->session->set_flashdata('jenisTugas', '<small class="text-danger pl-3">Masukan jenis tugas!</small>');
			redirect('User');
		}else if ($matkul === "0") {
			$this->session->set_flashdata('matkul', '<small class="text-danger pl-3">Masukan matakuliah tugas!</small>');
			redirect('User');	
		}else if ($tugasKe === "") {
			$this->session->set_flashdata('tugasKe', '<small class="text-danger pl-3">Masukan keterangan tugas!</small>');
			redirect('User');
		}else if ($file === "") {
			$this->session->set_flashdata('file', '<br><small class="text-danger pl-3">Masukan file  tugas!</small>');
			redirect('User');
		}else{

			$namaFolder= $jenisTugas.'_'.$matkul.'_'.$tugasKe;
			$tempatFolder = 'asset/file/'.$namaFolder; 

			if ($jenisTugas === "individu") {
				$namaFile = $user['nama'].'-'.$user['password'].'-'.$matkul.'_'.$tugasKe;
			}else{
				if($kelompokKe === "") {
					$this->session->set_flashdata('kelompokKe', '<small class="text-danger pl-3">Masukan kelompok tugas!</small>');
					redirect('User');	
				}else{
					$namaFile = $jenisTugas.'-'.$kelompokKe.'-'.$matkul.'-'.$tugasKe;
				}
			}

			if (is_dir($tempatFolder)) {

				$config['upload_path']	= $tempatFolder;
				$config['file_name']	= $namaFile;
				$config['allowed_types']= 'pdf|doc|docx|ppt';
				$config['max_size']		= '100000';
				$config['overwrite']	= true;

				$this->load->library('upload', $config);

				if ( $this->upload->do_upload('file')) {
					$this->session->set_flashdata('terkirim', '<div class="alert alert-success position-absolute w-100" role="alert" style ="z-index:3;" >Tugas terkirim! Terima kasih</div>');
					redirect('user');
				}else{
					$this->session->set_flashdata('terkirim', '<div class="alert alert-danger position-absolute w-100" role="alert" style ="z-index:3;" >Tugas gagal terkirim! pastikan cek kelengkapan data tugas</div>');
					redirect('user');
				}	
			}else{
				$old = umask(0);
				mkdir($tempatFolder, 0777, true);
				umask($old);

				$config['upload_path']	= $tempatFolder;
				$config['file_name']	= $namaFile;
				$config['allowed_types']= 'pdf|doc|docx|ppt';
				$config['max_size']		= '100000';
				$config['overwrite']	= true;

				$this->load->library('upload', $config);

				if ( $this->upload->do_upload('file')) {
					$this->session->set_flashdata('terkirim', '<div class="alert alert-success position-absolute w-100" role="alert" >Tugas terkirim! Terima kasih</div>');
					redirect('user');
				}else{
					$this->session->set_flashdata('terkirim', '<div class="alert alert-danger position-absolute w-100" role="alert" >Tugas gagal terkirim! pastikan cek kelengkapan data tugas</div>');
					redirect('user');
				}
			}


		}

	}
}