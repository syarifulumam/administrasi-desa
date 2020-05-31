<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_anggota_bpd extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->order_by('id_anggota_bpd','DESC');
            return $this->db->get('anggota_bpd')->result();
        }else{
            return $this->db->get_where('anggota_bpd',array('id_anggota_bpd'=>$id))->row();
        }
    }
    public function insert_data()
    {
        $data_anggota_bpd = [
			'nama'                  => $this->input->post('nama_lengkap',true),
			'nomor_anggota'	        => $this->input->post('nomor_anggota',true),
			'nip'	                => $this->input->post('nip',true),
			'tempat_lahir'	        => $this->input->post('tempat_lahir',true),
			'tanggal_lahir'	        => $this->input->post('tanggal_lahir',true),
			'agama'	                => $this->input->post('agama',true),
			'pangkat'	            => $this->input->post('pangkat',true),
			'jabatan'	            => $this->input->post('jabatan',true),
			'pendidikan_terakhir'	=> $this->input->post('pendidikan',true),
			'tanggal_pengangkatan'	=> $this->input->post('tanggal_pengangkatan',true),
			'nomor_pengangkatan'    => $this->input->post('nomor_pengangkatan',true),
			'tanggal_pemberhentian'	=> $this->input->post('tanggal_pemberhentian',true),
			'nomor_pemberhentian'	=> $this->input->post('nomor_pemberhentian',true),
			'keterangan'	        => $this->input->post('keterangan',true),
			'jenis_kelamin'	        => $this->input->post('jenis_kelamin',true),
			'keaktifan'	            => $this->input->post('keaktifan',true),
			'foto' 		            => $this->_upload()
        ];
        //insert data anggota_bpd
        $this->db->insert('anggota_bpd',$data_anggota_bpd);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data anggota bpd',
            'url'        => 'anggota_bpd',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('anggota_bpd');
    }
    public function edit_data()
    {
        //validasi upload foto apakah user update foto atau tidak
        // if (!empty($_FILES["foto"]["name"])) {
        //     $data_foto = $this->_upload();
        //     //hapus file difolder
        //     unlink('upload/'.$this->input->post('foto_db'));
        // } else {
        //     $data_foto = $this->input->post('foto_db');
        // }
        $data_anggota_bpd = [
			'nama'                  => $this->input->post('nama_lengkap',true),
			'nomor_anggota'	        => $this->input->post('nomor_anggota',true),
			'nip'	                => $this->input->post('nip',true),
			'tempat_lahir'	        => $this->input->post('tempat_lahir',true),
			'tanggal_lahir'	        => $this->input->post('tanggal_lahir',true),
			'agama'	                => $this->input->post('agama',true),
			'pangkat'	            => $this->input->post('pangkat',true),
			'jabatan'	            => $this->input->post('jabatan',true),
			'pendidikan_terakhir'	=> $this->input->post('pendidikan',true),
			'tanggal_pengangkatan'	=> $this->input->post('tanggal_pengangkatan',true),
			'nomor_pengangkatan'    => $this->input->post('nomor_pengangkatan',true),
			'tanggal_pemberhentian'	=> $this->input->post('tanggal_pemberhentian',true),
			'nomor_pemberhentian'	=> $this->input->post('nomor_pemberhentian',true),
			'keterangan'	        => $this->input->post('keterangan',true),
			'jenis_kelamin'	        => $this->input->post('jenis_kelamin',true),
			'keaktifan'	            => $this->input->post('keaktifan',true),
			// 'foto' 		          => $data_foto
        ];
        
        $this->db->where('id_anggota_bpd',$this->input->post('id'));
		$this->db->update('anggota_bpd',$data_anggota_bpd);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'edit data anggota bpd',
            'url'        => 'anggota_bpd',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('anggota_bpd');
    }
    public function delete_data($id)
    {
        $this->db->where('id_anggota_bpd',$id);
        $this->db->delete('anggota_bpd');
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'hapus data anggota bpd',
            'url'        => 'anggota_bpd',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('anggota_bpd');
    }
    private function _upload(){
        //upload foto
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
        $config['max_height']           = 768;
        //load library
		$this->load->library('upload', $config);
		// validasi upload foto 
		if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }
        
        return "avatar.jpg";
        
    } 
}
