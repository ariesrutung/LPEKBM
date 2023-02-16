<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_contact extends CI_Model 
{
    public function all_testimonial()
    {
        $query = $this->db->query("SELECT * FROM tbl_testimonial ORDER BY id ASC");
        return $query->result_array();
    }

    public function check_captcha()
    {
    	$query = $this->db->query("SELECT * FROM tbl_setting_captcha WHERE id=?",[1]);
        return $query->first_row('array');
    }

    public function total_captcha()
    {
    	$query = $this->db->query("SELECT * FROM tbl_captcha");
        return $query->num_rows();
    }

    public function get_particular_captcha($id)
    {
    	$query = $this->db->query("SELECT * FROM tbl_captcha WHERE captcha_id=?",[$id]);
        return $query->first_row('array');
    }
}