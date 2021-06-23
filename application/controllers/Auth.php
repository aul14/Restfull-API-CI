<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }
    public function index()
    {

        if ($this->session->userdata('useremail')) {

            redirect('beranda', 'refresh');
        }

        // if ($this->session->userdata('idstatus') == 2) {

        // 	redirect('auth','refresh');
        // }
        $this->form_validation->set_rules('useremail', 'Useremail', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $i = $this->input;
            $useremail = htmlspecialchars(strip_tags($i->post('useremail')));
            $password = $i->post('password');
            // $check_username = $this->User_model->login($useremail, $password);
            $check_username = $this->db->get_where('tbl_user', ['user_email' => $useremail])->row_array();

            if ($check_username) {

                if ($check_username['id_status'] == 2) {
                    $this->session->set_flashdata('notifLogin', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                </button>
                <strong>Gagal!</strong> Username atau password salah.
                 </div>');
                    redirect('auth');
                }
                if (password_verify($password, $check_username['user_password'])) {
                    $array = [
                        'usernama' => $check_username['user_nama'],
                        'useremail' => $check_username['user_email'],
                        'idstatus' => $check_username['id_status']

                    ];
                    $this->session->set_userdata($array);

                    redirect('beranda', 'refresh');
                } else {
                    $this->session->set_flashdata('notifLogin', '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                    </button>
                    <strong>Gagal!</strong> Username atau password salah!
                     </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('notifLogin', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                </button>
                <strong>Gagal!</strong> Anda tidak punya akses login!
                 </div>');
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('useremail');
        $this->session->sess_destroy();
        redirect('auth');
    }
}

/* End of file Controllername.php */
