<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller{

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
        }elseif($this->session->userdata['id_role'] != 3){
            redirect('Login');
        }

        $this->load->model("M_Siswa");
        $this->load->library('form_validation');
    }

    public function index(){
        $data['profile'] = $this->M_Siswa->GetDataProfile()->result();
        $this->load->view('templates/siswa/profile', $data);
        
    }

    public function FormUbahProfile($id_user){
        $where = array('id_user' => $id_user);
        $data['profile'] = $this->M_Siswa->EditDataProfile($where, 'user')->result();
        $this->load->view('templates/siswa/formubahprofile', $data);
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
            'nomor_rekeningibu' => $nomor_rekeningibu,
        );

        $where = array(
            'id_user' => $id_user
        );
        $this->M_Siswa->UpdateProfile($where, $data, 'user');
        //     $this->session->set_flasdata('pesan',
        // '<div class="alert alert-success alert-dismissible fade show" role="alert">
        // Data Profile Berhasil Di ubah
        // </div>');
        redirect('Siswa');
    }

    public function FormPengajuan(){
        
        // $data = array(
        //     'id_user'             => set_value('id_user'),
        //     'nama'                => set_value('nama'),
        //     'bulan'               => set_value('bulan'),
        //     'nominal'             => set_value('nominal'),
        //     'nomor_rekening'      => set_value('nomor_rekening'),
        //     'bukti_Pembayaran'    => set_value('bukti_Pembayaran')
        // );
        $data['spp'] = $this->M_Siswa->GetDataSpp()->result();
        $this->load->view('templates/siswa/pengajuanspp', $data);
    }

    public function AjukanSpp(){

        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->FormPengajuan();
        }else {
           $data = array(
               'id_user'            => $this->input->post('id_user', TRUE),
               'nama'               => $this->input->post('nama', TRUE),
               'bulan'              => $this->input->post('bulan', TRUE),
               'nominal'            => $this->input->post('nominal', TRUE),
               'nomor_rekening'     => $this->input->post('nomor_rekening', TRUE),
               'bukti_Pembayaran'   => $this->input->post('bukti_pembayaran', TRUE)

           );

             $this->M_Siswa->InsertSpp($data);
             $this->session->set_flashdata('pesan', 
             '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Pengajuan SPP Berhasil Di Ajukan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
             echo "Data Berhasil Ditambahkan"; 
             redirect('Siswa/HistoryPembayaran');
        }
    }

    public function _rules(){
        $this->form_validation->set_rules('id_user','id_user', 'required',
        ['required' => 'Data NIS Wajib Diisi']);

        $this->form_validation->set_rules('nama','nama', 'required',
        ['required' => 'Data Nama Wajib Diisi']);

        $this->form_validation->set_rules('bulan','bulan', 'required',
        ['required' => 'Data Bulan Wajib Diisi']);

        $this->form_validation->set_rules('nominal' ,'nominal','required',
        ['required' => 'Data Nominal Pembayaran Wajib Diisi']);
        
        $this->form_validation->set_rules('nomor_rekening','nomor_rekening','required',
        ['required' => 'Data Nomor Rekening Wajib Diisi']);

        $this->form_validation->set_rules('bukti_pembayaran','bukti_pembayaran','required',
        ['required' => 'Data Bukti Pembayaran Wajib Diupload']);
    }

    public function FormUbahPassword(){
        $data['spp'] = $this->M_Siswa->GetDataSpp()->result();
        $this->load->view('templates/siswa/formubahpassword', $data);
    }

    public function UbahPassword(){
        // $data['user'] = $this->db->get_where('user',['id_user' =>
        // $this->session->userdata('id_user')])->row_array();

        $data['user'] = $this->M_Siswa->GetDataProfile()->result();

        $this->form_validation->set_rules('password_lama', 'password_lama', 'required|trim');
        $this->form_validation->set_rules('password_baru1', 'password_baru1', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password_baru2', 'password_baru2', 'required|trim|matches[password1]',[
            'matches' => 'Password Anda Tidak Cocok'
        ]);

        if($this->form_validation->run() == false){
            redirect('Siswa/FormUbahPassword');
        }else{
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru1');
            if(!password_verify($password_lama, $data['user']['password'])){
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Password Lama Salah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
              redirect('Siswa/FormUbahPassword');
            }else{
                if($password_lama == $password_baru){
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Password Baru Tidak BOleh Sama Dengan Password Lama
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
              redirect('Siswa/FormUbahPassword');
                }else{
                    $this->db->set('password', $password_baru);
                    $this->db->where('id_user', $this->session->userdata('id_user'));
                    $this->db->update('user');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Password Berhasil Diubah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                  redirect('Siswa/FormUbahPassword');
                }
            }
        }

    }

    public function HistoryPembayaran(){
        // $data['spp'] = $this->db->get_where('spp',['id_user' =>
        // $this->session->userdata('id_user')])->row_array();
        $data['spp'] = $this->M_Siswa->GetDataHistory()->result();
        $this->load->view('templates/siswa/spp', $data);
    }


    public function Logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }
}