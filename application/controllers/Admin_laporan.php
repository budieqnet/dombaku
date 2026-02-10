<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('group_id') != '1') {
            redirect('autentikasi');
        }
        $this->load->model('M_kambing');
        $this->load->model('M_keuangan');
        $this->load->model('M_penyakit');
        $this->load->model('M_vaksin');
    }

    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/laporan/laporan_dashboard');
        $this->load->view('admin/footer');
    }

    public function populasi()
    {
        $data['daftar_kambing'] = $this->M_kambing->daftar_kambing();
        $this->load->view('admin/laporan/laporan_populasi', $data);
    }

    public function pertumbuhan()
    {
        $data['adg_report'] = $this->M_kambing->get_adg_report();
        $this->load->view('admin/laporan/laporan_pertumbuhan', $data);
    }

    public function keuangan()
    {
        $data['daftar_transaksi'] = $this->M_keuangan->daftar_transaksi();
        $data['summary'] = $this->M_keuangan->get_summary_transaksi();
        $this->load->view('admin/laporan/laporan_keuangan', $data);
    }

    public function kesehatan()
    {
        $data['daftar_penyakit'] = $this->M_penyakit->daftar_penyakit();
        $this->load->view('admin/laporan/laporan_kesehatan', $data);
    }
}
