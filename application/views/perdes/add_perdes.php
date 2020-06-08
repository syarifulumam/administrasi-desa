<div class="card">
	<div class="card-header">
		Add Perdes
	</div>
	<div class="card-body">
		<?= form_open_multipart('');?>
		<div class="form-group">
			<label>Nomor Perdes</label>
			<input type="number" min="0" class="form-control " name="nomor_perdes" value="<?= set_value('nomor_perdes') ?>" autocomplete="off">
			<?= form_error('nomor_perdes','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Perdes</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_perdes" class="form-control" data-inputmask-alias="datetime"
					data-inputmask-inputformat="dd/mm/yyyy" data-mask>
			</div>
			<?= form_error('tanggal_perdes','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tentang</label>
			<input type="text" class="form-control " name="tentang" value="<?= set_value('tentang') ?>"
				autocomplete="off">
			<?= form_error('tentang','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Uraian Singkat</label>
			<input type="text" class="form-control " name="uraian" value="<?= set_value('uraian') ?>"
				autocomplete="off">
			<?= form_error('uraian','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nomor Persetujuan BPD</label>
			<input type="number" min="0" class="form-control " name="nomor_persetujuan_bpd" value="<?= set_value('nomor_persetujuan_bpd') ?>" autocomplete="off">
			<?= form_error('nomor_persetujuan_bpd','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Persetujuan BPD</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_persetujuan_bpd" class="form-control" data-inputmask-alias="datetime"
					data-inputmask-inputformat="dd/mm/yyyy" data-mask>
			</div>
			<?= form_error('tanggal_persetujuan_bpd','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nomor Dilaporkan</label>
				<input type="number" min="0" class="form-control " name="nomor_laporkan" value="<?= set_value('nomor_laporkan') ?>" autocomplete="off">
			<?= form_error('nomor_laporkan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Dilaporkan</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_dilaporkan" class="form-control" data-inputmask-alias="datetime"
					data-inputmask-inputformat="dd/mm/yyyy" data-mask>
			</div>
			<?= form_error('tanggal_dilaporkan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"></textarea>
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
