<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_kelahiran extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->order_by('id_kelahiran','DESC');
            return $this->db->get('kelahiran')->result();
        }else{
            return $this->db->get_where('kelahiran',array('id_kelahiran'=>$id))->row();
        }
    }
    public function get_data_ayah()
    {
        return $this->db->get_where('penduduk',array('jenis_kelamin'=>'Laki - Laki'))->result();
    }
    public function get_data_ibu()
    {
        return $this->db->get_where('penduduk',array('jenis_kelamin'=>'Perempuan'))->result();
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
