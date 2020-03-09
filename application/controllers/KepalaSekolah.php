<?php

class KepalaSekolah extends CI_Controller{

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
        }elseif($this->session->userdata['id_role'] != 1){
            redirect('Guru');
        }
    }

    public function index(){
        // $data['profile'] = $this->db->get_where('user',['id_user' =>
        // $this->session->userdata('id_user')])->row_array();
        $data['profile'] = $this->M_KepalaSekolah->GetDataProfile()->result();
        // $data['profile'] = $this->session->userdata('id_user')->result();
        $this->load->view('templates/kepsek/profile', $data);
        // $this->load->view('templates/kepsek/profile', $data);
        
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
        $this->M_KepalaSekolah->UpdateProfile($where, $data, 'user');
            $this->session->set_flasdata('pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Profile Berhasil Di ubah
        </div>');
        redirect('KepalaSekolah');
    }

    public function DataSiswa(){
        $data['siswa'] = $this->M_KepalaSekolah->GetDataSiswa()->result();
        $this->load->view('templates/kepsek/datasiswa', $data);
    }

    public function DataGuru(){
        $data['guru'] = $this->M_KepalaSekolah->GetDataGuru()->result();
        $this->load->view('templates/kepsek/dataguru', $data);
    }

    public function DataSpp(){
        $data['spp'] = $this->M_KepalaSekolah->GetDataSpp()->result();
        $this->load->view('templates/kepsek/spp', $data);

    }

    public function UangMasukBop(){
        $data['bop'] = $this->M_KepalaSekolah->GetUangMasuk()->result();
        $this->load->view('templates/kepsek/uang_masuk', $data);
    }


    public function FormUangMasukBop(){

        $data = array(
            'nominal'       => set_value('nominal'),
            'tanggal_masuk' => set_value('tanggal_masuk')
        );
        $this->load->view('templates/kepsek/formuangmasuk', $data);
    }

    public function FormUangKeluarBop(){

        $data = array(
            'tanggal_keluar' => set_value('tanggal_keluar'),
            'nominal'  => set_value('nomnal'),
            'foto'  => set_value('foto'),
            'keterangan'  => set_value('keterangan')
        );
        $this->load->view('templates/kepsek/formuangkeluar', $data);
    }

    public function TambahDataUangKeluar(){
        $this->_ruleskeluar();

        if($this->form_validation->run() == FALSE){
            $this->FormUangKeluarBop();
        }else {
           $data = array(
               'tanggal_keluar'   => $this->input->post('tanggal_keluar', TRUE),
               'nominal'          => $this->input->post('nominal', TRUE),
               'foto'             => $this->input->post('foto', TRUE),
               'keterangan'       => $this->input->post('keterangan', TRUE),
           );
             $this->M_KepalaSekolah->InsertUangKeluar($data);
             $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
             Data Uang Keluar BOP Berhasil Ditambahkan
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>');
             redirect('KepalaSekolah/UangKeluarBop');
        }
    }

    public function FormUpdateUangMasuk($id_uangmasuk){
        $where       = array('id_uangmasuk' => $id_uangmasuk);
        $data['bop'] = $this->M_KepalaSekolah->EditData($where, 'bop_uangmasuk')->result();
        
        $this->load->view('templates/kepsek/formuangmasuk', $data);
    }

    public function EditUangMasuk(){
        $id_uangmasuk   = $this->input->post('id_uangmasuk');
        $nominal        = $this->input->post('nominal');
        $tanggal_masuk  = $this->input->post('tanggal_masuk');

        $data = array(
            'nominal'       => $nominal,
            'tanggal_masuk' => $tanggal_masuk
        );

        $where = array(
            'id_uangmasuk' => $id_uangmasuk
        );
        
        $this->M_KepalaSekolah->UpdateUangMasuk($where, $data, 'bop_uangmasuk');
        // $this->session->set_flasdata('pesan',
        // '<div class="alert alert-success alert-dismissible fade show" role="alert">
        // Data Uang Masuk Berhasil Di ubah
        // </div>');
        redirect('KepalaSekolah/UangMasukBop');

    }

    public function TambahDataUangMasuk(){
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->UangMasukBop();
        }else {
           $data = array(
               'nominal'        => $this->input->post('nominal', TRUE),
               'tanggal_masuk'  => $this->input->post('tanggal_masuk', TRUE)
           );
             $this->M_KepalaSekolah->InsertUangMasuk($data);
             $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
             Data Uang Masuk BOP Berhasil Ditambahkan
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>');
             redirect('KepalaSekolah/UangMasukBop');
        }
    }

    public function _rules(){
        $this->form_validation->set_rules('nominal', 'nominal', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'tanggal_masuk', 'required');

        // $this->form_validation->set_rules('tanggal_keluar', 'tanggal_keluar', 'required');
        // $this->form_validation->set_rules('jumlah_keluar', 'jumlah_keluar', 'required');
    }

    public function _ruleskeluar(){
        $this->form_validation->set_rules('tanggal_keluar', 'tanggal_keluar', 'required');
        $this->form_validation->set_rules('nominal', 'nominal', 'required');
        $this->form_validation->set_rules('foto', 'foto', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
        
    }

    public function UangKeluarBop(){
        $data['bop'] = $this->M_KepalaSekolah->GetUangKeluar()->result();
        $this->load->view('templates/kepsek/uang_keluar', $data);
    }

    public function LaporanKeuangan(){
        $data['laporan'] = $this->M_KepalaSekolah->GetDataLaporanKeuangan();
        $this->load->view('templates/kepsek/laporan', $data);
    }

    public function LaporanUangMasukPdf(){
        $this->load->library('dompdf_gen');

        $data['bop'] = $this->M_KepalaSekolah->GetUangMasuk('bop_uangmasuk')->result();
        
        $this->load->view('templates/kepsek/Laporan_pdf', $data);

        $this->dompdf->load_html('Membuat Report PDF dengan DOMPDF');
 
        // (Optional) Setup the paper size and orientation
        $this->dompdf->set_paper('A4', 'landscape');
        
        // Render the HTML as PDF
        $this->dompdf->render();
        
        // Output the generated PDF to Browser
        $this->dompdf->stream('hasil_report.pdf', array('Attachment' =>0));

        // $paper_size = 'A4';
        // $orientation = 'landscape';
        // $html = $this->output->get_output();
        // $this->dompdf->set_paper($paper_size, $orientation);

        // $this->dompdf->load_html($html);
        // $this->dompdf->render();
        // $this->dompdf->stream("Laporan_UangMasuk_Bop.pdf", array('Attachment' =>0));

        // $this->load->library('pdf');

        // $this->dompdf->set_paper('A4', 'potrait');
        // $this->dompdf->filename = "laporan-petanikode.pdf";
        // $this->dompdf->stream('templates/kepsek/Laporan_pdf', $data);
    }

    public function TambahGuru(){
        $this->_rulesguru();

        if($this->form_validation->run() == FALSE){
            $this->FormTambahGuru();
        }else {
           $data = array(
               'id_user'            => $this->input->post('id_user', TRUE),
               'id_role'            => 2,
               'nama'               => $this->input->post('nama', TRUE),
               'password'           => $this->input->post('password', TRUE),
               'tempat_lahir'       => $this->input->post('tempat_lahir', TRUE),
               'tanggal_lahir'      => $this->input->post('tanggal_lahir', TRUE),
               'jenis_kelamin'      => $this->input->post('jenis_kelamin', TRUE),
               'agama'              => $this->input->post('agama', TRUE),
               'alamat'             => $this->input->post('alamat', TRUE),
               'nomor_hp'           => $this->input->post('nomor_hp', TRUE),
               'gaji_guru'          => $this->input->post('gaji_guru', TRUE),
               'foto'               => $this->input->post('foto', TRUE)

           );


             $this->M_KepalaSekolah->InsertDataGuru($data);
             $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Guru Berhasil Di Tambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
              redirect('KepalaSekolah/DataGuru'); 
         
    }
}

    public function FormTambahGuru(){
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
            'gaji_guru'         => set_value('gaji_guru'),
            'foto'              => set_value('foto')
        );
        $this->load->view('templates/kepsek/formtambahguru', $data);
    }

    public function _rulesguru(){
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
        $this->form_validation->set_rules('gaji_guru', 'gaji_guru', 'required');
        $this->form_validation->set_rules('foto', 'foto', 'required');  
    }

    public function LaporanKeuanganPdf(){
        
    }

    public function LaporanSppPdf(){
        
    }

    public function CekPengajuan(){
        $data['spp'] = $this->M_KepalaSekolah->GetDataPengajuan()->result();
        $this->load->view('templates/kepsek/cekpengajuan', $data);
    }

    public function FormUbahCekPengajuan($id_spp){
        $where = array('id_spp' => $id_spp);
        $data['spp'] = $this->M_KepalaSekolah->EditDataCekPengajuan($where, 'spp')->result();
        $this->load->view('templates/kepsek/formubahcekpengajuan', $data);
        // $this->load->view('templates/kepsek/formuangmasuk', $data);


        // $where = array('id_spp' => $id_spp);
        // $data['spp'] = $this->M_KepalaSekolah->EditDataCekPengajuan($where, 'spp')->result();

    }

    public function AksiUbahCekPengajuan(){
        // $this->_rulescekpengajuan();


        $id_spp         = $this->input->post('id_spp');
        $id_user        = $this->input->post('id_user');
        $nama           = $this->input->post('nama');
        $bulan          = $this->input->post('bulan');
        $nominal        = $this->input->post('nominal');
        $nomor_rekening = $this->input->post('nomor_rekening');
        $status         = $this->input->post('status');

        $data = array(
            // 'id_spp'            => $id_spp,
            'id_user'           => $id_user,
            'nama'              => $nama,
            'bulan'             => $bulan,
            'nominal'           => $nominal,
            'nomor_rekening'    => $nomor_rekening,
            'status'            => $status
        );

        $where = array(
            'id_spp' => $id_spp
        );
        
        $this->M_KepalaSekolah->UpdateCekPengajua($where, $data, 'spp');
        // $this->session->set_flasdata('pesan',
        // '<div class="alert alert-success alert-dismissible fade show" role="alert">
        // Data Pengajuan Berhasil Di ubah
        // </div>');
        redirect('KepalaSekolah/CekPengajuan');
    }

    // public function _rulescekpengajuan(){
    //     $this->form_validation->set_rules('id_user', 'id_user', 'required');
    //     $this->form_validation->set_rules('nama', 'nama', 'required');
    //     $this->form_validation->set_rules('bulan', 'bulan', 'required');
    //     $this->form_validation->set_rules('nominal', 'nominal', 'required',[
    //         'matches' => 'Password Anda Tidak Cocok'
    //     ]);
    //     $this->form_validation->set_rules('nomor_rekening', 'nomor_rekening', 'required');
    //     $this->form_validation->set_rules('bukti_pembayaran', 'bukti_pembayaran', 'required');
    //     $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
    //     $this->form_validation->set_rules('agama', 'agama', 'required'); 
    //     $this->form_validation->set_rules('alamat', 'alamat', 'required');  
    //     $this->form_validation->set_rules('nomor_hp', 'nomor_hp', 'required');  
    //     $this->form_validation->set_rules('gaji_guru', 'gaji_guru', 'required');  
    // }

    public function LaporanUangMasukPrint()
    {
        $data['bop'] = $this->M_KepalaSekolah->GetUangMasuk('bop')->result();
        $this->load->view('templates/kepsek/laporanuangmasukprint',$data);
    }

    public function LaporanUangKeluarPrint()
    {
        $data['bop'] = $this->M_KepalaSekolah->GetUangKeluar('bop')->result();
        $this->load->view('templates/kepsek/laporanuangkeluarprint',$data);
    }

    public function LaporanSppPrint()
    {
        $data['spp'] = $this->M_KepalaSekolah->GetDataSpp('spp')->result();
        $this->load->view('templates/kepsek/laporanspp',$data);
    }

    public function Logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }
}