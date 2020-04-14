<div class="card">
	<div class="card-header">
		Add dusun
	</div>
	<div class="card-body">
		<?= form_open('');?>
		<div class="form-group">
			<label>Nama dusun</label>
			<input type="text" class="form-control " name="dusun" value="<?= set_value('dusun') ?>" autocomplete="off">
			<?= form_error('dusun','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Kelurahan</label>
			<select class="form-control select2" style="width: 100%;" name="kelurahan" id="kelurahan">
				<option value="">-- Pilih Kelurahan --</option>
				<?php foreach ($kelurahan as $key):?>
				<option value="<?= $key->id_kelurahan ?>"><?= $key->nama_kelurahan ?></option>
				<?php endforeach; ?>
			</select>
			<?= form_error('kelurahan','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('dusun')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
