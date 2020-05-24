<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_keuangan');
    }
    public function index()
    {
		$data['keuangan'] = $this->model_keuangan->get_data();
        $this->template->load('template_admin','keuangan/data_keuangan',$data);
    }
    public function edit_keuangan($id)
    {
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
        if ($this->form_validation->run() == true) {
           $this->model_keuangan->edit_data();
        }
        $data['keuangan'] = $this->model_keuangan->get_data($id);
        $this->template->load('template_admin','keuangan/edit_keuangan',$data);
    }
    public function add_keuangan()
    {
        
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
        if ($this->form_validation->run() == true) {
           $this->model_keuangan->insert_data();
        }
        $this->template->load('template_admin','keuangan/add_keuangan');
    }
    public function delete_keuangan($id)
	{
		$this->model_keuangan->delete_keuangan($id);
	}
}