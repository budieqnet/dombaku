<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barcode extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_jeniskambing');
		$this->load->model('M_fitur');
        $this->load->model('M_kambing');
        $this->load->model('M_reproduksi');
        $this->load->model('M_keuangan');
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            header("HTTP/1.1 200 OK");
            die();
        }
	}

    public function index()
    {
        if ($this->session->userdata('group_id') == '1')
        {
            $data['kambing'] = $this->M_kambing->daftar_kambing();
            $this->load->view('admin/header');
            $this->load->view('admin/nav');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/barcode/daftar_barcode', $data);
            $this->load->view('admin/footer');
        }
        else
        {
            redirect('admin_backend');
        }   
    }

    public function scan_barcode()
    {
        if ($this->session->userdata('group_id') == '1')
        {
            $this->load->view('admin/header');
            $this->load->view('admin/nav');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/barcode/scan_barcode');
            $this->load->view('admin/footer');
        }
        else
        {
            redirect('admin_backend');
        }
    }

    public function view_barcode()
    {
        if ($this->session->userdata('group_id') == '1')
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
        else
        {
            redirect('admin_backend');
        }
    }

    public function cetak_barcode()
    {
        if ($this->session->userdata('group_id') == '1')
        {
            $barcode = $this->input->post('barcode');
            $data_cetak_barcode['cetak_barcode'] = $this->data_cetak_barcode($barcode);
            $this->load->view('admin/barcode/cetak_barcode', $data_cetak_barcode);
        }
        else
        {
            redirect('admin_backend');
        }
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
