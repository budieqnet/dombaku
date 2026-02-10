<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengobatan extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function daftar_pengobatan()
    {
        $query = $this->db->query("SELECT * FROM riwayat_pengobatan ORDER BY riwayat_pengobatan.tgl_pengobatan DESC");
        return $query->result_array();
    }

    public function riwayat_pengobatan_ternak($id_riwayat_sakit)
    {
        $query = $this->db->query("SELECT
                                        riwayat_pengobatan.id AS id_pengobatan,
                                        riwayat_pengobatan.tgl_pengobatan AS tgl_pengobatan,
                                        riwayat_pengobatan.id_riwayat_sakit AS id_riwayat_sakit,
                                        riwayat_pengobatan.obat AS obat,
                                        riwayat_pengobatan.durasi AS durasi,
                                        riwayat_pengobatan.dokter AS dokter_pengobatan,
                                        riwayat_pengobatan.keterangan AS keterangan_pengobatan,
                                        riwayat_pengobatan.dibuat_tgl AS riwayat_obat_tgl_dibuat,
                                        riwayat_pengobatan.dibuat_oleh AS riwayat_obat_dibuat_oleh
                                    FROM riwayat_pengobatan
                                    WHERE riwayat_pengobatan.id_riwayat_sakit='$id_riwayat_sakit'
                                    ORDER BY riwayat_pengobatan.id");
        return $query->result_array();
    }

    public function proses_tambah()
    {
        $id_riwayat_sakit = $this->input->post('id_riwayat_sakit');
        $tgl_pengobatan = $this->input->post('tgl_pengobatan');
        $obat = $this->input->post('obat');
        $durasi = $this->input->post('durasi');
        $dokter = $this->input->post('dokter');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'id' => '',
            'id_riwayat_sakit' => $id_riwayat_sakit,
            'tgl_pengobatan' => $tgl_pengobatan,
            'obat' => $obat,
            'durasi' => $durasi,
            'dokter' => $dokter,
            'keterangan' => $keterangan,
            'dibuat_oleh' => $this->session->userdata('user'),
            'dibuat_tgl' => date('Y-m-d')
        ];
        $this->db->insert('riwayat_pengobatan', $data);
    }

    public function proses_update()
    {
        $id = $this->input->post('id_pengobatan');
        $tgl_pengobatan = $this->input->post('tgl_pengobatan');
        $obat = $this->input->post('obat');
        $durasi = $this->input->post('durasi');
        $dokter = $this->input->post('dokter');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'tgl_pengobatan' => $tgl_pengobatan,
            'obat' => $obat,
            'durasi' => $durasi,
            'dokter' => $dokter,
            'keterangan' => $keterangan,
            'dibuat_oleh' => $this->session->userdata('user'),
            'dibuat_tgl' => date('Y-m-d')
        ];
        $this->db->where('id', $id);
        $this->db->update('riwayat_pengobatan', $data);
    }

    public function proses_hapus($id_pengobatan)
    {
        return $this->db->delete('riwayat_pengobatan', ['id' => $id_pengobatan]);
    }
}
