<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_pakan extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('group_id') != '2') {
            redirect('autentikasi');
        }
        $this->load->model('M_pakan');
    }

    public function index()
    {
        redirect('pegawai_pakan/log_pemberian');
    }

    public function log_pemberian()
    {
        $data['logs'] = $this->M_pakan->daftar_pemberian_pakan();
        $data['kandang'] = $this->M_pakan->daftar_kandang();
        $data['pakan'] = $this->M_pakan->daftar_master_pakan();

        $this->load->view('pegawai/header');
        $this->load->view('pegawai/nav');
        $this->load->view('pegawai/sidebar');
        $this->load->view('pegawai/pakan/log_pemberian', $data);
        $this->load->view('pegawai/footer');
    }

    public function proses_pemberian_pakan() {
        $this->M_pakan->proses_pemberian_pakan();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info">Log pemberian pakan berhasil dicatat</div>');
        redirect('pegawai_pakan/log_pemberian');
    }
}
