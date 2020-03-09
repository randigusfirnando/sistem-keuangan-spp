<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bop extends CI_Controller{

    public function index(){
        $data['bop'] = $this->M_Bop->GetDataBop()->result();
        $this->load->view('templates/uang_masuk', $data);
    }

    public function TambahUangBop(){
        $id = $this->input->post(id);
        $tgl = $this->input->post(tgl);
        $jml = $this->input->post(jml);

        $data = array(
            'id_masuk'      => $id,
            'tanggal_masuk' => $tgl,
            'jumlah'        => $jml
        );

        $this->M_Bop->InputData($data, 'uang_masuk_bop');
        redirect('Bop/index');

    }

    public function UangKeluar(){
        $data['bop'] = $this->M_Bop->GetUangKeluar()->result();
        $this->load->view('templates/uang_keluar', $data);
    }
}