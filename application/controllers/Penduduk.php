<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_penduduk');
		$this->load->model('model_notifikasi');
	}
	public function index()
	{
		//load view pake library template
		$data['penduduk'] = $this->model_penduduk->get_data();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','penduduk/data_penduduk',$data);
		
	}
	public function add_penduduk()
	{
		//form validation
        $this->form_validation->set_rules('nomor_kk', 'Nomor KK', 'trim|required');
        $this->form_validation->set_rules('nomor_ktp', 'Nomor KTP / NIK', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('negaraan', 'Negaraan', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
        $this->form_validation->set_rules('kota', 'Kota', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'trim|required');
        $this->form_validation->set_rules('dusun', 'Dusun', 'trim|required');
        $this->form_validation->set_rules('rt', 'RT', 'trim|required');
        $this->form_validation->set_rules('rw', 'RW', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'trim|required');
        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'trim|required');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_penduduk->insert_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$data['provinsi'] = $this->model_penduduk->get_data_provinsi();
        $this->template->load('template_admin','penduduk/add_penduduk',$data);
	}
	public function edit_penduduk($id)
	{
		//form validation
        //form validation
        $this->form_validation->set_rules('nomor_kk', 'Nomor KK', 'trim|required');
        $this->form_validation->set_rules('nomor_ktp', 'Nomor KTP / NIK', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama','required|trim|callback_alpha_dash_space');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('negaraan', 'Negaraan', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
        $this->form_validation->set_rules('kota', 'Kota', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'trim|required');
        $this->form_validation->set_rules('dusun', 'Dusun', 'trim|required');
        $this->form_validation->set_rules('rt', 'RT', 'trim|required');
        $this->form_validation->set_rules('rw', 'RW', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'trim|required');
        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'trim|required');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_penduduk->edit_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$data['provinsi'] = $this->model_penduduk->get_data_provinsi();
		$data['penduduk'] = $this->model_penduduk->get_data($id);
		if ($data['penduduk'] == null) {
			redirect('penduduk');
		}
		$this->template->load('template_admin','penduduk/edit_penduduk',$data);

	}
	public function delete_penduduk($id)
	{
		$this->model_penduduk->delete_data($id);
	}
	// combo box dinamis
	public function get_data_daerah()
	{
		$modul = $this->input->post('modul');
		$id = $this->input->post('id');
		if ($modul == "kota") {
			 $this->model_penduduk->kota($id);
		}elseif ($modul == "kecamatan") {
			$this->model_penduduk->kecamatan($id);
		}elseif ($modul == "kelurahan") {
			$this->model_penduduk->kelurahan($id);
		}elseif ($modul == "dusun") {
			$this->model_penduduk->dusun($id);
		}
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
