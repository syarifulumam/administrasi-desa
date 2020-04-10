<div class="card">
	<div class="card-header">
		Edit Rencana Pembangunan
	</div>
	<div class="card-body">
		<?= form_open('','',array('id'=>$rencana_pembangunan->id_rencana_pembangunan));?>
		<div class="form-group">
			<label>Nama Proyek</label>
			<input type="text" class="form-control " name="nama_proyek" value="<?= $rencana_pembangunan->nama_proyek ?>"
				autocomplete="off">
			<?= form_error('nama_proyek','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Lokasi</label>
			<input type="text" class="form-control " name="lokasi" value="<?= $rencana_pembangunan->lokasi ?>"
				autocomplete="off">
			<?= form_error('lokasi','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Sumber Dana Pemerintah</label>
			<input type="text" class="form-control " name="dana_pemerintah"
				value="<?= $rencana_pembangunan->sumber_dana_pemerintah ?>" autocomplete="off">
			<?= form_error('dana_pemerintah','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Sumber Dana Provinsi</label>
			<input type="text" class="form-control " name="dana_provinsi"
				value="<?= $rencana_pembangunan->sumber_dana_provinsi ?>" autocomplete="off">
			<?= form_error('dana_provinsi','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Sumber Dana Kota</label>
			<input type="text" class="form-control " name="dana_kota"
				value="<?= $rencana_pembangunan->sumber_dana_kota ?>" autocomplete="off">
			<?= form_error('dana_kota','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Sumber Dana Swadaya</label>
			<input type="text" class="form-control " name="dana_swadaya"
				value="<?= $rencana_pembangunan->sumber_dana_swadaya ?>" autocomplete="off">
			<?= form_error('dana_swadaya','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pelaksana</label>
			<input type="text" class="form-control " name="pelaksana" value="<?= $rencana_pembangunan->pelaksana ?>"
				autocomplete="off">
			<?= form_error('pelaksana','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Manfaat</label>
			<input type="text" class="form-control " name="manfaat" value="<?= $rencana_pembangunan->manfaat ?>"
				autocomplete="off">
			<?= form_error('manfaat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"><?= $rencana_pembangunan->keterangan ?></textarea>
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('rencana_pembangunan')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
