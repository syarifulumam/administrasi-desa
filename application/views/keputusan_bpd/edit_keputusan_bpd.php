<div class="card">
	<div class="card-header">
		Edit Keputusan BPD
	</div>
	<div class="card-body">
		<?= form_open_multipart('','',array('id'=>$keputusan_bpd->id_keputusan_bpd));?>
		<div class="form-group">
			<label>Nomor Keputusan</label>
			<input type="number" min="0" class="form-control " name="nomor_keputusan" value="<?= $keputusan_bpd->nomor_keputusan ?>" autocomplete="off">
			<?= form_error('nomor_keputusan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal" value="<?= date('d-m-Y', strtotime($keputusan_bpd->tanggal)) ?>" class="form-control"
					data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
			</div>
			<?= form_error('tanggal','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tentang</label>
			<input type="text" class="form-control " name="tentang" value="<?= $keputusan_bpd->tentang ?>"
				autocomplete="off">
			<?= form_error('tentang','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Uraian Singkat</label>
			<input type="text" class="form-control " name="uraian" value="<?= $keputusan_bpd->uraian_singkat ?>"
				autocomplete="off">
			<?= form_error('uraian','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"><?= $keputusan_bpd->keterangan ?></textarea>
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<!-- <div class="form-group">
			<label for="judul">Upload Document</label>
			<input type="file" class="form-control-file" name="dokumen">
		</div> -->
	</div>
	<div class="card-footer">
		<a href="<?= base_url('keputusan_bpd')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
