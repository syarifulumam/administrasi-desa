<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pindahan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_pindahan');
		$this->load->model('model_notifikasi');
	}
	public function index()
	{
		//load view pake library template
		$data['pindahan'] = $this->model_pindahan->get_data();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','pindahan/data_pindahan',$data);
		
	}
	public function add_pindahan()
	{
		//form validation
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('tanggal_pindahan', 'Tanggal Pindahan', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_pindahan->insert_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$data['penduduk'] = $this->model_pindahan->get_data_penduduk();
        $this->template->load('template_admin','pindahan/add_pindahan',$data);
	}
	public function edit_pindahan($id)
	{
		//form validation
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('tanggal_pindahan', 'Tanggal Pindahan', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_pindahan->edit_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$data['pindahan'] = $this->model_pindahan->get_data($id);
		if ($data['pindahan'] == null) {
			redirect('pindahan');
		}
		$this->template->load('template_admin','pindahan/edit_pindahan',$data);

	}
	public function delete_pindahan($id)
	{
		$this->model_pindahan->delete_data($id);
	}
}
