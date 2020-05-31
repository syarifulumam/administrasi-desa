<div class="row">
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box">
			<span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Penduduk</span>
				<span class="info-box-number"><?= $penduduk ?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-baby-carriage"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Kelahiran</span>
				<span class="info-box-number"><?= $kelahiran ?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->

	<!-- fix for small devices only -->
	<div class="clearfix hidden-md-up"></div>

	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-success elevation-1"><i class="fas fa-ambulance"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Kematian</span>
				<span class="info-box-number"><?= $kematian ?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-suitcase-rolling"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Pindah Pendudukan</span>
				<span class="info-box-number"><?= $pidah_kependudukan ?></span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->
<!-- BAR CHART -->
<div class="row">
	<!-- /.col (LEFT) -->
	<div class="col-md-12">
		<!-- BAR CHART -->
		<div class="card card-success">
			<div class="card-header">
				<h3 class="card-title">Grafik</h3>
				<div class="card-tools">
					<?= form_open('') ?>
					<input type="text" name="tahun" class="w-75">
					<button type="submit" class="btn btn-info btn-sm mb-2"><i class="fa fa-search"></i></button>
					</form>
				</div>
			</div>
			<div class="card-body">
				<div class="chart">
					<canvas id="barChart"
						style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
				</div>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.col (RIGHT) -->
</div>
<div class="row">
	<!-- /.col (LEFT) -->
	<div class="col-md-12">
		<!-- BAR CHART -->
		<div class="card card-success">
			<div class="card-header">
				<h3 class="card-title">Grafik Gender</h3>

				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
					</button>
					<button type="button" class="btn btn-tool" data-card-widget="remove"><i
							class="fas fa-times"></i></button>
				</div>
			</div>
			<div class="card-body">
				<div class="chart">
					<canvas id="gender"
						style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
				</div>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.col (RIGHT) -->
</div>
<!-- /.row -->
<div class="row">
<div class="col-12">
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Penduduk</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Keterangan</th>
					<th>Jumlah</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Surat</td>
					<td><?= $surat ?></td>
				</tr>
				<tr>
					<td>Ekspedisi BPD</td>
					<td><?= $ekspedisi_bpd ?></td>
				</tr>
				<tr>
					<td>Ekspedisi</td>
					<td><?= $ekspedisi_kearsipan ?></td>
				</tr>
				<tr>
					<td>Dusun</td>
					<td><?= $dusun ?></td>
				</tr>
				<tr>
					<td>Provinsi</td>
					<td><?= $provinsi ?></td>
				</tr>
				<tr>
					<td>Kota /  Kabupaten</td>
					<td><?= $kota ?></td>
				</tr>
				<tr>
					<td>Kecamatan</td>
					<td><?= $kecamatan ?></td>
				</tr>
				<tr>
					<td>Kelurahan</td>
					<td><?= $kelurahan ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>
