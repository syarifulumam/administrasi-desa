<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_keuangan extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->where('status','pemasukan');
            $this->db->order_by('id_keuangan','desc');
            return $this->db->get('keuangan')->result();
        }else{
            $this->db->where('id_keuangan',$id);
            return $this->db->get('keuangan')->row();
        }
    }
    public function get_data_pengeluaran($id = null)
    {
        if ($id == null) {
            $this->db->where('status','pengeluaran');
            $this->db->order_by('id_keuangan','desc');
            return $this->db->get('keuangan')->result();
        }else{
            $this->db->where('id_keuangan',$id);
            return $this->db->get('keuangan')->row();
        }
    }
    public function insert_data()
    {
        $tanggal =  str_replace('/', '-',$this->input->post('tanggal',true));
        $data = [
			'keterangan' 	=> $this->input->post('keterangan',true),
			'harga'     	=> $this->input->post('harga',true),
			'tanggal' 	    => date('Y-m-d', strtotime($tanggal)),
			'status' 	    => $this->input->post('status',true)
        ];
        $this->db->insert('keuangan',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data keuangan',
            'url'        => 'keuangan',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Akun berhasil dibuat');
        if ($this->input->post('status',true) == 'pemasukan') {
            redirect('keuangan');
        } else {
            redirect('keuangan/pengeluaran');
        }
    }
    public function edit_data()
    {
        $tanggal =  str_replace('/', '-',$this->input->post('tanggal',true));
        $data = [
			'keterangan' 	=> $this->input->post('keterangan',true),
			'harga'     	=> $this->input->post('harga',true),
			'tanggal' 	    => date('Y-m-d', strtotime($tanggal))
        ];
        $this->db->where('id_keuangan',$this->input->post('id'));
		$this->db->update('keuangan',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'edit data keuangan',
            'url'        => 'keuangan',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        if ($this->input->post('status',true) == 'pemasukan') {
            redirect('keuangan');
        } else {
            redirect('keuangan/pengeluaran');
        }
    }
    public function delete_keuangan($id)
    {
        $this->db->where('id_keuangan',$id);
        $this->db->delete('keuangan');
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'hapus data keuangan',
            'url'        => 'keuangan',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Surat berhasil hapus');
        if ($this->db->get_where('keuangan',array('id_keuangan'=>$id))->row()->status == 'pemasukan') {
            redirect('keuangan');
        } else {
            redirect('keuangan/pengeluaran');
        }
    }
}
