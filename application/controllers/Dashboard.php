<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_dashboard');
    }
    public function index()
    {   
        for ($i=1; $i < 3 ; $i++) {
            $data['bulan'][] = [2,3,4,2,5,7,3,6,8,10,2,4];
        }
        $data['penduduk'] = $this->model_dashboard->get_penduduk();
        $data['kelahiran'] = $this->model_dashboard->get_kelahiran();
        $data['kematian'] = $this->model_dashboard->get_kematian();
        $data['pidah_kependudukan'] = $this->model_dashboard->get_pindah_kependudukan();
        //data perbulan
        $data['penduduk_perbulan'] = $this->model_dashboard->get_penduduk_perbulan();
        $data['kelahiran_perbulan'] = $this->model_dashboard->get_kelahiran_perbulan();
        $data['kematian_perbulan'] = $this->model_dashboard->get_kematian_perbulan();
        $data['pindah_perbulan'] = $this->model_dashboard->get_pindah_kependudukan_perbulan();
        //data jumlah gender
        $data['gender_penduduk'] = $this->model_dashboard->get_gender_penduduk();
        $data['gender_kelahiran'] = $this->model_dashboard->get_gender_kelahiran();
        $data['gender_kematian'] = $this->model_dashboard->get_gender_kematian();
        $data['gender_pindah_kependudukan'] = $this->model_dashboard->get_gender_pindah_kependudukan();
        $this->template->load('template_admin','dashboard',$data);
    }
}
