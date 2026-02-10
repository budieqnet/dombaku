<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_vaksin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_jenisvaksin');
		$this->load->model('M_fitur');
	}

    public function index()
    {
        if ($this->session->userdata('group_id') == '1')
        {
            $data['jenis_vaksin'] = $this->M_jenisvaksin->jenis_vaksin();
            $this->load->view('admin/header');
            $this->load->view('admin/nav', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/jenis_vaksin/jenis_vaksin', $data);
            $this->load->view('admin/footer');
        }
        else
        {
            redirect('admin_backend');
        }   
    }

    public function proses_tambah_jenis()
    {
        if ($this->session->userdata('group_id') == '1')
        {
            $this->M_jenisvaksin->proses_tambah_jenis();
            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">Data berhasil ditambah</div>');
            redirect('jenis_vaksin');
        }
        else
        {
            redirect('admin_backend');
        }
    }

    public function proses_update_jenis()
    {
        if ($this->session->userdata('group_id') == '1')
        {
            $this->M_jenisvaksin->proses_update_jenis();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate</div>');
            redirect('jenis_vaksin');
        }
        else
        {
            redirect('admin_backend');
        } 
    }

    public function hapus_jenis($id)
    {
        if ($this->session->userdata('group_id') == '1')
        {
            $this->M_jenisvaksin->proses_hapus_jenis($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
            redirect('jenis_vaksin');
        }
        else
        {
            redirect('admin_backend');
        } 
    }
}
