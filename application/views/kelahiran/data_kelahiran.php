<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Kelahiran</h3>
		<a href="<?= base_url('kelahiran/add_kelahiran') ?>" class="btn btn-primary float-right">Tambah</a>
	</div>
	<!-- /.card-header -->
	<div class="card-body table-responsive">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nomor Akte</th>
					<th>Nomor KK</th>
					<th>Nama</th>
					<th>Tempat, Tanggal Lahir</th>
					<th>Anak Ke</th>
					<th>Nama Ibu</th>
					<th>Jenis Kelamin</th>
					<th style="width:50px;">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($kelahiran as $key):?>
				<tr>
					<td>1</td>
					<td><?= $key->no_akte ?></td>
					<td><?= $key->no_kk ?></td>
					<td><?= $key->nama_lengkap ?></td>
					<td><?= $key->tempat_lahir . "," . $key->tanggal_lahir ?></td>
					<td><?= $key->anak_ke_berapa ?></td>
					<td><?= $key->nama_ibu ?></td>
					<td><?= $key->jenis_kelamin ?></td>
					<td style="width:105px">
						<a href="<?= base_url('kelahiran/edit_kelahiran/'.$key->id_kelahiran) ?>"
							class="btn btn-warning btn-sm">
							<i class="fa fa-edit"></i>
						</a>
						<button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
							data-target="#modal-delete<?= $key->id_kelahiran ?>"><i class="fa fa-trash"></i>
						</button>
					</td>
				</tr>
				<!-- modal delete  -->
				<div class="modal fade" id="modal-delete<?= $key->id_kelahiran ?>">
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
								<a href="<?= base_url('kelahiran/delete_kelahiran/'.$key->id_kelahiran) ?>">
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
