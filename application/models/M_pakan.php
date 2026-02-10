<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pakan extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

    // --- MASTER PAKAN ---

    public function daftar_master_pakan()
    {
        return $this->db->get('master_pakan')->result_array();
    }

    public function proses_tambah_master_pakan()
    {
        $data = [
            'nama_pakan' => $this->input->post('nama'),
            'satuan' => $this->input->post('satuan'),
            'jenis_pakan' => $this->input->post('jenis'),
            'keterangan' => $this->input->post('keterangan'),
            'dibuat_tgl' => date('Y-m-d'),
            'dibuat_oleh' => $this->session->userdata('user')
        ];
        $this->db->insert('master_pakan', $data);
    }

    public function proses_update_master_pakan()
    {
        $id = $this->input->post('id');
        $data = [
            'nama_pakan' => $this->input->post('nama'),
            'satuan' => $this->input->post('satuan'),
            'jenis_pakan' => $this->input->post('jenis'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->db->where('id', $id);
        $this->db->update('master_pakan', $data);
    }

    public function proses_hapus_master_pakan($id)
    {
        return $this->db->delete('master_pakan', ['id' => $id]);
    }

    // --- STOK PAKAN ---

    public function daftar_stok_pakan($id_pakan = null)
    {
        $this->db->select('stok_pakan.*, master_pakan.nama_pakan, master_pakan.satuan');
        $this->db->from('stok_pakan');
        $this->db->join('master_pakan', 'master_pakan.id = stok_pakan.id_pakan');
        if($id_pakan) $this->db->where('stok_pakan.id_pakan', $id_pakan);
        $this->db->order_by('tgl_transaksi', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_stok_sekarang($id_pakan)
    {
        $this->db->select('SUM(CASE WHEN jenis_transaksi = "Masuk" THEN jumlah ELSE -jumlah END) as total');
        $this->db->where('id_pakan', $id_pakan);
        $res = $this->db->get('stok_pakan')->row_array();
        return $res['total'] ? $res['total'] : 0;
    }

    public function proses_tambah_stok()
    {
        $data = [
            'id_pakan' => $this->input->post('id_pakan'),
            'tgl_transaksi' => $this->input->post('tgl'),
            'jenis_transaksi' => $this->input->post('jenis'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan'),
            'dibuat_tgl' => date('Y-m-d'),
            'dibuat_oleh' => $this->session->userdata('user')
        ];
        $this->db->insert('stok_pakan', $data);
    }

    // --- MASTER KANDANG ---

    public function daftar_kandang()
    {
        return $this->db->get('master_kandang')->result_array();
    }

    public function proses_tambah_kandang()
    {
        $data = [
            'nama_kandang' => $this->input->post('nama'),
            'lokasi' => $this->input->post('lokasi'),
            'kapasitas' => $this->input->post('kapasitas'),
            'keterangan' => $this->input->post('keterangan'),
            'dibuat_tgl' => date('Y-m-d'),
            'dibuat_oleh' => $this->session->userdata('user')
        ];
        $this->db->insert('master_kandang', $data);
    }

    // --- PEMBERIAN PAKAN ---

    public function daftar_pemberian_pakan()
    {
        $this->db->select('pemberian_pakan.*, master_kandang.nama_kandang, master_pakan.nama_pakan, master_pakan.satuan');
        $this->db->from('pemberian_pakan');
        $this->db->join('master_kandang', 'master_kandang.id = pemberian_pakan.id_kandang');
        $this->db->join('master_pakan', 'master_pakan.id = pemberian_pakan.id_pakan');
        $this->db->order_by('tgl_pemberian', 'DESC');
        return $this->db->get()->result_array();
    }

    public function proses_pemberian_pakan()
    {
        $id_pakan = $this->input->post('id_pakan');
        $jumlah = $this->input->post('jumlah');

        $data = [
            'id_kandang' => $this->input->post('id_kandang'),
            'id_pakan' => $id_pakan,
            'tgl_pemberian' => $this->input->post('tgl'),
            'waktu_pemberian' => $this->input->post('waktu'),
            'jumlah' => $jumlah,
            'keterangan' => $this->input->post('keterangan'),
            'dibuat_tgl' => date('Y-m-d'),
            'dibuat_oleh' => $this->session->userdata('user')
        ];
        $this->db->insert('pemberian_pakan', $data);

        // Otomatis update stok pakan (Keluar)
        $stok_data = [
            'id_pakan' => $id_pakan,
            'tgl_transaksi' => $this->input->post('tgl'),
            'jenis_transaksi' => 'Keluar',
            'jumlah' => $jumlah,
            'keterangan' => 'Pemberian pakan otomatis ke kandang',
            'dibuat_tgl' => date('Y-m-d'),
            'dibuat_oleh' => $this->session->userdata('user')
        ];
        $this->db->insert('stok_pakan', $stok_data);
    }

    // --- FORMULASI ---

    public function hitung_formulasi($bobot, $umur_hari)
    {
        // Logika sederhana: 
        // Hijauan: 10% dari bobot badan
        // Konsentrat: 2% dari bobot badan (jika sudah lepas sapih > 90 hari)
        
        $hijauan = $bobot * 0.1;
        $konsentrat = ($umur_hari > 90) ? ($bobot * 0.02) : 0;
        
        return [
            'hijauan' => $hijauan,
            'konsentrat' => $konsentrat
        ];
    }
}
