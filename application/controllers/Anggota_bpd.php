<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class anggota_bpd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_anggota_bpd');
		$this->load->model('model_notifikasi');
	}
	public function index()
	{
		//load view pake library template
		$data['anggota_bpd'] = $this->model_anggota_bpd->get_data();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','anggota_bpd/data_anggota_bpd',$data);
		
	}
	public function add_anggota_bpd()
	{
		//form validation
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('nomor_anggota', 'Nomor Angota', 'trim|required');
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('pangkat', 'Pangkat', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');
        $this->form_validation->set_rules('tanggal_pengangkatan', 'Tanggal Pengangkatan', 'trim|required');
        $this->form_validation->set_rules('nomor_pengangkatan', 'Nomor Pengangkatan', 'trim|required');
        $this->form_validation->set_rules('tanggal_pemberhentian', 'Tanggal Pemberhentian', 'trim|required');
        $this->form_validation->set_rules('nomor_pemberhentian', 'Nomor Pemberhentian', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_anggota_bpd->insert_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','anggota_bpd/add_anggota_bpd',$data);
	}
	public function edit_anggota_bpd($id)
	{
		//form validation
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('nomor_anggota', 'Nomor Angota', 'trim|required');
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('pangkat', 'Pangkat', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');
        $this->form_validation->set_rules('tanggal_pengangkatan', 'Tanggal Pengangkatan', 'trim|required');
        $this->form_validation->set_rules('nomor_pengangkatan', 'Nomor Pengangkatan', 'trim|required');
        $this->form_validation->set_rules('tanggal_pemberhentian', 'Tanggal Pemberhentian', 'trim|required');
        $this->form_validation->set_rules('nomor_pemberhentian', 'Nomor Pemberhentian', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_anggota_bpd->edit_data();
		}
		$data['anggota_bpd'] = $this->model_anggota_bpd->get_data($id);
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','anggota_bpd/edit_anggota_bpd',$data);

	}
	public function delete_anggota_bpd($id)
	{
		$this->model_anggota_bpd->delete_data($id);
	}
	//function validation alpha & space
	function alpha_dash_space($str_in){
		if (! preg_match("/^([-a-z_ ])+$/i", $str_in)) {
			$this->form_validation->set_message('alpha_dash_space', '%s harap masukan huruf');
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
