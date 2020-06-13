<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url', 'directory'));
		$this->load->library('session');
		$this->load->library('zip');
		$this->load->database();
	}

	public function index() {

		if ($this->session->userdata('tombol') != 'oke') {
			redirect('auth');
			die();
		}
		$data = [
			'modelData' => 'Apakah anda ingin keluar sebagai Admin?',
			'judulModel'=> 'Keluar',
			'folder'	=> directory_map('asset/file/', 1),
			'title'		=> 'Admin'
		];

		$this->load->view('templates/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function pilihFolder($fl) {

		$file	= directory_map('asset/file/'.$fl);
		$query	= $this->db->query('SELECT * FROM users');

		$fll = explode('_', $fl);
		$nf  = $fll[0];
		$fll = '-'.$fll[1].'_'.$fll[2];

		if ( $nf === 'individu'){
			foreach ($query->result() as $row) {
				$nm = $row->nama;
				$pw = $row->password;
				$nb = str_replace(" ", "_", $nm).'-'.$pw;
				$nb = $nb.$fll;

				if (file_exists('asset/file/'.$fl.'/'.$nb.'.pdf')) {
					$fileData[] = '<li class="list-group-item list-group-item-success">'.$nm.'</li>';
				}else if (file_exists('asset/file/'.$fl.'/'.$nb.'.doc')) {
					$fileData[] = '<li class="list-group-item list-group-item-success">'.$nm.'</li>';
				}else if (file_exists('asset/file/'.$fl.'/'.$nb.'.docx')) {
					$fileData[] = '<li class="list-group-item list-group-item-success">'.$nm.'</li>';
				}else if (file_exists('asset/file/'.$fl.'/'.$nb.'.ppt')) {
					$fileData[] = '<li class="list-group-item list-group-item-success">'.$nm.'</li>';
				}else{
					$fileData[] = '<li class="list-group-item list-group-item-danger">'.$nm.'</li>';
				}
			}
		}else{
			foreach ($file as $fle) {
				$fle = explode('.', $fle);
				$fle = explode('-', $fle[0]);
				$fle = $fle[0].' '.$fle[1];
				$fileData[] = '<li class="list-group-item list-group-item">'.$fle.'</li>';
			}
		}

		$data = [
			'file'		=> $fl,
			'title'		=> 'Pilih File',
			'fileData'  => $fileData
		];

		$this->load->view('templates/header', $data);
		$this->load->view('admin/pilihFile', $data);
		$this->load->view('templates/footer');

	}
	public function download($dir){
		// $pth = 'asset/file/'.$dir.'/';
		// $this->zip->read_dir($pth, TRUE);
		// $this->zip->download('test.zip');

		$file	= directory_map('asset/file/'.$dir);
		$nmfl 	= $dir.'.zip';

		foreach ($file as $fls) {
			$pth = 'asset/file/'.$dir.'/'.$fls;
			$this->zip->read_file($pth);
		}
		$this->zip->download($nmfl);
	}
	public function hapus($dir){
		$data = [
			'file'		=> $dir,
			'title'		=> 'Hapus Folder',
		];

		$this->load->view('templates/header', $data);
		$this->load->view('admin/hapusFolder', $data);
		$this->load->view('templates/footer');
	}
	public function hapusFolder($dir){	
		$pth = 'asset/file/'.$dir.'/';

		function delete_directory($dirname) {
	         if (is_dir($dirname))
	           $dir_handle = opendir($dirname);
	     if (!$dir_handle)
	          return false;
	     while($file = readdir($dir_handle)) {
	           if ($file != "." && $file != "..") {
	                if (!is_dir($dirname."/".$file))
	                     unlink($dirname."/".$file);
	                else
	                     delete_directory($dirname.'/'.$file);
	           }
	     }
	     closedir($dir_handle);
	     rmdir($dirname);
	     return true;
		}

		delete_directory($pth);
		redirect('admin');
		 
	}





}