<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perdes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_perdes');
	}
	public function index()
	{
		//load view pake library template
		$data['perdes'] = $this->model_perdes->get_data();
		$this->template->load('template_admin','perdes/data_perdes',$data);
		
	}
	public function add_perdes()
	{
		//form validation
        $this->form_validation->set_rules('nomor_perdes', 'Nomor Perdes', 'trim|required');
        $this->form_validation->set_rules('tanggal_perdes', 'Tanggal Perdes', 'trim|required');
        $this->form_validation->set_rules('tentang', 'Tentang', 'trim|required');
        $this->form_validation->set_rules('uraian', 'Uraian', 'trim|required');
        $this->form_validation->set_rules('nomor_persetujuan_bpd', 'Nomor Persetujuan BPD', 'trim|required');
        $this->form_validation->set_rules('tanggal_persetujuan_bpd', 'Tanggal Persetujuan BPD', 'trim|required');
        $this->form_validation->set_rules('nomor_laporkan', 'Nomor Dilaporkan', 'trim|required');
        $this->form_validation->set_rules('tanggal_dilaporkan', 'Tanggal Dilaporkan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_perdes->insert_data();
		}
        $this->template->load('template_admin','perdes/add_perdes');
	}
	public function edit_perdes($id)
	{
		//form validation
        //form validation
        $this->form_validation->set_rules('nomor_perdes', 'Nomor Perdes', 'trim|required');
        $this->form_validation->set_rules('tanggal_perdes', 'Tanggal Perdes', 'trim|required');
        $this->form_validation->set_rules('tentang', 'Tentang', 'trim|required');
        $this->form_validation->set_rules('uraian', 'Uraian', 'trim|required');
        $this->form_validation->set_rules('nomor_persetujuan_bpd', 'Nomor Persetujuan BPD', 'trim|required');
        $this->form_validation->set_rules('tanggal_persetujuan_bpd', 'Tanggal Persetujuan BPD', 'trim|required');
        $this->form_validation->set_rules('nomor_laporkan', 'Nomor Dilaporkan', 'trim|required');
        $this->form_validation->set_rules('tanggal_dilaporkan', 'Tanggal Dilaporkan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_perdes->edit_data();
		}
		$data['perdes'] = $this->model_perdes->get_data($id);
		$this->template->load('template_admin','perdes/edit_perdes',$data);

	}
	public function delete_perdes($id)
	{
		$this->model_perdes->delete_data($id);
	}
}
