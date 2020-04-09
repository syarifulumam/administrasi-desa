<div class="card">
	<div class="card-header">
		Edit Perdes
	</div>
	<div class="card-body">
		<?= form_open_multipart('','',array('file'=>$perdes->file_dokumen,'id'=>$perdes->id_peraturan_desa));?>
		<div class="form-group">
			<label>Nomor Perdes</label>
			<input type="text" class="form-control " name="nomor_perdes" value="<?= $perdes->nomor_peraturan_desa ?>"
				autocomplete="off">
			<?= form_error('nomor_perdes','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Perdes</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_perdes" value="<?= $perdes->tanggal_peraturan_desa ?>"
					class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd"
					data-mask>
			</div>
			<?= form_error('tanggal_perdes','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tentang</label>
			<input type="text" class="form-control " name="tentang" value="<?= $perdes->tentang ?>" autocomplete="off">
			<?= form_error('tentang','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Uraian Singkat</label>
			<input type="text" class="form-control " name="uraian" value="<?= $perdes->uraian_singkat ?>"
				autocomplete="off">
			<?= form_error('uraian','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nomor Persetujuan BPD</label>
			<input type="text" class="form-control " value="<?= $perdes->nomor_persetujuan_BPD ?>"
				name="nomor_persetujuan_bpd" value="<?= set_value('nomor_persetujuan_bpd') ?>" autocomplete="off">
			<?= form_error('nomor_persetujuan_bpd','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Persetujuan BPD</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_persetujuan_bpd" value="<?= $perdes->tanggal_persetujuan_BPD ?>"
					class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd"
					data-mask>
			</div>
			<?= form_error('tanggal_persetujuan_bpd','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nomor Dilaporkan</label>
			<input type="text" class="form-control " name="nomor_laporkan" value="<?= $perdes->nomor_dilaporkan ?>"
				autocomplete="off">
			<?= form_error('nomor_laporkan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Dilaporkan</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_dilaporkan" value="<?= $perdes->tanggal_dilaporkan ?>"
					class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd"
					data-mask>
			</div>
			<?= form_error('tanggal_dilaporkan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"><?= $perdes->keterangan ?></textarea>
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Upload Document</label>
			<input type="file" class="form-control-file" name="dokumen">
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('perdes')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
