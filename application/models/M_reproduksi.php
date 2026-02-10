<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_reproduksi extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

    // --- PERKAWINAN ---

    public function daftar_perkawinan()
    {
        $query = $this->db->query("SELECT * FROM riwayat_perkawinan ORDER BY tgl_kawin DESC");
        return $query->result_array();
    }

    public function proses_tambah_perkawinan()
    {
        $betina = $this->input->post('betina');
        $jantan = $this->input->post('jantan');
        $tgl_kawin = $this->input->post('tgl_kawin');
        $keterangan = $this->input->post('keterangan');

        // Kalkulasi HPL (150 hari)
        $tgl_hpl = date('Y-m-d', strtotime($tgl_kawin . ' + 150 days'));

        $data = [
            'kode_induk_betina' => $betina,
            'kode_induk_jantan' => $jantan,
            'tgl_kawin' => $tgl_kawin,
            'tgl_hpl' => $tgl_hpl,
            'status' => 'Monitor',
            'keterangan' => $keterangan,
            'dibuat_tgl' => date('Y-m-d'),
            'dibuat_oleh' => $this->session->userdata('user')
        ];
        $this->db->insert('riwayat_perkawinan', $data);
    }

    public function proses_update_perkawinan()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'status' => $status,
            'keterangan' => $keterangan
        ];
        $this->db->where('id', $id);
        $this->db->update('riwayat_perkawinan', $data);
    }

    public function proses_hapus_perkawinan($id)
    {
        return $this->db->delete('riwayat_perkawinan', ['id' => $id]);
    }

    // --- BIRAHI ---

    public function daftar_birahi()
    {
        $query = $this->db->query("SELECT * FROM riwayat_birahi ORDER BY tgl_birahi DESC");
        return $query->result_array();
    }

    public function proses_tambah_birahi()
    {
        $kode = $this->input->post('kode');
        $tgl_birahi = $this->input->post('tgl_birahi');
        $keterangan = $this->input->post('keterangan');

        // Kalkulasi Prediksi Berikutnya (21 hari)
        $tgl_prediksi = date('Y-m-d', strtotime($tgl_birahi . ' + 21 days'));

        $data = [
            'kode_kambing' => $kode,
            'tgl_birahi' => $tgl_birahi,
            'tgl_prediksi_berikutnya' => $tgl_prediksi,
            'keterangan' => $keterangan,
            'dibuat_tgl' => date('Y-m-d'),
            'dibuat_oleh' => $this->session->userdata('user')
        ];
        $this->db->insert('riwayat_birahi', $data);
    }

    public function proses_hapus_birahi($id)
    {
        return $this->db->delete('riwayat_birahi', ['id' => $id]);
    }

    // --- PEDIGREE ---

    public function get_parent_data($kode)
    {
        $query = $this->db->query("SELECT kode, jenis, kode_induk_jantan, kode_induk_betina FROM identitas_kambing WHERE kode=?", [$kode]);
        return $query->row_array();
    }

    public function generate_pedigree($kode, $depth = 2)
    {
        if ($depth < 0) return null;

        $data = $this->get_parent_data($kode);
        if (!$data) return null;

        $pedigree = [
            'kode' => $data['kode'],
            'jenis' => $data['jenis'],
            'jantan' => null,
            'betina' => null
        ];

        if (!empty($data['kode_induk_jantan']) && $data['kode_induk_jantan'] != 'Kosong') {
            $pedigree['jantan'] = $this->generate_pedigree($data['kode_induk_jantan'], $depth - 1);
        }

        if (!empty($data['kode_induk_betina']) && $data['kode_induk_betina'] != 'Kosong') {
            $pedigree['betina'] = $this->generate_pedigree($data['kode_induk_betina'], $depth - 1);
        }

        return $pedigree;
    }
}
