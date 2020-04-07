<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_pindahan extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->select('*');
            $this->db->from('pindah_kependudukan');
            $this->db->join('penduduk', 'pindah_kependudukan.id_penduduk = penduduk.id_penduduk');
            $this->db->order_by("id_pindah_kependudukan",'DESC');
            return $this->db->get()->result();
        }else{
            $this->db->select('*');
            $this->db->from('pindah_kependudukan');
            $this->db->join('penduduk', 'pindah_kependudukan.id_penduduk = penduduk.id_penduduk');
            $this->db->where('id_pindah_kependudukan',$id);
            return $this->db->get()->row();
   
        }
    }
    public function get_data_penduduk()
    {
        $this->db->select('nama_lengkap,id_penduduk');
        return $this->db->get('penduduk')->result();
    }
    public function insert_data()
    {
        $data = [
			'id_penduduk' 	  => $this->input->post('nama',true),
			'alamat_pindahan' => $this->input->post('alamat',true),
			'keterangan' 	  => $this->input->post('keterangan',true),
			'tanggal_pindah'  => $this->input->post('tanggal_pindahan',true),
        ];
		$this->db->insert('pindah_kependudukan',$data);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('pindahan');
    }
    public function edit_data()
    {
        $data = [
			'id_penduduk' 	  => $this->input->post('nama',true),
			'alamat_pindahan' => $this->input->post('alamat',true),
			'keterangan' 	  => $this->input->post('keterangan',true),
			'tanggal_pindah'  => $this->input->post('tanggal_pindahan',true),
        ];
        $this->db->where('id_pindah_kependudukan',$this->input->post('id'));
		$this->db->update('pindah_kependudukan',$data);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('pindahan');
    }
    public function delete_data($id)
    {
        $this->db->where('id_pindah_kependudukan',$id);
        $this->db->delete('pindah_kependudukan');
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('pindahan');
    } 
}
