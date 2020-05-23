<div class="card">
	<div class="card-header">
		Add Surat Keterangan Berkelakuan Baik
	</div>
	<div class="card-body">
		<?= form_open('','',array('id_master_surat'=>9,'url'=>'laporan_surat_berkelakuan_baik'));?>
		<div class="form-group">
			<label>Tanggal</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_surat" class="form-control" data-inputmask-alias="datetime"
					data-inputmask-inputformat="yyyy/mm/dd" data-mask>
			</div>
			<?= form_error('tanggal_surat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nama</label>
			<select class="form-control select2" style="width: 100%;" name="nama" id="nama">
				<option value="">-- Pilih Nama--</option>
				<?php foreach ($penduduk as $key):?>
				<option value="<?= $key->id_penduduk ?>"><?= $key->nama_lengkap ?></option>
				<?php endforeach; ?>
			</select>
			<?= form_error('nama','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
		<label>Keterangan</label>
		<textarea class="form-control" rows="3" name="keterangan"><?=set_value('keterangan')?></textarea>
		<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>	
		<!-- <div class="form-group">
			<label>Jenis Surat</label>
			<select class="form-control select2" style="width: 100%;" name="jenis_surat" id="jenis_surat">
				<option value="">-- Pilih Jenis Surat --</option>
				<?php foreach ($master_surat as $key):?>
				<option value="<?= $key->id_master_surat ?>"><?= $key->nama_surat_dinas ?></option>
				<?php endforeach; ?>
			</select>
			<?= form_error('jenis_surat','<small class="text-danger pl-1">','</small>') ?>
		</div> -->
	</div>
	<div class="card-footer">
		<a href="<?= base_url('buat_surat')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
