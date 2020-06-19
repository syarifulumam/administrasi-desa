<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
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
					<th style="width:50px;">Action</th>
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
					<td style="width:105px">
						<a href="<?= base_url('keuangan/edit_keuangan_pemasukan/'.$key->id_keuangan) ?>"
							class="btn btn-warning btn-sm">
							<i class="fa fa-edit"></i>
						</a -->
						<button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
							data-target="#modal-delete<?= $key->id_keuangan ?>"><i class="fa fa-trash"></i>
						</button>
					</td>
				</tr>
				<!-- modal delete  -->
				<div class="modal fade" id="modal-delete<?= $key->id_keuangan ?>">
					<div class="modal-dialog">
						<div class="modal-content bg-danger">
							<div class="modal-header">
								<h4 class="modal-title">Hapus Data</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p>Apa anda yakin ingin menghapus data ini?</p>
							</div>
							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-outline-light" data-dismiss="modal">Tutup</button>
								<a href="<?= base_url('keuangan/delete_keuangan/'.$key->id_keuangan) ?>">
									<div class="btn btn-outline-light toastrDefaultSuccess">Hapus</div>
								</a>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
				<?php
					$total_harga+=$key->harga;
					$no++;
					endforeach; 
				?>
			</tbody>
			<tr>
				<td colspan='3' class="text-center">Total</td>
				<td colspan='2'>Rp.<?= number_format($total_harga,2,',','.'); ?></td>
			</tr>
		</table>
	</div>
	<!-- /.card-body -->
</div>
<!-- /.card -->
