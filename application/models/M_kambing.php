<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kambing extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function daftar_kambing()
    {
        $query = $this->db->query("SELECT
                                        identitas_kambing.id AS id,
                                        identitas_kambing.kode AS kode,
                                        identitas_kambing.qr AS qr,
                                        identitas_kambing.jenis AS jenis,
                                        identitas_kambing.tgl_lahir AS tgl_lahir,
                                        CASE
		                                    WHEN DATEDIFF(CURDATE(), identitas_kambing.tgl_lahir) < 7 THEN CONCAT(DATEDIFF(CURDATE(), identitas_kambing.tgl_lahir), ' hari')
		                                    WHEN DATEDIFF(CURDATE(), identitas_kambing.tgl_lahir) < 30 THEN CONCAT(FLOOR(DATEDIFF(CURDATE(), identitas_kambing.tgl_lahir) / 7), ' minggu')
		                                    WHEN TIMESTAMPDIFF(MONTH, identitas_kambing.tgl_lahir, CURDATE()) < 12 THEN CONCAT(TIMESTAMPDIFF(MONTH, identitas_kambing.tgl_lahir, CURDATE()), ' bulan')
		                                    ELSE CONCAT(TIMESTAMPDIFF(YEAR, identitas_kambing.tgl_lahir, CURDATE()), ' tahun')
	                                    END AS umur,
                                        identitas_kambing.berat_lahir AS berat_lahir,
                                        identitas_kambing.jenis_kelamin AS jenis_kelamin,
                                        identitas_kambing.kode_induk_jantan AS kode_induk_jantan,
                                        identitas_kambing.kode_induk_betina AS kode_induk_betina,
                                        identitas_kambing.kondisi AS kondisi,
                                        identitas_kambing.keterangan AS keterangan,
                                        identitas_kambing.dibuat_tgl AS dibuat_tgl,
                                        identitas_kambing.dibuat_oleh AS dibuat_oleh,
                                        identitas_kambing.diedit_tgl AS diedit_tgl,
                                        identitas_kambing.diedit_oleh AS diedit_oleh
                                    FROM identitas_kambing
                                    ORDER BY identitas_kambing.id");
        return $query->result_array();
    }

    public function data_kambing_barcode($qr_code)
    {
        $query = $this->db->query("SELECT
                                        identitas_kambing.id AS id,
                                        identitas_kambing.kode AS kode,
                                        identitas_kambing.qr AS qr,
                                        identitas_kambing.jenis AS jenis,
                                        identitas_kambing.tgl_lahir AS tgl_lahir,
                                        CASE
                                                WHEN DATEDIFF(CURDATE(), identitas_kambing.tgl_lahir) < 7 THEN CONCAT(DATEDIFF(CURDATE(), identitas_kambing.tgl_lahir), ' hari')
                                                WHEN DATEDIFF(CURDATE(), identitas_kambing.tgl_lahir) < 30 THEN CONCAT(FLOOR(DATEDIFF(CURDATE(), identitas_kambing.tgl_lahir) / 7), ' minggu')
                                                WHEN TIMESTAMPDIFF(MONTH, identitas_kambing.tgl_lahir, CURDATE()) < 12 THEN CONCAT(TIMESTAMPDIFF(MONTH, identitas_kambing.tgl_lahir, CURDATE()), ' bulan')
                                                ELSE CONCAT(TIMESTAMPDIFF(YEAR, identitas_kambing.tgl_lahir, CURDATE()), ' tahun')
                                            END AS umur,
                                        identitas_kambing.berat_lahir AS berat_lahir,
                                        identitas_kambing.jenis_kelamin AS jenis_kelamin,
                                        identitas_kambing.kode_induk_jantan AS kode_induk_jantan,
                                        identitas_kambing.kode_induk_betina AS kode_induk_betina,
                                        identitas_kambing.kondisi AS kondisi,
                                        (SELECT berat FROM riwayat_pertumbuhan WHERE kode_kambing = identitas_kambing.kode ORDER BY tgl_pengukuran DESC LIMIT 1) AS berat_terakhir,
                                        (SELECT tgl_vaksin FROM riwayat_vaksin WHERE kode_kambing = identitas_kambing.kode ORDER BY tgl_vaksin DESC LIMIT 1) AS tgl_vaksin,
                                        (SELECT jenis_vaksin FROM riwayat_vaksin WHERE kode_kambing = identitas_kambing.kode ORDER BY tgl_vaksin DESC LIMIT 1) AS jenis_vaksin,
                                        (SELECT tgl_diagnosa FROM riwayat_penyakit WHERE kode_kambing = identitas_kambing.kode ORDER BY tgl_diagnosa DESC LIMIT 1) AS tgl_penyakit,
                                        (SELECT penyakit FROM riwayat_penyakit WHERE kode_kambing = identitas_kambing.kode ORDER BY tgl_diagnosa DESC LIMIT 1) AS nama_penyakit,
                                        identitas_kambing.keterangan AS keterangan
                                    FROM identitas_kambing
                                    WHERE identitas_kambing.kode = ?", array($qr_code));
        return $query->row_array();
    }

    public function proses_tambah()
    {
        $kode = $this->input->post('kode');
        $jenis = $this->input->post('jenis');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $berat_lahir = $this->input->post('berat_lahir');
        $jenis_kelamin = $this->input->post('sex');
        $kij = $this->input->post('kij');
        $kib = $this->input->post('kib');
        $kondisi = $this->input->post('kondisi');
        $keterangan = $this->input->post('keterangan');

        $this->load->library('ciqrcode');
        $config['cacheable'] = true;
        $config['cachedir'] = './dokumen_qrcode/'; 
        $config['errorlog'] = './dokumen_qrcode/';
        $config['imagedir'] = './dokumen_qrcode/';
        $config['quality'] = true;
        $config['size'] = '1024';
        $config['black'] = array(224,255,255);
        $config['white'] = array(70,130,180);
        $this->ciqrcode->initialize($config);
        $qrcode_name = $kode.'.png';
        $params['data'] = $kode;
        // $params['data'] = '        Kode : '.$kode.'
        // Jenis : '.$jenis.'
        // Tgl Lahir : '.tgl_indo($tgl_lahir).'
        // Berat Lahir : '.$berat_lahir.' Kg
        // Jenis Kelamin : '.$jenis_kelamin.'
        // Kondisi : '.$kondisi.'
        // Keterangan : '.$keterangan;
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$qrcode_name;
        $this->ciqrcode->generate($params);

        $data_kambing = [
            'id' => '',
            'kode' => $kode,
            'qr' => $qrcode_name,
            'jenis' => $jenis,
            'tgl_lahir' => $tgl_lahir,
            'berat_lahir' => $berat_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'kode_induk_jantan' => $kij,
            'kode_induk_betina' => $kib,
            'kondisi' => $kondisi,
            'keterangan' => $keterangan,
            'foto' => '',
            'path' => '',
            'dibuat_oleh' => $this->session->userdata('user'),
            'dibuat_tgl' => date('Y-m-d'),
            'diedit_oleh' => '',
            'diedit_tgl' => ''
        ];
        $this->db->insert('identitas_kambing', $data_kambing);
    }

    public function proses_update()
    {
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $jenis = $this->input->post('jenis');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $berat_lahir = $this->input->post('berat_lahir');
        $jenis_kelamin = $this->input->post('sex');
        $kij = $this->input->post('kij');
        $kib = $this->input->post('kib');
        $kondisi = $this->input->post('kondisi');
        $keterangan = $this->input->post('keterangan');
        // $dokument_qr = './dokumen_qrcode/'.$kode;
        // unlink($dokumen_qr);

        $this->load->library('ciqrcode');
        $config['cacheable'] = true;
        $config['cachedir'] = './dokumen_qrcode/'; 
        $config['errorlog'] = './dokumen_qrcode/';
        $config['imagedir'] = './dokumen_qrcode/';
        $config['quality'] = true;
        $config['size'] = '1024';
        $config['black'] = array(224,255,255);
        $config['white'] = array(70,130,180);
        $this->ciqrcode->initialize($config);
        $qrcode_name = $kode.'.png';
        $params['data'] = $kode;
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$qrcode_name;
        $this->ciqrcode->generate($params);

        $data_kambing = [
            'kode' => $kode,
            'qr' => $qrcode_name,
            'jenis' => $jenis,
            'tgl_lahir' => $tgl_lahir,
            'berat_lahir' => $berat_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'kode_induk_jantan' => $kij,
            'kode_induk_betina' => $kib,
            'kondisi' => $kondisi,
            'keterangan' => $keterangan,
            'diedit_oleh' => $this->session->userdata('user'),
            'diedit_tgl' => date('Y-m-d')
        ];
        $this->db->where('id', $id);
        $this->db->update('identitas_kambing', $data_kambing);
    }

    public function proses_hapus($id)
    {
        return $this->db->delete('identitas_kambing', ['id' => $id]);
    }

    public function cek_kode_kambing($kode)
    {
        $query = $this->db->query("SELECT identitas_kambing.kode FROM identitas_kambing WHERE identitas_kambing.kode='$kode'");
        return $query->row_array();
    }

    public function total_jantan()
    {
        $query = $this->db->query("SELECT
                                        COUNT(identitas_kambing.jenis_kelamin) AS total_jantan
                                    FROM identitas_kambing
                                    WHERE identitas_kambing.jenis_kelamin='Jantan'");
        return $query->row_array();
    }

    public function total_betina()
    {
        $query = $this->db->query("SELECT
                                        COUNT(identitas_kambing.jenis_kelamin) AS total_betina
                                    FROM identitas_kambing
                                    WHERE identitas_kambing.jenis_kelamin='Betina'");
        return $query->row_array();
    }

    public function statistik_usia()
    {
        $query = $this->db->query("SELECT
                                        SUM(CASE WHEN  DATEDIFF(CURDATE(), identitas_kambing.tgl_lahir) <= 90 THEN 1 ELSE 0 END) AS usia_anak,
                                        SUM(CASE WHEN  DATEDIFF(CURDATE(), identitas_kambing.tgl_lahir) >= 90 AND DATEDIFF(CURDATE(), identitas_kambing.tgl_lahir) <= 180 THEN 1 ELSE 0 END) AS usia_remaja,
                                        SUM(CASE WHEN  DATEDIFF(CURDATE(), identitas_kambing.tgl_lahir) >= 180 AND DATEDIFF(CURDATE(), identitas_kambing.tgl_lahir) <= 365 THEN 1 ELSE 0 END) AS usia_muda,
                                        SUM(CASE WHEN  DATEDIFF(CURDATE(), identitas_kambing.tgl_lahir) >= 365 THEN 1 ELSE 0 END) AS usia_dewasa
                                    FROM identitas_kambing");
        return $query->row_array();
    }

    public function statistik_kondisi()
    {
        $query = $this->db->query("SELECT
                                         SUM(CASE WHEN identitas_kambing.kondisi='Sehat'  THEN 1 ELSE 0 END) AS sehat,
                                         SUM(CASE WHEN identitas_kambing.kondisi='Sakit'  THEN 1 ELSE 0 END) AS sakit
                                     FROM identitas_kambing");
        return $query->row_array();
    }

    // --- ADG (Average Daily Gain) Logic ---

    public function get_adg_report()
    {
        // Ambil data kambing beserta berat lahir dan berat terakhir
        $query = $this->db->query("SELECT 
                                        k.kode, k.jenis, k.tgl_lahir, k.berat_lahir,
                                        p.berat as berat_terakhir, p.tgl_pengukuran,
                                        DATEDIFF(p.tgl_pengukuran, k.tgl_lahir) as hari_hidup,
                                        (p.berat - k.berat_lahir) as kenaikan_berat,
                                        ((p.berat - k.berat_lahir) / NULLIF(DATEDIFF(p.tgl_pengukuran, k.tgl_lahir), 0)) as adg
                                    FROM identitas_kambing k
                                    LEFT JOIN (
                                        SELECT kode_kambing, berat, tgl_pengukuran
                                        FROM riwayat_pertumbuhan
                                        WHERE id IN (
                                            SELECT MAX(id) FROM riwayat_pertumbuhan GROUP BY kode_kambing
                                        )
                                    ) p ON k.kode = p.kode_kambing
                                    ORDER BY adg DESC");
        return $query->result_array();
    }

    public function get_slow_growth_sheep($threshold = 0.1)
    {
        $all_adg = $this->get_adg_report();
        $slow_growth = array_filter($all_adg, function($item) use ($threshold) {
            return $item['adg'] < $threshold;
        });
        return array_values($slow_growth);
    }
}
