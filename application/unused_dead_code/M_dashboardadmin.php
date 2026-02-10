<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboardadmin extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

	public function total_perkara_satker_masuk_bulan_ini_g()
    {
        $periode = date("Y-m");
        $query = $this->db->query("SELECT COUNT(*) AS total FROM satker_perkara WHERE LEFT(satker_perkara.tanggal_pendaftaran, 7) = '$periode' AND satker_perkara.alur_perkara_id='15'");
        return $query->row_array();
    }

    public function total_perkara_satker_masuk_bulan_ini_p()
    {
        $periode = date("Y-m");
        $query = $this->db->query("SELECT COUNT(*) AS total FROM satker_perkara WHERE LEFT(satker_perkara.tanggal_pendaftaran, 7) = '$periode' AND satker_perkara.alur_perkara_id='16'");
        return $query->row_array();
    }

    public function total_perkara_satker_putus_bulan_ini_g()
    {
        
        $periode = date("Y-m");
        $query = $this->db->query("SELECT COUNT(*) AS total FROM satker_perkara WHERE LEFT(satker_perkara.tanggal_putusan, 7) = '$periode' AND satker_perkara.alur_perkara_id='15'");
        return $query->row_array();
    }

    public function total_perkara_satker_putus_bulan_ini_p()
    {
        
        $periode = date("Y-m");
        $query = $this->db->query("SELECT COUNT(*) AS total FROM satker_perkara WHERE LEFT(satker_perkara.tanggal_putusan, 7) = '$periode' AND satker_perkara.alur_perkara_id='16'");
        return $query->row_array();
    }

    public function total_perkara_satker_terima_tahun_ini_g()
    {
        $periode = date("Y");
        $query = $this->db->query("SELECT
                                        MONTH(satker_perkara.tanggal_pendaftaran) AS bulan_pendaftaran,
                                        COUNT(MONTH(satker_perkara.tanggal_pendaftaran)) AS total_terima_g
                                    FROM satker_perkara
                                    WHERE YEAR(satker_perkara.tanggal_pendaftaran) = '$periode' AND satker_perkara.alur_perkara_id = '15'
                                    GROUP BY MONTH(satker_perkara.tanggal_pendaftaran)");
        return $query->row_array();   
    }

    public function total_perkara_satker_terima_tahun_ini_p()
    {
        $periode = date("Y");
        $query = $this->db->query("SELECT
                                        MONTH(satker_perkara.tanggal_pendaftaran) AS bulan_pendaftaran,
                                        COUNT(MONTH(satker_perkara.tanggal_pendaftaran)) AS total_terima_p
                                    FROM satker_perkara
                                    WHERE YEAR(satker_perkara.tanggal_pendaftaran) = '$periode' AND satker_perkara.alur_perkara_id = '16'
                                    GROUP BY MONTH(satker_perkara.tanggal_pendaftaran)");
        return $query->row_array();   
    }

    public function total_perkara_satker_putus_tahun_ini_g()
    {
        $periode = date("Y");
        $query = $this->db->query("SELECT
                                        MONTH(satker_perkara.tanggal_putusan) AS bulan_putusan,
                                        COUNT(MONTH(satker_perkara.tanggal_putusan)) AS total_putusan_g
                                    FROM satker_perkara
                                    WHERE YEAR(satker_perkara.tanggal_putusan) = '$periode' AND YEAR(satker_perkara.tanggal_pendaftaran) = '$periode' AND satker_perkara.alur_perkara_id = '15'
                                    GROUP BY MONTH(satker_perkara.tanggal_putusan)");
        return $query->row_array();
    }

    public function total_perkara_satker_putus_tahun_ini_p()
    {
        $periode = date("Y");
        $query = $this->db->query("SELECT
                                        MONTH(satker_perkara.tanggal_putusan) AS bulan_putusan,
                                        COUNT(MONTH(satker_perkara.tanggal_putusan)) AS total_putusan_p
                                    FROM satker_perkara
                                    WHERE YEAR(satker_perkara.tanggal_putusan) = '$periode' AND YEAR(satker_perkara.tanggal_pendaftaran) = '$periode' AND satker_perkara.alur_perkara_id = '16'
                                    GROUP BY MONTH(satker_perkara.tanggal_putusan)");
        return $query->row_array();
    }

    public function total_perkara_satker_jenis_perkara_bulan_ini()
    {
        $periode = date("Y-m");
        $query = $this->db->query("SELECT
                                        satker_perkara.kode_perkara AS kode_perkara,
                                        satker_perkara.nama_perkara AS nama_perkara,
                                        COUNT(satker_perkara.tanggal_pendaftaran) AS jumlah_perkara
                                    FROM satker_perkara
                                    WHERE LEFT(satker_perkara.tanggal_pendaftaran, 7) = '$periode'
                                    GROUP BY satker_perkara.nama_perkara");
        return $query->result_array();
    }

    public function statistik_perkara_satker_bulan_ini()
    {
        $periode = date("Y-m");
        $query = $this->db->query("SELECT
                                        SUM(CASE WHEN LEFT(satker_perkara.tanggal_pendaftaran, 7)='$periode' AND satker_perkara.kode_perkara='347' THEN 1 ELSE 0 END) AS cerai_gugat,
                                        SUM(CASE WHEN LEFT(satker_perkara.tanggal_pendaftaran, 7)='$periode' AND satker_perkara.kode_perkara='346' THEN 1 ELSE 0 END) AS cerai_talak,
                                        SUM(CASE WHEN LEFT(satker_perkara.tanggal_pendaftaran, 7)='$periode' AND satker_perkara.kode_perkara='348' THEN 1 ELSE 0 END) AS harta_bersama,
                                        SUM(CASE WHEN LEFT(satker_perkara.tanggal_pendaftaran, 7)='$periode' AND satker_perkara.kode_perkara='364' THEN 1 ELSE 0 END) AS kewarisan,
                                        SUM(CASE WHEN LEFT(satker_perkara.tanggal_pendaftaran, 7)='$periode' AND satker_perkara.kode_perkara='371' THEN 1 ELSE 0 END) AS paw
                                    FROM satker_perkara
    ");
        return $query->row_array();
    }

    public function notifikasi()
    {
        $query = $this->db->query("SELECT * FROM notifikasi_admin ORDER BY notifikasi_admin.id DESC LIMIT 5");
        return $query->result_array();
    }
}
