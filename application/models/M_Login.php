<?php

class M_Login extends CI_Model{

    public function CekLogin($id, $pass){
        
        $this->db->where("id_user", $id);
        $this->db->where("password", $pass);

        return $this->db->get('user');
    }

    public function GetUser($id_user){
        return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
    }

    public function GetLogin($id, $pass){
        $id_user = $id;
        $pass_user = $pass;

        $query = $this->db->get_where('user', array('id_user'  => $id_user, 'password' => $pass_user));

        if (count($query->result())>= 1){
            foreach ($query->result() as $query_cek){
                foreach ($query->result() as $ck){
                    $sess_data ['logged_in'] = TRUE;
                    $sess_data ['id_user'] = $ck->id_user;
                    $sess_data ['password'] = $ck->password;
                    $sess_data ['id_role'] = $ck->id_role;
                    $this->session->set_userdata($sess_data);
                }
                redirect('templates/siswa');
            }
        }elseif (count($query->result())>= 1){
            foreach ($query->result() as $query_cek){
                foreach ($query->result() as $ck){
                    $sess_data ['logged_in'] = TRUE;
                    $sess_data ['id_user'] = $ck->id_user;
                    $sess_data ['password'] = $ck->password;
                    $sess_data ['id_role'] = $ck->id_role;
                    $this->session->set_userdata($sess_data);
                }
                redirect('templates/guru');
            }
        }elseif (count($query->result())>= 1){
            foreach ($query->result() as $query_cek){
                foreach ($query->result() as $cek){
                    $sess_data ['logged_in'] = TRUE;
                    $sess_data ['id_user'] = $cek->id_user;
                    $sess_data ['password'] = $cek->password;
                    $sess_data ['id_role'] = $cek->id_role;
                    $this->session->set_userdata($sess_data);
                }
                redirect('templates/kepalasekolah');
            }
        }else {
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