<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Tanggapan extends CI_Controller
{

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
        $id = $this->get('id_tanggapan');

        $this->db->where('id_tanggapan', $id);
        $tanggapan = $this->db->get('tbl_tanggapan')->result();

        if ($tanggapan) {
            $this->response([
                'result' => true,
                'msg' => "Data berhasil di dapatkan",
                'data' => $tanggapan
            ], 200);
        } else {
            $this->response([
                'result' => false,
                'msg' => "Data gagal didapatkan",
            ], 404);
        }

        $this->response($tanggapan, 200);
    }

    public function index_post()
    {
    }

    public function index_delete()
    {
    }
}
