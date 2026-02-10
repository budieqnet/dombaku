<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboardpegawai extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function notifikasi()
    {
        $nip = $this->session->userdata('nama_lengkap');
        $query = $this->db->query("SELECT * FROM notifikasi_pegawai WHERE notifikasi_pegawai.nip='$nip' ORDER BY notifikasi_pegawai.id DESC LIMIT 5");
        return $query->result_array();
    }
}
