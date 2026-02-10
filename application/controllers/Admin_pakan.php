<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_pakan extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('group_id') != '1') {
            redirect('autentikasi');
        }
        $this->load->model('M_pakan');
        $this->load->model('M_kambing');
    }

    public function index()
    {
        redirect('admin_pakan/inventaris');
    }

    // --- INVENTARIS ---

    public function inventaris()
    {
        $data['master_pakan'] = $this->M_pakan->daftar_master_pakan();
        foreach($data['master_pakan'] as &$p) {
            $p['stok'] = $this->M_pakan->get_stok_sekarang($p['id']);
        }
        
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/pakan/inventaris', $data);
        $this->load->view('admin/footer');
    }

    public function master_pakan()
    {
        $data['pakan'] = $this->M_pakan->daftar_master_pakan();
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/pakan/master_pakan', $data);
        $this->load->view('admin/footer');
    }

    public function riwayat_stok($id_pakan)
    {
        $data['riwayat'] = $this->M_pakan->daftar_stok_pakan($id_pakan);
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/pakan/riwayat_stok', $data);
        $this->load->view('admin/footer');
    }

    // --- KANDANG ---

    public function kandang()
    {
        $data['kandang'] = $this->M_pakan->daftar_kandang();
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/pakan/kandang', $data);
        $this->load->view('admin/footer');
    }

    // --- FORMULASI ---

    public function formulasi()
    {
        $data['kambing'] = $this->M_kambing->daftar_kambing();
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/pakan/formulasi', $data);
        $this->load->view('admin/footer');
    }

    // --- LOG PEMBERIAN ---

    public function log_pemberian()
    {
        $data['logs'] = $this->M_pakan->daftar_pemberian_pakan();
        $data['kandang'] = $this->M_pakan->daftar_kandang();
        $data['pakan'] = $this->M_pakan->daftar_master_pakan();

        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/pakan/log_pemberian', $data);
        $this->load->view('admin/footer');
    }

    // --- PROSES ---

    public function proses_tambah_master() {
        $this->M_pakan->proses_tambah_master_pakan();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info">Data pakan berhasil ditambah</div>');
        redirect('admin_pakan/master_pakan');
    }

    public function proses_tambah_stok() {
        $this->M_pakan->proses_tambah_stok();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info">Stok berhasil diperbarui</div>');
        redirect('admin_pakan/inventaris');
    }

    public function proses_tambah_kandang() {
        $this->M_pakan->proses_tambah_kandang();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info">Data kandang berhasil ditambah</div>');
        redirect('admin_pakan/kandang');
    }

    public function proses_pemberian_pakan() {
        $this->M_pakan->proses_pemberian_pakan();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info">Log pemberian pakan berhasil dicatat</div>');
        redirect('admin_pakan/log_pemberian');
    }
}
