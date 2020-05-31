<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelahiran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_kelahiran');
		$this->load->model('model_notifikasi');
	}
	public function index()
	{
		//load view pake library template
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$data['kelahiran'] = $this->model_kelahiran->get_data();
		$this->template->load('template_admin','kelahiran/data_kelahiran',$data);
		
	}
	public function add_kelahiran()
	{
		//form validation
        $this->form_validation->set_rules('nama_balita', 'Nama Balita', 'trim|required');
        $this->form_validation->set_rules('nomor_akte', 'Nomor Akte', 'trim|required');
        $this->form_validation->set_rules('nomor_kk', 'Nomor KK', 'trim|required');
        $this->form_validation->set_rules('anak_ke', 'Anak Ke', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required');
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_kelahiran->insert_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$data['ayah'] = $this->model_kelahiran->get_data_ayah();
		$data['ibu']  = $this->model_kelahiran->get_data_ibu();
        $this->template->load('template_admin','kelahiran/add_kelahiran',$data);
	}
	public function edit_kelahiran($id)
	{
		//form validation
        $this->form_validation->set_rules('nama_balita', 'Nama Balita', 'trim|required');
        $this->form_validation->set_rules('nomor_akte', 'Nomor Akte', 'trim|required');
        $this->form_validation->set_rules('nomor_kk', 'Nomor KK', 'trim|required');
        $this->form_validation->set_rules('anak_ke', 'Anak Ke', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required');
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_kelahiran->edit_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$data['ayah'] = $this->model_kelahiran->get_data_ayah();
		$data['ibu']  = $this->model_kelahiran->get_data_ibu();
		$data['kelahiran'] = $this->model_kelahiran->get_data($id);
		$this->template->load('template_admin','kelahiran/edit_kelahiran',$data);

	}
	public function delete_kelahiran($id)
	{
		$this->model_kelahiran->delete_data($id);
	}
}
