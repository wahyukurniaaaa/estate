<?php

class Login_model extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function jumlah_row()
    {
        return $this->db->get("tbl_admin")->num_rows();
    }
}
