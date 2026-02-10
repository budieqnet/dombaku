<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penyakit extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function daftar_penyakit()
    {
        $query = $this->db->query("SELECT
                                        riwayat_penyakit.id AS id_penyakit,
                                        riwayat_penyakit.kode_kambing AS kode_kambing,
                                        riwayat_penyakit.tgl_diagnosa AS tgl_diagnosa,
                                        riwayat_penyakit.penyakit AS penyakit,
                                        riwayat_penyakit.gejala AS gejala,
                                        riwayat_penyakit.tindakan AS tindakan,
                                        riwayat_penyakit.dokter AS dokter_diagnosa,
                                        riwayat_penyakit.keterangan AS keterangan_penyakit,
                                        riwayat_penyakit.status AS status_sakit,
                                        riwayat_penyakit.dibuat_tgl AS riwayat_sakit_tgl_dibuat,
                                        riwayat_penyakit.dibuat_oleh AS riwayat_sakit_dibuat_oleh
                                    FROM riwayat_penyakit
                                    ORDER BY riwayat_penyakit.tgl_diagnosa DESC");
        return $query->result_array();
    }

    public function riwayat_sakit($id)
    {
        $query = $this->db->query("SELECT
                                        riwayat_penyakit.id AS id_penyakit,
                                        riwayat_penyakit.kode_kambing AS kode_kambing,
                                        riwayat_penyakit.tgl_diagnosa AS tgl_diagnosa,
                                        riwayat_penyakit.penyakit AS penyakit,
                                        riwayat_penyakit.gejala AS gejala,
                                        riwayat_penyakit.tindakan AS tindakan,
                                        riwayat_penyakit.dokter AS dokter_diagnosa,
                                        riwayat_penyakit.keterangan AS keterangan_penyakit,
                                        riwayat_penyakit.status AS status_sakit,
                                        riwayat_penyakit.dibuat_tgl AS riwayat_sakit_tgl_dibuat,
                                        riwayat_penyakit.dibuat_oleh AS riwayat_sakit_dibuat_oleh
                                    FROM riwayat_penyakit
                                    WHERE riwayat_penyakit.id='$id'
                                    ORDER BY riwayat_penyakit.id DESC");
        return $query->row_array();
    }

    public function proses_tambah()
    {
        $kode_kambing = $this->input->post('kode_kambing');
        $tgl_diagnosa = $this->input->post('tgl_diagnosa');
        $penyakit = $this->input->post('penyakit');
        $gejala = $this->input->post('gejala');
        $tindakan = $this->input->post('tindakan');
        $dokter = $this->input->post('dokter');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'id' => '',
            'kode_kambing' => $kode_kambing,
            'tgl_diagnosa' => $tgl_diagnosa,
            'penyakit' => $penyakit,
            'gejala' => $gejala,
            'tindakan' => $tindakan,
            'dokter' => $dokter,
            'keterangan' => $keterangan,
            'status' => 'Sakit',
            'dibuat_oleh' => $this->session->userdata('user'),
            'dibuat_tgl' => date('Y-m-d')
        ];
        $this->db->insert('riwayat_penyakit', $data);

        $kambing = [
            'kondisi' => 'Sakit',
            'diedit_oleh' => $this->session->userdata('user'),
            'diedit_tgl' => date('Y-m-d')
        ];
        $this->db->where('kode', $kode_kambing);
        $this->db->update('identitas_kambing', $kambing);
    }

    public function proses_update()
    {
        $id = $this->input->post('id');
        $tgl_diagnosa = $this->input->post('tgl_diagnosa');
        $penyakit = $this->input->post('penyakit');
        $gejala = $this->input->post('gejala');
        $tindakan = $this->input->post('tindakan');
        $dokter = $this->input->post('dokter');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'tgl_diagnosa' => $tgl_diagnosa,
            'penyakit' => $penyakit,
            'gejala' => $gejala,
            'tindakan' => $tindakan,
            'dokter' => $dokter,
            'keterangan' => $keterangan,
            'dibuat_oleh' => $this->session->userdata('user'),
            'dibuat_tgl' => date('Y-m-d')
        ];
        $this->db->where('id', $id);
        $this->db->update('riwayat_penyakit', $data);
    }

    public function proses_hapus($id, $kode_kambing)
    {
        $kambing = [
            'kondisi' => 'Sehat',
            'diedit_oleh' => $this->session->userdata('user'),
            'diedit_tgl' => date('Y-m-d')
        ];
        $this->db->where('kode', $kode_kambing);
        $this->db->update('identitas_kambing', $kambing);        
        return $this->db->delete('riwayat_penyakit', ['id' => $id]);
    }

    public function update_kondisi($id, $kode_ternak)
    {
        $kondisi = $this->input->post('kondisi');
        $data = [
            'status' => $kondisi,
            'dibuat_tgl' => date('Y-m-d'),
            'dibuat_oleh' => $this->session->userdata('user')
        ];
        $this->db->where('id', $id);
        $this->db->update('riwayat_penyakit', $data);
        $kambing = [
            'kondisi' => $kondisi,
            'diedit_oleh' => $this->session->userdata('user'),
            'diedit_tgl' => date('Y-m-d')
        ];
        $this->db->where('kode', $kode_ternak);
        $this->db->update('identitas_kambing', $kambing);        
    }

    public function data_penyakit_ternak($kode_ternak)
    {
        $query = $this->db->query("SELECT
                                        riwayat_penyakit.id AS id_penyakit,
                                        riwayat_penyakit.kode_kambing AS kode_kambing,
                                        riwayat_penyakit.tgl_diagnosa AS tgl_diagnosa,
                                        riwayat_penyakit.penyakit AS penyakit,
                                        riwayat_penyakit.gejala AS gejala,
                                        riwayat_penyakit.tindakan AS tindakan,
                                        riwayat_penyakit.dokter AS dokter_diagnosa,
                                        riwayat_penyakit.keterangan AS keterangan_penyakit,
                                        riwayat_penyakit.status AS status_sakit,
                                        riwayat_penyakit.dibuat_tgl AS riwayat_sakit_tgl_dibuat,
                                        riwayat_penyakit.dibuat_oleh AS riwayat_sakit_dibuat_oleh
                                    FROM riwayat_penyakit
                                    WHERE riwayat_penyakit.kode_kambing='$kode_ternak'
                                    ORDER BY riwayat_penyakit.tgl_diagnosa DESC");
        return $query->result_array();
    }
}
