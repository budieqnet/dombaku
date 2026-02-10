<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dokter extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dokter()
    {
        $query = $this->db->query("SELECT * FROM dokter ORDER BY id");
        return $query->result_array();
    }

    public function proses_tambah()
    {
        $nama = $this->input->post('nama');
        $data = [
            'id' => '',
            'nama' => $nama,
            'dibuat_tgl' => date('Y-m-d'),
            'dibuat_oleh' => $this->session->userdata('user')
        ];
        $this->db->insert('dokter', $data);
    }


    public function proses_update()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $data  = [
            'nama' => $nama,
            'dibuat_tgl' => date('Y-m-d'),
            'dibuat_oleh' => $this->session->userdata('user')
        ];
        $this->db->where('id', $id);
        $this->db->update('dokter', $data);
    }

    public function proses_hapus($id)
    {
        return $this->db->delete('dokter', ['id' => $id]);
    }
}
