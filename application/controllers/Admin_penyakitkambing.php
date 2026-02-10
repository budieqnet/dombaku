<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_penyakitkambing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        if ($this->session->userdata('group_id') != '1') {
            redirect('autentikasi');
        }
        $this->load->model('M_penyakit');
		$this->load->model('M_dokter');
        $this->load->model('M_kambing');
	}

    public function index()
    {
        $data['kambing'] = $this->M_kambing->daftar_kambing();
        $data['riwayat_penyakit'] = $this->M_penyakit->daftar_penyakit();
        $data['dokter'] = $this->M_dokter->dokter();
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/riwayat_penyakit/daftar_riwayat_penyakit', $data);
        $this->load->view('admin/footer');
    }

    public function proses_tambah()
    {
        $this->M_penyakit->proses_tambah();
        $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert">Data berhasil ditambah</div>');
        redirect('admin_penyakitkambing');
    }

    public function proses_update()
    {
        $this->M_penyakit->proses_update();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate</div>');
        redirect('admin_penyakitkambing');
    }

    public function hapus_data($id, $kode_kambing)
    {
        $this->M_penyakit->proses_hapus($id, $kode_kambing);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('admin_penyakitkambing');
    }

    public function update_kondisi($id, $kode_ternak)
    {
        $this->M_penyakit->update_kondisi($id, $kode_ternak);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate</div>');
        redirect('admin_pengobatankambing/riwayat_pengobatan/'.$id);
    }

    public function qrcode_penyakit($kode_ternak)
    {
        $data['kode_ternak'] = $kode_ternak;
        $data['riwayat_penyakit'] = $this->M_penyakit->data_penyakit_ternak($kode_ternak);
        $data['dokter'] = $this->M_dokter->dokter();
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/riwayat_penyakit/data_penyakit_ternak', $data);
        $this->load->view('admin/footer');
    }

    public function qrcode_tambah($kode_ternak)
    {
        $this->M_penyakit->proses_tambah();
        $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert">Data berhasil ditambah</div>');
        redirect('admin_penyakitkambing/qrcode_penyakit/'.$kode_ternak);
    }

    public function qrcode_update($kode_ternak)
    {
        $this->M_penyakit->proses_update();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate</div>');
        redirect('admin_penyakitkambing/qrcode_penyakit/'.$kode_ternak);
    }

    public function qrcode_hapus($id, $kode_ternak)
    {
        $this->M_penyakit->proses_hapus($id, $kode_ternak);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('admin_penyakitkambing/qrcode_penyakit/'.$kode_ternak);
    }

    public function qrcode_update_kondisi($id, $kode_ternak)
    {
        $this->M_penyakit->update_kondisi($id, $kode_ternak);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate</div>');
        redirect('admin_pengobatankambing/qrcode_riwayat_pengobatan/'.$id);
    }
}
