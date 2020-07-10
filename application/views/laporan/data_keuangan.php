<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Laporan Keuangan</h3>
		</div>
		<?=form_open('','',array('jenis'=>$jenis));?>
		<div class="card-body">
			<!-- Date range -->
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="far fa-calendar-alt"></i>
						</span>
					</div>
					<input type="text" class="form-control float-right" name="tanggal" id="reservation">
				</div>
				<!-- /.input group -->
			</div>
			<!-- /.form group -->
		</div>
		<!-- /.card-body -->
		<div class="card-footer">
			<button type="submit" class="btn btn-primary"><i class="far fa fa-print"></i> Cetak</button>
			</form>
		</div>
	</div>
	<!-- /.card -->
</div>

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Keuangan Pemasukan</h3>
		<a href="<?= base_url('keuangan/add_keuangan_pemasukan') ?>" class="btn btn-primary float-right">Tambah</a>
	</div>
	<!-- /.card-header -->
	<div class="card-body table-responsive">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Keterangan</th>
					<th>Tanggal</th>
					<th>Harga</th>
				</tr>
			</thead>
			<tbody>
				<?php $total_harga = 0; ?>
				<?php $no = 1; foreach ($keuangan as $key):?>
				<tr>
					<td><?= $no ?></td>
					<td><?= $key->keterangan ?></td>
					<td><?= date('d-m-Y', strtotime($key->tanggal)) ?></td>
					<td>Rp.<?= number_format($key->harga,2,',','.'); ?></td>
				</tr>
				<?php
					$total_harga+=$key->harga;
					$no++;
					endforeach; 
				?>
			</tbody>
			<tr>
				<td colspan='3' class="text-center">Total</td>
				<td>Rp.<?= number_format($total_harga,2,',','.'); ?></td>
			</tr>
		</table>
	</div>
	<!-- /.card-body -->
</div>
<!-- /.card -->
