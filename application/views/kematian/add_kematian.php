<div class="card">
	<div class="card-header">
		Add Kematian
	</div>
	<div class="card-body">
		<?= form_open_multipart('');?>
		<div class="form-group">
			<label>Nama</label>
			<select class="form-control select2" style="width: 100%;" name="nama" id="nama">
				<option value="">-- Pilih Nama --</option>
				<?php foreach ($penduduk as $key):?>
				<option value="<?= $key->id_penduduk ?>"><?= $key->nama_lengkap ?></option>
				<?php endforeach; ?>
			</select>
			<?= form_error('nama','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Kematian</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_kematian" class="form-control" data-inputmask-alias="datetime"
					data-inputmask-inputformat="dd/mm/yyyy" data-mask>
			</div>
			<?= form_error('tanggal_kematian','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Tempat Meninggal</label>
			<input type="text" class="form-control " name="tempat_meninggal"
				value="<?= set_value('tempat_meninggal') ?>" autocomplete="off">
			<?= form_error('tempat_meninggal','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Sebab Kematian</label>
			<select class="form-control custom-select" name="sebab" value="<?=set_value('sebab')?>">
				<option value="">-- Pilih Sebab Kematian --</option>
				<option>Sakit</option>
				<option>Kecelakaan</option>
				<option>Tanpa Sebab</option>
			</select>
			<?= form_error('level_user','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"></textarea>
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Pemakaman</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_pemakaman" class="form-control" data-inputmask-alias="datetime"
					data-inputmask-inputformat="dd/mm/yyyy" data-mask>
			</div>
			<?= form_error('tanggal_pemakaman','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Tempat Pemakaman</label>
			<input type="text" class="form-control " name="tempat_pemakaman"
				value="<?= set_value('tempat_pemakaman') ?>" autocomplete="off">
			<?= form_error('tempat_pemakaman','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('kematian')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
