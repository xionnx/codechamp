<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang_kursus extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role') != 3) {
			redirect(base_url() . 'home?peringatan=akses_ditolak');
		}
	}

	public function soal()
	{
		$id_peserta = $this->uri->segment(3);		
		$id = $this->db->query('SELECT * FROM peserta WHERE id_peserta="' . $id_peserta . '"  ')->row_array();
		$soal_materi = $this->db->query('SELECT * FROM soal_materi WHERE id_materi="'.$id['id_materi'].'" ORDER BY RAND()');
		$where = array('id_peserta' => $id_peserta);
		$data2 = array('status_kursus_selesai' => 1);
		$this->m_data->update_data($where,$data2,'peserta');
		$data = array(
			"soal" => $soal_materi->result(),
			"total_soal" => $soal_materi->num_rows(),
			"id" => $id
		);
		$this->load->view('kursus/v_soalmateri', $data);
	}
	public function lihatkursusselesai()
	{
		$id_peserta = $this->uri->segment(3);		
		$id = $this->db->query('SELECT * FROM peserta WHERE id_peserta="' . $id_peserta . '"  ')->row_array();
		$soal_materi = $this->db->query('SELECT * FROM soal_materi WHERE id_materi="'.$id['id_materi'].'" ORDER BY RAND()');
		$where = array('id_peserta' => $id_peserta);
		$data2 = array('status_kursus_selesai' => 1);
		$this->m_data->update_data($where,$data2,'peserta');
		$data = array(
			"soal" => $soal_materi->result(),
			"total_soal" => $soal_materi->num_rows(),
			"id" => $id
		);
		$this->load->view('kursus/v_soalmateriselesai', $data);
	}

	public function jawab_aksi()
	{
		$id_peserta = $this->input->post('id_peserta');
		$jumlah 	= $_POST['jumlah_soal'];
		$id_soal 	= $_POST['soal'];
		$jawaban 	= $_POST['jawaban'];
		for ($i = 0; $i < $jumlah; $i++) {
			$nomor = $id_soal[$i];
			$jawaban[$nomor];
			$data[] = array(
				'id_peserta' => $id_peserta,
				'id_soal_materi' => $nomor,
				'jawaban' => $jawaban[$nomor]
			);
		}
		$this->session->set_userdata($data);
		$this->db->insert_batch('jawaban', $data);
		$cek = $this->db->query('SELECT id_jawaban, jawaban, soal_materi.kunci_jawaban FROM jawaban join soal_materi ON jawaban.id_soal_materi=soal_materi.id_soal_materi WHERE id_peserta="' . $id_peserta . '"');
		$jumlah = $cek->num_rows();
		foreach ($cek->result_array() as $d) {
			$where = $d['id_jawaban'];
			if ($d['jawaban'] == $d['kunci_jawaban']) {
				$data = array(
					'skor' => 1,
				);
				$this->m_data->UpdateSkor($where, $data, 'jawaban');
			} else {
				$data = array(
					'skor' => 0,
				);
				$this->m_data->UpdateSkor($where, $data, 'jawaban');
			}
		}

		$benar = 0;
		$salah = 0;
		$total_skor = 0;
		$cek2 = $this->db->query('SELECT id_jawaban, jawaban, skor, exp, soal_materi.kunci_jawaban FROM jawaban join soal_materi ON jawaban.id_soal_materi=soal_materi.id_soal_materi join user ON jawaban.id_user=user.id_user WHERE id_peserta="' . $id_peserta . '"');
		// $cek2 = $this->db->query('SELECT id_jawaban, jawaban, skor, soal_materi.kunci_jawaban FROM jawaban join soal_materi ON jawaban.id_soal_materi=soal_materi.id_soal_materi WHERE id_peserta="' . $id_peserta . '"');
		$jumlah = $cek2->num_rows();
		$where = $id_peserta;
		foreach ($cek2->result_array() as $c) {
			if ($c['jawaban'] == $c['kunci_jawaban']) {
				$benar++;
			} else {
				$salah++;
			}
			$total_skor += $c['skor'] / $jumlah * 100;
		}
		$data = array(
			'benar' => $benar,
			'salah' => $salah,
			'status_kursus_selesai' => 2,
			'exp' => $total_skor,
			'skor' => $total_skor
		);


		$this->m_data->UpdateSkor2($where, $data, 'peserta');
		$this->m_data->insert_exp($where, $data, 'user');
		redirect(base_url('jadwal_kursus'));
	}

	
}
