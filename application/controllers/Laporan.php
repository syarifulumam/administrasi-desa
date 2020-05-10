<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('pdf');
		$this->load->model('model_laporan');
	}
	public function index()
	{
		if ($this->input->post()) {
			$data = $this->model_laporan->get_data_surat();
			$this->laporan_surat($data);
		}
		//load view pake library template
		$this->template->load('template_admin','laporan/data_laporan');
	}
	public function ekspedisi_kearsipan_bpd()
	{
		if ($this->input->post()) {
			$tanggal = $this->get_tanggal();
			$data = $this->model_laporan->get_data_ekspedisi_bpd($tanggal);
			$this->laporan_ekspedisi_bpd($data,$tanggal);
		}
		$this->template->load('template_admin','laporan/data_laporan_ekspedisi_bpd');
	}
	public function ekspedisi_kearsipan()
	{
		if ($this->input->post()) {
			$tanggal = $this->get_tanggal();
			$data = $this->model_laporan->get_data_ekspedisi($tanggal);
			$this->laporan_ekspedisi_bpd($data,$tanggal);
		}
		$this->template->load('template_admin','laporan/data_laporan_ekspedisi');
	}
	public function kependudukan()
	{
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		if ($this->form_validation->run() == true) {
			$tanggal = $this->get_tanggal();
			$data = $this->model_laporan->get_data_penduduk($tanggal);
			$this->laporan_penduduk($data,$tanggal);
		}
		$this->template->load('template_admin','laporan/data_laporan_penduduk');
	}
	public function perdusun()
	{
		$this->form_validation->set_rules('dusun', 'dusun', 'trim|required');
		if ($this->form_validation->run() == true) {
			$tanggal = $this->get_tanggal();
			$dusun = $this->input->post('dusun');
			$penduduk = $this->model_laporan->coba($tanggal);
			$this->laporan_dusun($penduduk,$tanggal,$dusun);
		}
		$data['dusun'] = $this->model_laporan->get_data_dusun();
		$this->template->load('template_admin','laporan/data_laporan_dusun',$data);
	}
	public function get_tanggal()
	{
		$ubah_format_tanggal = str_replace(' ','',$this->input->post('tanggal'));
        $ubah = explode('-',$ubah_format_tanggal);
        $date_start = str_replace('/', '-', $ubah[0]);
        $date_end = str_replace('/', '-', $ubah[1]);
        // ubah dd/mm/yy ke yy/mm/dd
        $date_start = date('Y-m-d', strtotime($date_start));
		$date_end   = date('Y-m-d', strtotime($date_end));
		return $tanggal = array($date_start,$date_end);
	}
	public function laporan_surat($data)
	{
		$gambar  =  base_url('assets/adminlte/dist/img/prov.png');
		$pdf = new FPDF('L','mm','A5');
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
		$pdf->Cell(10,10,'LAPORAN PEMBUATAN SURAT',0,1);
		$pdf->Cell(10,6,'No',1,0);
		$pdf->Cell(30,6,'Tanggal',1,0);
		$pdf->Cell(30,6,'Nomor Surat',1,0);
		$pdf->Cell(30,6,'Jenis Surat',1,0);
		$pdf->Cell(90,6,'Nama Pemohon',1,1);
		$no = 1;
		foreach ($data as $key) {
			$pdf->Cell(10,6,$no,1,0,);
			$pdf->Cell(30,6,$key->tanggal_surat,1,0,);
			$pdf->Cell(30,6,$key->no_surat,1,0);
			$pdf->Cell(30,6,$key->nama_surat_dinas,1,0);
			$pdf->Cell(90,6,$key->nama_lengkap,1,1 );
			$no++;
		}
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(95,15,'',0,1);
		$pdf->SetTitle('Laundry Kiloan');

		$pdf->Output('Laundry Kiloan','I');
	}
	public function laporan_ekspedisi_bpd($data,$tanggal)
	{
		$gambar  =  base_url('assets/adminlte/dist/img/prov.png');
		$pdf = new FPDF('L','mm','A5');
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
		$pdf->Cell(10,10,'LAPORAN PEMBUATAN EKSPEDISI TANGGAL '. $tanggal[0] . ' - ' . $tanggal[1],0,1);
		$pdf->Cell(10,6,'No',1,0);
		$pdf->Cell(35,6,'Tanggal Pengiriman',1,0);
		$pdf->Cell(30,6,'Tanggal Surat',1,0);
		$pdf->Cell(30,6,'Nomor Surat',1,0);
		$pdf->Cell(85,6,'Tujuan Surat',1,1);
		$no = 1;
		foreach ($data as $key) {
			$pdf->Cell(10,6,$no,1,0,);
			$pdf->Cell(35,6,$key->tanggal_pengiriman,1,0,);
			$pdf->Cell(30,6,$key->tanggal_surat,1,0,);
			$pdf->Cell(30,6,$key->nomor_surat,1,0);
			$pdf->Cell(85,6,$key->tujuan,1,1);
			$no++;
		}
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(95,15,'',0,1);
		$pdf->SetTitle('Laundry Kiloan');

		$pdf->Output('Laundry Kiloan','I');
	}
	public function laporan_penduduk($data,$tanggal)
	{
		$gambar  =  base_url('assets/adminlte/dist/img/prov.png');
		$pdf = new FPDF('L','mm','A4');
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
		$pdf->Cell(277,7,'','B',1);
		//buat line baru
		$pdf->Cell(10,10,'LAPORAN PENDUDUK TANGGAL '. $tanggal[0] . ' - ' . $tanggal[1],0,1);
		$pdf->Cell(10,6,'No',1,0);
		$pdf->Cell(35,6,'NIK',1,0);
		$pdf->Cell(30,6,'No KK',1,0);
		$pdf->Cell(58,6,'Nama Lengkap',1,0);
		$pdf->Cell(30,6,'Tempat Lahir',1,0);
		$pdf->Cell(30,6,'Tanggal Lahir',1,0);
		$pdf->Cell(85,6,'Alamat',1,1);
		$no = 1;
		foreach ($data as $key) {
			$pdf->Cell(10,6,$no,1,0,);
			$pdf->Cell(35,6,$key->nik,1,0,);
			$pdf->Cell(30,6,$key->no_kk,1,0,);
			$pdf->Cell(58,6,$key->nama_lengkap,1,0);
			$pdf->Cell(30,6,$key->tempat_lahir,1,0);
			$pdf->Cell(30,6,$key->tanggal_lahir,1,0);
			$pdf->Cell(85,6,$key->alamat,1,1);
			$no++;
		}
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(95,15,'',0,1);
		$pdf->SetTitle('Laundry Kiloan');

		$pdf->Output('Laundry Kiloan','I');
	}
	public function laporan_dusun($penduduk,$tanggal,$dusun)
	{
		if ($dusun == "Semua") {
			$dusun = "SEMUA DUSUN";
		} else {
			$dusun = "Dusun " . $dusun;
		}
		$gambar  =  base_url('assets/adminlte/dist/img/prov.png');
		$pdf = new FPDF('L','mm','A5');
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
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(190,7,'','B',1);
		//buat line baru
		$pdf->Cell(10,10,'LAPORAN ' . $dusun . ' TANGGAL '. $tanggal[0] . ' - ' . $tanggal[1],0,1);
		$pdf->Cell(10,6,'No',1,0);
		$pdf->Cell(55,6,'Nama Desa',1,0);
		$pdf->Cell(40,6,'Laki-Laki',1,0);
		$pdf->Cell(40,6,'Perempuan',1,0);
		$pdf->Cell(40,6,'Jumlah',1,1);
		$no = 1;
		foreach ($penduduk as $key) {
			$pdf->Cell(10,6,$no,1,0,);
			$pdf->Cell(55,6,$key->nama_dusun,1,0,);
			$pdf->Cell(40,6,$key->pria,1,0,);
			$pdf->Cell(40,6,$key->wanita,1,0);
			$pdf->Cell(40,6,$key->wanita + $key->pria,1,1);
			$no++;
		}
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(95,15,'',0,1);
		$pdf->SetTitle('Laundry Kiloan');

		$pdf->Output('Laundry Kiloan','I');
	}
}
