<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buat_surat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_buat_surat');
	}
	public function index()
	{
		//load view pake library template
		$data['surat'] = $this->model_buat_surat->get_data();
		$this->template->load('template_admin','buat_surat/data_buat_surat',$data);
		
	}
	public function add_buat_surat()
	{
		//form validation
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_buat_surat->insert_data();
		}
		$data['penduduk'] = $this->model_buat_surat->get_data_penduduk();
		$data['master_surat'] = $this->model_buat_surat->get_master_surat();
		$this->template->load('template_admin','buat_surat/add_buat_surat',$data);
	}
	public function edit_buat_surat($id)
	{
		//form validation
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('tanggal_buat_surat', 'Tanggal buat_surat
		', 'trim|required');
		$this->form_validation->set_rules('tempat_meninggal', 'Tempat buat_surat
		', 'trim|required');
		$this->form_validation->set_rules('sebab', 'Sebab buat_surat
		', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('tanggal_pemakaman', 'Tanggal Pemakaman', 'trim|required');
        $this->form_validation->set_rules('tempat_pemakaman', 'Tempat Pemakaman', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_buat_surat->edit_data();
		}
		$data['buat_surat
		'] = $this->model_buat_surat->get_data($id);
		$data['penduduk'] = $this->model_buat_surat->get_data_penduduk();
		$this->template->load('template_admin','buat_surat/edit_buat_surat',$data);

	}
	public function delete_buat_surat($id)
	{
		$this->model_buat_surat->delete_data($id);
	}
}
