<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Pengaduan  extends CI_Controller {

    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->__resTraitConstruct();
        date_default_timezone_set('Asia/Jakarta');
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
        $this->load->database();
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        // $this->methods['index_get']['limit'] = 10; // 500 requests per hour per user/key
        // $this->methods['index_post']['limit'] = 10; // 100 requests per hour per user/key
        // $this->methods['index_delete']['limit'] = 10; // 50 requests per hour per user/key
    }

    public function index_get()
    {
       // Users from a data store e.g. database
       $id = $this->get('id_pengaduan');
       if ($id == '') {
           $pengaduan = $this->db->get('tbl_pengaduan')->result();
       } else {
           $this->db->where('id_pengaduan', $id);
           $pengaduan = $this->db->get('tbl_pengaduan')->result();
       }
       if ($pengaduan) {
           $this->response([
               'result' => true,
               'msg' => "Data berhasil di dapatkan",
               'data' => $pengaduan
           ],200);
       } else {
           $this->response([
               'result' => false,
               'msg' => "Data gagal didapatkan",
           ],404);
       }

       $this->response($pengaduan, 200);
    }

    public function index_post()
    {

        $data = array();
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$lokasi = $this->input->post('lokasi');
		$instansi = $this->input->post('instansi');
		$idUser = $this->input->post('f_idUser');
		$saran = $this->input->post('saran');
		$target_dir = "./assets/lampiran_pengaduan/";
        $target_file_name =basename($_FILES["file"]["name"]);
        $file_tmp = $_FILES["file"]["tmp_name"];
        
		// $hehe = [
		// 	'judul' => 
		// 	$this->input->post('judul'),
		// 	'image' => $_FILES		
		// ];
		// var_dump($hehe);die;

		if (isset($_FILES["file"])) 
		{
			if (move_uploaded_file($file_tmp, './assets/lampiran_pengaduan/' .$target_file_name)) {
				$simpan['judul_pengaduan'] = $judul;
				$simpan['isi_pengaduan'] = $isi;
				$simpan['lokasi_pengaduan'] = $lokasi;
				$simpan['nama_instansi'] = $instansi;
				$simpan['id_user'] = $idUser;
				$simpan['saran_pengaduan'] = $saran;
				$simpan['gambar_pengaduan'] = $target_file_name;
				$simpan['tanggal_pengaduan'] = date('Y-m-d H:i:s');

				$status = $this->db->insert('tbl_pengaduan',$simpan);

				if ($status) 
				{
					$data['result'] = 'true';
                    $data['msg'] = 'berhasil menambahkan pengaduan';
                    $data['data'] = $simpan;
				}else 
				{
					$data['result'] = 'false';
					$data['msg'] = 'gagal menambahkan pengaduan';
				}
			}
		}
        $this->set_response($data, 201);
		
           
    }

    public function index_delete()
    {
       
    }
}