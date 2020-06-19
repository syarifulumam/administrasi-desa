<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_kelahiran extends CI_Model {
    public function get_data($id = null)
    {
        if ($id == null) {
            $this->db->select('kelahiran.*,penduduk.nama_lengkap,penduduk.no_kk,penduduk.tempat_lahir,penduduk.tanggal_lahir,penduduk.jenis_kelamin,penduduk.agama,penduduk.nama_ibu,penduduk.nama_bapak');
            $this->db->from('kelahiran');
            $this->db->join('penduduk', 'kelahiran.id_penduduk = penduduk.id_penduduk');
            $this->db->order_by('id_kelahiran','DESC');
            return $this->db->get()->result();
        }else{
            $this->db->select('kelahiran.*,penduduk.nama_lengkap,penduduk.no_kk,penduduk.tempat_lahir,penduduk.tanggal_lahir,penduduk.jenis_kelamin,penduduk.agama,penduduk.nama_ibu,penduduk.nama_bapak');
            $this->db->from('kelahiran');
            $this->db->join('penduduk', 'kelahiran.id_penduduk = penduduk.id_penduduk');
            $this->db->order_by('id_kelahiran','DESC');
            $this->db->where('id_kelahiran',$id);
            return $this->db->get()->row();
        }
    }
    public function get_data_ayah()
    {
        return $this->db->get_where('penduduk',array('status_dalam_keluarga'=>'Ayah'))->result();
    }
    public function get_data_ibu()
    {
        return $this->db->get_where('penduduk',array('status_dalam_keluarga'=>'Ibu'))->result();
    }
    public function insert_data()
    {
        $tanggal_lahir =  str_replace('/', '-',$this->input->post('tanggal_lahir',true));
        $get_data_ibu = $this->db->get_where('penduduk',array('nama_lengkap'=>$this->input->post('nama_ibu',true)))->row();
        $data_penduduk = [
			'status_penduduk' 	  => 'Tetap',
			'status_perkawinan'	  => 'Belum Menikah',
			'status_dalam_keluarga'=>'Anak',
			'status_hidup'        => 0,
			'no_kk'	              => $this->input->post('nomor_kk',true),
			'nama_lengkap'	      => $this->input->post('nama_balita',true),
			'tempat_lahir'	      => $this->input->post('tempat_lahir',true),
			'tanggal_lahir'	      => date('Y-m-d', strtotime($tanggal_lahir)),
			'jenis_kelamin'	      => $this->input->post('jenis_kelamin',true),
			'agama'	              => $this->input->post('agama',true),
			'kewarganegaraan'     => $get_data_ibu->kewarganegaraan,
			'provinsi'	          => $get_data_ibu->provinsi,
			'kota'	              => $get_data_ibu->kota,
			'kecamatan'	          => $get_data_ibu->kecamatan,
			'kelurahan'	          => $get_data_ibu->kelurahan,
			'dusun'	              => $get_data_ibu->dusun,
			'rt'	              => $get_data_ibu->rt,
			'rw'	              => $get_data_ibu->rw,
			'alamat'	          => $get_data_ibu->alamat,
			'kode_pos'	          => $get_data_ibu->kode_pos,
			'nama_ibu'	          => $this->input->post('nama_ibu',true),
			'nama_bapak'	      => $this->input->post('nama_ayah',true),
            'tanggal_input'       => date('Y-m-d')
        ];
        $this->db->insert('penduduk',$data_penduduk);
        $id_penduduk = $this->db->insert_id();
        //insert data pindahan
        $data_pindahan = [
            'id_penduduk'         => $id_penduduk,
        ];
        $this->db->insert('pindah_kependudukan',$data_pindahan);
        // $id_penduduk = $this->db->order_by('id_penduduk',"desc")->get('penduduk')->row();
        $data_kelahiran = [
            'id_penduduk'   => $id_penduduk,
			'anak_ke_berapa'=> $this->input->post('anak_ke',true),
			'no_akte' 		=> $this->input->post('nomor_akte',true),
        ];
        $this->db->insert('kelahiran',$data_kelahiran);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'menambah data kelahiran',
            'url'        => 'kelahiran',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil dibuat');
        redirect('kelahiran');
    }
    public function edit_data()
    {
        $tanggal_lahir =  str_replace('/', '-',$this->input->post('tanggal_lahir',true));
        $get_data_ibu = $this->db->get_where('penduduk',array('nama_lengkap'=>$this->input->post('nama_ibu',true)))->row();
        $data_penduduk = [
			'no_kk'	              => $this->input->post('nomor_kk',true),
			'nama_lengkap'	      => $this->input->post('nama_balita',true),
			'tempat_lahir'	      => $this->input->post('tempat_lahir',true),
			'tanggal_lahir'	      => date('Y-m-d', strtotime($tanggal_lahir)),
			'jenis_kelamin'	      => $this->input->post('jenis_kelamin',true),
			'agama'	              => $this->input->post('agama',true),
			'kewarganegaraan'     => $get_data_ibu->kewarganegaraan,
			'provinsi'	          => $get_data_ibu->provinsi,
			'kota'	              => $get_data_ibu->kota,
			'kecamatan'	          => $get_data_ibu->kecamatan,
			'kelurahan'	          => $get_data_ibu->kelurahan,
			'dusun'	              => $get_data_ibu->dusun,
			'rt'	              => $get_data_ibu->rt,
			'rw'	              => $get_data_ibu->rw,
			'alamat'	          => $get_data_ibu->alamat,
			'kode_pos'	          => $get_data_ibu->kode_pos,
			'nama_ibu'	          => $this->input->post('nama_ibu',true),
			'nama_bapak'	      => $this->input->post('nama_ayah',true),
        ];
        $this->db->where('id_penduduk',$this->input->post('id_penduduk'));
		$this->db->update('penduduk',$data_penduduk);
        $data_kelahiran = [
			'anak_ke_berapa'=> $this->input->post('anak_ke',true),
			'no_akte' 		=> $this->input->post('nomor_akte',true),
        ];
        $this->db->where('id_kelahiran',$this->input->post('id_kelahiran'));
		$this->db->update('kelahiran',$data_kelahiran);
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'edit data kelahiran',
            'url'        => 'kelahiran',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
		$this->session->set_flashdata('pesan','Akun berhasil diubah');
        redirect('kelahiran');
    }
    public function delete_data($id)
    {
        $this->db->where('id_kelahiran',$id);
        $this->db->delete('kelahiran');
        //nontifikasi
        date_default_timezone_set("Asia/Jakarta");
        $data_notifikasi = [
            'keterangan' => 'hapus data kelahiran',
            'url'        => 'kelahiran',
            'waktu'        => date("Y-m-d H:i:s"),
        ];
        $this->db->insert('notifikasi',$data_notifikasi);
        $this->session->set_flashdata('pesan','Akun berhasil hapus');
        redirect('kelahiran');
    }
}
