<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kader_pembangunan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_kader_pembangunan');
	}
	public function index()
	{
		//load view pake library template
		$data['kader_pembangunan'] = $this->model_kader_pembangunan->get_data();
		$this->template->load('template_admin','kader_pembangunan/data_kader_pembangunan',$data);
		
	}
	public function add_kader_pembangunan()
	{
		//form validation
        $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'trim|required');
        $this->form_validation->set_rules('kelamin', 'kelamin', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'trim|required');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'trim|required');
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
        $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
        $this->form_validation->set_rules('bidang', 'bidang', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_kader_pembangunan->insert_data();
		}
        $this->template->load('template_admin','kader_pembangunan/add_kader_pembangunan');
	}
	public function edit_kader_pembangunan($id)
	{
		//form validation
        $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'trim|required');
        $this->form_validation->set_rules('kelamin', 'kelamin', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'trim|required');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'trim|required');
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
        $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
        $this->form_validation->set_rules('bidang', 'bidang', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_kader_pembangunan->edit_data();
		}
		$data['kader_pembangunan'] = $this->model_kader_pembangunan->get_data($id);
		$this->template->load('template_admin','kader_pembangunan/edit_kader_pembangunan',$data);

	}
	public function delete_kader_pembangunan($id)
	{
		$this->model_kader_pembangunan->delete_data($id);
	}
}
