<?php

class M_spp extends CI_Model{

    public function HistoryPembayaran(){
        return $this->db->get('spp');
    }
}