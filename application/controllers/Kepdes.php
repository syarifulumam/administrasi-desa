<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepdes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_kepdes');
		$this->load->model('model_notifikasi');
	}
	public function index()
	{
		//load view pake library template
		$data['kepdes'] = $this->model_kepdes->get_data();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','kepdes/data_kepdes',$data);
		
	}
	public function add_kepdes()
	{
		//form validation
        $this->form_validation->set_rules('uraian', 'Uraian', 'trim|required');
        $this->form_validation->set_rules('tentang', 'Tentang', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('nomor_kepdes', 'Nomor kepdes', 'trim|required');
        $this->form_validation->set_rules('nomor_laporkan', 'Nomor Dilaporkan', 'trim|required');
        $this->form_validation->set_rules('tanggal_dilaporkan', 'Tanggal Dilaporkan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_kepdes->insert_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','kepdes/add_kepdes',$data);
	}
	public function edit_kepdes($id)
	{
		//form validation
        $this->form_validation->set_rules('uraian', 'Uraian', 'trim|required');
        $this->form_validation->set_rules('tentang', 'Tentang', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('nomor_kepdes', 'Nomor kepdes', 'trim|required');
        $this->form_validation->set_rules('nomor_laporkan', 'Nomor Dilaporkan', 'trim|required');
        $this->form_validation->set_rules('tanggal_dilaporkan', 'Tanggal Dilaporkan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_kepdes->edit_data();
		}
		$data['kepdes'] = $this->model_kepdes->get_data($id);
		if ($data['kepdes'] == null) {
			redirect('kepdes');
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','kepdes/edit_kepdes',$data);

	}
	public function delete_kepdes($id)
	{
		$this->model_kepdes->delete_data($id);
	}
}
