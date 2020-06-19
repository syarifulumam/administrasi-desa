<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_keuangan');
		$this->load->model('model_notifikasi');
    }
    public function index()
    {
		$data['keuangan'] = $this->model_keuangan->get_data();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','keuangan_pemasukan/data_keuangan_pemasukan',$data);
    }
    public function pengeluaran()
    {
		$data['keuangan'] = $this->model_keuangan->get_data_pengeluaran();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','keuangan_pengeluaran/data_keuangan_pengeluaran',$data);
    }
    public function edit_keuangan_pemasukan($id)
    {
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
        if ($this->form_validation->run() == true) {
           $this->model_keuangan->edit_data();
        }
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $data['keuangan'] = $this->model_keuangan->get_data($id);
        if ($data['keuangan'] == null) {
			redirect('keuangan');
		}
        $this->template->load('template_admin','keuangan_pemasukan/edit_keuangan_pemasukan',$data);
    }
    public function edit_keuangan_pengeluaran($id)
    {
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
        if ($this->form_validation->run() == true) {
           $this->model_keuangan->edit_data();
        }
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $data['keuangan'] = $this->model_keuangan->get_data($id);
        if ($data['keuangan'] == null) {
			redirect('keuangan');
		}
        $this->template->load('template_admin','keuangan_pengeluaran/edit_keuangan_pengeluaran',$data);
    }
    public function add_keuangan_pemasukan()
    {
        
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
        if ($this->form_validation->run() == true) {
           $this->model_keuangan->insert_data();
        }
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','keuangan_pemasukan/add_keuangan_pemasukan',$data);
    }
    public function add_keuangan_pengeluaran()
    {
        
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
        if ($this->form_validation->run() == true) {
           $this->model_keuangan->insert_data();
        }
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','keuangan_pengeluaran/add_keuangan_pengeluaran',$data);
    }
    public function delete_keuangan($id)
	{
		$this->model_keuangan->delete_keuangan($id);
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