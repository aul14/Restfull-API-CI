<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Instansi extends CI_Controller {

    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->__resTraitConstruct();
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
        $id = $this->get('id_instansi');
        if ($id == '') {
            $instansi = $this->db->get('tbl_instansi')->result();
        } else {
            $this->db->where('id_instansi', $id);
            $instansi = $this->db->get('tbl_instansi')->result();
        }
        if ($instansi) {
            $this->response([
                'result' => true,
                'msg' => "Data berhasil di dapatkan",
                'data' => $instansi
            ],200);
        } else {
            $this->response([
                'result' => false,
                'msg' => "Data gagal didapatkan",
            ],404);
        }

        $this->response($instansi, 200);
    }

    public function index_post()
    {
       
    }

    public function index_delete()
    {
       
    }
}