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
            $this->db->select('surat.*,penduduk.*,master_surat.nama_surat_dinas,dusun.nama_dusun,kecamatan.nama_kecamatan,kota.nama_kota');
            $this->db->from('surat');
            $this->db->join('penduduk', 'surat.id_penduduk = penduduk.id_penduduk');
            $this->db->join('dusun', 'dusun.id_dusun = penduduk.dusun');
            $this->db->join('kota', 'kota.id_kota = penduduk.kota');
            $this->db->join('kecamatan', 'kecamatan.id_kecamatan = penduduk.kecamatan');
            $this->db->join('master_surat', 'master_surat.id_master_surat = surat.id_master_surat');
            $this->db->where('id_surat',$id);
            return $this->db->get()->row();
        }
    }
    public function get_data_penduduk()
    {
        return $this->db->get('penduduk')->result();
    }
    public function get_data_penduduk_kematian($id = null)
    {
        if ($id == null) {
            $this->db->select('penduduk.*,kematian.*');
            $this->db->from('penduduk');
            $this->db->join('kematian', 'kematian.id_penduduk = penduduk.id_penduduk');
            return $this->db->get()->result();
        } else {
            $this->db->select('surat.*,penduduk.*,master_surat.nama_surat_dinas,kematian.*');
            $this->db->from('surat');
            $this->db->join('penduduk', 'surat.id_penduduk = penduduk.id_penduduk');
            $this->db->join('kematian', 'kematian.id_kematian = surat.id_kematian');
            $this->db->join('master_surat', 'master_surat.id_master_surat = surat.id_master_surat');
            $this->db->where('id_surat',$id);
            return $this->db->get()->row();
        }
        
    }
    public function get_master_surat()
    {
        return $this->db->get('master_surat')->result();
    }
    public function insert_data()
    {
        $data = [
			'tanggal_surat' 	=> $this->input->post('tanggal_surat',true),
			'id_master_surat' 	=> $this->input->post('id_master_surat',true),
			'id_penduduk'    	=> $this->input->post('nama',true),
			'keterangan'    	=> $this->input->post('keterangan',true),
			'no_surat'       	=> date('ynjhis'),
			'url'       	    => $this->input->post('url',true)
        ];
		$this->db->insert('surat',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data buat surat',
            'url'        => 'buat_surat',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('buat_surat');
    }
    public function insert_data_kematian()
    {
        $id = explode(',',$this->input->post('nama',true));
        $data = [
			'tanggal_surat' 	=> $this->input->post('tanggal_surat',true),
			'id_penduduk' 		=> $id[0],
			'id_kematian' 		=> $id[1],
			'id_master_surat' 	=> $this->input->post('id_master_surat',true),
			'no_surat'       	=> date('ynjhis'),
			'url'       	    => $this->input->post('url',true)
        ];
		$this->db->insert('surat',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data buat surat',
            'url'        => 'buat_surat',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('buat_surat');
    }
    public function edit_data()
    {
        $data = [
			'tanggal_surat' 	=> $this->input->post('tanggal_surat',true),
			'id_penduduk' 		=> $this->input->post('nama',true),
			'id_master_surat' 	=> $this->input->post('id_master_surat',true),
			'no_surat'       	=> date('ynjhis')
        ];
        $this->db->where('id_surat',$this->input->post('id'));
		$this->db->update('surat',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'edit data buat surat',
            'url'        => 'buat_surat',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('buat_surat');
    }
    public function delete_data($id)
    {
        $this->db->where('id_surat',$id);
        $this->db->delete('surat');
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data buat surat',
            'url'        => 'buat_surat',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Surat berhasil hapus');
        redirect('buat_surat');
    }
}
