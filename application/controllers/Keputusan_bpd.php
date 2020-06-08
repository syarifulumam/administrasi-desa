<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keputusan_bpd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_keputusan_bpd');
		$this->load->model('model_notifikasi');
	}
	public function index()
	{
		//load view pake library template
		$data['keputusan_bpd'] = $this->model_keputusan_bpd->get_data();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','keputusan_bpd/data_keputusan_bpd',$data);
		
	}
	public function add_keputusan_bpd()
	{
		//form validation
        $this->form_validation->set_rules('uraian', 'Uraian', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('tentang', 'Tentang', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('nomor_keputusan', 'Nomor Keputusan', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_keputusan_bpd->insert_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','keputusan_bpd/add_keputusan_bpd',$data);
	}
	public function edit_keputusan_bpd($id)
	{
		//form validation
        $this->form_validation->set_rules('uraian', 'Uraian', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('tentang', 'Tentang', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('nomor_keputusan', 'Nomor Keputusan', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_keputusan_bpd->edit_data();
		}
		$data['keputusan_bpd'] = $this->model_keputusan_bpd->get_data($id);
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','keputusan_bpd/edit_keputusan_bpd',$data);

	}
	public function delete_keputusan_bpd($id)
	{
		$this->model_keputusan_bpd->delete_data($id);
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
