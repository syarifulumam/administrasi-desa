<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_kegiatan_pembangunan extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->order_by('id_kegiatan_pembangunan','DESC');
            return $this->db->get('kegiatan_pembangunan')->result();
        }else{
            return $this->db->get_where('kegiatan_pembangunan',array('id_kegiatan_pembangunan'=>$id))->row();
        }
    }
    public function insert_data()
    {
        $data = [
			'lokasi' 	              => $this->input->post('lokasi',true),
			'volume' 	              => $this->input->post('volume',true),
			'sifat_proyek' 	          => $this->input->post('sifat_proyek',true),
			'pelaksana' 	          => $this->input->post('pelaksana',true),
			'keterangan' 	          => $this->input->post('keterangan',true),
			'nama_proyek' 	          => $this->input->post('nama_proyek',true),
			'sumber_dana_kota' 	      => $this->input->post('dana_kota',true),
			'sumber_dana_swadaya' 	  => $this->input->post('dana_swadaya',true),
			'sumber_dana_provinsi' 	  => $this->input->post('dana_provinsi',true),
			'waktu_pelaksanaan' 	  => $this->input->post('waktu_pelaksanaan',true),
			'sumber_dana_pemerintah'  => $this->input->post('dana_pemerintah',true),
        ];
		$this->db->insert('kegiatan_pembangunan',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data kegiatan pembangunan',
            'url'        => 'kegiatan_pembangunan',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('kegiatan_pembangunan');
    }
    public function edit_data()
    {
        $data = [
			'lokasi' 	              => $this->input->post('lokasi',true),
			'volume' 	              => $this->input->post('volume',true),
			'sifat_proyek' 	          => $this->input->post('sifat_proyek',true),
			'pelaksana' 	          => $this->input->post('pelaksana',true),
			'keterangan' 	          => $this->input->post('keterangan',true),
			'nama_proyek' 	          => $this->input->post('nama_proyek',true),
			'sumber_dana_kota' 	      => $this->input->post('dana_kota',true),
			'sumber_dana_swadaya' 	  => $this->input->post('dana_swadaya',true),
			'sumber_dana_provinsi' 	  => $this->input->post('dana_provinsi',true),
			'waktu_pelaksanaan' 	  => $this->input->post('waktu_pelaksanaan',true),
			'sumber_dana_pemerintah'  => $this->input->post('dana_pemerintah',true),
        ];
        $this->db->where('id_kegiatan_pembangunan',$this->input->post('id'));
		$this->db->update('kegiatan_pembangunan',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'edit data kegiatan pembangunan',
            'url'        => 'kegiatan_pembangunan',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('kegiatan_pembangunan');
    }
    public function delete_data($id)
    {
        $this->db->where('id_kegiatan_pembangunan',$id);
        $this->db->delete('kegiatan_pembangunan');
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'hapus data kegiatan pembangunan',
            'url'        => 'kegiatan_pembangunan',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('kegiatan_pembangunan');
    } 
}
