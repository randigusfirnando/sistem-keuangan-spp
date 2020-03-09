<?php

class Guru extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        if(!isset($this->session->userdata['id_user'])){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Silahkan Login Terlebih Dahulu
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('Login');
        }elseif($this->session->userdata['id_role'] != 2){
            redirect('Siswa');
        }
    }

    public function index(){
        $data['profile'] = $this->M_KepalaSekolah->GetDataProfile()->result();
        $this->load->view('templates/guru/profile', $data);
    }

    public function DataSiswa(){
        $data['siswa'] = $this->M_Guru->GetDataSiswa()->result();
        $this->load->view('templates/guru/datasiswa', $data);
    }

    public function DataGuru(){
        $data['guru'] = $this->M_Guru->GetDataGuru()->result();
        $this->load->view('templates/guru/dataguru', $data);
    }

    public function UbahProfile(){
        $id_user            = $this->input->post('id_user');
        $nama               = $this->input->post('nama');
        $password           = $this->input->post('password');
        $tempat_lahir       = $this->input->post('tempat_lahir');
        $tanggal_lahir      = $this->input->post('tanggal_lahir');
        $jenis_kelamin      = $this->input->post('jenis_kelamin');
        $agama              = $this->input->post('agama');
        $alamat             = $this->input->post('alamat');
        $nomor_hp           = $this->input->post('nomor_hp');
        $nama_ibu           = $this->input->post('nama_ibu');
        $alamat_ibu         = $this->input->post('alamat_ibu');
        $nomor_hpibu        = $this->input->post('nomor_hpibu');
        $nomor_rekeningibu  = $this->input->post('nomor_rekeningibu');

        $data = array(
            'nama'              => $nama,
            'password'          => $password,
            'tempat_lahir'      => $tempat_lahir,
            'tanggal_lahir'     => $tanggal_lahir,
            'jenis_kelamin'     => $jenis_kelamin,
            'agama'             => $agama,
            'alamat'            => $alamat,
            'nomor_hp'          => $nomor_hp,
            'nama_ibu'          => $nama_ibu,
            'alamat_ibu'        => $alamat_ibu,
            'nomor_hpibu'       => $nomor_hpibu,
            'nomor_rekeningibu' => $nomor_rekeningibu
        );

        $where = array(
            'id_user' => $id_user
        );
        $this->M_Guru->UpdateProfile($where, $data, 'user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Profile Berhasil Diubah
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('Siswa');
    }

    public function HapusSiswa($NIS){
        $where = array('NIS => $NIS');
        $this->M_Guru->Hapusdata($where, 'siswa');
    }

    public function FormTambahSiswa(){
        $data = array(
            'id_user'           => set_value('id_user'),
            // 'id_role' => set_value(3),
            'nama'              => set_value('nama'),
            'password'          => set_value('password'),
            'tempat_lahir'      => set_value('tempat_lahir'),
            'tanggal_lahir'     => set_value('tanggal_lahir'),
            'jenis_kelamin'     => set_value('jenis_kelamin'),
            'agama'             => set_value('agama'),
            'alamat'            => set_value('jenis_kelamin'),
            'nomor_hp'          => set_value('nomor_hp'),
            'kelas_siswa'       => set_value('kelas_siswa'),
            'foto'              => set_value('foto')
        );
        $this->load->view('templates/guru/formtambahsiswa', $data);
    }

    public function TambahSiswa(){
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->FormTambahSiswa();
        }else {
           $data = array(
               'id_user'            => $this->input->post('id_user', TRUE),
               'id_role'            => 3,
               'nama'               => $this->input->post('nama', TRUE),
               'password'           => $this->input->post('password', TRUE),
               'tempat_lahir'       => $this->input->post('tempat_lahir', TRUE),
               'tanggal_lahir'      => $this->input->post('tanggal_lahir', TRUE),
               'jenis_kelamin'      => $this->input->post('jenis_kelamin', TRUE),
               'agama'              => $this->input->post('agama', TRUE),
               'alamat'             => $this->input->post('alamat', TRUE),
               'nomor_hp'           => $this->input->post('nomor_hp', TRUE),
               'kelas_siswa'        => $this->input->post('kelas_siswa', TRUE),
               'foto'               => $this->input->post('foto', TRUE)
           );


             $this->M_Guru->InsertDataSiswa($data);
             $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Siswa Berhasil Ditambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
              redirect('Guru/DataSiswa'); 
         
    }
}

    public function _rules(){
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('password', 'password', 'required|matches[password1]');
        $this->form_validation->set_rules('password1', 'password', 'required|matches[password]',[
            'matches' => 'Password Anda Tidak Cocok'
        ]);
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
        $this->form_validation->set_rules('agama', 'agama', 'required'); 
        $this->form_validation->set_rules('alamat', 'alamat', 'required');  
        $this->form_validation->set_rules('nomor_hp', 'nomor_hp', 'required');  
        $this->form_validation->set_rules('kelas_siswa', 'kelas_siswa', 'required');  

    
}

    public function Logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }
}