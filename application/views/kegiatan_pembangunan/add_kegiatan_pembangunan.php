<div class="card">
	<div class="card-header">
		Add Kegiatan Pembangunan
	</div>
	<div class="card-body">
		<?= form_open('');?>
		<div class="form-group">
			<label>Sifat Proyek</label>
			<select class="form-control custom-select" name="sifat_proyek" value="<?=set_value('sifat_proyek')?>">
				<option value="">-- Pilih Sifat Proyek --</option>
				<option>Baru</option>
				<option>Lanjutan</option>
			</select>
			<?= form_error('sifat_proyek','<small class="text-danger pl-1">','</small>') ?>
		</div>
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
			<label>Sumber Dana Pemerintah</label>
			<input type="number" min="0" class="form-control " name="dana_pemerintah" value="<?= set_value('dana_pemerintah') ?>" autocomplete="off">
			<?= form_error('dana_pemerintah','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Sumber Dana Provinsi</label>
			<input type="number" min="0" class="form-control " name="dana_provinsi" value="<?= set_value('dana_provinsi') ?>" autocomplete="off">
			<?= form_error('dana_provinsi','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Sumber Dana Kota</label>
			<input type="number" min="0" class="form-control " name="dana_kota" value="<?= set_value('dana_kota') ?>" autocomplete="off">
			<?= form_error('dana_kota','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Sumber Dana Swadaya</label>
			<input type="number" min="0" class="form-control " name="dana_swadaya" value="<?= set_value('dana_swadaya') ?>" autocomplete="off">
			<?= form_error('dana_swadaya','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pelaksana</label>
			<input type="text" class="form-control " name="pelaksana" value="<?= set_value('pelaksana') ?>"
				autocomplete="off">
			<?= form_error('pelaksana','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Waktu Pelaksanaan</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="waktu_pelaksanaan" class="form-control" data-inputmask-alias="datetime"
					data-inputmask-inputformat="dd/mm/yyyy" data-mask>
			</div>
			<?= form_error('waktu_pelaksanaan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"></textarea>
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('kegiatan_pembangunan')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
