<?php

class Siswa_model extends CI_Model {


    public function getSiswa($id = null){ // membuat fungsi model tampil / lihat data dari database
        
        if ( $id == null){ // kondisi jika id tidak di masukkan maka tampilkan seluruh data
            return $this->db->get('siswa')->result_array();
        }else{// kondisi jika user memasukkan id yang dicari, maka akan muncul id tersebut yang dicari
            return $this->db->get_where('siswa',['id' => $id])->result_array();    
        }
    }



    public function deleteSiswa($id){ // membuat fungsi delete siswa by id

        $this->db->delete('siswa', ['id' => $id]); 
        return $this->db->affected_rows();
    }


    public function createSiswa($data) // membuat fungsi tambah data
    {
        $this->db->insert('siswa', $data);
        return $this->db->affected_rows();
    }


    public function updateSiswa($data, $id){ // membuat fungsi update data 
        $this->db->update('siswa',$data, ['id'=> $id]);
        return $this->db->affected_rows();
    }

}