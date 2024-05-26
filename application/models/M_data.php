<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_data extends CI_Model
{


	//fungsi untuk mengambil data dari database
	public function get_data($table)
	{
		return $this->db->get($table);
	}

	public function get_join_artikels()
	{
		$query = 'SELECT * FROM artikel join materi ON artikel.id_materi=materi.id_materi join user ON artikel.id_user=user.id_user';
		return $this->db->query($query);
	}

	public function get_join_artikel($id)
	{
		$query = 'SELECT * FROM artikel join materi ON artikel.id_materi=materi.id_materi join user ON artikel.id_user=user.id_user WHERE artikel.id_artikel="'.$id.'"';
		return $this->db->query($query);
	}

	// fungsi login
	public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $post['email']);
        $this->db->where('password', md5($post['password']));
        $query = $this->db->get();
        return $query;
    }

	public function get_tutor()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role', 2);
        $query = $this->db->get();
        return $query;
    }

	//fungsi untuk insert data ke database
	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	//fungsi untuk mengambil data untuk di edit
	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	//fungsi untuk mengupdate data di database
	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	//fungsi untuk menghapus data
	public function delete_data($where, $table)
	{
		$this->db->delete($table, $where);
	}

	// Fungsi untuk melakukan proses upload file import
	public function insertimport($data)
	{
		$this->db->insert_batch('user', $data);
	}

	public function insertbatch($data)
	{
		$this->db->insert_batch($table, $data);
	}

	// Fungsi untuk insert lebih dari 1 data
	public function insert_multiple()
	{
				
		$entri = array();
		$count = $this->input->post('id');
		foreach ($count as $i => $value) {
			$entri[] = array(
				'id_user' 	=> $this->input->post('id')[$i],
				'id_materi' => $this->input->post('materi'),
				'status_kursus' 	=> 1

			);
		}
		//return $entri;
		// echo "<pre>"; print_r($timer_kursus);die;
		$this->db->insert_batch('peserta', $entri);
		return true;
	}

	public function get_joinuser($id)
	{
		// $query = 'SELECT * FROM user join kelas ON user.id_kelas=kelas.id_kelas WHERE user.id_user="' . $id . '"';
		$query = 'SELECT * FROM user WHERE user.id_user="' . $id . '"';
		return $this->db->query($query);
	}

	public function get_joinuser_tutor($id)
	{
		$query = 'SELECT * FROM user WHERE user.role=2';
		return $this->db->query($query);
	}

	public function soal($where, $table)
	{

		$this->db->order_by("RAND ()");
		return $this->db->get_where($table, $where);
	}

	public function insert_jawaban()
	{

		$this->db->insert_batch('jawaban', $entri);
		return true;
	}

	public function UpdateSkor($id_jawaban, $data)
	{
		$this->db->where('id_jawaban', $id_jawaban);
		$this->db->update('jawaban', $data);
	}

	public function UpdateSkor2($id_peserta, $data)
	{
		$this->db->where('id_peserta', $id_peserta);
		$this->db->update('peserta', $data);
	}

	public function get_peserta($id_user)
	{
		$this->db->select('*');
		$this->db->from('peserta');
		$this->db->join('materi', 'peserta.id_materi=materi.id_materi');
		$this->db->join('user', 'peserta.id_user=user.id_user');
		$this->db->where('user.id_user', $id_user);
		$query = $this->db->get();
		return $query->result();
	}

	public function importtutor($data = array())
	{
		$jumlah = count($data);

		if ($jumlah > 0) {
			$this->db->insert_batch('tutor', $data);
		}
	}
}
