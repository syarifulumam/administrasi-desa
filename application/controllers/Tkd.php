<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tkd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_tkd');
		$this->load->model('model_notifikasi');
	}
	public function index()
	{
		//load view pake library template
		$data['tkd'] = $this->model_tkd->get_data();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','tkd/data_tkd',$data);
		
	}
	public function add_tkd()
	{
		//form validation
        $this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
        $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
        $this->form_validation->set_rules('luas_ha', 'luas_ha', 'trim|required');
        $this->form_validation->set_rules('asal_tkd', 'asal_tkd', 'trim|required');
        $this->form_validation->set_rules('peruntukan', 'peruntukan', 'trim|required');
        $this->form_validation->set_rules('asli_milik', 'asli_milik', 'trim|required');
        $this->form_validation->set_rules('bantuan_lain', 'bantuan_lain', 'trim|required');
        $this->form_validation->set_rules('jumlah_tkd_sawah', 'jumlah_tkd_sawah', 'trim|required');
        $this->form_validation->set_rules('bantuan_provinsi', 'bantuan_provinsi', 'trim|required');
        $this->form_validation->set_rules('jumlah_tkd_kebun', 'jumlah_tkd_kebun', 'trim|required');
        $this->form_validation->set_rules('nomor_sertifikat', 'nomor_sertifikat', 'trim|required');
        $this->form_validation->set_rules('jumlah_tkd_darat', 'jumlah_tkd_darat', 'trim|required');
        $this->form_validation->set_rules('bantuan_kabupaten', 'bantuan_kabupaten', 'trim|required');
        $this->form_validation->set_rules('jumlah_tkd_tegalan', 'jumlah_tkd_tegalan', 'trim|required');
        $this->form_validation->set_rules('bantuan_pemerintah', 'bantuan_pemerintah', 'trim|required');
        $this->form_validation->set_rules('tanggal_perolehan_amd', 'tanggal_perolehan_amd', 'trim|required');
        $this->form_validation->set_rules('tanggal_perolehan_bantuan_pemerintah', 'tanggal_perolehan_bantuan_pemerintah', 'trim|required');
        $this->form_validation->set_rules('tanggal_perolehan_bantuan_provinsi', 'tanggal_perolehan_bantuan_provinsi', 'trim|required');
        $this->form_validation->set_rules('tanggal_perolehan_bantuan_kabupaten', 'tanggal_perolehan_bantuan_kabupaten', 'trim|required');
        $this->form_validation->set_rules('tanggal_perolehan_bantuan_lain', 'tanggal_perolehan_bantuan_lain', 'trim|required');
        $this->form_validation->set_rules('jumlah_tkd_tambak_kolam', 'jumlah_tkd_tambak_kolam', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_tkd->insert_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','tkd/add_tkd');
	}
	public function edit_tkd($id)
	{
		//form validation
        $this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
        $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
        $this->form_validation->set_rules('luas_ha', 'luas_ha', 'trim|required');
        $this->form_validation->set_rules('asal_tkd', 'asal_tkd', 'trim|required');
        $this->form_validation->set_rules('peruntukan', 'peruntukan', 'trim|required');
        $this->form_validation->set_rules('asli_milik', 'asli_milik', 'trim|required');
        $this->form_validation->set_rules('bantuan_lain', 'bantuan_lain', 'trim|required');
        $this->form_validation->set_rules('jumlah_tkd_sawah', 'jumlah_tkd_sawah', 'trim|required');
        $this->form_validation->set_rules('bantuan_provinsi', 'bantuan_provinsi', 'trim|required');
        $this->form_validation->set_rules('jumlah_tkd_kebun', 'jumlah_tkd_kebun', 'trim|required');
        $this->form_validation->set_rules('nomor_sertifikat', 'nomor_sertifikat', 'trim|required');
        $this->form_validation->set_rules('jumlah_tkd_darat', 'jumlah_tkd_darat', 'trim|required');
        $this->form_validation->set_rules('bantuan_kabupaten', 'bantuan_kabupaten', 'trim|required');
        $this->form_validation->set_rules('jumlah_tkd_tegalan', 'jumlah_tkd_tegalan', 'trim|required');
        $this->form_validation->set_rules('bantuan_pemerintah', 'bantuan_pemerintah', 'trim|required');
        $this->form_validation->set_rules('tanggal_perolehan_amd', 'tanggal_perolehan_amd', 'trim|required');
        $this->form_validation->set_rules('tanggal_perolehan_bantuan_pemerintah', 'tanggal_perolehan_bantuan_pemerintah', 'trim|required');
        $this->form_validation->set_rules('tanggal_perolehan_bantuan_provinsi', 'tanggal_perolehan_bantuan_provinsi', 'trim|required');
        $this->form_validation->set_rules('tanggal_perolehan_bantuan_kabupaten', 'tanggal_perolehan_bantuan_kabupaten', 'trim|required');
        $this->form_validation->set_rules('tanggal_perolehan_bantuan_lain', 'tanggal_perolehan_bantuan_lain', 'trim|required');
        $this->form_validation->set_rules('jumlah_tkd_tambak_kolam', 'jumlah_tkd_tambak_kolam', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_tkd->edit_data();
		}
		$data['tkd'] = $this->model_tkd->get_data($id);
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','tkd/edit_tkd',$data);

	}
	public function delete_tkd($id)
	{
		$this->model_tkd->delete_data($id);
	}
}
