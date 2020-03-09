<?php

class M_Bop extends  CI_Model{

    public function GetDataBop(){
        return $this->db->get('uang_masuk_bop');
    }

    public function GetUangKeluar(){
        return $this->db->get('uang_keluar_bop');
    }
}