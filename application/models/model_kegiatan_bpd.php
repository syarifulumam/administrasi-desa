<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_kegiatan_bpd extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->order_by('id_kegiatan_bpd','DESC');
            return $this->db->get('kegiatan_bpd')->result();
        }else{
            return $this->db->get_where('kegiatan_bpd',array('id_kegiatan_bpd'=>$id))->row();
        }
    }
    public function insert_data()
    {
        $data = [
            'pelaksana'	             => $this->input->post('pelaksana',true),
			'tentang'	             => $this->input->post('tentang',true),
			'keterangan'	         => $this->input->post('keterangan',true),
			'pokok'	                 => $this->input->post('pokok',true),
			'hasil_kegiatan'	     => $this->input->post('hasil_kegiatan',true),
			'tanggal'	             => $this->input->post('tanggal',true),
			'file_dokumen' 		     => $this->_upload()
        ];
        //insert data pindahan
        $this->db->insert('kegiatan_bpd',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data kegiatan bpd',
            'url'        => 'kegiatan_bpd',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('kegiatan_bpd');
    }
    public function edit_data()
    {
        //validasi upload foto apakah user update foto atau tidak
        // if (!empty($_FILES["dokumen"]["name"])) {
        //     $data_file = $this->_upload();
        //     //hapus file difolder
        //     unlink('upload/'.$this->input->post('file'));
        // } else {
        //     $data_file = $this->input->post('file');
        // }
        $data = [
            'pelaksana'	             => $this->input->post('pelaksana',true),
			'tentang'	             => $this->input->post('tentang',true),
			'keterangan'	         => $this->input->post('keterangan',true),
			'pokok'	                 => $this->input->post('pokok',true),
			'hasil_kegiatan'	     => $this->input->post('hasil_kegiatan',true),
			'tanggal'	             => $this->input->post('tanggal',true),
			// 'file_dokumen' 		     => $data_file
        ];
        
        $this->db->where('id_kegiatan_bpd',$this->input->post('id'));
		$this->db->update('kegiatan_bpd',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'edit data kegiatan bpd',
            'url'        => 'kegiatan_bpd',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('kegiatan_bpd');
    }
    public function delete_data($id)
    {
        $this->db->where('id_kegiatan_bpd',$id);
        $this->db->delete('kegiatan_bpd');
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'hapus data kegiatan bpd',
            'url'        => 'kegiatan_bpd',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('kegiatan_bpd');
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
