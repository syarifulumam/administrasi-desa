<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_dashboard extends CI_Model {
    public function get_penduduk()
    {
        $this->db->not_like('status_hidup',1);
        $this->db->not_like('status_penduduk','Pindah');
        return $this->db->get('penduduk')->num_rows();
    }
    public function get_kelahiran()
    {
        return $this->db->get('kelahiran')->num_rows();
    }
    public function get_kematian()
    {
        $this->db->like('status_hidup',1);
        return $this->db->get('penduduk')->num_rows();
    }
    public function get_pindah_kependudukan()
    {
        $this->db->like('status_penduduk','Pindah');
        return $this->db->get('penduduk')->num_rows();
    }
    // data perbulan
    public function get_penduduk_perbulan()
    {
        for ($bulan=1; $bulan < 13; $bulan++) {
            $this->db->not_like('status_hidup',1);
            $this->db->not_like('status_penduduk','Pindah');
            $this->db->where('MONTH(tanggal_input)',$bulan);
            $this->db->where('YEAR(tanggal_input)',date('Y'));
            $result[] = $this->db->get('penduduk')->num_rows();
        }
        return $result;
    }
    public function get_kelahiran_perbulan()
    {
        for ($bulan=1; $bulan < 13; $bulan++) {
            $this->db->join('penduduk','kelahiran.id_penduduk=penduduk.id_penduduk');
            $this->db->where('MONTH(tanggal_input)',$bulan);
            $this->db->where('YEAR(tanggal_input)',date('Y'));
            $result[] = $this->db->get('kelahiran')->num_rows();
        }
        return $result;
    }
    public function get_kematian_perbulan()
    {
        for ($bulan=1; $bulan < 13; $bulan++) {
            $this->db->join('penduduk','kematian.id_penduduk=penduduk.id_penduduk');
            $this->db->where('MONTH(tanggal_input)',$bulan);
            $this->db->where('YEAR(tanggal_input)',date('Y'));
            $result[] = $this->db->get('kematian')->num_rows();
        }
        return $result;
    }
    public function get_pindah_kependudukan_perbulan()
    {
        for ($bulan=1; $bulan < 13; $bulan++) {
            $this->db->where('MONTH(tanggal_input)',$bulan);
            $this->db->where('YEAR(tanggal_input)',date('Y'));
            $this->db->where('status_penduduk','Pindah');
            $result[] = $this->db->get('penduduk')->num_rows();
        }
        return $result;
    }
    //data gender
    public function get_gender_penduduk()
    {
        $this->db->not_like('status_hidup',1);
        $this->db->not_like('status_penduduk','Pindah');
        $this->db->where('jenis_kelamin','Laki - Laki');
        $pria = $this->db->get('penduduk')->num_rows();

        $this->db->not_like('status_hidup',1);
        $this->db->not_like('status_penduduk','Pindah');
        $this->db->where('jenis_kelamin','Perempuan');
        $wanita = $this->db->get('penduduk')->num_rows();
    
        return $result = array($pria,$wanita);
    }
    public function get_gender_kelahiran()
    {
        $this->db->join('penduduk','kelahiran.id_penduduk=penduduk.id_penduduk');
        $this->db->not_like('status_hidup',1);
        $this->db->not_like('status_penduduk','Pindah');
        $this->db->where('jenis_kelamin','Laki - Laki');
        $pria = $this->db->get('kelahiran')->num_rows();

        $this->db->join('penduduk','kelahiran.id_penduduk=penduduk.id_penduduk');
        $this->db->not_like('status_hidup',1);
        $this->db->not_like('status_penduduk','Pindah');
        $this->db->where('jenis_kelamin','Perempuan');
        $wanita = $this->db->get('kelahiran')->num_rows();

        return $result = array($pria,$wanita);
    }
    public function get_gender_kematian()
    {
        $this->db->not_like('status_penduduk','Pindah');
        $this->db->where('status_hidup',1);
        $this->db->where('jenis_kelamin','Laki - Laki');
        $pria = $this->db->get('penduduk')->num_rows();
        
        
        $this->db->not_like('status_penduduk','Pindah');
        $this->db->where('status_hidup',1);
        $this->db->where('jenis_kelamin','Perempuan');
        $wanita = $this->db->get('penduduk')->num_rows();

        return $result = array($pria,$wanita);
    }
    public function get_gender_pindah_kependudukan()
    {
        $this->db->where('status_hidup',0);
        $this->db->where('status_penduduk','Pindah');
        $this->db->where('jenis_kelamin','Laki - Laki');
        $pria = $this->db->get('penduduk')->num_rows();
        
        $this->db->where('status_hidup',0);
        $this->db->where('status_penduduk','Pindah');
        $this->db->where('jenis_kelamin','Perempuan');
        $wanita = $this->db->get('penduduk')->num_rows();

        return $result = array($pria,$wanita);
    }
}
