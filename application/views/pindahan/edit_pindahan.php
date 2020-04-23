<div class="card">
	<div class="card-header">
		Edit Pidah Kependudukan
	</div>
	<div class="card-body">
		<?= form_open_multipart('','',array('id'=>$pindahan->id_pindah_kependudukan));?>
		<div class="form-group">
			<label>Nama</label>
			<select class="form-control select2" style="width: 100%;" name="nama" id="nama">
				<option value="">-- Pilih Nama --</option>
				<?php foreach ($penduduk as $key):?>
				<option value="<?= $key->id_penduduk ?>"
					<?= $key->id_penduduk == $pindahan->id_penduduk ? 'selected':'' ?>><?= $key->nama_lengkap ?>
				</option>
				<?php endforeach; ?>
			</select>
			<?= form_error('nama','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Pindah</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" value="<?= $pindahan->tanggal_pindah ?>" name="tanggal_pindahan" class="form-control"
					data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
			</div>
			<?= form_error('tanggal_pindahan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Alamat Pindah</label>
			<textarea class="form-control" rows="3" name="alamat"><?= $pindahan->alamat_pindahan ?></textarea>
			<?= form_error('alamat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"><?= $pindahan->keterangan ?></textarea>
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('pindahan')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
