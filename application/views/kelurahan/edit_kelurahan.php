<div class="card">
	<div class="card-header">
		Edit Provinsi
	</div>
	<div class="card-body">
		<?= form_open('','',array('id'=>$kelurahan->id_kelurahan));?>
		<div class="form-group">
			<label>Nama kelurahan</label>
			<input type="text" class="form-control " name="kelurahan" value="<?= $kelurahan->nama_kelurahan ?>"
				autocomplete="off">
			<?= form_error('kelurahan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Kecamatan</label>
			<select class="form-control select2" style="width: 100%;" name="kecamatan" id="kecamatan">
				<option value="">-- Pilih Kota --</option>
				<?php foreach ($kecamatan as $key):?>
				<option value="<?= $key->id_kecamatan ?>"
					<?= $kelurahan->id_kecamatan==$key->id_kecamatan?'selected':'' ?>>
					<?= $key->nama_kecamatan ?></option>
				<?php endforeach; ?>
			</select>
			<?= form_error('kecamatan','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('kecamatan')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
