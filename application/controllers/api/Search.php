<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Search extends CI_Controller {

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
        // // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        // $this->methods['index_get']['limit'] = 10; // 500 requests per hour per user/key
        // $this->methods['index_post']['limit'] = 10; // 100 requests per hour per user/key
        // $this->methods['index_delete']['limit'] = 10; // 50 requests per hour per user/key
    }

    public function index_get()
    {
       
    }

    public function index_post()
    {
        $search = $_POST['search'];
        $sql = "SELECT * FROM tbl_pengaduan where judul_pengaduan LIKE '%$search%' ORDER BY judul_pengaduan ASC";
        $result = array();
        while($row = mysqli_fetch_array($sql)){
          array_push($result, array('id_pengaduan'=>$row[0], 'judul_pengaduan'=>$row[1], 'isi_pengaduan'=>$row[2], 'lokasi_pengaduan'=>$row[3],
          'nama_instansi'=>$row[4],
          'id_user'=>$row[5],
          'saran_pengaduan'=>$row[6],
          'gambar_pengaduan'=>$row[7],
          'tanggal'=>$row[8]
        ));
        }
        $this->set_response(array("value"=>1,"result"=>$result, 201));
    }

    public function index_delete()
    {
       
    }
}