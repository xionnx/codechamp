<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class soal_materi extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		if ($this->session->userdata('role') != 1) {
			if ($this->session->userdata('role') != 2){
				redirect('home?peringatan=akses_ditolak');
			}
		}
		$this->load->model('m_soal');
	}

	public function index()
	{	
		if (isset($_GET['id'])) {
			$id = $this->input->get('id');
			$data['soal_materi'] = $this->db->query('SELECT * from soal_materi join materi where soal_materi.id_materi=materi.id_materi and materi.id_materi="'.$id.'" order by id_soal_materi desc')->result();
			$data['kelas']=$this->m_data->get_data('materi')->result();
		} else {
			$data['soal_materi'] = $this->db->query('SELECT * FROM soal_materi join materi ON soal_materi.id_materi=materi.id_materi order by id_soal_materi desc')->result();
			$data['kelas']=$this->m_data->get_data('materi')->result();
		}					
		$this->load->view('admin/v_soal_materi', $data);
	}

	public function edit($id)
	{
		$data['soal']=$this->m_soal->get_joinsoal($id)->result();
		$data['kelas']=$this->m_data->get_data('materi')->result();		
		$this->load->view('admin/v_soal_materi_edit', $data);		
	}

	public function update()
	{
		$id 				= $this->input->post('id');
		$nama_materi 	= $this->input->post('nama_materi');
		$soal				= $this->input->post('soal');
		$a 					= $this->input->post('a');
		$b					= $this->input->post('b');
		$c					= $this->input->post('c');
		$d					= $this->input->post('d');
		$e					= $this->input->post('e');
		$kunci				= $this->input->post('kunci');

		$where = array('id_soal_materi'=>$id);
		$data = array(
			'id_materi'=>$nama_materi,
			'pertanyaan'=>$soal,
			'a'=>$a,
			'b'=>$b,
			'c'=>$c,
			'd'=>$d,
			'e'=>$e,
			'kunci_jawaban'=>$kunci
		);
		$this->m_data->update_data($where, $data, 'soal_materi');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Selamat, Soal telah berhasil diupdate!</h4></div>');
		redirect(base_url('soal_materi'));
	}	

	public function hapus($id) 
	{
		$where = array(
					'id_soal_materi'=>$id
				);
		$this->m_data->delete_data($where,'soal_materi');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Perhatian, Data telah berhasil dihapus!</h4></div>');
		redirect(base_url('soal_materi'));
	}
}