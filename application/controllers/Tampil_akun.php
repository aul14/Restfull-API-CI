<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tampil_akun extends CI_Controller
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
        $this->load->model('User_model');
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
        $data['title'] = 'Data User';
        $this->db->where('id_status', 2);
        $data['tbl_user'] = $this->Makun->lihat_data()->result();
        $this->load->view('partisi/head', $data);
        $this->load->view('partisi/sidebar');
        $this->load->view('partisi/nav');
        $this->load->view('auth/lihat_akun', $data);
        $this->load->view('partisi/footer');
    }
    public function aktivitas_login()
    {
        $data['title'] = 'Aktivitas Login';
        $data['sesi'] = $this->User_model->getDataSesi();
        $this->load->view('partisi/head', $data);
        $this->load->view('partisi/sidebar');
        $this->load->view('partisi/nav');
        $this->load->view('user/cek_login', $data);
        $this->load->view('partisi/footer');
    }
}
