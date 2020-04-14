<div class="card">
	<div class="card-header">
		Edit Struktur Organisasi
	</div>
	<div class="card-body">
		<?= form_open('','',array('id'=>$struktur_organisasi->id_struktur_organisasi));?>
		<div class="form-group">
			<label>Nama Jabatan</label>
			<input type="text" class="form-control " name="nama_jabatan"
				value="<?= $struktur_organisasi->nama_jabatan ?>" autocomplete="off">
			<?= form_error('nama_jabatan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Nama</label>
			<input type="text" class="form-control " name="nama" value="<?= $struktur_organisasi->nama ?>"
				autocomplete="off">
			<?= form_error('nama','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>NIP</label>
			<input type="text" class="form-control " name="nip" value="<?= $struktur_organisasi->nip ?>"
				autocomplete="off">
			<?= form_error('nip','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('master_surat')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
