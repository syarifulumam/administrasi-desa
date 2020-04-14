<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Master Surat</h3>
		<a href="<?= base_url('master_surat/add_master_surat') ?>" class="btn btn-primary float-right">Tambah</a>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Surat</th>
					<th>Nama Surat</th>
					<th style="width:50px;">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($master_surat as $key):?>
				<tr>
					<td>1</td>
					<td><?= $key->kode_surat ?></td>
					<td><?= $key->nama_surat_dinas ?></td>
					<td style="width:105px">
						<a href="<?= base_url('master_surat/edit_master_surat/'.$key->id_master_surat) ?>"
							class="btn btn-warning btn-sm">
							<i class="fa fa-edit"></i>
						</a>
						<button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
							data-target="#modal-delete<?= $key->id_master_surat ?>"><i class="fa fa-trash"></i>
						</button>
					</td>
				</tr>
				<!-- modal delete  -->
				<div class="modal fade" id="modal-delete<?= $key->id_master_surat ?>">
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
								<a href="<?= base_url('master_surat/delete_master_surat/'.$key->id_master_surat) ?>">
									<div class="btn btn-outline-light toastrDefaultSuccess">Hapus</div>
								</a>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<!-- /.card-body -->
</div>
<!-- /.card -->
