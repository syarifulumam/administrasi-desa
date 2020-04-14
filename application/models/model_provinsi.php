<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_provinsi extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->order_by('id_provinsi','DESC');
            return $this->db->get('provinsi')->result();
        }else{
            return $this->db->get_where('provinsi',array('id_provinsi'=>$id))->row();
        }
    }
    public function insert_data()
    {
        $this->db->insert('provinsi',array('nama_provinsi'=>$this->input->post('nama_provinsi',true)));
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('provinsi');
    }
    public function edit_data()
    {
        $this->db->where('id_provinsi',$this->input->post('id',true));
        $this->db->update('provinsi',array('nama_provinsi'=>$this->input->post('nama_provinsi',true)));
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('provinsi');
    }
    public function delete_data($id)
    {
        $this->db->where('id_provinsi',$id);
        $this->db->delete('provinsi');
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('provinsi');
    }
}
