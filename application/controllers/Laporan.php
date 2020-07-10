<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('pdf');
		$this->load->model('model_laporan');
		$this->load->model('model_notifikasi');
	}
	public function index()
	{
		if ($this->input->post()) {
			$data = $this->model_laporan->get_data_surat();
			$this->laporan_surat($data);
		}
		//load view pake library template
		$data['surat'] = $this->model_laporan->get_master_surat();
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','laporan/data_laporan',$data);
	}
	public function ekspedisi_kearsipan_bpd()
	{
		if ($this->input->post()) {
			$tanggal = $this->get_tanggal();
			$data = $this->model_laporan->get_data_ekspedisi_bpd($tanggal);
			$this->laporan_ekspedisi_bpd($data,$tanggal);
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','laporan/data_laporan_ekspedisi_bpd',$data);
	}
	public function ekspedisi_kearsipan()
	{
		if ($this->input->post()) {
			$tanggal = $this->get_tanggal();
			$data = $this->model_laporan->get_data_ekspedisi($tanggal);
			$this->laporan_ekspedisi_bpd($data,$tanggal);
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','laporan/data_laporan_ekspedisi',$data);
	}
	public function kependudukan()
	{
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('nomor_kk', 'Nomor KK', 'trim|numeric');
		if ($this->form_validation->run() == true) {
			$tanggal = $this->get_tanggal();
			$data = $this->model_laporan->get_data_penduduk($tanggal);
			$this->laporan_penduduk($data,$tanggal);
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','laporan/data_laporan_penduduk',$data);
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
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$data['dusun'] = $this->model_laporan->get_data_dusun();
		$this->template->load('template_admin','laporan/data_laporan_dusun',$data);
	}
	public function keuangan($jenis)
	{
		$this->load->model('model_keuangan');
		// get data export
		if ($this->input->post()) {
			$tanggal = $this->get_tanggal();
			$jenis 	 = $this->input->post('jenis');
			$data = $this->model_laporan->get_data_keuangan($tanggal);
			$this->laporan_keuangan($data,$tanggal,$jenis);
		}
		//get data view keuangan
		if ($jenis == 'pemasukan') {
			$data['keuangan'] = $this->model_keuangan->get_data();
			$data['jenis'] = 'pemasukan';
		} else {
			$data['keuangan'] = $this->model_keuangan->get_data_pengeluaran();
			$data['jenis'] = 'pengeluaran';
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','laporan/data_keuangan',$data);
	}
	public function kelahiran()
	{
		if ($this->input->post()) {
			$tanggal = $this->get_tanggal();
			$data = $this->model_laporan->get_data_kelahiran($tanggal);
			$this->laporan_kelahiran($data,$tanggal);
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','laporan/data_laporan_kelahiran',$data);
	}
	public function pindah_kependudukan()
	{
		if ($this->input->post()) {
			$tanggal = $this->get_tanggal();
			$data = $this->model_laporan->get_data_pindah_kependudukan($tanggal);
			$this->laporan_pindah_kependudukan($data,$tanggal);
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','laporan/data_laporan_pindah_kependudukan',$data);
	}
	public function kematian()
	{
		if ($this->input->post()) {
			$tanggal = $this->get_tanggal();
			$data = $this->model_laporan->get_data_kematian($tanggal);
			$this->laporan_kematian($data,$tanggal);
		}
		$data['notifikasi'] = $this->model_notifikasi->get_data();
		$this->template->load('template_admin','laporan/data_laporan_kematian',$data);
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
		$pdf->Cell(8,6,'No',1,0);
		$pdf->Cell(23,6,'Tanggal',1,0);
		$pdf->Cell(23,6,'Nomor Surat',1,0);
		$pdf->Cell(45,6,'Jenis Surat',1,0);
		$pdf->Cell(90,6,'Nama Pemohon',1,1);
		$no = 1;
		foreach ($data as $key) {
			$pdf->Cell(8,6,$no,1,0,);
			$pdf->Cell(23,6,$key->tanggal_surat,1,0,);
			$pdf->Cell(23,6,$key->no_surat,1,0);
			$pdf->Cell(45,6,$key->nama_surat_dinas,1,0);
			$pdf->Cell(90,6,$key->nama_lengkap,1,1 );
			$no++;
		}
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(95,15,'',0,1);
		$pdf->SetTitle('Laporan surat');

		$pdf->Output('Laporan surat','I');
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
		$pdf->SetTitle('Laporan ekspedisi bpd');

		$pdf->Output('Laporan ekspedisi bpd','I');
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
		$pdf->SetTitle('Laporan penduduk');

		$pdf->Output('Laporan penduduk','I');
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
		$pdf->SetTitle('Laporan dusun');

		$pdf->Output('Laporan dusun','I');
	}
	public function laporan_keuangan($data,$tanggal,$jenis)
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
		$pdf->Cell(10,10,'LAPORAN ' . strtoupper($jenis) . ' KEUANGAN TANGGAL '. $tanggal[0] . ' - ' . $tanggal[1],0,1);
		$pdf->Cell(10,6,'No',1,0);
		$pdf->Cell(100,6,'Keterangan',1,0);
		$pdf->Cell(40,6,'Tanggal',1,0);
		$pdf->Cell(40,6,'Harga',1,1);
		$no = 1;
		$total_harga = 0;
		foreach ($data as $key) {
			$pdf->Cell(10,6,$no,1,0,);
			$pdf->Cell(100,6,$key->keterangan,1,0,);
			$pdf->Cell(40,6,$key->tanggal,1,0,);
			$pdf->Cell(40,6,"Rp." . number_format($key->harga,2,',','.'),1,1);
			$total_harga+=$key->harga;
			$no++;
		}
		
		$pdf->Cell(150,6,'Total',1,0);
		$pdf->Cell(40,6,"Rp." . number_format($total_harga,2,',','.'),1,0);

		$pdf->SetFont('Arial','',7);
		$pdf->Cell(95,15,'',0,1);
		$pdf->SetTitle('Laporan keuangan bpd');

		$pdf->Output('Laporan keuangan bpd','I');
	}
	public function laporan_kelahiran($data,$tanggal)
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
		$pdf->Cell(10,10,'LAPORAN KELAHIRAN TANGGAL '. $tanggal[0] . ' - ' . $tanggal[1],0,1);
		$pdf->Cell(10,6,'No',1,0);
		$pdf->Cell(35,6,'No Akte',1,0);
		$pdf->Cell(35,6,'No KK',1,0);
		$pdf->Cell(58,6,'Nama',1,0);
		$pdf->Cell(55,6,'Tempat, Tanggal Lahir',1,0);
		$pdf->Cell(25,6,'Jenis Kelamin',1,0);
		$pdf->Cell(58,6,'Nama Ibu',1,1);
		$no = 1;
		foreach ($data as $key) {
			$pdf->Cell(10,6,$no,1,0,);
			$pdf->Cell(35,6,$key->no_akte,1,0,);
			$pdf->Cell(35,6,$key->no_kk,1,0,);
			$pdf->Cell(58,6,$key->nama_lengkap,1,0);
			$pdf->Cell(55,6,$key->tempat_lahir . "," .$key->tanggal_lahir ,1,0);
			$pdf->Cell(25,6,$key->jenis_kelamin,1,0);
			$pdf->Cell(58,6,$key->nama_ibu,1,1);
			$no++;
		}
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(95,15,'',0,1);
		$pdf->SetTitle('Laporan kelahiran bpd');

		$pdf->Output('Laporan kelahiran bpd','I');
	}
	public function laporan_pindah_kependudukan($data,$tanggal)
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
		$pdf->Cell(10,10,'LAPORAN PINDAH KEPENDUDUKAN TANGGAL '. $tanggal[0] . ' - ' . $tanggal[1],0,1);
		$pdf->Cell(10,6,'No',1,0);
		$pdf->Cell(58,6,'Nama',1,0);
		$pdf->Cell(80,6,'Alamat Pindahan',1,0);
		$pdf->Cell(45,6,'Tanggal Pindah',1,0);
		$pdf->Cell(83,6,'Keterangan',1,1);
		$no = 1;
		foreach ($data as $key) {
			$pdf->Cell(10,6,$no,1,0,);
			$pdf->Cell(58,6,$key->nama_lengkap,1,0,);
			$pdf->Cell(80,6,$key->alamat_pindahan,1,0,);
			$pdf->Cell(45,6,$key->tanggal_pindah,1,0);
			$pdf->Cell(83,6,$key->keterangan,1,1);
			$no++;
		}
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(95,15,'',0,1);
		$pdf->SetTitle('Laporan pindah kependudukan bpd');

		$pdf->Output('Laporan pindah kependudukan bpd','I');
	}
	public function laporan_kematian($data,$tanggal)
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
		$pdf->Cell(10,10,'LAPORAN KEMATIAN TANGGAL '. $tanggal[0] . ' - ' . $tanggal[1],0,1);
		$pdf->Cell(10,6,'No',1,0);
		$pdf->Cell(58,6,'Nama',1,0);
		$pdf->Cell(55,6,'Tempat, Tanggal Lahir',1,0);
		$pdf->Cell(55,6,'Tempat,Tanggal Meninggal',1,0);
		$pdf->Cell(55,6,'Tempat,Tanggal Pemakaman',1,0);
		$pdf->Cell(13,6,'Umur',1,0);
		$pdf->Cell(30,6,'Sebab',1,1);
		$no = 1;
		foreach ($data as $key) {
			$tanggal_lahir = explode("-",$key->tanggal_lahir);
			$pdf->Cell(10,6,$no,1,0,);
			$pdf->Cell(58,6,$key->nama_lengkap,1,0,);
			$pdf->Cell(55,6,$key->tempat_lahir .",". $key->tanggal_lahir,1,0,);
			$pdf->Cell(55,6,$key->tempat_meninggal .",". $key->tanggal_meninggal,1,0,);
			$pdf->Cell(55,6,$key->tempat_pemakaman .",". $key->tanggal_pemakaman,1,0,);
			$pdf->Cell(13,6,date('Y') - $tanggal_lahir[0],1,0);
			$pdf->Cell(30,6,$key->sebab,1,1);
			$no++;
		}
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(95,15,'',0,1);
		$pdf->SetTitle('Laporan pindah kependudukan bpd');

		$pdf->Output('Laporan pindah kependudukan bpd','I');
	}
}
