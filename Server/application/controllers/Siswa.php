<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/Server.php';


class Siswa extends Server {
    
    // membuat konstruktor
    public function __construct()
    {
        parent::__construct(); // memanggil parent

        $this->load->model('Siswa_model', 'siswa'); // load model siswa
       
        $this->methods['index_get']['limit'] = 4;
        $this->methods['index_delete']['limit'] = 2;
        $this->methods['index_post']['limit'] = 2;
        
        
    }



 
    public function index_get(){ // membuat kontroller GET (menampilkan data keseluruhan ataupun dengan menggunakan 'where' id)


        $id = $this->get('id');

        if($id == null){
            $siswa = $this->siswa->getSiswa(); // menampilkan seluruh data
        }else{
            $siswa = $this->siswa->getSiswa($id); // hanya menampilkan data yang dicari menggunakan id saja
        }

        if($siswa){
            $this->response([ // respo
                'status' => true,
                'data' => $siswa
            ]);
        }else{
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ]);
        }
    }



 

}