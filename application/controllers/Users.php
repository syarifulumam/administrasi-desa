<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user');
		$this->load->model('model_notifikasi');
	}
	public function index()
	{
		//load view pake library template
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$data['user'] = $this->model_user->get_data();
		$this->template->load('template_admin','users/data_user',$data);
		
	}
	public function add_user()
	{
		//form validation
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('level_user', 'level_user', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_user->insert_data();
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
        $this->template->load('template_admin','users/add_user',$data);
	}
	public function edit_user($id)
	{
		//form validation
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_user->edit_data();
		}
		$data['user'] = $this->model_user->get_data($id);
		if ($data['user'] == null) {
			redirect('user');
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','users/edit_user',$data);

	}
	public function delete_user($id)
	{
		$this->model_user->delete_data($id);
	}
}
