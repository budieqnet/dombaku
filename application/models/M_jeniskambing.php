<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jeniskambing extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function jenis_kambing()
    {
        $query = $this->db->query("SELECT * FROM jenis_kambing ORDER BY id");
        return $query->result_array();
    }

    public function proses_tambah_jenis()
    {
        $nama = $this->input->post('nama');
        $data_jenis = [
            'id' => '',
            'nama' => $nama
        ];
        $this->db->insert('jenis_kambing', $data_jenis);
    }


    public function proses_update_jenis()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $data_jenis  = [
            'nama' => $nama
        ];
        $this->db->where('id', $id);
        $this->db->update('jenis_kambing', $data_jenis);
    }

    public function proses_hapus_jenis($id)
    {
        return $this->db->delete('jenis_kambing', ['id' => $id]);
    }
}
