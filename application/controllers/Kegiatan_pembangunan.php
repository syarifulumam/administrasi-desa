<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan_pembangunan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_kegiatan_pembangunan');
	}
	public function index()
	{
		//load view pake library template
		$data['kegiatan_pembangunan'] = $this->model_kegiatan_pembangunan->get_data();
		$this->template->load('template_admin','kegiatan_pembangunan/data_kegiatan_pembangunan',$data);
		
	}
	public function add_kegiatan_pembangunan()
	{
		//form validation
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
        $this->form_validation->set_rules('volume', 'Volume', 'trim|required');
        $this->form_validation->set_rules('dana_kota', 'Dana Kota', 'trim|required');
        $this->form_validation->set_rules('pelaksana', 'Pelaksana', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('nama_proyek', 'Nama Proyek', 'trim|required');
        $this->form_validation->set_rules('dana_swadaya', 'Dana Swadaya', 'trim|required');
        $this->form_validation->set_rules('sifat_proyek', 'Sifat Proyek', 'trim|required');
        $this->form_validation->set_rules('dana_provinsi', 'Dana Provinsi', 'trim|required');
        $this->form_validation->set_rules('dana_pemerintah', 'Dana Pemerintah', 'trim|required');
        $this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_kegiatan_pembangunan->insert_data();
		}
        $this->template->load('template_admin','kegiatan_pembangunan/add_kegiatan_pembangunan');
	}
	public function edit_kegiatan_pembangunan($id)
	{
		//form validation
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
        $this->form_validation->set_rules('volume', 'Volume', 'trim|required');
        $this->form_validation->set_rules('dana_kota', 'Dana Kota', 'trim|required');
        $this->form_validation->set_rules('pelaksana', 'Pelaksana', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('nama_proyek', 'Nama Proyek', 'trim|required');
        $this->form_validation->set_rules('dana_swadaya', 'Dana Swadaya', 'trim|required');
        $this->form_validation->set_rules('sifat_proyek', 'Sifat Proyek', 'trim|required');
        $this->form_validation->set_rules('dana_provinsi', 'Dana Provinsi', 'trim|required');
        $this->form_validation->set_rules('dana_pemerintah', 'Dana Pemerintah', 'trim|required');
        $this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_kegiatan_pembangunan->edit_data();
		}
		$data['kegiatan_pembangunan'] = $this->model_kegiatan_pembangunan->get_data($id);
		$this->template->load('template_admin','kegiatan_pembangunan/edit_kegiatan_pembangunan',$data);

	}
	public function delete_kegiatan_pembangunan($id)
	{
		$this->model_kegiatan_pembangunan->delete_data($id);
	}
}
