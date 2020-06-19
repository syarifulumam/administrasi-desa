<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tanah_desa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_tanah_desa');
		$this->load->model('model_notifikasi');
	}
	public function index()
	{
		//load view pake library template
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$data['tanah_desa'] = $this->model_tanah_desa->get_data();
		$this->template->load('template_admin','tanah_desa/data_tanah_desa',$data);
		
	}
	public function add_tanah_desa()
	{
		//form validation
        $this->form_validation->set_rules('nama_perorangan', 'Nama Perorangan', 'trim|required');
        $this->form_validation->set_rules('badan_hukum', 'Badan Hukum', 'trim|required');
        $this->form_validation->set_rules('jumlah_luas_tanah', 'Jumlah Luas Tanah', 'trim|required');
        $this->form_validation->set_rules('sertifikasi', 'Sertifikasi', 'trim|required');
        $this->form_validation->set_rules('hm', 'HM', 'trim|required');
        $this->form_validation->set_rules('hgb', 'HGB', 'trim|required');
        $this->form_validation->set_rules('hp', 'HP', 'trim|required');
        $this->form_validation->set_rules('hgu', 'HGU', 'trim|required');
        $this->form_validation->set_rules('hpl', 'HPL', 'trim|required');
        $this->form_validation->set_rules('ma', 'MA', 'trim|required');
        $this->form_validation->set_rules('vi', 'VI', 'trim|required');
        $this->form_validation->set_rules('tn', 'TN', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_perumahan', 'Pengguna Tanah Perumahan', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_perorangan', 'pengguna_tanah_perorangan', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_perdagangan', 'pengguna_tanah_perdagangan', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_perkantoran', 'pengguna_tanah_perkantoran', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_industri', 'pengguna_tanah_industri', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_umum', 'pengguna_tanah_umum', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_sawah', 'pengguna_tanah_sawah', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_tegalan', 'pengguna_tanah_tegalan', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_perkebunan', 'pengguna_tanah_perkebunan', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_pertenakan', 'pengguna_tanah_pertenakan', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_hutan', 'pengguna_tanah_hutan', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_kosong', 'pengguna_tanah_kosong', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_tanah_desa->insert_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','tanah_desa/add_tanah_desa',$data);
	}
	public function edit_tanah_desa($id)
	{
		//form validation
        $this->form_validation->set_rules('nama_perorangan', 'Nama Perorangan', 'trim|required');
        $this->form_validation->set_rules('badan_hukum', 'Badan Hukum', 'trim|required');
        $this->form_validation->set_rules('jumlah_luas_tanah', 'Jumlah Luas Tanah', 'trim|required');
        $this->form_validation->set_rules('sertifikasi', 'Sertifikasi', 'trim|required');
        $this->form_validation->set_rules('hm', 'HM', 'trim|required');
        $this->form_validation->set_rules('hgb', 'HGB', 'trim|required');
        $this->form_validation->set_rules('hp', 'HP', 'trim|required');
        $this->form_validation->set_rules('hgu', 'HGU', 'trim|required');
        $this->form_validation->set_rules('hpl', 'HPL', 'trim|required');
        $this->form_validation->set_rules('ma', 'MA', 'trim|required');
        $this->form_validation->set_rules('vi', 'VI', 'trim|required');
        $this->form_validation->set_rules('tn', 'TN', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_perumahan', 'Pengguna Tanah Perumahan', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_perorangan', 'pengguna_tanah_perorangan', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_perdagangan', 'pengguna_tanah_perdagangan', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_perkantoran', 'pengguna_tanah_perkantoran', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_industri', 'pengguna_tanah_industri', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_umum', 'pengguna_tanah_umum', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_sawah', 'pengguna_tanah_sawah', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_tegalan', 'pengguna_tanah_tegalan', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_perkebunan', 'pengguna_tanah_perkebunan', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_pertenakan', 'pengguna_tanah_pertenakan', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_hutan', 'pengguna_tanah_hutan', 'trim|required');
        $this->form_validation->set_rules('pengguna_tanah_kosong', 'pengguna_tanah_kosong', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_tanah_desa->edit_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $data['tanah_desa'] = $this->model_tanah_desa->get_data($id);
        if ($data['tanah_desa'] == null) {
			redirect('tanah_desa');
		}
		$this->template->load('template_admin','tanah_desa/edit_tanah_desa',$data);

	}
	public function delete_tanah_desa($id)
	{
		$this->model_tanah_desa->delete_data($id);
	}
}
