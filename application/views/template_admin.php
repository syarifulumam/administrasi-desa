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

	<title>AdminLTE 3 | Starter</title>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?=base_url('assets/adminlte/')?>plugins/fontawesome-free/css/all.min.css">
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
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #1511da !important">
			<!-- Brand Logo -->
			<a href="index3.html" class="brand-link">
				<img src="<?=base_url('assets/adminlte/')?>dist/img/logoprov.png" alt="AdminLTE Logo"
					class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">Administrasi Desa</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
						data-accordion="false">
						<li class="nav-item">
							<a href="<?=base_url('users')?>" class="nav-link">
								<i class="nav-icon fas fa-medkit"></i>
								<p>Data Users</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=base_url('penduduk')?>" class="nav-link">
								<i class="nav-icon fas fa-medkit"></i>
								<p>Data Penduduk</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=base_url('kelahiran')?>" class="nav-link">
								<i class="nav-icon fas fa-medkit"></i>
								<p>Data Kelahiran</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=base_url('pindahan')?>" class="nav-link">
								<i class="nav-icon fas fa-medkit"></i>
								<p>Pindah kependudukan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=base_url('kematian')?>" class="nav-link">
								<i class="nav-icon fas fa-medkit"></i>
								<p>Data Kematian</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=base_url('buat_surat')?>" class="nav-link">
								<i class="nav-icon fas fa-medkit"></i>
								<p>Buat Surat</p>
							</a>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
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
								<i class="nav-icon fas fa-tachometer-alt"></i>
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
								<i class="nav-icon fas fa-tachometer-alt"></i>
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
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Laporan
									<i class="right fas fa-angle-left"></i>
									<span class="badge badge-info right">5</span>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Pembuatan Surat</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Ekspedisi Kearsipan BPD</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Ekspedisi Kearsipan</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Kependudukan</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Perdusun</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
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
								<i class="nav-icon fas fa-tachometer-alt"></i>
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
							<a href="<?=base_url('home/logout')?>" class="nav-link">
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
			<div class="float-right d-none d-sm-inline">
				Anything you want
			</div>
			<!-- Default to the left -->
			<strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
			reserved.
		</footer>
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->

	<!-- jQuery -->
	<script src="<?=base_url('assets/adminlte/')?>plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?=base_url('assets/adminlte/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 |tanggal-->
	<script src="<?= base_url('assets/adminlte/')?>plugins/select2/js/select2.full.min.js"></script>
	<!-- InputMask |tanggal-->
	<script src="<?= base_url('assets/adminlte/')?>plugins/moment/moment.min.js"></script>
	<script src="<?= base_url('assets/adminlte/')?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
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
			$('#datemask').inputmask('yyyy/mm/dd', {
				'placeholder': 'yyyy/mm/dd'
			})
			//Money Euro
			$('[data-mask]').inputmask()

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

</body>

</html>
