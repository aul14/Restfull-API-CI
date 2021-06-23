<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Daftar extends CI_Controller {

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
		$this->load->library('user_agent');
		
        // Configure limits on our controller methods
        
    }
    private function check_sesi(){
		$token = $this->input->post('f_token');
		$device = $this->input->post('f_device');

		//$token = 'a6bccee9979eef5c66532b5a36880d39';
		//$device = 'ffffffff-be46-4574-ffff-ffffbdceeae1';
		
		if($token || $device){
			$sql = "SELECT * FROM sesi WHERE 
				sesi_key = ? AND sesi_device = ? 
				AND sesi_status = ?";
			// $this->db->where('sesi_key', $token);
			// $this->db->where('sesi_status', 1);
			// $this->db->where('sesi_device', $device);
			$query = $this->db->query($sql, array($token, $device, 1));
			if($query->num_rows() > 0){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
		
	}

    public function index_get()
    {
       
    }

    public function index_post($isAdmin = '')
    {
        $data = array();
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
		$hp = $this->input->post('phone');
		$ket = $this->input->post('ket');
		
		//check email in di database
		$this->db->where('user_email', $email);
		$this->db->or_where('user_nama', $nama);
		$q = $this->db->get('tbl_user');


		if($q->num_rows() > 0) {
			$data['result'] = 'false';
			$data['msg'] = 'Email atau nama anda sudah terdaftar, silahkan untuk login.';
			$this->set_response($data, 201);
		}else{		
			$simpan = array();
			
			if($isAdmin != ''){
				$status = "1";
			}else{
				$status = "2";
			}
			$simpan['id_status'] = $status;
			$simpan['user_password'] = $password;
			$simpan['user_nama'] = $nama;
			$simpan['user_email'] = $email;
			$simpan['user_register'] = date('Y-m-d H:i:s');
			$simpan['user_hp'] = $hp;
			$simpan['keterangan'] = $ket;
			$simpan['ip_address'] = $this->input->ip_address();
			$status = $this->db->insert('tbl_user',$simpan);
			
			if($status){				
				$data['result'] = 'true';
				$data['msg'] = 'Pendaftaran berhasil, silahkan untuk login';
				
			}else{

				$data['result'] = 'false';
				$data['msg'] = 'Pendafatran gagal, silahkan coba kembali';
			}
            $this->set_response($data, 201);
		}
    }

    public function index_delete()
    {
       
    }
}