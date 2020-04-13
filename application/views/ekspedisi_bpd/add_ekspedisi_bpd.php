<div class="card">
	<div class="card-header">
		Add Ekspedisi BPD
	</div>
	<div class="card-body">
		<?= form_open_multipart('');?>
		<div class="form-group">
			<label>Tanggal Pengiriman</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_pengiriman" class="form-control" data-inputmask-alias="datetime"
					data-inputmask-inputformat="yyyy/mm/dd" data-mask>
			</div>
			<?= form_error('tanggal_pengiriman','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Surat</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_surat" class="form-control" data-inputmask-alias="datetime"
					data-inputmask-inputformat="yyyy/mm/dd" data-mask>
			</div>
			<?= form_error('tanggal_surat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nomor Surat</label>
			<input type="text" class="form-control " name="nomor_surat" value="<?= set_value('nomor_surat') ?>"
				autocomplete="off">
			<?= form_error('nomor_surat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Isi Singkat</label>
			<input type="text" class="form-control " name="isi_singkat" value="<?= set_value('isi_singkat') ?>"
				autocomplete="off">
			<?= form_error('isi_singkat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tujuan</label>
			<input type="text" class="form-control " name="tujuan" value="<?= set_value('tujuan') ?>"
				autocomplete="off">
			<?= form_error('tujuan','<small class="text-danger pl-1">','</small>') ?>
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
		<a href="<?= base_url('ekspedisi_bpd')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
