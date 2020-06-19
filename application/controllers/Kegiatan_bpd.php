<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan_bpd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_kegiatan_bpd');
		$this->load->model('model_notifikasi');
	}
	public function index()
	{
		//load view pake library template
		$data['kegiatan_bpd'] = $this->model_kegiatan_bpd->get_data();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','kegiatan_bpd/data_kegiatan_bpd',$data);
		
	}
	public function add_kegiatan_bpd()
	{
		//form validation
        $this->form_validation->set_rules('pelaksana', 'Pelaksana', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('tentang', 'Tentang', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('pokok', 'Pokok', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('hasil_kegiatan', 'hasil_kegiatan', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_kegiatan_bpd->insert_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','kegiatan_bpd/add_kegiatan_bpd',$data);
	}
	public function edit_kegiatan_bpd($id)
	{
		//form validation
        $this->form_validation->set_rules('pelaksana', 'Pelaksana', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('tentang', 'Tentang', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('pokok', 'Pokok', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('hasil_kegiatan', 'hasil_kegiatan', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_kegiatan_bpd->edit_data();
		}
		$data['kegiatan_bpd'] = $this->model_kegiatan_bpd->get_data($id);
		if ($data['kegiatan_bpd'] == null) {
			redirect('kegiatan_bpd');
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','kegiatan_bpd/edit_kegiatan_bpd',$data);

	}
	public function delete_kegiatan_bpd($id)
	{
		$this->model_kegiatan_bpd->delete_data($id);
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
