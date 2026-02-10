<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_vaksinkambing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        if ($this->session->userdata('group_id') != '2') {
            redirect('autentikasi');
        }
        $this->load->model('M_jenisvaksin');
        $this->load->model('M_vaksin');
		$this->load->model('M_dokter');
        $this->load->model('M_kambing');
	}

    public function index()
    {
        $data['jenis_vaksin'] = $this->M_jenisvaksin->jenis_vaksin();
        $data['kambing'] = $this->M_kambing->daftar_kambing();
        $data['riwayat_vaksin'] = $this->M_vaksin->daftar_vaksin();
        $data['dokter'] = $this->M_dokter->dokter();
        $this->load->view('pegawai/header');
        $this->load->view('pegawai/nav');
        $this->load->view('pegawai/sidebar');
        $this->load->view('pegawai/riwayat_vaksin/daftar_riwayat_vaksin', $data);
        $this->load->view('pegawai/footer');
    }

    public function proses_tambah()
    {
        $this->M_vaksin->proses_tambah();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">Data berhasil ditambah</div>');
        redirect('pegawai_vaksinkambing');
    }

    public function proses_update()
    {
        $this->M_vaksin->proses_update();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate</div>');
        redirect('pegawai_vaksinkambing');
    }

    public function hapus_data($id)
    {
        $this->M_vaksin->proses_hapus($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('pegawai_vaksinkambing');
    }

    public function qrcode_vaksin($kode_ternak)
    {
        $data['kode_ternak'] = $kode_ternak;
        $data['jenis_vaksin'] = $this->M_jenisvaksin->jenis_vaksin();
        $data['riwayat_vaksin'] = $this->M_vaksin->data_vaksin_ternak($kode_ternak);
        $data['dokter'] = $this->M_dokter->dokter();
        $this->load->view('pegawai/header');
        $this->load->view('pegawai/nav');
        $this->load->view('pegawai/sidebar');
        $this->load->view('pegawai/riwayat_vaksin/data_vaksin_ternak', $data);
        $this->load->view('pegawai/footer');
    }

    public function qrcode_tambah($kode_ternak)
    {
        $this->M_vaksin->proses_tambah();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">Data berhasil ditambah</div>');
        redirect('pegawai_vaksinkambing/qrcode_vaksin/'.$kode_ternak);
    }

    public function qrcode_update($kode_ternak)
    {
        $this->M_vaksin->proses_update();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate</div>');
        redirect('pegawai_vaksinkambing/qrcode_vaksin/'.$kode_ternak);
    }

    public function qrcode_hapus($id, $kode_ternak)
    {
        $this->M_vaksin->proses_hapus($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('pegawai_vaksinkambing/qrcode_vaksin/'.$kode_ternak);
    }
}
