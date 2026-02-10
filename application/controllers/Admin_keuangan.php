<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_keuangan extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('group_id') != '1') {
            redirect('autentikasi');
        }
        $this->load->model('M_keuangan');
        $this->load->model('M_kambing');
    }

    public function index()
    {
        redirect('admin_keuangan/transaksi');
    }

    public function transaksi()
    {
        $data['transaksi'] = $this->M_keuangan->daftar_transaksi();
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/keuangan/transaksi', $data);
        $this->load->view('admin/footer');
    }

    public function valuasi()
    {
        $data['kambing'] = $this->M_kambing->daftar_kambing();
        $data['harga_pasar'] = $this->M_keuangan->get_konf_nilai('harga_pasar_per_kg');
        
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/keuangan/valuasi', $data);
        $this->load->view('admin/footer');
    }

    public function analisis_cop($kode = null)
    {
        $data['kambing'] = $this->M_kambing->daftar_kambing();
        if ($kode) {
            $data['cop'] = $this->M_keuangan->get_cop($kode);
            $data['valuasi'] = $this->M_keuangan->get_valuation($kode);
            $data['kode_ternak'] = $kode;
        } else {
            $data['cop'] = null;
        }

        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/keuangan/analisis_cop', $data);
        $this->load->view('admin/footer');
    }

    public function konfigurasi()
    {
        $data['konfigurasi'] = $this->M_keuangan->get_konfigurasi();
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/keuangan/konfigurasi', $data);
        $this->load->view('admin/footer');
    }

    public function proses_transaksi()
    {
        $this->M_keuangan->proses_transaksi();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info">Transaksi berhasil dicatat</div>');
        redirect('admin_keuangan/transaksi');
    }

    public function proses_update_konf()
    {
        $this->M_keuangan->proses_update_konf();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Konfigurasi berhasil diperbarui</div>');
        redirect('admin_keuangan/konfigurasi');
    }

    public function proses_hapus_transaksi($id)
    {
        $this->M_keuangan->proses_hapus_transaksi($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Transaksi berhasil dihapus</div>');
        redirect('admin_keuangan/transaksi');
    }
}
