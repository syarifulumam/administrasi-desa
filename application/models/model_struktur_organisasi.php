<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_struktur_organisasi extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->order_by('id_struktur_organisasi','DESC');
            return $this->db->get('struktur_organisasi')->result();
        }else{
            return $this->db->get_where('struktur_organisasi',array('id_struktur_organisasi'=>$id))->row();
        }
    }
    public function insert_data()
    {
        $data = [
            'nama_jabatan' => $this->input->post('nama_jabatan'),
            'nama'         => $this->input->post('nama'),
            'nip'          => $this->input->post('nip')
        ];
        $this->db->insert('struktur_organisasi',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data struktur organisasi',
            'url'        => 'struktur_organisasi',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('struktur_organisasi');
    }
    public function edit_data()
    {
        $data = [
            'nama_jabatan' => $this->input->post('nama_jabatan'),
            'nama'         => $this->input->post('nama'),
            'nip'          => $this->input->post('nip')
        ];
        $this->db->where('id_struktur_organisasi',$this->input->post('id',true));
        $this->db->update('struktur_organisasi',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'edit data struktur organisasi',
            'url'        => 'struktur_organisasi',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('struktur_organisasi');
    }
    public function delete_data($id)
    {
        $this->db->where('id_struktur_organisasi',$id);
        $this->db->delete('struktur_organisasi');
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'hapus data struktur organisasi',
            'url'        => 'struktur_organisasi',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('struktur_organisasi');
    }
}
