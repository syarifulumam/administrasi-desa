<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_kematian extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $query = "SELECT kematian.*,penduduk.nama_lengkap,penduduk.tempat_lahir,penduduk.tanggal_lahir,penduduk.foto FROM `kematian` JOIN penduduk ON kematian.id_penduduk=penduduk.id_penduduk ORDER BY kematian.id_kematian DESC";
            return $this->db->query($query)->result();
        }else{
            return $this->db->get_where('kematian',array('id_kematian'=>$id))->row();
        }
    }
    public function get_data_penduduk()
    {
        return $this->db->get('penduduk')->result();
    }
    public function insert_data()
    {
        $data = [
			'sebab'	    => $this->input->post('sebab',true),
			'id_penduduk' 		=> $this->input->post('nama',true),
			'keterangan'	    => $this->input->post('keterangan',true),
			'tanggal_meninggal'	=> $this->input->post('tanggal_kematian',true),
			'tempat_meninggal'	    => $this->input->post('tempat_meninggal',true),
			'tanggal_pemakaman'	    => $this->input->post('tanggal_pemakaman',true),
			'tempat_pemakaman'	    => $this->input->post('tempat_pemakaman',true),
        ];
		$this->db->insert('kematian',$data);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('kematian');
    }
    public function edit_data()
    {
        $data = [
			'sebab'	    => $this->input->post('sebab',true),
			'id_penduduk' 		=> $this->input->post('nama',true),
			'keterangan'	    => $this->input->post('keterangan',true),
			'tanggal_meninggal'	=> $this->input->post('tanggal_kematian',true),
			'tempat_meninggal'	    => $this->input->post('tempat_meninggal',true),
			'tanggal_pemakaman'	    => $this->input->post('tanggal_pemakaman',true),
			'tempat_pemakaman'	    => $this->input->post('tempat_pemakaman',true),
        ];
        $this->db->where('id_kematian',$this->input->post('id'));
		$this->db->update('kematian',$data);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('kematian');
    }
    public function delete_data($id)
    {
        $this->db->where('id_kematian',$id);
        $this->db->delete('kematian');
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('kematian');
    }
}
