<?php

function Chek_Already_Login(){
    $ci = get_instance();
    $sess_data = $ci->session->set_userdata('id_user');
    if($sess_data){
        redirect('Login/ProsesLogin');
    }

    function Chek_Not_Login(){
        $ci = get_instance();
        $sess_data = $ci->session->set_userdata('id_user');
        if($sess_data){
            redirect('Login/index');
        }
    }
}