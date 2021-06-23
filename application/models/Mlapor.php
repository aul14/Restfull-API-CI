<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mlapor extends CI_Model
{

    function lihat_data()
    {
        return $this->db->get('tbl_pengaduan');
    }

    public function insertpengaduan($data)
    {
        $this->db->insert('tbl_pengaduan', $data);
    }

    public function getpengaduan()
    {
        return $this->db->get('tbl_pengaduan')->result_array();
    }

    public function pengaduan_hapus($id)
    {
        $this->db->where('id_pengaduan', $id);
        $this->db->delete('tbl_pengaduan');
    }
    public function insertTanggapan($data)
    {
        $this->db->insert('tbl_tanggapan', $data);
        $this->db->where('id_pengaduan', $data['id_pengaduan']);
    }
    public function pengaduan_edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function pengaduan_update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function ambilId($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    public function detailTanggapan()
    {
        $query = "SELECT judul_pengaduan,isi_pengaduan,lokasi_pengaduan,tanggal_pengaduan,tanggal_tanggapan,nama_menanggapi,user_nama,isi_tanggapan from tbl_pengaduan,tbl_tanggapan,tbl_user where tbl_tanggapan.id_pengaduan = tbl_pengaduan.id_pengaduan and tbl_pengaduan.id_user = tbl_user.id_user";

        return $this->db->query($query)->result();
    }
    public function hitungAdmin($id = 1)
    {

        $this->db->select('tbl_user.id_status, COUNT(tbl_user.id_status) as total');
        $this->db->where('id_status', $id);
        $query = $this->db->get('tbl_user');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
    public function hitungUser($id = 2)
    {

        $this->db->select('tbl_user.id_status, COUNT(tbl_user.id_status) as total');
        $this->db->where('id_status', $id);
        $query = $this->db->get('tbl_user');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
}

/* End of file ModelName.php */
