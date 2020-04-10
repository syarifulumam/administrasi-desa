<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_inventaris_proyek extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->order_by('id_inventaris_proyek','DESC');
            return $this->db->get('inventaris_proyek')->result();
        }else{
            return $this->db->get_where('inventaris_proyek',array('id_inventaris_proyek'=>$id))->row();
        }
    }
    public function insert_data()
    {
        $data = [
			'biaya' 	      => $this->input->post('biaya',true),
			'lokasi' 	      => $this->input->post('lokasi',true),
			'volume' 	      => $this->input->post('volume',true),
			'keterangan' 	  => $this->input->post('keterangan',true),
			'nama_proyek' 	  => $this->input->post('nama_proyek',true),
        ];
		$this->db->insert('inventaris_proyek',$data);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('inventaris_proyek');
    }
    public function edit_data()
    {
        $data = [
			'biaya' 	      => $this->input->post('biaya',true),
			'lokasi' 	      => $this->input->post('lokasi',true),
			'volume' 	      => $this->input->post('volume',true),
			'keterangan' 	  => $this->input->post('keterangan',true),
			'nama_proyek' 	  => $this->input->post('nama_proyek',true),
        ];
        $this->db->where('id_inventaris_proyek',$this->input->post('id'));
		$this->db->update('inventaris_proyek',$data);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('inventaris_proyek');
    }
    public function delete_data($id)
    {
        $this->db->where('id_inventaris_proyek',$id);
        $this->db->delete('inventaris_proyek');
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('inventaris_proyek');
    } 
}
