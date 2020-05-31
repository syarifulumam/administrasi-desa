<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_kecamatan extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->select('kecamatan.*,provinsi.nama_provinsi,kota.nama_kota');
            $this->db->from('kecamatan');
            $this->db->join('kota', 'kecamatan.id_kota = kota.id_kota');
            $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
            $this->db->order_by('id_kecamatan','DESC');
            return $this->db->get()->result();
        }else{
            return $this->db->get_where('kecamatan',array('id_kecamatan'=>$id))->row();
        }
    }
    public function get_kota()
    {
        return $this->db->get('kota')->result();
    }
    public function insert_data()
    {
        $data = [
            'nama_kecamatan' => $this->input->post('kecamatan',true),
            'id_kota' => $this->input->post('kota',true)
        ];
        $this->db->insert('kecamatan',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data kecamatan',
            'url'        => 'kecamatan',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('kecamatan');
    }
    public function edit_data()
    {
        $data = [
            'nama_kecamatan' => $this->input->post('kecamatan',true),
            'id_kota' => $this->input->post('kota',true)
        ];
        $this->db->where('id_kecamatan',$this->input->post('id',true));
        $this->db->update('kecamatan',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'edit data kecamatan',
            'url'        => 'kecamatan',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('kecamatan');
    }
    public function delete_data($id)
    {
        $this->db->where('id_kecamatan',$id);
        $this->db->delete('kecamatan');
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'hapus data kecamatan',
            'url'        => 'kecamatan',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('kecamatan');
    }
}
