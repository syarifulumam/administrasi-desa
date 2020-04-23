<div class="card">
	<div class="card-header">
		Add Kegiatan BPD
	</div>
	<div class="card-body">
		<?= form_open_multipart('','',array('id'=>$kegiatan_bpd->id_kegiatan_bpd));?>
		<div class="form-group">
			<label>Tanggal</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal" value="<?= $kegiatan_bpd->tanggal ?>" class="form-control"
					data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
			</div>
			<?= form_error('tanggal','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tentang</label>
			<input type="text" class="form-control " name="tentang" value="<?= $kegiatan_bpd->tentang ?>"
				autocomplete="off">
			<?= form_error('tentang','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pelaksana</label>
			<input type="text" class="form-control " name="pelaksana" value="<?= $kegiatan_bpd->pelaksana ?>"
				autocomplete="off">
			<?= form_error('pelaksana','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pokok-Pokok</label>
			<input type="text" class="form-control " name="pokok" value="<?= $kegiatan_bpd->pokok ?>"
				autocomplete="off">
			<?= form_error('pokok','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Hasil Kegiatan</label>
			<input type="text" class="form-control " name="hasil_kegiatan" value="<?= $kegiatan_bpd->hasil_kegiatan ?>"
				autocomplete="off">
			<?= form_error('hasil_kegiatan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"><?= $kegiatan_bpd->keterangan ?></textarea>
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<!-- <div class="form-group">
			<label for="judul">Upload Document</label>
			<input type="file" class="form-control-file" name="dokumen">
		</div> -->
	</div>
	<div class="card-footer">
		<a href="<?= base_url('kegiatan_bpd')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
