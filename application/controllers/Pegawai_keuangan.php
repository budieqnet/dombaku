<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_keuangan extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('group_id') != '2') {
            redirect('autentikasi');
        }
        $this->load->model('M_keuangan');
    }

    public function index()
    {
        redirect('pegawai_keuangan/transaksi');
    }

    public function transaksi()
    {
        $data['transaksi'] = $this->M_keuangan->daftar_transaksi();
        $this->load->view('pegawai/header');
        $this->load->view('pegawai/nav');
        $this->load->view('pegawai/sidebar');
        $this->load->view('pegawai/keuangan/transaksi', $data);
        $this->load->view('pegawai/footer');
    }

    public function proses_transaksi()
    {
        $this->M_keuangan->proses_transaksi();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info">Transaksi berhasil dicatat</div>');
        redirect('pegawai_keuangan/transaksi');
    }
}
