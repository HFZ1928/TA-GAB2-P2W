<?php 
use GuzzleHttp\Client;

class Siswa_model extends CI_model {


    private $_client;

    public function __construct()
    {
        $this->_clinet = new Client([
            'base_uri' => 'http://localhost/TA/Software/Server/'
        ]);

    }





    public function getAllSiswa()
    {
            $client = new Client();
            
            $response = $client->request('GET', 'http://localhost/TA-PWBS-P2W/Server/api/Siswa');   
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'];    
    }

    public function getSiswaById($id)
    {

        $client = new Client();
            
        $response = $client->request('GET', 'http://localhost/TA-PWBS-P2W/Server/api/Siswa',[
           'query' => ['id' => $id
           ] 
        ]);   
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
        
        
       // return $this->db->get_where('siswa', ['id' => $id])->row_array();

    }



    public function tambahDataSiswa()
    {
        $client = new Client();


        $data = [
            "nama" => $this->input->post('nama', true),
            "nrp" => $this->input->post('nrp', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true)
        ];


        $response = $client->request('POST', 'http://localhost/TA-PWBS-P2W/Server/api/Siswa',[
            'form_params' => $data
         ]); 

         $result = json_decode($response->getBody()->getContents(), true);
         return $result;


        

       // $this->db->insert('siswa', $data);
    }

    public function hapusDataSiswa($id)
    {
        $client = new Client();
            
        $response = $client->request('DELETE', 
        'http://localhost/TA-PWBS-P2W/Server/api/Siswa',[
            'form_params' => [
                'id' => $id
                ]
        ]);  

        return $result;


    }



    public function ubahDataSiswa()
    {

        $client = new Client();

        $data = [
            "nama" => $this->input->post('nama', true),
            "nrp" => $this->input->post('nrp', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true),
            "id" => $this->input->post('id', true)
        ];


        $response = $client->request('put', 'http://localhost/TA-PWBS-P2W/Server/api/Siswa',[
            'form_params' => $data
         ]); 

         $result = json_decode($response->getBody()->getContents(), true);
         return $result;

        
    }

    public function cariDataSiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('nrp', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('siswa')->result_array();
    }
}