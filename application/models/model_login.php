<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_login extends CI_Model {
    public function proses_login()
    {
        $username    = $this->input->post('username');
        $password = $this->input->post('password');
        $cek_akun = $this->db->get_where('users',array('username'=>$username));

        //validasi data user
        if ($cek_akun->num_rows() != null) {
            //validasi password
            if (password_verify($password,$cek_akun->row()->password)) {
                //validasi status akun
                if ($cek_akun->row()->status == 1) {
                    $this->session->set_userdata('id',$cek_akun->row()->id_user);
                    $this->session->set_userdata('nama',$cek_akun->row()->nama);
                    //validasi level akun
                    if ($cek_akun->row()->level == "Admin") {
                        redirect('users');
                    } else {
                        redirect('users');
                    }
                    
                } else {
                    $this->session->set_flashdata('pesan','<b>Akun</b> di nonaktifkan');
                }
                
            } else {
                $this->session->set_flashdata('pesan','<b>Password</b> salah');
            }
        } else {
            $this->session->set_flashdata('pesan','<b>Username</b> tidak terdaftar');
        }
    } 
}
