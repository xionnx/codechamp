<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_kursus extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role') != 1) {
			redirect(base_url('home'));
		}
		$this->load->model('m_hasil');
		$this->load->library('mypdf');
	}

	public function index()
	{
		if (isset($_GET['id'])) {
			$id = $this->input->get('id');
			$data['hasil'] = $this->m_hasil->get_peserta2($id);
			$data['kelas']=$this->m_data->get_data('materi')->result();
		} else {
			$data['hasil'] = $this->m_hasil->get_peserta3();
			$data['kelas']=$this->m_data->get_data('materi')->result();
		}		
		$this->load->view('admin/v_hasil', $data);
	}

	public function print_all()
	{	
		if (isset($_GET['id'])) {
			$id = $this->input->get('id');
			$data['cetak'] = $this->m_hasil->get_peserta2($id);
		} else {
			$data['cetak'] = $this->m_hasil->get_peserta3();
		}
		$this->mypdf->generate('admin/v_cetak', $data, 'Cetak Hasil kursus', 'A4', 'Landscape');
	}

	public function cetak($id)
	{
		$where = array('id_peserta' => $id);
		$id = $where['id_peserta'];
		$data['cetak'] = $this->m_hasil->cetak($id);
		$this->mypdf->generate('admin/v_cetak', $data, 'Cetak Hasil kursus', 'A4', 'Landscape');
	}
}
