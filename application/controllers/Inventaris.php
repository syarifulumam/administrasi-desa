<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_inventaris');
		$this->load->model('model_notifikasi');
	}
	public function index()
	{
		//load view pake library template
		$data['inventaris'] = $this->model_inventaris->get_data();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','inventaris/data_inventaris',$data);
		
	}
	public function add_inventaris()
	{
		//form validation
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('asal_barang', 'Asal Barang', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('keadaan_awal_tahun', 'Keadaan Awal Tahun', 'trim|required');
        $this->form_validation->set_rules('jumlah_kondisi_baik', 'Jumlah Kondisi Baik', 'trim|required');
        $this->form_validation->set_rules('tanggal_penghapusan', 'Tanggal Penghapusan', 'trim|required');
        $this->form_validation->set_rules('jumlah_kondisi_rusak', 'Jumlah Kondisi Rusak', 'trim|required');
        $this->form_validation->set_rules('jumlah_penghapusan_rusak', 'Jumlah Penghapusan Rusak', 'trim|required');
        $this->form_validation->set_rules('jumlah_penghapusan_dijual', 'Jumlah Penghapusan Dijual', 'trim|required');
        $this->form_validation->set_rules('jumlah_penghapusan_disumbangkan', 'Jumlah Penghapusan Disumbangkan', 'trim|required');
        $this->form_validation->set_rules('keadaan_barang_akhir_tahun', 'Keadaan Barang Akhir Tahun', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_inventaris->insert_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','inventaris/add_inventaris',$data);
	}
	public function edit_inventaris($id)
	{
		//form validation
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('asal_barang', 'Asal Barang', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('keadaan_awal_tahun', 'Keadaan Awal Tahun', 'trim|required');
        $this->form_validation->set_rules('jumlah_kondisi_baik', 'Jumlah Kondisi Baik', 'trim|required');
        $this->form_validation->set_rules('tanggal_penghapusan', 'Tanggal Penghapusan', 'trim|required');
        $this->form_validation->set_rules('jumlah_kondisi_rusak', 'Jumlah Kondisi Rusak', 'trim|required');
        $this->form_validation->set_rules('jumlah_penghapusan_rusak', 'Jumlah Penghapusan Rusak', 'trim|required');
        $this->form_validation->set_rules('jumlah_penghapusan_dijual', 'Jumlah Penghapusan Dijual', 'trim|required');
        $this->form_validation->set_rules('jumlah_penghapusan_disumbangkan', 'Jumlah Penghapusan Disumbangkan', 'trim|required');
        $this->form_validation->set_rules('keadaan_barang_akhir_tahun', 'Keadaan Barang Akhir Tahun', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_inventaris->edit_data();
		}
		$data['inventaris'] = $this->model_inventaris->get_data($id);
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','inventaris/edit_inventaris',$data);

	}
	public function delete_inventaris($id)
	{
		$this->model_inventaris->delete_data($id);
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
