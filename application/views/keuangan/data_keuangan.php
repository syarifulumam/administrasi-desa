<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Keuangan</h3>
		<a href="<?= base_url('keuangan/add_keuangan') ?>" class="btn btn-primary float-right">Tambah</a>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Keterangan</th>
					<th>Harga</th>
					<th style="width:50px;">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $total_harga = 0; ?>
				<?php foreach ($keuangan as $key):?>
				<tr>
					<td>1</td>
					<td>Rp.<?= $key->keterangan ?></td>
					<td>Rp.<?= $key->harga ?></td>
					<td style="width:105px">
						<a href="<?= base_url('keuangan/edit_keuangan/'.$key->id_keuangan) ?>"
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
					endforeach; 
				?>
			</tbody>
			<tr>
				<td colspan='2' class="text-center">Total</td>
				<td colspan='2'>Rp.<?= $total_harga ?></td>
			</tr>
		</table>
	</div>
	<!-- /.card-body -->
</div>
<!-- /.card -->
