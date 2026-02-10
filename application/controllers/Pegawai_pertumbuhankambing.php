<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_pertumbuhankambing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        if ($this->session->userdata('group_id') != '2') {
            redirect('autentikasi');
        }
        $this->load->model('M_pertumbuhan');
		$this->load->model('M_dokter');
        $this->load->model('M_kambing');
	}

    public function index()
    {
        $data['kambing'] = $this->M_kambing->daftar_kambing();
        $data['riwayat_pertumbuhan'] = $this->M_pertumbuhan->daftar_pertumbuhan();
        $this->load->view('pegawai/header');
        $this->load->view('pegawai/nav');
        $this->load->view('pegawai/sidebar');
        $this->load->view('pegawai/riwayat_pertumbuhan/daftar_riwayat_pertumbuhan', $data);
        $this->load->view('pegawai/footer');
    }

    public function proses_tambah()
    {
        $this->M_pertumbuhan->proses_tambah();
        $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert">Data berhasil ditambah</div>');
        redirect('pegawai_pertumbuhankambing');
    }

    public function proses_update()
    {
        $this->M_pertumbuhan->proses_update();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate</div>');
        redirect('pegawai_pertumbuhankambing');
    }

    public function hapus_data($id)
    {
        $this->M_pertumbuhan->proses_hapus($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('pegawai_pertumbuhankambing');
    }

    public function qrcode_pertumbuhan($kode_ternak)
    {
        $data['kode_ternak'] = $kode_ternak;
        $data['riwayat_pertumbuhan'] = $this->M_pertumbuhan->data_pertumbuhan_ternak($kode_ternak);
        $this->load->view('pegawai/header');
        $this->load->view('pegawai/nav');
        $this->load->view('pegawai/sidebar');
        $this->load->view('pegawai/riwayat_pertumbuhan/data_pertumbuhan_ternak', $data);
        $this->load->view('pegawai/footer');
    }

    public function qrcode_tambah($kode_ternak)
    {
        $this->M_pertumbuhan->proses_tambah();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">Data berhasil ditambah</div>');
        redirect('pegawai_pertumbuhankambing/qrcode_pertumbuhan/'.$kode_ternak);
    }

    public function qrcode_update($kode_ternak)
    {
        $this->M_pertumbuhan->proses_update();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate</div>');
        redirect('pegawai_pertumbuhankambing/qrcode_pertumbuhan/'.$kode_ternak);
    }

    public function qrcode_hapus($id, $kode_ternak)
    {
        $this->M_pertumbuhan->proses_hapus($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('pegawai_pertumbuhankambing/qrcode_pertumbuhan/'.$kode_ternak);
    }
}
