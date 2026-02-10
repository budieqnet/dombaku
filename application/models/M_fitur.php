<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_fitur extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

	public function group_user()
    {
        $query = $this->db->query("SELECT * FROM group_user ORDER BY group_user.id");
        return $query->result_array();
    }

    public function sex_kambing()
    {
        $query = $this->db->query("SELECT * FROM sex_kambing ORDER BY id");
        return $query->result_array();
    }

    public function kondisi_kambing()
    {
        $query = $this->db->query("SELECT * FROM kondisi_kambing ORDER BY kondisi_kambing.id");
        return $query->result_array();
    }
}
