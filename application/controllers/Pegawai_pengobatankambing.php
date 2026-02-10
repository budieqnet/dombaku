<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_pengobatankambing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        if ($this->session->userdata('group_id') != '2') {
            redirect('autentikasi');
        }
        $this->load->model('M_penyakit');
        $this->load->model('M_pengobatan');
		$this->load->model('M_dokter');
        $this->load->model('M_fitur');
        $this->load->model('M_kambing');
	}

    public function index()
    {
        $data['riwayat_penyakit'] = $this->M_penyakit->daftar_penyakit();
        $data['riwayat_pengobatan'] = $this->M_pengobatan->daftar_pengobatan();
        $data['dokter'] = $this->M_dokter->dokter();
        $this->load->view('pegawai/header');
        $this->load->view('pegawai/nav');
        $this->load->view('pegawai/sidebar');
        $this->load->view('pegawai/riwayat_pengobatan/daftar_riwayat_pengobatan', $data);
        $this->load->view('pegawai/footer');
    }

    public function riwayat_pengobatan($id_riwayat_sakit)
    {
        $data['kondisi_kambing'] = $this->M_fitur->kondisi_kambing();
        $data['riwayat_penyakit_ternak'] = $this->M_penyakit->riwayat_sakit($id_riwayat_sakit);
        $data['riwayat_pengobatan_ternak'] = $this->M_pengobatan->riwayat_pengobatan_ternak($id_riwayat_sakit);
        $data['dokter'] = $this->M_dokter->dokter();
        $this->load->view('pegawai/header');
        $this->load->view('pegawai/nav');
        $this->load->view('pegawai/sidebar');
        $this->load->view('pegawai/riwayat_pengobatan/riwayat_pengobatan_ternak', $data);
        $this->load->view('pegawai/footer');
    }

    public function proses_tambah($id_riwayat_sakit)
    {
        $this->M_pengobatan->proses_tambah();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">Data berhasil ditambah</div>');
        redirect('pegawai_pengobatankambing/riwayat_pengobatan/'.$id_riwayat_sakit);
    }

    public function proses_update($id_riwayat_sakit)
    {
        $this->M_pengobatan->proses_update();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate</div>');
        redirect('pegawai_pengobatankambing/riwayat_pengobatan/'.$id_riwayat_sakit);
    }

    public function hapus_data($id_pengobatan, $id_riwayat_sakit)
    {
        $this->M_pengobatan->proses_hapus($id_pengobatan);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('pegawai_pengobatankambing/riwayat_pengobatan/'.$id_riwayat_sakit);
    }

    public function qrcode_riwayat_pengobatan($id_riwayat_sakit)
    {
        $data['kondisi_kambing'] = $this->M_fitur->kondisi_kambing();
        $data['riwayat_penyakit_ternak'] = $this->M_penyakit->riwayat_sakit($id_riwayat_sakit);
        $data['riwayat_pengobatan_ternak'] = $this->M_pengobatan->riwayat_pengobatan_ternak($id_riwayat_sakit);
        $data['dokter'] = $this->M_dokter->dokter();
        $this->load->view('pegawai/header');
        $this->load->view('pegawai/nav');
        $this->load->view('pegawai/sidebar');
        $this->load->view('pegawai/riwayat_pengobatan/qrcode_riwayat_pengobatan_ternak', $data);
        $this->load->view('pegawai/footer');
    }

    public function qrcode_tambah($id_riwayat_sakit)
    {
        $this->M_pengobatan->proses_tambah();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">Data berhasil ditambah</div>');
        redirect('pegawai_pengobatankambing/qrcode_riwayat_pengobatan/'.$id_riwayat_sakit);
    }

    public function qrcode_update($id_riwayat_sakit)
    {
        $this->M_pengobatan->proses_update();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate</div>');
        redirect('pegawai_pengobatankambing/qrcode_riwayat_pengobatan/'.$id_riwayat_sakit);
    }

    public function qrcode_hapus($id_pengobatan, $id_riwayat_sakit)
    {
        $this->M_pengobatan->proses_hapus($id_pengobatan);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('pegawai_pengobatankambing/qrcode_riwayat_pengobatan/'.$id_riwayat_sakit);
    }
}
