<?php
defined('BASEPATH') or exit('No direct script access allowed');

class artikel extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('role') != 1) {
		// 	if ($this->session->userdata('role') != 2){
		// 		redirect('home?peringatan=akses_ditolak');
		// 	}
		// }
		$this->load->model('m_soal');
	}

	public function index()
	{

		$data['artikel'] = $this->m_data->get_join_artikels()->result();

		$this->load->view('templates_beranda/navartikel');
		$this->load->view('admin/v_artikels', $data);
		// $this->load->view('templates_beranda/footer');

	}

	public function info()
	{

		$data['artikel'] = $this->m_data->get_join_artikels()->result();

		$this->load->view('templates_beranda/navartikel');
		$this->load->view('admin/v_artikel_info', $data);
		$this->load->view('templates_beranda/footer');
	}

	public function kelola()
	{
		if ($this->session->userdata('role') != 1) {
			if ($this->session->userdata('role') != 2) {
				redirect('home?peringatan=akses_ditolak');
			} else {
				if (isset($_GET['id'])) {
					$id = $this->input->get('id');
					$data['artikel'] = $this->db->query('SELECT * from artikel join materi, user where artikel.id_materi=materi.id_materi and artikel.id_user=user.id_user and materi.id_materi="' . $id . '" order by id_artikel desc')->result();
					$data['materi'] = $this->m_data->get_data('materi')->result();
				} else {
					$data['artikel'] = $this->db->query('SELECT * FROM artikel join materi ON artikel.id_materi=materi.id_materi join user ON artikel.id_user=user.id_user order by id_artikel;')->result();
					$data['materi'] = $this->m_data->get_data('materi')->result();
				}
				$this->load->view('admin/v_artikel', $data);
			}
		}
	}

	public function v_tambah_artikel()
	{
		$data['artikel'] = $this->m_data->get_data('artikel')->result();
		$data['materi'] = $this->m_data->get_data('materi')->result();
		$this->load->view('admin/v_artikel_tambah', $data);
	}

	public function tambah_artikel()
	{

		$this->form_validation->set_rules('judul_artikel', 'Judul Artikel', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->v_tambah_artikel();
		} else {
			$nama_materi 		= $this->input->post('nama_materi');
			$judul_artikel		= $this->input->post('judul_artikel');
			$isi_artikel 		= $this->input->post('isi_artikel');
			$tanggal_unggah		= $this->input->post('tanggal_unggah');
			$gambar_artikel 	= $_FILES['gambar_artikel']['name'];

			if ($gambar_artikel = '') {
			} else {
				$config['upload_path'] = './assets/dist/img/img_artikel';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['file_name'] = 'artikel_' . time();

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar_artikel')) {
					echo "Gambar artikel gagal di upload!";
				} else {
					$gambar_artikel = $this->upload->data('file_name');
				}
			}

			$data = array(
				'id_materi' => $nama_materi,
				'id_user' => $this->session->userdata('id'),
				'judul_artikel' => $judul_artikel,
				'isi_artikel' => $isi_artikel,
				'tanggal_unggah' => $tanggal_unggah,
				'gambar_artikel' => $gambar_artikel
			);

			// if ($nama_materi == '' || $judul_artikel == '' || $isi_artikel == '') {
			// 	$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Input Artikel Gagal!</h4></div>');
			// 	redirect(base_url('artikel/kelola'));
			// } else {
			// 	$this->m_data->insert_data($data, 'artikel');
			// 	$this->session->set_flashdata('message', '<div class="alert alert-success alert-message alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Berhasil membuat artikel.</h4></div>');
			// 	redirect(base_url('artikel/kelola'));
			// }
			$this->m_data->insert_data($data, 'artikel');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-message alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Berhasil membuat artikel.</h4></div>');
			redirect(base_url('artikel/kelola'));
		}
	}

	public function edit($id)
	{
		$data['artikel'] = $this->m_data->get_join_artikel($id)->result();
		$data['materi'] = $this->m_data->get_data('materi')->result();
		$this->load->view('admin/v_artikel_edit', $data);
	}

	public function update_artikel()
	{
		$id 				= $this->input->post('id');
		$nama_materi 		= $this->input->post('nama_materi');
		$judul_artikel		= $this->input->post('judul_artikel');
		$isi_artikel 		= $this->input->post('isi_artikel');
		$tanggal_unggah		= $this->input->post('tanggal_unggah');
		$gambar_artikel 	= $_FILES['gambar_artikel']['name'];

		$where = array('id_artikel' => $id);
		$data = array(
			'id_materi' => $nama_materi,
			'judul_artikel' => $judul_artikel,
			'isi_artikel' => $isi_artikel,
			'tanggal_unggah' => $tanggal_unggah
		);

		if ($gambar_artikel) {
			$config['upload_path'] = './assets/dist/img/img_artikel';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['file_name'] = 'artikel_' . time();

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('gambar_artikel')) {
				$gambar_sebelumnya = $data['artikel']['gambar_artikel'];

				if (file_exists(FCPATH . 'assets/dist/img/img_artikel/' . $gambar_sebelumnya)) {
					unlink(FCPATH . 'assets/dist/img/img_artikel/' . $gambar_sebelumnya);
				}
				$data['gambar_artikel'] = $this->upload->data('file_name');
			}
		}


		$this->m_data->update_data($where, $data, 'artikel');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Data Artikel telah berhasil diupdate!</h4></div>');
		redirect(base_url('artikel/kelola'));
	}

	public function hapus($id)
	{
		$where = array(
			'id_artikel' => $id
		);
		$this->m_data->delete_data($where, 'artikel');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Artikel berhasil dihapus!</h4></div>');
		redirect(base_url('artikel/kelola'));
	}
}
