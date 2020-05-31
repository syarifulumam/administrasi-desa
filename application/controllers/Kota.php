<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_kota');
		$this->load->model('model_notifikasi');
    }
    public function index()
    {
		$data['kota'] = $this->model_kota->get_data();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','kota/data_kota',$data);
    }
    public function add_kota()
    {
        $this->form_validation->set_rules('kota', 'Nama Kota', 'trim|required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_kota->insert_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$data['provinsi'] = $this->model_kota->get_provinsi();
        $this->template->load('template_admin','kota/add_kota',$data);
    }
    public function edit_kota($id)
    {
        $this->form_validation->set_rules('kota', 'Nama Kota', 'trim|required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_kota->edit_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$data['kota'] = $this->model_kota->get_data($id);
		$data['provinsi'] = $this->model_kota->get_provinsi();
        $this->template->load('template_admin','kota/edit_kota',$data);
    }
	public function delete_kota($id)
	{
		$this->model_kota->delete_data($id);
	}
}
    
