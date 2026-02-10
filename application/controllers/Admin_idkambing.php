<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_idkambing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        if ($this->session->userdata('group_id') != '1') {
            redirect('autentikasi');
        }
        $this->load->model('M_jeniskambing');
		$this->load->model('M_fitur');
        $this->load->model('M_kambing');
	}

    public function index()
    {
        $data['kondisi_kambing'] = $this->M_fitur->kondisi_kambing();
        $data['kelamin_kambing'] = $this->M_fitur->sex_kambing();
        $data['jenis_kambing'] = $this->M_jeniskambing->jenis_kambing();
        $data['kambing'] = $this->M_kambing->daftar_kambing();
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/kambing/daftar_kambing', $data);
        $this->load->view('admin/footer');
    }

    public function proses_tambah()
    {
        $this->M_kambing->proses_tambah();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">Data berhasil ditambah</div>');
        redirect('admin_idkambing');
    }

    public function proses_update()
    {
        $this->M_kambing->proses_update();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate</div>');
        redirect('admin_idkambing');
    }

    public function hapus_kambing($id)
    {
        $this->M_kambing->proses_hapus($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('admin_idkambing');
    }

    public function cek_kode_kambing()
    {
        $kode = $_GET['kode'];
        if ($kode)
        {
            $hasil = $this->M_kambing->cek_kode_kambing($kode);
            if ($hasil)
            {
                echo "Kode sudah ada";
            }
        }
        return $hasil;
    }
}
