<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role') != 1) {
			if ($this->session->userdata('role') != 2) {
				redirect('home?peringatan=akses_ditolak');
			}
		}
	}

	public function index()
	{
		$data['soal'] = $this->m_data->get_data('materi')->result();
		$this->load->view('admin/v_soal', $data);
	}

	public function insert()
	{
		$nama_materi 		= $this->input->post('nama_materi');
		$soal				= $this->input->post('soal');
		$a 					= $this->input->post('jwb_a');
		$b					= $this->input->post('jwb_b');
		$c					= $this->input->post('jwb_c');
		$d					= $this->input->post('jwb_d');
		$kunci				= $this->input->post('kunci');
		$data = array(
			'id_materi' => $nama_materi,
			'pertanyaan' => $soal,
			'jwb_a' => $a,
			'jwb_b' => $b,
			'jwb_c' => $c,
			'jwb_d' => $d,
			'kunci_jawaban' => $kunci
		);
		if ($nama_materi == '' || $soal == '') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Maaf, Input Soal Gagal!</h4> Mata Kuliah dan Pertanyaan Soal tidak boleh dikosongkan.</div>');
			redirect(base_url('soal'));
		} else {
			$this->m_data->insert_data($data, 'soal_materi');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-message alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Selamat, Soal berhasil dibuat!</h4>untuk melihat soal tersebut bisa anda lihat di menu <b>Daftar Soal Materi</b>.</div>');
			redirect(base_url('soal'));
		}
	}
}
