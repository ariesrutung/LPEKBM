<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_page_news extends CI_Model 
{
    function show()
    {
        $sql = "SELECT * 
                FROM tbl_page_news t1
                JOIN tbl_lang t2
                ON t1.lang_id = t2.lang_id
                ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function update($id,$data) 
    {
        $this->db->where('id',$id);
        $this->db->update('tbl_page_news',$data);
    }

    function get_page_news($id)
    {
        $query = $this->db->query("SELECT * 
                FROM tbl_page_news t1 
                JOIN tbl_lang t2 
                ON t1.lang_id = t2.lang_id 
                WHERE t1.id=?",
                [$id]
            );
        return $query->first_row('array');
    }

    function page_news_check($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_page_news');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->first_row('array');
    }
}