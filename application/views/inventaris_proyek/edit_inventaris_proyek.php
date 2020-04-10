<div class="card">
	<div class="card-header">
		Edit Inventaris Proyek
	</div>
	<div class="card-body">
		<?= form_open('','',array('id'=>$inventaris_proyek->id_inventaris_proyek));?>
		<div class="form-group">
			<label>Nama Proyek</label>
			<input type="text" class="form-control " name="nama_proyek" value="<?= $inventaris_proyek->nama_proyek ?>"
				autocomplete="off">
			<?= form_error('nama_proyek','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Volume</label>
			<input type="text" class="form-control " name="volume" value="<?= $inventaris_proyek->volume ?>"
				autocomplete="off">
			<?= form_error('volume','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Lokasi</label>
			<input type="text" class="form-control " name="lokasi" value="<?= $inventaris_proyek->lokasi ?>"
				autocomplete="off">
			<?= form_error('lokasi','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Biaya</label>
			<input type="text" class="form-control " name="biaya" value="<?= $inventaris_proyek->biaya ?>"
				autocomplete="off">
			<?= form_error('biaya','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"><?= $inventaris_proyek->keterangan ?></textarea>
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('inventaris_proyek')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
