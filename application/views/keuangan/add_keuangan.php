<div class="card">
	<div class="card-header">
		Add Keuangan
	</div>
	<div class="card-body">
		<?= form_open('');?>
		<div class="form-group">
			<label>Keterangan</label>
			<input type="text" class="form-control" name="keterangan"  value="<?= set_value('keterangan') ?>"
				autocomplete="off">
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Harga</label>
			<input type="text" class="form-control" name="harga"  value="<?= set_value('harga') ?>"
				autocomplete="off">
			<?= form_error('harga','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('buat_surat')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
