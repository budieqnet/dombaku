<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_dokter');
	}

    public function index()
    {
        if ($this->session->userdata('group_id') == '1')
        {
            $data['dokter'] = $this->M_dokter->dokter();
            $this->load->view('admin/header');
            $this->load->view('admin/nav', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/dokter/daftar_dokter', $data);
            $this->load->view('admin/footer');
        }
        else
        {
            redirect('admin_backend');
        }   
    }

    public function proses_tambah()
    {
        if ($this->session->userdata('group_id') == '1')
        {
            $this->M_dokter->proses_tambah();
            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">Data berhasil ditambah</div>');
            redirect('dokter');
        }
        else
        {
            redirect('admin_backend');
        }
    }

    public function proses_update()
    {
        if ($this->session->userdata('group_id') == '1')
        {
            $this->M_dokter->proses_update();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate</div>');
            redirect('dokter');
        }
        else
        {
            redirect('admin_backend');
        } 
    }

    public function hapus_data($id)
    {
        if ($this->session->userdata('group_id') == '1')
        {
            $this->M_dokter->proses_hapus($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
            redirect('dokter');
        }
        else
        {
            redirect('admin_backend');
        } 
    }
}
