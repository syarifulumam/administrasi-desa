<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kecamatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_kecamatan');
    }
    public function index()
    {
		$data['kecamatan'] = $this->model_kecamatan->get_data();
        $this->template->load('template_admin','kecamatan/data_kecamatan',$data);
    }
    public function add_kecamatan()
    {
        $this->form_validation->set_rules('kecamatan', 'Nama kecamatan', 'trim|required');
        $this->form_validation->set_rules('kota', 'Kota', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_kecamatan->insert_data();
		}
		$data['kota'] = $this->model_kecamatan->get_kota();
        $this->template->load('template_admin','kecamatan/add_kecamatan',$data);
    }
    public function edit_kecamatan($id)
    {
        $this->form_validation->set_rules('kecamatan', 'Nama kecamatan', 'trim|required');
        $this->form_validation->set_rules('kota', 'kota', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_kecamatan->edit_data();
		}
		$data['kecamatan'] = $this->model_kecamatan->get_data($id);
		$data['kota'] = $this->model_kecamatan->get_kota();
        $this->template->load('template_admin','kecamatan/edit_kecamatan',$data);
    }
	public function delete_kecamatan($id)
	{
		$this->model_kecamatan->delete_data($id);
	}
}
    
