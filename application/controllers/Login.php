<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        if(isset($this->session->userdata['id_user'])){
            redirect('KepalaSekolah');
        }
}

    public function index(){
        //Chek_Already_Login();
        $this->load->view('templates/login1.php');
    }

    public function ProsesLogin(){
        
        $this->form_validation->set_rules('id_user','id_user',
        'required', [
            'required' => 'Id User Wajib Di Isi!'
        ]);
        $this->form_validation->set_rules('password','password',
        'required',[
            'required' => 'Password Wajib Di Isi!'
        ]);
        
        if ($this->form_validation->run()==false)
        {
            $this->load->view('templates/login1.php');
        }
        else 
        {
            $id_user = htmlspecialchars($this->input->post('id_user', TRUE)) ;
            $password = htmlspecialchars($this->input->post('password', TRUE)) ;

            $id = $id_user;
            $pass = $password;

            $cek = $this->M_Login->CekLogin($id, $pass);

            if ($cek->num_rows() >= 1)
            {
                foreach ($cek->result() as $ceklogin){
                    $sess_data['id_user'] = $ceklogin->id_user;
                    $sess_data['pass'] = $ceklogin->password;
                    $sess_data['nama'] = $ceklogin->nama;
                    $sess_data['foto'] = $ceklogin->foto;
                    $sess_data['id_role'] = $ceklogin->id_role;

                    $this->session->set_userdata($sess_data);
                }
                if($sess_data['id_role'] == '3'){
                    redirect('Siswa');
                }
                elseif($sess_data['id_role'] == '2')
                {
                    redirect('Guru');
                }elseif($sess_data['id_role'] == '1')
                {
                    redirect('KepalaSekolah');
                }else
                {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Id Atau Password Anda Salah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                    redirect('Login');
                }
                
            }else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Id Atau Password Anda Salah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                    redirect('Login');
            }
        }
    }

    public function ForgotPassword(){
        $this->load->view('forgotpassword');
    }



}