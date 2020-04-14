<div class="card">
	<div class="card-header">
		Edit master_surat
	</div>
	<div class="card-body">
		<?= form_open('','',array('id'=>$master_surat->id_master_surat));?>
		<div class="form-group">
			<label>Nama Surat</label>
			<input type="text" class="form-control " name="nama_surat" value="<?= $master_surat->nama_surat_dinas ?>"
				autocomplete="off">
			<?= form_error('nama_surat','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('master_surat')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
