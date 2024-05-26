<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_hasil extends CI_Model
{
    public function get_peserta2($id)
    {
        $this->db->select('*');
        $this->db->from('peserta');
        $this->db->join('materi', 'peserta.id_materi=materi.id_materi');
        $this->db->join('user', 'peserta.id_user=user.id_user');
        $this->db->where('peserta.id_materi', $id);
        $this->db->order_by('skor', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_peserta3()
    {
        $this->db->select('*');
        $this->db->from('peserta');
        $this->db->join('materi', 'peserta.id_materi=materi.id_materi');
        $this->db->join('user', 'peserta.id_user=user.id_user');
        $this->db->order_by('skor', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function cetak($id)
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

