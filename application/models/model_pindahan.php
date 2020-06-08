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
            $this->db->like('status_penduduk','Pindah');
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
        $this->db->not_like('status_penduduk','Pindah');
        $this->db->not_like('status_hidup',1);
        return $this->db->get('penduduk')->result();
    }
    public function insert_data()
    {
        $tanggal =  str_replace('/', '-',$this->input->post('tanggal_pindahan',true));
        $data = [
			'id_penduduk' 	  => $this->input->post('nama',true),
			'alamat_pindahan' => $this->input->post('alamat',true),
			'keterangan' 	  => $this->input->post('keterangan',true),
			'tanggal_pindah'  => date('Y-m-d', strtotime($tanggal)),
        ];
        $this->db->where('id_penduduk',$this->input->post('nama'));
        $this->db->update('pindah_kependudukan',$data);
        //update status penduduk jadi pindah
        $this->db->where('id_penduduk',$this->input->post('nama'));
        $this->db->update('penduduk',array('status_penduduk'=>'Pindah'));
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data pindahan',
            'url'        => 'pindahan',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('pindahan');
    }
    public function edit_data()
    {
        $tanggal =  str_replace('/', '-',$this->input->post('tanggal_pindahan',true));
        $data = [
			'alamat_pindahan' => $this->input->post('alamat',true),
			'keterangan' 	  => $this->input->post('keterangan',true),
			'tanggal_pindah'  => date('Y-m-d', strtotime($tanggal)),
        ];
        $this->db->where('id_pindah_kependudukan',$this->input->post('id'));
		$this->db->update('pindah_kependudukan',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'edit data pindahan',
            'url'        => 'pindahan',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('pindahan');
    }
    public function delete_data($id)
    {
        $this->db->where('id_pindah_kependudukan',$id);
        $this->db->delete('pindah_kependudukan');
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'hapus data pindahan',
            'url'        => 'pindahan',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('pindahan');
    } 
}
