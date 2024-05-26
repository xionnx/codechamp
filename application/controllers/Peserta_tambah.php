<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peserta_tambah extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		if ($this->session->userdata('status') !='admin_login') {
			redirect(base_url().'auth?alert=belum_login');
		}
	}

	public function index()
	{
		$data['user'] = $this->db->query('SELECT * from user')->result();
		$data['materi'] = $this->db->query('SELECT * from materi')->result();

		$this->load->view('admin/v_peserta_tambah',$data);
	}

	public function insert_()
	{
		$materi 			= $this->input->post('materi');
		$tanggal		= $this->input->post('tanggal');

		
		if ($materi == '' || $tanggal == '') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Input Data Peserta Gagal !</h4> Cek kembali data yang diinputkan.</div>');
			redirect(base_url('peserta_tambah'));
		} else {
			$result = $this->m_data->insert_multiple();
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Peserta Kursus berhasil dibuat !</h4></div>');
			redirect(base_url('peserta_tambah'));
		}
	}	
}