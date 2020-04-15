<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_identitas extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            return $this->db->get('identitas')->row();
        }else{
            return $this->db->get_where('identitas',array('id_identitas'=>$id))->row();
        }
    }
    public function edit_data()
    {
        //validasi upload foto
        if (!empty($_FILES["foto"]["name"])) {
            $data_foto = $this->_upload();
            //hapus file difolder
            unlink('upload/'.$this->input->post('foto_db'));
        } else {
            $data_foto = $this->input->post('foto_db');
        }
        $data = [
			'nama_desa' 		=> $this->input->post('nama_desa',true),
			'kecamatan' 		=> $this->input->post('kecamatan',true),
			'kabupaten_kota' 	=> $this->input->post('kota',true),
			'provinsi' 		    => $this->input->post('provinsi',true),
			'alamat' 		    => $this->input->post('alamat',true),
			'kode_pos' 		    => $this->input->post('kode_pos',true),
			'no_telepon' 		=> $this->input->post('no_telepon',true),
			'no_fax' 		    => $this->input->post('no_fax',true),
			'email' 		    => $this->input->post('email',true),
			'website' 		    => $this->input->post('website',true),
			'format_waktu' 		=> $this->input->post('format_waktu',true),
			'jenis_kecamatan' 	=> $this->input->post('jenis_kecamatan',true),
			'jenis_pemerintahan'=> $this->input->post('jenis_pemerintahan',true),
			'jenis_pemerintahan_desa'   => $this->input->post('jenis_desa',true),
			'lokasi' 		    => $this->input->post('lokasi',true),
			'logo' 		        => $data_foto
        ];
        $this->db->where('id_identitas',$this->input->post('id'));
		$this->db->update('identitas',$data);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('identitas');
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
