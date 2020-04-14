<div class="card">
	<div class="card-header">
		Add kecamatan
	</div>
	<div class="card-body">
		<?= form_open('');?>
		<div class="form-group">
			<label>Nama Kecamatan</label>
			<input type="text" class="form-control " name="kecamatan" value="<?= set_value('kecamatan') ?>"
				autocomplete="off">
			<?= form_error('kecamatan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Kota</label>
			<select class="form-control select2" style="width: 100%;" name="kota" id="kota">
				<option value="">-- Pilih Kota --</option>
				<?php foreach ($kota as $key):?>
				<option value="<?= $key->id_kota ?>"><?= $key->nama_kota ?></option>
				<?php endforeach; ?>
			</select>
			<?= form_error('kota','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('kecamatan')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
