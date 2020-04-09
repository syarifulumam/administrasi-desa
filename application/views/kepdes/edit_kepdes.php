<div class="card">
	<div class="card-header">
		Edit Kepdes
	</div>
	<div class="card-body">
		<?= form_open_multipart('','',array('id'=>$kepdes->id_kepala_desa,'file'=>$kepdes->file_dokumen));?>
		<div class="form-group">
			<label>Nomor Kepdes</label>
			<input type="text" class="form-control " name="nomor_kepdes" value="<?= $kepdes->nomor_kepala_desa ?>"
				autocomplete="off">
			<?= form_error('nomor_kepdes','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tentang</label>
			<input type="text" class="form-control " name="tentang" value="<?= $kepdes->tentang ?>" autocomplete="off">
			<?= form_error('tentang','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Uraian Singkat</label>
			<input type="text" class="form-control " name="uraian" value="<?= $kepdes->uraian_singkat ?>"
				autocomplete="off">
			<?= form_error('uraian','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nomor Dilaporkan</label>
			<input type="text" class="form-control " name="nomor_laporkan" value="<?= $kepdes->nomor_dilaporkan ?>"
				autocomplete="off">
			<?= form_error('nomor_laporkan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Dilaporkan</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_dilaporkan" value="<?= $kepdes->tanggal_dilaporkan ?>"
					class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd"
					data-mask>
			</div>
			<?= form_error('tanggal_dilaporkan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"><?= $kepdes->keterangan ?></textarea>
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Upload Document</label>
			<input type="file" class="form-control-file" name="dokumen">
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('kepdes')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
