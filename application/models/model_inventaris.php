<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_inventaris extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->order_by('id_inventaris','DESC');
            return $this->db->get('inventaris')->result();
        }else{
            return $this->db->get_where('inventaris',array('id_inventaris'=>$id))->row();
        }
    }
    public function insert_data()
    {
        $tanggal_penghapusan =  str_replace('/', '-',$this->input->post('tanggal_penghapusan',true));
        $data = [
			'keterangan' 		                => $this->input->post('keterangan',true),
			'nama_barang' 		                => $this->input->post('nama_barang',true),
			'asal_barang'                		=> $this->input->post('asal_barang',true),
			'keadaan_awal_tahun' 		        => $this->input->post('keadaan_awal_tahun',true),
			'jumlah_kondisi_baik' 		        => $this->input->post('jumlah_kondisi_baik',true),
			'tanggal_penghapusan' 		        => date('Y-m-d', strtotime($tanggal_penghapusan)),
			'jumlah_kondisi_rusak' 		        => $this->input->post('jumlah_kondisi_rusak',true),
			'jumlah_penghapusan_rusak' 		    => $this->input->post('jumlah_penghapusan_rusak',true),
			'jumlah_penghapusan_dijual' 		=> $this->input->post('jumlah_penghapusan_dijual',true),
            'jumlah_penghapusan_disumbangkan' 	=> $this->input->post('jumlah_penghapusan_disumbangkan',true),
            'keadaan_barang_akhir_tahun' 		=> $this->input->post('keadaan_barang_akhir_tahun',true),
        ];
		$this->db->insert('inventaris',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data inventaris',
            'url'        => 'inventaris',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('inventaris');
    }
    public function edit_data()
    {
        $tanggal_penghapusan =  str_replace('/', '-',$this->input->post('tanggal_penghapusan',true));
        $data = [
			'keterangan' 		                => $this->input->post('keterangan',true),
			'nama_barang' 		                => $this->input->post('nama_barang',true),
			'asal_barang'                		=> $this->input->post('asal_barang',true),
			'keadaan_awal_tahun' 		        => $this->input->post('keadaan_awal_tahun',true),
			'jumlah_kondisi_baik' 		        => $this->input->post('jumlah_kondisi_baik',true),
			'tanggal_penghapusan' 		        => date('Y-m-d', strtotime($tanggal_penghapusan)),
			'jumlah_kondisi_rusak' 		        => $this->input->post('jumlah_kondisi_rusak',true),
			'jumlah_penghapusan_rusak' 		    => $this->input->post('jumlah_penghapusan_rusak',true),
			'jumlah_penghapusan_dijual' 		=> $this->input->post('jumlah_penghapusan_dijual',true),
            'jumlah_penghapusan_disumbangkan' 	=> $this->input->post('jumlah_penghapusan_disumbangkan',true),
            'keadaan_barang_akhir_tahun' 		=> $this->input->post('keadaan_barang_akhir_tahun',true),
        ];
        $this->db->where('id_inventaris',$this->input->post('id'));
		$this->db->update('inventaris',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'edit data inventaris',
            'url'        => 'inventaris',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('inventaris');
    }
    public function delete_data($id)
    {
        $this->db->where('id_inventaris',$id);
        $this->db->delete('inventaris');
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'hapus data inventaris',
            'url'        => 'inventaris',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('inventaris');
    }
}
