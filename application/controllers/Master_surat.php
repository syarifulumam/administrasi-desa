<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_surat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_master_surat');
		$this->load->model('model_notifikasi');
    }
    public function index()
    {
		$data['master_surat'] = $this->model_master_surat->get_data();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','master_surat/data_master_surat',$data);
    }
    public function add_master_surat()
    {
        $this->form_validation->set_rules('nama_surat', 'Nama Surat', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_master_surat->insert_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','master_surat/add_master_surat',$data);
    }
    public function edit_master_surat($id)
    {
        $this->form_validation->set_rules('nama_surat', 'Nama Surat', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_master_surat->edit_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$data['master_surat'] = $this->model_master_surat->get_data($id);
        $this->template->load('template_admin','master_surat/edit_master_surat',$data);
    }
	public function delete_master_surat($id)
	{
		$this->model_master_surat->delete_data($id);
	}
}
    
