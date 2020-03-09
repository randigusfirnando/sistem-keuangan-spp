<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spp extends CI_Controller{

    public function index(){
        $data['spp'] = $this->M_spp->HistoryPembayaran()->result();
        $this->load->view('templates/spp', $data);
    }

    public function FormSpp(){
        $this->load->view('templates/formspp');
    }
}