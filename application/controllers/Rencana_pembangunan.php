<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rencana_pembangunan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_rencana_pembangunan');
		$this->load->model('model_notifikasi');
	}
	public function index()
	{
		//load view pake library template
		$data['rencana_pembangunan'] = $this->model_rencana_pembangunan->get_data();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','rencana_pembangunan/data_rencana_pembangunan',$data);
		
	}
	public function add_rencana_pembangunan()
	{
		//form validation
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
        $this->form_validation->set_rules('manfaat', 'Manfaat', 'trim|required');
        $this->form_validation->set_rules('dana_kota', 'Dana Kota', 'trim|required');
        $this->form_validation->set_rules('pelaksana', 'Pelaksana', 'trim|required');
        $this->form_validation->set_rules('nama_proyek', 'Nama Proyek', 'trim|required');
        $this->form_validation->set_rules('dana_pemerintah', 'Dana Pemerintah', 'trim|required');
        $this->form_validation->set_rules('dana_provinsi', 'Dana Provinsi', 'trim|required');
        $this->form_validation->set_rules('dana_swadaya', 'Dana Swadaya', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_rencana_pembangunan->insert_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','rencana_pembangunan/add_rencana_pembangunan',$data);
	}
	public function edit_rencana_pembangunan($id)
	{
		//form validation
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
        $this->form_validation->set_rules('manfaat', 'Manfaat', 'trim|required');
        $this->form_validation->set_rules('dana_kota', 'Dana Kota', 'trim|required');
        $this->form_validation->set_rules('pelaksana', 'Pelaksana', 'trim|required');
        $this->form_validation->set_rules('nama_proyek', 'Nama Proyek', 'trim|required');
        $this->form_validation->set_rules('dana_pemerintah', 'Dana Pemerintah', 'trim|required');
        $this->form_validation->set_rules('dana_provinsi', 'Dana Provinsi', 'trim|required');
        $this->form_validation->set_rules('dana_swadaya', 'Dana Swadaya', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_rencana_pembangunan->edit_data();
		}
		$data['rencana_pembangunan'] = $this->model_rencana_pembangunan->get_data($id);
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','rencana_pembangunan/edit_rencana_pembangunan',$data);

	}
	public function delete_rencana_pembangunan($id)
	{
		$this->model_rencana_pembangunan->delete_data($id);
	}
}
