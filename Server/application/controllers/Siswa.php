<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . "libraries/Server.php";

class Siswa extends Server{ // membuat class Siswa dengan extends Server


    public function __construct(){ // membuat konstruktor
        parent::__construct();     // menambahkan parent konstruktor
        $this->load->model("Siswa_model", "mdl", TRUE); // menampilkan data yng dikirim dari model
    }
    
    public function index_get(){ // membuat fungsi get data pada controller
        $siswa = $this->mdl->getSiswa();// menampilkan data yang dikirim dari model ke controller
        $this->response(array("siswa" => $siswa), 200);
    }   

}