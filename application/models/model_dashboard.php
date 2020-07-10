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
    public function get_penduduk_perbulan($tahun = null)
    {
        for ($bulan=1; $bulan < 13; $bulan++) {
            $this->db->not_like('status_hidup',1);
            $this->db->not_like('status_penduduk','Pindah');
            $this->db->where('MONTH(tanggal_input)',$bulan);
            if ($tahun == null) {
                $this->db->where('YEAR(tanggal_input)',date('Y'));
            } else {
                $this->db->where('YEAR(tanggal_input)',$tahun);
            }
            $result[] = $this->db->get('penduduk')->num_rows();
        }
        return $result;
    }
    public function get_kelahiran_perbulan($tahun = null)
    {
        for ($bulan=1; $bulan < 13; $bulan++) {
            $this->db->join('penduduk','kelahiran.id_penduduk=penduduk.id_penduduk');
            $this->db->where('MONTH(tanggal_input)',$bulan);
            if ($tahun == null) {
                $this->db->where('YEAR(tanggal_input)',date('Y'));
            } else {
                $this->db->where('YEAR(tanggal_input)',$tahun);
            }
            $result[] = $this->db->get('kelahiran')->num_rows();
        }
        return $result;
    }
    public function get_kematian_perbulan($tahun = null)
    {
        for ($bulan=1; $bulan < 13; $bulan++) {
            $this->db->join('penduduk','kematian.id_penduduk=penduduk.id_penduduk');
            $this->db->where('MONTH(tanggal_input)',$bulan);
            if ($tahun == null) {
                $this->db->where('YEAR(tanggal_input)',date('Y'));
            } else {
                $this->db->where('YEAR(tanggal_input)',$tahun);
            }
            $result[] = $this->db->get('kematian')->num_rows();
        }
        return $result;
    }
    public function get_pindah_kependudukan_perbulan($tahun = null)
    {
        for ($bulan=1; $bulan < 13; $bulan++) {
            $this->db->where('MONTH(tanggal_input)',$bulan);
            if ($tahun == null) {
                $this->db->where('YEAR(tanggal_input)',date('Y'));
            } else {
                $this->db->where('YEAR(tanggal_input)',$tahun);
            }
            $this->db->where('status_penduduk','Pindah');
            $result[] = $this->db->get('penduduk')->num_rows();
        }
        return $result;
    }
    //data tahunan
    public function get_penduduk_pertahun()
    {
        $get_penduduk = "SELECT COUNT(tanggal_input) as jumlah, year(tanggal_input) as tahun FROM `penduduk` GROUP BY year(tanggal_input) ORDER BY tahun ASC";
        return $this->db->query($get_penduduk)->result();
    }
    public function get_kelahiran_pertahun()
    {
        
        $get_tahun = "SELECT MAX(year(tanggal_input)) as tahun_terakhir, MIN(year(tanggal_input)) as tahun_awal FROM `penduduk`";
        $tahun = $this->db->query($get_tahun)->result();
        $get_kelahiran = "SELECT COUNT(penduduk.tanggal_input) as jumlah, year(penduduk.tanggal_input) as tahun FROM `penduduk` JOIN kelahiran on penduduk.id_penduduk=kelahiran.id_penduduk GROUP BY year(tanggal_input)";
        $kelahiran = $this->db->query($get_kelahiran)->result();
        foreach ($kelahiran as $key) {
            for ($i= $tahun[0]->tahun_awal; $i <= $tahun[0]->tahun_terakhir ; $i++) { 
                if ($i != $key->tahun) {
                    $result[] = 0;
                }else{
                    $result[] = $key->jumlah;
                }
            }
        }

        return $result;
    }
    public function get_kematian_pertahun()
    {
        $get_tahun = "SELECT MAX(year(tanggal_input)) as tahun_terakhir, MIN(year(tanggal_input)) as tahun_awal FROM `penduduk`";
        $tahun = $this->db->query($get_tahun)->result();
        $get_kematian = "SELECT DISTINCT(year(tanggal_meninggal)) as tahun, COUNT(tanggal_meninggal) as jumlah FROM `kematian`";
        $kematian = $this->db->query($get_kematian)->result();

        foreach ($kematian as $key) {
            for ($i= $tahun[0]->tahun_awal; $i <= $tahun[0]->tahun_terakhir ; $i++) { 
                if ($i != $key->tahun) {
                    $result[] = 0;
                }else{
                    $result[] = $key->jumlah;
                }
            }
        }

        return $result;
    }
    public function get_pindah_kependudukan_pertahun()
    {
        $get_tahun = "SELECT MAX(year(tanggal_input)) as tahun_terakhir, MIN(year(tanggal_input)) as tahun_awal FROM `penduduk`";
        $tahun = $this->db->query($get_tahun)->result();
        $get_pindahan = "SELECT COUNT(tanggal_pindah) AS jumlah, year(tanggal_pindah) as tahun FROM `pindah_kependudukan` JOIN penduduk ON penduduk.id_penduduk=pindah_kependudukan.id_penduduk WHERE tanggal_pindah IS NOT NULL GROUP BY year(tanggal_pindah)";
        $pindahan = $this->db->query($get_pindahan)->result();

        foreach ($pindahan as $key) {
            for ($i= $tahun[0]->tahun_awal; $i <= $tahun[0]->tahun_terakhir ; $i++) { 
                if ($i != $key->tahun) {
                    $result[] = 0;
                }else{
                    $result[] = $key->jumlah;
                }
            }
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
    public function get_surat()
    {
        return $this->db->get('surat')->num_rows();
    }
    public function get_ekspedisi_bpd()
    {
        return $this->db->get('ekspedisi_bpd')->num_rows();
    }
    public function get_ekspedisi_kearsipan()
    {
        return $this->db->get('ekspedisi')->num_rows();
    }
    public function get_dusun()
    {
        return $this->db->get('dusun')->num_rows();
    }
    public function get_provinsi()
    {
        return $this->db->get('provinsi')->num_rows();
    }
    public function get_kota()
    {
        return $this->db->get('kota')->num_rows();
    }
    public function get_kecamatan()
    {
        return $this->db->get('kecamatan')->num_rows();
    }
    public function get_kelurahan()
    {
        return $this->db->get('kelurahan')->num_rows();
    }
    public function get_pengeluaran()
    {
        $query = "SELECT SUM(harga) as totalnya FROM keuangan WHERE status = 'pengeluaran'";
        return $this->db->query($query)->row();
    }
    public function get_pemasukan()
    {
        $query = "SELECT SUM(harga) as totalnya FROM keuangan WHERE status = 'pemasukan'";
        return $this->db->query($query)->row();
    }
    public function get_pendidikan()
    {
        $query = "SELECT SUM(case when pendidikan_terakhir='SD' then 1 else 0 end) AS SD, SUM(case when pendidikan_terakhir='SMP' then 1 else 0 end) AS SMP , SUM(case when pendidikan_terakhir='SMA' then 1 else 0 end) AS SMA , SUM(case when pendidikan_terakhir='DIPLOMA 1' then 1 else 0 end) AS D1 , SUM(case when pendidikan_terakhir='DIPLOMA 2' then 1 else 0 end) AS D2 , SUM(case when pendidikan_terakhir='DIPLOMA 3' then 1 else 0 end) AS D3 , SUM(case when pendidikan_terakhir='STRATA 1' then 1 else 0 end) AS S1 , SUM(case when pendidikan_terakhir='STRATA 2' then 1 else 0 end) AS S2 , SUM(case when pendidikan_terakhir='STRATA 3' then 1 else 0 end) AS S3 FROM `penduduk`";

        return $this->db->query($query)->result();
    }
    public function get_umur()
    {
        $query = "SELECT COUNT(umur) AS jumlah , umur FROM `penduduk` GROUP BY umur";
        return $this->db->query($query)->result();
    }
}
