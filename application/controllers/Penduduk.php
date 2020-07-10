<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

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
	//import data excell
	public function import_penduduk()
	{
		//upload foto
		$config['upload_path']          = './upload/file_import';
		$config['allowed_types']        = 'xlsx|xls';
		$config['file_name'] 			= 'doc' . time();
        //load library
		$this->load->library('upload', $config);
		// validasi upload foto
		if ($this->upload->do_upload('file')) {
			$file = $this->upload->data();
			$reader = ReaderEntityFactory::createXLSXReader();
			$reader->setShouldFormatDates(true);
			$reader->open('./upload/file_import/'. $file['file_name']);
			foreach ($reader->getSheetIterator() as $sheet) {
				$numRow = 1;
				foreach ($sheet->getRowIterator() as $row) {
					if ($numRow > 1) {
						$tanggal_lahir = $row->getCellAtIndex(3);
						$tahun_lahir = explode('-',$tanggal_lahir);
						$tahun_lahir = date('Y') - $tahun_lahir[2];
						if ($tahun_lahir == 0) {
							$tahun_lahir = 1;
						}
						$provinsi = $this->db->get_where('provinsi',array('nama_provinsi'=>strtoupper($row->getCellAtIndex(14))))->row();
						$kota = $this->db->get_where('kota',array('nama_kota'=>strtoupper($row->getCellAtIndex(15))))->row();
						$kecamatan = $this->db->get_where('kecamatan',array('nama_kecamatan'=>strtoupper($row->getCellAtIndex(16))))->row();
						$kelurahan = $this->db->get_where('kelurahan',array('nama_kelurahan'=>strtoupper($row->getCellAtIndex(17))))->row();
						$dusun = $this->db->get_where('dusun',array('nama_dusun'=>strtoupper($row->getCellAtIndex(18))))->row();
						
						if ($row->getCellAtIndex(10) != 'Hidup') {
							$status_hidup = 1;
						}else{
							$status_hidup = 0;
						}
						$data = array(
							'nama_lengkap' 			=> $row->getCellAtIndex(1),
							'tempat_lahir' 			=> $row->getCellAtIndex(2),
							'tanggal_lahir' 		=> date('Y-m-d', strtotime($tanggal_lahir)),
							'jenis_kelamin' 		=> $row->getCellAtIndex(4),
							'agama' 				=> $row->getCellAtIndex(5),
							'pekerjaan' 			=> $row->getCellAtIndex(6),
							'status_perkawinan'		=> $row->getCellAtIndex(7),
							'status_penduduk' 		=> $row->getCellAtIndex(8),
							'status_dalam_keluarga' => $row->getCellAtIndex(9),
							'status_hidup' 			=> $status_hidup,
							'nik' 					=> $row->getCellAtIndex(11),
							'no_kk' 				=> $row->getCellAtIndex(12),
							'kewarganegaraan'	    => $row->getCellAtIndex(13),
							'provinsi' 				=> $provinsi->id_provinsi,
							'kota' 					=> $kota->id_kota,
							'kecamatan' 			=> $kecamatan->id_kecamatan,
							'kelurahan' 			=> $kelurahan->id_kelurahan,
							'dusun' 				=> $dusun->id_dusun,
							'rt' 					=> $row->getCellAtIndex(19),
							'rw' 					=> $row->getCellAtIndex(20),
							'alamat' 				=> $row->getCellAtIndex(21),
							'kode_pos' 				=> $row->getCellAtIndex(22),
							'no_telepon' 			=> $row->getCellAtIndex(23),
							'pendidikan_terakhir' 	=> $row->getCellAtIndex(24),
							'nama_ibu' 				=> $row->getCellAtIndex(25),
							'nama_bapak' 			=> $row->getCellAtIndex(26),
							'tanggal_input' 		=> date('Y-m-d'),
							'foto' 					=> "avatar.png",
							'umur' 					=> $tahun_lahir,
						);
						$this->model_penduduk->import($data);
					}
					$numRow++;
				}
				$reader->close();
				unlink(('./upload/file_import/'. $file['file_name']));
			}
		}else{
			$this->session->set_flashdata('pesan',$this->upload->display_errors());
			redirect('penduduk');
		}
	}
}
