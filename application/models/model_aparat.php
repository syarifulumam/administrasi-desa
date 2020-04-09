<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_aparat extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->order_by('id_aparat','DESC');
            return $this->db->get('aparat')->result();
        }else{
            return $this->db->get_where('aparat',array('id_aparat'=>$id))->row();
        }
    }
    public function insert_data()
    {
        $data = [
            'nip'	                => $this->input->post('nip',true),
            'niap'	                => $this->input->post('niap',true),
            'agama'	                => $this->input->post('agama',true),
            'jabatan'	            => $this->input->post('jabatan',true),
            'pangkat'	            => $this->input->post('pangkat',true),
            'keaktifan'	            => $this->input->post('keaktifan',true),
            'keterangan'	        => $this->input->post('keterangan',true),
            'pendidikan_terakhir'	=> $this->input->post('pendidikan',true),
            'nama_lengkap'	        => $this->input->post('nama_lengkap',true),
            'tempat_lahir'	        => $this->input->post('tempat_lahir',true),
            'tanggal_lahir'	        => $this->input->post('tanggal_lahir',true),
            'nomor_pengangkatan'	=> $this->input->post('nomor_pengangkatan',true),
            'tanggal_pengangkatan'	=> $this->input->post('tanggal_pengangkatan',true),
            'nomor_pemberhentian'	=> $this->input->post('nomor_pemberhentian',true),
            'tanggal_pemberhentian'	=> $this->input->post('tanggal_pemberhentian',true),
			'foto' 		            => $this->_upload()
        ];
        //insert data pindahan
        $this->db->insert('aparat',$data);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('aparat');
    }
    public function edit_data()
    {
        //validasi upload foto apakah user update foto atau tidak
        if (!empty($_FILES["foto"]["name"])) {
            $data_file = $this->_upload();
            //hapus file difolder
            unlink('upload/'.$this->input->post('foto_db'));
        } else {
            $data_file = $this->input->post('foto_db');
        }
        $data = [
            'nip'	                => $this->input->post('nip',true),
            'niap'	                => $this->input->post('niap',true),
            'agama'	                => $this->input->post('agama',true),
            'jabatan'	            => $this->input->post('jabatan',true),
            'pangkat'	            => $this->input->post('pangkat',true),
            'keaktifan'	            => $this->input->post('keaktifan',true),
            'keterangan'	        => $this->input->post('keterangan',true),
            'pendidikan_terakhir'	=> $this->input->post('pendidikan',true),
            'nama_lengkap'	        => $this->input->post('nama_lengkap',true),
            'tempat_lahir'	        => $this->input->post('tempat_lahir',true),
            'tanggal_lahir'	        => $this->input->post('tanggal_lahir',true),
            'nomor_pengangkatan'	=> $this->input->post('nomor_pengangkatan',true),
            'tanggal_pengangkatan'	=> $this->input->post('tanggal_pengangkatan',true),
            'nomor_pemberhentian'	=> $this->input->post('nomor_pemberhentian',true),
            'tanggal_pemberhentian'	=> $this->input->post('tanggal_pemberhentian',true),
			'foto' 		            => $data_file
        ];
        
        $this->db->where('id_aparat',$this->input->post('id'));
		$this->db->update('aparat',$data);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('aparat');
    }
    public function delete_data($id)
    {
        $this->db->where('id_aparat',$id);
        $this->db->delete('aparat');
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('aparat');
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
