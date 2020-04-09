<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class aparat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_aparat');
	}
	public function index()
	{
		//load view pake library template
		$data['aparat'] = $this->model_aparat->get_data();
		$this->template->load('template_admin','aparat/data_aparat',$data);
		
	}
	public function add_aparat()
	{
		//form validation
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_rules('niap', 'NIAP', 'trim|required');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
        $this->form_validation->set_rules('pangkat', 'Pangkat', 'trim|required');
        $this->form_validation->set_rules('keaktifan', 'Keaktifan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('nomor_pengangkatan', 'Nomor Pengangkatan', 'trim|required');
        $this->form_validation->set_rules('tanggal_pengangkatan', 'Tanggal Pengangkatan', 'trim|required');
        $this->form_validation->set_rules('nomor_pemberhentian', 'Nomor Pemberhentian', 'trim|required');
        $this->form_validation->set_rules('tanggal_pemberhentian', 'Tanggal Pemberhentian', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_aparat->insert_data();
		}
        $this->template->load('template_admin','aparat/add_aparat');
	}
	public function edit_aparat($id)
	{
		//form validation
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_rules('niap', 'NIAP', 'trim|required');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
        $this->form_validation->set_rules('pangkat', 'Pangkat', 'trim|required');
        $this->form_validation->set_rules('keaktifan', 'Keaktifan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('nomor_pengangkatan', 'Nomor Pengangkatan', 'trim|required');
        $this->form_validation->set_rules('tanggal_pengangkatan', 'Tanggal Pengangkatan', 'trim|required');
        $this->form_validation->set_rules('nomor_pemberhentian', 'Nomor Pemberhentian', 'trim|required');
        $this->form_validation->set_rules('tanggal_pemberhentian', 'Tanggal Pemberhentian', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_aparat->edit_data();
		}
		$data['aparat'] = $this->model_aparat->get_data($id);
		$this->template->load('template_admin','aparat/edit_aparat',$data);

	}
	public function delete_aparat($id)
	{
		$this->model_aparat->delete_data($id);
	}
}
