<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_dusun extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->select('dusun.*,provinsi.nama_provinsi,kota.nama_kota,kecamatan.nama_kecamatan,kelurahan.nama_kelurahan');
            $this->db->from('dusun');
            $this->db->join('kelurahan', 'kelurahan.id_kelurahan = dusun.id_kelurahan');
            $this->db->join('kecamatan', 'kelurahan.id_kecamatan = kecamatan.id_kecamatan');
            $this->db->join('kota', 'kecamatan.id_kota = kota.id_kota');
            $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
            $this->db->order_by('id_dusun','DESC');
            return $this->db->get()->result();
        }else{
            return $this->db->get_where('dusun',array('id_dusun'=>$id))->row();
        }
    }
    public function get_kelurahan()
    {
        return $this->db->get('kelurahan')->result();
    }
    public function insert_data()
    {
        $data = [
            'nama_dusun' => $this->input->post('dusun',true),
            'id_kelurahan' => $this->input->post('kelurahan',true)
        ];
        $this->db->insert('dusun',$data);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('dusun');
    }
    public function edit_data()
    {
        $data = [
            'nama_dusun' => $this->input->post('dusun',true),
            'id_kelurahan' => $this->input->post('kelurahan',true)
        ];
        $this->db->where('id_dusun',$this->input->post('id',true));
        $this->db->update('dusun',$data);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('dusun');
    }
    public function delete_data($id)
    {
        $this->db->where('id_dusun',$id);
        $this->db->delete('dusun');
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('dusun');
    }
}
