<div class="card">
	<div class="card-header">
		Edit Kota / Kabupaten
	</div>
	<div class="card-body">
		<?= form_open('','',array('id'=>$kota->id_kota));?>
		<div class="form-group">
			<label>Nama Provinsi</label>
			<input type="text" class="form-control " name="kota" value="<?= $kota->nama_kota ?>" autocomplete="off">
			<?= form_error('kota','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Provinsi</label>
			<select class="form-control select2" style="width: 100%;" name="provinsi" id="provinsi">
				<option value="">-- Pilih Provinsi --</option>
				<?php foreach ($provinsi as $key):?>
				<option value="<?= $key->id_provinsi ?>" <?= $kota->id_provinsi==$key->id_provinsi?'selected':'' ?>>
					<?= $key->nama_provinsi ?></option>
				<?php endforeach; ?>
			</select>
			<?= form_error('provinsi','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('kota')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
