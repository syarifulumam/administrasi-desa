<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_kota extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->select('kota.*,provinsi.nama_provinsi');
            $this->db->from('kota');
            $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
            $this->db->order_by('id_kota','DESC');
            return $this->db->get()->result();
        }else{
            return $this->db->get_where('kota',array('id_kota'=>$id))->row();
        }
    }
    public function get_provinsi()
    {
        return $this->db->get('provinsi')->result();
    }
    public function insert_data()
    {
        $data = [
            'nama_kota' => $this->input->post('kota',true),
            'id_provinsi' => $this->input->post('provinsi',true)
        ];
        $this->db->insert('kota',$data);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('kota');
    }
    public function edit_data()
    {
        $data = [
            'nama_kota' => $this->input->post('kota',true),
            'id_provinsi' => $this->input->post('provinsi',true)
        ];
        $this->db->where('id_kota',$this->input->post('id',true));
        $this->db->update('kota',$data);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('kota');
    }
    public function delete_data($id)
    {
        $this->db->where('id_kota',$id);
        $this->db->delete('kota');
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('kota');
    }
}
