<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_keuangan extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->order_by('id_keuangan','desc');
            return $this->db->get('keuangan')->result();
        }else{
            $this->db->where('id_keuangan',$id);
            return $this->db->get('keuangan')->row();
        }
    }
    public function insert_data()
    {
        $data = [
			'keterangan' 	=> $this->input->post('keterangan',true),
			'harga'     	=> $this->input->post('harga',true),
			'tanggal' 	    => date('Y-m-d')
        ];
		$this->db->insert('keuangan',$data);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('keuangan');
    }
    public function edit_data()
    {
        $data = [
			'keterangan' 	=> $this->input->post('keterangan',true),
			'harga'     	=> $this->input->post('harga',true)
        ];
        $this->db->where('id_keuangan',$this->input->post('id'));
		$this->db->update('keuangan',$data);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('keuangan');
    }
    public function delete_keuangan($id)
    {
        $this->db->where('id_keuangan',$id);
        $this->db->delete('keuangan');
        $this->session->set_flashdata('pesan','Surat berhasil hapus');
        redirect('keuangan');
    }
}
