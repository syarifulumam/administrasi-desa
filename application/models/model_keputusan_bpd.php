<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_keputusan_bpd extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->order_by('id_keputusan_bpd','DESC');
            return $this->db->get('keputusan_bpd')->result();
        }else{
            return $this->db->get_where('keputusan_bpd',array('id_keputusan_bpd'=>$id))->row();
        }
    }
    public function insert_data()
    {
        $tanggal =  str_replace('/', '-',$this->input->post('tanggal',true));
        $data = [
            'uraian_singkat'	     => $this->input->post('uraian',true),
			'tentang'	             => $this->input->post('tentang',true),
			'keterangan'	         => $this->input->post('keterangan',true),
			'nomor_keputusan'	     => $this->input->post('nomor_keputusan',true),
			'tanggal'	             => date('Y-m-d', strtotime($tanggal)),
			'file_dokumen' 		     => $this->_upload()
        ];
        //insert data pindahan
        $this->db->insert('keputusan_bpd',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data keputusan bpd',
            'url'        => 'keputusan_bpd',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('keputusan_bpd');
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
        $tanggal =  str_replace('/', '-',$this->input->post('tanggal',true));
        $data = [
            'uraian_singkat'	     => $this->input->post('uraian',true),
			'tentang'	             => $this->input->post('tentang',true),
			'keterangan'	         => $this->input->post('keterangan',true),
			'nomor_keputusan'	 => $this->input->post('nomor_keputusan',true),
			'tanggal'	             => date('Y-m-d', strtotime($tanggal)),
			// 'file_dokumen' 		     => $data_file
        ];
        
        $this->db->where('id_keputusan_bpd',$this->input->post('id'));
		$this->db->update('keputusan_bpd',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'edit data keputusan bpd',
            'url'        => 'keputusan_bpd',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('keputusan_bpd');
    }
    public function delete_data($id)
    {
        $this->db->where('id_keputusan_bpd',$id);
        $this->db->delete('keputusan_bpd');
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'hapus data keputusan bpd',
            'url'        => 'keputusan_bpd',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('keputusan_bpd');
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
