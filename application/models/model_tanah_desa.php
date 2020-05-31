<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_tanah_desa extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->order_by('id_tanah_desa','DESC');
            return $this->db->get('tanah_desa')->result();
        }else{
            return $this->db->get_where('tanah_desa',array('id_tanah_desa'=>$id))->row();
        }
    }
    public function insert_data()
    {
        $data = [
			'nama_perorangan' 		       => $this->input->post('nama_perorangan',true),
			'badan_hukum' 		           => $this->input->post('badan_hukum',true),
			'jumlah_luas_tanah' 		   => $this->input->post('jumlah_luas_tanah',true),
			'sertifikasi' 		           => $this->input->post('sertifikasi',true),
			'hm' 		                   => $this->input->post('hm',true),
			'hgb' 		                   => $this->input->post('hgb',true),
			'hp' 		                   => $this->input->post('hp',true),
			'hgu' 		                   => $this->input->post('hgu',true),
			'hpl' 		                   => $this->input->post('hpl',true),
			'ma' 		                   => $this->input->post('ma',true),
			'vi' 		                   => $this->input->post('vi',true),
			'tn' 		                   => $this->input->post('tn',true),
			'tanah_rumah'    	           => $this->input->post('pengguna_tanah_perumahan',true),
			'tanah_perorangan'             => $this->input->post('pengguna_tanah_perorangan',true),
			'tanah_perdagangan'            => $this->input->post('pengguna_tanah_perdagangan',true),
			'tanah_perkantoran'            => $this->input->post('pengguna_tanah_perkantoran',true),
			'tanah_industri' 	           => $this->input->post('pengguna_tanah_industri',true),
			'tanah_fasilitas_umum' 		           => $this->input->post('pengguna_tanah_umum',true),
			'tanah_sawah' 		           => $this->input->post('pengguna_tanah_sawah',true),
			'tanah_tegalan' 	           => $this->input->post('pengguna_tanah_tegalan',true),
			'tanah_perkebunan'             => $this->input->post('pengguna_tanah_perkebunan',true),
			'tanah_pertenakan'             => $this->input->post('pengguna_tanah_pertenakan',true),
			'tanah_hutan' 		           => $this->input->post('pengguna_tanah_hutan',true),
			'tanah_kosong' 	               => $this->input->post('pengguna_tanah_kosong',true),
			'keterangan' 		           => $this->input->post('keterangan',true),
        ];
		$this->db->insert('tanah_desa',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data tanah desa',
            'url'        => 'tanah_desa',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('tanah_desa');
    }
    public function edit_data()
    {
        $data = [
			'nama_perorangan' 		       => $this->input->post('nama_perorangan',true),
			'badan_hukum' 		           => $this->input->post('badan_hukum',true),
			'jumlah_luas_tanah' 		   => $this->input->post('jumlah_luas_tanah',true),
			'sertifikasi' 		           => $this->input->post('sertifikasi',true),
			'hm' 		                   => $this->input->post('hm',true),
			'hgb' 		                   => $this->input->post('hgb',true),
			'hp' 		                   => $this->input->post('hp',true),
			'hgu' 		                   => $this->input->post('hgu',true),
			'hpl' 		                   => $this->input->post('hpl',true),
			'ma' 		                   => $this->input->post('ma',true),
			'vi' 		                   => $this->input->post('vi',true),
			'tn' 		                   => $this->input->post('tn',true),
			'tanah_rumah'    	           => $this->input->post('pengguna_tanah_perumahan',true),
			'tanah_perorangan'             => $this->input->post('pengguna_tanah_perorangan',true),
			'tanah_perdagangan'            => $this->input->post('pengguna_tanah_perdagangan',true),
			'tanah_perkantoran'            => $this->input->post('pengguna_tanah_perkantoran',true),
			'tanah_industri' 	           => $this->input->post('pengguna_tanah_industri',true),
			'tanah_fasilitas_umum' 		           => $this->input->post('pengguna_tanah_umum',true),
			'tanah_sawah' 		           => $this->input->post('pengguna_tanah_sawah',true),
			'tanah_tegalan' 	           => $this->input->post('pengguna_tanah_tegalan',true),
			'tanah_perkebunan'             => $this->input->post('pengguna_tanah_perkebunan',true),
			'tanah_pertenakan'             => $this->input->post('pengguna_tanah_pertenakan',true),
			'tanah_hutan' 		           => $this->input->post('pengguna_tanah_hutan',true),
			'tanah_kosong' 	               => $this->input->post('pengguna_tanah_kosong',true),
			'keterangan' 		           => $this->input->post('keterangan',true),
        ];
        $this->db->where('id_tanah_desa',$this->input->post('id'));
		$this->db->update('tanah_desa',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'edit data tanah desa',
            'url'        => 'tanah_desa',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('tanah_desa');
    }
    public function delete_data($id)
    {
        $this->db->where('id_tanah_desa',$id);
        $this->db->delete('tanah_desa');
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'hapus data tanah desa',
            'url'        => 'tanah_desa',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('tanah_desa');
    }
}
