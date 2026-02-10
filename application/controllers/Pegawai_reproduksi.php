<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_reproduksi extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('group_id') != '2') {
            redirect('autentikasi');
        }
        $this->load->model('M_reproduksi');
        $this->load->model('M_kambing');
        $this->load->model('M_fitur');
    }

    public function index()
    {
        redirect('pegawai_reproduksi/perkawinan');
    }

    public function perkawinan()
    {
        $data['perkawinan'] = $this->M_reproduksi->daftar_perkawinan();
        $data['kambing'] = $this->M_kambing->daftar_kambing();
        
        $this->load->view('pegawai/header');
        $this->load->view('pegawai/nav');
        $this->load->view('pegawai/sidebar');
        $this->load->view('pegawai/reproduksi/perkawinan', $data);
        $this->load->view('pegawai/footer');
    }

    public function birahi()
    {
        $data['birahi'] = $this->M_reproduksi->daftar_birahi();
        $data['kambing'] = $this->M_kambing->daftar_kambing();
        
        $this->load->view('pegawai/header');
        $this->load->view('pegawai/nav');
        $this->load->view('pegawai/sidebar');
        $this->load->view('pegawai/reproduksi/birahi', $data);
        $this->load->view('pegawai/footer');
    }

    public function pedigree($kode = null)
    {
        // Check if kode is provided via GET if not provided via segment
        if (!$kode) {
            $kode = $this->input->get('kode');
        }

        if ($kode) {
            $data['tree'] = $this->M_reproduksi->generate_pedigree($kode);
            $data['kode_ternak'] = $kode;
        } else {
            $data['tree'] = null;
        }
        
        $data['kambing'] = $this->M_kambing->daftar_kambing();

        $this->load->view('pegawai/header');
        $this->load->view('pegawai/nav');
        $this->load->view('pegawai/sidebar');
        $this->load->view('pegawai/reproduksi/pedigree', $data);
        $this->load->view('pegawai/footer');
    }

    // --- PROSES ---

    public function proses_tambah_perkawinan()
    {
        $this->M_reproduksi->proses_tambah_perkawinan();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">Data perkawinan berhasil ditambah</div>');
        redirect('pegawai_reproduksi/perkawinan');
    }

    public function proses_update_perkawinan()
    {
        $this->M_reproduksi->proses_update_perkawinan();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Status perkawinan berhasil diupdate</div>');
        redirect('pegawai_reproduksi/perkawinan');
    }

    public function proses_hapus_perkawinan($id)
    {
        $this->M_reproduksi->proses_hapus_perkawinan($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data perkawinan berhasil dihapus</div>');
        redirect('pegawai_reproduksi/perkawinan');
    }

    public function proses_tambah_birahi()
    {
        $this->M_reproduksi->proses_tambah_birahi();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">Data birahi berhasil ditambah</div>');
        redirect('pegawai_reproduksi/birahi');
    }

    public function proses_hapus_birahi($id)
    {
        $this->M_reproduksi->proses_hapus_birahi($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data birahi berhasil dihapus</div>');
        redirect('pegawai_reproduksi/birahi');
    }
}
