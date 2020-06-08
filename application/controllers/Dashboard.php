<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_dashboard');
		$this->load->model('model_notifikasi');
    }
    public function index()
    {   
        
        $data['penduduk'] = $this->model_dashboard->get_penduduk();
        $data['kelahiran'] = $this->model_dashboard->get_kelahiran();
        $data['kematian'] = $this->model_dashboard->get_kematian();
        $data['pidah_kependudukan'] = $this->model_dashboard->get_pindah_kependudukan();
        //data perbulan
        if ($this->input->post()) {
            $tahun = $this->input->post('tahun');
            $data['penduduk_perbulan'] = $this->model_dashboard->get_penduduk_perbulan($tahun);
            $data['kelahiran_perbulan'] = $this->model_dashboard->get_kelahiran_perbulan($tahun);
            $data['kematian_perbulan'] = $this->model_dashboard->get_kematian_perbulan($tahun);
            $data['pindah_perbulan'] = $this->model_dashboard->get_pindah_kependudukan_perbulan($tahun);
        }else{
            $data['penduduk_perbulan'] = $this->model_dashboard->get_penduduk_perbulan();
            $data['kelahiran_perbulan'] = $this->model_dashboard->get_kelahiran_perbulan();
            $data['kematian_perbulan'] = $this->model_dashboard->get_kematian_perbulan();
            $data['pindah_perbulan'] = $this->model_dashboard->get_pindah_kependudukan_perbulan();
        }
        //data jumlah gender
        $data['gender_penduduk'] = $this->model_dashboard->get_gender_penduduk();
        $data['gender_kelahiran'] = $this->model_dashboard->get_gender_kelahiran();
        $data['gender_kematian'] = $this->model_dashboard->get_gender_kematian();
        $data['gender_pindah_kependudukan'] = $this->model_dashboard->get_gender_pindah_kependudukan();
        //data lain
        $data['surat'] = $this->model_dashboard->get_surat();
        $data['ekspedisi_bpd'] = $this->model_dashboard->get_ekspedisi_bpd();
        $data['ekspedisi_kearsipan'] = $this->model_dashboard->get_ekspedisi_kearsipan();
        $data['dusun'] = $this->model_dashboard->get_dusun();
        $data['provinsi'] = $this->model_dashboard->get_provinsi();
        $data['kota'] = $this->model_dashboard->get_kota();
        $data['kecamatan'] = $this->model_dashboard->get_kecamatan();
        $data['kelurahan'] = $this->model_dashboard->get_kelurahan();
        //nontifikasi
        $data['notifikasi'] = $this->model_notifikasi->get_data();
        //data total keuangan
        $data['pengeluaran'] = $this->model_dashboard->get_pengeluaran();
        $data['pemasukan']   = $this->model_dashboard->get_pemasukan();
        $this->template->load('template_admin','dashboard',$data);
    }
}
