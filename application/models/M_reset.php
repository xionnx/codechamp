<?php 
defined('BASEPATH') OR exit('no direct script access allowed');

Class M_reset extends CI_Model {


	public function mytruncate()
	{
		$this->db->truncate('peserta');
		$this->db->truncate('jawaban');
		$this->db->truncate('soal_materi');
				
	}


}
