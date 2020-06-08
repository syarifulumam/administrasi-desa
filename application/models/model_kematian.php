<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_kematian extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $query = "SELECT kematian.*,penduduk.nama_lengkap,penduduk.tempat_lahir,penduduk.tanggal_lahir,penduduk.foto FROM `kematian` JOIN penduduk ON kematian.id_penduduk=penduduk.id_penduduk ORDER BY kematian.id_kematian DESC";
            return $this->db->query($query)->result();
        }else{
            $this->db->select('kematian.*,penduduk.nama_lengkap');
            $this->db->from('kematian');
            $this->db->join('penduduk', 'kematian.id_penduduk = penduduk.id_penduduk');
            $this->db->where('id_kematian',$id);
            return $this->db->get()->row();
        }
    }
    public function get_data_penduduk()
    {
        return $this->db->get_where('penduduk',array('status_hidup'=>0))->result();
    }
    public function insert_data()
    {
        $tanggal_pemakaman =  str_replace('/', '-',$this->input->post('tanggal_pemakaman',true));
        $tanggal_meninggal =  str_replace('/', '-',$this->input->post('tanggal_kematian',true));
        $this->db->set('status_hidup',1);
        $this->db->where('id_penduduk',$this->input->post('nama',true));
        $this->db->update('penduduk');
        $data_kematian = [
			'sebab'	    => $this->input->post('sebab',true),
			'id_penduduk' 		=> $this->input->post('nama',true),
			'keterangan'	    => $this->input->post('keterangan',true),
			'tanggal_meninggal'	=> date('Y-m-d', strtotime($tanggal_meninggal)),
			'tempat_meninggal'	    => $this->input->post('tempat_meninggal',true),
			'tanggal_pemakaman'	    => date('Y-m-d', strtotime($tanggal_pemakaman)),
			'tempat_pemakaman'	    => $this->input->post('tempat_pemakaman',true),
        ];
        $this->db->insert('kematian',$data_kematian);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data kematian',
            'url'        => 'kematian',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('kematian');
    }
    public function edit_data()
    {
        $tanggal_pemakaman =  str_replace('/', '-',$this->input->post('tanggal_pemakaman',true));
        $tanggal_meninggal =  str_replace('/', '-',$this->input->post('tanggal_kematian',true));
        $data = [
			'sebab'	    => $this->input->post('sebab',true),
			'keterangan'	    => $this->input->post('keterangan',true),
			'tanggal_meninggal'	=> date('Y-m-d', strtotime($tanggal_meninggal)),
			'tempat_meninggal'	    => $this->input->post('tempat_meninggal',true),
			'tanggal_pemakaman'	    => date('Y-m-d', strtotime($tanggal_pemakaman)),
			'tempat_pemakaman'	    => $this->input->post('tempat_pemakaman',true),
        ];
        $this->db->where('id_kematian',$this->input->post('id'));
		$this->db->update('kematian',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'edit data kematian',
            'url'        => 'kematian',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('kematian');
    }
    public function delete_data($id)
    {
        $this->db->where('id_kematian',$id);
        $this->db->delete('kematian');
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'hapus data kematian',
            'url'        => 'kematian',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('kematian');
    }
}
