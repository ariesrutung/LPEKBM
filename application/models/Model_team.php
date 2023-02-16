<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_team extends CI_Model 
{
    public function all_team_member()
    {
        $query = $this->db->query("SELECT * FROM tbl_team_member WHERE lang_id=? ORDER BY id ASC", [$_SESSION['sess_lang_id']]);
        return $query->result_array();
    }

    public function team_member_check($id) {
        $sql = 'SELECT * FROM tbl_team_member WHERE id=?';
        $query = $this->db->query($sql,array($id));
        return $query->num_rows();
    }

    public function team_member_detail($id) {
        $sql = 'SELECT * FROM tbl_team_member WHERE id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
}