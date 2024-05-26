<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang_hasil extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		if ($this->session->userdata('role') != 3) {
			redirect(base_url('home?peringatan=akses_ditolak'));
		}
	}

	public function index() 
	{
		$id_user = $_SESSION['id'];
		$data['hasil'] = $this->m_data->get_peserta($id_user);
		$this->load->view('user/v_hasil', $data);
	}
}