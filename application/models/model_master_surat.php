<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_master_surat extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->order_by('id_master_surat','DESC');
            return $this->db->get('master_surat')->result();
        }else{
            return $this->db->get_where('master_surat',array('id_master_surat'=>$id))->row();
        }
    }
    public function insert_data()
    {
        $kode_surat = $this->db->select('kode_surat')
                               ->order_by('id_master_surat','DESC')
                               ->get('master_surat')->row();                   
        $kode_surat = substr($kode_surat->kode_surat,3) + 1;
		$kode_surat = sprintf("%07d", $kode_surat);
        $data = [
            'kode_surat' => "SRT" . $kode_surat,
            'nama_surat_dinas' => $this->input->post('nama_surat')
        ];
        $this->db->insert('master_surat',$data);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('master_surat');
    }
    public function edit_data()
    {
        $this->db->where('id_master_surat',$this->input->post('id',true));
        $this->db->update('master_surat',array('nama_surat_dinas'=>$this->input->post('nama_surat',true)));
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('master_surat');
    }
    public function delete_data($id)
    {
        $this->db->where('id_master_surat',$id);
        $this->db->delete('master_surat');
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('master_surat');
    }
}
