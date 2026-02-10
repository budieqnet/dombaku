<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pertumbuhan extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function daftar_pertumbuhan()
    {
        $query = $this->db->query("SELECT * FROM riwayat_pertumbuhan ORDER BY riwayat_pertumbuhan.tgl_pengukuran DESC");
        return $query->result_array();
    }

    public function proses_tambah()
    {
        $kode_kambing = $this->input->post('kode_kambing');
        $tgl_pengukuran = $this->input->post('tgl_pengukuran');
        $berat = $this->input->post('berat');
        $tinggi = $this->input->post('tinggi');
        $panjang = $this->input->post('panjang');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'id' => '',
            'kode_kambing' => $kode_kambing,
            'tgl_pengukuran' => $tgl_pengukuran,
            'berat' => $berat,
            'tinggi' => $tinggi,
            'panjang' => $panjang,
            'keterangan' => $keterangan,
            'dibuat_oleh' => $this->session->userdata('user'),
            'dibuat_tgl' => date('Y-m-d')
        ];
        $this->db->insert('riwayat_pertumbuhan', $data);
    }

    public function proses_update()
    {
        $id = $this->input->post('id');
        $kode_kambing = $this->input->post('kode_kambing');
        $tgl_pengukuran = $this->input->post('tgl_pengukuran');
        $berat = $this->input->post('berat');
        $tinggi = $this->input->post('tinggi');
        $panjang = $this->input->post('panjang');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'kode_kambing' => $kode_kambing,
            'tgl_pengukuran' => $tgl_pengukuran,
            'berat' => $berat,
            'tinggi' => $tinggi,
            'panjang' => $panjang,
            'keterangan' => $keterangan,
            'dibuat_oleh' => $this->session->userdata('user'),
            'dibuat_tgl' => date('Y-m-d')
        ];
        $this->db->where('id', $id);
        $this->db->update('riwayat_pertumbuhan', $data);
    }

    public function proses_hapus($id)
    {
        return $this->db->delete('riwayat_pertumbuhan', ['id' => $id]);
    }

    public function data_pertumbuhan_ternak($kode_ternak)
    {
        $query = $this->db->query("SELECT * FROM riwayat_pertumbuhan WHERE riwayat_pertumbuhan.kode_kambing='$kode_ternak' ORDER BY riwayat_pertumbuhan.tgl_pengukuran DESC");
        return $query->result_array();
    }
}
