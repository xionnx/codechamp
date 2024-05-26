<?php
defined('BASEPATH') or exit('No direct script access allowed');

class peserta extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role') != 1) {
			redirect(base_url('home?peringatan=akses_ditolak'));
		}
		$this->load->model('m_peserta');
		$this->load->model('m_data');
		
	}

	public function index()
	{
		// if (isset($_GET['iduser'])) {
		// 	$iduser = $this->input->get('iduser');
		// 	$data['peserta'] = $this->m_peserta->get_peserta($iduser)->result();
		// 	$data['user'] = $this->m_data->get_data('user')->result();
		// } else if (isset($_GET['iduser'])) {
		// 	$iduser = $this->input->get('iduser');
		// 	$data['peserta'] = $this->m_peserta->get_peserta2($iduser)->result();
		// 	$data['user'] = $this->m_data->get_data('user')->result();
		// } else {
		// 	$data['peserta'] = $this->m_peserta->get_peserta4()->result();
		// 	$data['user'] = $this->m_data->get_data('user')->result();
		// }
		if (isset($_GET['iduser'])) {
			$iduser = $this->input->get('iduser');
			$data['peserta'] = $this->m_peserta->get_peserta($iduser)->result();
			$data['user'] = $this->m_data->get_data('user')->result();
		} else if (isset($_GET['iduser'])) {
			$iduser = $this->input->get('iduser');
			$data['peserta'] = $this->m_peserta->get_peserta2($iduser)->result();
			$data['user'] = $this->m_data->get_data('user')->result();
		} else {
			$data['peserta'] = $this->m_peserta->get_peserta4()->result();
			$data['user'] = $this->m_data->get_data('user')->result();
		}
		$this->load->view('admin/v_peserta', $data);
	}

	public function hapus($id)
	{
		$where = array(
			'id_peserta' => $id
		);
		$this->m_data->delete_data($where, 'peserta');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Data Peserta berhasil di hapus !</h4></div>');
		redirect(base_url('peserta'));
	}


	public function edit($id)
	{
		$data['peserta'] = $this->m_peserta->get_joinpeserta($id);
		$data['materi'] = $this->m_data->get_data('materi')->result();
		$data['user'] = $this->m_data->get_data('user')->result();
		$this->load->view('admin/v_peserta_edit', $data);
	}

	public function update()
	{
		$id 				= $this->input->post('id');
		$peserta 			= $this->input->post('peserta');
		$materi 			= $this->input->post('materi');
		$where = array('id_peserta' => $id);

		if ($peserta == '' || $materi == '') {
			
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> semua field harus diisi semua !</h4></div>');
			redirect(base_url('peserta'));
		} else {
			$data = array(
				'id_user'	=> $peserta,
				'id_materi'		=> $materi,
				'status_kursus'	=> 1
				
			);

			$this->m_data->update_data($where, $data, 'peserta');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Data berhasil di Update.</h4></div>');
			redirect(base_url('peserta'));
		}
	}

	public function edit_materi_peserta()
	{
		$id 				= $this->input->post('id');
		// $id 				= $this->uri->segment(3);
		$materi 			= $this->input->post('materi');
		$where = array('id_peserta' => $id);

		if ($materi == '') {
			
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> semua field harus diisi semua !</h4></div>');
			redirect(base_url('peserta'));
		} else {
			$data = array(
				'id_materi'		=> $materi
			);

			$this->m_data->update_data($where, $data, 'peserta');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Data berhasil di Update.</h4></div>');
			redirect(base_url('peserta'));
		}
	}

	
	
}
