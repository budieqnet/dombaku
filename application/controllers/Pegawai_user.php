<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_user extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        if ($this->session->userdata('group_id') != '2') {
            redirect('autentikasi');
        }
		$this->load->model('M_fitur');
        $this->load->model('M_user');
	}

    public function profile_user($id)
    {
        $data['group'] = $this->M_fitur->group_user();
        $data['profile_user'] = $this->M_user->profile_user($id);
        $this->load->view('pegawai/header');
        $this->load->view('pegawai/nav');
        $this->load->view('pegawai/sidebar');
        $this->load->view('pegawai/user/profile_user', $data);
        $this->load->view('pegawai/footer');
    }

    public function proses_update_user()
    {
        $this->M_user->proses_update_user();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diupdate</div>');
        redirect('pegawai_user/daftar_user');
    }

    public function proses_update_profil()
    {
        $this->M_user->proses_update_profil();
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">Data berhasil diupdate</div>');
        redirect('pegawai_user/profile_user/'.$this->session->userdata('user_id'));
    }

    public function ganti_password($id)
    {
        $data['profile_user'] = $this->M_user->profile_user($id);
        $this->load->view('pegawai/header');
        $this->load->view('pegawai/nav');
        $this->load->view('pegawai/sidebar');
        $this->load->view('pegawai/user/ganti_password', $data);
        $this->load->view('pegawai/footer');
    }

    public function proses_ganti_password()
    {
        $this->M_user->proses_ganti_password();
        redirect('autentikasi/logout_password');
    }
}
