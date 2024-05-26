<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_jadwal_kursus extends CI_Model
{
    public function jadwal_kursus()
    {
        $this->db->select('*');
        $this->db->from('peserta');
        $this->db->join('materi', 'peserta.id_materi=materi.id_materi');
        $this->db->join('user', 'peserta.id_user=user.id_user');
        $this->db->where('peserta.id_peserta', $id);
        $query = $this->db->get();
        return $query->result();
    }
}
