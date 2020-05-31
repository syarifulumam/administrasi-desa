<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_kader_pembangunan extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->order_by('id_kader_pembangunan','DESC');
            return $this->db->get('kader_pembangunan')->result();
        }else{
            return $this->db->get_where('kader_pembangunan',array('id_kader_pembangunan'=>$id))->row();
        }
    }
    public function insert_data()
    {
        $data = [
            'nama'	                => $this->input->post('nama_lengkap',true),
            'jenis_kelamin'	        => $this->input->post('kelamin',true),
            'tempat_lahir'	        => $this->input->post('tempat_lahir',true),
            'tanggal_lahir'	        => $this->input->post('tanggal_lahir',true),
            'pendidikan_terakhir'	=> $this->input->post('pendidikan',true),
            'pekerjaan'	            => $this->input->post('pekerjaan',true),
            'bidang'	            => $this->input->post('bidang',true),
            'alamat'	            => $this->input->post('alamat',true),
            'keterangan'	            => $this->input->post('keterangan',true),
			'foto' 		            => $this->_upload()
        ];
        //insert data pindahan
        $this->db->insert('kader_pembangunan',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data kader pembangunan',
            'url'        => 'kader_pembangunan',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('kader_pembangunan');
    }
    public function edit_data()
    {
        //validasi upload foto apakah user update foto atau tidak
        if (!empty($_FILES["dokumen"]["name"])) {
            $data_file = $this->_upload();
            //hapus file difolder
            unlink('upload/'.$this->input->post('file'));
        } else {
            $data_file = $this->input->post('file');
        }
        $data = [
            'nama'	                => $this->input->post('nama_lengkap',true),
            'jenis_kelamin'	        => $this->input->post('kelamin',true),
            'tempat_lahir'	        => $this->input->post('tempat_lahir',true),
            'tanggal_lahir'	        => $this->input->post('tanggal_lahir',true),
            'pendidikan_terakhir'	=> $this->input->post('pendidikan',true),
            'pekerjaan'	            => $this->input->post('pekerjaan',true),
            'bidang'	            => $this->input->post('bidang',true),
            'alamat'	            => $this->input->post('alamat',true),
            'keterangan'	            => $this->input->post('keterangan',true),
			'foto' 		            => $data_file
        ];
        
        $this->db->where('id_kader_pembangunan',$this->input->post('id'));
		$this->db->update('kader_pembangunan',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'edit data kader pembangunan',
            'url'        => 'kader_pembangunan',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('kader_pembangunan');
    }
    public function delete_data($id)
    {
        $this->db->where('id_kader_pembangunan',$id);
        $this->db->delete('kader_pembangunan');
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'hapus data kader pembangunan',
            'url'        => 'kader_pembangunan',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('kader_pembangunan');
    }
    private function _upload(){
        //upload foto
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'jpg|png|doc|pdf';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
        $config['max_height']           = 768;
        //load library
		$this->load->library('upload', $config);
		// validasi upload foto 
		if ($this->upload->do_upload('dokumen')) {
            return $this->upload->data("file_name");
        }
        
        return "avatar.jpg";
        
    } 
}
