<div class="card">
	<div class="card-header">
		Add Kader Pembangunan
	</div>
	<div class="card-body">
		<?= form_open_multipart('');?>
		<div class="form-group">
			<label>Nama Lengkap</label>
			<input type="text" class="form-control " name="nama_lengkap" value="<?= set_value('nama_lengkap') ?>"
				autocomplete="off">
			<?= form_error('nama_lengkap','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group clearfix">
			<label>Jenis Kelamin</label><br>
			<div class="icheck-primary d-inline">
				<input type="radio" id="laki" name="kelamin" value="Laki - Laki" checked>
				<label for="laki">Laki - Laki
				</label>
			</div>
			<div class="icheck-primary d-inline">
				<input type="radio" id="tidak" name="kelamin" value="Wanita">
				<label for="tidak">Wanita
				</label>
			</div>
		</div>
		<div class="form-group">
			<label>Tempat Lahir</label>
			<input type="text" class="form-control " name="tempat_lahir" value="<?= set_value('tempat_lahir') ?>"
				autocomplete="off">
			<?= form_error('tempat_lahir','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Tanggal Lahir</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="text" name="tanggal_lahir" class="form-control" data-inputmask-alias="datetime"
					data-inputmask-inputformat="yyyy/mm/dd" data-mask>
			</div>
			<?= form_error('tanggal_lahir','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pendidikan Terakhir</label>
			<select class="form-control custom-select" name="pendidikan" value="<?=set_value('pendidikan')?>">
				<option value="">-- Pilih Pendidikan --</option>
				<option>SD</option>
				<option>SMP</option>
				<option>SMA</option>
				<option>DIPLOMA</option>
				<option>SARJANA</option>
			</select>
			<?= form_error('pendidikan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Pekerjaan</label>
			<select class="form-control custom-select" name="pekerjaan" value="<?=set_value('pekerjaan')?>">
				<option value="">-- Pilih Pekerjaan --</option>
				<option>Kepala Proyek</option>
				<option>Tukang</option>
				<option>Tenaga Ahli</option>
			</select>
			<?= form_error('pekerjaan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label>Bidang</label>
			<input type="text" class="form-control " name="bidang" value="<?= set_value('bidang') ?>"
				autocomplete="off">
			<?= form_error('bidang','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Alamat</label>
			<textarea class="form-control" rows="3" name="alamat"></textarea>
			<?= form_error('alamat','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Keterangan</label>
			<textarea class="form-control" rows="3" name="keterangan"></textarea>
			<?= form_error('keterangan','<small class="text-danger pl-1">','</small>') ?>
		</div>
		<div class="form-group">
			<label for="judul">Upload Document</label>
			<input type="file" class="form-control-file" name="dokumen">
		</div>
	</div>
	<div class="card-footer">
		<a href="<?= base_url('kader_pembangunan')?>" class="btn btn-default">Kembali</a>
		<input type="submit" class="btn btn-primary float-right" value="Submit">
		</form>
	</div>
</div>
