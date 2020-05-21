<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buat_surat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('pdf');
		$this->load->model('model_buat_surat');
	}
	public function index()
	{
		//load view pake library template
		$data['surat'] = $this->model_buat_surat->get_data();
		$this->template->load('template_admin','buat_surat/data_buat_surat',$data);
		
	}
	public function add_buat_surat()
	{
		//form validation
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_buat_surat->insert_data();
		}
		$data['penduduk'] = $this->model_buat_surat->get_data_penduduk();
		$data['master_surat'] = $this->model_buat_surat->get_master_surat();
		$this->template->load('template_admin','buat_surat/add_buat_surat',$data);
	}
	public function edit_buat_surat($id)
	{
		//form validation
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('tanggal_buat_surat', 'Tanggal buat_surat
		', 'trim|required');
		$this->form_validation->set_rules('tempat_meninggal', 'Tempat buat_surat
		', 'trim|required');
		$this->form_validation->set_rules('sebab', 'Sebab buat_surat
		', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_rules('tanggal_pemakaman', 'Tanggal Pemakaman', 'trim|required');
        $this->form_validation->set_rules('tempat_pemakaman', 'Tempat Pemakaman', 'trim|required');
		if ($this->form_validation->run() == true) {
			$this->model_buat_surat->edit_data();
		}
		$data['buat_surat
		'] = $this->model_buat_surat->get_data($id);
		$data['penduduk'] = $this->model_buat_surat->get_data_penduduk();
		$this->template->load('template_admin','buat_surat/edit_buat_surat',$data);

	}
	public function delete_buat_surat($id)
	{
		$this->model_buat_surat->delete_data($id);
	}
	public function laporan_surat($id)
	{
		//get data penduduk
		$data = $this->model_buat_surat->get_data($id);
		$gambar  =  base_url('assets/adminlte/dist/img/prov.png');
		$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
		// mencetak string 
		// cell(lebar,tinggi,text,border,next position,align,fill,url)
        $pdf->Cell(170,7,'KABUPATEN PENUKAL ABAB LEMATANG ILIR',0,1,'C');
        $pdf->Image($gambar,0,0);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(107,7,'Jl. Silang Monas Gambir Jakarta Pusat',0,1,'C');
		//ambil data dari db
		// if ($akhir == null) {
		// $row = $this->Model_laporan->getHarian($awal);
		// } else {
		// $row = $this->Model_laporan->getBulanan($awal,$akhir);
		// }
		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(190,7,'','B',1);
		//buat line baru
		$pdf->Cell(190,7,'SURAT KETERANGAN'. $data->nama_surat_dinas ,0,1,'C');
		$pdf->Cell(190,2,'Nomor Surat : ' . $data->no_surat,0,1,'C');
		$pdf->Ln();
		$pdf->Cell(10,10,'Yang bertanda tangan dibawah ini Kepala Desa Sukamakmur Kecamatan Sukamakmur Kabupaten Bogor, dengan ini ',0,1);
		$pdf->Cell(10,10,'Kami menerangkan',0,1);
		$pdf->Ln();
		$pdf->Cell(10,6,'Nama Lengkap             : ' . $data->nama_lengkap ,0,1);
		$pdf->Cell(10,6,'Jenis Kelamin               : ' . $data->jenis_kelamin ,0,1);
		$pdf->Cell(10,6,'Tempat, Tanggal Lahir	: ' . $data->tempat_lahir.",".$data->tanggal_lahir ,0,1);
		$pdf->Cell(10,6,'Kewarganegaraan        : ' . $data->kewarganegaraan ,0,1);
		$pdf->Cell(10,6,'Agama                          : ' . $data->agama ,0,1);
		$pdf->Cell(10,6,'Status Pernikahan		      : ' . $data->status_perkawinan ,0,1);
		$pdf->Cell(10,6,'Pekerjaan                     : ' . $data->pekerjaan ,0,1);
		$pdf->Cell(10,10,'Alamat                          : ' . $data->alamat ,0,1);
		$pdf->Ln();
		$pdf->Cell(10,2,'Berdasarkan Surat Pengantar dari ketua Rt.004 Rw 500 Desa Bogeg Kecamatan Sukra menerangkan ',0,1);
		$pdf->Cell(10,10,'bahwa nama tersebut diatas adalah benar yang bersangkutan saat ini berdomisili di alamat tersebut diatas.',0,1);
		$pdf->Cell(10,10,'Demikian Surat Keterangan ini untuk dapat dipergunakan semestinya.',0,1);
		$pdf->Ln();
		$pdf->Cell(140);
		$pdf->Cell(2,5,'Sukamakmur '.$data->tanggal_surat,0,1,'L');
		$pdf->Cell(140);
		$pdf->Cell(2,5,'Kepala Desa Sukamakmur',0,1,'L');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Cell(175,5,'FAKHRUDIN, S.Kom',0,1,'R');
		$pdf->Cell(173,5,'NIP:234.4545.5656',0,1,'R');

		$pdf->SetFont('Arial','',7);
		$pdf->Cell(95,15,'',0,1);
		$pdf->SetTitle('Laundry Kiloan');

		$pdf->Output('Laundry Kiloan','I');
	}
}
