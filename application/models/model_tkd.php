<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_tkd extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->order_by('id_tkd','DESC');
            return $this->db->get('tkd')->result();
        }else{
            return $this->db->get_where('tkd',array('id_tkd'=>$id))->row();
        }
    }
    public function insert_data()
    {
        $tanggal_bantuan_lain =  str_replace('/', '-',$this->input->post('tanggal_perolehan_bantuan_lain',true));
        $tanggal_bantuan_provinsi =  str_replace('/', '-',$this->input->post('tanggal_perolehan_bantuan_provinsi',true));
        $tanggal_bantuan_kabupaten =  str_replace('/', '-',$this->input->post('tanggal_perolehan_bantuan_kabupaten',true));
        $tanggal_bantuan_pemerintah =  str_replace('/', '-',$this->input->post('tanggal_perolehan_bantuan_pemerintah',true));
        $tanggal_amd =  str_replace('/', '-',$this->input->post('tanggal_perolehan_amd',true));
        $data = [
            'klas'	                                => $this->input->post('kelas',true),
            'patok_tanda_batas'	                    => $this->input->post('patok',true),
            'papan_nama'	                        => $this->input->post('papan',true),
            'lokasi'	                            => $this->input->post('lokasi',true),
            'luas'	                                => $this->input->post('luas_ha',true),
            'asal_tkd'	                            => $this->input->post('asal_tkd',true),
            'peruntukan'	                        => $this->input->post('peruntukan',true),
            'pemilik'   	                        => $this->input->post('asli_milik',true),
            'lain_lain'	                            => $this->input->post('bantuan_lain',true),
            'jumlah_tkd_kebun'	                    => $this->input->post('jumlah_tkd_kebun',true),
            'jumlah_tkd_sawah'	                    => $this->input->post('jumlah_tkd_sawah',true),
            'bantuan_provinsi'	                    => $this->input->post('bantuan_provinsi',true),
            'jumlah_tkd_tanah'	                    => $this->input->post('jumlah_tkd_darat',true),
            'nomor_sertifikat'	                    => $this->input->post('nomor_sertifikat',true),
            'bantuan_kabupaten'	                    => $this->input->post('bantuan_kabupaten',true),
            'jumlah_tkd_tegalan'	                => $this->input->post('jumlah_tkd_tegalan',true),
            'bantuan_pemerintah'	                => $this->input->post('bantuan_pemerintah',true),
            'jumlah_tkd_tambak'	                    => $this->input->post('jumlah_tkd_tambak_kolam',true),
            'tanggal_amd'	                        => date('Y-m-d', strtotime($tanggal_amd)),
            'tanggal_bantuan_lain'	                => date('Y-m-d', strtotime($tanggal_bantuan_lain)),
            'tanggal_bantuan_provinsi'          	=> date('Y-m-d', strtotime($tanggal_bantuan_provinsi)),
            'tanggal_bantuan_kabupaten'         	=> date('Y-m-d', strtotime($tanggal_bantuan_kabupaten)),
            'tanggal_bantuan_pemerintah'	        => date('Y-m-d', strtotime($tanggal_bantuan_pemerintah)),
			'file_dokumen' 		                    => $this->_upload()
        ];
        //insert data pindahan
        $this->db->insert('tkd',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data tkd',
            'url'        => 'tkd',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('tkd');
    }
    public function edit_data()
    {
        //validasi upload foto apakah user update foto atau tidak
        if (!empty($_FILES["dokumen"]["name"])) {
            $data_file = $this->_upload();
            //hapus file difolder
            unlink('upload/'.$this->input->post('file'));
        } else {
            $data_file = $this->input->post('file');
        }
        $tanggal_bantuan_lain =  str_replace('/', '-',$this->input->post('tanggal_perolehan_bantuan_lain',true));
        $tanggal_bantuan_provinsi =  str_replace('/', '-',$this->input->post('tanggal_perolehan_bantuan_provinsi',true));
        $tanggal_bantuan_kabupaten =  str_replace('/', '-',$this->input->post('tanggal_perolehan_bantuan_kabupaten',true));
        $tanggal_bantuan_pemerintah =  str_replace('/', '-',$this->input->post('tanggal_perolehan_bantuan_pemerintah',true));
        $tanggal_amd =  str_replace('/', '-',$this->input->post('tanggal_perolehan_amd',true));
        $data = [
            'klas'	                                => $this->input->post('kelas',true),
            'patok_tanda_batas'	                    => $this->input->post('patok',true),
            'papan_nama'	                        => $this->input->post('papan',true),
            'lokasi'	                            => $this->input->post('lokasi',true),
            'luas'	                                => $this->input->post('luas_ha',true),
            'asal_tkd'	                            => $this->input->post('asal_tkd',true),
            'peruntukan'	                        => $this->input->post('peruntukan',true),
            'pemilik'   	                        => $this->input->post('asli_milik',true),
            'lain_lain'	                            => $this->input->post('bantuan_lain',true),
            'jumlah_tkd_kebun'	                    => $this->input->post('jumlah_tkd_kebun',true),
            'jumlah_tkd_sawah'	                    => $this->input->post('jumlah_tkd_sawah',true),
            'bantuan_provinsi'	                    => $this->input->post('bantuan_provinsi',true),
            'jumlah_tkd_tanah'	                    => $this->input->post('jumlah_tkd_darat',true),
            'nomor_sertifikat'	                    => $this->input->post('nomor_sertifikat',true),
            'bantuan_kabupaten'	                    => $this->input->post('bantuan_kabupaten',true),
            'jumlah_tkd_tegalan'	                => $this->input->post('jumlah_tkd_tegalan',true),
            'bantuan_pemerintah'	                => $this->input->post('bantuan_pemerintah',true),
            'jumlah_tkd_tambak'	                    => $this->input->post('jumlah_tkd_tambak_kolam',true),
            'tanggal_amd'	                        => date('Y-m-d', strtotime($tanggal_amd)),
            'tanggal_bantuan_lain'	                => date('Y-m-d', strtotime($tanggal_bantuan_lain)),
            'tanggal_bantuan_provinsi'          	=> date('Y-m-d', strtotime($tanggal_bantuan_provinsi)),
            'tanggal_bantuan_kabupaten'         	=> date('Y-m-d', strtotime($tanggal_bantuan_kabupaten)),
            'tanggal_bantuan_pemerintah'	        => date('Y-m-d', strtotime($tanggal_bantuan_pemerintah)),
			'file_dokumen' 		     => $data_file
        ];
        
        $this->db->where('id_tkd',$this->input->post('id'));
		$this->db->update('tkd',$data);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'edit data tkd',
            'url'        => 'tkd',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('tkd');
    }
    public function delete_data($id)
    {
        $this->db->where('id_tkd',$id);
        $this->db->delete('tkd');
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'hapus data tkd',
            'url'        => 'tkd',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('tkd');
    }
    private function _upload(){
        //upload foto
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'jpg|png|doc|pdf';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
        $config['max_height']           = 768;
        //load library
		$this->load->library('upload', $config);
		// validasi upload foto 
		if ($this->upload->do_upload('dokumen')) {
            return $this->upload->data("file_name");
        }
        
        return "avatar.jpg";
        
    } 
}
