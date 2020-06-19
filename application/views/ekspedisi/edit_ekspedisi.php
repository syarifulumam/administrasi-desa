<div class="card">
	<div class="card-header">
		Edit Ekspedisi
	</div>
	<div class="card-body">
		<?= form_open_multipart('','',array('id'=>$ekspedisi->id_ekspedisi,'file'=>$ekspedisi->file_dokumen));?>
		<div class="form-group">
			<label>Tanggal Pengiriman</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_pengiriman" value="<?= date('d-m-Y', strtotime($ekspedisi->tanggal_pengiriman)) ?>"
					class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
					data-mask>
			</div>
			<?= form_error('tanggal_pengiriman','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Surat</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_surat" value="<?= date('d-m-Y', strtotime($ekspedisi->tanggal_surat)) ?>" class="form-control"
					data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
			</div>
			<?= form_error('tanggal_surat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nomor Surat</label>
			<input type="number" min="0" class="form-control " name="nomor_surat" value="<?= $ekspedisi->nomor_surat ?>" autocomplete="off">
			<?= form_error('nomor_surat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Isi Singkat</label>
			<input type="text" class="form-control " name="isi_singkat" value="<?= $ekspedisi->isi_singkat ?>"
				autocomplete="off">
			<?= form_error('isi_singkat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Tujuan</label>
			<textarea class="form-control" rows="3" name="tujuan"><?= $ekspedisi->tujuan ?></textarea>
			<?= form_error('tujuan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"><?= $ekspedisi->keterangan ?></textarea>
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Upload Document</label>
			<input type="file" class="form-control-file" name="dokumen">
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('ekspedisi')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
