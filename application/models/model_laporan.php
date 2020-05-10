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
}
