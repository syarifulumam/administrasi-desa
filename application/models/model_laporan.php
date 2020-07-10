<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_laporan extends CI_Model {
    public function get_data_surat()
    {
        $ubah_format_tanggal = str_replace(' ','',$this->input->post('tanggal'));
        $ubah = explode('-',$ubah_format_tanggal);
        $date_start = str_replace('/', '-', $ubah[0]);
        $date_end = str_replace('/', '-', $ubah[1]);
        // ubah dd/mm/yy ke yy/mm/dd
        $date_start = date('Y-m-d', strtotime($date_start));
        $date_end   = date('Y-m-d', strtotime($date_end));
        //ambil data dari database
        $this->db->select('surat.*,master_surat.nama_surat_dinas,penduduk.nama_lengkap');
        $this->db->from('surat');
        $this->db->join('master_surat','surat.id_master_surat=master_surat.id_master_surat');
        $this->db->join('penduduk','surat.id_penduduk=penduduk.id_penduduk');
        if($this->input->post('jenis') != null){
            $this->db->where('surat.id_master_surat',$this->input->post('jenis'));
        }
        $this->db->where('tanggal_surat >=', $date_start);
        $this->db->where('tanggal_surat <=', $date_end);
        return $this->db->get()->result();
    }
    public function get_data_ekspedisi_bpd($tanggal)
    {
        $this->db->where('tanggal_surat >=', $tanggal[0]);
        $this->db->where('tanggal_surat <=', $tanggal[1]);
        return $this->db->get('ekspedisi_bpd')->result();
    }
    public function get_data_ekspedisi($tanggal)
    {
        $this->db->where('tanggal_surat >=', $tanggal[0]);
        $this->db->where('tanggal_surat <=', $tanggal[1]);
        return $this->db->get('ekspedisi')->result();
    }
    public function get_data_penduduk($tanggal)
    {
        $this->db->where('tanggal_input >=', $tanggal[0]);
        $this->db->where('tanggal_input <=', $tanggal[1]);
        if (!empty($this->input->post('nomor_kk'))) {
            $this->db->where('no_kk', $this->input->post('nomor_kk'));
        }
        if ($this->input->post('status') != 'Semua') {
            $this->db->where('status_penduduk', $this->input->post('status'));
        }
        return $this->db->get('penduduk')->result();
    }
    public function get_data_dusun()
    {
        $query = "SELECT DISTINCT dusun.nama_dusun FROM `penduduk` JOIN dusun ON dusun.id_dusun = penduduk.dusun";
        return $this->db->query($query)->result();
    }
    public function coba($tanggal)
    {
        if ($this->input->post('dusun') == "Semua") {
            $query = "SELECT dusun.nama_dusun,COUNT(IF(penduduk.jenis_kelamin = 'Laki - Laki',1,null)) AS pria, COUNT(IF(penduduk.jenis_kelamin = 'Perempuan',1,null)) AS wanita FROM `penduduk` JOIN dusun ON dusun.id_dusun=penduduk.dusun WHERE penduduk.tanggal_input >=". $tanggal['0'] ." AND penduduk.tanggal_input <='" . $tanggal['1'] . "'GROUP BY dusun.nama_dusun";
            return $this->db->query($query)->result();
        } else {
            $dusun = $this->input->post('dusun');
            $query = "SELECT dusun.nama_dusun,COUNT(IF(penduduk.jenis_kelamin = 'Laki - Laki',1,null)) AS pria, COUNT(IF(penduduk.jenis_kelamin = 'Perempuan',1,null)) AS wanita FROM `penduduk` JOIN dusun ON dusun.id_dusun=penduduk.dusun WHERE penduduk.tanggal_input >='". $tanggal['0'] ."' AND penduduk.tanggal_input <='" . $tanggal['1'] . "'AND dusun.nama_dusun='" . $dusun . "'GROUP BY dusun.nama_dusun";
            return $this->db->query($query)->result();
        }
    }
    public function get_master_surat()
    {
        return $this->db->get('master_surat')->result();
    }
    public function get_data_keuangan($tanggal)
    {
        $this->db->where('tanggal >=', $tanggal[0]);
        $this->db->where('tanggal <=', $tanggal[1]);
        $this->db->where('status', $this->input->post('jenis'));
        return $this->db->get('keuangan')->result();
    }
    public function get_data_kelahiran($tanggal)
    {
        $this->db->select('kelahiran.*,penduduk.nama_lengkap,penduduk.no_kk,penduduk.tempat_lahir,penduduk.tanggal_lahir,penduduk.jenis_kelamin,penduduk.agama,penduduk.nama_ibu,penduduk.nama_bapak');
        $this->db->from('kelahiran');
        $this->db->join('penduduk', 'kelahiran.id_penduduk = penduduk.id_penduduk');
        $this->db->where('tanggal_input >=', $tanggal[0]);
        $this->db->where('tanggal_input <=', $tanggal[1]);
        return $this->db->get()->result();
    }
    public function get_data_pindah_kependudukan($tanggal)
    {
        $this->db->select('*');
        $this->db->from('pindah_kependudukan');
        $this->db->join('penduduk', 'pindah_kependudukan.id_penduduk = penduduk.id_penduduk');
        $this->db->where('tanggal_pindah >=', $tanggal[0]);
        $this->db->where('tanggal_pindah <=', $tanggal[1]);
        $this->db->where('status_penduduk', 'Pindah');
        return $this->db->get()->result();
    }
    public function get_data_kematian($tanggal)
    {
        $this->db->select('*');
        $this->db->from('kematian');
        $this->db->join('penduduk', 'kematian.id_penduduk = penduduk.id_penduduk');
        $this->db->where('tanggal_meninggal >=', $tanggal[0]);
        $this->db->where('tanggal_meninggal <=', $tanggal[1]);
        $this->db->where('status_hidup', 1);
        return $this->db->get()->result();
    }
}
