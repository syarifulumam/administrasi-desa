<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dusun extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_dusun');
    }
    public function index()
    {
		$data['dusun'] = $this->model_dusun->get_data();
        $this->template->load('template_admin','dusun/data_dusun',$data);
    }
    public function add_dusun()
    {
        $this->form_validation->set_rules('dusun', 'Nama dusun', 'trim|required');
        $this->form_validation->set_rules('kelurahan', 'Kota', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_dusun->insert_data();
		}
		$data['kelurahan'] = $this->model_dusun->get_kelurahan();
        $this->template->load('template_admin','dusun/add_dusun',$data);
    }
    public function edit_dusun($id)
    {
        $this->form_validation->set_rules('dusun', 'Nama dusun', 'trim|required');
        $this->form_validation->set_rules('kelurahan', 'Kota', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_dusun->edit_data();
		}
		$data['dusun'] = $this->model_dusun->get_data($id);
		$data['kelurahan'] = $this->model_dusun->get_kelurahan();
        $this->template->load('template_admin','dusun/edit_dusun',$data);
    }
	public function delete_dusun($id)
	{
		$this->model_dusun->delete_data($id);
	}
}
    
