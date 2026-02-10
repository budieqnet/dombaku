<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_user extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        if ($this->session->userdata('group_id') != '1') {
            redirect('autentikasi');
        }
		$this->load->model('M_fitur');
        $this->load->model('M_user');
	}

    public function daftar_user()
    {
        $data['group'] = $this->M_fitur->group_user();
        $data['daftar_user'] = $this->M_user->daftar_user();
        $this->load->view('admin/header');
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/user/daftar_user', $data);
        $this->load->view('admin/footer');
    }

    public function proses_tambah_user()
    {
        $this->M_user->proses_tambah_user();
        $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert">Data berhasil ditambah</div>');
        redirect('admin_user/daftar_user');
    }

    public function profile_user($id)
    {
        $data['group'] = $this->M_fitur->group_user();
        $data['profile_user'] = $this->M_user->profile_user($id);
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/user/profile_user', $data);
        $this->load->view('admin/footer');
    }

    public function proses_update_user()
    {
        $this->M_user->proses_update_user();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate</div>');
        redirect('admin_user/daftar_user');
    }

    public function proses_update_profil()
    {
        $this->M_user->proses_update_profil();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">Data berhasil diupdate</div>');
        redirect('admin_user/profile_user/'.$this->session->userdata('user_id'));
    }

    public function ganti_password($id)
    {
        $data['profile_user'] = $this->M_user->profile_user($id);
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/user/ganti_password', $data);
        $this->load->view('admin/footer');
    }

    public function proses_ganti_password()
    {
        $this->M_user->proses_ganti_password();
        redirect('autentikasi/logout_password');
    }

    public function hapus_user($id)
    {
        $this->M_user->proses_hapus_user($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('admin_user/daftar_user');
    }

    public function cek_user()
    {
        $user = $_GET['user'];
        if ($user)
        {
            $hasil = $this->M_user->cek_user($user);
            if ($hasil)
            {
                echo "User sudah ada";
            }
        }
        return $hasil;
    }
}
