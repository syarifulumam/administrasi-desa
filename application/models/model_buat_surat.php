<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_buat_surat extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->select('surat.*,penduduk.nama_lengkap,master_surat.nama_surat_dinas');
            $this->db->from('surat');
            $this->db->join('penduduk', 'surat.id_penduduk = penduduk.id_penduduk');
            $this->db->join('master_surat', 'master_surat.id_master_surat = surat.id_master_surat');
            $this->db->order_by('id_surat','DESC');
            return $this->db->get()->result();
        }else{
            $this->db->select('surat.*,penduduk.*,master_surat.nama_surat_dinas');
            $this->db->from('surat');
            $this->db->join('penduduk', 'surat.id_penduduk = penduduk.id_penduduk');
            $this->db->join('master_surat', 'master_surat.id_master_surat = surat.id_master_surat');
            $this->db->where('id_surat',$id);
            return $this->db->get()->row();
        }
    }
    public function get_data_penduduk()
    {
        return $this->db->get('penduduk')->result();
    }
    public function get_master_surat()
    {
        return $this->db->get('master_surat')->result();
    }
    public function insert_data()
    {
        $data = [
			'tanggal_surat' 	=> $this->input->post('tanggal_surat',true),
			'id_penduduk' 		=> $this->input->post('nama',true),
			'id_master_surat' 	=> $this->input->post('jenis_surat',true),
			'no_surat'       	=> date('ynjhis')
        ];
		$this->db->insert('surat',$data);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('buat_surat');
    }
    public function edit_data()
    {
        $data = [
			'tanggal_surat' 	=> $this->input->post('tanggal_surat',true),
			'id_penduduk' 		=> $this->input->post('nama',true),
			'id_master_surat' 	=> $this->input->post('jenis_surat',true),
			'no_surat'       	=> date('ynjhis')
        ];
        $this->db->where('id_surat',$this->input->post('id'));
		$this->db->update('surat',$data);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('buat_surat');
    }
    public function delete_data($id)
    {
        $this->db->where('id_surat',$id);
        $this->db->delete('surat');
        $this->session->set_flashdata('pesan','Surat berhasil hapus');
        redirect('buat_surat');
    }
}
