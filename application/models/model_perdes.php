<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_perdes extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->order_by('id_peraturan_desa','DESC');
            return $this->db->get('peraturan_desa')->result();
        }else{
            return $this->db->get_where('peraturan_desa',array('id_peraturan_desa'=>$id))->row();
        }
    }
    public function insert_data()
    {
        $data = [
            'uraian_singkat'	     => $this->input->post('uraian',true),
			'tentang'	             => $this->input->post('tentang',true),
			'keterangan'	         => $this->input->post('keterangan',true),
			'nomor_peraturan_desa'	 => $this->input->post('nomor_perdes',true),
			'tanggal_peraturan_desa' => $this->input->post('tanggal_perdes',true),
			'nomor_dilaporkan'	     => $this->input->post('nomor_laporkan',true),
			'tanggal_dilaporkan'	 => $this->input->post('tanggal_dilaporkan',true),
			'nomor_persetujuan_BPD'	 => $this->input->post('nomor_persetujuan_bpd',true),
			'tanggal_persetujuan_BPD'=> $this->input->post('tanggal_persetujuan_bpd',true),
			'file_dokumen' 		     => $this->_upload()
        ];
        //insert data pindahan
        $this->db->insert('peraturan_desa',$data);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('perdes');
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
			'nomor_peraturan_desa'	 => $this->input->post('nomor_perdes',true),
			'tanggal_peraturan_desa' => $this->input->post('tanggal_perdes',true),
			'nomor_dilaporkan'	     => $this->input->post('nomor_laporkan',true),
			'tanggal_dilaporkan'	 => $this->input->post('tanggal_dilaporkan',true),
			'nomor_persetujuan_BPD'	 => $this->input->post('nomor_persetujuan_bpd',true),
			'tanggal_persetujuan_BPD'=> $this->input->post('tanggal_persetujuan_bpd',true),
			'file_dokumen' 		     => $data_file
        ];
        
        $this->db->where('id_peraturan_desa',$this->input->post('id'));
		$this->db->update('peraturan_desa',$data);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('perdes');
    }
    public function delete_data($id)
    {
        $this->db->where('id_peraturan_desa',$id);
        $this->db->delete('peraturan_desa');
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('perdes');
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
