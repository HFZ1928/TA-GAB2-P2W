<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model { // membuat class Siswa_Model dengan extends ke CI_Model

    public function getSiswa(){ // membuat fungsi getSiswa() pada file models
        
    
        
       $this->db->select("id AS id_mhs,
       nisn AS npm_siswa, 
       
       nama AS nama_siswa,
       email AS email_siswa,
       jurusan AS jurusan_siswa
       "); // query ke database untuk menampilkan isi database
       $this->db->from("siswa");// query ke database dan nama tabel untuk menampilkan isi database
       $this->db->order_by("nisn", "ASC");// query ke database untuk menampilkan isi database

       $query = $this->db->get()->result(); // kode program untuk menampilkan isi database dengan method GET() 
       return $query; // mengembalikan nilai variabel $query
    }

}


?>