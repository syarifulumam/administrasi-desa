<div class="card">
	<div class="card-header">
		Add Provinsi
	</div>
	<div class="card-body">
		<?= form_open('');?>
		<div class="form-group">
			<label>Nama Provinsi</label>
			<input type="text" class="form-control " name="nama_provinsi" value="<?= set_value('nama_provinsi') ?>"
				autocomplete="off">
			<?= form_error('nama_provinsi','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('provinsi')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
