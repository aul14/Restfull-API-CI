<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Makun extends CI_Model {

	function lihat_data()
    {
        return $this->db->get('tbl_user');
        
    }
    
    public function insertuser($data)
	{
		$this->db->insert('tbl_user', $data);

	}

	public function getuser()
	{
		return $this->db->get('tbl_user')->result_array();
    }
    public function insertLogin($data)
	{
		$this->db->insert('tbl_user', $data);
	}
	public function akun_hapus($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('tbl_user');
	}
	public function akun_edit($where,$table)
    {
        return $this->db->get_where($table,$where);
    }
    public function akun_update($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    function ambilId($table,$where)
    {
        return $this->db->get_where($table,$where);
    }
}

/* End of file ModelName.php */
