<?php

class Contoh extends CI_Model{
    public function getdata(){
        return $this->db->get('siswa')->result_array;
    }
}