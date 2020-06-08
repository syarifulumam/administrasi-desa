<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur_organisasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_struktur_organisasi');
		$this->load->model('model_notifikasi');
    }
    public function index()
    {
		$data['struktur_organisasi'] = $this->model_struktur_organisasi->get_data();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','struktur_organisasi/data_struktur_organisasi',$data);
    }
    public function add_struktur_organisasi()
    {
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|callback_alpha_dash_space');
		$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'trim|required|callback_alpha_dash_space');
		if ($this->form_validation->run() == true) {
			$this->model_struktur_organisasi->insert_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','struktur_organisasi/add_struktur_organisasi',$data);
    }
    public function edit_struktur_organisasi($id)
    {
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|callback_alpha_dash_space');
		$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'trim|required|callback_alpha_dash_space');
		if ($this->form_validation->run() == true) {
			$this->model_struktur_organisasi->edit_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$data['struktur_organisasi'] = $this->model_struktur_organisasi->get_data($id);
        $this->template->load('template_admin','struktur_organisasi/edit_struktur_organisasi',$data);
    }
	public function delete_struktur_organisasi($id)
	{
		$this->model_struktur_organisasi->delete_data($id);
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
    
