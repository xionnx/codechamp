<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		if ($this->session->userdata('role') != 1) {
			redirect(base_url('home'));
		}
	}

	public function index()
	{
		$data['user'] = $this->db->query('SELECT * FROM user')->result();
		$this->load->view('admin/v_user', $data);
	}

	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Kolom nama tidak boleh kosong.']);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]', ['required' => 'Kolom email tidak boleh kosong.']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Kolom password tidak boleh kosong.']);

		$nama 		= htmlspecialchars($this->input->post('nama', TRUE));
		$email	= htmlspecialchars($this->input->post('email', TRUE));
		$password	= htmlspecialchars($this->input->post('password', TRUE));

		if ($this->form_validation->run() != false) {
			$data = array(
				'nama_user' => $nama,
				'email' => $email,
				'password' => $password,
			);

			$this->m_data->insert_data($data, 'user');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat ! <br></b> Anda telah berhasil menambahkan data user</div>');
			redirect(base_url('user'));
		} else {
			$data['user'] = $this->m_data->get_data('user')->result();
			$this->load->view('admin/v_user_tambah', $data);
		}
	}

	public function edit($id)
	{
		$data['user'] = $this->m_data->get_joinuser($id)->result();
		// $data['kelas'] = $this->m_data->get_data('kelas')->result();
		$this->load->view('admin/v_user_edit', $data);
	}

	public function update()
	{
		$id 		= $this->input->post('id');
		$nama 		= $this->input->post('nama');
		$email	= $this->input->post('email');
		$password	= $this->input->post('password');

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
		redirect(base_url('user'));
	}

	public function hapus($id)
	{
		$where = array(
			'id_user' => $id
		);
		$this->m_data->delete_data($where, 'user');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><i class="icon fa fa-check"></i><b>Selamat ! <br></b> Anda telah berhasil menghapus data user</div>');
		redirect(base_url('user'));
	}

	public function user_aksi()
	{
		$nama_user	= $this->input->post('nama_user');
		$email	= $this->input->post('email');
		$password	= $this->input->post('password');

		$data = array(
			'nama_user' => $nama_user,
			'email' => $email,
			'password' => $password,
		);

		$this->m_data->insert_data($data, 'user');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat ! <br></b> Anda telah berhasil menambahkan data tutor</div>');
		redirect(base_url('user'));
	}
}
