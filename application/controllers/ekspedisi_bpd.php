<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekspedisi_bpd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_ekspedisi_bpd');
		$this->load->model('model_notifikasi');
	}
	public function index()
	{
		//load view pake library template
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$data['ekspedisi_bpd'] = $this->model_ekspedisi_bpd->get_data();
		$this->template->load('template_admin','ekspedisi_bpd/data_ekspedisi_bpd',$data);
		
	}
	public function add_ekspedisi_bpd()
	{
		//form validation
        $this->form_validation->set_rules('tanggal_pengiriman', 'Tanggal Pengiriman', 'trim|required');
        $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'trim|required');
        $this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required');
        $this->form_validation->set_rules('isi_singkat', 'Isi Singkat', 'trim|required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_ekspedisi_bpd->insert_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','ekspedisi_bpd/add_ekspedisi_bpd',$data);
	}
	public function edit_ekspedisi_bpd($id)
	{
		//form validation
        $this->form_validation->set_rules('tanggal_pengiriman', 'Tanggal Pengiriman', 'trim|required');
        $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'trim|required');
        $this->form_validation->set_rules('nomor_surat', 'Nomor Surat', 'trim|required');
        $this->form_validation->set_rules('isi_singkat', 'Isi Singkat', 'trim|required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_ekspedisi_bpd->edit_data();
		}
		$data['ekspedisi_bpd'] = $this->model_ekspedisi_bpd->get_data($id);
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','ekspedisi_bpd/edit_ekspedisi_bpd',$data);

	}
	public function delete_ekspedisi_bpd($id)
	{
		$this->model_ekspedisi_bpd->delete_data($id);
	}
}
