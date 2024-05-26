<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tutor extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if ($this->session->userdata('role') != 1) {
			redirect(base_url('home?peringatan=akses_ditolak'));
		}
	}

	public function index()
	{
		$data['tutor'] = $this->m_data->get_tutor()->result();
		$this->load->view('admin/v_tutor', $data);
	}

	public function tutor_aksi()
	{
		$id_user	= $this->input->post('id_user');
		$nama_user 		= $this->input->post('nama_user');		
		$email	= $this->input->post('email');
		$password	= md5($this->input->post('password'));

		$data = array(
			'id_user'=>$id_user,
			'nama_user'=>$nama_user,
			'email'=>$email,
			'password'=>$password,
		);

		$this->m_data->insert_data($data, 'user');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat ! <br></b> Anda telah berhasil menambahkan data tutor</div>');
		redirect(base_url('tutor'));
	}

	public function hapus($id)
	{
		$where = array(
			'id_user'=>$id
		);

		$this->m_data->delete_data($where, 'user');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><i class="icon fa fa-check"></i><b>Selamat ! <br></b> Anda telah berhasil menghapus data tutor</div>');
		redirect(base_url('tutor'));
	}

	public function edit($id)
	{
		// $where	= array('id_user'=>$id);
		// $data['tutor'] = $this->m_data->edit_data($where, 'user')->result();
		$data['tutor'] = $this->m_data->get_joinuser_tutor($id)->result();
		$this->load->view('admin/v_tutor_edit',$data);
	}
	
	public function update()
	{
		$id 		= $this->input->post('id');
		$nama 		= $this->input->post('nama');
		$email		= $this->input->post('email');
		$password	= md5($this->input->post('password'));

		$where = array('id_user' => $id);

		if ($password == "") {
			$data = array(
				'nama_user' => $nama,
				'email' => $email
			);
			$this->m_data->update_data($where, $data, 'user');
		} else {
			$data = array(
				'nama_user' => $nama,
				'email' 	 => $email,
				'password' 	 => $password,
			);
			$this->m_data->update_data($where, $data, 'user');
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat ! <br></b> Anda telah berhasil mengupdate data user</div>');
		redirect(base_url('tutor'));
	}
	
}
