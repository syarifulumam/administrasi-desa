<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistem Informasi Management Desa</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url('assets/adminlte/')?>plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?=base_url('assets/adminlte/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url('assets/adminlte/')?>dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="<?=base_url('assets/adminlte/')?>index2.html"><b>Sistem Informasi Desa</b></a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Masuk untuk memulai sesi Anda</p>
				<?php if(!empty($this->session->flashdata('pesan'))): ?>
				<div class="alert alert-danger" role="alert">
					<?= $this->session->flashdata('pesan') ?>
				</div>
				<?php endif;?>
				<form action="<?= base_url() ?>" method="post">
					<div class="form-group">
						<select name="provinsi" id="provinsi" class="form-control">
							<option value="">-- Pilih Provinsi --</option>
							<?php foreach ($provinsi as $key):?>
							<option value="<?= $key->id_provinsi ?>"><?= $key->nama_provinsi ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('password','<small class="text-danger pl-1">','</small>') ?>
					</div>
					<div class="form-group">
						<select name="kota" id="kota" class="form-control">
							<option value="">-- Pilih Kota --</option>
						</select>
						<?= form_error('password','<small class="text-danger pl-1">','</small>') ?>
					</div>
					<div class="form-group">
						<select name="kecamatan" id="kecamatan" class="form-control">
							<option value="">-- Pilih Kecamatan --</option>
						</select>
						<?= form_error('password','<small class="text-danger pl-1">','</small>') ?>
					</div>
					<div class="form-group">
						<select name="kelurahan" id="kelurahan" class="form-control">
							<option value="">-- Pilih Kelurahan --</option>
						</select>
						<?= form_error('password','<small class="text-danger pl-1">','</small>') ?>
					</div>
					<div class="form-group">
						<select name="dusun" id="dusun" class="form-control">
							<option value="">-- Pilih Dusun --</option>
						</select>
						<?= form_error('password','<small class="text-danger pl-1">','</small>') ?>
					</div>
					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<input type="checkbox" id="remember">
								<label for="remember">
									Ingat saya
								</label>
							</div>
						</div>
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?=base_url('assets/adminlte/')?>plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?=base_url('assets/adminlte/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?=base_url('assets/adminlte/')?>dist/js/adminlte.min.js"></script>
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
