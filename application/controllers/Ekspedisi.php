<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekspedisi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_ekspedisi');
		$this->load->model('model_notifikasi');
	}
	public function index()
	{
		//load view pake library template
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$data['ekspedisi'] = $this->model_ekspedisi->get_data();
		$this->template->load('template_admin','ekspedisi/data_ekspedisi',$data);
		
	}
	public function add_ekspedisi()
	{
		//form validation
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required');
        $this->form_validation->set_rules('isi_singkat', 'Isi Singkat', 'trim|required');
        $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'trim|required');
        $this->form_validation->set_rules('tanggal_pengiriman', 'Tanggal Pengiriman', 'trim|required');
			if ($this->form_validation->run() == true) {
			$this->model_ekspedisi->insert_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','ekspedisi/add_ekspedisi',$data);
	}
	public function edit_ekspedisi($id)
	{
		//form validation
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required');
        $this->form_validation->set_rules('isi_singkat', 'Isi Singkat', 'trim|required');
        $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'trim|required');
        $this->form_validation->set_rules('tanggal_pengiriman', 'Tanggal Pengiriman', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_ekspedisi->edit_data();
		}
		$data['ekspedisi'] = $this->model_ekspedisi->get_data($id);
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','ekspedisi/edit_ekspedisi',$data);

	}
	public function delete_ekspedisi($id)
	{
		$this->model_ekspedisi->delete_data($id);
	}
}
