<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data kegiatan Pembangunan</h3>
		<a href="<?= base_url('kegiatan_pembangunan/add_kegiatan_pembangunan') ?>"
			class="btn btn-primary float-right">Tambah</a>
	</div>
	<!-- /.card-header -->
	<div class="card-body table-responsive">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Proyek</th>
					<th>Lokasi</th>
					<th>Pelaksana</th>
					<th>Sifat Proyek</th>
					<th>Waktu Pelaksanaan</th>
					<th style="width:50px;">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; foreach ($kegiatan_pembangunan as $key):?>
				<tr>
					<td><?= $no ?></td>
					<td><?= $key->nama_proyek ?></td>
					<td><?= $key->lokasi ?></td>
					<td><?= $key->pelaksana ?></td>
					<td><?= $key->sifat_proyek ?></td>
					<td><?= $key->waktu_pelaksanaan ?></td>
					<td style="width:105px">
						<a href="<?= base_url('kegiatan_pembangunan/edit_kegiatan_pembangunan/'.$key->id_kegiatan_pembangunan) ?>"
							class="btn btn-warning btn-sm">
							<i class="fa fa-edit"></i>
						</a>
						<button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
							data-target="#modal-delete<?= $key->id_kegiatan_pembangunan ?>"><i class="fa fa-trash"></i>
						</button>
					</td>
				</tr>
				<!-- modal delete  -->
				<div class="modal fade" id="modal-delete<?= $key->id_kegiatan_pembangunan ?>">
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
								<a
									href="<?= base_url('kegiatan_pembangunan/delete_kegiatan_pembangunan/'.$key->id_kegiatan_pembangunan) ?>">
									<div class="btn btn-outline-light toastrDefaultSuccess">Hapus</div>
								</a>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
				<?php $no++; endforeach; ?>
			</tbody>
		</table>
	</div>
	<!-- /.card-body -->
</div>
<!-- /.card -->
