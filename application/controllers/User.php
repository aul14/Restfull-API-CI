<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $this->load->library('user_agent');
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
        $data['title'] = 'Akun Saya';
        $data['user'] = $this->db->get_where('tbl_user', [
            'user_nama' => $this->session->userdata('usernama')
        ])->row_array();
        // $data['akun'] = $this->User_model->getDataUser();
        $this->load->view('partisi/head', $data);
        $this->load->view('partisi/sidebar');
        $this->load->view('partisi/nav');
        $this->load->view('user/akun_saya', $data);
        $this->load->view('partisi/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('tbl_user', [
            'user_email' => $this->session->userdata('useremail')
        ])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required|is_unique[tbl_user.user_nama]', ['is_unique' => 'Nama Sudah Terdaftar']);

        $this->form_validation->set_rules('userhp', 'No Hp', 'trim|required', ['required' => 'No Hp wajib diisi!']);
        if ($this->form_validation->run() == false) {
            $this->load->view('partisi/head', $data);
            $this->load->view('partisi/sidebar');
            $this->load->view('partisi/nav');
            $this->load->view('user/edit_profil', $data);
            $this->load->view('partisi/footer');
        } else {
            if (isset($_POST['edit'])) {
                $const = $this->db->get_where('tbl_user', ['id_user' => $id])->row_array();
                $nama = htmlspecialchars($this->input->post('nama'));
                $hp = htmlspecialchars($this->input->post('userhp'));
                $email = $const['user_email'];

                $this->db->set('user_nama', $nama);
                $this->db->set('user_hp', $hp);
                $this->db->where('user_email', $email);
                // var_dump($email);die;
                $this->db->update('tbl_user');
                $this->session->set_userdata('usernama', $nama);
                $this->session->set_flashdata('notifUser', '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;&nbsp;&nbsp;</span>
                </button>
                <strong>Sukses!</strong> Profil berhasil di edit.
                </div>');

                redirect('user', 'refresh');
            }
        }
    }

    public function gantipassword()
    {
        $data['title'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('tbl_user', [
            'user_email' => $this->session->userdata('useremail')
        ])->row_array();

        $this->form_validation->set_rules('passwordLama', 'Password Lama', 'trim|required', [
            'required' => 'Password Lama Harus diisi!',
        ]);
        $this->form_validation->set_rules('passwordBaru', 'Password Baru', 'trim|required|min_length[3]|matches[passwordBaru1]', [
            'required' => 'Password baru harus diisi!',
            'matches' => 'Password Tidak Sama!'
        ]);
        $this->form_validation->set_rules('passwordBaru1', 'Konfirmasi Password', 'trim|required|min_length[3]|matches[passwordBaru]', [
            'required' => 'Konfirmasi password harus diisi!',
            'matches' => 'Password Tidak Sama!'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('partisi/head', $data);
            $this->load->view('partisi/sidebar');
            $this->load->view('partisi/nav');
            $this->load->view('user/ganti_password', $data);
            $this->load->view('partisi/footer');
        } else {
            $passwordLama = $this->input->post('passwordLama');
            $passwordBaru = $this->input->post('passwordBaru');
            if (password_verify($passwordLama, $data['user']['user_password'])) {
                if ($passwordLama == $passwordBaru) {
                    $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;&nbsp;&nbsp;</span>
                </button>
                <strong>Gagal!</strong> Password baru tidak boleh sama dengan password lama.
                </div>');

                    redirect('user/gantipassword', 'refresh');
                } else {
                    $hash = password_hash($passwordBaru, PASSWORD_DEFAULT);
                    $this->db->set('user_password', $hash);
                    $this->db->where('user_email', $this->session->userdata('useremail'));
                    $this->db->update('tbl_user');
                    $this->session->set_flashdata('notifUser', '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;&nbsp;&nbsp;</span>
                    </button>
                    <strong>Sukses!</strong> Password berhasil di ganti.
                    </div>');

                    redirect('user/pilih', 'refresh');
                }
            }
        }
    }

    public function pilih()
    {
        $this->load->view('partisi/head');
        $this->load->view('partisi/sidebar');
        $this->load->view('partisi/nav');
        $this->load->view('user/pilih');
        $this->load->view('partisi/footer');
    }

    public function hapus_admin($id)
    {
        if ($this->session->userdata('idstatus') == 1) {
            redirect('beranda/tampil_admin', 'refresh');
        }
        $this->Makun->akun_hapus($id);
        $this->session->set_flashdata('addAkun', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
        </button>
            <strong>Sukses!</strong> Admin Berhasil Dihapus.
            </div');
        redirect('admin', 'refresh');
    }

    public function hapus_sesi($id)
    {
        $this->db->where('id_sesi', $id);
        $this->db->delete('sesi');
        $this->session->set_flashdata('notifSesi', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
        </button>
            <strong>Sukses!</strong> Sesi Berhasil Dihapus.
            </div');
        redirect('tampil_akun/aktivitas_login', 'refresh');
    }

    public function hapus_user($id)
    {

        $this->Makun->akun_hapus($id);
        $this->session->set_flashdata('addAkun', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
        </button>
            <strong>Sukses!</strong> User Berhasil Dihapus.
            </div');
        redirect('tampil_akun', 'refresh');
    }

    function ambilId()
    {
        $id = $this->input->post('id_user');
        $where = array('id_user' => $id);
        $datauser = $this->Makun->ambilId('tbl_user', $where)->result();

        echo json_encode($datauser);
    }
}
