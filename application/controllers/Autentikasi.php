<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_fitur');
        $this->load->model('M_user');
	}

    public function index()
    {
        if ($this->session->userdata('status') == 'login' &&  $this->session->userdata('group_id') == '1')
        {
            redirect('admin_backend');
        }
        else if ($this->session->userdata('status') == 'login' && $this->session->userdata('group_id') == '2')
        {
            redirect('pegawai_backend');
        }
        else
        {
            $this->load->view('autentikasi/login');
        }
    }

    public function proses_login()
    {
        $username = $this->input->post('user', TRUE);
        $password = md5($this->input->post('pass', TRUE));
        $cek_user = $this->M_user->proses_login($username, $password);
        if ($cek_user)
        {
            if ($cek_user['group_id'] == '1')
            {
                $session_user = [
                    'user_id' => $cek_user['id'],
                    'nama_lengkap' => $cek_user['nama_lengkap'],
                    'user' => $cek_user['user'],
                    'group_id' => $cek_user['group_id'],
                    'dibuat_oleh' => $cek_user['dibuat_oleh'],
                    'status' => 'login'
                ];
                $this->session->set_userdata($session_user);
                redirect('admin_backend/dashboard');
            }
            else
            {
                $session_user = [
                    'user_id' => $cek_user['id'],
                    'nama_lengkap' => $cek_user['nama_lengkap'],
                    'user' => $cek_user['user'],
                    'group_id' => $cek_user['group_id'],
                    'dibuat_oleh' => $cek_user['dibuat_oleh'],
                    'status' => 'login'
                ];
                $this->session->set_userdata($session_user);
                redirect('pegawai_backend/dashboard');
            }
        }
        else
        {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username atau Password Salah</div>');
            redirect('autentikasi');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('nama_lengkap');
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('group_id');
        $this->session->unset_userdata('dibuat_oleh');
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">Anda sudah logout</div>');
        redirect('autentikasi');
    }

    public function logout_password()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('nama_lengkap');
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('group_id');
        $this->session->unset_userdata('dibuat_oleh');
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">Kata kunci berhasil diupdate, silahkan masuk kembali dengan kata kunci yang baru</div>');
        redirect('autentikasi');
    }
}
