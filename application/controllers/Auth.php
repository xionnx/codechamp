<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'Kolom Username tidak boleh kosong!']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Kolom Password tidak boleh kosong!']);

		$username = htmlspecialchars($this->input->post('username', TRUE));
		$password = htmlspecialchars($this->input->post('password', TRUE));

		if ($this->form_validation->run() != false) {

			$where 		= array('username' => $username);
			$admin 		= $this->db->get_where('admin', ['username' => $username])->row_array();
			$tutor 		= $this->db->get_where('tutor', ['username' => $username])->row_array();
			$user 		= $this->db->get_where('user', ['username' => $username])->row_array();

			if ($password == $admin['password']) {
				$data = $this->m_data->edit_data($where, 'admin')->row();
				$data_session = array(
					'id'		=> $data->id,
					'nama'		=> $data->nama_user,
					'username'	=> $data->username,
					'status'	=> 'admin_login'
				);
				$this->session->set_userdata($data_session);
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-message text-center"><b>Login Berhasil !,<br></b> Halaman ini akan dialihkan ke Halaman Home</div>');
				redirect(base_url('home'));
			} else if ($password == $tutor['password']) {
				$data = $this->m_data->edit_data($where, 'tutor')->row();
				$data_session = array(
					'id'		=> $data->id,
					'nama'		=> $data->nama_tutor,
					'username'	=> $data->username,
					'status'	=> 'tutor_login'
				);
				$this->session->set_userdata($data_session);
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-message text-center"><b>Login Berhasil !,<br></b> Halaman ini akan dialihkan ke Halaman Home</div>');
				redirect(base_url('home'));
			} else if ($password == $user['password']) {
				$data = $this->m_data->edit_data($where, 'user')->row();

				$data_session = array(
					'id'		=> $data->id_user,
					'nama'		=> $data->nama_user,
					'username'	=> $data->username,
					'status'	=> 'user_login'
				);
				$this->session->set_userdata($data_session);
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-message text-center"><b>Berhasil Masuk !<br></b> Anda akan dialihkan ke halaman dashboard</div>');
				redirect(base_url('home_user'));
			
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message text-center"><b>Gagal Masuk !<br></b> Pengguna tidak ditemukan</div>');
				redirect(base_url('auth'));
			}
		} else {
			$this->load->view('v_login');
		}
	}
}
