<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_keuangan extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pakan');
    }

    // --- KONFIGURASI ---

    public function get_konfigurasi()
    {
        return $this->db->get('keuangan_konfigurasi')->result_array();
    }

    public function get_konf_nilai($nama)
    {
        $this->db->where('nama_konfigurasi', $nama);
        $res = $this->db->get('keuangan_konfigurasi')->row_array();
        return $res ? $res['nilai'] : 0;
    }

    public function proses_update_konf()
    {
        $id = $this->input->post('id');
        $data = [
            'nilai' => $this->input->post('nilai'),
            'diedit_tgl' => date('Y-m-d'),
            'diedit_oleh' => $this->session->userdata('user')
        ];
        $this->db->where('id', $id);
        $this->db->update('keuangan_konfigurasi', $data);
    }

    // --- TRANSAKSI ---

    public function daftar_transaksi()
    {
        $this->db->order_by('tgl_transaksi', 'DESC');
        return $this->db->get('keuangan_transaksi')->result_array();
    }

    public function proses_transaksi()
    {
        $data = [
            'tgl_transaksi' => $this->input->post('tgl'),
            'jenis_transaksi' => $this->input->post('jenis'),
            'kategori' => $this->input->post('kategori'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan'),
            'dibuat_tgl' => date('Y-m-d'),
            'dibuat_oleh' => $this->session->userdata('user')
        ];
        $this->db->insert('keuangan_transaksi', $data);
    }

    public function proses_hapus_transaksi($id)
    {
        return $this->db->delete('keuangan_transaksi', ['id' => $id]);
    }

    // --- ANALISIS ---

    public function get_valuation($kode)
    {
        $this->db->select('berat_lahir');
        $this->db->where('kode', $kode);
        $kambing = $this->db->get('identitas_kambing')->row_array();
        
        $harga_per_kg = $this->get_konf_nilai('harga_pasar_per_kg');
        
        return $kambing['berat_lahir'] * $harga_per_kg;
    }

    public function get_cop($kode)
    {
        // 1. Biaya Pakan (Berdasarkan Log Pemberian Pakan per Kandang - Estimasi rata-rata per ekor)
        // Note: Karena log pakan per kandang, kita hitung total pakan di kandang tsb / kapasitas kandang
        // Untuk simulasi sederhana, kita hitung umur ternak x estimasi biaya harian
        
        $this->db->select('tgl_lahir');
        $this->db->where('kode', $kode);
        $kambing = $this->db->get('identitas_kambing')->row_array();
        
        $tgl_lahir = new DateTime($kambing['tgl_lahir']);
        $sekarang = new DateTime();
        $diff = $tgl_lahir->diff($sekarang);
        $bulan = ($diff->y * 12) + $diff->m + ($diff->d / 30);
        
        $biaya_tenaga_kerja = $this->get_konf_nilai('biaya_tenaga_kerja_per_ekor_bulan') * $bulan;
        
        // Estimasi biaya pakan (misal Rp 3000/hari)
        $biaya_pakan = 3000 * ($diff->days);
        
        // Biaya Medis/Vaksin
        $this->db->select('SUM(dosis * 1000) as total'); // Asumsi Rp 1000 per unit dosis
        $this->db->where('kode_kambing', $kode);
        $medis = $this->db->get('riwayat_vaksin')->row_array();
        $biaya_medis = $medis['total'] ? $medis['total'] : 0;

        return [
            'tenaga_kerja' => $biaya_tenaga_kerja,
            'pakan' => $biaya_pakan,
            'medis' => $biaya_medis,
            'total' => $biaya_tenaga_kerja + $biaya_pakan + $biaya_medis
        ];
    }
    public function get_summary_transaksi()
    {
        $query = $this->db->query("SELECT 
                                        SUM(CASE WHEN jenis_transaksi = 'Pemasukan' THEN jumlah ELSE 0 END) as total_pemasukan,
                                        SUM(CASE WHEN jenis_transaksi = 'Pengeluaran' THEN jumlah ELSE 0 END) as total_pengeluaran,
                                        (SUM(CASE WHEN jenis_transaksi = 'Pemasukan' THEN jumlah ELSE 0 END) - SUM(CASE WHEN jenis_transaksi = 'Pengeluaran' THEN jumlah ELSE 0 END)) as saldo
                                    FROM keuangan_transaksi");
        return $query->row_array();
    }
}
