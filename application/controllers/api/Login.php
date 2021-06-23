<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Login extends CI_Controller
{

	use REST_Controller {
		REST_Controller::__construct as private __resTraitConstruct;
	}

	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->__resTraitConstruct();
		$this->load->database();
		date_default_timezone_set('Asia/Jakarta');
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		// Configure limits on our controller methods
		// Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
		// $this->methods['index_get']['limit'] = 10; // 500 requests per hour per user/key
		// $this->methods['index_post']['limit'] = 10; // 100 requests per hour per user/key
		// $this->methods['index_delete']['limit'] = 10; // 50 requests per hour per user/key
	}

	public function index_get()
	{
	}

	public function index_post()
	{
		$data = array();
		$device = $this->input->post("device");
		$email =  $this->input->post("f_email");
		$password =  $this->input->post("f_password");


		if ($email == '' || $password == '') {
			$data['result'] = 'false';
			$data['msg'] = 'Silahkan isi email dan atau password anda.';
			$this->set_response($data, 200);
			return;
		}

		$user = $this->db->get_where('tbl_user', ['user_email' => $email])->row_array();
		$this->db->where('user_email', $email);
		if ($user) {
			if ($user['id_status'] == 2) {
				if (password_verify($password,  $user['user_password'])) {
					$user = $this->db->get('tbl_user');
					if ($user->num_rows() > 0) {
						$q = $user->row();


						//delete semua sesi user ini sebelumnya
						$this->db->where('id_user', $q->id_user);
						$this->db->update('sesi', array('sesi_logout' =>  date('Y-m-d H:i:s')));
						$this->db->update('sesi', array('sesi_status' => 9));
						//create token
						$key = md5x(date('Y-m-d H:i:s') . $device);
						//masukkan kedlam tabel sesi
						$simpan = array();
						$simpan['sesi_key'] =  $key;
						$simpan['id_user'] = $q->id_user;
						$simpan['sesi_device'] = $device;
						$status = $this->db->insert('sesi', $simpan);
					}
				}
				if ($status) {
					$data['result'] = 'true';
					$data['token'] =  $key;
					$data['data'] = $q;
					$data['msg'] = 'Login berhasil.';
					$data['idUser'] = $q->id_user;
				} else {
					$data['result'] = 'false';
					$data['token'] = '';
					$data['idUser'] = '';
					$data['msg'] = 'Error create sesi login, Silahkan coba lagi.';
				}
			} else {
				$data['result'] = 'false';
				$data['msg'] = 'Anda tidak berhak login.';
			}
		} else {
			$data['result'] = 'false';
			$data['msg'] = 'Username atau password salah.';
		}

		$this->set_response($data, 201);
	}

	public function index_delete()
	{
	}
}
