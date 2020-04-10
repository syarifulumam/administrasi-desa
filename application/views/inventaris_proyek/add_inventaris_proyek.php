<div class="card">
	<div class="card-header">
		Add Inventaris Proyek
	</div>
	<div class="card-body">
		<?= form_open('');?>
		<div class="form-group">
			<label>Nama Proyek</label>
			<input type="text" class="form-control " name="nama_proyek" value="<?= set_value('nama_proyek') ?>"
				autocomplete="off">
			<?= form_error('nama_proyek','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Volume</label>
			<input type="text" class="form-control " name="volume" value="<?= set_value('volume') ?>"
				autocomplete="off">
			<?= form_error('volume','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Lokasi</label>
			<input type="text" class="form-control " name="lokasi" value="<?= set_value('lokasi') ?>"
				autocomplete="off">
			<?= form_error('lokasi','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Biaya</label>
			<input type="text" class="form-control " name="biaya" value="<?= set_value('biaya') ?>" autocomplete="off">
			<?= form_error('biaya','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"></textarea>
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('inventaris_proyek')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
