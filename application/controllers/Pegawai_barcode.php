<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_barcode extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        if ($this->session->userdata('group_id') != '2') {
            redirect('autentikasi');
        }
        $this->load->model('M_jeniskambing');
		$this->load->model('M_fitur');
        $this->load->model('M_kambing');
        $this->load->model('M_reproduksi');
        $this->load->model('M_keuangan');
	}

    public function index()
    {
        $data['kambing'] = $this->M_kambing->daftar_kambing();
        $this->load->view('pegawai/header');
        $this->load->view('pegawai/nav');
        $this->load->view('pegawai/sidebar');
        $this->load->view('pegawai/barcode/daftar_barcode', $data);
        $this->load->view('pegawai/footer');
    }

    public function scan_barcode()
    {
        $this->load->view('pegawai/header');
        $this->load->view('pegawai/nav');
        $this->load->view('pegawai/sidebar');
        $this->load->view('pegawai/barcode/scan_barcode');
        $this->load->view('pegawai/footer');
    }

    public function view_barcode()
    {
        $qr_data = $this->input->post('qr_data');
        if ($qr_data)
        {
            $data_kambing = $this->M_kambing->data_kambing_barcode($qr_data);
            if ($data_kambing)
            {
                $kode = $data_kambing['kode'];
                $data_kambing['pedigree'] = $this->M_reproduksi->generate_pedigree($kode);
                $data_kambing['valuation'] = $this->M_keuangan->get_valuation($kode);
                $data_kambing['cop'] = $this->M_keuangan->get_cop($kode);

                echo json_encode(['status' => 'success','data' => $data_kambing]);
            }
            else
            {
                echo json_encode(['status' => 'error', 'pesan' => "Data tidak ditemukan"]);
            }
        }
    }

    public function cetak_barcode()
    {
        $barcode = $this->input->post('barcode');
        $data_cetak_barcode['cetak_barcode'] = $this->data_cetak_barcode($barcode);
        $this->load->view('pegawai/barcode/cetak_barcode', $data_cetak_barcode);
    }

    public function data_cetak_barcode($barcode)
    {
        if (count($barcode) > 1)
        {
            $arr = [];
            foreach ($barcode as $i)
            {
                $query = $this->db->query("SELECT
                                                identitas_kambing.id AS id,
                                                identitas_kambing.kode AS kode,
                                                identitas_kambing.qr AS qr
                                            FROM identitas_kambing
                                            WHERE identitas_kambing.qr='$i'");
                array_push($arr, $query->result_array());
            }
            return $arr;
        }
        else
        {
            $arr = [];
            $query = $this->db->query("SELECT
                                            identitas_kambing.id AS id,
                                            identitas_kambing.kode AS kode,
                                            identitas_kambing.qr AS qr
                                        FROM identitas_kambing
                                        WHERE identitas_kambing.qr='$barcode[0]'");
            array_push($arr, $query->result_array());
            return $arr;
        }
    }

}
