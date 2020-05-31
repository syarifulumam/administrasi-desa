<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kematian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_kematian');
		$this->load->model('model_notifikasi');
	}
	public function index()
	{
		//load view pake library template
		$data['kematian'] = $this->model_kematian->get_data();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','kematian/data_kematian',$data);
		
	}
	public function add_kematian()
	{
		//form validation
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('tanggal_kematian', 'Tanggal Kematian', 'trim|required');
        $this->form_validation->set_rules('tempat_meninggal', 'Tempat Kematian', 'trim|required');
        $this->form_validation->set_rules('sebab', 'Sebab Kematian', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('tanggal_pemakaman', 'Tanggal Pemakaman', 'trim|required');
        $this->form_validation->set_rules('tempat_pemakaman', 'Tempat Pemakaman', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_kematian->insert_data();
		}
		$data['penduduk'] = $this->model_kematian->get_data_penduduk();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','kematian/add_kematian',$data);
	}
	public function edit_kematian($id)
	{
		//form validation
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('tanggal_kematian', 'Tanggal Kematian', 'trim|required');
        $this->form_validation->set_rules('tempat_meninggal', 'Tempat Kematian', 'trim|required');
        $this->form_validation->set_rules('sebab', 'Sebab Kematian', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('tanggal_pemakaman', 'Tanggal Pemakaman', 'trim|required');
        $this->form_validation->set_rules('tempat_pemakaman', 'Tempat Pemakaman', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_kematian->edit_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$data['kematian'] = $this->model_kematian->get_data($id);
		$data['penduduk'] = $this->model_kematian->get_data_penduduk();
		$this->template->load('template_admin','kematian/edit_kematian',$data);

	}
	public function delete_kematian($id)
	{
		$this->model_kematian->delete_data($id);
	}
}
