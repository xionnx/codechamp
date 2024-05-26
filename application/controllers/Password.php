<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Password extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('role') != 1) {
			if ($this->session->userdata('role') != 2) {
				if ($this->session->userdata('role') != 3) {
					redirect(base_url('auth/login?alert=akses_ditolak'));
				}
			}
		}
	}

	public function index()
	{
		$this->form_validation->set_rules('password1', 'Password Baru', 'required|trim|min_length[6]|matches[password2]', [
			'required' 		=> 'Silahkan Masukan Password Baru Anda !',
			'matches' 		=> 'Password tidak sama !',
			'min_length' 	=> 'Password Harus Lebih dari 6 Karakter'
		]);
		$this->form_validation->set_rules('password2', 'Password Ulang', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			if ($this->session->userdata('role') == 1) {
				$this->load->view('admin/v_password');
			} else if ($this->session->userdata('role') == 2) {
				$this->load->view('admin/v_password_tutor');
			} else if ($this->session->userdata('role') == 3) {
				$this->load->view('user/v_password');
			} else 

			if ($this->session->userdata('role') == 1) {
				$id = $this->session->userdata('id');
				$where 	= array('id' => $id);
				$data 	= array('password' => password_hash($baru, PASSWORD_BCRYPT));;

				$this->m_data->update_data($where, $data, 'admin');
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Sukses !<br></b> Password anda berhasil diganti</div>');
				redirect(base_url('password'));
			} else if ($this->session->userdata('role') == 2) {
				$id = $this->session->userdata('id');
				$where 	= array('id_tutor' => $id);
				$data 	= array('password' => password_hash($baru, PASSWORD_BCRYPT));

				$this->m_data->update_data($where, $data, 'tutor');
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Sukses !<br></b> Password anda berhasil diganti</div>');
				redirect(base_url('password'));
			
			} else {
				$id = $this->session->userdata('id');
				$where 	= array('id_user' => $id);
				$data 	= array('password' => password_hash($baru, PASSWORD_BCRYPT));

				$this->m_data->update_data($where, $data, 'user');
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Sukses !<br></b> Password anda berhasil diganti</div>');
				redirect(base_url('password'));
			}
		}
	}
}
