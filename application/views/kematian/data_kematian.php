<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Kematian</h3>
		<a href="<?= base_url('kematian/add_kematian') ?>" class="btn btn-primary float-right">Tambah</a>
	</div>
	<!-- /.card-header -->
	<div class="card-body table-responsive">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Foto</th>
					<th>Nama</th>
					<th>Tempat, Tanggal Lahir</th>
					<th>Tanggal Meninggal</th>
					<th>Umur</th>
					<th>Tempat Meninggal</th>
					<th>Sebab</th>
					<th style="width:50px;">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($kematian as $key):?>
				<tr>
					<td>1</td>
					<td><?= $key->foto ?></td>
					<td><?= $key->nama_lengkap ?></td>
					<td><?= $key->tempat_lahir . ", " . date('d-m-Y', strtotime($key->tanggal_lahir)) ?></td>
					<td><?= date('d-m-Y', strtotime($key->tanggal_meninggal)) ?></td>
					<td>
						<?php
						$tanggal_lahir = explode("-",$key->tanggal_lahir);
						echo date('Y') - $tanggal_lahir[0];
					    ?>
					</td>
					<td><?= $key->tempat_meninggal ?></td>
					<td><?= $key->sebab ?></td>
					<td style="width:105px">
						<a href="<?= base_url('kematian/edit_kematian/'.$key->id_kematian) ?>"
							class="btn btn-warning btn-sm">
							<i class="fa fa-edit"></i>
						</a>
						<button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
							data-target="#modal-delete<?= $key->id_kematian ?>"><i class="fa fa-trash"></i>
						</button>
					</td>
				</tr>
				<!-- modal delete  -->
				<div class="modal fade" id="modal-delete<?= $key->id_kematian ?>">
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
								<a href="<?= base_url('kematian/delete_kematian/'.$key->id_kematian) ?>">
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
