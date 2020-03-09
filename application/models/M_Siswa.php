<?php

class M_Siswa extends CI_Model{
    
    public function GetDataProfile(){
        $this->db->select("*");
        $this->db->from('user');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        return $this->db->get();
    }

    public function GetDataSpp(){
        return $this->db->get('spp');
    }

    public function InsertSpp($data){
        $this->db->insert('spp',$data);
    }

    public function GetDataHistory(){
        $this->db->select("*");
        $this->db->from('spp');
        $this->db->where('id_user', $this->session->userdata('id_user'));

        return $this->db->get();
        //return $this->db->get('spp');
    }

    public function EditdataProfile($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function UpdateProfile($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    
}