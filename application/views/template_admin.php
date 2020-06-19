<?php
	if (empty($this->session->id)) {
		redirect('login');
	}
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>SIDISA</title>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?=base_url('assets/adminlte/')?>plugins/fontawesome-free/css/all.min.css">
	<!-- daterange picker -->
	<link rel="stylesheet" href="<?=base_url('assets/adminlte/')?>plugins/daterangepicker/daterangepicker.css">
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="<?=base_url('assets/adminlte/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Select2 |tanggal-->
	<link rel="stylesheet" href="<?= base_url('assets/adminlte/')?>plugins/select2/css/select2.min.css">
	<link rel="stylesheet"
		href="<?= base_url('assets/adminlte/')?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?=base_url('assets/adminlte/')?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- SweetAlert2 -->
	<link rel="stylesheet"
		href="<?=base_url('assets/adminlte/')?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<!-- Toastr -->
	<link rel="stylesheet" href="<?=base_url('assets/adminlte/')?>plugins/toastr/toastr.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url('assets/adminlte/')?>dist/css/adminlte.min.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?=base_url('assets/adminlte/')?>plugins/summernote/summernote-bs4.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-green navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
			<!-- Notifications Dropdown Menu -->
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
					<i class="fas fa-bell" style="color:white"></i>
					<span class="badge badge-warning navbar-badge"><?= $notifikasi->num_rows() ?></span>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<span class="dropdown-header"><?= $notifikasi->num_rows() ?> Notifications</span>
				<?php foreach ($notifikasi->result() as $key):?>
				<div class="dropdown-divider"></div>
				<a href="<?= base_url('notifikasi/nonaktif/'.$key->url.'/'.$key->id_nontifikasi) ?>" class="dropdown-item">
					<?= $key->keterangan ?>
					<span class="float-right text-muted text-sm">
						<?php 					
  							date_default_timezone_set("Asia/Jakarta");
							$start = new DateTime($key->waktu); 
							$end = new DateTime(date("Y-m-d H:i:s"));
							$interval = $start->diff($end);
							if ($interval->format('%d') != 0) {
								echo $interval->format('%d hari %h jam'); 
							}elseif($interval->format('%h') != 0){
								echo $interval->format('%h jam %i menit');
							}elseif($interval->format('%i') == 0){
								echo 'baru';
							}else{
								echo $interval->format('%i menit');
							}
						?>
					</span>
				</a>
				<?php endforeach; ?>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
				</div>
			</li>
			</ul>
		</nav>
		<!-- /.navbar -->
		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #1511da !important">
			<!-- Brand Logo -->
			<a href="<?=base_url('dashboard')?>" class="brand-link">
				<img src="<?=base_url('assets/adminlte/')?>dist/img/logoprov.png" alt="AdminLTE Logo"
					class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">SIDISA</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
						data-accordion="false">
						<li class="nav-item">
							<a href="<?=base_url('dashboard')?>" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=base_url('users')?>" class="nav-link">
								<i class="nav-icon fas fa-user"></i>
								<p>Data Users</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=base_url('penduduk')?>" class="nav-link">
								<i class="nav-icon fas fa-database"></i>
								<p>Data Penduduk</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=base_url('kelahiran')?>" class="nav-link">
								<i class="nav-icon fas fa-address-book"></i>
								<p>Data Kelahiran</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=base_url('pindahan')?>" class="nav-link">
								<i class="nav-icon fas fa-suitcase-rolling"></i>
								<p>Pindah kependudukan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=base_url('kematian')?>" class="nav-link">
								<i class="nav-icon fas fa-ambulance"></i>
								<p>Data Kematian</p>
							</a>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-money-check-alt"></i>
								<p>
									Keuangan
									<i class="right fas fa-angle-left"></i>
									<span class="badge badge-info right">2</span>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?=base_url('keuangan/pengeluaran')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Pengeluaran</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('keuangan')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Pemasukan</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="<?=base_url('buat_surat')?>" class="nav-link">
								<i class="nav-icon fas fa-file"></i>
								<p>Cetak Surat</p>
							</a>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-folder-open"></i>
								<p>
									Buat Surat
									<i class="right fas fa-angle-left"></i>
									<span class="badge badge-info right">7</span>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?=base_url('buat_surat/add_buat_surat_domisili')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Domisili</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('buat_surat/add_buat_surat_ktp')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Keterangan Proses KTP</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('buat_surat/add_buat_surat_kematian')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Keterangan Kematian</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('buat_surat/add_buat_surat_tidak_mampu')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Keterangan Tidak Mampu</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('buat_surat/add_buat_surat_baik')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Keterangan Berkelakuan Baik</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-folder-open"></i>
								<p>
									Kearsipan
									<i class="right fas fa-angle-left"></i>
									<span class="badge badge-info right">7</span>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?=base_url('perdes')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>PERDES / PERKAM</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('kepdes')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>KEPDES / KEPKAM</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('aparat')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Aparat</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('ekspedisi')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Ekspedisi</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('inventaris')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Inventaris</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('tanah_desa')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Tanah Desa</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('tkd')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>TKD</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-folder-open"></i>
								<p>
									Pembangunan
									<i class="right fas fa-angle-left"></i>
									<span class="badge badge-info right">4</span>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?=base_url('rencana_pembangunan')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Rencana Pembangunan</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('kegiatan_pembangunan')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Kegiatan Pembangunan</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('kader_pembangunan')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Kader Pembangunan</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('inventaris_proyek')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Inventaris Proyek</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-folder-open"></i>
								<p>
									BPD/BPKamp
									<i class="right fas fa-angle-left"></i>
									<span class="badge badge-info right">4</span>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?=base_url('keputusan_bpd')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Keputusan BPD/BPKamp</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('kegiatan_bpd')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Kegiatan BPD/BPKamp</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('ekspedisi_bpd')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Ekspedisi BPD/BPKamp</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('anggota_bpd')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Anggota BPD/BPKamp</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-print"></i>
								<p>
									Laporan
									<i class="right fas fa-angle-left"></i>
									<span class="badge badge-info right">7</span>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?=base_url('laporan')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Pembuatan Surat</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('laporan/ekspedisi_kearsipan_bpd')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Ekspedisi Kearsipan BPD</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('laporan/ekspedisi_kearsipan')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Ekspedisi Kearsipan</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('laporan/kependudukan')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Kependudukan</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('laporan/perdusun')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Perdusun</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('laporan/keuangan/pengeluaran')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Keuangan Pengeluaran</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('laporan/keuangan/pemasukan')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Keuangan Pemasukan</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-cubes"></i>
								<p>
									Master Data
									<i class="right fas fa-angle-left"></i>
									<span class="badge badge-info right">7</span>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?=base_url('provinsi')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Provinsi</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('kota')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Kabupaten / Kota</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('kecamatan')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Kecamatan</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('kelurahan')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Kelurahan</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('dusun')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Dusun</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('master_surat')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Master Surat</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?=base_url('struktur_organisasi')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Struktur Organisasi</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-cogs"></i>
								<p>
									Setting
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?=base_url('identitas')?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Identitas</p>
									</a>
								</li>
								<!-- <li class="nav-item">
									<a href="#" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Profile</p>
									</a>
								</li> -->
							</ul>
						</li>
						<li class="nav-item">
							<a href="<?=base_url('login/logout')?>" class="nav-link">
								<i class="nav-icon fas fa-sign-out-alt"></i>
								<p>Logout</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<div class="content-header">
				<div class="container-fluid">
					<?= $contents ?>
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Main Footer -->
		<footer class="main-footer">
			<!-- To the right -->
			<!-- Default to the left -->
			<strong>Copyright &copy; 2020 <a href="<?= base_url() ?>">Sidisa</a>.</strong> 
		</footer>
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->

	<!-- jQuery -->
	<script src="<?=base_url('assets/adminlte/')?>plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?=base_url('assets/adminlte/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- ChartJS -->
	<script src="<?=base_url('assets/adminlte/')?>plugins/chart.js/Chart.min.js"></script>
	<!-- Select2 |tanggal-->
	<script src="<?= base_url('assets/adminlte/')?>plugins/select2/js/select2.full.min.js"></script>
	<!-- InputMask |tanggal-->
	<script src="<?= base_url('assets/adminlte/')?>plugins/moment/moment.min.js"></script>
	<script src="<?= base_url('assets/adminlte/')?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
	<!-- date-range-picker -->
	<script src="<?= base_url('assets/adminlte/')?>plugins/daterangepicker/daterangepicker.js"></script>
	<!-- DataTables -->
	<script src="<?=base_url('assets/adminlte/')?>plugins/datatables/jquery.dataTables.js"></script>
	<script src="<?=base_url('assets/adminlte/')?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- SweetAlert2 -->
	<script src="<?=base_url('assets/adminlte/')?>plugins/sweetalert2/sweetalert2.min.js"></script>
	<!-- Toastr -->
	<script src="<?=base_url('assets/adminlte/')?>plugins/toastr/toastr.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?=base_url('assets/adminlte/')?>dist/js/adminlte.min.js"></script>
	<!-- Summernote -->
	<script src="<?=base_url('assets/adminlte/')?>plugins/summernote/summernote-bs4.min.js"></script>
	<!-- Tanggal script -->
	<script>
		$(function () {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Datemask yyyy/mm/dd
			$('#datemask').inputmask('dd/mm/yyyy', {
				'placeholder': 'dd/mm/yyyy'
			})
			//Money Euro
			$('[data-mask]').inputmask()

			//Date range picker
			$('#reservation').daterangepicker({
				locale: {
					format: 'DD/MM/YYYY'
				}
			})
			//Date range picker with time picker
			$('#reservationtime').daterangepicker({
				timePicker: true,
				timePickerIncrement: 30,
				locale: {
					format: 'MM/DD/YYYY hh:mm A'
				}
			})
			//Date range as a button
			$('#daterange-btn').daterangepicker({
					ranges: {
						'Today': [moment(), moment()],
						'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
						'Last 7 Days': [moment().subtract(6, 'days'), moment()],
						'Last 30 Days': [moment().subtract(29, 'days'), moment()],
						'This Month': [moment().startOf('month'), moment().endOf('month')],
						'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
							'month').endOf(
							'month')]
					},
					startDate: moment().subtract(29, 'days'),
					endDate: moment()
				},
				function (start, end) {
					$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
				}
			)

			//Timepicker
			$('#timepicker').datetimepicker({
				format: 'LT'
			})

		})

	</script>
	<!-- page script -->
	<script>
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});

	</script>
	<!-- Toastr -->
	<script type="text/javascript">
		$(function () {
			const flashdata = $('.flash-data').data('flashdata');
			if (flashdata) {
				toastr.success(flashdata)
			}
		});

	</script>
	<!-- Summernote -->
	<script type="text/javascript">
		$(document).ready(function () {
			$('#summernote').summernote({
				height: "300px",
				callbacks: {
					onImageUpload: function (image) {
						uploadImage(image[0]);
					},
					onMediaDelete: function (target) {
						deleteImage(target[0].src);
					}
				}
			});

			function uploadImage(image) {
				var data = new FormData();
				data.append("image", image);
				$.ajax({
					url: "<?php echo site_url('artikel/upload_image')?>",
					cache: false,
					contentType: false,
					processData: false,
					data: data,
					type: "POST",
					success: function (url) {
						$('#summernote').summernote("insertImage", url);
					},
					error: function (data) {
						console.log(data);
					}
				});
			}

			function deleteImage(src) {
				$.ajax({
					data: {
						src: src
					},
					type: "POST",
					url: "<?php echo site_url('artikel/delete_image')?>",
					cache: false,
					success: function (response) {
						console.log(response);
					}
				});
			}

		});

	</script>
	<!-- combo box dinamis provinsi,kota,kecamatan,kelurahan,dusun -->
	<script>
		$(function () {
			$.ajaxSetup({
				type: 'POST',
				url: "<?php echo base_url('penduduk/get_data_daerah') ?>",
				cache: false
			});

			$("#provinsi").change(function () {
				var value = $(this).val();
				if (value > 0) {
					$.ajax({
						data: {
							modul: 'kota',
							id: value
						},
						success: function (respon) {
							$("#kota").html(respon);
						}
					});
				}
			});
			$("#kota").change(function () {
				var value = $(this).val();
				if (value > 0) {
					$.ajax({
						data: {
							modul: 'kecamatan',
							id: value
						},
						success: function (respon) {
							$("#kecamatan").html(respon);
						}
					});
				}
			});
			$("#kecamatan").change(function () {
				var value = $(this).val();
				if (value > 0) {
					$.ajax({
						data: {
							modul: 'kelurahan',
							id: value
						},
						success: function (respon) {
							$("#kelurahan").html(respon);
						}
					});
				}
			});
			$("#kelurahan").change(function () {
				var value = $(this).val();
				if (value > 0) {
					$.ajax({
						data: {
							modul: 'dusun',
							id: value
						},
						success: function (respon) {
							$("#dusun").html(respon);
						}
					});
				}
			});

		});

	</script>
	<!-- Chart js -->
	<script>
		$(function () {
			/* ChartJS
			 * -------
			 * Here we will create a few charts using ChartJS
			 */

			//--------------
			//- AREA CHART -
			//--------------
			// Get context with jQuery - using jQuery's .get() method.
			var areaChartData = {
				labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agust', 'Sep', 'Okt', 'Nov', 'Des'],
				datasets: [
					{
						label: 'Penduduk',
						backgroundColor: 'rgba(60,141,188,0.9)',
						// backgroundColor: [
						// 				'rgba(255, 99, 132, 0.2)',
						// 				'rgba(54, 162, 235, 0.2)',
						// 				'rgba(255, 206, 86, 0.2)',
						// 				'rgba(75, 192, 192, 0.2)',
						// 				],
						borderColor: 'rgba(60,141,188,0.8)',
						pointRadius: false,
						pointColor: '#3b8bba',
						pointStrokeColor: 'rgba(60,141,188,1)',
						pointHighlightFill: '#fff',
						pointHighlightStroke: 'rgba(60,141,188,1)',
						data: [<?php foreach ($penduduk_perbulan as $key) echo $key. ","; ?>]
					},
					{
						label: 'Kelahiran',
						backgroundColor: 'rgba(210, 214, 222, 1)',
						borderColor: 'rgba(210, 214, 222, 1)',
						pointRadius: false,
						pointColor: 'rgba(210, 214, 222, 1)',
						pointStrokeColor: '#c1c7d1',
						pointHighlightFill: '#fff',
						pointHighlightStroke: 'rgba(220,220,220,1)',
						data: [<?php foreach ($kelahiran_perbulan as $key) echo $key. ","; ?>]
					},
					{
						label: 'Kematian',
						backgroundColor: 'RGBA(255,150,80,1)',
						borderColor: 'RGBA(255,150,80,1)',
						pointRadius: false,
						pointColor: 'RGBA(255,150,80,1)',
						pointStrokeColor: '#c1c7d1',
						pointHighlightFill: '#fff',
						pointHighlightStroke: 'rgba(220,220,220,1)',
						data: [<?php foreach ($kematian_perbulan as $key) echo $key. ","; ?>]
					},
					{
						label: 'Pindah Kependudukan',
						backgroundColor: 'RGBA(127,198,80,1)',
						borderColor: 'RGBA(127,198,80,1)',
						pointRadius: false,
						pointColor: 'RGBA(127,198,80,1)',
						pointStrokeColor: '#c1c7d1',
						pointHighlightFill: '#fff',
						pointHighlightStroke: 'rgba(220,220,220,1)',
						data: [<?php foreach ($pindah_perbulan as $key) echo $key. ","; ?>]
					},
				]
			}

			//-------------
			//- BAR CHART -
			//-------------
			var barChartCanvas = $('#barChart').get(0).getContext('2d')
			var barChartData = jQuery.extend(true, {}, areaChartData)
			var temp0 = areaChartData.datasets[0]
			var temp1 = areaChartData.datasets[1]
			barChartData.datasets[0] = temp0
			barChartData.datasets[1] = temp1

			var barChartOptions = {
				responsive: true,
				maintainAspectRatio: false,
				datasetFill: false,
					
			}

			var barChart = new Chart(barChartCanvas, {
				type: 'bar',
				data: barChartData,
				options: barChartOptions
			})

			//gender chart
			var areaChartData2 = {
				labels: ['Penduduk', 'Kelahiran', 'Kematian', 'Pindah Kependudukan'],
				datasets: [
					{
						label: 'Pria',
						backgroundColor: 'RGBA(86,91,182,1)',
						borderColor: 'RGBA(86,91,182,1)',
						pointRadius: false,
						pointColor: '#3b8bba',
						pointStrokeColor: 'RGBA(86,91,182,1)',
						pointHighlightFill: '#fff',
						pointHighlightStroke: 'RGBA(86,91,182,1)',
						data: [<?= $gender_penduduk[0].','.$gender_kelahiran[0].','.$gender_kematian[0].','.$gender_pindah_kependudukan[0] ?>]
					},
					{
						label: 'Wanita',
						backgroundColor: 'RGBA(255,54,88,1)',
						borderColor: 'RGBA(255,54,88,1)',
						pointRadius: false,
						pointColor: '#3b8bba',
						pointStrokeColor: 'RGBA(255,54,88,1)',
						pointHighlightFill: '#fff',
						pointHighlightStroke: 'RGBA(255,54,88,1)',
						data: [<?= $gender_penduduk[1].','.$gender_kelahiran[1].','.$gender_kematian[1].','.$gender_pindah_kependudukan[1] ?>]
					},
				]
			}

			
			var barChartCanvas2 = $('#gender').get(0).getContext('2d')
			var barChartData2 = jQuery.extend(true, {}, areaChartData2)
			var temp2 = areaChartData2.datasets[0]
			var temp3 = areaChartData2.datasets[1]
			barChartData2.datasets[0] = temp2
			barChartData2.datasets[1] = temp3

			var barChartOptions2 = {
				responsive: true,
				maintainAspectRatio: false,
				datasetFill: false,
					
			}
			var barChart2 = new Chart(barChartCanvas2, {
				type: 'bar',
				data: barChartData2,
				options: barChartOptions2
			})

		})

	</script>

</body>

</html>
