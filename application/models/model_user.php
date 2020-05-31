<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_user extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            return $this->db->get('users')->result();
        }else{
            return $this->db->get_where('users',array('id_user'=>$id))->row();
        }
    }
    public function insert_data()
    {
        $data = [
            'nama' 		=> $this->input->post('nama',true),
			'username'	=> $this->input->post('username',true),
			'level'	    => $this->input->post('level_user',true),
			'password' 	=> password_hash($this->input->post('password',true),PASSWORD_DEFAULT),
			'foto' 		=> $this->_upload()
        ];
        $this->db->insert('users',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data user',
            'url'        => 'users',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('users');
    }
    public function edit_data()
    {
        //validasi upload foto
        if (!empty($_FILES["foto"]["name"])) {
            $data_foto = $this->_upload();
            //hapus file difolder
            unlink('upload/'.$this->input->post('foto_db'));
        } else {
            $data_foto = $this->input->post('foto_db');
        }
        $data = [
			'nama' 		=> $this->input->post('nama',true),
			'status'	=> $this->input->post('status',true),
			'username'	=> $this->input->post('username',true),
			'level'	    => $this->input->post('level_user',true),
			'foto' 		=> $data_foto
        ];
        $this->db->where('id_user',$this->input->post('id'));
        $this->db->update('users',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'edit data user',
            'url'        => 'users',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('users');
    }
    public function delete_data($id)
    {
        $this->db->where('id_user',$id);
        $this->db->delete('users');
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'hapus data user',
            'url'        => 'users',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('users');
    }
    private function _upload(){
        //upload foto
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
        $config['max_height']           = 768;
        //load library
		$this->load->library('upload', $config);
		// validasi upload foto 
		if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }
        
        return "avatar.jpg";
        
    } 
}
