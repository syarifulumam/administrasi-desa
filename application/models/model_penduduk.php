<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_penduduk extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->order_by('id_penduduk','desc');
            $this->db->where('status_hidup',0);
            $this->db->not_like('status_penduduk','Pindah');
            return $this->db->get('penduduk')->result();
        }else{
            $query = "SELECT penduduk.* , kota.nama_kota , kecamatan.nama_kecamatan , kelurahan.nama_kelurahan , dusun.nama_dusun FROM `penduduk` INNER JOIN kota ON penduduk.kota=kota.id_kota INNER JOIN kecamatan ON penduduk.kecamatan=kecamatan.id_kecamatan INNER JOIN kelurahan ON penduduk.kelurahan=kelurahan.id_kelurahan INNER JOIN dusun ON penduduk.dusun=dusun.id_dusun WHERE penduduk.id_penduduk=$id";
            return $this->db->query($query)->row();
        }
    }
    public function get_data_provinsi()
    {
        $this->db->order_by('nama_provinsi','ASC');
        return $this->db->get('provinsi')->result();
    }
    public function kota($id)
    {
        $kota = $this->db->get_where('kota',array('id_provinsi'=>$id))->result();
        echo "<option value=''>-- Pilih Kota --</option>";
        foreach ($kota as $key) {
            echo "<option value='".$key->id_kota."'>".$key->nama_kota."</option>";
        }
    }
    public function kecamatan($id)
    {
        $kecamatan = $this->db->get_where('kecamatan',array('id_kota'=>$id))->result();
        echo "<option value=''>-- Pilih Kecamatan --</option>";
        foreach ($kecamatan as $key) {
            echo "<option value='".$key->id_kecamatan."'>".$key->nama_kecamatan."</option>";
        }
    }
    public function kelurahan($id)
    {
        $kelurahan = $this->db->get_where('kelurahan',array('id_kecamatan'=>$id))->result();
        echo "<option value=''>-- Pilih Kelurahan --</option>";
        foreach ($kelurahan as $key) {
            echo "<option value='".$key->id_kelurahan."'>".$key->nama_kelurahan."</option>";
        }
    }
    public function dusun($id)
    {
        $dusun = $this->db->get_where('dusun',array('id_kelurahan'=>$id))->result();
        echo "<option value=''>-- Pilih Dusun --</option>";
        foreach ($dusun as $key) {
            echo "<option value='".$key->id_dusun."'>".$key->nama_dusun."</option>";
        }
    }
    public function insert_data()
    {
        $data_penduduk = [
			'status_penduduk' 	  => $this->input->post('status_penduduk',true),
			'no_kk'	              => $this->input->post('nomor_kk',true),
			'status_perkawinan'	  => $this->input->post('status_pernikahan',true),
			'status_dalam_keluarga'=> $this->input->post('status_dalam_keluarga',true),
			'nik'	              => $this->input->post('nomor_ktp',true),
			'nama_lengkap'	      => $this->input->post('nama',true),
			'tempat_lahir'	      => $this->input->post('tempat_lahir',true),
			'tanggal_lahir'	      => date('Y-m-d', strtotime($this->input->post('tanggal_lahir',true))),
			'jenis_kelamin'	      => $this->input->post('jenis_kelamin',true),
			'agama'	              => $this->input->post('agama',true),
			'pekerjaan'	          => $this->input->post('pekerjaan',true),
			'kewarganegaraan'     => $this->input->post('negaraan',true),
			'provinsi'	          => $this->input->post('provinsi',true),
			'kota'	              => $this->input->post('kota',true),
			'kecamatan'	          => $this->input->post('kecamatan',true),
			'kelurahan'	          => $this->input->post('kelurahan',true),
			'dusun'	              => $this->input->post('dusun',true),
			'rt'	              => $this->input->post('rt',true),
			'rw'	              => $this->input->post('rw',true),
			'alamat'	          => $this->input->post('alamat',true),
			'kode_pos'	          => $this->input->post('kode_pos',true),
			'no_telepon'	      => $this->input->post('nomor_telepon',true),
			'nama_ibu'	          => $this->input->post('nama_ibu',true),
			'nama_bapak'	      => $this->input->post('nama_ayah',true),
			'pendidikan_terakhir' => $this->input->post('pendidikan',true),
            'foto' 		          => $this->_upload(),
            'tanggal_input'       => date('Y-m-d')
        ];
        //insert data penduduk
        $this->db->insert('penduduk',$data_penduduk);

        $data_pindahan = [
            'id_penduduk'           => $this->db->insert_id(),
			'tanggal_pindah'	    => $this->input->post('tanggal_pindahan',true),
			'alamat_sebelumnya'	    => $this->input->post('alamat_sebelumnya',true),
			// 'kode_pos'	            => $this->input->post('kode_pos_sebelumnya',true),
			'keterangan'	        => $this->input->post('keterangan',true)
        ];
        //insert data pindahan
        $this->db->insert('pindah_kependudukan',$data_pindahan);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data penduduk',
            'url'        => 'penduduk',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('penduduk');
    }
    public function edit_data()
    {
        //validasi upload foto apakah user update foto atau tidak
        if (!empty($_FILES["foto"]["name"])) {
            $data_foto = $this->_upload();
            //hapus file difolder
            unlink('upload/'.$this->input->post('foto_db'));
        } else {
            $data_foto = $this->input->post('foto_db');
        }
        $data_penduduk = [
			'status_penduduk' 	  => $this->input->post('status_penduduk',true),
			'no_kk'	              => $this->input->post('nomor_kk',true),
			'status_perkawinan'	  => $this->input->post('status_pernikahan',true),
			'status_dalam_keluarga'=> $this->input->post('status_dalam_keluarga',true),
			'nik'	              => $this->input->post('nomor_ktp',true),
			'nama_lengkap'	      => $this->input->post('nama',true),
			'tempat_lahir'	      => $this->input->post('tempat_lahir',true),
			'tanggal_lahir'	      => date('Y-m-d', strtotime($this->input->post('tanggal_lahir',true))),
			'jenis_kelamin'	      => $this->input->post('jenis_kelamin',true),
			'agama'	              => $this->input->post('agama',true),
			'pekerjaan'	          => $this->input->post('pekerjaan',true),
			'kewarganegaraan'     => $this->input->post('negaraan',true),
			'provinsi'	          => $this->input->post('provinsi',true),
			'kota'	              => $this->input->post('kota',true),
			'kecamatan'	          => $this->input->post('kecamatan',true),
			'kelurahan'	          => $this->input->post('kelurahan',true),
			'dusun'	              => $this->input->post('dusun',true),
			'rt'	              => $this->input->post('rt',true),
			'rw'	              => $this->input->post('rw',true),
			'alamat'	          => $this->input->post('alamat',true),
			'kode_pos'	          => $this->input->post('kode_pos',true),
			'no_telepon'	      => $this->input->post('nomor_telepon',true),
			'nama_ibu'	          => $this->input->post('nama_ibu',true),
			'nama_bapak'	      => $this->input->post('nama_ayah',true),
			'pendidikan_terakhir' => $this->input->post('pendidikan',true),
			'foto' 		          => $data_foto
        ];
        
        $this->db->where('id_penduduk',$this->input->post('id'));
        $this->db->update('penduduk',$data_penduduk);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'edit data penduduk',
            'url'        => 'penduduk',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('penduduk');
    }
    public function delete_data($id)
    {
        $this->db->where('id_penduduk',$id);
        $this->db->delete('penduduk');
        $this->db->where('id_penduduk',$id);
        $this->db->delete('kelahiran');
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'hapus data penduduk',
            'url'        => 'penduduk',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('penduduk');
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
