<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

	public function proses_login($username, $password)
    {
        $query = $this->db->query("SELECT * FROM user WHERE user.user=".$this->db->escape($username)." AND user.pass=".$this->db->escape($password));
        return ($query->num_rows() > 0) ? $query->row_array() : false;
    }

    public function profile_user($id)
    {
        $query = $this->db->query("SELECT * FROM user WHERE user.id='$id'");
        return $query->row_array();
    }

    public function daftar_user()
    {
        $query = $this->db->query("SELECT
	                                    user.id AS id,
                                        user.nama_lengkap AS nama_lengkap,
                                        user.user AS user,
                                        user.pass AS password,
                                        user.group_id AS group_id,
                                        (SELECT group_user.nama  FROM group_user WHERE user.group_id=group_user.id) AS group_nama,
                                        user.dibuat_tgl AS tgl_dibuat,
                                        user.dibuat_oleh AS dibuat_oleh
                                    FROM user WHERE user.group_id='1'
                                    UNION ALL
                                    SELECT
                                        user.id AS id,
                                        user.nama_lengkap AS nama_lengkap,
                                        user.user AS user,
                                        user.pass AS pass,
                                        user.group_id AS group_id,
                                        (SELECT group_user.nama  FROM group_user WHERE user.group_id=group_user.id) AS group_nama,
                                        user.dibuat_tgl AS tgl_dibuat,
                                        user.dibuat_oleh AS dibuat_oleh
                                    FROM user WHERE user.group_id='2'");
        return $query->result_array();
    }

    public function proses_tambah_user()
    {
        $nama_lengkap = $this->input->post('nama_lengkap');
        $user = $this->input->post('user');
        $group = $this->input->post('group');
        $data_user = [
            'id' => '',
            'nama_lengkap' => $nama_lengkap,
            'user' => $user,
            'pass' => md5('123'),
            'group_id' => $group,
            'dibuat_tgl' => date('Y-m-d'),
            'dibuat_oleh' => $this->session->userdata('user')
        ];
        $this->db->insert('user', $data_user);
    }

    public function proses_update_user()
    {
        $id = $this->input->post('id');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $user = $this->input->post('user');
        $data_user = [
            'nama_lengkap' => $nama_lengkap,
            'user' => $user
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data_user);
    }

    public function proses_update_profil()
    {
        $id = $this->input->post('id');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $user = $this->input->post('user');
        $data_user = [
            'nama_lengkap' => $nama_lengkap,
            'user' => $user
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data_user);
    }

    public function proses_ganti_password()
    {
        $id = $this->input->post('id');
        $pass_baru = md5($this->input->post('pass_baru'));
        $data_user = [
            'pass' => $pass_baru,
            'dibuat_tgl' => date('Y-m-d')
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data_user);
    }

    public function proses_hapus_user($id)
    {
        return $this->db->delete('user', ['id' => $id]);
    }

    public function cek_user($user)
    {
        $query = $this->db->query("SELECT user.user FROM user WHERE user.user='$user'");
        return $query->row_array();
    }
}
