<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_kelurahan extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->select('kelurahan.*,provinsi.nama_provinsi,kota.nama_kota,kecamatan.nama_kecamatan');
            $this->db->from('kelurahan');
            $this->db->join('kecamatan', 'kelurahan.id_kecamatan = kecamatan.id_kecamatan');
            $this->db->join('kota', 'kecamatan.id_kota = kota.id_kota');
            $this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi');
            $this->db->order_by('id_kelurahan','DESC');
            return $this->db->get()->result();
        }else{
            return $this->db->get_where('kelurahan',array('id_kelurahan'=>$id))->row();
        }
    }
    public function get_kecamatan()
    {
        return $this->db->get('kecamatan')->result();
    }
    public function insert_data()
    {
        $data = [
            'nama_kelurahan' => $this->input->post('kelurahan',true),
            'id_kecamatan' => $this->input->post('kecamatan',true)
        ];
        $this->db->insert('kelurahan',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data kelurahan',
            'url'        => 'kelurahan',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('kelurahan');
    }
    public function edit_data()
    {
        $data = [
            'nama_kelurahan' => $this->input->post('kelurahan',true),
            'id_kecamatan' => $this->input->post('kecamatan',true)
        ];
        $this->db->where('id_kelurahan',$this->input->post('id',true));
        $this->db->update('kelurahan',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'edit data kelurahan',
            'url'        => 'kelurahan',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('kelurahan');
    }
    public function delete_data($id)
    {
        $this->db->where('id_kelurahan',$id);
        $this->db->delete('kelurahan');
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'hapus data kelurahan',
            'url'        => 'kelurahan',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('kelurahan');
    }
}
