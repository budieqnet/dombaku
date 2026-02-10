<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_backend extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('group_id') != '1') {
            redirect('autentikasi');
        }
        $this->load->model('M_fitur');
        $this->load->model('M_user');
        $this->load->model('M_kambing');
    }

	public function index()
	{
        redirect('admin_backend/dashboard');
	}

    public function dashboard()
    {
        $data['statistik_usia'] = $this->M_kambing->statistik_usia();
        $data['statistik_kondisi'] = $this->M_kambing->statistik_kondisi();
        $data['total_jantan'] = $this->M_kambing->total_jantan();
        $data['total_betina'] = $this->M_kambing->total_betina();
        $data['adg_report'] = $this->M_kambing->get_adg_report();
        $data['slow_growth'] = $this->M_kambing->get_slow_growth_sheep(0.1);
        $this->load->view('admin/header');
        $this->load->view('admin/nav');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/konten', $data);
        $this->load->view('admin/footer');
    }
}
