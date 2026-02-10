<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_vaksin extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function daftar_vaksin()
    {
        $query = $this->db->query("SELECT * FROM riwayat_vaksin ORDER BY riwayat_vaksin.tgl_vaksin DESC");
        return $query->result_array();
    }

    public function proses_tambah()
    {
        $kode_kambing = $this->input->post('kode_kambing');
        $tgl_vaksin = $this->input->post('tgl_vaksin');
        $jenis_vaksin = $this->input->post('jenis_vaksin');
        $dosis = $this->input->post('dosis');
        $dokter = $this->input->post('dokter');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'id' => '',
            'kode_kambing' => $kode_kambing,
            'tgl_vaksin' => $tgl_vaksin,
            'jenis_vaksin' => $jenis_vaksin,
            'dosis' => $dosis,
            'dokter' => $dokter,
            'keterangan' => $keterangan,
            'dibuat_oleh' => $this->session->userdata('user'),
            'dibuat_tgl' => date('Y-m-d')
        ];
        $this->db->insert('riwayat_vaksin', $data);
    }

    public function proses_update()
    {
        $id = $this->input->post('id');
        $kode_kambing = $this->input->post('kode_kambing');
        $tgl_vaksin = $this->input->post('tgl_vaksin');
        $jenis_vaksin = $this->input->post('jenis_vaksin');
        $dosis = $this->input->post('dosis');
        $dokter = $this->input->post('dokter');
        $keterangan = $this->input->post('keterangan');
    
        $data = [
            'kode_kambing' => $kode_kambing,
            'tgl_vaksin' => $tgl_vaksin,
            'jenis_vaksin' => $jenis_vaksin,
            'dosis' => $dosis,
            'dokter' => $dokter,
            'keterangan' => $keterangan,
            'dibuat_oleh' => $this->session->userdata('user'),
            'dibuat_tgl' => date('Y-m-d')
        ];
        $this->db->where('id', $id);
        $this->db->update('riwayat_vaksin', $data);
    }

    public function proses_hapus($id)
    {
        return $this->db->delete('riwayat_vaksin', ['id' => $id]);
    }

    public function data_vaksin_ternak($kode_ternak)
    {
        $query = $this->db->query("SELECT * FROM riwayat_vaksin WHERE riwayat_vaksin.kode_kambing='$kode_ternak' ORDER BY riwayat_vaksin.tgl_vaksin DESC");
        return $query->result_array();
    }
}
