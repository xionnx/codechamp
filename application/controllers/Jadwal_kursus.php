<?php
defined('BASEPATH') or exit('No direct script access allowed');

class jadwal_kursus extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role') != 3) {
			redirect(base_url() . 'home?alert=akses_ditolak');
		}
	}

	public function index()
	{
		$data['peserta'] = $this->db->query('SELECT peserta.id_peserta, materi.kode_materi, materi.nama_materi, materi.id_materi, user.nama_user, status_kursus FROM peserta, materi, user WHERE peserta.id_materi=materi.id_materi and peserta.id_user=user.id_user and user.nama_user="' . $this->session->userdata('nama') . '" ')->result();
		$this->load->view('user/v_jadwal_kursus', $data);
	}
}
