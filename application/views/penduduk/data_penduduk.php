<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Penduduk</h3>
		<a href="<?= base_url('penduduk/add_penduduk') ?>" class="btn btn-primary float-right ml-2">Tambah</a>
		<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-import">
			Import 
		</button>
	</div>
	<!-- /.card-header -->
	<div class="card-body table-responsive">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Foto</th>
					<th>NIK</th>
					<th>Nama</th>
					<th>Tempat, Tanggal Lahir</th>
					<th>Jenis Kelamin</th>
					<th>Agama</th>
					<th>Alamat</th>
					<th>Pendidikan</th>
					<th style="width:50px;">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; foreach ($penduduk as $key):?>
				<tr>
					<td><?= $no ?></td>
					<td><?= $key->foto ?></td>
					<td><?= $key->nik ?></td>
					<td><?= $key->nama_lengkap ?></td>
					<td><?= $key->tempat_lahir . ", " . date('d-m-Y', strtotime($key->tanggal_lahir)) ?></td>
					<td><?= $key->jenis_kelamin ?></td>
					<td><?= $key->agama ?></td>
					<td><?= $key->alamat ?></td>
					<td><?= $key->pendidikan_terakhir ?></td>
					<td style="width:105px">
						<a href="<?= base_url('penduduk/edit_penduduk/'.$key->id_penduduk) ?>"
							class="btn btn-warning btn-sm">
							<i class="fa fa-edit"></i>
						</a>
						<button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
							data-target="#modal-delete<?= $key->id_penduduk ?>"><i class="fa fa-trash"></i>
						</button>
					</td>
				</tr>
				<!-- modal delete  -->
				<div class="modal fade" id="modal-delete<?= $key->id_penduduk ?>">
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
								<a href="<?= base_url('penduduk/delete_penduduk/'.$key->id_penduduk) ?>">
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
	<!-- modal import  -->
	<div class="modal fade" id="modal-import">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Import Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php echo form_open_multipart('penduduk/import_penduduk'); ?>
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleInputFile">File Excell</label>
						<input type="file" class="form-control-file" name="file" accept=".xlsx,xls">
					</div>
					<?= form_error('file','<small class="text-danger pl-1">','</small>') ?>
					<p class="text-muted">Unduh Format file <a href="<?= base_url('penduduk/downloadTemplateExcell') ?>">disini</a></p>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					<!-- <a href="<?= base_url('penduduk/import_penduduk/') ?>">
						<div class="btn btn-primary toastrDefaultSuccess">Import</div>
					</a> -->
					<input type="submit" value="Import" class="btn btn-primary toastrDefaultSuccess">
				</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
</div>
<!-- /.card -->
