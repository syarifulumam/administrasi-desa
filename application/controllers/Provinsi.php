<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_provinsi');
		$this->load->model('model_notifikasi');
    }
    public function index()
    {
		$data['provinsi'] = $this->model_provinsi->get_data();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','provinsi/data_provinsi',$data);
    }
    public function add_provinsi()
    {
        $this->form_validation->set_rules('nama_provinsi', 'Nama Provinsi', 'trim|required|callback_alpha_dash_space');
		if ($this->form_validation->run() == true) {
			$this->model_provinsi->insert_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','provinsi/add_provinsi',$data);
    }
    public function edit_provinsi($id)
    {
        $this->form_validation->set_rules('nama_provinsi', 'Nama Provinsi', 'trim|required|callback_alpha_dash_space');
		if ($this->form_validation->run() == true) {
			$this->model_provinsi->edit_data();
		}
		$data['provinsi'] = $this->model_provinsi->get_data($id);
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','provinsi/edit_provinsi',$data);
    }
	public function delete_provinsi($id)
	{
		$this->model_provinsi->delete_data($id);
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
    
