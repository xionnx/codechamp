<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_peserta extends CI_Model
{
    public function get_joinpeserta($id)
    {
        $this->db->select('*');
        $this->db->from('peserta');
        $this->db->join('materi', 'peserta.id_materi=materi.id_materi');
        $this->db->join('user', 'peserta.id_user=user.id_user');
        $this->db->where('peserta.id_peserta', $id);
        $query = $this->db->get();

        if ($query !== false) {
            return $query->result();
        } else {
            return false; // Atau bisa juga mengembalikan skor lain yang menunjukkan bahwa query gagal
        }
    }

    public function get_peserta($idkls, $iduser)
    {
        $array = array('user.id_user' => $iduser);
        $this->db->select('*');
        $this->db->from('peserta');
        $this->db->join('materi', 'peserta.id_materi=materi.id_materi');
        $this->db->join('user', 'peserta.id_user=user.id_user');
        $this->db->where($array);
        $this->db->order_by('id_peserta', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_peserta2($idkls)
    {
        $this->db->select('*');
        $this->db->from('peserta');
        $this->db->join('materi', 'peserta.id_materi=materi.id_materi');
        $this->db->join('user', 'peserta.id_user=user.id_user');
        $this->db->order_by('id_peserta', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_peserta3($iduser)
    {
        $this->db->select('*');
        $this->db->from('peserta');
        $this->db->join('materi', 'peserta.id_materi=materi.id_materi');
        $this->db->join('user', 'peserta.id_user=user.id_user');
        $this->db->where('user.id_user', $iduser);
        $this->db->order_by('id_peserta', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_peserta4()
    {
        $this->db->select('*');
        $this->db->from('peserta');
        $this->db->join('materi', 'peserta.id_materi=materi.id_materi');
        $this->db->join('user', 'peserta.id_user=user.id_user');
        $this->db->order_by('id_peserta', 'DESC');
        $query = $this->db->get();
        return $query;
    }
}
