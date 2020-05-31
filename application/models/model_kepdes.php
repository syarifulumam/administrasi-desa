<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_kepdes extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->order_by('id_kepala_desa','DESC');
            return $this->db->get('kepala_desa')->result();
        }else{
            return $this->db->get_where('kepala_desa',array('id_kepala_desa'=>$id))->row();
        }
    }
    public function insert_data()
    {
        $data = [
            'uraian_singkat'	     => $this->input->post('uraian',true),
			'tentang'	             => $this->input->post('tentang',true),
			'keterangan'	         => $this->input->post('keterangan',true),
			'nomor_kepala_desa'	 => $this->input->post('nomor_kepdes',true),
			'nomor_dilaporkan'	     => $this->input->post('nomor_laporkan',true),
			'tanggal_dilaporkan'	 => $this->input->post('tanggal_dilaporkan',true),
			'file_dokumen' 		     => $this->_upload()
        ];
        //insert data pindahan
        $this->db->insert('kepala_desa',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data kepdes',
            'url'        => 'kepdes',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('kepdes');
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
            'uraian_singkat'	     => $this->input->post('uraian',true),
			'tentang'	             => $this->input->post('tentang',true),
			'keterangan'	         => $this->input->post('keterangan',true),
			'nomor_kepala_desa'	     => $this->input->post('nomor_kepdes',true),
			'nomor_dilaporkan'	     => $this->input->post('nomor_laporkan',true),
			'tanggal_dilaporkan'	 => $this->input->post('tanggal_dilaporkan',true),
			'file_dokumen' 		     => $data_file
        ];
        
        $this->db->where('id_kepala_desa',$this->input->post('id'));
		$this->db->update('kepala_desa',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'edit data kepdes',
            'url'        => 'kepdes',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('kepdes');
    }
    public function delete_data($id)
    {
        $this->db->where('id_kepala_desa',$id);
        $this->db->delete('kepala_desa');
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'hapus data kepdes',
            'url'        => 'kepdes',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('kepdes');
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
