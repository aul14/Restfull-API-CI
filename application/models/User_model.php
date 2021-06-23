<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function insertLogin($data)
    {
        $this->db->insert('tbl_user', $data);
    }
    public function getDataUser()
    {
        return $this->db->get_where('tbl_user', ['user_nama' =>
        $this->session->userdata('user_nama')])->row_array();
    }
    public function getDataSesi()
    {

        $query = "SELECT `id_sesi`,`sesi_time`,`a`.`user_nama`id_user,`b`.`sesi_nama`sesi_status,`sesi_logout` FROM sesi INNER JOIN `tbl_user` `a` ON `a`.`id_user` = `sesi`.`id_user` 
        INNER JOIN `detail_sesi` `b` ON `b`.`sesi_status` = `sesi`.`sesi_status`";

        return $this->db->query($query)->result();
    }
}
