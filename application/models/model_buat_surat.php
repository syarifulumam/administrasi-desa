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
            return $this->db->get()->result();
        }else{
            return $this->db->get_where('kelahiran',array('id_kelahiran'=>$id))->row();
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
			'agama' 		=> $this->input->post('agama',true),
			'anak_ke_berapa'=> $this->input->post('anak_ke',true),
			'nama_ibu' 		=> $this->input->post('nama_ibu',true),
			'no_kk' 		=> $this->input->post('nomor_kk',true),
			'nama_ayah' 	=> $this->input->post('nama_ayah',true),
			'no_akte' 		=> $this->input->post('nomor_akte',true),
			'nama' 		    => $this->input->post('nama_balita',true),
			'tempat_lahir' 	=> $this->input->post('tempat_lahir',true),
			'tanggal_lahir' => $this->input->post('tanggal_lahir',true),
			'jenis_kelamin' => $this->input->post('jenis_kelamin',true)
        ];
		$this->db->insert('kelahiran',$data);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('kelahiran');
    }
    public function edit_data()
    {
        $data = [
			'agama' 		=> $this->input->post('agama',true),
			'anak_ke_berapa'=> $this->input->post('anak_ke',true),
			'nama_ibu' 		=> $this->input->post('nama_ibu',true),
			'no_kk' 		=> $this->input->post('nomor_kk',true),
			'nama_ayah' 	=> $this->input->post('nama_ayah',true),
			'no_akte' 		=> $this->input->post('nomor_akte',true),
			'nama' 		    => $this->input->post('nama_balita',true),
			'tempat_lahir' 	=> $this->input->post('tempat_lahir',true),
			'tanggal_lahir' => $this->input->post('tanggal_lahir',true),
			'jenis_kelamin' => $this->input->post('jenis_kelamin',true)
        ];
        $this->db->where('id_kelahiran',$this->input->post('id'));
		$this->db->update('kelahiran',$data);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('kelahiran');
    }
    public function delete_data($id)
    {
        $this->db->where('id_kelahiran',$id);
        $this->db->delete('kelahiran');
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('kelahiran');
    }
}
