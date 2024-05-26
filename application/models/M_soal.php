<?php 
defined('BASEPATH') OR exit('no direct script access allowed');

Class M_soal extends CI_Model {

	public function get_joinsoal($id)
	{
		$query = 'SELECT * FROM soal_materi join materi ON soal_materi.id_materi=materi.id_materi WHERE soal_materi.id_soal_materi="'.$id.'"';
		return $this->db->query($query);
	}

}
?>