<?php

class M_Guru extends CI_Model{

    public function GetdataSiswa(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_role', '3');
        return $this->db->get();
    }

    public function GetDataGuru(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_role', '2');
        return $this->db->get();
    }

    public function GetDataProfile(){
        $this->db->select("*");
        $this->db->from('user');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        return $this->db->get();
    }

    public function GetDataPengajuan(){
        
    }

    public function InsertDataSiswa($data){
        $this->db->insert('user',$data);
    }

    public function Ubahdata(){

    }

    public function Hapusdata($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function UpdateProfile($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}