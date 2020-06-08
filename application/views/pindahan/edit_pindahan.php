<div class="card">
	<div class="card-header">
		Edit Pidah Kependudukan
	</div>
	<div class="card-body">
		<?= form_open_multipart('','',array('id'=>$pindahan->id_pindah_kependudukan));?>
		<div class="form-group">
			<label>Nama</label>
			<input type="text" name="nama" id="" readonly value="<?= $pindahan->nama_lengkap ?>" class="form-control">
			<?= form_error('nama','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Pindah</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" value="<?= date('d-m-Y', strtotime($pindahan->tanggal_pindah)) ?>" name="tanggal_pindahan" class="form-control"
					data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
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
