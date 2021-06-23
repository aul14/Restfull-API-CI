<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $data['title'] = 'Data Admin';
        $data['user'] =  $this->db->get_where('tbl_user', [
            'user_nama' => $this->session->userdata('usernama')
        ])->row_array();
        $this->db->where('id_user !=', $data['user']['id_user']);
        $this->db->where('id_status', 1);
        $data['tbl_user'] = $this->Makun->lihat_data()->result();
        $this->load->view('partisi/head', $data);
        $this->load->view('partisi/sidebar');
        $this->load->view('partisi/nav');
        $this->load->view('auth/lihat_admin', $data);
        $this->load->view('partisi/footer');
    }
    public function tambah_admin()
    {
        $data['title'] = 'Tambah Data Admin';
        if ($this->session->userdata('idstatus') == 1) {
            redirect('beranda');
        }
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required|is_unique[tbl_user.user_nama]', ['is_unique' => 'Nama Sudah Terdaftar']);
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[tbl_user.user_email]', ['is_unique' => 'Email Sudah Terdaftar']);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password2', 'trim|required|matches[password]');
        if ($this->form_validation->run() == false) {
            $data['tbl_user'] = $this->Makun->getuser();
            $this->load->view('partisi/head', $data);
            $this->load->view('partisi/sidebar');
            $this->load->view('partisi/nav');
            $this->load->view('user/tambah_admin', $data);
            $this->load->view('partisi/footer');
        } else {
            $data = [
                'user_nama' => htmlspecialchars(strip_tags($this->input->post('nama_lengkap'))),
                'user_email' => htmlspecialchars(strip_tags($this->input->post('email'))),
                'user_password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'user_hp' => htmlspecialchars(strip_tags($this->input->post('hp'))),
                'id_status' => 1,
                'user_register' => date('Y-m-d H:i:s'),
                'keterangan' => "Daftar dengan manual",
                'ip_address' => $this->input->ip_address()
            ];
            $this->Makun->insertLogin($data);
            $this->session->set_flashdata('addAkun', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
            </button>
                <strong>Sukses!</strong> Admin Berhasil Ditambahkan.
                </div');
            redirect('admin', 'refresh');
        }
    }
}
