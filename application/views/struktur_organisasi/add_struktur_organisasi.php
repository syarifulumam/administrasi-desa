<div class="card">
	<div class="card-header">
		Add Struktur Organisasi
	</div>
	<div class="card-body">
		<?= form_open('');?>
		<div class="form-group">
			<label>Nama Jabatan</label>
			<input type="text" class="form-control " name="nama_jabatan" value="<?= set_value('nama_jabatan') ?>"
				autocomplete="off">
			<?= form_error('nama_jabatan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nama</label>
			<input type="text" class="form-control " name="nama" value="<?= set_value('nama') ?>" autocomplete="off">
			<?= form_error('nama','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>NIP</label>
			<input type="number" min="0" class="form-control " name="nip" value="<?= set_value('nip') ?>" autocomplete="off">
			<?= form_error('nip','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('struktur_organisasi')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
