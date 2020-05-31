<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_identitas');
		$this->load->model('model_notifikasi');
	}
	public function index()
	{
		//load view pake library template
		$data['identitas'] = $this->model_identitas->get_data();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','identitas/data_identitas',$data);
		
	}
	public function edit_identitas()
	{
		//form validation
        $this->form_validation->set_rules('nama_desa', 'Nama Desa', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
        $this->form_validation->set_rules('kota', 'Kota', 'trim|required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'trim|required');
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'trim|required');
        $this->form_validation->set_rules('no_fax', 'Nomor Fax', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('website', 'Website', 'trim|required');
        $this->form_validation->set_rules('format_waktu', 'Format Waktu', 'trim|required');
        $this->form_validation->set_rules('jenis_kecamatan', 'Jenis Kecamatan', 'trim|required');
        $this->form_validation->set_rules('jenis_pemerintahan', 'Jenis Pemerintahan', 'trim|required');
        $this->form_validation->set_rules('jenis_desa', 'Jenis Desa', 'trim|required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_identitas->edit_data();
		}
		$data['identitas'] = $this->model_identitas->get_data();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','identitas/edit_identitas',$data);

	}
}
