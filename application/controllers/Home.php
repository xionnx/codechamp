<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();

		//cek session yang login, jika session role tidak sama dengan session role yang ditentukan, maka halaman akan di alihkan kembali ke halaman login.
		// if ($this->session->userdata('role') != 1 || $this->session->userdata('role') != 2 || $this->session->userdata('role') != 3) {
		// 	redirect('auth/login');
		// }
	}

	public function index()
	{
		if ($this->session->userdata('role') == 1) {
			$this->load->view('admin/v_home');
		}  else if ($this->session->userdata('role') == 2) {
			$this->load->view('admin/v_home_tutor');
		} else {
			$this->load->view('user/v_home');
		}
	}
}
