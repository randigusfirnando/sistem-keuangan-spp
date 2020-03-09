<?php

class M_KepalaSekolah extends CI_Model{

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

    public function GetDataPengajuan(){
        $this->db->order_by('id_spp', 'DESC');
        $query = $this->db->get('spp');
        return $query;
    }

    public function GetDataSpp(){
        $this->db->select("*");
        $this->db->from('spp');
        $this->db->where('status', 'Lunas');
        return $this->db->get();
    }

    public function GetDataProfile(){
        // return $this->db->get('kepalasekolah');
            $this->db->select("*");
            $this->db->from('user');
            $this->db->where('id_user', $this->session->userdata('id_user'));
            return $this->db->get();
    }

    public function GetUangMasuk(){
        return $this->db->get('bop_uangmasuk');
    }

    public function GetUangKeluar(){
        return $this->db->get('bop_uangkeluar');
    }

    public function InsertUangMasuk($data){
        $this->db->insert('bop_uangmasuk', $data);
    }

    public function InsertUangKeluar($data){
        $this->db->insert('bop_uangkeluar', $data);
    }

    public function InsertDataGuru($data){
        $this->db->insert('user',$data);
    }

    public function GetDataLaporanKeuangan(){
        $this->db->select('*');
        $this->db->from('rekapan_bop');
        $this->db->join('uang_masuk_bop', 'uang_masuk_bop.id_masuk = rekapan_bop.id_masuk');
        $this->db->join('uang_keluar_bop', 'uang_keluar_bop.id_keluar = rekapan_bop.id_keluar');
        $query = $this->db->get();
        return $query->result();

    }

    public function EditData($where, $table){
        return $this->db->get_where($table, $where); 
    }

    public function UpdateUangMasuk($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function EditDataCekPengajuan($where, $table){
        return $this->db->get_where($table, $where);
    }

    // public function UpdateUangMasuk($where,$data, $table){
    //     $this->db->where($where);
    //     $this->db->update($table, $data);
        
    // }

    public function UpdateCekPengajua($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function UpdateProfile($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}