<div class="card">
	<div class="card-header">
		Edit Ekspedisi BPD
	</div>
	<div class="card-body">
		<?= form_open_multipart('','',array('id'=>$ekspedisi_bpd->id_ekspedisi_bpd));?>
		<div class="form-group">
			<label>Tanggal Pengiriman</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_pengiriman" value="<?= date('d-m-Y', strtotime($ekspedisi_bpd->tanggal_pengiriman)) ?>"
					class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
					data-mask>
			</div>
			<?= form_error('tanggal_pengiriman','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Surat</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_surat" value="<?= date('d-m-Y', strtotime($ekspedisi_bpd->tanggal_surat)) ?>"
					class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
					data-mask>
			</div>
			<?= form_error('tanggal_surat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nomor Surat</label>
			<input type="number" min="0" class="form-control " name="nomor_surat" value="<?= $ekspedisi_bpd->nomor_surat ?>" autocomplete="off">
			<?= form_error('nomor_surat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Isi Singkat</label>
			<input type="text" class="form-control " name="isi_singkat" value="<?= $ekspedisi_bpd->isi_singkat ?>"
				autocomplete="off">
			<?= form_error('isi_singkat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tujuan</label>
			<input type="text" class="form-control " name="tujuan" value="<?= $ekspedisi_bpd->tujuan ?>"
				autocomplete="off">
			<?= form_error('tujuan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"><?= $ekspedisi_bpd->keterangan ?></textarea>
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('ekspedisi_bpd')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
