<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_rencana_pembangunan extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->order_by('id_rencana_pembangunan','DESC');
            return $this->db->get('rencana_pembangunan')->result();
        }else{
            return $this->db->get_where('rencana_pembangunan',array('id_rencana_pembangunan'=>$id))->row();
        }
    }
    public function insert_data()
    {
        $data = [
			'lokasi' 	  => $this->input->post('lokasi',true),
			'manfaat' 	  => $this->input->post('manfaat',true),
			'pelaksana' 	  => $this->input->post('pelaksana',true),
			'keterangan' 	  => $this->input->post('keterangan',true),
			'nama_proyek' 	  => $this->input->post('nama_proyek',true),
			'sumber_dana_kota' 	  => $this->input->post('dana_kota',true),
			'sumber_dana_swadaya' 	  => $this->input->post('dana_swadaya',true),
			'sumber_dana_provinsi' 	  => $this->input->post('dana_provinsi',true),
			'sumber_dana_pemerintah' 	  => $this->input->post('dana_pemerintah',true),
        ];
		$this->db->insert('rencana_pembangunan',$data);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('rencana_pembangunan');
    }
    public function edit_data()
    {
        $data = [
			'lokasi' 	  => $this->input->post('lokasi',true),
			'manfaat' 	  => $this->input->post('manfaat',true),
			'pelaksana' 	  => $this->input->post('pelaksana',true),
			'keterangan' 	  => $this->input->post('keterangan',true),
			'nama_proyek' 	  => $this->input->post('nama_proyek',true),
			'sumber_dana_kota' 	  => $this->input->post('dana_kota',true),
			'sumber_dana_swadaya' 	  => $this->input->post('dana_swadaya',true),
			'sumber_dana_provinsi' 	  => $this->input->post('dana_provinsi',true),
			'sumber_dana_pemerintah' 	  => $this->input->post('dana_pemerintah',true),
        ];
        $this->db->where('id_rencana_pembangunan',$this->input->post('id'));
		$this->db->update('rencana_pembangunan',$data);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('rencana_pembangunan');
    }
    public function delete_data($id)
    {
        $this->db->where('id_rencana_pembangunan',$id);
        $this->db->delete('rencana_pembangunan');
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('rencana_pembangunan');
    } 
}
