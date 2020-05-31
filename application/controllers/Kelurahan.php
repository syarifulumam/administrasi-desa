<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kelurahan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_kelurahan');
		$this->load->model('model_notifikasi');
    }
    public function index()
    {
		$data['kelurahan'] = $this->model_kelurahan->get_data();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','kelurahan/data_kelurahan',$data);
    }
    public function add_kelurahan()
    {
        $this->form_validation->set_rules('kelurahan', 'Nama kelurahan', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'Kota', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_kelurahan->insert_data();
		}
		$data['kecamatan'] = $this->model_kelurahan->get_kecamatan();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','kelurahan/add_kelurahan',$data);
    }
    public function edit_kelurahan($id)
    {
        $this->form_validation->set_rules('kelurahan', 'Nama kelurahan', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'Kota', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_kelurahan->edit_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$data['kelurahan'] = $this->model_kelurahan->get_data($id);
		$data['kecamatan'] = $this->model_kelurahan->get_kecamatan();
        $this->template->load('template_admin','kelurahan/edit_kelurahan',$data);
    }
	public function delete_kelurahan($id)
	{
		$this->model_kelurahan->delete_data($id);
	}
}
    
