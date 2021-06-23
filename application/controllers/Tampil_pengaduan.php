<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tampil_pengaduan extends CI_Controller
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
        $data['title'] = 'Pengaduan Masyarakat';
        $data['tbl_pengaduan'] = $this->Mlapor->lihat_data()->result();
        $this->load->view('partisi/head', $data);
        $this->load->view('partisi/sidebar');
        $this->load->view('partisi/nav');
        $this->load->view('pengaduan/lihat_pengaduan', $data);
        $this->load->view('partisi/footer');
    }
    public function detail_tanggapan()
    {
        $data['title'] = 'Detail Data Tanggapan';
        $data['detail'] = $this->Mlapor->detailTanggapan();
        $this->load->view('partisi/head', $data);
        $this->load->view('partisi/sidebar');
        $this->load->view('partisi/nav');
        $this->load->view('tanggapan/detail_tanggapan', $data);
        $this->load->view('partisi/footer');
    }
    public function tambah_tanggapan($id = '')
    {
        $data['title'] = 'Tambah Tanggapan';
        $this->db->where('id_pengaduan', $id);
        $status = $this->db->get('tbl_pengaduan')->row_array();
        if ($id == '') {
            $this->session->set_flashdata('addLapor', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
            </button>
                <strong>Gagal!</strong> Silahkan pilih data pengaduan terlebih dahulu.
                </div');
            redirect('tampil_pengaduan', 'refresh');
        } elseif (!$status) {
            $this->session->set_flashdata('addLapor', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
            </button>
                <strong>Gagal!</strong> Pengaduan sudah ditanggapi.
                </div');
            redirect('tampil_pengaduan', 'refresh');
        } else {
            $data['pengaduan'] = $status;
            $this->form_validation->set_rules('isi_tanggapan1', 'Isi Tanggapan', 'trim|required');
            if ($this->form_validation->run() == false) {
                $this->load->view('partisi/head', $data);
                $this->load->view('partisi/sidebar');
                $this->load->view('partisi/nav');
                $this->load->view('tanggapan/tambah_tanggapan', $data);
                $this->load->view('partisi/footer');
            } else {
                if (isset($_POST['simpan_tanggapan'])) {
                    $data = [
                        'nama_menanggapi' => $this->session->userdata('usernama'),
                        'isi_tanggapan' => $this->input->post('isi_tanggapan1'),
                        'tanggal_tanggapan' => date('Y-m-d H:i:s'),
                        'id_pengaduan' => $id

                    ];
                    //  var_dump($data);die;
                    $this->Mlapor->insertTanggapan($data);
                    $this->session->set_flashdata('addLapor', '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                    </button>
                        <strong>Sukses!</strong> Tanggapan berhasil ditambahkan.
                        </div');

                    redirect('tampil_pengaduan', 'refresh');
                }
            }
        }
    }
}
