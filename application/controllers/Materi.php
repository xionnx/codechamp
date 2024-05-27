<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class materi extends CI_Controller {


	public function __construct() {
		parent::__construct();

		if ($this->session->userdata('role') == 3) {
			redirect(base_url('home?alert=akses_ditolak'));
		}
		
	}

	public function index()
	{
		$data['materi'] = $this->m_data->get_data('materi')->result();
		$this->load->view('admin/v_materi', $data);
	}

	public function materi_aksi()
	{
		$kode 		= $this->input->post('kode');
		$nama		= $this->input->post('nama');

		$data = array(
			'kode_materi'=>$kode,
			'nama_materi'=>$nama
		);
		$this->m_data->insert_data($data, 'materi');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat !<br></b> Anda telah berhasil menambahkan data Materi</div>');
		redirect(base_url('materi'));
	}

	public function hapus($id) 
	{
		$where = array(
					'id_materi'=>$id
				);
		$this->m_data->delete_data($where,'materi');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><i class="icon fa fa-check"></i><b>Selamat !<br></b> Anda telah berhasil menghapus data Materi</div>');
		redirect(base_url('materi'));
	}

	public function edit($id) 
	{
		$where	= array('id_materi'=>$id);
		$data['materi']=$this->m_data->edit_data($where,'materi')->result();
		$this->load->view('admin/v_materi_edit',$data);
	}

	public function update()
	{
		$id 		= $this->input->post('id');
		$kode 		= $this->input->post('kode');
		$nama		= $this->input->post('nama');

		$where = array('id_materi'=>$id);
		$data = array(
					'kode_materi'=>$kode,
					'nama_materi'=>$nama
					);
		$this->m_data->update_data($where,$data,'materi');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat !<br></b> Anda telah berhasil mengupdate data Materi</div>');
		redirect(base_url('materi'));
	}
}