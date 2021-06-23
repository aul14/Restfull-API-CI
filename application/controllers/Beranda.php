<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $this->load->helper(array('url', 'form'));
        $this->load->model('Makun');
        $this->load->model('Mlapor');
        $this->load->library('session');

        if (!$_SESSION['useremail']) {
            $this->session->set_flashdata('notifLogin', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;&nbsp;&nbsp;</span>
                </button>
                <strong>Gagal!</strong> Silahkan Login Terlebih Dahulu.
                </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['admin'] = $this->Mlapor->hitungAdmin();
        $data['user'] = $this->Mlapor->hitungUser();
        $this->load->view('partisi/head', $data);
        $this->load->view('partisi/sidebar');
        $this->load->view('partisi/nav');
        $this->load->view('partisi/isi', $data);
        $this->load->view('partisi/footer');
    }

    public function hapus_pengaduan($id_pengaduan)
    {
        $this->db->where('id_pengaduan', $id_pengaduan);
        $query = $this->db->get('tbl_pengaduan');
        $row = $query->row();
        //  var_dump($row);die;
        unlink(FCPATH . './assets/lampiran_pengaduan/' . $row->gambar_pengaduan);
        $this->db->delete('tbl_pengaduan', array('id_pengaduan' => $id_pengaduan));
        redirect('tampil_pengaduan');
    }

    public function hapus_tanggapan($query)
    {
        $query = "select judul_pengaduan,isi_pengaduan,lokasi_pengaduan,tanggal_pengaduan,tanggal_tanggapan,nama_menanggapi,user_nama,isi_tanggapan 
        from tbl_pengaduan,tbl_tanggapan,tbl_user 
        where tbl_tanggapan.id_pengaduan = tbl_pengaduan.id_pengaduan and tbl_pengaduan.id_user = tbl_user.id_user";
        $this->db->where('judul_pengaduan', $query);
        $this->db->delete($query);

        redirect('pengaduan/detail_tanggapan', 'refresh');
    }
}
