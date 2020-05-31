<div class="card">
	<div class="card-header">
		Add Keuangan
	</div>
	<div class="card-body">
		<?= form_open('','',array('status'=>'pengeluaran'));?>
		<div class="form-group">
			<label>Keterangan</label>
			<input type="text" class="form-control" name="keterangan"  value="<?= set_value('keterangan') ?>"
				autocomplete="off">
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Jumlah</label>
			<input type="text" class="form-control" name="harga"  value="<?= set_value('harga') ?>"
				autocomplete="off">
			<?= form_error('harga','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal" class="form-control" data-inputmask-alias="datetime"
					data-inputmask-inputformat="yyyy/mm/dd" data-mask>
			</div>
			<?= form_error('tanggal','<small class="text-danger pl-1">','</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('buat_surat')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
