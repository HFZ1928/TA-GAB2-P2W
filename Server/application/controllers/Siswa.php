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



    public function index_delete() // membuat kontroller hapus data
    {

        $id = $this->delete('id');

        if($id == null){ // kondisi jika $id tidak di isi
            $this->response([
                'status' => false,
                'message' => 'Data Siswa Tidak Ada!!'
            ]);
        }else{
            if($this->siswa->deleteSiswa($id) > 0 ){ // kondisi jika di isi dan data tersebut ada lalu berhasil di hapus
                // ok
                $this->response(array("status" => "Data Siswa Berhasil Dihapus"), 200);
            }else{
                // id not found
                 $this->response([ // kondisi jika id yang dimasukkan tidak ada
                    'status' => false,
                    'message' => 'Data Siswa Gagal Dihapus!!'
                    ]);
                   
 
            }
        }

    }


    public function index_post() // membuat kontroller insert data 
    {
        $data = [
            'nrp' => $this->post('nrp'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'jurusan' => $this->post('jurusan')
        ];

        if($this->siswa->createSiswa($data) > 0){
            $this->response(array("status" => "Data Siswa Berhasil Ditambah"), 200);
        }else{
            $this->response([
                'status' => false,
                'message' => 'Data Siswa Gagal Ditambah!!'
                ]);
               

        }
    }



    public function index_put(){ // membuat kontroller edit data 

        $id = $this->put('id');
        $data = [
            'nrp' => $this->put('nrp'),
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'jurusan' => $this->put('jurusan')
        ];

        if($this->siswa->updateSiswa($data, $id) > 0){ // kondisi jika data berhasil diupdate
            $this->response(array("status" => "Data Siswa Berhasil Diupdate"), 200);
        }else{
            $this->response([ // kondisi jika data gagal diupdate
                'status' => false,
                'message' => 'Data Siswa Gagal Diupdate!!'
                ]);
               
        }

    }


}