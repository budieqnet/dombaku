<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_kambing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_jeniskambing');
		$this->load->model('M_fitur');
	}

    public function index()
    {
        if ($this->session->userdata('group_id') == '1')
        {
            $data['jenis_kambing'] = $this->M_jeniskambing->jenis_kambing();
            $this->load->view('admin/header');
            $this->load->view('admin/nav', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/jenis_kambing/jenis_kambing', $data);
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
            $this->M_jeniskambing->proses_tambah_jenis();
            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">Data berhasil ditambah</div>');
            redirect('jenis_kambing');
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
            $this->M_jeniskambing->proses_update_jenis();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate</div>');
            redirect('jenis_kambing');
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
            $this->M_jeniskambing->proses_hapus_jenis($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
            redirect('jenis_kambing');
        }
        else
        {
            redirect('admin_backend');
        } 
    }
}
